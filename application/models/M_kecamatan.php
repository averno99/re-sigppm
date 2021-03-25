<?php

class M_kecamatan extends CI_model
{
    public function ambilSemuaKecamatan()
    {
        $query = $this->db->order_by('nama', 'ASC')->get('kecamatan')->result_array();
        return $query;
    }

    public function tambahKecamatan($upload_geojson)
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "keterangan" => htmlspecialchars($this->input->post('keterangan', true)),
            "geojson" => htmlspecialchars($upload_geojson)
        ];

        $this->db->insert('kecamatan', $data);
    }

    public function ambilIdKecamatan($idKecamatan)
    {
        return $this->db->get_where('kecamatan', ['id' => $idKecamatan])->row_array();
    }

    public function ubahKecamatan()
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "keterangan" => htmlspecialchars($this->input->post('keterangan', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kecamatan', $data);
    }

    public function hapusKecamatan($idKecamatan)
    {
        $this->db->where('id', $idKecamatan);
        $this->db->delete('kecamatan');
    }
}
