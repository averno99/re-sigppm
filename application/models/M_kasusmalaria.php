<?php

class M_kasusmalaria extends CI_model
{
    public function ambilKasusMalaria()
    {
        $query = $this->db->select('kasus_malaria.id, idPenduduk, idPenyakit, penyakit, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        malaria_klinis, mik, rdt, pf, pv, pm, po, mix, malaria_meninggal,
        mal011L, mal14L, mal59L, mal1014L, mal1564L, mal65L, 
        mal011P, mal14P, mal59P, mal1014P, mal1564P, mal65P,

        (mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L + 
        mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as malaria_positif')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function dataMalaria()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
        $query = $this->db->select('kasus_malaria.id, idPenduduk, idPenyakit, penyakit, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        malaria_klinis, malaria_meninggal, mik, rdt, pf, pv, pm, po, mix,
        mal011L, mal14L, mal59L, mal1014L, mal1564L, mal65L, 
        mal011P, mal14P, mal59P, mal1014P, mal1564P, mal65P,
        
        (mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L + 
        mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as malaria_positif')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function cariDataMalaria()
    {
        $keyword = $this->input->get('cari');
        $query = $this->db->select('kasus_malaria.id, idPenduduk, idPenyakit, penyakit, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        malaria_klinis, malaria_meninggal, mik, rdt, pf, pv, pm, po, mix,
        mal011L, mal14L, mal59L, mal1014L, mal1564L, mal65L, 
        mal011P, mal14P, mal59P, mal1014P, mal1564P, mal65P,
        
        (mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L + 
        mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as malaria_positif')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function ambilTahun()
    {
        $query = $this->db->select('tahun')
            ->from('kasus_malaria')
            ->group_by('tahun')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun')
            ->get();
        return $query;
    }

    public function ambilCariTahun($tahun)
    {
        $query = $this->db->select('tahun')
            ->from('kasus_malaria')
            ->group_by('tahun')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun')
            ->get();
        return $query;
    }

    public function exportMalaria($tahun)
    {
        $query = $this->db->select('kasus_malaria.id, idPenduduk, idPenyakit, penyakit, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        malaria_klinis, mik, rdt, pf, pv, pm, po, mix, malaria_meninggal,
        mal011L, mal14L, mal59L, mal1014L, mal1564L, mal65L, 
        mal011P, mal14P, mal59P, mal1014P, mal1564P, mal65P,

        (mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L) as laki_laki, 
        (mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as perempuan,

        (mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L + 
        mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as malaria_positif')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function ambilIdKasus($idKasus)
    {
        $query = $this->db->select('kasus_malaria.id as idMalaria, idPenduduk, idPenyakit, penyakit, tahun, nama, jumlah_penduduk.jumlah as jumlahPenduduk,
        malaria_klinis, mik, rdt, pf, pv, pm, po, mix, malaria_meninggal,
        mal011L, mal14L, mal59L, mal1014L, mal1564L, mal65L, 
        mal011P, mal14P, mal59P, mal1014P, mal1564P, mal65P,
        
        (mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L + 
        mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as malaria_positif')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('kasus_malaria.id', $idKasus)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function rasioMalaria()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
        $query = $this->db->select('tahun,
        SUM(mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L + 
        mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as mal_positif,

        SUM(mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L) as laki_laki, 
        SUM(mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as perempuan,
        
        SUM(mal011L + mal011P) as mal011, SUM(mal14L + mal14P) as mal14, SUM(mal59L + mal59P) as mal59, 
        SUM(mal1014L + mal1014P) as mal1014, SUM(mal1564L + mal1564P) as mal1564, SUM(mal65L + mal65P) as mal65')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function cariRasioMalaria()
    {
        $keyword = $this->input->get('cari');
        $query = $this->db->select('tahun,
        SUM(mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L + 
        mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as mal_positif,

        SUM(mal011L + mal14L + mal59L + mal1014L + mal1564L + mal65L) as laki_laki, 
        SUM(mal011P + mal14P + mal59P + mal1014P + mal1564P + mal65P) as perempuan,
        
        SUM(mal011L + mal011P) as mal011, SUM(mal14L + mal14P) as mal14, SUM(mal59L + mal59P) as mal59, 
        SUM(mal1014L + mal1014P) as mal1014, SUM(mal1564L + mal1564P) as mal1564, SUM(mal65L + mal65P) as mal65')
            ->from('kasus_malaria')
            ->join('jumlah_penduduk', 'kasus_malaria.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_malaria.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function tambahKasus()
    {
        $data = [
            "idPenduduk" => $this->input->post('penduduk', true),
            "idPenyakit" => 2,
            "malaria_klinis" => $this->input->post('malaria_klinis', true),
            "malaria_meninggal" => $this->input->post('meninggal', true),
            "mal011L" => $this->input->post('mal011L', true),
            "mal011P" => $this->input->post('mal011P', true),
            "mal14L" => $this->input->post('mal14L', true),
            "mal14P" => $this->input->post('mal14P', true),
            "mal59L" => $this->input->post('mal59L', true),
            "mal59P" => $this->input->post('mal59P', true),
            "mal1014L" => $this->input->post('mal1014L', true),
            "mal1014P" => $this->input->post('mal1014P', true),
            "mal1564L" => $this->input->post('mal1564L', true),
            "mal1564P" => $this->input->post('mal1564P', true),
            "mal65L" => $this->input->post('mal65L', true),
            "mal65P" => $this->input->post('mal65P', true),
            "mik" => $this->input->post('mik', true),
            "rdt" => $this->input->post('rdt', true),
            "pf" => $this->input->post('pf', true),
            "pv" => $this->input->post('pv', true),
            "pm" => $this->input->post('pm', true),
            "po" => $this->input->post('po', true),
            "mix" => $this->input->post('mix', true)
        ];

        $this->db->insert('kasus_malaria', $data);
    }

    public function ubahKasus()
    {
        $data = [
            "malaria_klinis" => $this->input->post('malaria_klinis', true),
            "malaria_meninggal" => $this->input->post('meninggal', true),
            "mal011L" => $this->input->post('mal011L', true),
            "mal011P" => $this->input->post('mal011P', true),
            "mal14L" => $this->input->post('mal14L', true),
            "mal14P" => $this->input->post('mal14P', true),
            "mal59L" => $this->input->post('mal59L', true),
            "mal59P" => $this->input->post('mal59P', true),
            "mal1014L" => $this->input->post('mal1014L', true),
            "mal1014P" => $this->input->post('mal1014P', true),
            "mal1564L" => $this->input->post('mal1564L', true),
            "mal1564P" => $this->input->post('mal1564P', true),
            "mal65L" => $this->input->post('mal65L', true),
            "mal65P" => $this->input->post('mal65P', true),
            "mik" => $this->input->post('mik', true),
            "rdt" => $this->input->post('rdt', true),
            "pf" => $this->input->post('pf', true),
            "pv" => $this->input->post('pv', true),
            "pm" => $this->input->post('pm', true),
            "po" => $this->input->post('po', true),
            "mix" => $this->input->post('mix', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kasus_malaria', $data);
    }

    public function hapusKasus($idKasus)
    {
        $this->db->where('id', $idKasus);
        $this->db->delete('kasus_malaria');
    }
}
