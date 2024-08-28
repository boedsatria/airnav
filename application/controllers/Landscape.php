<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landscape extends CI_Controller
{

	function __construct()
	{
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
		$data = array(
			// 'pekerjaan'			=> $this->PekerjaanModel->get_pekerjaan(),
			// 'sub'				=> $this->PekerjaanModel->get_sub($this->PekerjaanModel->get_pekerjaan_detail($id)),
			// 'ppk'				=> $this->UserModel->get_ppk(),
			// 'pptk'				=> $this->UserModel->get_pptk(),
			// 'vendor'			=> $this->PekerjaanModel->get_vendor(),
		);

		$v['admin_title'] 	= 'LANDSCAPE DASHBOARD';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);

		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('landscape/landscape');
		$this->load->view('templates/footer');
	}

	
}
