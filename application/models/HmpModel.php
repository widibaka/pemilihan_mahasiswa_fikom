<?php 

/**
 * Korek Software Model
 */
class HmpModel extends CI_Model
{
	function __construct()
	{
		# code...
	}
	public function set_alert($jenis, $pesan)
	{
		// jenis alert ada danger, warning, success
		$this->session->set_flashdata('alert', '<div class="alert alert-' . $jenis . '" role="alert">' . $pesan . '</div>');
	}

	public function check_email_sudah_memilih($email, $id_organisasi)
	{
		$this->db->where('id_organisasi', $id_organisasi);
		$this->db->where('email', $email);
		$result = $this->db->get('pemilwa_pemilih')->num_rows();
		if ($result==null) {
			return false;
		} else {
			return true;
		}
		
	}

	public function get_prodi_from_kode($kode_prodi)
	{
		switch ($kode_prodi) {
			case '01':
				return 'si';
				break;
				
			case '02':
				return 'mi';
				break;
				
			case '03':
				return 'ti';
				break;
				
			case '04':
				return 'tk';
				break;
			
			default:
				return false;
				break;
		}
	}

	public function check_email_udb($email)
	{
		$pattern = "/udb.ac.id/i";
		$status = false;

		// jika email udb, maka statusnya true
		if ( !empty( preg_match($pattern, $email) ) ) {
			$status = true;
		}

		return $status;
	}

	public function check_prodi($nim, $id_organisasi)
	{
		// cari tahu prodi dari si pemilih
		$kode_prodi = substr($nim, 4, 2);
		$prodi = $this->get_prodi_from_kode($kode_prodi);




		// ambil data dari db
		$this->db->where("id_organisasi", $id_organisasi);
		$organisasi = $this->db->get('pemilwa_organisasi')->row_array();
		$status = false;

		// jika prodi dari pemilih memang dibolehkan mengirim suara, maka statusnya true
		if ( $organisasi[$prodi] == 1 ) {
			$status = true;
		}

		return $status;
	}

	public function nim_2_prodi($nim)
	{
		// cari tahu prodi dari si pemilih
		$kode_prodi = substr($nim, 4, 2);
		$prodi = $this->get_prodi_from_kode($kode_prodi);

		switch ($prodi) {
			case 'si':
				return '(SI) S1 - Sistem Informasi';
				break;
			case 'mi':
				return '(MI) D3 - Manajemen Informatika';
				break;
			case 'ti':
				return '(TI) S1 - Teknik Informatika';
				break;
			case 'tk':
				return '(TK) D3 - Teknik Komputer';
				break;
			default:
				echo "ERROR! Saat mengubah nim menjadi Prodi. Silakan check kembali nim Anda."; die;
				break;
			
		}

	}

	public function nim_2_angkatan($nim)
	{
		// cari tahu prodi dari si pemilih
		$kode_angkatan = substr($nim, 0, 2);
		return $kode_angkatan;

	}

	public function check_kandidat_benar($id_kandidat)
	{
		$kohousha = $this->db->get('pemilwa_kandidat')->result_array();
		$status = false;
		foreach ($kohousha as $key => $value) {
			if ( $value['id_kandidat'] == $id_kandidat ) {
				$status = true;
			}
		}
		return $status;
	}

	public function check_email_pemilih_khusus($email_pemilih, $id_organisasi)
	{
		// ambil data dari db
		$this->db->where("id_organisasi", $id_organisasi);
		$organisasi = $this->db->get('pemilwa_organisasi')->row_array();
		$status = false;


		if ( $organisasi['email_khusus'] == 1 ) {
			// cari di daftar email khusus
			$this->db->where("id_organisasi", $id_organisasi);
			$pemilih_khusus = $this->db->get('pemilwa_pemilih_khusus')->result_array();

			// kalau ada di dalam daftar, maka true
			foreach ($pemilih_khusus as $key => $pemilih_khus) {
				if ( $pemilih_khus['email'] == $email_pemilih ) {
					$status = true;
				}
			}

		}

		return $status;
	}

	public function refresh()
	{
		redirect( $this->uri->uri_string() );
	}
	public function add_yuukensha( $data )
	{
		$data = [
			'email' => $data['email'],
			'nama_pemilih' => $data['nama_pemilih'],
			'nim_mahasiswa' => $data['nim_mahasiswa'],
			'prodi' => $data['prodi'],
			'angkatan' => $data['angkatan'],
			'id_kandidat' => $data['id_kandidat'],
			'id_organisasi' => $data['id_organisasi'],
			'waktu' => $data['waktu'],
		];
		$this->db->insert('pemilwa_pemilih', $data);
	}
	public function hitung_jumlah_suara( $id_organisasi )
	{
		

		// ambil data kandidat
		$this->load->model('ModelKandidat');
		$data_kandidat = $this->ModelKandidat->getKandidatByIdOrganisasi( $id_organisasi );
		// substitusikan jumlah suara untuk tiap kandidat
		foreach ($data_kandidat as $key => $val) {
			$this->load->model('ModelPemilih');
			$data_kandidat[$key]['jumlah_suara'] = $this->ModelPemilih->hitung_suara_per_kandidat( $val['id_kandidat'] );
		}

		$hasil['data_kandidat'] = $data_kandidat;
		
		$this->db->where('id_organisasi', $id_organisasi);
		$query = $this->db->get('pemilwa_pemilih');
		$hasil['seluruh'] = $query->num_rows();

		return $hasil;
	}
}