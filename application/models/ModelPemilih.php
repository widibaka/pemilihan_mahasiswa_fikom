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
	public function hitung_seluruh_suara()
	{
		return $this->db->get( $this->table )->num_rows();
	}
	public function get_pemilih_terakhir()
	{
		$this->db->limit(1);
		$this->db->order_by('waktu', 'DESC');
		return $this->db->get( $this->table )->row_array();
	}
}