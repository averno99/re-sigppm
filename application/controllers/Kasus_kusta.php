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
        $data['penduduk'] = $this->M_penduduk->filterTahun($keyword);

        $this->form_validation->set_rules(
            'penduduk',
            'Kecamatan',
            'required|trim|is_unique[kasus_kusta.idPenduduk]',
            array(
                'required' => "<small class='text-muted'><span class='text-danger'>*</span> Kecamatan harus diisi</small>",
                'is_unique' => "<small class='text-danger'>Data sudah ada</small>"
            )
        );

        $this->form_validation->set_rules(
            'kusta_baruPB',
            'Kasus Baru Tipe PB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kusta_baruMB',
            'Kasus Baru Tipe MB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'sembuhPB',
            'Penderita yang Sembuh Tipe PB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'sembuhMB',
            'Penderita yang Sembuh Tipe MB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'cacatPB',
            'Penderita yang Cacat Tipe PB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'cacatMB',
            'Penderita yang Cacat Tipe MB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
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

        $this->form_validation->set_rules(
            'kusta_baruPB',
            'Kasus Baru Tipe PB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kusta_baruMB',
            'Kasus Baru Tipe MB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'sembuhPB',
            'Penderita yang Sembuh Tipe PB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'sembuhMB',
            'Penderita yang Sembuh Tipe MB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'cacatPB',
            'Penderita yang Cacat Tipe PB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'cacatMB',
            'Penderita yang Cacat Tipe MB',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56LPB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56PPB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus15PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus1625PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus2635PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus3645PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus4655PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56LMB',
            'Laki - Laki',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );

        $this->form_validation->set_rules(
            'kus56PMB',
            'Perempuan',
            'numeric|trim',
            array('numeric' => "Data harus berupa angka")
        );
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
