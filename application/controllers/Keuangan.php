<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in(); //dari helper
        role_id_2(); //daru helper
    }

    // PENDAPATAN
    public function pendapatan()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data by id
        $data['rencana_pendapatan'] = $this->db->get_where('rencana_pendapatan', ['user_id' => $id_user])->result();

        $data['judul_halaman'] = 'Pendapatan Sekolah';
        $this->load->view('keuangan/pendapatan/index', $data);
    }

    public function tambah_dapat()
    {
        $this->load->view('keuangan/pendapatan/tambah');
    }

    public function ubah_dapat()
    {
        $id = $this->input->post('id');
        $data['rencana_pendapatan'] = $this->db->get_where('rencana_pendapatan', array('id' => $id))->row();
        $this->load->view('keuangan/pendapatan/ubah', $data);
    }

    public function hapus_dapat()
    {
        $id = $this->input->post('id');
        $data['rencana_pendapatan'] = $this->db->get_where('rencana_pendapatan', array('id' => $id))->row();
        $this->load->view('keuangan/pendapatan/hapus', $data);
    }

    public function simpanPendapatan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data = [
            'user_id' => $user_id,
            'sumber_dana' => $this->input->post('sumber_dana'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal' => $this->input->post('tanggal')
        ];

        $this->db->insert('rencana_pendapatan', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $data['rencana_pendapatan'] . '</strong> Berhasil Ditambahkan!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('keuangan/pendapatan/');
    }

    public function ubahPendapatan()
    {
        $where = [
            'id' => $this->input->post('id'),
        ];

        $data = [
            'user_id' => $this->input->post('user_id'),
            'sumber_dana' => $this->input->post('sumber_dana'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal' => $this->input->post('tanggal')
        ];

        // echo json_encode($data);
        $this->db->where($where);
        $this->db->update('rencana_pendapatan', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $data['rencana_pendapatan'] . '</strong> Berhasil Diupdate!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('keuangan/pendapatan/');
    }

    public function hapusPendapatan($id, $rencana_pendapatan)
    {
        $data = [
            'id' => $id
        ];

        // echo json_encode($data);
        $this->db->delete('rencana_pendapatan', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' .  $rencana_pendapatan . '</strong> Berhasil Terhapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('keuangan/pendapatan/');
    }

    public function laporanDapat()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data by id
        $data['rencana_pendapatan'] = $this->db->get_where('rencana_pendapatan', ['user_id' => $id_user])->result();

        $data['judul_halaman'] = 'Laporan Pendapatan Sekolah';
        $this->load->view('keuangan/pendapatan/laporan', $data);
    }

    //pengeluaran
    public function pengeluaran()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data by id
        $data['penggunaan'] = $this->db->get_where('rencana_penggunaan', ['user_id' => $id_user])->result();

        $data['judul_halaman'] = 'Pengeluaran Sekolah';
        $this->load->view('keuangan/pengeluaran/index', $data);
    }

    public function tambah_keluar()
    {

        $this->load->view('keuangan/pengeluaran/tambah');
    }

    public function ubah_keluar()
    {
        $id = $this->input->post('id');
        $data['rencana_penggunaan'] = $this->db->get_where('rencana_penggunaan', array('id' => $id))->row();
        $this->load->view('keuangan/pengeluaran/ubah', $data);
    }

    public function hapus_keluar()
    {
        $id = $this->input->post('id');
        $data['rencana_penggunaan'] = $this->db->get_where('rencana_penggunaan', array('id' => $id))->row();
        $this->load->view('keuangan/pengeluaran/hapus', $data);
    }

    public function simpanPengeluaran()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $user_id = $user->id;

        $data = [
            'user_id' => $user_id,
            'program' => $this->input->post('program'),
            'kegiatan' => $this->input->post('kegiatan'),
            'waktu_pelaksanaan' => $this->input->post('waktu_pelaksanaan'),
            'jumlah' => $this->input->post('jumlah')

        ];

        $this->db->insert('rencana_penggunaan', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $data['program'] . '</strong> Berhasil Ditambahkan!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('keuangan/pengeluaran/');
    }

    public function ubahPengeluaran()
    {
        $where = [
            'id' => $this->input->post('id'),
        ];

        $data = [
            'user_id' => $this->input->post('user_id'),
            'program' => $this->input->post('program'),
            'kegiatan' => $this->input->post('kegiatan'),
            'waktu_pelaksanaan' => $this->input->post('waktu_pelaksanaan'),
            'jumlah' => $this->input->post('jumlah')
        ];

        // echo json_encode($data);
        $this->db->where($where);
        $this->db->update('rencana_penggunaan', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>' . $data['program'] . '</strong> Berhasil Diupdate!.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('keuangan/pengeluaran/');
    }

    public function hapusPengeluaran($id, $rencana_penggunaan)
    {
        $data = [
            'id' => $id
        ];

        // echo json_encode($data);
        $this->db->delete('rencana_penggunaan', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' .  $rencana_penggunaan . '</strong> Berhasil Terhapus!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('keuangan/pengeluaran/');
    }

    public function laporanKeluar()
    {
        //ambil id user
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_object();
        $id_user = $user->id;
        // ambil data by id
        $data['penggunaan'] = $this->db->get_where('rencana_penggunaan', ['user_id' => $id_user])->result();

        $data['judul_halaman'] = 'Pengeluaran Sekolah';
        $this->load->view('keuangan/pengeluaran/laporan', $data);
    }
}
