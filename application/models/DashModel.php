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
        $query = $this->db->select('tahun, nama,
        malaria_klinis, mik, rdt, pf, pv, pm, po, pk, mix,
        SUM(malaria_positif) as mal_positif,
        SUM(mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L) as laki_laki, 
        SUM(mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as perempuan')
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
        $query = $this->db->select('kasus_malaria.idPenduduk, tahun, nama, 
        jumlah_penduduk.jumlah as jumlahPenduduk, malaria_positif, malaria_klinis,
        pf, pv, pm, po, pk, mix, rdt, mik')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function usiaMalaria($keyword)
    {
        $query = $this->db->select('kasus_malaria.idPenduduk, tahun, nama, 
        SUM(mal011L + mal011P) as mal011, SUM(mal14L + mal14P) as mal14, SUM(mal59L + mal59P) as mal59, 
        SUM(mal1014L + mal1014P) as mal1014, SUM(mal1564L + mal1564P) as mal1564, SUM(mal65L + mal65P) as mal65')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function rasioKusta($keyword)
    {
        $query = $this->db->select('kasus_kusta.idPenduduk, tahun,

        SUM(kus15LMB + kus15LPB + kus1625LMB + kus1625LPB + kus2635LPB + kus2635LMB + 
        kus3645LMB + kus4655LMB + kus56LMB + kus56LPB + kus4655LPB + kus3645LPB) as totalL,

        SUM(kus15PMB + kus15PPB + kus1625PMB + kus1625PPB + kus2635PMB + kus2635PPB +
        kus3645PMB + kus3645PPB + kus4655PMB + kus4655PPB + kus56PMB + kus56PPB) as totalP,

        SUM(kus15LPB + kus15PPB + kus1625LPB + kus1625PPB + kus2635LPB + kus2635PPB +
        kus3645LPB + kus3645PPB + kus4655LPB + kus4655PPB + kus56LPB + kus56PPB) as totalPB,

        SUM(kus15LMB + kus15PMB + kus1625LMB + kus1625PMB + kus2635LMB + kus2635PMB + 
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as totalMB')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function usiaKusta($keyword)
    {
        $query = $this->db->select('kasus_kusta.idPenduduk, tahun,
        SUM(kus15LMB + kus15PMB) as kus15MB, SUM(kus15LPB + kus15PPB) as kus15PB,
        SUM(kus1625LMB + kus1625PMB) as kus1625MB, SUM(kus1625LPB + kus1625PPB) as kus1625PB, 
        SUM(kus2635LMB + kus2635PMB) as kus2635MB, SUM(kus2635LPB + kus2635PPB) as kus2635PB, 
        SUM(kus3645LMB + kus3645PMB) as kus3645MB, SUM(kus3645LPB + kus3645PPB) as kus3645PB,
        SUM(kus4655LMB + kus4655PMB) as kus4655MB, SUM(kus4655LPB + kus4655PPB) as kus4655PB,
        SUM(kus56LMB + kus56PMB) as kus56MB, SUM(kus56LPB + kus56PPB) as kus56PB')
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
        $query = $this->db->select('kasus_kusta.idPenduduk, nama, tahun, jumlah_penduduk.jumlah as jumlahPenduduk,
        (kus15LMB + kus15PMB + kus1625LMB + kus1625PMB + kus2635LMB + kus2635PMB + 
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as mb,

        (kus15LPB + kus15PPB + kus1625LPB + kus1625PPB + kus2635LPB + kus2635PPB +
        kus3645LPB + kus3645PPB + kus4655LPB + kus4655PPB + kus56LPB + kus56PPB) as pb,
        
        (kusta_baruPB + kusta_baruMB) as kasus_baru')
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
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
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
