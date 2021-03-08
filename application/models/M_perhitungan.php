<?php

class M_perhitungan extends CI_model
{
    public function ambilKasusMalaria()
    {
        $query = $this->db->select('malaria_positif, malaria_klinis, penyakit, 
        tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk')
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
        $query = $this->db->select('malaria_positif, malaria_klinis, penyakit, 
        tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function ambilKasusKusta()
    {
        $query = $this->db->select('penyakit, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        (kus15LMB + kus15PMB + kus1625LMB + kus1625PMB + kus2635LMB + kus2635PMB + 
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as mb,

        (kus15LPB + kus15PPB + kus1625LPB + kus1625PPB + kus2635LPB + kus2635PPB +
        kus3645LPB + kus3645PPB + kus4655LPB + kus4655PPB + kus56LPB + kus56PPB) as pb,
        
        (kusta_baruPB + kusta_baruMB) as kasus_baru')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariDataKusta($keyword)
    {
        $query = $this->db->select('penyakit, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
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

    public function ambilKasusDBD()
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

    public function cariDataDBD($keyword)
    {
        $query = $this->db->select('ir, SUM(laki_laki) as totalL, SUM(perempuan) as totalP, bulan, SUM(jumlah_kasus) as total, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk')
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
}
