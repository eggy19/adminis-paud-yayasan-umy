<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_model extends CI_Model
{
    public function uploadIMG()
    {
        $config['upload_path']          = './assets/img/foto_guru/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 4000;

        $this->load->library('upload', $config);
    }

    public function uploadFile()
    {

        $config['upload_path']          = './assets/berkas/';
        $config['allowed_types']        = 'pdf|jpg|png|xls|docx';
        $config['max_size']             = 6000;

        $this->load->library('upload', $config);
    }
}
