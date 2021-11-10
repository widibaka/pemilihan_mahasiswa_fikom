<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{
		if ( $this->input->post() ) {
			$check_result = $this->AuthModel->check_user( $this->input->post() );
			if ($check_result) {

				// Check apakah ini seornag admin
				if ( strpos($check_result['email'], '@admin') != false ) {
					$check_result['admin'] = 'mantap-mantap';
				}
				// Memulai session
				$this->session->set_userdata($check_result);
				redirect(base_url());
			}
			if (!$check_result) {
				$this->session->set_flashdata('msg', 'error#Login gagal');
				redirect(base_url() . 'auth/login' );
			}
		}

		//**
	    // Login with Google
	    //**

		    //include the google OAuth configuration
		    require("assets/google_api/vendor/autoload.php");
		    //Step 1: Enter you google account credentials

			$jwt = new \Firebase\JWT\JWT;
			$jwt::$leeway = 5*60; // adjust this value

			// we explicitly pass jwt object whose leeway is set to 60
			$g_client = new \Google_Client(['jwt' => $jwt]);


			$g_client->setClientId("91581392252-8967kib5tsjpks14vsd0scoqno5v0477.apps.googleusercontent.com");
	 		$g_client->setClientSecret("HrC_h2qr6BsuLFwYOGXkeXqH");
	 		$g_client->setRedirectUri( base_url('auth/login') );
	 		$g_client->addScope("email");

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
		        $this->session->set_flashdata('msg', 'error#Silakan coba lagi.' . $e->getMessage() ); // <-- untuk testing
		        redirect( base_url() . $this->uri->uri_string() );
		      }
		    } else {
		      $pay_load = null;
		    }

	    //**
	    // /.Login with Google
	    //**
		if ( !empty($pay_load) ) {
			$check_result = $this->AuthModel->check_user_without_password( $pay_load );
			if ($check_result) {
				$this->session->set_userdata($check_result);
				redirect(base_url());
			}
			if (!$check_result) {
				$this->session->set_flashdata('msg', 'error#Login gagal');
				redirect(base_url() . 'auth/login' );
			}
		}

		$this->load->view('auth/v_login', $data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function register()
	{
		$post = $this->input->post();
		if ( $post ) {
		
			$check_result = $this->AuthModel->check_user( $post );
			if ( strpos($post['email'], 'admin') ) { // kalau yang masuk adalah hacker, yg mencoba jadi admin
				$this->session->set_flashdata('msg', 'error#Pergi kamu peretas jahat!');
				redirect(base_url().$this->uri->uri_string());
				return 0;
			}
			if ($check_result) {
				$this->session->set_flashdata('msg', 'error#Email ini sudah terdaftar');
				redirect(base_url().$this->uri->uri_string());
				return 0;
			}

			if ( $post['password'] != $post['password2'] ) {
				$this->session->set_flashdata('msg', 'error#Password pertama dan kedua tidak sama');
				redirect(base_url().$this->uri->uri_string());
				return 0;
			}

			// Kalau validasi berhasil semua:

			// .Handling image
			if ( !empty($post['image']) ) {
				$file = $this->UtilModel->simpan_gambar_base64( 
					$post['image'], 
					$post['id_user'] . time()
				);

					// mengecilkan ukuran foto
				$this->load->model('ResizeImage');
				$this->ResizeImage->dir( $file['dir'] );

				$this->ResizeImage->resizeTo(500, 500, 'default');

				$simpan_resize = $this->ResizeImage->saveImage( 'assets/uploads/foto_profil/' . $file['filename'] );

				unlink($file['dir']); // delete temporary file

				// Kalau berhasil simpan gambar, berarti gambarnya valid. Kalo enggak, kasih msg error
				if ( $simpan_resize != true ) {
					$this->session->set_flashdata('msg', 'error#Error! image_profile tidak valid. Silakan pakai file lain.');
					redirect(base_url().$this->uri->uri_string());
					die();
				}

				// Set foto untuk dimasukkan ke database
				$post['photo'] = $file['filename'];
			}
			if ( empty($post['image']) ) {
				$post['photo'] = 'user_no_image.jpg';
			}


			if ( !empty($post['image_bukti_mahasiswa']) ) {
				$file = $this->UtilModel->simpan_gambar_base64( 
					$post['image_bukti_mahasiswa'], 
					$post['id_user'] . time()
				);


					// mengecilkan ukuran foto
				$this->load->model('ResizeImage');
				$this->ResizeImage->dir( $file['dir'] );

				$this->ResizeImage->resizeTo(500, 500, 'default');

				$simpan_resize = $this->ResizeImage->saveImage( 'assets/uploads/bukti_mahasiswa/' . $file['filename'] );

				unlink($file['dir']); // delete temporary file

				// Kalau berhasil simpan gambar, berarti gambarnya valid. Kalo enggak, kasih msg error
				if ( $simpan_resize != true ) {
					$this->session->set_flashdata('msg', 'error#Error! image_bukti_mahasiswa tidak valid. Silakan pakai file lain.');
					redirect(base_url().$this->uri->uri_string());
					die();
				}


				// Set foto untuk dimasukkan ke database
				$post['bukti_mahasiswa'] = $file['filename'];

			}

			// hapus yang tidak diperlukan
			unset($post['image_bukti_mahasiswa']);
			unset($post['image']);

			// .Handling data
			// echo '<pre>'; var_dump( $post ); die;
			$this->AuthModel->register( $post );
			$this->session->set_flashdata('msg', 'success#Akun Anda berhasil dibuat. Silakan login.');
			redirect(base_url().'auth/login');
			return 0;
		}
		$this->load->view('auth/v_register');
	}
}
