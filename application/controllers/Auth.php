<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');

        if ($this->form_validation->run() == false) {
            $data['judul_halaman'] = "Login";
            $this->load->view('login/index', $data);
        } else {
            $this->_login();
            // echo 'berhasil login';
        }
    }

    private function _login()
    {

        $email = $this->input->post('email');
        $pass = $this->input->post(('password'));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            // cek password
            if (password_verify($pass, $user['password'])) {
                // mengisi session
                $data = [
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                // var_dump($data);
                $this->session->set_userdata($data);

                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('user/sekolah');
                }
            } else {
                echo $pass;
                $this->session->set_flashdata('messege', '<div class="alert alert-danger" role=="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('messege', '<div class="alert alert-danger" role=="alert">Email Tidak Terdaftar!</div>');

            redirect('auth');
        }
    }

    public function blocked()
    {
        //ambil data id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();

        $data['role'] = $user->role_id;

        $data['judul_halaman'] = 'Forbidden 403';
        $this->load->view('errors/403', $data);
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('nama');

        $this->session->set_flashdata('messege', '<div class="alert alert-success" role=="alert">Berhasil Logged Out!</div>');
        redirect('auth');
    }

    public function ubahPassword()
    {
        is_logged_in();

        $this->form_validation->set_rules('pass_lama', 'Password Lama', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('pass_baru2', 'Ulang Password', 'required|trim|min_length[6]|matches[pass_baru]', [
            'matches' => 'password tidak sama',
            'min_length' => 'password kependekan!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul_halaman'] = "Ubah Password";
            $this->load->view('login/ubahPass', $data);
        } else {
            $email = $this->input->post('email');
            $pass_lama = $this->input->post('pass_lama');
            $pass_baru = $this->input->post('pass_baru');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            // cek password
            if (password_verify($pass_lama, $user['password'])) {
                // mengisi session
                $data = [
                    'nama' => htmlspecialchars($user['nama'], true),
                    'email' => htmlspecialchars($user['email'], true),
                    'password' => password_hash($pass_baru, PASSWORD_DEFAULT),
                    'role_id' =>  htmlspecialchars($user['role_id'], true),
                    'created_at' => $user['created_at']
                ];

                $where = ['id' => $user['id']];
                $this->db->where($where);
                $this->db->update('user', $data);

                $this->session->set_flashdata('msg', '<div class="alert alert-success" role=="alert">Berhasil Ubah Password!</div>');
                redirect('auth/ubahPassword');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role=="alert">Password Lama Salah!</div>');
                redirect('auth/ubahPassword');
            }
        }
    }

    public function lupaPassword($id)
    {
        is_logged_in();
        role_id_1();

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('pass_baru2', 'Ulang Password', 'required|trim|min_length[6]|matches[pass_baru]', [
            'matches' => 'password tidak sama',
            'min_length' => 'password kependekan!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul_halaman'] = "Lupa Password";
            $data['id'] = $id;
            $this->load->view('login/lupapass', $data);
        } else {
            $user = $this->db->get_where('user', ['id' => $id])->row_array();
            $pass_baru = $this->input->post('pass_baru');

            $data = [
                'nama' => htmlspecialchars($user['nama'], true),
                'email' => htmlspecialchars($user['email'], true),
                'password' => password_hash($pass_baru, PASSWORD_DEFAULT),
                'role_id' =>  htmlspecialchars($user['role_id'], true),
                'created_at' => $user['created_at']
            ];
            // var_dump($data);
            $where = ['id' => $id];
            $this->db->where($where);
            $this->db->update('user', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role=="alert">Berhasil Ubah Password!</div>');
            redirect('auth/ubahPassword');
        }
    }
}
