<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profil extends CI_Controller
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

        $cek_foto = $_FILES['logo']['name'];
        $input_foto = $this->input->post('exist_logo'); //dari input exist_foto
        var_dump($cek_foto);

        //cek ada foto atau tidak
        if ($cek_foto != null) {

            unlink('./assets/img/logo_sekolah/' . $input_foto); //hapus foto sebelumnya
            //alur dan validasi untuk upload
            $this->load->model('upload_model');
            $this->upload_model->uploadLogo();
            if ($this->upload->do_upload('logo')) { //jika foto ada
                $foto = $this->upload->data('file_name');
            } else {
                $error = array('error' => $this->upload->display_errors());
                echo json_encode($error);
            }
        } else {
            $foto = $input_foto;
        }

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
            'logo' => $foto
        ];
        $this->db->where($id);
        $this->db->update('profil_sekolah',  $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $data['kelas'] . '</strong> Berhasil Ubah Profil Sekolah!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('profil');
    }
}
