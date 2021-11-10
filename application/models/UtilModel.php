<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilModel extends CI_Model {

	public function simpan_gambar_base64($data, $filename)
	{
	  $data = str_replace('[removed]', '', $data);

	  $data = str_replace(' ', '+', $data);

	  $data = base64_decode($data);

	  // header('Content-Type: image/jpeg');

	  $file = 'assets/uploads/temp/'. $filename . '.jpeg';

	  $success = file_put_contents($file, $data);

	  $data = [
	  	'dir' => $file,
	  	'filename' => $filename . '.jpeg'
	  ];
	  return $data;
	  # Di bawah ini kalau mau ROTASI

	  // $data = base64_decode($data); 

	  // $source_img = imagecreatefromstring($data);

	  // $rotated_img = imagerotate($source_img, 90, 0); 

	  // $file = 'presensi_img/'. rand(). '.jpeg';

	  // $imageSave = imagejpeg($rotated_img, $file, 10);

	  // imagedestroy($source_img);
	}

	public function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'tahun',
	        'm' => 'bulan',
	        'w' => 'minggu',
	        'd' => 'hari',
	        'h' => 'jam',
	        'i' => 'menit',
	        's' => 'detik',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' lalu' : 'Baru saja';
	}
	
}
