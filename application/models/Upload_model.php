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
        $config['allowed_types']        = 'pdf|jpg|png|xls|docx|doc';
        $config['max_size']             = 6000;

        $this->load->library('upload', $config);
    }

    public function uploadLogo()
    {
        $config['upload_path']          = './assets/img/logo_sekolah/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;

        $this->load->library('upload', $config);
    }

    public function uploadSertif()
    {

        $config['upload_path']          = './assets/sertifikat/';
        $config['allowed_types']        = 'pdf|jpg|png|docx|doc';
        $config['max_size']             = 6000;

        $this->load->library('upload', $config);
    }

    public function uploadAlbum()
    {

        $config['upload_path']          = './assets/img/albums/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 3000;

        $this->load->library('upload', $config);
    }

    public function download($id)
    {
        $query = $this->db->get_where('upload', array('id' => $id));
        return $query->row_array();
    }
}
