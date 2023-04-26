<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logging')) {
            redirect(base_url('auth/login'));
        }

        $this->load->model('m_main');
        $this->load->library('session');
    }


    public function index()
    {
        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('main/v_dashboard');
        $this->load->view('main/footer');
    }

    public function countUser()
    {
        $query = $this->m_main->getUser();
        $data['rowsUser'] = $query->num_rows();
        echo json_encode($data);
    }
}
