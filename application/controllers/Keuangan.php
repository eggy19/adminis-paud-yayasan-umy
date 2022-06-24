<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in(); //dari helper
        role_id_2(); //daru helper
    }

    // PENDAPATAN
    public function pendapatan()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data by id
        $data['pendapatan'] = $this->db->get_where('rencana_pendapatan', ['id' => $id_user])->result();

        $data['judul_halaman'] = 'Pendapatan Sekolah';
        $this->load->view('keuangan/pendapatan/index', $data);
    }

    public function tambah_dapat()
    {
        $this->load->view('keuangan/pendapatan/tambah');
    }

    //pengeluaran
    public function pengeluaran()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data by id
        $data['penggunaan'] = $this->db->get_where('rencana_penggunaan', ['id' => $id_user])->result();

        $data['judul_halaman'] = 'Pengeluaran Sekolah';
        $this->load->view('keuangan/pengeluaran/index', $data);
    }

    public function tambah_keluar()
    {

        $this->load->view('keuangan/pengeluaran/tambah');
    }
}
