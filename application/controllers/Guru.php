<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Upload_model');
        $this->load->library('form_validation');
        is_logged_in(); //dari helper
        role_id_2(); //daru helper
    }

    public function index()
    {
        $data['judul_halaman'] = 'Data Guru';
        $this->load->view('guru/index', $data);
    }

    public function tambah()
    {
        $this->load->view('guru/tambah');
    }

    public function tampilGuru()
    {
        $data['guru'] = $this->db->get('guru')->result();
        $this->load->view('guru/data_table', $data);
    }

    public function simpanGuru()
    {
        //ambil data user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $this->validasi();

        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            echo json_encode(['success' => 'Record added successfully.']);
        }



        // $data = [
        //     'user_id' => $user_id,
        //     'nama' => $this->input->post('nm_guru'),
        //     't_lahir' => $this->input->post('t_lahir'),
        //     'tgl_lahir' => $this->input->post('tgl_lahir'),
        //     'alamat' => $this->input->post('alamat'),
        //     'no_hp' => $this->input->post('no_hp'),
        //     'tmt' => $this->input->post('tmt'),
        //     'nbm' => $this->input->post('nbm'),
        //     'foto' =>  null
        // ];

        // var_dump($data);

        // $this->db->insert('guru', $data);
        // // redirect('guru/index');
        // json_encode('sukses');

        // $upload = $this->Upload_model->uploadIMG();
        // //cek upload gambar
        // if ($upload['result'] == "success") {

        // } else {
        //     $this->session->set_flashdata('error', $upload['error']);
        //     redirect(base_url('guru/index'), 'refresh');
        //     json_encode('gagal');
        // }
    }

    public function ubah()
    {
        //ambil id_guru dari post ajax
        $id = $this->input->post('id');
        $data['guru'] = $this->db->get_where('guru', array('id' => $id))->row();
        $this->load->view('guru/ubah', $data);
    }

    public function hapus()
    {
        //ambil id_guru dari post ajax
        $id = $this->input->post('id');
        $data['guru'] = $this->db->get_where('guru', array('id' => $id))->row();
        $this->load->view('guru/hapus', $data);
    }

    public function hapusGuru()
    {
        $id = $this->input->post('id_guru');
        $this->db->delete('guru', array('id' => $id));
    }

    private function validasi()
    {
        $this->form_validation->set_rules('nm_guru', 'nama', 'trim|required');
        $this->form_validation->set_rules('t_lahir', 't_lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('tmt', 'tmt', 'trim|required');
        $this->form_validation->set_rules('nbm', 'nbm', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required');
    }
}
