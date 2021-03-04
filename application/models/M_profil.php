<?php

class M_profil extends CI_model
{
    public function ubahPassword($password_hash)
    {
        $this->db->set('password', $password_hash);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('user');
    }

    public function ubahProfil($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('alamat', $data['alamat']);
        $this->db->where('username', $data['username']);
        $this->db->update('user');
    }
}
