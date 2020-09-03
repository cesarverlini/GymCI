<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles_model extends CI_Model
{


	public function get_Roles()
	{
		$res = $this->db->get('roles');
		return $res->result();
	}

	public function get_rol($id)
	{
		$res = $this->db->where('id_rol', $id)->get('roles');
		return $res->result();
	}

	public function save_rol($id = null, $data)
	{
		if ($id != null) {
			return $this->db->where('id_rol', $id)->update('roles', $data);
		}else{
			$this->db->insert('roles', $data);
			$ultimoId = $this->db->insert_id();
			return $ultimoId;
		}
	}	

	public function delete_rol($id)
	{
		return $this->db->where('id_rol', $id)->delete('roles');
		// return $id;
	}
}
