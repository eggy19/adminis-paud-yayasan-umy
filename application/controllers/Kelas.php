<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data['kelas'] = $this->db->get_where('kelas', ['user_id' => $user_id])->result();
        $data['judul_halaman'] = 'Data Kelas';
        $this->load->view('kelas/index', $data);
    }

    public function tambah()
    {
        $this->load->view('kelas/tambah');
    }

    public function ubah()
    {
        $id = $this->input->post('id');
        $data['kelas'] = $this->db->get_where('kelas', array('id' => $id))->row();
        $this->load->view('kelas/ubah', $data);
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $data['kelas'] = $this->db->get_where('kelas', array('id' => $id))->row();
        $this->load->view('kelas/hapus', $data);
    }

    public function simpanKelas()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data = [
            'user_id' => $user_id,
            'kelas' => $this->input->post('kelas'),
            'wali_kelas1' => $this->input->post('wali_kelas1'),
            'wali_kelas2' => $this->input->post('wali_kelas2')
        ];

        $this->db->insert('kelas', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $data['kelas'] . '</strong> Berhasil Ditambahkan!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('kelas');
    }

    public function ubahKelas()
    {
        $where = [
            'id' => $this->input->post('id'),
        ];

        $data = [
            'user_id' => $this->input->post('user_id'),
            'kelas' => $this->input->post('kelas'),
            'wali_kelas1' => $this->input->post('wali_kelas1'),
            'wali_kelas2' => $this->input->post('wali_kelas2')
        ];

        // echo json_encode($data);
        $this->db->where($where);
        $this->db->update('kelas', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $data['kelas'] . '</strong> Berhasil Diupdate!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('kelas');
    }

    public function hapusKelas()
    {
        $data = [
            'id' => $this->input->post('kelas_id'),
        ];

        echo json_encode($data);
        //     $this->db->delete('kelas', $data);
        //     $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     <strong>' .  $this->input->post('kelas') . '</strong> Berhasil Terhapus!.
        //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //     </button>
        // </div>');
        //     redirect('kelas');
    }
}
