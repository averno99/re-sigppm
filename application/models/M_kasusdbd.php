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
            ->get();
        return $query;
    }

    public function exportBulanDbd($tahun)
    {
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus')
            ->from('kasus_dbd')
            ->group_by('tahun, bulan, nama')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function exportDBD($tahun)
    {
        $query = $this->db->select('bulan, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L) as dbd1L, 
        SUM(dbd1P) as dbd1P, 
        SUM(dbd14L) as dbd14L, 
        SUM(dbd14P) as dbd14P, 
        SUM(dbd59L) as dbd59L, 
        SUM(dbd59P) as dbd59P, 
        SUM(dbd1014L) as dbd1014L, 
        SUM(dbd1014P) as dbd1014P,
        SUM(dbd1519L) as dbd1519L, 
        SUM(dbd1519P) as dbd1519P, 
        SUM(dbd2044L) as dbd2044L, 
        SUM(dbd2044P) as dbd2044P, 
        SUM(dbd45L) as dbd45L, 
        SUM(dbd45P) as dbd45P,

        SUM(dbd1L + dbd14L + dbd59L + dbd1014L + dbd1519L + dbd2044L + dbd45L) as totalL,

        SUM(dbd1P + dbd14P + dbd59P + dbd1014P + dbd1519P + dbd2044P + dbd45P) as totalP,

        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        SUM(dbd_meninggal) as dbd_meninggal')
            ->from('kasus_dbd')
            ->group_by('tahun, nama')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function ambilTahun()
    {
        $query = $this->db->select('tahun')
            ->from('kasus_dbd')
            ->group_by('tahun')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun')
            ->get();
        return $query;
    }

    public function ambilCariTahun($tahun)
    {
        $query = $this->db->select('tahun')
            ->from('kasus_dbd')
            ->group_by('tahun')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun')
            ->get();
        return $query;
    }

    public function cariDataDBD()
    {
        $keyword = $this->input->get('cari');
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
            ->get();
        return $query;
    }

    public function ambilIdKasus($idKasus)
    {
        $query = $this->db->select('bulan, penyakit, tahun, nama, kasus_dbd.id as idDbd, jumlah_penduduk.jumlah as jumlahPenduduk,
        dbd1L, dbd1P, dbd14L, dbd14P, dbd59L, dbd59P, dbd1014L, dbd1014P, 
        dbd1519L, dbd1519P, dbd2044L, dbd2044P, dbd45L, dbd45P, dbd_meninggal')
            ->from('kasus_dbd')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('kasus_dbd.id', $idKasus)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
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
            ->get();
        return $query;
    }

    public function ambilPetaDBD()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
        $query = $this->db->select('bulan, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        SUM(dbd_meninggal) as dbd_meninggal')
            ->from('kasus_dbd')
            ->group_by('tahun, nama')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function cariPerhitunganDBD()
    {
        $keyword = $this->input->get('cari');
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
            ->get();
        return $query;
    }

    public function waktuDbd()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus')
            ->from('kasus_dbd')
            ->group_by('tahun, bulan')
            ->join('jumlah_penduduk', 'kasus_dbd.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_dbd.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function cariWaktuDbd()
    {
        $keyword = $this->input->get('cari');
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
            ->get();
        return $query;
    }

    public function rasioDbd()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        SUM(dbd1L + dbd14L + dbd59L + dbd1014L + dbd1519L + dbd2044L + dbd45L) as totalL,

        SUM(dbd1P + dbd14P + dbd59P + dbd1014P + dbd1519P + dbd2044P + dbd45P) as totalP,

        SUM(dbd_meninggal) as dbd_meninggal,
        
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
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function cariRasioDbd()
    {
        $keyword = $this->input->get('cari');
        $query = $this->db->select('bulan, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        SUM(dbd1L + dbd1P + dbd14L + dbd14P + dbd59L + dbd59P + dbd1014L + dbd1014P + 
        dbd1519L + dbd1519P + dbd2044L + dbd2044P + dbd45L + dbd45P) as jumlah_kasus,

        SUM(dbd1L + dbd14L + dbd59L + dbd1014L + dbd1519L + dbd2044L + dbd45L) as totalL,

        SUM(dbd1P + dbd14P + dbd59P + dbd1014P + dbd1519P + dbd2044P + dbd45P) as totalP,

        SUM(dbd_meninggal) as dbd_meninggal,
        
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
            ->get();
        return $query;
    }

    public function tambahKasus()
    {
        $data = [
            "idPenduduk" => $this->input->post('penduduk', true),
            "idPenyakit" => 1,
            "bulan" => $this->input->post('bulan', true),
            "dbd1L" => $this->input->post('dbd1L', true),
            "dbd1P" => $this->input->post('dbd1P', true),
            "dbd14L" => $this->input->post('dbd14L', true),
            "dbd14P" => $this->input->post('dbd14P', true),
            "dbd59L" => $this->input->post('dbd59L', true),
            "dbd59P" => $this->input->post('dbd59P', true),
            "dbd1014L" => $this->input->post('dbd1014L', true),
            "dbd1014P" => $this->input->post('dbd1014P', true),
            "dbd1519L" => $this->input->post('dbd1519L', true),
            "dbd1519P" => $this->input->post('dbd1519P', true),
            "dbd2044L" => $this->input->post('dbd2044L', true),
            "dbd2044P" => $this->input->post('dbd2044P', true),
            "dbd45L" => $this->input->post('dbd45L', true),
            "dbd45P" => $this->input->post('dbd45P', true),
            "dbd_meninggal" => $this->input->post('meninggal', true)
        ];

        $this->db->insert('kasus_dbd', $data);
    }

    public function ubahKasus()
    {
        $data = [
            "dbd1L" => $this->input->post('dbd1L', true),
            "dbd1P" => $this->input->post('dbd1P', true),
            "dbd14L" => $this->input->post('dbd14L', true),
            "dbd14P" => $this->input->post('dbd14P', true),
            "dbd59L" => $this->input->post('dbd59L', true),
            "dbd59P" => $this->input->post('dbd59P', true),
            "dbd1014L" => $this->input->post('dbd1014L', true),
            "dbd1014P" => $this->input->post('dbd1014P', true),
            "dbd1519L" => $this->input->post('dbd1519L', true),
            "dbd1519P" => $this->input->post('dbd1519P', true),
            "dbd2044L" => $this->input->post('dbd2044L', true),
            "dbd2044P" => $this->input->post('dbd2044P', true),
            "dbd45L" => $this->input->post('dbd45L', true),
            "dbd45P" => $this->input->post('dbd45P', true),
            "dbd_meninggal" => $this->input->post('meninggal', true)
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
