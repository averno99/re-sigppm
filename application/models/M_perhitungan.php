<?php

class M_perhitungan extends CI_model
{
    public function ambilKasusMalaria()
    {
        $query = $this->db->select('kasus_malaria.jumlah_kasus, laki_laki, perempuan, api, penyakit, tahun, nama, kasus_malaria.id, jumlah_penduduk.jumlah as jumlahPenduduk')
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
        $query = $this->db->select('kasus_malaria.jumlah_kasus, laki_laki, perempuan, api, penyakit, tahun, nama, kasus_malaria.id, jumlah_penduduk.jumlah as jumlahPenduduk')
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
        $query = $this->db->select('pb, mb, pr, laki_laki, perempuan, cdr, kasus_baru, penyakit, tahun, nama, kasus_kusta.id, jumlah_penduduk.jumlah as jumlahPenduduk')
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
        $query = $this->db->select('pb, mb, pr, laki_laki, perempuan, cdr, kasus_baru, penyakit, tahun, nama, kasus_kusta.id, jumlah_penduduk.jumlah as jumlahPenduduk')
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
        $query = $this->db->select('ir, SUM(laki_laki) as totalL, SUM(perempuan) as totalP, bulan, SUM(jumlah_kasus) as total, penyakit, tahun, nama, kasus_dbd.id, jumlah_penduduk.jumlah as jumlahPenduduk')
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













    public function ambilSemuaPerhitungan()
    {
        $query = $this->db->select('perhitungan.id as idPerhitungan, perhitungan.*, jumlah_penduduk.jumlah as jumlahPenduduk, tahun.tahun, nama, penyakit, kasus_positif.jumlah as jumlahKasus')
            ->from('perhitungan')
            ->join('kasus_positif', 'perhitungan.idKasusPositif = kasus_positif.id')
            ->join('jumlah_penduduk', 'perhitungan.idJumlahPenduduk = jumlah_penduduk.id')
            ->join('tahun', 'jumlah_penduduk.idTahun = tahun.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->order_by('tahun.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariData($keyword)
    {
        $query = $this->db->select('perhitungan.id as idPerhitungan, perhitungan.*, jumlah_penduduk.jumlah as jumlahPenduduk, tahun.tahun, nama, penyakit, kasus_positif.jumlah as jumlahKasus')
            ->from('perhitungan')
            ->join('kasus_positif', 'perhitungan.idKasusPositif = kasus_positif.id')
            ->join('jumlah_penduduk', 'perhitungan.idJumlahPenduduk = jumlah_penduduk.id')
            ->join('tahun', 'jumlah_penduduk.idTahun = tahun.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('tahun.tahun', $keyword)
            ->order_by('tahun.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function tambahPerhitungan($hitung)
    {
        $data = [
            "idJumlahPenduduk" => $this->input->post('penduduk', true),
            "idKasusPositif" => $this->input->post('kasus', true),
            "hasil" => $hitung
        ];

        $this->db->insert('perhitungan', $data);
    }

    public function ambilFilterKasus($filterPenyakit, $filterTahun)
    {
        $query = $this->db->select('jumlah, tahun.tahun, nama, penyakit, kasus_positif.id')
            ->from('kasus_positif')
            ->join('tahun', 'kasus_positif.idTahun = tahun.id')
            ->join('kecamatan', 'kasus_positif.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_positif.idPenyakit = penyakit.id')
            ->where('penyakit', $filterPenyakit)
            ->where('tahun.tahun', $filterTahun)
            ->order_by('tahun.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
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

    public function ambilIdPerhitungan($idPerhitungan)
    {
        return $this->db->get_where('perhitungan', ['id' => $idPerhitungan])->row_array();
    }

    public function hapusPerhitungan($idPerhitungan)
    {
        $this->db->where('id', $idPerhitungan);
        $this->db->delete('perhitungan');
    }
}
