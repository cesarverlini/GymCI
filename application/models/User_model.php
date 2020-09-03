<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function autocomplete_employee($data) //inactive
	{
		$emp = $data['search'];
		$employe = $this->db->query("SELECT * FROM tbl_personas where nombre like '%$emp%' || apellido_paterno like '%$emp%' || apellido_materno like '%$emp%'");

		return $employe->result();
	}

	public function save_user($data)
	{
		$this->db->insert('tbl_users', $data);
		$last_ID = $this->db->insert_id();
		return $last_ID;
	}
	public function get_users()
	{
		$query = $this->db->select('tbl_users.id, username, roles.nombre_rol, tbl_personas.nombre,tbl_personas.apellido_paterno,tbl_personas.apellido_materno')->from('tbl_users')
			->join('tbl_personas', 'tbl_personas.id = tbl_users.id_persona')
			->join('roles', 'roles.id_rol = tbl_users.id_rol')
			->get();

		return $query->result();
	}

	public function login($username, $password){
		// $resultados = $this->db->where("username", $username)->where("password", $password)->get("tbl_users");
		$query = $this->db->select('tbl_personas.nombre, tbl_personas.apellido_paterno, tbl_personas.apellido_materno, tbl_personas.photo, roles.nombre_rol')
				->where("username", $username)
				->where("password", $password)
				->from('tbl_users')
				->join('tbl_personas', 'tbl_personas.id = tbl_users.id_persona')
				->join('roles', 'roles.id_rol = tbl_users.id_rol')
				->get();
		// $this->db->where("username", $username);
		// $this->db->where("password", $password);

		// $resultados = $this->db->get("tbl_users");
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		else{
			return false;
		}
	}
}
