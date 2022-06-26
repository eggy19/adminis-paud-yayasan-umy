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
}
