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

	public function going_to_google()
	{
		if ( !empty($_POST['id_kandidat']) ) { //<-- simpen dulu di session
			$_SESSION['id_kandidat'] = $_POST['id_kandidat'];
		}
		if ( !empty($_POST['nim_mahasiswa']) ) { //<-- simpen dulu di session
			$_SESSION['nim_mahasiswa'] = $_POST['nim_mahasiswa'];
		}
		if ( !empty($_POST['id_organisasi']) ) { //<-- simpen dulu di session
			$_SESSION['id_organisasi'] = $_POST['id_organisasi'];
		}

		// echo '<pre>'; var_dump( $_POST );
		// echo '<pre>'; var_dump( $_SESSION ); die;


		$organisasi = $this->ModelOrganisasi->getOrganisasiById( $_SESSION['id_organisasi'] );


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
			$g_client->setRedirectUri( base_url( 'ormawa/going_to_google' ) );
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
	        redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
	      }
	    }

		//**
		// /.Login with Google
		//**

	    if ( !empty($pay_load) ) {
			
	    	if ( empty($_SESSION['nim_mahasiswa']) OR empty($_SESSION['id_organisasi']) ) {
					$this->HmpModel->set_alert('danger', '⚠️Maaf '. ucwords(strtolower($pay_load['name'])) .', session kamu sudah habis karena terlalu lama. Silakan ulangi kembali.');
	        redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
				}
			
				// Pilihan siapa yang punya hak pilih START


					$check_sudah_memilih = $this->HmpModel->check_email_sudah_memilih($pay_load["email"], $_SESSION['id_organisasi']);
					if ( $check_sudah_memilih )
					{
						$this->HmpModel->set_alert('danger', '⚠️Maaf '. ucwords(strtolower($pay_load['name'])) .', kamu hanya bisa memilih satu kali untuk setiap organisasi. 😥');
						redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
					}

					
					// !!! Hanya dilakukan kalau email_khusus bernilai false, yaitu tidak ada di daftar email khusus !!!
					$check_email_khusus = $this->HmpModel->check_email_pemilih_khusus($pay_load["email"], $_SESSION['id_organisasi']);
					if ( $check_email_khusus == false ) {



							// batasan angkatan!
							$check_angkatan = $this->HmpModel->check_angkatan($_SESSION['nim_mahasiswa']);
							if ( $check_angkatan == false )
							{
								$this->HmpModel->set_alert('danger', '⚠️Maaf '. ucwords(strtolower($pay_load['name'])) .', kamu tidak terdaftar sebagai pemilik hak pilih. 😥');
								redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
							}



							// kalau bukan nim fikom udb, kasih alert!
							$check_apakah_fakultas_fikom = $this->HmpModel->check_apakah_nim_fikom($_SESSION['nim_mahasiswa']);
							if ( $check_apakah_fakultas_fikom == false )
							{
								$this->HmpModel->set_alert('danger', '⚠️Maaf '. ucwords(strtolower($pay_load['name'])) .', kamu bukan warga Fakultas Ilmu Komputer UDB. 😥');
								redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
							}


							// kalau bener-bener di pilihan prodi dan email khusus enggak ada, maka kasih alert!
							$check_prodi = $this->HmpModel->check_prodi($_SESSION['nim_mahasiswa'], $_SESSION['id_organisasi']);
							if ( $check_prodi == false )
							{
								$this->HmpModel->set_alert('danger', '⚠️Maaf '. ucwords(strtolower($pay_load['name'])) .', kamu tidak terdaftar sebagai pemilik hak pilih! 😥');
								redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
							}


							// Check apakah email udb START
							$check_email_udb = $this->HmpModel->check_email_udb($pay_load["email"]);
							if ( $check_email_udb == false )
							{
								$this->HmpModel->set_alert('danger', '⚠️Maaf, tolong gunakan email mahasiswa Universitas Duta Bangsa.');
								redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
							}



					}
					
					
					// check apakah kandidatnya betul
					if ( $this->HmpModel->check_kandidat_benar( $_SESSION['id_kandidat'] ) == false ) {
						$this->HmpModel->set_alert('danger', '⚠️Fatal Error! Silakan coba lagi.');
						redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
					}
				// Pilihan siapa yang punya hak pilih END


				else{
				// Kalau sudah betul semuanya
					$data_pemilih = [
						'email' => $pay_load['email'], 
						'nama_pemilih' => $pay_load['name'], 
						'nim_mahasiswa' => $_SESSION['nim_mahasiswa'],
						'prodi' => $this->HmpModel->nim_2_prodi( $_SESSION['nim_mahasiswa'] ),
						'angkatan' => $this->HmpModel->nim_2_angkatan( $_SESSION['nim_mahasiswa'] ),
						'waktu' => date( 'Y-m-d H:i:s' ),
						'id_kandidat' => $_SESSION['id_kandidat'],
						'id_organisasi' => $_SESSION['id_organisasi'],
					];
					$this->HmpModel->add_yuukensha($data_pemilih);
					$this->HmpModel->set_alert('success', 'Terima kasih sudah memberikan satu vote yang berharga, '. ucwords(strtolower($pay_load['name'])) .' 😁');
					redirect( base_url() . 'ormawa/i/' . str_replace(' ', "_", $organisasi['nama_organisasi']) );
				}
	    
				
			
			
			}

		$this->load->view('end_user/going_to_google', $data);
	}

	public function i($nama_organisasi)
	{
	
		// start mycode
		$nama_organisasi = str_replace('_', ' ', $nama_organisasi);
		$data['organisasi'] = $this->ModelOrganisasi->getOrganisasiByNamaOrganisasi($nama_organisasi);
		
		$data['page_title'] = "Pemilihan Ketua ". $data['organisasi']['nama_organisasi'] ." 2022";

		$data['kandidat'] = $this->ModelKandidat->getKandidatByIdOrganisasi($data['organisasi']['id_organisasi']);


		$data['settings'] = $this->SettingsModel->get_settings();
		

		// end mycode

		$this->load->view('end_user/index', $data);
    
	}


	public function statistik($id_organisasi, $limit=60)
	{
		$data['page_title'] = "Hasil Pemilihan";
		$this->db->limit($limit);
		$this->db->order_by('waktu', 'DESC');

		$this->db->where('pemilwa_pemilih.id_organisasi', $id_organisasi);

		$this->db->from('pemilwa_pemilih');
		$this->db->select('id_pemilih, nama_pemilih, prodi, angkatan, waktu, pemilwa_pemilih.id_kandidat, nama_kandidat,');
		$this->db->join('pemilwa_kandidat', 'pemilwa_pemilih.id_kandidat = pemilwa_kandidat.id_kandidat');
		$data['yuukensha'] = $this->db->get()->result_array();
		
		$data['organisasi'] = $this->ModelOrganisasi->getOrganisasiById($id_organisasi);

		$data['statistik'] = $this->HmpModel->hitung_jumlah_suara( $id_organisasi );

		$this->load->view('end_user/statistik', $data);
	}

}
