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

        $this->validasi(); //method validasi input
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'trim|required|is_unique[guru.no_hp]', [
            'is_unique' => 'No Telepon sudah terdaftar!'
        ]);

        if ($this->form_validation->run() == false) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            //alur dan validasi untuk upload
            $this->load->model('upload_model');
            $this->upload_model->uploadIMG();
            if ($this->upload->do_upload('foto')) { //jika foto ada

                $data = [ //persiapan simpan ke db
                    'user_id' => $user_id,
                    'nama' => $this->input->post('nm_guru'),
                    't_lahir' => $this->input->post('t_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'alamat' => $this->input->post('alamat'),
                    'no_hp' => $this->input->post('no_hp'),
                    'tmt' => $this->input->post('tmt'),
                    'nbm' => $this->input->post('nbm'),
                    'foto' =>  $this->upload->data('file_name')
                ];


                $query =  $this->db->insert('guru', $data);
                if ($query) {
                    echo json_encode(['success' => 'Berhasil Disimpan']);
                } else {
                    echo json_encode(['Error' => 'Gagal Disimpan']);
                }
            } else {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
        }
    }

    public function ubah()
    {
        //ambil id_guru dari post ajax
        $id = $this->input->post('id');
        $data['guru'] = $this->db->get_where('guru', array('id' => $id))->row();
        $this->load->view('guru/ubah', $data);
    }

    public function ubahGuru()
    {
        $this->validasi(); //method validasi input
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'trim|required');
        if ($this->form_validation->run() == false) { //cek validasi input
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $cek_foto = $_FILES['foto']['name'];
            $input_foto = $this->input->post('exist_foto'); //dari input exist_foto
            //cek ada foto atau tidak
            if ($cek_foto != null) {

                unlink('./assets/img/foto_guru/' . $input_foto); //hapus foto sebelumnya
                //alur dan validasi untuk upload
                $this->load->model('upload_model');
                $this->upload_model->uploadIMG();
                if ($this->upload->do_upload('foto')) { //jika foto ada
                    $foto = $this->upload->data('file_name');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    echo json_encode($error);
                }
            } else {
                $foto = $input_foto;
            }

            $where = [
                'id' => $this->input->post('id_guru')
            ];

            $data = [ //persiapan simpan ke db
                'user_id' => $this->input->post('user_id'),
                'nama' => $this->input->post('nm_guru'),
                't_lahir' => $this->input->post('t_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'tmt' => $this->input->post('tmt'),
                'nbm' => $this->input->post('nbm'),
                'foto' =>  $foto
            ];
            $this->db->where($where);
            $this->db->update('guru',  $data);

            echo json_encode(['success' => 'Berhasil Ubah Data']);
        }
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
        $this->form_validation->set_rules('nm_guru', 'Nama Guru', 'trim|required');
        $this->form_validation->set_rules('t_lahir', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('tmt', 'TMT', 'trim|required');
        $this->form_validation->set_rules('nbm', 'NBM', 'trim|required');
    }
}
