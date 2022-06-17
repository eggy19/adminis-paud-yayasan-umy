<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function index()
    {
        $data['judul_halaman'] = 'Data Guru';
        $this->load->view('guru/index', $data);
    }

    public function tambah()
    {
        $this->load->view('guru/tambah');
    }

    public function ubah()
    {
        $this->load->view('guru/ubah');
    }

    public function hapus()
    {
        $this->load->view('guru/hapus');
    }
}
