<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kasus_malaria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_kasusmalaria');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Jumlah Kasus Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusmalaria->ambilKasusMalaria();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasusmalaria->cariDataMalaria();
        }

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/kasus/malaria/v_kasusMalaria', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $this->load->model('M_penduduk');
        $keyword = $this->input->post('filterTahun');

        $data['judul'] = 'Tambah Data Kasus Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penyakit'] = $this->db->get('penyakit')->result_array();
        $data['penduduk'] = $this->M_penduduk->filterTahun($keyword);

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
            $this->load->view('backend/pegawai/kasus/malaria/v_tambahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {
            $this->M_kasusmalaria->tambahKasus();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kasus_malaria');
        }
    }

    public function ubah($idKasus)
    {
        $data['judul'] = 'Ubah Data Kasus Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusmalaria->ambilIdKasus($idKasus);

        $this->form_validation->set_rules('malaria_klinis', 'Jumlah Kasus Positif Malaria', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/kasus/malaria/v_ubahkasus', $data);
            $this->load->view('backend/template/footer');
        } else {

            $this->M_kasusmalaria->ubahKasus();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kasus_malaria');
        }
    }

    public function hapus($idKasus)
    {
        $this->M_kasusmalaria->hapusKasus($idKasus);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kasus_malaria');
    }
}
