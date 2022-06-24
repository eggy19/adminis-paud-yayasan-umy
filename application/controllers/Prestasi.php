<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in(); //dari helper
        role_id_2(); //daru helper
    }

    public function index()
    {
        $data['judul_halaman'] = 'Prestasi Sekolah';
        $this->load->view('prestasi/index', $data);
    }

    public function dataPrestasi()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data prestasi by id user
        $data['prestasi'] = $this->db->get_where('prestasi', ['user_id' => $id_user])->result();
        $this->load->view('prestasi/data-table', $data);
    }

    public function simpan()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;

        //proses simpan ke db
    }
}
