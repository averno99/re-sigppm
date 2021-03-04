<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Re_perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_penduduk');
        $this->load->model('M_kasus');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perhitungan'] = $this->M_penduduk->ambilSemuaPenduduk();
        $data['perhitungan'] = $this->M_kasus->ambilSemuaKasus();
        $data['tahun'] = $this->db->get('tahun')->result_array();
        // $data['penduduk'] = $this->db->get('jumlah_penduduk')->result_array();
        // $data['kasus'] = $this->db->get('kasus_positif')->result_array();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_reperhitungan', $data);
        $this->load->view('backend/template/footer');
    }

    public function cari()
    {
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Kelola Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['perhitungan'] = $this->M_perhitungan->cariData($keyword);
        $data['tahun'] = $this->db->get('tahun')->result_array();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/pegawai/perhitungan/v_reperhitungan', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $this->load->model('M_penduduk');

        $filterPenyakit = $this->input->post('filterPenyakit');
        $filterTahun = $this->input->post('filterTahun');

        $data['judul'] = 'Tambah Perhitungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penyakit'] = $this->db->get('penyakit')->result_array();
        $data['tahun'] = $this->db->get('tahun')->result_array();
        $data['kasus'] = $this->M_perhitungan->ambilFilterKasus($filterPenyakit, $filterTahun);
        $data['penduduk'] = $this->M_perhitungan->ambilFilterPenduduk($filterTahun);

        $this->form_validation->set_rules('penduduk', 'Jumlah Penduduk', 'required|trim');
        $this->form_validation->set_rules('kasus', 'Kasus Positif', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/pegawai/perhitungan/v_tambahperhitungan', $data);
            $this->load->view('backend/template/footer');
        } else {

            $inputPenduduk = $this->db->get_where('jumlah_penduduk', ['id' => $this->input->post('penduduk', true)])->row_array();
            $inputKasus = $this->db->get_where('kasus_positif', ['id' => $this->input->post('kasus', true)])->row_array();
            $jumlahPenduduk = $inputPenduduk['jumlah'];
            $jumlahKasus = $inputKasus['jumlah'];

            // 1 = DBD, 2 = Malaria, 3 = Kusta
            if ($inputKasus['idPenyakit'] == 1) {
                $hitung = ($jumlahKasus / $jumlahPenduduk) * 100000;
            } elseif ($inputKasus['idPenyakit'] == 2) {
                $hitung = ($jumlahKasus / $jumlahPenduduk) * 1000;
            } elseif ($inputKasus['idPenyakit'] == 3) {
                $hitung = ($jumlahKasus / $jumlahPenduduk) * 10000;
            }

            $this->M_perhitungan->tambahPerhitungan($hitung);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('perhitungan');
        }
    }
}
