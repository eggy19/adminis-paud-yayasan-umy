<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function tambah()
    {
        $data['judul_halaman'] = 'Tambah Artikel';
        $this->load->view('artikel/tambah', $data);
    }
}
