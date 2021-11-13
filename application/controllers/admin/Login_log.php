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
	public function index($limit = 15)
	{
		$data['title'] = 'Login Log Admin';

		$this->db->limit($limit);
		$this->db->order_by('waktu', 'DESC');
		$data['main_data'] = $this->db->get('pemilwa_login_log')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/v_login_log', $data);
		$this->load->view('admin/templates/footer', $data);
		// $this->load->view('admin/v_login_log_JS', $data);
	}


}
