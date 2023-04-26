<?php

class m_users extends CI_Model
{
    function getUser()
    {
        $this->db->select('*');
        $this->db->from('hb_user');
        $this->db->where(array('level' => 'low'));
        if ($this->session->userdata('level') == "top") {
            $this->db->or_where(array('level' => 'middle'));
        }
        $query = $this->db->get();
        return $query;
    }
}
