<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

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
			'user'			=>$this->UserModel->get_user(),
			'program'		=> $this->PekerjaanModel->get_program_all($year)
		);
// print_r($year);
		$v['admin_title'] 	= 'Program';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('program/program_list');
		$this->load->view('templates/footer');
	}

	public function edit($id=false)
	{
		$data = array(
			'p'				=> $this->PekerjaanModel->get_program_detail($id)
		);

		$v['admin_title'] 	= $data['p']['nama_program'];
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('program/program_edit');
		$this->load->view('templates/footer');
	}
	public function edit_action()
	{
		
		$this->PekerjaanModel->edit_program($_POST);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Program berhasil diubah.",
				type: "success"
			});
		');

		redirect(base_url('program'));
	}
	public function delete($id)
	{
		$data = array(
			'id_program'		=> $id,
			'status_program'	=> 0
		);

		$this->PekerjaanModel->edit_program($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Program berhasil dihapus.",
				type: "info"
			});
		');

		redirect(base_url('program'));
	}

	public function add_action()
	{
		
		$this->PekerjaanModel->post_act($_POST);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Program berhasil ditambah.",
				type: "success"
			});
		');

		redirect(base_url('program'));
	}


}
