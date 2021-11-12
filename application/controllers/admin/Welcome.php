<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ( !$this->session->userdata('nama_admin') ) {
			$this->HmpModel->set_alert('danger', '⚠️ Session Anda telah habis.');
			redirect( base_url() . 'admin/auth/login' );
		}
		
	}
	public function index()
	{
		$data['title'] = 'Admin';

		$data['settings'] = $this->SettingsModel->get_settings();

		$data['organisasi'] = $this->ModelOrganisasi->getAll();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/v_welcome', $data);
		$this->load->view('admin/templates/footer', $data);
		$this->load->view('admin/v_welcome_JS', $data);
	}

	public function tambah_ormawa()
	{
		$this->load->model('ModelOrganisasi');
	
		$data = $this->input->post();

		$this->ModelOrganisasi->add($data);
		redirect( base_url() . 'admin/welcome/' );

	}


}
