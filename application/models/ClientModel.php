<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientModel extends CI_Model
{
  function __construct()
  {
    // print_r($this->session->userdata('userlogin'));die;
  }


  function get()
  {
    $data = $this->db
      ->from('client')
      // ->where('role_user <', 3)
      ->get()->result_array();
    return $data;
  }

}
