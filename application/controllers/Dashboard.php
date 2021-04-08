<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
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
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();

        if ($this->input->get('cari')) {
            $data['dash'] = $this->M_penduduk->cariData();
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
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

        $data['judul'] = 'Grafik Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria()->row_array();
        $data['apiM'] = $this->M_kasusmalaria->dataMalaria()->result_array();

        if ($this->input->get('cari')) {
            $data['rasioM'] = $this->M_kasusmalaria->cariRasioMalaria()->row_array();
            $data['apiM'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
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

        $data['judul'] = 'Grafik Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta()->row_array();
        $data['kusta'] = $this->M_kasuskusta->ambilPetaKusta()->result_array();

        if ($this->input->get('cari')) {
            $data['rasioK'] = $this->M_kasuskusta->cariRasioKusta()->row_array();
            $data['kusta'] = $this->M_kasuskusta->cariDataKusta()->result_array();
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

        $data['judul'] = 'Grafik DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['irDbd'] = $this->M_kasusdbd->ambilPetaDBD()->result_array();
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd()->row_array();
        $data['waktuDbd'] = $this->M_kasusdbd->waktuDbd()->result_array();

        if ($this->input->get('cari')) {
            $data['irDbd'] = $this->M_kasusdbd->cariPerhitunganDBD()->result_array();
            $data['rasioD'] = $this->M_kasusdbd->cariRasioDbd()->row_array();
            $data['waktuDbd'] = $this->M_kasusdbd->cariWaktuDbd()->result_array();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboardDbd', $data);
        $this->load->view('backend/template/footer');
    }
}
