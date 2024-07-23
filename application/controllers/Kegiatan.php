<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		check_login();
		// check_admin();
		$this->load->model('MainModel');
		$this->load->model('PekerjaanModel');
		$this->load->model('UserModel');
		// print_r($this->session->userdata('userlogin'));die;
	}


	public function list($id)
	{
		$data = array(
			'kegiatan'			=> $this->PekerjaanModel->get_kegiatan($id)
		);

		$v['admin_title'] 	= $data['kegiatan'][0]['nama_program'];;
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('kegiatan/kegiatan_list');
		$this->load->view('templates/footer');
	}

	public function edit($id=false, $year = false)
	{
		
		$year = ($year ? $year : date('Y'));
		$data = array(
			'k'				=> $this->PekerjaanModel->get_kegiatan_detail($id),
			'program'		=> $this->PekerjaanModel->get_program_all($year)
		);

		$v['admin_title'] 	= $data['k']['nama_kegiatan'];
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('kegiatan/kegiatan_edit');
		$this->load->view('templates/footer');
	}
	public function edit_action()
	{
		// print_r($_POST);die;
		$this->PekerjaanModel->edit_kegiatan($_POST);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Kegiatan berhasil diubah.",
				type: "success"
			});
		');

		redirect(base_url().'kegiatan/list/'.$_POST['parent_kegiatan']);
	}


	public function delete($id, $parent)
	{
		$data = array(
			'id_kegiatan'		=> $id,
			'status_kegiatan'	=> 0
		);

		$this->PekerjaanModel->edit_kegiatan($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Kegiatan berhasil dihapus.",
				type: "info"
			});
		');

		redirect(base_url().'kegiatan/list/'.$parent);
	}

	public function add_action()
	{
		
		$this->PekerjaanModel->post_kegiatan($_POST);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Kegiatan berhasil ditambah.",
				type: "success"
			});
		');

		redirect(base_url().'kegiatan/list/'.$_POST['parent_kegiatan']);
	}


}
