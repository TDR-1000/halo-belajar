<?php
defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logging')) {
            redirect(base_url('auth/login'));
        }

        $this->load->model('m_users');
        $this->load->library('session');
    }


    public function index()
    {
        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('user/index');
        $this->load->view('main/footer');
    }

    public function edit()
    {

        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('user/edit');
        $this->load->view('main/footer');
    }

    public function getData()
    {
        $query = $this->m_users->getUser();
        $rows = $query->result_array();
        foreach ($rows as $key => $value) {
            $btnEdit = "<a href='" . base_url('users/edit/_?profile=' . $value['uid']) . "'><button class='btn btn-success' data-toggle='tooltip' title='Edit Details'>Edit</button></a>";

            if ($value['status_user'] == 1) {
                $status = "<span class='btn btn-success'>active</span>";
            } else {
                $status = "<span class='btn btn-danger'>not active</span>";
            }

            $result['data'][$key] = array(
                $value['nama_user'],
                $value['email_user'],
                $status
            );
        }

        echo json_encode($result);
    }



    public function getUser()
    {
        $user = $this->uid = $this->input->get('profile', TRUE);
        $data['uid'] = $user;

        $where = array(
            'uid' => $user
        );
        $query = $this->m_users->cekUser($where);
    }
}
