<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus_dbd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_kasusdbd');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Jumlah Kasus DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusdbd->ambilKasusDBD()->result_array();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasusdbd->cariDataDBD()->result_array();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/dbd/v_kasusDbd', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $this->load->model('M_penduduk');
        $keyword = $this->input->post('filterTahun');

        $data['judul'] = 'Tambah Data Kasus DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penduduk'] = $this->M_penduduk->cariData($keyword);
        $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $this->form_validation->set_rules(
            'penduduk',
            'Kecamatan',
            'required|trim',
            array('required' => "<small class='text-muted'><span class='text-danger'>*</span> Kecamatan harus diisi</small>")
        );
        $this->form_validation->set_rules(
            'bulan',
            'Bulan',
            'required|trim',
            array('required' => "<small class='text-muted'><span class='text-danger'>*</span> Bulan harus diisi</small>")
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/kasus/dbd/v_tambahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_kasusdbd->tambahKasus();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kasus_dbd');
        }
    }

    public function ubah($idKasus)
    {
        $data['judul'] = 'Ubah Data Kasus DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusdbd->ambilIdKasus($idKasus)->row_array();

        $this->form_validation->set_rules('jumlah', 'Jumlah Kasus Positif DBD', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/kasus/dbd/v_ubahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_kasusdbd->ubahKasus();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kasus_dbd');
        }
    }

    public function hapus($idKasus)
    {
        $this->M_kasusdbd->hapusKasus($idKasus);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kasus_dbd');
    }
}
