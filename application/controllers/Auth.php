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

    // cek kondisi udah login belum
    // public function cek_login()
    // {
    //     //cek session username
    //     if ($this->CI->session->userdata('username') == "") {
    //         $this->CI->session->flashdata('warning', 'Anda Belum Login');
    //         redirect(base_url('auth'));
    //     }
    // }

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
}
