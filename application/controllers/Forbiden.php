<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forbiden extends CI_Controller {

	function __construct(){
		parent::__construct();
		// print_r($this->session->userdata('userlogin'));die;
	}


	public function index()
	{
		$v['topbar'] 			= "";
		// $v['leftbar'] 		= $this->load->view('templates/leftbar', $data, TRUE);
		// $v['rightbar'] 		= $this->load->view('templates/rightbar', $data, TRUE);
		// $v['copyright'] 		= "";
		// $v['room']			= $this->MainModel->get_room();
		// $v['m']				= $this->MainModel->get_menu_detail();

		$this->load->view('templates/header', $v);
		$this->load->view('forbiden');
	}
}
