<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profil extends CI_Controller
{
    public function index()
    {
        //ambil data user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();

        //ambil data profil
        $data['profil'] = $this->db->get_where('profil_sekolah', ['user_id' => $user->id])->result();

        $data['judul_halaman'] = 'Profil Sekolah';
        $this->load->view('profil/index', $data);
    }

    public function tambah()
    {
        $this->load->view('profil/tambah');
    }

    public function ubah()
    {
        //ambil data user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        // var_dump($user->id);
        //ambil data profil
        $data['profil'] = $this->db->get_where('profil_sekolah', ['user_id' => $user->id])->result();

        $data['judul_halaman'] = 'Ubah Profil Sekolah';
        $this->load->view('profil/ubah', $data);
    }

    public function update()
    {
        $id = [
            'id' => $this->input->post('id')
        ];

        $data = [
            'user_id' => $this->input->post('id_user'),
            'npsn' => $this->input->post('npsn'),
            'nama_sekolah' => $this->input->post('sekolah'),
            'alamat' => $this->input->post('alamat'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'tujuan' => $this->input->post('tujuan'),
            'logo' => $this->input->post('logo')
        ];

        // var_dump($id, $data);
        $this->db->where($id);
        $this->db->update('profil_sekolah', $data);
        redirect('profil');
    }

    public function hapus()
    {
        $this->load->view('profil/hapus');
    }
}
