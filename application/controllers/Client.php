<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	function __construct(){
		parent::__construct();
		// check_login();
		// check_admin();
		$this->load->model('ClientModel');
		// print_r($this->session->userdata('userlogin'));die;
	}


	public function index()
	{
		$data = array(
			'client'		=> $this->ClientModel->get()
			
		);

		$v['admin_title'] 	= 'Client';
		$v['script']		= $this->load->view('script/script_client', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/leftbar');
		$this->load->view('client/client_view');
		$this->load->view('templates/footer');
	}

	public function detail($id=false)
	{
		print_r($id);
	}

}
