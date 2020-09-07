<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Services_model');
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        $data = array(
            'services' => $this->Services_model->get_services()
        );
        $data['title'] = "Servicios";
        $this->load->view('template/header', $data);
        $this->load->view("services/services_all", $data);
        $this->load->view('template/footer');
    }

    public function new_service()
    {
        $data['title'] = "Servicios";
        $this->load->view('template/header', $data);
        $this->load->view("services/service_add");
        $this->load->view('template/footer');
    }
    public function save_services()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion
        );

        if (!empty($this->input->post('id'))) {
            $id = $this->input->post('id');
			if ($this->Services_model->save($id, $data)) {
				echo "true";				
			} else {
				echo "false";								
			}
        } else {
            if ($this->Services_model->save(null, $data)) {
				echo "true";				
			} else {
				echo "false";								
			}
        }
    }

    public function get_service()
    {
        $id = $_POST['id'];
        $res = $this->Services_model->get_service($id);
        echo json_encode($res);
    }

    public function delete_service()
	{
		$id = $_POST['id'];
		$res = $this->Services_model->delete($id) == 1 ? "true" : "false";
		echo $res;
	}

}
