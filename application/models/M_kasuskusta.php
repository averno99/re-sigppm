<?php

class M_kasuskusta extends CI_model
{
    public function ambilKasusKusta()
    {
        $query = $this->db->select('penyakit, tahun, nama, kasus_kusta.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        kus15LMB, kus15PMB, kus15LPB, kus15PPB,
        kus1625LMB, kus1625PMB, kus1625LPB, kus1625PPB, 
        kus2635LMB, kus2635PMB, kus2635LPB, kus2635PPB,
        kus3645LMB, kus3645PMB, kus3645LPB, kus3645PPB, 
        kus4655LMB, kus4655PMB, kus4655LPB, kus4655PPB,
        kus56LMB, kus56PMB, kus56LPB, kus56PPB,
        
        (kus15LMB + kus15PMB + kus15LPB + kus15PPB +
        kus1625LMB + kus1625PMB + kus1625LPB + kus1625PPB +
        kus2635LMB + kus2635PMB + kus2635LPB + kus2635PPB +
        kus3645LMB + kus3645PMB + kus3645LPB + kus3645PPB + 
        kus4655LMB + kus4655PMB + kus4655LPB + kus4655PPB +
        kus56LMB + kus56PMB + kus56LPB + kus56PPB) as kus_total,
        kusta_baruPB, kusta_baruMB')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariDataKusta()
    {
        $keyword = $this->input->get('cari');
        $query = $this->db->select('penyakit, tahun, nama, kasus_kusta.id, jumlah_penduduk.jumlah as jumlahPenduduk,
        kus15LMB, kus15PMB, kus15LPB, kus15PPB,
        kus1625LMB, kus1625PMB, kus1625LPB, kus1625PPB, 
        kus2635LMB, kus2635PMB, kus2635LPB, kus2635PPB,
        kus3645LMB, kus3645PMB, kus3645LPB, kus3645PPB, 
        kus4655LMB, kus4655PMB, kus4655LPB, kus4655PPB,
        kus56LMB, kus56PMB, kus56LPB, kus56PPB,
        
        (kus15LMB + kus15PMB + kus15LPB + kus15PPB +
        kus1625LMB + kus1625PMB + kus1625LPB + kus1625PPB +
        kus2635LMB + kus2635PMB + kus2635LPB + kus2635PPB +
        kus3645LMB + kus3645PMB + kus3645LPB + kus3645PPB + 
        kus4655LMB + kus4655PMB + kus4655LPB + kus4655PPB +
        kus56LMB + kus56PMB + kus56LPB + kus56PPB) as kus_total,
        kusta_baruPB, kusta_baruMB')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function ambilIdKasus($idKasus)
    {
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

    public function perhitunganKusta()
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

    public function ambilPetaKusta()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
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
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->result_array();
        return $query;
    }

    public function cariPerhitunganKusta()
    {
        $keyword = $this->input->get('cari');
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

    public function rasioKusta()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
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
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function cariRasioKusta()
    {
        $keyword = $this->input->get('cari');
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

    public function usiaKusta()
    {
        $tahun = date('Y', strtotime('-1 year', strtotime(date('Y'))));
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
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get()->row_array();
        return $query;
    }

    public function cariUsiaKusta()
    {
        $keyword = $this->input->get('cari');
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
