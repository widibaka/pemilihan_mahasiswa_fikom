<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelOrganisasi');

		if ( !$this->session->userdata('nama_admin') ) {
			$this->HmpModel->set_alert('danger', '⚠️ Session Anda telah habis.');
			redirect( base_url() . 'admin/auth/login' );
		}
		
	}

	/*
	* HALAMAN AWAL ORGANISASI
	*/

	public function index($id_organisasi = 0)
	{
		$data['main_data'] = $this->ModelOrganisasi->getOrganisasiById($id_organisasi);

		$data['title'] = $data['main_data']['nama_organisasi'];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/v_organisasi', $data);
		$this->load->view('admin/templates/footer', $data);
	}

	/*
	* PENGATURAN
	*/

	public function pengaturan($id_organisasi = 0)
	{
		$data['main_data'] = $this->ModelOrganisasi->getOrganisasiById($id_organisasi);

		$data['title'] = $data['main_data']['nama_organisasi'];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/organisasi/v_pengaturan', $data);
		$this->load->view('admin/templates/footer', $data);
		$this->load->view('admin/organisasi/v_pengaturan_JS', $data);
	}

	public function simpan_pengaturan($id_organisasi)
	{
		$data = $this->input->post();
		if ( !empty($this->do_upload()['file_name']) ) {
			$data['logo'] = $this->do_upload()['file_name'];
		}

		$this->ModelOrganisasi->update($data, $id_organisasi);
		redirect( base_url() . 'admin/organisasi/index/' . $id_organisasi );
	}

	public function do_upload()
	{
		// upload
		$config['upload_path']          = './assets/logo/';
		$config['allowed_types']        = 'svg|gif|jpg|jpeg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1094;
		$config['max_height']           = 1098;
		$config['file_name']           = time() . '-' . rand(10,100);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
						if ( $this->upload->display_errors() == '<p>Anda belum memilih berkas untuk diunggah.</p>' ) {
							return null;
							// jika memang  tidak memilih berkas, maka abaikan saja.
						}
						else{
							echo '<pre>'; 
							var_dump( $this->upload->display_errors() );
							die;
						}
		}
		else
		{
						return $this->upload->data();
		}
		
		// // resize
		// $config['image_library'] = 'gd2';
		// $config['source_image'] = '/path/to/image/mypic.jpg';
		// $config['create_thumb'] = TRUE;
		// $config['maintain_ratio'] = TRUE;
		// $config['width']         = 75;
		// $config['height']       = 50;

		// $this->load->library('image_lib', $config);

		// $this->image_lib->resize();
	}

	public function hapus_organisasi($id_organisasi)
	{
		$this->ModelOrganisasi->delete($id_organisasi);
		redirect( base_url() . 'admin/welcome' );
	}

	
}
