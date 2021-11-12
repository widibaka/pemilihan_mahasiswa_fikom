<?php 

class Api extends CI_Controller
{
  public function jumlah_pemilih()
  {
    $this->load->model('ModelPemilih');
    $data['count'] = $this->ModelPemilih->hitung_seluruh_suara();
    echo json_encode($data);
  }

  public function pemilih_terakhir()
  {
    $this->load->model('ModelPemilih');
    $data = $this->ModelPemilih->get_pemilih_terakhir();
    $json['nama_pemilih'] = substr($data['nama_pemilih'], 0, 3) . '*****';
    echo json_encode($json);
  }
}
