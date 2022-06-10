<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function index()
    {
        $data['judul_halaman'] = 'Data Kelas';
        $this->load->view('kelas/index', $data);
    }
}
