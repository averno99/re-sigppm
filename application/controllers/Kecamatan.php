<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } elseif ($this->session->userdata('levelUser') !== 'Admin') {
            redirect('auth/blokir');
        }
        $this->load->model('M_kecamatan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Data Kecamatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilSemuaKecamatan();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/kecamatan/v_kecamatan', $data);
        $this->load->view('backend/template/footer');
    }

    public function lihat($idKecamatan)
    {
        $data['judul'] = 'Lihat Data Kecamatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilIdKecamatan($idKecamatan);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/kecamatan/v_lihatkecamatan', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data Kecamatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules(
            'nama',
            'Nama kecamatan',
            'required|trim',
            array('required' => 'Nama kecamatan tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan kecamatan',
            'required|trim',
            array('required' => 'Keterangan kecamatan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/kecamatan/v_tambahkecamatan', $data);
            $this->load->view('backend/template/footer');
        } else {

            $upload_geojson = $_FILES['geojson']['name'];

            if ($upload_geojson) {
                $config['allowed_types']    = 'geojson';
                $config['max_size']         = 10240;
                $config['upload_path']      = './assets/geojson/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('geojson')) {
                    $geojson_baru = $this->upload->data('file_name');
                    $this->db->set('geojson', $geojson_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_kecamatan->tambahKecamatan($upload_geojson);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kecamatan');
        }
    }

    public function ubah($idKecamatan)
    {
        $data['judul'] = 'Ubah Data Kecamatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kecamatan'] = $this->M_kecamatan->ambilIdKecamatan($idKecamatan);

        $this->form_validation->set_rules(
            'nama',
            'Nama kecamatan',
            'required|trim',
            array('required' => 'Nama kecamatan tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan kecamatan',
            'required|trim',
            array('required' => 'Keterangan kecamatan tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/kecamatan/v_ubahkecamatan', $data);
            $this->load->view('backend/template/footer');
        } else {
            $upload_geojson = $_FILES['geojson']['name'];

            if ($upload_geojson) {
                $config['allowed_types']    = 'geojson';
                $config['max_size']         = 10240;
                $config['upload_path']      = './assets/geojson/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('geojson')) {
                    $geojson_lama = $data['kecamatan']['geojson'];
                    if ($geojson_lama != 'default.geojson') {
                        unlink(FCPATH . 'assets/geojson/' . $geojson_lama);
                    }

                    $geojson_baru = $this->upload->data('file_name');
                    $this->db->set('geojson', $geojson_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_kecamatan->ubahKecamatan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kecamatan');
        }
    }

    public function hapus($idKecamatan)
    {
        $data['kecamatan'] = $this->M_kecamatan->ambilIdKecamatan($idKecamatan);

        $geojson_lama = $data['kecamatan']['geojson'];
        if ($geojson_lama != 'default.geojson') {
            unlink(FCPATH . 'assets/geojson/' . $geojson_lama);
        }

        $this->M_kecamatan->hapusKecamatan($idKecamatan);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kecamatan');
    }
}
