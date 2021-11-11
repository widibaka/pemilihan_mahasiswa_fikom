<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelOrganisasi extends CI_Model {
	public $table = 'pemilwa_organisasi';
	public function getAll()
	{
		$this->db->order_by('nama_organisasi', 'ASC'); 
		return $this->db->get( $this->table )->result_array();
	}
	public function getOrganisasiByNamaOrganisasi($nama_organisasi)
	{
		$this->db->where('nama_organisasi', $nama_organisasi);
    $this->db->limit(1);
		return $this->db->get( $this->table )->row_array();
	}
	public function getOrganisasiById($id_organisasi)
	{
		$this->db->where('id_organisasi', $id_organisasi);
    $this->db->limit(1);
		return $this->db->get( $this->table )->row_array();
	}
	public function add($data)
	{
		$this->db->insert($this->table, $data);
	}
	public function update($data, $id_organisasi)
	{
		$this->db->where('id_organisasi', $id_organisasi);
		$this->db->update($this->table, $data);
	}
	public function delete($id_organisasi)
	{
		$this->db->where('id_organisasi', $id_organisasi);
		$this->db->delete($this->table);
	}
}
