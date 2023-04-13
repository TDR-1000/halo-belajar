<?php
defined('BASEPATH') or exit('No direct script access allowed');

class main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!empty($this->session->userdata('status') == FALSE)) {
            // alert peringatan bahwa harus login
            $this->session->set_flashdata('failed', 'Anda Belum login, silahkan login terlebih dahulu !');
        }

        $this->load->model('m_main');
    }

    public function dashboard()
    {
        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('main/dashboard');
        $this->load->view('main/footer');
    }

    public function user()
    {
        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('user/index');
        $this->load->view('main/footer');
    }
}
