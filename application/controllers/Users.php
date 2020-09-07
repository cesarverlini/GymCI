<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('../model/Empleado.php');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Roles_model');
		$this->load->model('User_model');
		$this->load->model('Person_model');

		$this->load->library(array('form_validation'));
	}

	public function index()
	{
		$data = array(
			'users' => $this->User_model->get_users()
		);
		// var_dump($data['users']);
		$data['title'] = "Usuarios";
		$this->load->view('template/header', $data);
		$this->load->view("users/users_all", $data);
		$this->load->view('template/footer');
	}

	public function new_user()
	{
		$data = array(
			'roles' => $this->Roles_model->get_Roles(),
			'employees' => $this->Person_model->get_persons()
		);
		$data['title'] = "Usuarios";
		$this->load->view('template/header', $data);
		$this->load->view("users/users_add", $data);
		$this->load->view('template/footer');
	}

	public function save_user()
	{
		$id_employee = $_POST['id_employee'];
		$user = $_POST['user'];
		$password = $_POST['password'];
		$user_rol = $_POST['user_rol'];

		$data = array(
			'id_persona' => $id_employee,
			'username' => $user,
			'password' => sha1($password),
			'id_rol' => $user_rol
		);

		$res = $this->User_model->save_user($data);
		echo $res;
	}

	public function autocomplete_employee() //inactive
	{
		$data = $this->input->post();
		$respuesta = $this->User_model->autocomplete_employee($data);
		echo json_encode($respuesta);
	}
}
