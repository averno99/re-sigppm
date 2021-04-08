<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('profil');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'SIGPPM | Login';
            $this->load->view('backend/auth/auth_head', $data);
            $this->load->view('backend/auth/v_login');
            $this->load->view('backend/auth/auth_footer');
        } else {
            $this->_masuk();
        }
    }

    private function _masuk()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            #Usernya aktif
            if ($user['status'] == 'Aktif') {
                #cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'levelUser' => $user['levelUser']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['levelUser'] == 'Admin') {
                        $this->session->set_flashdata('login', 'Anda berhasil masuk kedalam sistem');
                        redirect('dashboard');
                    } else {
                        $this->session->set_flashdata('login', 'Anda berhasil masuk kedalam sistem');
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('pesan', "Password Salah");
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', "Username tidak aktif");
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', "Username belum mendaftar");
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('levelUser');

        $this->session->set_flashdata('logout', 'Kamu Berhasil Logout');
        redirect('auth');
    }

    public function blokir()
    {
        $this->load->view('backend/auth/v_blokirAkses');
    }
}
