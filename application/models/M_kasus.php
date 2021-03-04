<?php

class M_kasus extends CI_model
{
    public function ambilSemuaKasus()
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariData($keyword)
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function tambahKasus()
    {
        $data = [
            "idPenyakit" => $this->input->post('penyakit', true),
            "idPenduduk" => $this->input->post('penduduk', true),
            "jumlah" => $this->input->post('jumlah', true)
        ];

        $this->db->insert('kasus_positif', $data);
    }

    public function ambilFilterPenduduk($filterTahun)
    {
        $query = $this->db->select('jumlah, tahun, nama, jumlah_penduduk.id')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('tahun', $filterTahun)
            ->order_by('tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function ambilIdKasus($idKasus)
    {
        return $this->db->get_where('kasus_positif', ['id' => $idKasus])->row_array();
    }

    public function ubahKasus()
    {
        $data = [
            "idTahun" => $this->input->post('tahun', true),
            "idKecamatan" => $this->input->post('kecamatan', true),
            "idPenyakit" => $this->input->post('penyakit', true),
            "jumlah" => $this->input->post('jumlah', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kasus_positif', $data);
    }

    public function hapusKasus($idKasus)
    {
        $this->db->where('id', $idKasus);
        $this->db->delete('kasus_positif');
    }



    public function ambilKasusMalaria()
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit.id = 2')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function ambilKasusDBD()
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit.id = 1')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function ambilKasusKusta()
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit.id = 3')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariDataMalaria($keyword)
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit.id = 2')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariDataDBD($keyword)
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit.id = 1')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariDataKusta($keyword)
    {
        $query = $this->db->select('kasus_positif.jumlah, penyakit, tahun, nama, kasus_positif.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_positif')
            ->join('jumlah_penduduk', 'kasus_positif.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit.id = 3')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }
}
