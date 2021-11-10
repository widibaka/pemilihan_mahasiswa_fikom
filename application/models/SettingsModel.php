<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {
	public $table = 'galeri_settings';
	public function get_settings()
	{
		$this->db->limit(1);
		$this->db->where('id_setting', 1);
		return $this->db->get( $this->table )->row_array();
	}
	public function update_settings($data)
	{
		$this->db->update($this->table, $data);
	}
	
	public function get_syarat_ketentuan()
	{
		$this->db->select('syarat_ketentuan');
		$data_new = $this->db->get( $this->table )->row_array()['syarat_ketentuan'];
		// unset( $data_new['password'] );
		return $data_new;
	}
}
