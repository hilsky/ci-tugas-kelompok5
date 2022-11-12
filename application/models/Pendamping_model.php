<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendamping_model extends CI_Model
{
    public function import_data($datapendamping)
    {
        $jumlah = count($datapendamping);
        if ($jumlah > 0) {
            $this->db->replace('m_pendamping', $datapendamping);
        }
    }

    public function getDataPendamping($tanggalawal = null, $tanggalakhir = null)
    {
        $tanggalawalbaru = strtotime($tanggalawal);
        $tanggalakhirbaru = strtotime($tanggalakhir);
        if ($tanggalawal && $tanggalakhir) {
            $this->db->where('date_created >=', $tanggalawalbaru);
            $this->db->where('date_created <=', $tanggalakhirbaru);
        }
        return $this->db->get('m_pendamping')->result_array();
    }
    public function getPendampingById($id)
    {
        return $this->db->get_where('pendamping', ['id' => $id])->row_array();
    }
    public function hapusDataPendamping($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('m_pendamping', ['id' => $id]);
    }

    public function groupByKota()
    {
        $this->db->select('*', 'count(kota) as kota');
        $this->db->from('m_pendamping');
        $this->db->group_by('kota');
        $this->db->order_by('kota', 'ASC');
        $result = $this->db->get('m_pendamping');
        return $result->result_array();
        // $query = $this->db->query('SELECT kota, COUNT (kota) as num_kota FROM m_pendamping GROUP BY num_kota');
        // return $query;
    }
}
