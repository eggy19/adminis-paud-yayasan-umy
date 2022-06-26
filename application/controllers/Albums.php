<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Albums extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data['title'] = 'Albums';
        $data['album'] = $this->db->get_where('album', ['user_id' => $user_id])->result();
        $data['judul_halaman'] = 'Galeri Foto Kegiatan';
        $this->load->view('albums/index', $data);
    }

    public function create()
    {
        //ambil data id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $data['user_id'] = $user->id;

        $data['judul_halaman'] = 'Galeri Foto Kegiatan';
        $this->load->view('albums/create', $data);
    }

    public function simpan_album()
    {
        $this->load->model('upload_model');
        $this->upload_model->uploadAlbum();

        if ($this->upload->do_upload('gambar')) {
            $foto =  $this->upload->data('file_name');

            $data = [
                'user_id' => $this->input->post('user_id'),
                'judul' => $this->input->post('judul'),
                'gambar' => $foto
            ];
            $this->db->insert('album', $data);
            redirect('albums/index');
        } else {

            $error = array('error' => $this->upload->display_errors());
            echo $error;
        }
    }
}
