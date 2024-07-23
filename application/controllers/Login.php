<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}


	public function index()
	{
		$data = array();
		$v['topbar'] 			= "";
		$v['preloader'] 		= "";
		// $v['leftbar'] 		= $this->load->view('templates/leftbar', $data, TRUE);
		// $v['rightbar'] 		= $this->load->view('templates/rightbar', $data, TRUE);
		$v['copyright'] 		= "";

		$this->load->view('templates/header', $v);
		$this->load->view('login_view');
		$this->load->view('templates/footer');
	}

	public function login_action()
	{
		$ref = ($this->input->post('ref') != "" ? $this->input->post('ref') : base_url());
		// print_r($ref); die;

		$data = $this->LoginModel->get_login($this->input->post('nik_user'), $this->input->post('password_user'));

		if ($data == 'User Not Found' || $data == 'Wrong Password') :
			$this->session->set_flashdata('error_login', $data);
			redirect(base_url().'login?ref='.str_replace("&", "||", $ref));
		else :
			$newdata = [
				'id_user'           => $data->id_user,
				'nama_user'       	=> $data->nama_user,
				'email_user'      	=> $data->email_user,
				'foto_user'	  		=> $data->foto_user,
				'jabatan_user'	 	=> $data->jabatan_user,
				'role_user'	    	=> $data->role_user,
				'nama_role'	    	=> $data->nama_role,
				'logged_in'         => TRUE
			];
			$this->session->set_userdata('userlogin', $newdata);
			// print_r(((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http").'://'.$ref);die;

			$admin = ($this->session->userlogin['id_role'] <= 2 ? 'dashboard' : '');

			if($ref == base_url()):
				redirect($ref.$admin);
			else:
				redirect(((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http").'://'.$ref);
			endif;
		endif;
	}

	public function remove()
	{
		$this->session->sess_destroy('userdata');
		redirect(base_url('login'));
	}
}
