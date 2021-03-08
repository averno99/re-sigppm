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

    public function ambilIdKasus($idKasus)
    {
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

    public function perhitunganDBD()
    {
        $query = $this->db->select('bulan, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        SUM(dbd_meninggal) as dbd_meninggal')
            ->from('kasus_dbd')
            ->group_by('tahun, nama')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariPerhitunganDBD($keyword)
    {
        $query = $this->db->select('bulan, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        SUM(dbd_meninggal) as dbd_meninggal')
            ->from('kasus_dbd')
            ->group_by('tahun, nama')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function waktuDbd($keyword)
    {
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus')
            ->from('kasus_dbd')
            ->group_by('tahun, bulan')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function rasioDbd($keyword)
    {
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        SUM(dbd1L + dbd14L + dbd59L + dbd1014L + dbd1519L + dbd2044L + dbd45L) as totalL,

        SUM(dbd1P + dbd14P + dbd59P + dbd1014P + dbd1519P + dbd2044P + dbd45P) as totalP,

        SUM(dbd_meninggal) as dbd_meninggal')
            ->from('kasus_dbd')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function usiaDbd($keyword)
    {
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P) as dbd1,
        SUM(dbd14L + dbd14P) as dbd14,
        SUM(dbd59L + dbd59P) as dbd59,
        SUM(dbd1014L + dbd1014P) as dbd1014,
        SUM(dbd1519L + dbd1519P) as dbd1519,
        SUM(dbd2044L + dbd2044P) as dbd2044,
        SUM(dbd45L + dbd45P) as dbd45')
            ->from('kasus_dbd')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
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
