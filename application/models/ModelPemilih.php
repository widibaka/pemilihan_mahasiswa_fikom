<?php 

/**
 * Korek Software Model
 */
class ModelPemilih extends CI_Model
{
	public $table = 'pemilwa_pemilih';
	public function hitung_suara_per_kandidat( $id_kandidat )
	{
		$this->db->where('id_kandidat', $id_kandidat);
		$query = $this->db->get( $this->table );
		return $query->num_rows();
	}
}