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
}
