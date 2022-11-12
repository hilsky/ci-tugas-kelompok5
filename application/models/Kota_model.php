<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kota_model extends CI_Model
{
    public function getKota()
    {
        $this->db->select('kota');
        $this->db->from('m_pendamping');
        $this->db->order_by('kota', 'asc');
        $this->db->group_by('kota');
        $query = $this->db->get();
        return $query->result_array();
    }
}
