<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');

		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
		
	}
	public function index()
	{
		$post = $this->input->post();
		
		$data['title'] = 'Settings';

		$data['data_admin'] = $this->AdminModel->get_all_admin();
		$data['data_settings'] = $this->SettingsModel->get_settings();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/v_settings', $data);
		$this->load->view('admin/templates/footer', $data);
		$this->load->view('admin/v_settings_JS', $data);
	}

	public function hapus_admin($id_admin)
	{
		$this->AdminModel->delete($id_admin);
		redirect( base_url() . 'admin/settings/' );
	}

	public function tambah_admin()
	{
		$data = $this->input->post();
		$this->AdminModel->add_admin($data);
		redirect( base_url() . 'admin/settings/' );
	}

	public function update_settings()
	{
		$data = $this->input->post();
		$this->SettingsModel->update_settings($data);
		redirect( base_url() . 'admin/settings/' );
	}


}
