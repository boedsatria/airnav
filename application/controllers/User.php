<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		check_login();
		// check_admin();
		$this->load->model('MainModel');
		$this->load->model('PekerjaanModel');
		$this->load->model('UserModel');
		// print_r($this->session->userdata('userlogin'));die;
	}


	public function index()
	{
		$year = (isset($_POST['year']) ? $_POST['year'] : date('Y'));
		$data = array(
			'user'			=> $this->UserModel->get_user(),
			'program'		=> $this->PekerjaanModel->get_program_all($year),
			'unit'			=> $this->UserModel->get_unit_kerja(),
			'atasan'		=> $this->UserModel->get_pejabat(),
			'role'			=> $this->UserModel->get_role(),
		);

		$v['admin_title'] 	= 'User List';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('user/user_list');
		$this->load->view('templates/footer');
	}

	public function detail($id=false)
	{
		$data = array(
			'u'				=> $this->UserModel->get_user_detail($id),
			'program'		=> $this->PekerjaanModel->get_program_by_staff($id)
		);

		$v['admin_title'] 	= 'User Detail';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('user/user_detail');
		$this->load->view('templates/footer');
	}

	public function add_action()
	{
		$img = upload_files('users', seo_title($_POST['nama_user']));
		$data = $_POST;
		unset($data['file']);

		$data['password_user'] 			= password_hash($data['password_user'], PASSWORD_DEFAULT);
		
		if(!isset($img['error'])):
			$data['foto_user'] = $img;
		endif;

		$id = $this->UserModel->post_user($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Success",
				text: "Berhasil menambah pegawai.",
				type: "success"
			});
		');

		redirect(base_url().'user/detail/'.$id);

	}

	public function edit($id=false)
	{
		$data = array(
			'user'			=> $this->UserModel->get_user_detail($id),
			'unit'			=> $this->UserModel->get_unit_kerja($id)
		);

		$v['admin_title'] 	= 'User Add';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('user/user_edit');
		$this->load->view('templates/footer');
	}
	


}
