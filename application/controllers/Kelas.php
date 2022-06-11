<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function index()
    {
        $data['judul_halaman'] = 'Data Kelas';
        $this->load->view('kelas/index', $data);
    }

    public function tambah()
    {
        $this->load->view('kelas/tambah');
    }

    public function ubah()
    {
        $this->load->view('kelas/ubah');
    }

    public function hapus()
    {
        $this->load->view('kelas/hapus');
    }
}
