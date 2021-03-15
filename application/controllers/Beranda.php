<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function index()
    {
        $this->load->model('M_kasusmalaria');
        $this->load->model('M_kasusdbd');
        $this->load->model('M_kasuskusta');
        $this->load->model('M_penyakit');

        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd();
        $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/container');
        $this->load->view('frontend/template/content', $data);
        $this->load->view('frontend/template/footer');
    }

    public function pemetaan_malaria()
    {
        $this->load->model('M_kasusmalaria');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan Malaria';
        $data['pemetaan'] = $this->M_kasusmalaria->ambilPetaMalaria();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusmalaria->cariPerhitunganMalaria();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/pemetaan/peta_malaria', $data);
        $this->load->view('frontend/template/footer');
    }

    public function grafik_malaria()
    {
        $this->load->model('M_kasusmalaria');

        $data['judul'] = 'Grafik Malaria';
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria();
        $data['apiM'] = $this->M_kasusmalaria->dataMalaria();
        $data['usiaM'] = $this->M_kasusmalaria->usiaMalaria();

        if ($this->input->get('cari')) {
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria();
            $data['apiM'] = $this->M_kasusmalaria->cariDataMalaria();
            $data['usiaM'] = $this->M_kasusmalaria->cariUsiaMalaria();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/grafik/grafik_malaria', $data);
        $this->load->view('frontend/template/footer');
    }

    public function pemetaan_dbd()
    {
        $this->load->model('M_kasusdbd');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan DBD';
        $data['pemetaan'] = $this->M_kasusdbd->ambilPetaDBD();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusdbd->cariPerhitunganDBD();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/pemetaan/peta_dbd', $data);
        $this->load->view('frontend/template/footer');
    }

    public function grafik_dbd()
    {
        $this->load->model('M_kasusdbd');

        $data['judul'] = 'Grafik DBD';
        $data['irDbd'] = $this->M_kasusdbd->ambilPetaDBD();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd();
        $data['usiaD'] = $this->M_kasusdbd->usiaDbd();
        $data['waktuDbd'] = $this->M_kasusdbd->waktuDbd();

        if ($this->input->get('cari')) {
            $data['irDbd'] = $this->M_kasusdbd->cariPerhitunganDBD();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd();
            $data['usiaD'] = $this->M_kasusdbd->cariUsiaDbd();
            $data['waktuDbd'] = $this->M_kasusdbd->cariWaktuDbd();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/grafik/grafik_dbd', $data);
        $this->load->view('frontend/template/footer');
    }

    public function pemetaan_kusta()
    {
        $this->load->model('M_kasuskusta');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan Kusta';
        $data['pemetaan'] = $this->M_kasuskusta->ambilPetaKusta();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasuskusta->cariPerhitunganKusta();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/pemetaan/peta_kusta', $data);
        $this->load->view('frontend/template/footer');
    }

    public function grafik_kusta()
    {
        $this->load->model('M_kasuskusta');

        $data['judul'] = 'Grafik Kusta';
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta();
        $data['usiaK'] = $this->M_kasuskusta->usiaKusta();
        $data['kusta'] = $this->M_kasuskusta->ambilPetaKusta();

        if ($this->input->get('cari')) {
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta();
            $data['usiaK'] = $this->M_kasuskusta->cariUsiaKusta();
            $data['kusta'] = $this->M_kasuskusta->cariPerhitunganKusta();
        }

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/grafik/grafik_kusta', $data);
        $this->load->view('frontend/template/footer');
    }

    public function penyakit()
    {
        $this->load->model('M_penyakit');

        $data['judul'] = 'Penyakit Menular';
        $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();

        $this->load->view('frontend/template/head');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/penyakit', $data);
        $this->load->view('frontend/template/footer');
    }
}
