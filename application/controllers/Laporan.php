<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Beranda_model');
        is_logged_in(); //dari helper
        role_id_1(); //daru helper
    }
    public function guru()
    {
        $data['sekolah'] = $this->Beranda_model->get_allSekolah();
        $data['judul_halaman'] = 'Laporan Guru';
        $this->load->view('sekolah/guru', $data);
    }

    public function lp_guru($id_sekolah)
    {
        $data['judul_halaman'] = 'Laporan Data Guru';
        $data['guru'] = $this->db->get_where('guru', ['user_id' => $id_sekolah])->result();
        $this->load->view('sekolah/guru_laporan', $data);
    }

    public function guru_detail($Guru_id)
    {
        $data['judul_halaman'] = "Detail Guru";
        $data['diklat'] = $this->db->get_where('pengalaman_diklat', ['guru_id' => $Guru_id])->result();
        $data['organis'] = $this->db->get_where('pengalaman_organisasi', ['guru_id' => $Guru_id])->result();
        $data['guru'] = $this->db->get_where('guru', ['id' => $Guru_id])->row();
        // var_dump($data['diklat']);
        $this->load->view('sekolah/guru_detail', $data);
    }

    public function kelas()
    {
        $data['sekolah'] = $this->Beranda_model->get_allSekolah();
        $data['judul_halaman'] = 'Laporan Kelas';
        $this->load->view('sekolah/kelas', $data);
    }

    public function lp_kelas($id_sekolah)
    {
        $data['kelas'] = $this->db->get_where('kelas', ['user_id' => $id_sekolah])->result();
        $data['judul_halaman'] = 'Data Kelas';
        $this->load->view('kelas/laporan', $data);
    }

    public function siswa()
    {
        $data['sekolah'] = $this->Beranda_model->get_allSekolah();
        $data['judul_halaman'] = 'Laporan Kelas';
        $this->load->view('sekolah/siswa', $data);
    }

    public function lp_siswa($id_sekolah)
    {
        $data['siswa'] = $this->db->get_where('siswa', ['user_id' => $id_sekolah])->result();
        $data['judul_halaman'] = 'Data Siswa';
        $this->load->view('siswa/laporan', $data);
    }

    public function penggunaan()
    {
        $data['sekolah'] = $this->Beranda_model->get_allSekolah();
        $data['judul_halaman'] = 'Laporan Penggunaan';
        $this->load->view('sekolah/penggunaan', $data);
    }

    public function lp_penggunaan($id_sekolah)
    {
        $data['penggunaan'] = $this->db->get_where('rencana_penggunaan', ['user_id' => $id_sekolah])->result();

        $data['judul_halaman'] = 'Pengeluaran Sekolah';
        $this->load->view('keuangan/pengeluaran/laporan', $data);
    }

    public function pendapatan()
    {
        $data['sekolah'] = $this->Beranda_model->get_allSekolah();
        $data['judul_halaman'] = 'Laporan Pendapatan';
        $this->load->view('sekolah/pendapatan', $data);
    }

    public function lp_pendapatan($id_sekolah)
    {
        $data['rencana_pendapatan'] = $this->db->get_where('rencana_pendapatan', ['user_id' => $id_sekolah])->result();

        $data['judul_halaman'] = 'Laporan Pendapatan Sekolah';
        $this->load->view('keuangan/pendapatan/laporan', $data);
    }
}
