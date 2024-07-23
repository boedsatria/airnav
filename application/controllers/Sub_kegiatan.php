<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kegiatan extends CI_Controller {

	function __construct(){
		parent::__construct();
		// check_login();
		// check_admin();
		$this->load->model('MainModel');
		$this->load->model('PekerjaanModel');
		$this->load->model('UserModel');
		// print_r($this->session->userdata('userlogin'));die;
	}


	public function list($id)
	{
		$data = array(
			'sub_kegiatan'			=> $this->PekerjaanModel->get_sub_kegiatan($id)
		);

		$v['admin_title'] 	= $data['sub_kegiatan'][0]['nama_kegiatan'];;
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('sub_kegiatan/sub_kegiatan_list');
		$this->load->view('templates/footer');
	}

	public function edit($id=false)
	{
		$data = array(
			'sk'				=> $this->PekerjaanModel->get_sub_kegiatan_detail($id)
		);

		$v['admin_title'] 	= $data['sk']['nama_kegiatan'];
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('sub_kegiatan/sub_kegiatan_edit');
		$this->load->view('templates/footer');
	}
	public function edit_action()
	{
		
		$this->PekerjaanModel->edit_sub_kegiatan($_POST);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Sub Kegiatan berhasil diubah.",
				type: "success"
			});
		');

		redirect(base_url().'sub_kegiatan/list/'.$_POST['parent_sub_kegiatan']);
	}



	public function delete($id, $parent)
	{
		$data = array(
			'id_sub_kegiatan'		=> $id,
			'status_sub_kegiatan'	=> 0
		);

		$this->PekerjaanModel->edit_sub_kegiatan($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Sub Kegiatan berhasil dihapus.",
				type: "info"
			});
		');

		redirect(base_url().'sub_kegiatan/list/'.$parent);
	}

	public function add_action()
	{
		
		$this->PekerjaanModel->post_sub_kegiatan($_POST);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Sub Kegiatan berhasil ditambah.",
				type: "success"
			});
		');

		redirect(base_url().'sub_kegiatan/list/'.$_POST['parent_sub_kegiatan']);
	}


}
