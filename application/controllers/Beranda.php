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

        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();
        $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();

        if ($this->input->get('cari')) {
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
            $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();
        }

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
        $data['pemetaan'] = $this->M_kasusmalaria->dataMalaria()->result_array();
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
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
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['apiM'] = $this->M_kasusmalaria->dataMalaria()->result_array();

        if ($this->input->get('cari')) {
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
            $data['apiM'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
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
        $data['pemetaan'] = $this->M_kasusdbd->ambilPetaDBD()->result_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusdbd->cariPerhitunganDBD()->result_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
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
        $data['irDbd'] = $this->M_kasusdbd->ambilPetaDBD()->result_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();
        $data['waktuDbd'] = $this->M_kasusdbd->waktuDbd()->result_array();

        if ($this->input->get('cari')) {
            $data['irDbd'] = $this->M_kasusdbd->cariPerhitunganDBD()->result_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
            $data['waktuDbd'] = $this->M_kasusdbd->cariWaktuDbd()->result_array();
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
        $data['pemetaan'] = $this->M_kasuskusta->ambilPetaKusta()->result_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasuskusta->cariDataKusta()->result_array();
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
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
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['kusta'] = $this->M_kasuskusta->ambilPetaKusta()->result_array();

        if ($this->input->get('cari')) {
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
            $data['kusta'] = $this->M_kasuskusta->cariDataKusta()->result_array();
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
        $this->load->view('frontend/penyakit/penyakit', $data);
        $this->load->view('frontend/template/footer');
    }
}
