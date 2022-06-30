<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_model');
        is_logged_in(); //dari helper
    }

    public function dt($user_id)
    {
        // $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        // $user_id = $user->id;

        $data['lk'] = $this->Beranda_model->jml_lk_siswa($user_id);
        $data['pr'] = $this->Beranda_model->jml_pr_siswa($user_id);
        $data['jml_kelas'] = $this->Beranda_model->jml_kelas($user_id);
        $data['jml_guru'] = $this->Beranda_model->jml_guru($user_id);
        $data['jml_siswa'] = $this->Beranda_model->jml_siswa($user_id);
        $data['jml_prestasi'] = $this->Beranda_model->jml_prestasi($user_id);
        $data['profil'] = $this->Beranda_model->get_profil($user_id);
        $data['judul_halaman'] = 'Selamat Datang Di SIM Paud Yayasan Aisyiyah Banguntapan';
        $this->load->view('sekolah/index', $data);
    }
}
