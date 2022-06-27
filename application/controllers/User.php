<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_model');
        is_logged_in(); //dari helper
    }

    public function yayasan()
    {
        $data['judul_halaman'] = 'Beranda';
        $this->load->view('beranda/index', $data);
    }

    public function sekolah()
    {
        role_id_2();
        //ambil data id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data['jml_kelas'] = $this->Beranda_model->jml_kelas($user_id);
        $data['jml_guru'] = $this->Beranda_model->jml_guru($user_id);
        $data['jml_siswa'] = $this->Beranda_model->jml_siswa($user_id);
        $data['jml_prestasi'] = $this->Beranda_model->jml_prestasi($user_id);
        $data['profil'] = $this->Beranda_model->get_profil($user_id);
        $data['judul_halaman'] = 'Selamat Datang Di SIM Paud Yayasan Aisyiyah Banguntapan';
        $this->load->view('beranda/index', $data);
    }

    public function download()
    {
        $data['upload'] = $this->db->get('upload')->result_object();
        $data['judul_halaman'] = 'Download Berkas';
        $this->load->view('download/index', $data);
    }
    public function download_file($id)
    {
        $this->load->model('upload_model');
        $this->load->helper('download');
        $fileinfo = $this->upload_model->download($id);
        $file = './assets/berkas/' . $fileinfo['file'];
        force_download($file, NULL);
    }
}
