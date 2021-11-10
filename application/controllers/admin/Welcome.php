<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
		
	}
	public function index()
	{
		$post = $this->input->post();
		if ( $post ) {
			$this->AdminModel->add_admin( $post );
			redirect( base_url() . $this->uri->uri_string() );
		}
		$data['title'] = 'Admin';
		// $data['userdata'] = $this->AuthModel->get_user(
		// 	$this->session->userdata('id_user')
		// );

		$data['organisasi'] = $this->ModelOrganisasi->getAll();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/v_welcome', $data);
		$this->load->view('admin/templates/footer', $data);
		$this->load->view('admin/v_welcome_JS', $data);
	}


}
