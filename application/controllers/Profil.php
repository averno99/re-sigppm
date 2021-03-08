<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar', $data);
        $this->load->view('backend/template/topbar');
        $this->load->view('backend/pegawai/profil/v_profil', $data);
        $this->load->view('backend/template/footer');
    }

    public function ubah()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/template/topbar');
            $this->load->view('backend/pegawai/profil/v_ubahProfil', $data);
            $this->load->view('backend/template/footer');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $alamat = $this->input->post('alamat');

            #Cek ada gambar upload
            $upload_gambar = $_FILES['gambar']['name'];

            if ($upload_gambar) {
                $config['allowed_types']    = 'gif|jpg|png';
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

            $data = [
                "nama" => $nama,
                "username" => $username,
                "alamat" => $alamat
            ];

            $this->M_user->ubahProfil($data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('profil');
        }
    }

    public function ubah_password()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('passwordSekarang', 'Password Saat Ini', 'required|trim');
        $this->form_validation->set_rules(
            'passwordBaru1',
            'Password Baru',
            'required|trim|min_length[4]|max_length[16]',
            array(
                'min_length' => 'Mohon masukkan password dengan 4 - 16 karakter',
                'max_length' => 'Mohon masukkan password dengan 4 - 16 karakter'
            )
        );
        $this->form_validation->set_rules(
            'passwordBaru2',
            'Ulangi Password',
            'required|trim|matches[passwordBaru1]',
            array('matches' => 'Password tidak sesuai.')
        );


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/template/head', $data);
            $this->load->view('backend/template/sidebar', $data);
            $this->load->view('backend/template/topbar');
            $this->load->view('backend/pegawai/profil/v_profil', $data);
            $this->load->view('backend/template/footer');
        } else {
            $password_sekarang = $this->input->post('passwordSekarang');
            $password_baru = $this->input->post('passwordBaru1');
            if (!password_verify($password_sekarang, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', "Password Sekarang Salah!");
                redirect('profil');
            } else {
                if ($password_sekarang == $password_baru) {
                    $this->session->set_flashdata('pesan', "Password tidak boleh sama dengan password lama");
                    redirect('profil');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                    $this->M_user->ubahPassword($password_hash);
                    $this->session->set_flashdata('pesan', "Password berhasil diubah");
                    redirect('profil');
                }
            }
        }
    }
}
