<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } elseif ($this->session->userdata('levelUser') !== 'Admin') {
            redirect('auth/blokir');
        }
        $this->load->model('M_tahun');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Data Tahun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['tahun'] = $this->M_tahun->ambilSemuaTahun();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/tahun/v_tahun', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Tahun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules(
            'tahun',
            'Tahun',
            'required|trim|is_unique[tahun.tahun]|exact_length[4]',
            array(
                'is_unique' => 'Tahun telah terdaftar.',
                'exact_length' => 'Tahun harus 4 angka.'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/tahun/v_tambahTahun', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_tahun->tambahTahun();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('tahun');
        }
    }

    public function ubah($idTahun)
    {
        $data['judul'] = 'Ubah Data Tahun';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['tahun'] = $this->M_tahun->ambilIdTahun($idTahun);

        $this->form_validation->set_rules(
            'tahun',
            'Tahun',
            'required|trim|is_unique[tahun.tahun]|exact_length[4]',
            array(
                'is_unique' => 'Tahun telah terdaftar.',
                'exact_length' => 'Tahun harus 4 angka.'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/tahun/v_ubahTahun', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_tahun->ubahTahun();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('tahun');
        }
    }

    public function hapus($idTahun)
    {
        $this->M_tahun->hapusTahun($idTahun);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('tahun');
    }
}
