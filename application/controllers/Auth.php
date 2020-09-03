<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
	}
	public function index()
	{
		if ($this->session->userdata("login")) {
			redirect(base_url()."welcome");
		}
		else{
			$this->load->view("login");
		}
		

	}

	public function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$res = $this->User_model->login($username, sha1($password));
		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url());
		}
		else{
			$data  = array(
				'Nombre' => $res->nombre,
				'Apellido Paterno' => $res->apellido_paterno,
				'Apellido Materno' => $res->apellido_materno,
				'Apellido Materno' => $res->apellido_materno,
				'Foto' => $res->photo,
				'Rol' => $res->nombre_rol,
				'login' => TRUE
			);

			// var_dump($data);

			$this->session->set_userdata($data);
			redirect(base_url()."welcome");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
