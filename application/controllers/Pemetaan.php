<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemetaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_pemetaan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Pemetaan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/pemetaan/v_pemetaan', $data);
        $this->load->view('backend/template/footer', $data);
    }

    public function malaria()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Pemetaan Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemetaan'] = $this->M_pemetaan->ambilPetaMalaria($keyword);
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/pemetaan/v_pemetaanMalaria', $data);
        $this->load->view('backend/template/footer', $data);
    }

    public function dbd()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Pemetaan DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemetaan'] = $this->M_pemetaan->ambilPetaDBD($keyword);
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/pemetaan/v_pemetaanDBD', $data);
        $this->load->view('backend/template/footer', $data);
    }

    public function kusta()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Pemetaan Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemetaan'] = $this->M_pemetaan->ambilPetaKusta($keyword);
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/pemetaan/v_pemetaanKusta', $data);
        $this->load->view('backend/template/footer', $data);
    }
}
