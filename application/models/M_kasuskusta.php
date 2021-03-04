<?php

class M_kasuskusta extends CI_model
{
    public function ambilKasusKusta()
    {
        $query = $this->db->select('pb, mb, laki_laki, perempuan, kasus_baru, penyakit, tahun, nama, kasus_kusta.id, jumlah_penduduk.jumlah as jumlahPenduduk')
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
        $query = $this->db->select('pb, mb, laki_laki, perempuan, kasus_baru, penyakit, tahun, nama, kasus_kusta.id, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function tambahKasus($pr, $cdr)
    {
        $data = [
            "idPenduduk" => $this->input->post('penduduk', true),
            "idPenyakit" => 3,
            "laki_laki" => $this->input->post('laki_laki', true),
            "perempuan" => $this->input->post('perempuan', true),
            "pb" => $this->input->post('pb', true),
            "mb" => $this->input->post('mb', true),
            "kasus_baru" => $this->input->post('kasus_baru', true),
            "pr" => $pr,
            "cdr" => $cdr
        ];

        $this->db->insert('kasus_kusta', $data);
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
        $query = $this->db->select('pb, mb, penyakit, tahun, nama, kasus_kusta.id as idKusta, jumlah_penduduk.jumlah as jumlahPenduduk')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('kasus_kusta.id', $idKasus)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function ubahKasus()
    {
        $data = [
            "pb" => $this->input->post('pb', true),
            "mb" => $this->input->post('mb', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kasus_kusta', $data);
    }

    public function hapusKasus($idKasus)
    {
        $this->db->where('id', $idKasus);
        $this->db->delete('kasus_kusta');
    }
}
