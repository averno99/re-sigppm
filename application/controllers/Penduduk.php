<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_penduduk');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->model('M_kecamatan');

        $data['judul'] = 'Kelola Data Jumlah Penduduk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penduduk'] = $this->M_penduduk->ambilSemuaPenduduk();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        if ($this->input->get('cari')) {
            $data['penduduk'] = $this->M_penduduk->cariData();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        } elseif ($this->input->get('kecamatan')) {
            $data['penduduk'] = $this->M_penduduk->cariKecamatan();
            $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/penduduk/v_penduduk', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {

        $data['judul'] = 'Tambah Data Jumlah Penduduk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kecamatan'] = $this->db->get('kecamatan')->result_array();

        $this->form_validation->set_rules(
            'tahun',
            'Tahun',
            'required|trim',
            array('required' => 'Tahun tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'kecamatan',
            'Kecamatan',
            'required|trim|callback_kecamatan_check',
            array('required' => 'Kecamatan tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'jumlah',
            'Jumlah Penduduk',
            'required|trim|numeric',
            array(
                'required' => 'Jumlah penduduk tidak boleh kosong',
                'numeric' => 'Jumlah penduduk harus angka'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/penduduk/v_tambahpenduduk', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_penduduk->tambahPenduduk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('penduduk');
        }
    }

    function kecamatan_check()
    {
        $post = $this->input->post(NULL, TRUE);
        $query = $this->db->query("SELECT * FROM jumlah_penduduk WHERE tahun = '$post[tahun]' AND idKecamatan = '$post[kecamatan]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('kecamatan_check', 'Data sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function ubah($idPenduduk)
    {
        $data['judul'] = 'Ubah Data Jumlah Penduduk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penduduk'] = $this->M_penduduk->ambilIdPenduduk($idPenduduk);

        $this->form_validation->set_rules(
            'jumlah',
            'Jumlah Penduduk',
            'required|trim|numeric',
            array(
                'required' => 'Jumlah penduduk tidak boleh kosong',
                'numeric' => 'Jumlah penduduk harus angka'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/penduduk/v_ubahpenduduk', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_penduduk->ubahPenduduk();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('penduduk');
        }
    }

    public function hapus($idPenduduk)
    {
        $this->M_penduduk->hapusPenduduk($idPenduduk);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('penduduk');
    }
}
