<?php

class DashModel extends CI_model
{
    public function dash($keyword)
    {
        $query = $this->db->select('jumlah_penduduk.id, nama, tahun, jumlah')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function rasioMalaria($keyword)
    {
        $query = $this->db->select('SUM(laki_laki) as totalL, SUM(perempuan) as totalP, kasus_malaria.idPenduduk, SUM(jumlah_kasus) as total, tahun')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function apiMalaria($keyword)
    {
        $query = $this->db->select('laki_laki, perempuan, kasus_malaria.idPenduduk, jumlah_kasus, tahun, nama, api')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function rasioKusta($keyword)
    {
        $query = $this->db->select('SUM(laki_laki) as totalL, SUM(perempuan) as totalP, kasus_kusta.idPenduduk, SUM(pb) as totalPB, SUM(MB) as totalMB, tahun')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function tipeKusta($keyword)
    {
        $query = $this->db->select('SUM(laki_laki) as totalL, SUM(perempuan) as totalP, kasus_kusta.idPenduduk, SUM(pb) as totalPB, SUM(MB) as totalMB, tahun')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function kusta($keyword)
    {
        $query = $this->db->select('kasus_kusta.idPenduduk, nama, tahun, pr, cdr')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function irDbd($keyword)
    {
        $query = $this->db->select('ir, SUM(laki_laki) as totalL, SUM(perempuan) as totalP, bulan, SUM(jumlah_kasus) as total, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk')
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

    public function rasioDbd($keyword)
    {
        $query = $this->db->select('ir, SUM(laki_laki) as totalL, SUM(perempuan) as totalP, bulan, SUM(jumlah_kasus) as total, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_dbd')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function Caridash($keyword)
    {
        $query = $this->db->select('jumlah_penduduk.id, nama, tahun, jumlah')
            ->from('jumlah_penduduk')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }
}
