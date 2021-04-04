<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } elseif ($this->session->userdata('levelUser') !== 'Admin') {
            redirect('auth/blokir');
        }
        $this->load->model('M_penyakit');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Data Penyakit';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penyakit'] = $this->M_penyakit->ambilSemuaPenyakit();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/penyakit/v_penyakit', $data);
        $this->load->view('backend/template/footer');
    }

    public function ubah($idPenyakit)
    {
        $data['judul'] = 'Ubah Data Penyakit';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penyakit'] = $this->M_penyakit->ambilIdPenyakit($idPenyakit);

        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan penyakit',
            'required|trim',
            array('required' => 'Keterangan penyakit tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/penyakit/v_ubahpenyakit', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_penyakit->ubahPenyakit();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('penyakit');
        }
    }

    public function lihat($idPenyakit)
    {
        $data['judul'] = 'Lihat Data Penyakit';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penyakit'] = $this->M_penyakit->ambilIdPenyakit($idPenyakit);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/penyakit/v_lihatpenyakit', $data);
        $this->load->view('backend/template/footer');
    }
}
