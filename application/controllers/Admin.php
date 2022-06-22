<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in(); //dari helper
        role_id_1(); //daru helper
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul_halaman'] = 'Tambah Artikel';
        $this->load->view('artikel/tambah', $data);
    }

    public function akun()
    {
        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'password tidak sama',
            'min_length' => 'password kepndekan!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get('user')->result_object();

            $data['judul_halaman'] = 'Akun Pengguna';
            $this->load->view('admin/akun/index', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'created_at' => time()
            ];
            // var_dump($data);
            $this->db->insert('user', $data);
            if ($data['role_id'] == 2) {

                $this->addProfil($data);
            }

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role=="alert">Selamat !!, Akun Telah dibuat silahkan Login</div>');

            redirect('admin/akun/index');
        }
    }

    private function addProfil($data)
    {
        $id = $this->db->query('SELECT id FROM user WHERE email="' . $data['email'] . '"')->row_array();

        $id = $id['id'];

        $profil = [
            'user_id' => $id,
            'npsn' => null,
            'nama_sekolah' => 'Paud/TK',
            'alamat' => null,
            'visi' => null,
            'misi' => null,
            'tujuan' => null,
            'logo' => null

        ];

        $this->db->insert('profil_sekolah', $profil);
    }

    //Halaman Upload File
    public function uploadfile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $data['judul_halaman'] = 'Upload File';
        $this->load->view('admin/upload/index', $data);
    }



    public function simpan_upload()
    {
        $this->load->model('upload_model');
        $this->upload_model->uploadFile();

        if ($this->upload->do_upload('uploadfile')) {
            $foto =  $this->upload->data('file_name');

            $data = [
                'user_id' => $this->input->post('user_id'),
                'nama_file' => $this->input->post('nama'),
                'file' => $foto
            ];
            $this->db->insert('upload', $data);
            redirect('admin/uploadfile');
        } else {

            $error = array('error' => $this->upload->display_errors());
        }
    }

    public function data_file()
    {
        $data['upload'] = $this->db->get('upload')->result_object();
        $this->load->view('admin/upload/data-table', $data);
    }

    public function hapus()
    {
        //ambil id_guru dari post ajax
        $id = $this->input->post('id');
        $data['upload'] = $this->db->get_where('upload', array('id' => $id))->row();
        $this->load->view('admin/upload/hapus', $data);
    }

    public function hapus_file()
    {
        $id = $this->input->post('id_file');
        $file = $this->db->get_where('upload', ['id' => $id])->row();
        $query = $this->db->delete('upload', array('id' => $id));

        if ($query) {
            unlink("./assets/berkas/" . $file->file);
        }
    }
}
