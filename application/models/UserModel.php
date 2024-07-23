<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    // print_r($this->session->userdata('userlogin'));die;
  }


  function get_user()
  {
    $operator = ($this->session->userlogin['role_user'] == 1 ? "<=" : ">=");
    $su = ($this->session->userlogin['role_user'] == 1 ? "1" : "2");
    $data = $this->db
    
      ->select('a.id_user as id_user, b.id_user as id_atasan, a.nama_user as nama_user, b.nama_user as nama_atasan, a.nik_user as nik_user, b.nik_user as nik_atasan, a.jabatan_user as jabatan_user, b.jabatan_user as jabatan_atasan, nama_role, a.foto_user, b.foto_user as foto_atasan, a.role_user')
      ->from('user a')
      ->join('user b', 'b.id_user = a.chief_user', 'LEFT')
      ->join('role c', 'a.role_user = c.id_role')
      ->join('unit_pengelola d', 'a.unit_user = d.id_unitpengelola', 'LEFT')
      ->where('a.status_user ' . $operator . '', 1)
      ->where('a.role_user >= ', $su)
      ->get()->result_array();
    return $data;
  }
  function get_ppk()
  {
    $data = $this->db
      ->select('a.id_user as id_user, b.id_user as id_atasan, a.nama_user as nama_user, b.nama_user as nama_atasan, a.nik_user as nik_user, b.nik_user as nik_atasan, a.jabatan_user as jabatan_user, b.jabatan_user as jabatan_atasan, nama_role, a.foto_user, b.foto_user as foto_atasan, a.role_user')
      ->from('user a')
      ->join('user b', 'b.id_user = a.chief_user', 'LEFT')
      ->join('role c', 'a.role_user = c.id_role')
      ->join('unit_pengelola d', 'a.unit_user = d.id_unitpengelola', 'LEFT')
      ->where('a.role_user', 4)
      ->get()->result_array();
    return $data;
  }
  function get_pptk()
  {
    $data = $this->db
      ->select('a.id_user as id_user, b.id_user as id_atasan, a.nama_user as nama_user, b.nama_user as nama_atasan, a.nik_user as nik_user, b.nik_user as nik_atasan, a.jabatan_user as jabatan_user, b.jabatan_user as jabatan_atasan, nama_role, a.foto_user, b.foto_user as foto_atasan, a.role_user')
      ->from('user a')
      ->join('user b', 'b.id_user = a.chief_user', 'LEFT')
      ->join('role c', 'a.role_user = c.id_role')
      ->join('unit_pengelola d', 'a.unit_user = d.id_unitpengelola', 'LEFT')
      ->where('a.role_user', 5)
      ->get()->result_array();
    return $data;
  }

  function get_admin()
  {
    $data = $this->db
      ->where('role_user <', 3)
      ->get('user')->result_array();
    return $data;
  }

  function get_user_company($company)
  {
    $operator = ($this->session->userlogin['role_user'] == 1 ? "<=" : ">=");
    $data = $this->db
      ->join('role', 'user.role_user = role.id_role')
      ->where('status_user ' . $operator . '', 1)
      ->where('company_user', $company)
      ->get('user')->result_array();
    return $data;
  }

  function get_user_detail($id)
  {
    return $this->db
      ->select('a.id_user as id_user, b.id_user as id_atasan, a.nama_user as nama_user, b.nama_user as nama_atasan, a.nik_user as nik_user, b.nik_user as nik_atasan, a.jabatan_user as jabatan_user, b.jabatan_user as jabatan_atasan, nama_role, a.foto_user, b.foto_user as foto_atasan, a.role_user, nama_unitpengelola')
      ->from('user a')
      ->join('user b', 'b.id_user = a.chief_user', 'LEFT')
      ->join('role c', 'a.role_user = c.id_role')
      ->join('unit_pengelola d', 'a.unit_user = d.id_unitpengelola', 'LEFT')
      ->where('a.id_user', $id)
      ->get()->row_array();
  }

  function get_pejabat()
  {
    return $this->db
      ->from('user')
      ->where('role_user < ', 6)
      ->get()->result_array();
  }
  function get_unit_kerja()
  {
    return $this->db
      ->from('unit_pengelola')
      ->get()->result_array();
  }

  

  function get_nama_atasan($id)
  {

    $pptk = $this->db
      ->select('a.id_user as id_user, b.id_user as id_atasan, a.nama_user as nama_user, b.nama_user as nama_atasan')
      ->from('user a')
      ->join('user b', 'b.id_user = a.chief_user')
      ->where('a.id_user', $id)
      ->get()->row_array();

    // if($pptk); die;
    return ($pptk ? $pptk['nama_atasan'] : "");
  }
  function get_staff_by_atasan($id)
  {

    $user = $this->db
      ->select('id_user')
      ->from('user')
      ->where('chief_user', $id)
      ->get()->result_array();

    if($id!= '') return $user;
  }
  function get_id_by_name($name)
  {

    $user = $this->db
      ->select('id_user')
      ->from('user')
      ->where('nama_user', $name)
      ->get()->row_array();

    // if($pptk); die;
    return ($user ? $user['id_user'] : "");
  }

  function check_email($id)
  {
    return $this->db
      ->where('email_user', $id)
      ->get('user')->row_array();
  }

  function get_role()
  {
    return $this->db
      ->get('role')->result_array();
  }

  function post_data($data)
  {
    //GET INSER ID
    $id = $this->post_user($data);

    //POST KE NOTIF & ACTIVITIES

    //GET USER YG DI BUAT
    $ue = $this->get_user_detail($id);

    //GET USER RECEIVES NOTIF
    $user = $this->db
      ->where('company_user', 1)
      ->or_where('company_user', $data['company_user'])
      ->where('role_user < ', 3)
      ->get('user')->result_array();

    foreach ($user as $u) :
      $data2 = array(
        'text_notification'     => 'User ' . $ue['nama_user'] . ' berhasil dibuat',
        'desc_notification'     => 'User <strong><a href="' . base_url() . 'profiles/detail/' . encrypt_uri($id) . '">' . $ue['nama_user'] . '</a></strong> telah dibuat oleh <a href="' . base_url() . 'profiles/detail/' . encrypt_uri($this->session->userlogin['id_user']) . '">' . $this->session->userlogin['nama_user'] . '</a>',
        'type_notification'     => 5,
        'user_notification'     => $u['id_user']
      );

      $this->NotificationModel->post_notif($data2);
    endforeach;

    //ACTIVITIES
    $data3 = array(
      'text_activities'         => 'User <a href="' . base_url() . 'profiles/detail/' . encrypt_uri($this->session->userlogin['id_user']) . '">' . $this->session->userlogin['nama_user'] . '</a> telah membuat user <a href="' . base_url() . 'profiles/detail/' . encrypt_uri($id) . '">' . $ue['nama_user'] . '</a>',
      'desc_activities'         => '<div class="avatar-group">
                                      <figure class="avatar">
                                        <img src="' . base_url() . 'uploads/users/' . $ue['foto_user'] . '" class="rounded-circle" alt="image">
                                      </figure>
                                      </div>',
      'type_activities'         => 5,
      'company_activities'      => $ue['company_user']
    );

    $this->ActivitiesModel->post_act($data3);
    return $id;
  }




  function post_user($data)
  {
    $this->db->insert('user', $data);
    return $this->db->insert_id();
  }


  function edit($data)
  {
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('user', $data);

    return $data['id_user'];
  }


  function delete_data($data)
  {
    //GET INSER ID
    $id = $this->edit($data);

    //POST KE NOTIF & ACTIVITIES
    //GET USER YG NGEDIT
    $e = $this->UserModel->get_user_detail($this->session->userlogin['id_user']);
    //GET USER YG DI EDIT
    $x = $this->UserModel->get_user_detail($id);


    //GET USER RECEIVES NOTIF
    $user = $this->db
      ->where('company_user', 1)
      ->or_where('company_user', $x['id_company'])
      ->where('role_user < ', 3)
      ->get('user')->result_array();

    foreach ($user as $u) :
      $data1 = array(
        'text_notification'     => 'User ' . $x['nama_user'] . ' telah dihapus',
        'desc_notification'     => 'User <strong>' . $e['nama_user'] . '</strong> telah menghapus ' . $x['nama_user'],
        'type_notification'     => 7,
        'user_notification'     => $u['id_user']
      );

      $this->NotificationModel->post_notif($data1);
    endforeach;

    //ACTIVITIES
    $data2 = array(
      'text_activities'         => 'User ' . $e['nama_user'] . ' telah menghapus ' . $x['nama_user'],
      'desc_activities'         => '<div class="card card-body mb-3 d-flex justify-content-between flex-row">
                                        <div>
                                          <del>
                                            <i class="fa fa-user-times mr-2"></i>  
                                            ' . $x['nama_user'] . '
                                          </del>
                                        </div>
                                      </div>',
      'type_activities'         => 3,
      'company_activities'      => $x['id_company']
    );

    $this->ActivitiesModel->post_act($data2);
  }
}
