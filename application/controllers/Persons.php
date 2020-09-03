<?php
defined('BASEPATH') or exit('No direct script access allowed');

// include('../model/Empleado.php');

class Persons extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Roles_model');
		$this->load->model('Person_model');
	}

	public function index(){}
    public function employes() //here shows all employes
	{
		$employes = array(
			'employes' => $this->Person_model->get_persons()
		);
		$data['title'] = "Empleados";
		$this->load->view('template/header', $data);
		$this->load->view("employes/employes_all", $employes);
		$this->load->view('template/footer');
    }
    public function client() //here shows all clients
	{
		$data['title'] = "Clientes";
		$this->load->view('template/header', $data);
		$this->load->view("clients/clients_all");
		$this->load->view('template/footer');
	}

	public function new_employe()
	{
		$data['title'] = "Nuevo empleado";
		$this->load->view('template/header', $data);
		$this->load->view('employes/employes_add');
		$this->load->view('template/footer');
	}
	public function save_employe()
	{
		$nombre = $_POST['nombre'];
		$paterno = $_POST['paterno'];
		$materno = $_POST['materno'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$correo = $_POST['email'];		

		$empleado = array(
			'nombre' => $nombre,
			'apellido_paterno' => $paterno,
			'apellido_materno' => $materno,
			'direccion' => $direccion,			
			'telefono' => $telefono,			
            'correo' => $correo,
            'tipo_persona' => 0	
		);

		if(isset($_POST['id'])){
			$id = $_POST['id'];			
			$this->Person_model->update_person($id,$empleado);
			$id_emp = $_POST['id'];
		}else{
			$id_emp = $this->Person_model->save_person($empleado);
		}

		if ($_FILES) {
			$permitidos = array("image/jpg", "image/jpeg", "image/png");
			$filename = "";
			$extension = "";

			if (in_array($_FILES['fotografia']['type'], $permitidos)) {
				$filename = explode(".", $_FILES['fotografia']['name']);
				$extension = end($filename);
				$name = $id_emp . "_" . $nombre . "_" . $paterno;

				if (move_uploaded_file($_FILES["fotografia"]["tmp_name"], "assets/img/" . $name . "." . $extension)) {
					$save_foto = array(
						'photo' => $name.".".$extension
					);
					$this->Person_model->update_person($id_emp,$save_foto);
				}
			}
        }
        
        if ($id_emp) {
            echo "true";
        }else{
            echo "false";
        }
	}
	public function edit_employe(){
		$id = $this->uri->segment(2);		
		$employe = array(
			'employe' => $this->Person_model->get_person($id)
		);
		// var_dump($employe);
		$data['title'] = "Empleados";
		$this->load->view('template/header', $data);
		$this->load->view("employes/employes_add", $employe);
		$this->load->view('template/footer');
	}

	public function delete_person()
	{
		$id = $this->input->post('id');
		$res = $this->Person_model->delete_person($id) == 1 ? "true" : "false";
		// $res == 1 ? (echo "true") : echo "false";
		echo $res;
	}
}
