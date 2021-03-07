<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } elseif ($this->session->userdata('levelUser') !== 'Admin') {
            redirect('auth/blokir');
        }

        $this->load->model('DashModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dash'] = $this->DashModel->dash($keyword);

        $data['rasioM'] = $this->DashModel->rasioMalaria($keyword);
        $data['apiM'] = $this->DashModel->apiMalaria($keyword);
        $data['usiaM'] = $this->DashModel->usiaMalaria($keyword);

        $data['rasioK'] = $this->DashModel->rasioKusta($keyword);
        $data['tipeK'] = $this->DashModel->tipeKusta($keyword);
        $data['kusta'] = $this->DashModel->kusta($keyword);

        $data['irDbd'] = $this->DashModel->irDbd($keyword);
        $data['rasioD'] = $this->DashModel->rasioDbd($keyword);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/content', $data);
        $this->load->view('backend/template/footer');
    }

    public function dash_malaria()
    {
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Dashboard Malaria';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rasioM'] = $this->DashModel->rasioMalaria($keyword);
        $data['apiM'] = $this->DashModel->apiMalaria($keyword);
        $data['usiaM'] = $this->DashModel->usiaMalaria($keyword);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/contentMalaria', $data);
        $this->load->view('backend/template/footer');
    }

    public function cari()
    {
        $keyword = $this->input->get('cari');

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['dash'] = $this->DashModel->Caridash($keyword);

        $this->load->view('backend/template/head', $data);
        $this->load->view('backend/template/sidebar');
        $this->load->view('backend/template/topbar', $data);
        $this->load->view('backend/template/content', $data);
        $this->load->view('backend/template/footer');
    }
}
