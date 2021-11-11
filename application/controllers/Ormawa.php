<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ormawa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('HmpModel');
		$this->load->model('ModelKandidat');
		$this->load->model('ModelOrganisasi');
	}

	public function index()
	{
		// start	
		$data['page_title'] = "Pemilihan Ketua Ormawa 2022 Fikom Universitas Duta Bangsa";

		$data['organisasi'] = $this->ModelOrganisasi->getAll();

		$this->load->view('end_user/intro', $data);
	}

	public function i($nama_organisasi)
	{
		//**
		// Login with Google
		//**

			//include the google OAuth configuration
			require("assets/google_api/vendor/autoload.php");
			//Step 1: Enter you google account credentials

			$jwt = new \Firebase\JWT\JWT;
			$jwt::$leeway = 60; // adjust this value

			// we explicitly pass jwt object whose leeway is set to 60
			$g_client = new \Google_Client(['jwt' => $jwt]);


			$g_client->setClientId("91581392252-74f54bcmp6jfaj5vs5u3tt4knnuo0err.apps.googleusercontent.com");
			$g_client->setClientSecret("5HRKlfbfMmYVu1Fv3204jNyh");
			$g_client->setRedirectUri( base_url('pemilwa/index') );
			$g_client->addScope("email");
			$g_client->addScope("profile");


	    //Step 2 : Create the url
	    $auth_url = $g_client->createAuthUrl();
	    $data['auth_url'] = $auth_url;

	    //Step 3 : Get the authorization  code
	    $code = isset($_GET['code']) ? $_GET['code'] : NULL;

	    //Step 4: Get access token
	    if (isset($code)) {

	      try {

	        $token = $g_client->fetchAccessTokenWithAuthCode($code);
	        $g_client->setAccessToken($token);
	      } catch (Exception $e) {
	        $e->getMessage();
	      }

	      try {
	        $pay_load = $g_client->verifyIdToken(); // ini kalo berhasil

	      } catch (Exception $e) {
	        $e->getMessage();
	        $this->HmpModel->set_alert('danger', 'Silakan coba lagi. (' . $e->getMessage() . ')'); // <-- untuk testing
	        $this->HmpModel->refresh();
	      }
	    } else {
	      $pay_load = null;
	    }

		//**
		// /.Login with Google
		//**

	    if ( !empty($pay_load) ) {
	    	// var_dump($pay_load);
	    	$check_email = $this->HmpModel->check_email_pemilih($pay_load["email"]);
	    	if ( $check_email['email'] == false ) 
	    	{
	    		$this->HmpModel->set_alert('danger', 'Maaf '. ucwords(strtolower($pay_load['name'])) .', kamu tidak terdaftar sebagai pemilik hak pilih! :(');
	        	$this->HmpModel->refresh();
	    	}
	    	elseif ( $check_email['kosong'] == false )
	    	{
	    		$this->HmpModel->set_alert('danger', 'Maaf '. ucwords(strtolower($pay_load['name'])) .', kamu cuma bisa memilih satu kali! :(');
	        	$this->HmpModel->refresh();
	    	}
	    	else
	    	{
	    		$pilihan = $this->session->userdata('pilihan'); // ngambil dari session
	    		if ( $this->HmpModel->check_kandidat_benar($pilihan) == false ) {
	    			$this->HmpModel->set_alert('danger', 'Fatal Error! Silakan coba lagi.'); // <-- untuk testing
	    			$this->HmpModel->refresh();
	    		}
	    		else{
	    			$this->HmpModel->add_yuukensha($pay_load['email'], $pay_load['name'], $pilihan);
		    		$this->HmpModel->set_alert('success', 'Terima kasih sudah memberikan satu vote yang berharga, '. ucwords(strtolower($pay_load['name'])) .' :)');
		        	$this->HmpModel->refresh();
	    		}
	    	}
	    }

		// start	
		$nama_organisasi = str_replace('_', ' ', $nama_organisasi);
		$data['organisasi'] = $this->ModelOrganisasi->getOrganisasiByNamaOrganisasi($nama_organisasi);
		
		$data['page_title'] = "Pemilihan Ketua ". $data['organisasi']['nama_organisasi'] ." 2022";

		// echo '<pre>'; var_dump( $data['organisasi'] ); die;

		$data['kandidat'] = $this->ModelKandidat->getKandidatByIdOrganisasi($data['organisasi']['id_organisasi']);

		$this->load->view('end_user/index', $data);
	}

	public function pass()
	{
		if ( $this->input->post() ) {
			$auth_url = $this->input->post('auth_url');
			$pilihan = $this->input->post('pilihan');

			$this->session->set_userdata('pilihan', $pilihan);

			redirect( $auth_url );

		}
		else{
			$this->HmpModel->set_alert('danger', 'Maaf, Terjadi Kesalahan! Coba lagi!');
	        redirect( base_url() . 'pemilwa/' );
		}
	}

	public function statistik()
	{
		$data['page_title'] = "Dashboard Pemilwa";
		$this->db->order_by('jikan', 'DESC');
		$data['yuukensha'] = $this->db->get('pemilwa_hmp_yuukensha')->result_array();
		$data['statistik'] = $this->HmpModel->hitung_jumlah_suara();
		$this->load->view('admin', $data);
	}

}
