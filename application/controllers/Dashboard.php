<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } elseif ($this->session->userdata('levelUser') !== 'Admin') {
            redirect('auth/blokir');
        }
    }

    public function index()
    {
        $this->load->model('M_penduduk');
        $this->load->model('M_kasusmalaria');
        $this->load->model('M_kasusdbd');
        $this->load->model('M_kasuskusta');

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dash'] = $this->M_penduduk->ambilPendudukBaru();
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd();

        if ($this->input->get('cari')) {
            $data['dash'] = $this->M_penduduk->cariData();
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria();
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboard', $data);
        $this->load->view('backend/template/footer');
    }

    public function dash_malaria()
    {
        $this->load->model('M_kasusmalaria');

        $data['judul'] = 'Dashboard Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria();
        $data['apiM'] = $this->M_kasusmalaria->dataMalaria();
        $data['usiaM'] = $this->M_kasusmalaria->usiaMalaria();

        if ($this->input->get('cari')) {
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria();
            $data['apiM'] = $this->M_kasusmalaria->cariDataMalaria();
            $data['usiaM'] = $this->M_kasusmalaria->cariUsiaMalaria();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboardMalaria', $data);
        $this->load->view('backend/template/footer');
    }

    public function dash_kusta()
    {
        $this->load->model('M_kasuskusta');

        $data['judul'] = 'Dashboard Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta();
        $data['usiaK'] = $this->M_kasuskusta->usiaKusta();
        $data['kusta'] = $this->M_kasuskusta->ambilPetaKusta();

        if ($this->input->get('cari')) {
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta();
            $data['usiaK'] = $this->M_kasuskusta->cariUsiaKusta();
            $data['kusta'] = $this->M_kasuskusta->cariPerhitunganKusta();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboardKusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function dash_dbd()
    {
        $this->load->model('M_kasusdbd');

        $data['judul'] = 'Dashboard DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
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

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboardDbd', $data);
        $this->load->view('backend/template/footer');
    }
}
