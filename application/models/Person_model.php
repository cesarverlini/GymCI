<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Person_model extends CI_Model
{

  public function get_persons() //get all persons registered
  {
    $res = $this->db->get('tbl_personas');
    return $res->result();
  }
  public function get_person($id) //get a person by the id
  {
    $res = $this->db->where('id', $id)->get('tbl_personas');
    return $res->result();
  }
  public function save_person($data)
  {
    $this->db->insert('tbl_personas', $data);
    $ultimoId = $this->db->insert_id();
    return $ultimoId;
  }
  public function update_person($id, $data)
  {
    return $this->db->where('id', $id)->update('tbl_personas', $data);
  }
  public function delete_person($id)
  {
    return $this->db->where('id', $id)->delete('tbl_personas');
  }
}
