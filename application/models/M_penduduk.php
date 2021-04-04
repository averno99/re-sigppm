<?php

class M_penduduk extends CI_model
{
    public function ambilSemuaPenduduk()
    {
        $query = $this->db->select('jumlah, tahun, nama, jumlah_penduduk.id, idKecamatan')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->order_by('tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function ambilPendudukBaru()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
        $query = $this->db->select('jumlah, tahun, nama, jumlah_penduduk.id, idKecamatan')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('tahun', $tahun)
            ->order_by('tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariData()
    {
        $keyword = $this->input->get('cari');
        $query = $this->db->select('jumlah, tahun, nama, jumlah_penduduk.id, idKecamatan')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('tahun', $keyword)
            ->order_by('tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function filterTahun($keyword)
    {
        $query = $this->db->select('jumlah, tahun, nama, jumlah_penduduk.id, idKecamatan')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('tahun', $keyword)
            ->order_by('tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariKecamatan()
    {
        $keyword = $this->input->get('kecamatan');
        $query = $this->db->select('jumlah, tahun, nama, jumlah_penduduk.id, idKecamatan')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('idKecamatan', $keyword)
            ->order_by('tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function tambahPenduduk()
    {
        $data = [
            "tahun" => $this->input->post('tahun', true),
            "idKecamatan" => $this->input->post('kecamatan', true),
            "jumlah" => $this->input->post('jumlah', true)
        ];

        $this->db->insert('jumlah_penduduk', $data);
    }

    public function ambilIdPenduduk($idPenduduk)
    {

        $query = $this->db->select('jumlah, tahun, nama, jumlah_penduduk.id, idKecamatan')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('jumlah_penduduk.id', $idPenduduk)
            ->order_by('tahun, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function ubahPenduduk()
    {
        $data = [
            "jumlah" => $this->input->post('jumlah', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('jumlah_penduduk', $data);
    }

    public function hapusPenduduk($idPenduduk)
    {
        $this->db->where('id', $idPenduduk);
        $this->db->delete('jumlah_penduduk');
    }
}
