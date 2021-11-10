<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
	public $table = 'galeri_user';
	public function get_all_admin()
	{
		$this->db->like('email', '@admin'); // <-- cari yang bukan admin
		$this->db->order_by('waktu_daftar', 'DESC'); // <-- cari yang bukan admin
		$this->db->select('id_user, email, username, password, terakhir_online');
		$data_new = $this->db->get( $this->table )->result_array();
		// unset( $data_new['password'] );
		return $data_new;
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
