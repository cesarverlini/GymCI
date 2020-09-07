<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services_model extends CI_Model
{
    public function get_services()
	{       
        $query = $this->db->get('tbl_services');
		return $query->result();
    }
    public function get_service($id)
	{
		$res = $this->db->where('id', $id)->get('tbl_services');
		return $res->result();
	}
    public function save($id = null, $data)
    {
        if ($id != null) {
			return $this->db->where('id', $id)->update('tbl_services', $data);
		}else{
            $this->db->insert('tbl_services', $data);
            $last_ID = $this->db->insert_id();
            return $last_ID;
		}
    }
    public function delete($id)
	{
		return $this->db->where('id', $id)->delete('tbl_services');
	}
}
