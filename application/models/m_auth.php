<?php

class m_auth extends CI_Model
{
    function cekUser($where)
    {
        $this->db->select('*');
        $this->db->from('hb_login');
        $this->db->join('hb_user', 'hb_login.id_user = hb_user.id_user');
        $this->db->where($where);


        $query = $this->db->get();
        return $query;
    }

    function insertData($table, $data)
    {
        $this->db->insert($table, $data);
        return true;
    }

    function getId($id, $table)
    {
        $this->db->select_max($id);
        $this->db->from($table);
        $query = $this->db->get();
        return $query;
    }

    function updateData($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return true;
    }
}
