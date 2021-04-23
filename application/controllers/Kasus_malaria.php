<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $data['judul'] = 'Kelola Data Kasus Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->M_kasusmalaria->ambilKasusMalaria()->result_array();

        if ($this->input->get('cari')) {
            $data['kasus'] = $this->M_kasusmalaria->cariDataMalaria()->result_array();
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
        $data['penduduk'] = $this->M_penduduk->filterTahun($keyword);

        $this->form_validation->set_rules(
            'penduduk',
            'Kecamatan',
            'required|trim|is_unique[kasus_malaria.idPenduduk]',
            array(
                'required' => "<small class='text-muted'><span class='text-danger'>*</span> Kecamatan harus diisi</small>",
                'is_unique' => "<small class='text-danger'>Data sudah ada</small>"
            )
        );
        $this->form_validation->set_rules(
            'malaria_klinis',
            'Malaria Klinis',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'meninggal',
            'Meninggal',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal011L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal011P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal14L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal14P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal59L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal59P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1014L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1014P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1564L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1564P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal65L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal65P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'rdt',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mik',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'pf',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'pv',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'pm',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'po',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mix',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
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
        $data['kasus'] = $this->M_kasusmalaria->ambilIdKasus($idKasus)->row_array();

        $this->form_validation->set_rules(
            'malaria_klinis',
            'Malaria Klinis',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'meninggal',
            'Meninggal',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal011L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal011P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal14L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal14P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal59L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal59P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1014L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1014P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1564L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal1564P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal65L',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mal65P',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'rdt',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mik',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'pf',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'pv',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'pm',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'po',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
        $this->form_validation->set_rules(
            'mix',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

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
