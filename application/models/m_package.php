<?php

class m_package extends CI_Model
{
    function getPackage()
    {
        $this->db->select('*');
        $this->db->from('hb_package');
        $query = $this->db->get();
        return $query;
    }

    function getDescription($where)
    {
        $this->db->select('description_package');
        $this->db->from('hb_package');
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
}
