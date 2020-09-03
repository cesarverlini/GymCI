<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';

$route['roles'] = "roles";
$route['agregar_rol'] = "roles/add_rol";
$route['guardar_rol'] = "roles/save_rol";

$route['usuarios'] = "users";
$route['nuevo_usuario'] = "users/new_user";
$route['guardar_usuario'] = "users/save_user";

$route['empleados'] = "persons/employes";
$route['nuevo_empleado'] = "persons/new_employe";
$route['edit_empleado/(:num)'] = "persons/edit_employe/$1";
$route['clientes'] = "persons/client";
$route['nuevo_cliente'] = "persons/new_client";




$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
