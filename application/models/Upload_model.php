<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_model extends CI_Model
{
    public function uploadIMG()
    {
        $config['upload_path'] = FCPATH . '/assets/img/foto_guru/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '2500';
        $config['image_width']  = '500';
        $config['image_height']  = '800';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $data = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $data;
        } else {
            $error = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $error;
        }
    }

    public function uploadFile()
    {

        $config['upload_path']          = './assets/berkas/';
        $config['allowed_types']        = 'pdf|jpg|png|xls|docx';
        $config['max_size']             = 6000;

        $this->load->library('upload', $config);
    }
}
