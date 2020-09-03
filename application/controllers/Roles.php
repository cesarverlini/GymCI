<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roles extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Roles_model');
	}

	public function index()
	{
		$roles = array(
			'roles' => $this->Roles_model->get_Roles()
		);
		$data['title'] = "Roles";
		$this->load->view('template/header', $data);
		$this->load->view("roles/roles_all", $roles);
		$this->load->view('template/footer');
	}

	public function add_rol()
	{
		$data['title'] = "Nuevo rol de usuario";
		$this->load->view('template/header', $data);
		$this->load->view('Roles/roles_add');
		$this->load->view('template/footer');
	}
	public function save_rol()
	{
	
		$nombre = $this->input->post('nombre');
		$servicios = $this->input->post('servicios');
		$planes = $this->input->post('planes');
		$miembros = $this->input->post('miembros');
		$administracion = $this->input->post('administracion');
		
		$data = array(
			'nombre_rol' => $nombre,
			'servicios' => $servicios == "true" ? true : false,
			'planes' => $planes  == "true" ? true : false,
			'miembros' => $miembros  == "true" ? true : false,
			'administracion' => $administracion  == "true" ? true : false,
		);
		
		if (!empty($this->input->post('id'))) { //si llega un id, edita, si no, guarda un registro nuevo
			$id = $this->input->post('id');
			if ($this->Roles_model->save_rol($id, $data)) {
				echo "true";				
			} else {
				echo "false";								
			}
		}else{
			$res = $this->Roles_model->save_rol(null,$data);
			echo $res;
		}
	}

	public function delete_rol()
	{
		$id = $this->input->post('id');
		$res = $this->Roles_model->delete_rol($id) == 1 ? "true" : "false";
		// $res == 1 ? (echo "true") : echo "false";
		echo $res;
	}

	public function get_rol()
	{
		$id =  $this->input->post('id');

		$res = $this->Roles_model->get_rol($id);

		echo json_encode($res);
	}
}
