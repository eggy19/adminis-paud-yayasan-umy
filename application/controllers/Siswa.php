<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function index()
    {
        $data['judul_halaman'] = 'Data Siswa';
        $this->load->view('siswa/index', $data);
    }

    public function tambah()
    {
        $this->load->view('siswa/tambah');
    }

    public function ubah()
    {
        $this->load->view('siswa/ubah');
    }

    public function hapus()
    {
        $this->load->view('siswa/hapus');
    }
}
