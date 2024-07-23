<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{

    function get_login($user, $password)
    { 
        // print_r(password_hash('satria2021', PASSWORD_DEFAULT));die;
        $data = $this->db->from('user')
            ->join('role', 'id_role = role_user')
            ->where('nik_user', $user)
            ->get()->row();

      if (!isset($data)) {
        return 'User Not Found';
      } else if(password_verify($password, $data->password_user)) {
        return $data;
      }
      else {
        return 'Wrong Password';
      }
    }
  
  
}
