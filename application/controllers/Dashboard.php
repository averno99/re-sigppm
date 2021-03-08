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
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dash'] = $this->M_penduduk->cariData($keyword);

        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria($keyword);
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta($keyword);
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd($keyword);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboard', $data);
        $this->load->view('backend/template/footer');
    }

    public function dash_malaria()
    {
        $this->load->model('M_kasusmalaria');
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Dashboard Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rasioM'] = $this->M_kasusmalaria->rasioMalaria($keyword);
        $data['apiM'] = $this->M_kasusmalaria->cariDataMalaria($keyword);
        $data['usiaM'] = $this->M_kasusmalaria->usiaMalaria($keyword);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboardMalaria', $data);
        $this->load->view('backend/template/footer');
    }

    public function dash_kusta()
    {
        $this->load->model('M_kasuskusta');
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Dashboard Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rasioK'] = $this->M_kasuskusta->rasioKusta($keyword);
        $data['usiaK'] = $this->M_kasuskusta->usiaKusta($keyword);
        $data['kusta'] = $this->M_kasuskusta->cariPerhitunganKusta($keyword);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboardKusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function dash_dbd()
    {
        $this->load->model('M_kasusdbd');
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['irDbd'] = $this->M_kasusdbd->cariPerhitunganDBD($keyword);
        $data['rasioD'] = $this->M_kasusdbd->rasioDbd($keyword);
        $data['usiaD'] = $this->M_kasusdbd->usiaDbd($keyword);
        $data['waktuDbd'] = $this->M_kasusdbd->waktuDbd($keyword);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/dashboard/dashboardDbd', $data);
        $this->load->view('backend/template/footer');
    }
}
