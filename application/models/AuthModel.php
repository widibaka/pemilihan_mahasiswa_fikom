<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
	public $table = 'pemilwa_pemilih';
	public function check_user($data='')
	{
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}

	public function get_user_aktif()
	{
		$this->db->order_by('waktu_daftar', 'DESC');
		$this->db->where('diblokir', 0);
		$this->db->not_like('email', '@admin'); // <-- cari yang bukan admin
		$this->db->select('id_pemilih, email, username, password, hp, photo, bukti_mahasiswa, waktu_daftar, terakhir_online');
		$data_new = $this->db->get( $this->table )->result_array();
		// unset( $data_new['password'] );
		return $data_new;
	}
	public function get_user_diblokir()
	{
		$this->db->order_by('waktu_daftar', 'DESC');
		$this->db->where('diblokir', 1);
		$this->db->not_like('email', '@admin'); // <-- cari yang bukan admin
		$this->db->select('id_pemilih, email, username, password, hp, photo, bukti_mahasiswa, waktu_daftar, terakhir_online');
		$data_new = $this->db->get( $this->table )->result_array();
		// unset( $data_new['password'] );
		return $data_new;
	}

	public function get_user($id_pemilih='')
	{
		$this->db->where('id_pemilih', $id_pemilih);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}
	public function check_user_without_password($data='')
	{
		$this->db->where('email', $data['email']);
		// $this->db->where('password', $data['password']);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}
	public function register($data='')
	{
		unset($data['password2']);
		$data['waktu_daftar'] = time();
		$this->db->insert($this->table, $data);
	}
	public function edit_profil($id_pemilih='', $data)
	{
		$data = [
			'username' => $data['username'],
			'hp' => $data['hp'],
		];
		$this->db->where('id_pemilih', $id_pemilih);
		$this->db->update($this->table, $data);
	}
	public function ubah_gambar_profil($id_pemilih, $filename='')
	{
		$data = [
			'photo' => $filename,
		];
		$this->db->where('id_pemilih', $id_pemilih);
		$this->db->update($this->table, $data);
	}
	public function hapus_file_gambar_profil($id_pemilih)
	{
		$dir = 'assets/uploads/foto_profil/';
		$filename = $this->get_user( $id_pemilih )['photo'];
		
		// kalau tidak ada gambar, maka yaudah
		if ( !empty($filename OR $filename == 'user_no_image.jpg' ) ) {
			unlink( $dir . $filename );
			return true;
		}
		return false;
	}


	public function set_terakhir_online($id_pemilih)
	{
		$data = [
			'terakhir_online' => time(),
		];
		$this->db->where('id_pemilih', $id_pemilih);
		return $this->db->update($this->table, $data);
	}
	public function blokir_akun($id_pemilih)
	{
		$data = [
			'diblokir' => 1,
		];
		$this->db->where('id_pemilih', $id_pemilih);
		return $this->db->update($this->table, $data);
	}
	public function buka_blokir_akun($id_pemilih)
	{
		$data = [
			'diblokir' => 0,
		];
		$this->db->where('id_pemilih', $id_pemilih);
		return $this->db->update($this->table, $data);
	}

	public function get_admin_online_terakhir($ids_of_admin)
	{
		foreach ($ids_of_admin as $key => $val) {
			$this->db->or_where('id_pemilih', $val['id_pemilih']);
		}

		$this->db->order_by("terakhir_online", "DESC");
		$this->db->limit(1);
		
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}
}
