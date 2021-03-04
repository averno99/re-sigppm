<?php

class M_tahun extends CI_model
{
    public function ambilSemuaTahun()
    {
        $query = $this->db->order_by('tahun', 'ASC')->get('tahun')->result_array();
        return $query;
    }

    public function tambahTahun()
    {
        $data = [
            "tahun" => $this->input->post('tahun', true),
        ];

        $this->db->insert('tahun', $data);
    }

    public function ambilIdTahun($idTahun)
    {
        return $this->db->get_where('tahun', ['id' => $idTahun])->row_array();
    }

    public function ubahTahun()
    {
        $data = [
            "tahun" => $this->input->post('tahun', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tahun', $data);
    }

    public function hapusTahun($idTahun)
    {
        $this->db->where('id', $idTahun);
        $this->db->delete('tahun');
    }
}
