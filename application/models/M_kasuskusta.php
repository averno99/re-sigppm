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
        kusta_baruPB, kusta_baruMB,
        
        (kus15LMB + kus15PMB + kus1625LMB + kus1625PMB + kus2635LMB + kus2635PMB + 
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as mb,

        (kus15LPB + kus15PPB + kus1625LPB + kus1625PPB + kus2635LPB + kus2635PPB +
        kus3645LPB + kus3645PPB + kus4655LPB + kus4655PPB + kus56LPB + kus56PPB) as pb,
        
        (kusta_baruPB + kusta_baruMB) as kasus_baru,
        (sembuhPB + sembuhMB) as sembuh')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function exportKusta($tahun)
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
        
        kusta_baruPB, kusta_baruMB, sembuhPB, sembuhMB, cacatPB, cacatMB,
        
        (kus15LMB + kus15PMB + kus1625LMB + kus1625PMB + kus2635LMB + kus2635PMB + 
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as mb,

        (kus15LPB + kus15PPB + kus1625LPB + kus1625PPB + kus2635LPB + kus2635PPB +
        kus3645LPB + kus3645PPB + kus4655LPB + kus4655PPB + kus56LPB + kus56PPB) as pb,
        
        (kusta_baruPB + kusta_baruMB) as kasus_baru,
        (sembuhPB + sembuhMB) as sembuh,
        (cacatPB + cacatMB) as cacat')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function ambilTahun()
    {
        $query = $this->db->select('tahun')
            ->from('kasus_kusta')
            ->group_by('tahun')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->order_by('jumlah_penduduk.tahun')
            ->get();
        return $query;
    }

    public function ambilCariTahun($tahun)
    {
        $query = $this->db->select('tahun')
            ->from('kasus_kusta')
            ->group_by('tahun')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun')
            ->get();
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
        kusta_baruPB, kusta_baruMB,
        
        (kus15LMB + kus15PMB + kus1625LMB + kus1625PMB + kus2635LMB + kus2635PMB + 
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as mb,

        (kus15LPB + kus15PPB + kus1625LPB + kus1625PPB + kus2635LPB + kus2635PPB +
        kus3645LPB + kus3645PPB + kus4655LPB + kus4655PPB + kus56LPB + kus56PPB) as pb,
        
        (kusta_baruPB + kusta_baruMB) as kasus_baru,
        (sembuhPB + sembuhMB) as sembuh,
        (cacatPB + cacatMB) as cacat')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $keyword)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
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
        
        (kusta_baruPB + kusta_baruMB) as kasus_baru,
        (sembuhPB + sembuhMB) as sembuh,
        (cacatPB + cacatMB) as cacat')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('tahun', $tahun)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
        return $query;
    }

    public function ambilIdKasus($idKasus)
    {
        $query = $this->db->select('penyakit, tahun, nama, kasus_kusta.id as idKusta, jumlah_penduduk.jumlah as jumlahPenduduk,
        kus15LMB, kus15PMB, kus15LPB, kus15PPB,
        kus1625LMB, kus1625PMB, kus1625LPB, kus1625PPB, 
        kus2635LMB, kus2635PMB, kus2635LPB, kus2635PPB,
        kus3645LMB, kus3645PMB, kus3645LPB, kus3645PPB, 
        kus4655LMB, kus4655PMB, kus4655LPB, kus4655PPB,
        kus56LMB, kus56PMB, kus56LPB, kus56PPB,
        kusta_baruPB, kusta_baruMB, sembuhPB, sembuhMB, cacatPB, cacatMB')
            ->from('kasus_kusta')
            ->join('jumlah_penduduk', 'kasus_kusta.idPenduduk = jumlah_penduduk.id')
            ->join('kecamatan', 'jumlah_penduduk.idKecamatan = kecamatan.id')
            ->join('penyakit', 'kasus_kusta.idPenyakit = penyakit.id')
            ->where('kasus_kusta.id', $idKasus)
            ->order_by('jumlah_penduduk.tahun, penyakit.penyakit, kecamatan.nama')
            ->get();
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
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as totalMB,
        
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
            ->get();
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
        kus3645LMB + kus3645PMB + kus4655LMB + kus4655PMB + kus56LMB + kus56PMB) as totalMB,
        
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
            ->get();
        return $query;
    }

    public function tambahKasus()
    {
        $data = [
            "idPenduduk" => $this->input->post('penduduk', true),
            "idPenyakit" => 3,
            "kusta_baruPB" => $this->input->post('kusta_baruPB', true),
            "kusta_baruMB" => $this->input->post('kusta_baruMB', true),
            "sembuhPB" => $this->input->post('sembuhPB', true),
            "sembuhMB" => $this->input->post('sembuhMB', true),
            "cacatPB" => $this->input->post('cacatPB', true),
            "cacatMB" => $this->input->post('cacatMB', true),

            "kus15LPB" => $this->input->post('kus15LPB', true),
            "kus15PPB" => $this->input->post('kus15PPB', true),
            "kus1625LPB" => $this->input->post('kus1625LPB', true),
            "kus1625PPB" => $this->input->post('kus1625PPB', true),
            "kus2635LPB" => $this->input->post('kus2635LPB', true),
            "kus2635PPB" => $this->input->post('kus2635PPB', true),
            "kus3645LPB" => $this->input->post('kus3645LPB', true),
            "kus3645PPB" => $this->input->post('kus3645PPB', true),
            "kus4655LPB" => $this->input->post('kus4655LPB', true),
            "kus4655PPB" => $this->input->post('kus4655PPB', true),
            "kus56LPB" => $this->input->post('kus56LPB', true),
            "kus56PPB" => $this->input->post('kus56PPB', true),

            "kus15LMB" => $this->input->post('kus15LMB', true),
            "kus15PMB" => $this->input->post('kus15PMB', true),
            "kus1625LMB" => $this->input->post('kus1625LMB', true),
            "kus1625PMB" => $this->input->post('kus1625PMB', true),
            "kus2635LMB" => $this->input->post('kus2635LMB', true),
            "kus2635PMB" => $this->input->post('kus2635PMB', true),
            "kus3645LMB" => $this->input->post('kus3645LMB', true),
            "kus3645PMB" => $this->input->post('kus3645PMB', true),
            "kus4655LMB" => $this->input->post('kus4655LMB', true),
            "kus4655PMB" => $this->input->post('kus4655PMB', true),
            "kus56LMB" => $this->input->post('kus56LMB', true),
            "kus56PMB" => $this->input->post('kus56PMB', true)
        ];

        $this->db->insert('kasus_kusta', $data);
    }

    public function ubahKasus()
    {
        $data = [
            "kusta_baruPB" => $this->input->post('kusta_baruPB', true),
            "kusta_baruMB" => $this->input->post('kusta_baruMB', true),
            "sembuhPB" => $this->input->post('sembuhPB', true),
            "sembuhMB" => $this->input->post('sembuhMB', true),
            "cacatPB" => $this->input->post('cacatPB', true),
            "cacatMB" => $this->input->post('cacatMB', true),

            "kus15LPB" => $this->input->post('kus15LPB', true),
            "kus15PPB" => $this->input->post('kus15PPB', true),
            "kus1625LPB" => $this->input->post('kus1625LPB', true),
            "kus1625PPB" => $this->input->post('kus1625PPB', true),
            "kus2635LPB" => $this->input->post('kus2635LPB', true),
            "kus2635PPB" => $this->input->post('kus2635PPB', true),
            "kus3645LPB" => $this->input->post('kus3645LPB', true),
            "kus3645PPB" => $this->input->post('kus3645PPB', true),
            "kus4655LPB" => $this->input->post('kus4655LPB', true),
            "kus4655PPB" => $this->input->post('kus4655PPB', true),
            "kus56LPB" => $this->input->post('kus56LPB', true),
            "kus56PPB" => $this->input->post('kus56PPB', true),

            "kus15LMB" => $this->input->post('kus15LMB', true),
            "kus15PMB" => $this->input->post('kus15PMB', true),
            "kus1625LMB" => $this->input->post('kus1625LMB', true),
            "kus1625PMB" => $this->input->post('kus1625PMB', true),
            "kus2635LMB" => $this->input->post('kus2635LMB', true),
            "kus2635PMB" => $this->input->post('kus2635PMB', true),
            "kus3645LMB" => $this->input->post('kus3645LMB', true),
            "kus3645PMB" => $this->input->post('kus3645PMB', true),
            "kus4655LMB" => $this->input->post('kus4655LMB', true),
            "kus4655PMB" => $this->input->post('kus4655PMB', true),
            "kus56LMB" => $this->input->post('kus56LMB', true),
            "kus56PMB" => $this->input->post('kus56PMB', true)
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
