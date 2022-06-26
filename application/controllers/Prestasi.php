<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $data['judul_halaman'] = 'Prestasi Sekolah';
        $this->load->view('prestasi/index', $data);
    }


    public function data_prestasi()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data prestasi by id user
        $data['prestasi'] = $this->db->get_where('prestasi', ['user_id' => $id_user])->result();
        $this->load->view('prestasi/data-table', $data);
    }

    public function simpan_prestasi()
    {
        $this->load->model('upload_model');
        $this->upload_model->uploadSertif();

        if ($this->upload->do_upload('sertifikat')) {
            $foto =  $this->upload->data('file_name');

            $data = [
                'user_id' => $this->input->post('user_id'),
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal' => $this->input->post('tanggal'),
                'lokasi' => $this->input->post('lokasi'),
                'sertifikat' => $foto
            ];
            $this->db->insert('prestasi', $data);
            redirect('prestasi/index');
        } else {

            $error = array('error' => $this->upload->display_errors());
        }
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $data['prestasi'] = $this->db->get_where('prestasi', array('id' => $id))->row();
        $this->load->view('prestasi/hapus', $data);
    }

    public function hapus_prestasi()
    {
        $id = $this->input->post('id');
        $prestasi = $this->db->get_where('prestasi', ['id' => $id])->row();
        $query = $this->db->delete('prestasi', array('id' => $id));

        if ($query) {
            unlink("./assets/sertif/" . $prestasi->sertifikat);
        }
    }
    //proses simpan ke db
}
