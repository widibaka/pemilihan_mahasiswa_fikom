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
	public function update($data, $id_kandidat)
	{
		$this->db->where('id_kandidat', $id_kandidat);
		$this->db->update($this->table, $data);
	}
	public function add($data)
	{
		$this->db->insert($this->table, $data);
	}
	public function delete($id_kandidat)
	{
		$this->db->where('id_kandidat', $id_kandidat);
		$this->db->delete($this->table);
	}
}
