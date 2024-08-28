<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parking extends CI_Controller {

	function __construct(){
		parent::__construct();
		// check_login();
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
			'user'			=> array(),
			'program'		=> array()
		);

		$v['admin_title'] 	= 'PARKING DASHBOARD';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		$v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('parking/parking');
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
