<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planes_model extends CI_Model
{
    public function get_planes()
    {
        $query = $this->db->get('tbl_planes');
        return $query->result();
    }
    public function get_plan($id)
    {
        $query = $this->db->where('id', $id)->get('tbl_planes');

        return $query->result();
    }
    public function get_service($id)
    {
        $service =  $this->db->select('tbl_services.nombre as nombre_service, tbl_services.id')->from('tbl_plan_services')
            ->join('tbl_services', 'tbl_services_id = tbl_services.id')
            ->where('tbl_planes_id', $id)->get();
        return $service->result();
    }
    public function save($id = null, $data)
    {
        if ($id != null) {
            return $this->db->where('id', $id)->update('tbl_planes', $data);
        } else {
            $this->db->insert('tbl_planes', $data);
            $last_ID = $this->db->insert_id();
            return $last_ID;
        }
    }
    public function save_plan_service($data)
    {
        $this->db->insert('tbl_plan_services', $data);
        $last_ID = $this->db->insert_id();
        return $last_ID;
    }
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('tbl_planes');
    }
    public function delete_plan_service($id)
    {
        return $this->db->where('tbl_planes_id', $id)->delete('tbl_plan_services');
    }
}
