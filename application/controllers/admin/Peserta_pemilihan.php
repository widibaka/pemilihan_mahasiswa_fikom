
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_pemilihan extends CI_Controller {

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
	* KANDIDAT
	*/

	public function index($id_organisasi)
	{
		$data['main_data'] = $this->ModelOrganisasi->getOrganisasiById($id_organisasi);

    // cari di daftar email khusus
    $this->db->where("id_organisasi", $id_organisasi);
		$data['email_khusus'] = $this->db->get('pemilwa_pemilih_khusus')->result_array();

		$data['title'] = $data['main_data']['nama_organisasi'];

		$this->load->view('admin/templates/header', $data);
		$this->load->view("admin/organisasi/v_peserta_pemilihan", $data);
		$this->load->view('admin/templates/footer', $data);
		$this->load->view("admin/organisasi/v_peserta_pemilihan_JS", $data);
	}

	public function simpan($id_organisasi)
	{
    $data = [
        "si" => "0",
        "mi" => "0",
        "ti" => "0",
        "tk" => "0",
        "email_khusus" => "0"
    ];
    foreach ($this->input->post() as $key => $val) {
      $data[$key] = $val;
    }

		$this->ModelOrganisasi->update($data, $id_organisasi);
		redirect( base_url() . 'admin/Peserta_pemilihan/index/' . $id_organisasi );
	}

  // EMAIL KHUSUS 

	public function tambah_email($id_organisasi)
	{
    $array = preg_split("/\r\n|\n|\r/", $this->input->post('email'));
    foreach ($array as $key => $val) {
      $data = [
        'email' => $val,
        'id_organisasi' => $id_organisasi
      ];
      $this->db->insert('pemilwa_pemilih_khusus', $data);
    }
    
		redirect( base_url() . 'admin/Peserta_pemilihan/index/' . $id_organisasi );
	}

	public function hapus($id_organisasi, $id_pem_khus)
	{
    $this->db->where('id_pem_khus', $id_pem_khus);
    $this->db->delete('pemilwa_pemilih_khusus');
		redirect( base_url() . 'admin/Peserta_pemilihan/index/' . $id_organisasi );
	}

}