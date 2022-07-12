<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function index()
    {
        $data['judul_halaman'] = '404 Not Found!';
        $this->load->view('errors/404', $data);
    }
}
