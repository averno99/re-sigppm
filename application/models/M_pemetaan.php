<?php

class M_pemetaan extends CI_model
{
    public function ambilPetaMalaria($keyword)
    {
        $query = $this->db->select('kasus_malaria.id, tahun, nama, penyakit, 
        jumlah_penduduk.jumlah as jumlahPenduduk, malaria_positif')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('penyakit.id = 2')
            ->where('tahun', $keyword)
            ->get()->result_array();
        return $query;
    }

    public function ambilPetaDBD($keyword)
    {
        $query = $this->db->select('penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus')
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
        $query = $this->db->select('kasus_kusta.id, tahun, nama, penyakit, jumlah_penduduk.jumlah as jumlahPenduduk,
        
        (kus15LMB + kus15PMB + kus1625LMB + kus1625PMB + kus2635LMB + kus2635PMB + 
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as mb,

        (kus15LPB + kus15PPB + kus1625LPB + kus1625PPB + kus2635LPB + kus2635PPB +
        kus3645LPB + kus3645PPB + kus4655LPB + kus4655PPB + kus56LPB + kus56PPB) as pb')
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
