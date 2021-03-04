<?php

class M_pemetaan extends CI_model
{
    public function ambilPetaMalaria($keyword)
    {
        $query = $this->db->select('kasus_malaria.id, api, tahun, nama, penyakit, singkatanEpi, jumlah_penduduk.jumlah')
            ->from('kasus_malaria')

            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('penyakit.id = 2')
            ->where('tahun', $keyword)
            ->get()->result_array();
        return $query;
    }

    public function ambilKasusDBD($keyword)
    {
        $query = $this->db->select('perhitungan.id, hasil, tahun, nama, penyakit, singkatanEpi, jumlah_penduduk.jumlah, kasus_positif.jumlah')
            ->from('perhitungan')
            ->join('kasus_positif', 'perhitungan.idKasusPositif = kasus_positif.id')
            ->join('jumlah_penduduk', 'perhitungan.idJumlahPenduduk = jumlah_penduduk.id')
            ->join('tahun', 'jumlah_penduduk.idTahun = tahun.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit.id = 1')
            ->where('tahun', $keyword)
            ->get()->result_array();
        return $query;
    }

    public function ambilPetaDBD($keyword)
    {
        $query = $this->db->select('ir, SUM(laki_laki) as totalL, SUM(perempuan) as totalP, bulan, SUM(jumlah_kasus) as total, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_dbd')
            ->group_by('tahun, nama')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('penyakit.id = 1')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function ambilPetaKusta($keyword)
    {
        $query = $this->db->select('kasus_kusta.id, pr, tahun, nama, penyakit, singkatanEpi, jumlah_penduduk.jumlah')
            ->from('kasus_kusta')

            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')

            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('penyakit.id = 3')
            ->where('tahun', $keyword)
            ->get()->result_array();
        return $query;
    }
}
