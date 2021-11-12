<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect( base_url() . 'admin/auth/login' );
	}
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
				redirect(base_url() . 'admin/auth/login' );
			}
		}

		$data['settings'] = $this->SettingsModel->get_settings();

		$this->load->view('admin/auth/v_login', $data);
	}
	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
