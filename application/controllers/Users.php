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
		var_dump($_POST);
		$id_employee = $_POST['id_employee'];
		$user = $_POST['user'];
		$password = $_POST['password'];
		$user_rol = $_POST['user_rol'];


		$config = array(
			array(
				'field' => 'employee',
				'label' => 'Empleado',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Campo %s obligatorio.',
				),
			),
			array(
				'field' => 'user',
				'label' => 'Usuario',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Campo %s obligatorio.',
				),
			),
			array(
				'field' => 'password',
				'label' => 'Contraseña',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Necesitas ingresar una %s.',
				),
			),
			array(
				'field' => 'user_rol',
				'label' => 'Rol de usuario',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Campo %s obligatorio.',
				),
			),
		);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == TRUE) {
			// $this->load->view('formsuccess');
			$data = array(
				'id_persona' => $id_employee,
				'username' => $user,
				'password' => sha1($password),
				'id_rol' => $user_rol
			);

			// var_dump($data);

			$res = $this->User_model->save_user($data);
			echo $res;
		} else {
			// $this->new_user();
			redirect(base_url()."nuevo_usuario");
		}
	}

	public function autocomplete_employee() //inactive
	{
		$data = $this->input->post();
		$respuesta = $this->User_model->autocomplete_employee($data);
		echo json_encode($respuesta);
	}
}
