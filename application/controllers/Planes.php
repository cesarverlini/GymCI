<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Planes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Planes_model');
        $this->load->model('Services_model');

        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        $data = array(
            'planes' => $this->Planes_model->get_planes(),
        );
        $data['title'] = "Planes";
        $this->load->view('template/header', $data);
        $this->load->view("planes/planes_all", $data);
        $this->load->view('template/footer');
    }

    public function new_plan()
    {
        $data = array(
            'services' => $this->Services_model->get_services()
        );

        $id = $this->uri->segment(2);
        if (!empty($id)) {
            $data['plan'] = $id;
        }

        $data['title'] = "Planes";
        $this->load->view('template/header', $data);
        $this->load->view("planes/planes_add");
        $this->load->view('template/footer');
    }
    public function save_planes()
    {
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $detalles = $_POST['detalles'];
        $dias = $_POST['dias'];
        $costo = $_POST['costo'];
        $status = $_POST['status'];

        $data = array(
            'codigo' => $codigo,
            'nombre' => $nombre,
            'detalles' => $detalles,
            'dias' => $dias,
            'costo' => $costo,
            'status' => $status,
        );

        if (!empty($_POST['id'])) {
            $id = $this->input->post('id');
            $this->Planes_model->delete_plan_service($id);
            if ($this->Planes_model->save($id, $data)) {
                $servicios = $_POST['servicios'];
                foreach ($servicios as &$v) {
                    $plan_servicio = array(
                        'tbl_planes_id' => $id,
                        'tbl_services_id' => $v['id']
                    );
                    if ($this->Planes_model->save_plan_service($plan_servicio)) {
                        echo "true";
                    } else {
                        echo "false";
                    }
                }
            } else {
                echo "false";
            }
        } else {
            $id = $this->Planes_model->save(null, $data);
            $servicios = $_POST['servicios'];
            foreach ($servicios as &$v) {
                $plan_servicio = array(
                    'tbl_planes_id' => $id,
                    'tbl_services_id' => $v['id']
                );
                if ($this->Planes_model->save_plan_service($plan_servicio)) {
                    echo "true";
                } else {
                    echo "false";
                }
            }
        }
    }

    public function get_plan()
    {
        $id = $_POST['id'];
        $res = $this->Planes_model->get_plan($id);
        $res_service = $this->Planes_model->get_service($id);

        $plan_service = array(
            'plan' => $res,
            'services' => $res_service
        );

        echo json_encode($plan_service);
    }

    public function delete_plan()
    {
        // var_dump($_POST);
        $id = $_POST['id'];
        $res = $this->Planes_model->delete_plan_service($id) == 1 ? ($this->Planes_model->delete($id) == 1 ? "true" : "false") : "false";
        echo $res;
    }
}
