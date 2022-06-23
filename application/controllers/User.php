<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function yayasan()
    {
        $data['judul_halaman'] = 'Beranda';
        $this->load->view('beranda/index', $data);
    }

    public function sekolah()
    {
        $data['judul_halaman'] = 'Beranda';
        $this->load->view('beranda/index', $data);
    }

    public function download()
    {
        $data['upload'] = $this->db->get('upload')->result_object();
        $data['judul_halaman'] = 'Download Berkas';
        $this->load->view('download/index', $data);
    }
}
