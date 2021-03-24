<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus_kusta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_kasuskusta');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Data Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasuskusta->ambilKasusKusta()->result_array();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasuskusta->cariDataKusta()->result_array();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/kusta/v_kasusKusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $this->load->model('M_penduduk');
        $keyword = $this->input->post('filterTahun');

        $data['judul'] = 'Tambah Data Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penduduk'] = $this->M_penduduk->cariData($keyword);


        $this->form_validation->set_rules(
            'penduduk',
            'Kecamatan',
            'required|trim',
            array('required' => "<small class='text-muted'><span class='text-danger'>*</span> Kecamatan harus diisi</small>")
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/kasus/kusta/v_tambahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_kasuskusta->tambahKasus();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kasus_kusta');
        }
    }

    public function ubah($idKasus)
    {
        $data['judul'] = 'Ubah Data Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasuskusta->ambilIdKasus($idKasus)->row_array();

        $this->form_validation->set_rules('pb', 'PB Kusta', 'required|trim');
        $this->form_validation->set_rules('mb', 'MB Kusta', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/kasus/kusta/v_ubahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_kasuskusta->ubahKasus();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kasus_kusta');
        }
    }

    public function hapus($idKasus)
    {
        $this->M_kasuskusta->hapusKasus($idKasus);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kasus_kusta');
    }
}
