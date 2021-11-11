<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat_ketua extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelOrganisasi');

		// if ( !$this->session->userdata('username') ) {
		// 	$this->session->set_flashdata( 'msg', 'error#Session Anda telah habis' );
		// 	redirect( base_url() . 'auth/login' );
		// }
		
	}

  /*
	* KANDIDAT
	*/

	public function index($id_organisasi)
	{
		
		$data['main_data'] = $this->ModelOrganisasi->getOrganisasiById($id_organisasi);
		$data['title'] = $data['main_data']['nama_organisasi'];

		$this->load->model("ModelKandidat");
		$data['kandidat'] = $this->ModelKandidat->getKandidatByIdOrganisasi($id_organisasi);
		$data['title'] = $data['main_data']['nama_organisasi'];

		$this->load->view('admin/templates/header', $data);
		$this->load->view("admin/organisasi/v_kandidat_ketua", $data);
		$this->load->view('admin/templates/footer', $data);
		$this->load->view("admin/organisasi/v_kandidat_ketua_JS", $data);
	}

	public function hapus_kandidat($id_organisasi, $id_kandidat)
	{
		$this->ModelKandidat->delete($id_kandidat);
		redirect( base_url() . 'admin/kandidat_ketua/index/' . $id_organisasi );
	}

	public function simpan_kandidat($id_organisasi, $id_kandidat)
	{
		$data = $this->input->post();
		$upload = $this->do_upload();
		if ( !empty($upload['file_name']) ) {
			$data['image'] = $upload['file_name'];
		}

		$this->ModelKandidat->update($data, $id_kandidat);
		redirect( base_url() . 'admin/kandidat_ketua/index/' . $id_organisasi );
	}

	public function tambah_kandidat($id_organisasi)
	{
		$data = $this->input->post();
		$this->ModelKandidat->add($data);
		redirect( base_url() . 'admin/kandidat_ketua/index/' . $id_organisasi );
	}

	public function do_upload()
	{
		// upload
		$config['upload_path']          = './assets/pemilu/';
		$config['allowed_types']        = 'svg|gif|jpg|jpeg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
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
}