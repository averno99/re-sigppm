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
        $data['judul'] = 'Kelola Data Kasus DBD';
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
        $data['penduduk'] = $this->M_penduduk->filterTahun($keyword);
        $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $this->form_validation->set_rules(
            'bulan',
            'Bulan',
            'required|trim|callback_kecamatan_check',
            array(
                'required' => "<small class='text-muted'><span class='text-danger'>*</span> Bulan harus diisi</small>"
            )
        );

        $this->form_validation->set_rules(
            'penduduk',
            'Kecamatan',
            'required|trim|callback_kecamatan_check',
            array(
                'required' => "<small class='text-muted'><span class='text-danger'>*</span> Kecamatan harus diisi</small>",
            )
        );

        $this->form_validation->set_rules(
            'dbd1L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd14L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd14P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd59L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd59P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1014L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1014P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1519L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1519P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd2044L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd2044P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd45L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd45P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'meninggal',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
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

    function kecamatan_check()
    {
        if ($this->input->post('bulan') and $this->input->post('penduduk')) {
            $post = $this->input->post(NULL, TRUE);
            $query = $this->db->query("SELECT * FROM kasus_dbd WHERE bulan = '$post[bulan]' AND idPenduduk = '$post[penduduk]'");
            if ($query->num_rows() > 0) {
                $this->form_validation->set_message('kecamatan_check', 'Data sudah ada');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function ubah($idKasus)
    {
        $data['judul'] = 'Ubah Data Kasus DBD';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusdbd->ambilIdKasus($idKasus)->row_array();

        $this->form_validation->set_rules(
            'dbd1L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd14L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd14P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd59L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd59P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1014L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1014P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1519L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd1519P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd2044L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd2044P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd45L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'dbd45P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'meninggal',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

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
