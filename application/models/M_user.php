<?php

class M_user extends CI_model
{
    public function ambilSemuaUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahUser($upload_gambar)
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'gambar' => $upload_gambar,
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'levelUser' => $this->input->post('levelUser', true),
            'status' => 'Aktif'
        ];

        $this->db->insert('user', $data);
    }

    public function ambilIdUser($idUser)
    {
        return $this->db->get_where('user', ['id' => $idUser])->row_array();
    }

    public function ubahUser()
    {
        $data = [

            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'levelUser' => $this->input->post('levelUser', true),
            'status' => $this->input->post('status', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function resetPassword()
    {
        $data = [
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function hapusUser($idUser)
    {
        $this->db->where('id', $idUser);
        $this->db->delete('user');
    }

    public function ubahProfil($data)
    {
        $this->db->set('nama', $data['nama']);
        $this->db->set('alamat', $data['alamat']);
        $this->db->where('username', $data['username']);
        $this->db->update('user');
    }

    public function ubahPassword($password_hash)
    {
        $this->db->set('password', $password_hash);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('user');
    }
}
