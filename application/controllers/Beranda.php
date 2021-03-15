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
        $data['judul'] = 'Grafik Malaria';

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
        $data['judul'] = 'Grafik DBD';

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
        $data['judul'] = 'Grafik Kusta';

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
