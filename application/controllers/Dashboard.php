<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
			'user'=>$this->UserModel->get_user(),
			'program'		=> $this->PekerjaanModel->get_program_all($year)
		);

		$v['admin_title'] 	= 'Admin Dashboard';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		$v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('dashboard/dashboard_view');
		$this->load->view('templates/footer');
	}

	public function detail($id=false)
	{
		// print_r($id);
		$data = array(
			'user'=>$this->MainModel->get_user_detail($id)
			
		);

		print_r($data['userx	']);
	}


}
