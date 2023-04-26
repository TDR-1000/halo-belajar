<?php
defined('BASEPATH') or exit('No direct script access allowed');

class package extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logging')) {
            redirect(base_url('auth/login'));
        }

        $this->load->model('m_package');
        $this->load->library('session');
    }


    public function index()
    {
        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('package/index');
        $this->load->view('main/footer');
    }

    public function create()
    {

        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('package/create');
        $this->load->view('main/footer');
    }

    public function edit()
    {

        $data = $this->input->get(md5('package'), TRUE);
        var_dump($data);
        $this->load->view('main/head');
        $this->load->view('main/menu');
        $this->load->view('user/edit');
        $this->load->view('main/footer');
    }

    public function getData()
    {
        $query = $this->m_package->getPackage();
        $rows = $query->result_array();
        $no = 1;
        foreach ($rows as $key => $value) {
            $str = str_replace(" ", "+", $value['title_package']);
            $idpackage = md5($str);
            $btnInfo = "<button class='btn btn-info' onclick='infoPackage($value[id_package])' data-toggle='tooltip' title='Details'><i class='fas fa-info-circle'></i></button>";

            $btnEdit = "<a href='" . base_url('package/edit/_?package=' . $idpackage) . "'><button class='btn btn-success' data-toggle='tooltip' title='Edit'>Edit</button></a>";

            $result['data'][$key] = array(
                $no++,
                $value['title_package'],
                $btnInfo,
                $btnEdit
            );
        }

        echo json_encode($result);
    }


    public function description()
    {
        $id = $this->input->post('id');
        $where = array(
            'id_package' => $id
        );
        $query = $this->m_package->getDescription($where);
        $row = $query->row();
        $desc['description'] = $row->description_package;
        echo json_encode($desc);
    }


    public function insertData()
    {
        $user = $this->session->userdata('user');
        $title = $this->input->post('name');
        $desc = $this->input->post('desc');

        $qryPackage = $this->m_package->getId('id_package', 'hb_package');
        $fetchPackage = $qryPackage->row();
        $idPackage = $fetchPackage->id_package + 1;

        $now = date("Y-m-d H:i:s");

        $moreUnique = md5(uniqid(rand(), true));

        $dataInsert = array(
            'id_package' => $idPackage,
            'uid_package' => $moreUnique,
            'title_package' => $title,
            'description_package' => $desc,
            'user_created' => $user,
            'time_created' => $now
        );

        $response = $this->m_package->insertData('hb_package', $dataInsert);
        if ($response == true) {
            $input['info'] = "success";
        } else {
            $input['info'] = "failed";
        }

        echo json_encode($input);
    }
}
