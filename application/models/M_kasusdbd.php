<?php

class M_kasusdbd extends CI_model
{
    public function ambilKasusDBD()
    {
        $query = $this->db->select('bulan, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        dbd1L, dbd1P, dbd14L, dbd14P, dbd59L, dbd59P, dbd1014L, dbd1014P, 
        dbd1519L, dbd1519P, dbd2044L, dbd2044P, dbd45L, dbd45P,

        (dbd1L + dbd1P + dbd14L + dbd14P + 
        dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        dbd_meninggal')
            ->from('kasus_dbd')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariDataDBD($keyword)
    {
        $query = $this->db->select('bulan, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        dbd1L, dbd1P, dbd14L, dbd14P, dbd59L, dbd59P, dbd1014L, dbd1014P, 
        dbd1519L, dbd1519P, dbd2044L, dbd2044P, dbd45L, dbd45P,

        (dbd1L + dbd1P + dbd14L + dbd14P + 
        dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        dbd_meninggal')
            ->from('kasus_dbd')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function tambahKasus()
    {
        $data = [
            "idPenduduk" => $this->input->post('penduduk', true),
            "idPenyakit" => 1,
            "bulan" => $this->input->post('bulan', true),
            "jumlah_kasus" => $this->input->post('jumlah', true)
        ];

        $this->db->insert('kasus_dbd', $data);
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
        $query = $this->db->select('bulan, jumlah_kasus, penyakit, tahun, nama, kasus_dbd.id as idDbd, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_dbd')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('kasus_dbd.id', $idKasus)
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
        $this->db->update('kasus_dbd', $data);
    }

    public function hapusKasus($idKasus)
    {
        $this->db->where('id', $idKasus);
        $this->db->delete('kasus_dbd');
    }
}
