<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_kasus');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->ambilSemuaKasus();


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasus', $data);
        $this->load->view('backend/template/footer');
    }

    public function cari()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->cariData($keyword);


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasus', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $this->load->model('M_penduduk');
        $filterTahun = $this->input->post('filterTahun');

        $data['judul'] = 'Tambah Data Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penyakit'] = $this->db->get('penyakit')->result_array();
        $data['penduduk'] = $this->M_kasus->ambilFilterPenduduk($filterTahun);

        $this->form_validation->set_rules('jumlah', 'Jumlah Kasus Positif', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/kasus/v_tambahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_kasus->tambahKasus();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kasus');
        }
    }

    public function ubah($idKasus)
    {
        $data['judul'] = 'Ubah Data Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->ambilIdKasus($idKasus);
        $data['tahun'] = $this->db->get('tahun')->result_array();
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();
        $data['penyakit'] = $this->db->get('penyakit')->result_array();

        $this->form_validation->set_rules('jumlah', 'Jumlah Kasus Positif', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/kasus/v_ubahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_kasus->ubahKasus();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kasus');
        }
    }

    public function hapus($idKasus)
    {
        $this->M_kasus->hapusKasus($idKasus);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kasus');
    }

    // Malaria 

    public function malaria()
    {
        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->ambilKasusMalaria();


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasusMalaria', $data);
        $this->load->view('backend/template/footer');
    }

    public function cariMalaria()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->cariDataMalaria($keyword);


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasusMalaria', $data);
        $this->load->view('backend/template/footer');
    }

    // DBD 

    public function dbd()
    {
        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->ambilKasusDBD();


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasusDbd', $data);
        $this->load->view('backend/template/footer');
    }

    public function cariDBD()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->cariDataDBD($keyword);


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasusDbd', $data);
        $this->load->view('backend/template/footer');
    }

    // Kusta

    public function kusta()
    {
        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->ambilKasusKusta();


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasusKusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function cariKusta()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Kelola Jumlah Kasus Positif';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasus->cariDataKusta($keyword);


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/v_kasusKusta', $data);
        $this->load->view('backend/template/footer');
    }
}
