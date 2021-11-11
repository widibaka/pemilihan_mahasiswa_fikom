<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelKandidat extends CI_Model {
	public $table = 'pemilwa_kandidat';
	public function getKandidatByIdOrganisasi($id_organisasi)
	{
		$this->db->order_by('nama_kandidat', 'ASC'); 
		$this->db->where('id_organisasi', $id_organisasi);
		return $this->db->get( $this->table )->result_array();
	}
	public function add_admin($data)
	{
		$data['email'] = $data['email'] . '@admin.hmpti';
		$data['admin'] = 1;
		$data['waktu_daftar'] = time();
		$data['photo'] = 'user_no_image.jpg';
		$this->db->insert($this->table, $data);

		// data 2, untuk ngisi tabel admin. Ini tabel gunanya buat apa saya lupa tapi seingatku ini penting
		$data2 = [
			'id_user' => $data['id_user']
		];
		$this->db->insert('galeri_admin', $data2);
	}
	public function delete($data)
	{
		$this->db->insert($this->table, $data);
	}
}
