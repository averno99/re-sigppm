<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } elseif ($this->session->userdata('levelUser') !== 'Admin') {
            redirect('auth/blokir');
        }
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Kelola Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->M_user->ambilSemuaUser();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/user/v_user', $data);
        $this->load->view('backend/template/footer');
    }

    public function lihat($idUser)
    {
        $data['judul'] = 'Lihat Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->M_user->ambilIdUser($idUser);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/admin/user/v_lihatUser', $data);
        $this->load->view('backend/template/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['levelUser'] = ['Admin', 'Pegawai'];

        $this->form_validation->set_rules(
            'nama',
            'Nama user',
            'required|trim',
            array('required' => 'Nama user tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim|is_unique[user.username]|min_length[5]',
            array(
                'required' => 'Username tidak boleh kosong',
                'is_unique' => 'Username telah digunakan',
                'min_length' => 'Mohon masukkan username minimal 5 karakter'
            )
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[4]|max_length[16]',
            array(
                'min_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'max_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'required' => 'Password tidak boleh kosong'
            )
        );
        $this->form_validation->set_rules(
            'password2',
            'Ulangi password',
            'trim|matches[password1]',
            array('matches' => 'Password tidak sesuai.')
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|trim',
            array('required' => 'Alamat tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/user/v_tambahuser', $data);
            $this->load->view('backend/template/footer');
        } else {
            $upload_gambar = $_FILES['gambar']['name'];

            if ($upload_gambar) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = 2048;
                $config['upload_path']      = './assets/gambar/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['user']['gambar'];
                    if ($gambar_lama != 'default.png') {
                        unlink(FCPATH . 'assets/gambar/user/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_user->tambahUser($upload_gambar);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('user');
        }
    }

    public function ubah($idUser)
    {
        $data['judul'] = 'Ubah Data User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->M_user->ambilIdUser($idUser);
        $data['levelUser'] = ['Admin', 'Pegawai'];
        $data['status'] = ['Aktif', 'Tidak Aktif'];

        $this->form_validation->set_rules(
            'nama',
            'Nama user',
            'required|trim',
            array('required' => 'Nama user tidak boleh kosong')
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|trim',
            array('required' => 'Alamat tidak boleh kosong')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/user/v_ubahuser', $data);
            $this->load->view('backend/template/footer');
        } else {
            $upload_gambar = $_FILES['gambar']['name'];

            if ($upload_gambar) {
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = 2048;
                $config['upload_path']      = './assets/gambar/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['users']['gambar'];
                    if ($gambar_lama != 'default.png') {
                        unlink(FCPATH . 'assets/gambar/user/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->M_user->ubahUser();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('user');
        }
    }

    public function hapus($idUser)
    {
        $data['users'] = $this->M_user->ambilIdUser($idUser);

        $gambar_lama = $data['users']['gambar'];
        if ($gambar_lama != 'default.png') {
            unlink(FCPATH . 'assets/gambar/user/' . $gambar_lama);
        }

        $this->M_user->hapusUser($idUser);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user');
    }

    public function reset_password($idUser)
    {
        $data['judul'] = 'Reset Password User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['users'] = $this->M_user->ambilIdUser($idUser);

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[4]|max_length[16]',
            array(
                'min_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'max_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'required' => 'Password tidak boleh kosong'
            )
        );
        $this->form_validation->set_rules(
            'password2',
            'Ulangi password',
            'trim|matches[password1]',
            array('matches' => 'Password tidak sesuai.')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar');
            $this->load->view('backend/template/topbar', $data);
            $this->load->view('backend/admin/user/v_resetpassword', $data);
            $this->load->view('backend/template/footer');
        } else {

            $this->M_user->resetPassword();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('user');
        }
    }
}
