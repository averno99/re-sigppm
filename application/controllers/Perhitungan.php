<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function perhitungan_malaria()
    {
        $this->load->model('M_kasusmalaria');

        $data['judul'] = 'Kelola Perhitungan Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusmalaria->perhitunganMalaria();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasusmalaria->cariPerhitunganMalaria();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_perhitunganmalaria', $data);
        $this->load->view('backend/template/footer');
    }

    public function perhitungan_kusta()
    {
        $this->load->model('M_kasuskusta');

        $data['judul'] = 'Kelola Perhitungan Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasuskusta->perhitunganKusta();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasuskusta->cariPerhitunganKusta();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_perhitungankusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function perhitungan_dbd()
    {
        $this->load->model('M_kasusdbd');
        $data['judul'] = 'Kelola Perhitungan DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusdbd->perhitunganDBD();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasusdbd->cariPerhitunganDBD();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_perhitungandbd', $data);
        $this->load->view('backend/template/footer');
    }
}
