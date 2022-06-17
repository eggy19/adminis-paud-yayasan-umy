<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profil extends CI_Controller
{
    public function index()
    {
        $data['judul_halaman'] = 'Profil Sekolah';
        $this->load->view('profil/index', $data);
    }

    public function tambah()
    {
        $this->load->view('profil/tambah');
    }

    public function ubah()
    {
        $this->load->view('profil/ubah');
    }

    public function hapus()
    {
        $this->load->view('profil/hapus');
    }
}
