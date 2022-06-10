<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function index()
	{
		$data['judul_halaman'] = 'Beranda';
		$this->load->view('template/content', $data);
	}
}
