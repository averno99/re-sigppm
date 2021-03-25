<?php

class M_penyakit extends CI_model
{
    public function ambilSemuaPenyakit()
    {
        $query = $this->db->order_by('id', 'ASC')->get('penyakit')->result_array();
        return $query;
    }

    public function ambilIdPenyakit($idPenyakit)
    {
        return $this->db->get_where('penyakit', ['id' => $idPenyakit])->row_array();
    }

    public function ubahPenyakit()
    {
        $data = [
            "keterangan" => htmlspecialchars($this->input->post('keterangan', true))
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('penyakit', $data);
    }
}
