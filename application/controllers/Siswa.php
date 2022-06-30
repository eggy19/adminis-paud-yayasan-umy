<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
        $data['judul_halaman'] = 'Data Siswa';
        $this->load->view('siswa/index', $data);
    }

    public function dataSiswa()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $query = "SELECT siswa.id, siswa.nomor_induk, siswa.nama, siswa.gender, siswa.t_lahir, siswa.tgl_lahir, siswa.bb, siswa.tb, siswa.lk, kelas.kelas from siswa JOIN kelas on siswa.id_kelas = kelas.id WHERE kelas.user_id='" . $user_id . "'";
        $data['siswa'] = $this->db->query($query)->result();
        $this->load->view('siswa/data_tabel', $data);
    }

    public function tambah()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data['kelas'] = $this->db->get_where('kelas', ['user_id' => $user_id])->result();
        $this->load->view('siswa/tambah', $data);
    }

    public function ubah()
    {
        //ambil id_siswa dari post ajax
        $id = $this->input->post('id');
        $query = "SELECT 
        siswa.id AS id_siswa,
        siswa.user_id,
        siswa.nomor_induk,
        siswa.nama,
        siswa.gender,
        siswa.t_lahir,
        siswa.tgl_lahir,
        siswa.id_kelas,
        siswa.bb,
        siswa.tb,
        siswa.lk,
        siswa.ortu,
        siswa.alamat,
        siswa.no_hp,
        kelas.kelas,
        kelas.id AS id_kelas
        FROM siswa JOIN kelas on siswa.id_kelas = kelas.id WHERE siswa.id = '" . $id . "'";

        $data['siswa'] = $this->db->query($query)->row();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data['kelas'] = $this->db->get_where('kelas', ['user_id' => $user_id])->result();

        // var_dump($data['siswa']);
        $this->load->view('siswa/ubah', $data);
    }

    public function hapus()
    {
        //ambil id_guru dari post ajax
        $id = $this->input->post('id');
        $data['siswa'] = $this->db->get_where('siswa', array('id' => $id))->row();
        $this->load->view('siswa/hapus', $data);
    }

    public function hapusSiswa()
    {
        $id = $this->input->post('id');
        $this->db->delete('siswa', array('id' => $id));
    }

    public function simpanSiswa()
    {
        //ambil data user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $this->validasi();
        $this->form_validation->set_rules('induk', 'Nomor Induk', 'trim|required|is_unique[siswa.nomor_induk]', [
            'is_unique' => 'Nomor Induk sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'trim|required|is_unique[siswa.no_hp]', [
            'is_unique' => 'No Telepon sudah terdaftar!'
        ]);
        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = [ //persiapan simpan ke db
                'user_id' => $user_id,
                'nomor_induk' => $this->input->post('induk'),
                'nama' => $this->input->post('nama'),
                'gender' => $this->input->post('gender'),
                't_lahir' => $this->input->post('t_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'id_kelas' => $this->input->post('kelas'),
                'bb' => $this->input->post('berat'),
                'tb' => $this->input->post('tinggi'),
                'lk' => $this->input->post('lingkar'),
                'ortu' => $this->input->post('ortu'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            ];

            $query =  $this->db->insert('siswa', $data);
            if ($query) {
                echo json_encode(['success' => 'Berhasil Disimpan']);
            } else {
                echo json_encode(['Error' => 'Gagal Disimpan']);
            }
        }
    }

    public function ubahSiswa()
    {

        $this->validasi();
        $this->form_validation->set_rules('induk', 'Nomor Induk', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'trim|required');

        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $where = [
                'id' => $this->input->post('id')
            ];

            $data = [ //persiapan simpan ke db
                'user_id' => $this->input->post('user_id'),
                'nomor_induk' => $this->input->post('induk'),
                'nama' => $this->input->post('nama'),
                'gender' => $this->input->post('gender'),
                't_lahir' => $this->input->post('t_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'id_kelas' => $this->input->post('kelas'),
                'bb' => $this->input->post('berat'),
                'tb' => $this->input->post('tinggi'),
                'lk' => $this->input->post('lingkar'),
                'ortu' => $this->input->post('ortu'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp')
            ];
            $this->db->where($where);
            $query =  $this->db->update('siswa', $data);
            if ($query) {
                echo json_encode(['success' => 'Berhasil Disimpan']);
            } else {
                echo json_encode(['Error' => 'Gagal Disimpan']);
            }
        }
    }

    public function laporan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data['siswa'] = $this->db->get_where('siswa', ['user_id' => $user_id])->result();
        $data['judul_halaman'] = 'Data Siswa';
        $this->load->view('siswa/laporan', $data);
    }

    private function validasi()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('t_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('berat', 'Berat Badan', 'trim|required');
        $this->form_validation->set_rules('tinggi', 'Tinggi Badan', 'trim|required');
        $this->form_validation->set_rules('lingkar', 'Lingkar Kepala', 'trim|required');
        $this->form_validation->set_rules('ortu', 'Nama Orang Tua', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
    }
}
