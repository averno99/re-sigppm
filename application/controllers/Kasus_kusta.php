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
        $data['judul'] = 'Kelola Jumlah Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasuskusta->ambilKasusKusta();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/kusta/v_kasusKusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function cari()
    {
        $keyword = $this->input->post('cari');

        $data['judul'] = 'Kelola Jumlah Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasuskusta->cariDataKusta($keyword);


        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/kusta/v_kasusKusta', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $this->load->model('M_penduduk');
        $filterTahun = $this->input->post('filterTahun');

        $data['judul'] = 'Tambah Data Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penduduk'] = $this->M_kasuskusta->ambilFilterPenduduk($filterTahun);


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
            $this->M_kasuskusta->tambahKasus($pr, $cdr);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kasus_kusta');
        }
    }

    public function ubah($idKasus)
    {
        $data['judul'] = 'Ubah Data Kasus Kusta';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasuskusta->ambilIdKasus($idKasus);
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();
        $data['penyakit'] = $this->db->get('penyakit')->result_array();

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
