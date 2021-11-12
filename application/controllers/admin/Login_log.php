<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');

		if ( !$this->session->userdata('nama_admin') ) {
			$this->HmpModel->set_alert('danger', '⚠️ Session Anda telah habis.');
			redirect( base_url() . 'admin/auth/login' );
		}
		
	}
	public function index()
	{
		$post = $this->input->post();
		if ( $post ) {
			$this->AdminModel->add_admin( $post );
			redirect( base_url() . $this->uri->uri_string() );
		}
		$data['title'] = 'Admin';
		$data['userdata'] = $this->AuthModel->get_user(
			$this->session->userdata('id_user')
		);

		$data['main_data'] = $this->AdminModel->get_all_admin();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/v_login_log', $data);
		$this->load->view('admin/templates/footer', $data);
		// $this->load->view('admin/v_login_log_JS', $data);
	}


}
