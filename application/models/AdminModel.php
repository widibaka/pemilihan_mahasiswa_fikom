<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {
	public $table = 'pemilwa_admin';
	public function get_all_admin()
	{
		$data_new = $this->db->get( $this->table )->result_array();
		return $data_new;
	}
	public function add_admin($data)
	{
		$this->db->insert($this->table, $data);
	}
	public function delete($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		$this->db->delete($this->table);
	}



	public function check_user($data='')
	{
		$this->db->where('nama_admin', $data['nama_admin']);
		$this->db->where('password', $data['password']);
		$this->db->limit(1);
		$data_new = $this->db->get( $this->table )->row_array();
		unset( $data_new['password'] );
		return $data_new;
	}
}
