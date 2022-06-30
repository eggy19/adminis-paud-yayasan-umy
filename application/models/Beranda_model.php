<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_model extends CI_Model
{
    public function get_profil($user_id)
    {

        $query = $this->db->get_where('profil_sekolah', ['user_id' => $user_id])->row();
        return $query;
    }

    public function jml_kelas($user_id)
    {
        $query = $this->db->get_where('kelas', ['user_id' => $user_id]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_guru($user_id)
    {
        $query = $this->db->get_where('guru', ['user_id' => $user_id]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_siswa($user_id)
    {
        $query = $this->db->get_where('siswa', ['user_id' => $user_id]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_prestasi($user_id)
    {
        $query = $this->db->get_where('siswa', ['user_id' => $user_id]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_lk_siswa($user_id)
    {
        $query = $this->db->query("SELECT * FROM siswa WHERE gender ='Laki-laki' AND user_id='" . $user_id . "'");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jml_pr_siswa($user_id)
    {
        $query = $this->db->query("SELECT * FROM siswa WHERE gender ='Perempuan' AND user_id='" . $user_id . "'");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // Admin / Yayasan
    public function get_allSekolah()
    {
        $query = $this->db->query('SELECT profil_sekolah.nama_sekolah AS Sekolah,
        profil_sekolah.alamat, 
        COUNT(DISTINCT guru.id) AS Jumlah_Guru, 
        COUNT(DISTINCT siswa.id) AS Jumlah_Siswa, 
        COUNT(DISTINCT kelas.id) AS Jumlah_Kelas,
        user.email,
        user.id
        FROM user 
        JOIN profil_sekolah ON user.id = profil_sekolah.user_id 
        LEFT JOIN guru ON user.id = guru.user_id 
        LEFT JOIN siswa ON user.id = siswa.user_id
        LEFT JOIN kelas ON user.id = kelas.user_id
        GROUP BY user.id');

        return $query->result();
    }

    public function get_kelas($user_id)
    {
        $query = $this->db->query("SELECT 
        kelas.kelas AS kelas, 
        COUNT(siswa.id) AS jml_siswa 
        FROM kelas 
        JOIN siswa ON siswa.id_kelas = kelas.id 
        WHERE kelas.user_id='" . $user_id . "' 
        GROUP BY kelas.id ");

        return $query->result();
    }
}
