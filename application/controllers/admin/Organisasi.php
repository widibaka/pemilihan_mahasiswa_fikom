<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');

		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
		
	}

	public function index($id_organisasi = 0)
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
		$this->load->view('admin/v_organisasi', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	public function pengaturan($id_organisasi = 0)
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
		$this->load->view('admin/organisasi/v_pengaturan', $data);
		$this->load->view('admin/templates/footer', $data);
		$this->load->view('admin/organisasi/v_pengaturan_JS', $data);
	}


}
