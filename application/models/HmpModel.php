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

	public function check_email_pemilih($email)
	{
		$yuukensha = $this->db->get('pemilwa_hmp_yuukensha')->result_array();
		$status['email'] = false;
		$status['kosong'] = false;
		foreach ($yuukensha as $key => $value) {
			if ( $value['email'] == $email ) {
				$status['email'] = true;

				if ( $value['kohousha_index'] == 'karappo' ) {
					$status['kosong'] = true;
				}

			}
			
		}
		return $status;
	}

	public function check_kandidat_benar($kandidat)
	{
		$kohousha = $this->db->get('pemilwa_hmp_kohousha')->result_array();
		$status = false;
		foreach ($kohousha as $key => $value) {
			if ( $value['kohousha'] == $kandidat ) {
				$status = true;
			}
		}
		return $status;
	}
	public function refresh()
	{
		redirect( $this->uri->uri_string() );
	}
	public function add_yuukensha( $email, $nama, $pilihan )
	{
		$data = [
			'kohousha_index' => base64_encode($nama . '[-spt-]' . $pilihan),
			'jikan' => time(),
		];
		$this->db->where('email', $email);
		$this->db->update('pemilwa_hmp_yuukensha', $data);
	}
	public function hitung_jumlah_suara( )
	{
		$data = $this->db->get('pemilwa_hmp_yuukensha')->result_array();
		$andreas = 0;
		$matin = 0;
		$rifqi = 0;
		$seluruh = count($data);

		foreach ($data as $key => $value) {
			if ( $value['kohousha_index'] !== 'karappo' ) {
				$explode = explode( '[-spt-]', base64_decode($value['kohousha_index']));
				if ( $explode[1] == 'Andreas' ) {
					$andreas++;
				}
				elseif ( $explode[1] == 'Matin' ) {
					$matin++;
				}
				elseif ( $explode[1] == 'Rifqi' ) {
					$rifqi++;
				}
			}
		}

		$suara_masuk = $andreas + $matin + $rifqi;
		$golput = $seluruh - $suara_masuk;

		$hasil = [
			'andreas' => $andreas,
			'matin' => $matin,
			'rifqi' => $rifqi,
			'suara_masuk' => $suara_masuk,
			'seluruh' => $seluruh,
			'golput' => $golput,
		];

		return $hasil;
	}
}