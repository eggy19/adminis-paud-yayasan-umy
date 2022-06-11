<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function index()
	{
		$data['judul_halaman'] = 'SELAMAT DATANG DI SISTEM ADMINISTRASI YAYASAN AISYIYAH BANGUNTAPAN';
		$this->load->view('template/content', $data);
	}
}
