<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {
	public $table = 'pemilwa_settings';
	public function get_settings()
	{
		$this->db->limit(1);
		$this->db->where('id_settings', 1);
		return $this->db->get( $this->table )->row_array();
	}
	public function update_settings($data)
	{
		$this->db->update($this->table, $data);
	}
}
