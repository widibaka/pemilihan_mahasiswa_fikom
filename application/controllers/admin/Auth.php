<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect( base_url() . 'admin/auth/login' );
	}
	public function login()
	{
		$this->load->model('HmpModel');
		$this->load->model('AdminModel');
		if ( $this->input->post() ) {
			$check_result = $this->AdminModel->check_user( $this->input->post() );
			if ($check_result) {

				// Memulai session
				$this->session->set_userdata($check_result);

				// tulis di login log
				$this->db->insert('pemilwa_login_log', [
					'nama_admin' => $check_result['nama_admin'],
					'waktu' => date('Y-m-d H:i:s'),
				]);

				redirect(base_url() . 'admin/welcome');
			}
			if (!$check_result) {
				$this->HmpModel->set_alert('danger', '⚠️ Error! Silakan coba lagi.'); // <-- untuk testing
				$this->HmpModel->refresh();
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
