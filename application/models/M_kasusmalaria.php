<?php

class M_kasusmalaria extends CI_model
{
    public function ambilKasusMalaria()
    {
        $query = $this->db->select('kasus_malaria.jumlah_kasus, laki_laki, perempuan, penyakit, tahun, nama, kasus_malaria.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariDataMalaria($keyword)
    {
        $query = $this->db->select('kasus_malaria.jumlah_kasus, laki_laki, perempuan, penyakit, tahun, nama, kasus_malaria.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function tambahKasus($api)
    {
        $data = [
            "idPenduduk" => $this->input->post('penduduk', true),
            "idPenyakit" => 2,
            "laki_laki" => $this->input->post('laki_laki', true),
            "perempuan" => $this->input->post('perempuan', true),
            "jumlah_kasus" => $this->input->post('jumlah', true),
            "api" => $api
        ];

        $this->db->insert('kasus_malaria', $data);
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
        // return $this->db->get_where('kasus_malaria', ['id' => $idKasus])->row_array();
        $query = $this->db->select('kasus_malaria.jumlah_kasus, penyakit, idPenyakit, tahun, nama, kasus_malaria.id as idMalaria, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('kasus_malaria.id', $idKasus)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function ubahKasus()
    {
        $data = [
            "jumlah_kasus" => $this->input->post('jumlah', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kasus_malaria', $data);
    }

    public function hapusKasus($idKasus)
    {
        $this->db->where('id', $idKasus);
        $this->db->delete('kasus_malaria');
    }
}
