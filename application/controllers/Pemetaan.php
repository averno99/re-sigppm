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
    }

    public function malaria()
    {
        $this->load->model('M_kasusmalaria');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan Kasus Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemetaan'] = $this->M_kasusmalaria->dataMalaria()->result_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/pemetaan/v_pemetaanMalaria', $data);
        $this->load->view('backend/template/footer', $data);
    }

    public function dbd()
    {
        $this->load->model('M_kasusdbd');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan Kasus DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemetaan'] = $this->M_kasusdbd->ambilPetaDBD()->result_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasusdbd->cariPerhitunganDBD()->result_array();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/pemetaan/v_pemetaanDBD', $data);
        $this->load->view('backend/template/footer', $data);
    }

    public function kusta()
    {
        $this->load->model('M_kasuskusta');
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Pemetaan Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemetaan'] = $this->M_kasuskusta->ambilPetaKusta()->result_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['pemetaan'] = $this->M_kasuskusta->cariDataKusta()->result_array();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/pemetaan/v_pemetaanKusta', $data);
        $this->load->view('backend/template/footer', $data);
    }
}
