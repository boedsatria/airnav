<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

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
			'pekerjaan'			=> $this->PekerjaanModel->get_rekap($year),
		);

		// print_r($data['pekerjaan']);die;

		$v['admin_title'] 	= 'REKAPITULASI KEGIATAN';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('rekap/rekap_all');
		$this->load->view('templates/footer');
	}

	public function pokir()
	{
		$year = (isset($_POST['year']) ? $_POST['year'] : date('Y'));
		$data = array(
			'pekerjaan'			=> $this->PekerjaanModel->get_rekap_pokir($year),
			'ppk'				=> $this->UserModel->get_ppk(),
			'pptk'				=> $this->UserModel->get_pptk(),
			'vendor'			=> $this->PekerjaanModel->get_vendor(),
		);

		// print_r($data['pekerjaan']);die;

		$v['admin_title'] 	= 'REKAPITULASI KEGIATAN';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('rekap/rekap_pokir');
		$this->load->view('templates/footer');
	}

	public function pptk()
	{
		$year = (isset($_POST['year']) ? $_POST['year'] : date('Y'));
		$pptk = (isset($_POST['pptk']) ? $_POST['pptk'] : "");
		$data = array(
			'pekerjaan'			=> $this->PekerjaanModel->get_rekap_pptk($year, $pptk),
			'ppk'				=> $this->UserModel->get_ppk(),
			'pptk'				=> $this->UserModel->get_pptk(),
			'vendor'			=> $this->PekerjaanModel->get_vendor(),
		);

		// print_r($data['pekerjaan']);die;

		$v['admin_title'] 	= 'REKAPITULASI KEGIATAN';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('rekap/rekap_pptk');
		$this->load->view('templates/footer');
	}

	public function user($id)
	{
		$nama = get_nama_user($id);
		$data = array(
			'pekerjaan'			=> $this->PekerjaanModel->get_my_pekerjaan($nama),
		);
		
		$v['admin_title'] 	= 'Pekerjaan';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('pekerjaan/pekerjaan_my_list');
		$this->load->view('templates/footer');
	}

	public function detail($id=false)
	{

		$data = array(
			'pk'				=> $this->PekerjaanModel->get_pekerjaan_detail($id),
			'pekerjaan'			=> $this->PekerjaanModel->get_sub_pekerjaan($id),
			'ppk'				=> $this->UserModel->get_ppk(),
			'pptk'				=> $this->UserModel->get_pptk(),
			'vendor'			=> $this->PekerjaanModel->get_vendor(),
			'jenis_konstruksi'	=> $this->PekerjaanModel->get_jk(),

		);

		// //SET TIM//
		// $ppk = $this->PekerjaanModel->get_pekerjaan_detail($id)['ppk_pekerjaan'];
		// $id_ppk = $this->UserModel->get_id_by_name($ppk);

		// $pptk = $this->PekerjaanModel->get_pekerjaan_detail($id)['pptk_pekerjaan'];
		// $id_pptk = $this->UserModel->get_id_by_name($pptk);

		// $array_user = array();
		// $get_pptk = $this->UserModel->get_staff_by_atasan($id_pptk);

		// if($get_pptk != ""):
		// 	foreach($get_pptk as $as):
		// 		array_push($array_user,$as['id_user']);
		// 	endforeach;
		// endif;

		// if($id_ppk != ""):
		// 	array_push($array_user,$id_ppk);
		// endif;

		// if($id_pptk != ""):
		// 	array_push($array_user,$id_pptk);
		// endif;

		// $exist = $this->PekerjaanModel->get_pekerjaan_detail($id)['tim_pekerjaan'];
		// // if($exist != ""):
		// 	$exist = explode(',', $exist);
		// 	$exist = array_filter($exist);
		// // endif;

		// $tim = json_encode($array_user, JSON_NUMERIC_CHECK);
		// $tim = trim($tim, '[]');
		// // if($tim != ""):
		// 	$tim = explode(',', $tim);
		// // endif;

		// $array_all = array_merge($exist, $tim);
		// $array_unique = array_unique($array_all);

		// if($array_unique === array_intersect($array_unique, $exist) && $exist === array_intersect($exist, $array_unique)) {
		// 	// echo 'Equal';

		// } else {
		// 	// echo 'Not equal';
		// 	$ut = json_encode($array_unique, JSON_NUMERIC_CHECK);
		// 	$ut = trim($ut, '""');
		// 	$ut = trim($ut, '[]');
		// 	$ut = str_replace('"",','',$ut);
		// 	// print_r($ut);die;
		// 	$this->PekerjaanModel->update_tim($ut, $id);
		// }
		// //END SET TIM//


		$enc_id = $id;

		//Create QR CODE//
		$params['data'] = base_url().'pekerjaan/detail/'.$enc_id;
		$params['level'] = 'L';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'uploads/qr/'.$enc_id.'.png';
		$this->ciqrcode->generate($params);

		$v['admin_title'] 	= $data['pk']['nama_pekerjaan'];
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		$v['script']		= $this->load->view('script/script_pekerjaan', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('pekerjaan/pekerjaan_detail');
		$this->load->view('templates/footer');
	}
	public function edit($id=false)
	{
		$data = array(
			'pk'				=> $this->PekerjaanModel->get_pekerjaan_detail($id),
			'sub'				=> $this->PekerjaanModel->get_sub($this->PekerjaanModel->get_pekerjaan_detail($id)),
			'ppk'				=> $this->UserModel->get_ppk(),
			'pptk'				=> $this->UserModel->get_pptk(),
			'vendor'			=> $this->PekerjaanModel->get_vendor(),
			'jenis_konstruksi'	=> $this->PekerjaanModel->get_jk(),
		);

		$v['admin_title'] 	= $data['pk']['nama_pekerjaan'];
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('pekerjaan/pekerjaan_edit');
		$this->load->view('templates/footer');
	}
	public function edit_action()
	{
		$data = $_POST;

		$data['pagu_pekerjaan'] 					= str_replace('.', '', $_POST['pagu_pekerjaan']);
		$data['nilai_kontrak_pekerjaan'] 			= str_replace('.', '', $_POST['nilai_kontrak_pekerjaan']);
		$data['tkdn_jumlah_pekerjaan'] 				= str_replace('.', '', $_POST['tkdn_jumlah_pekerjaan']);
		$data['tkln_jumlah_pekerjaan'] 				= str_replace('.', '', $_POST['tkln_jumlah_pekerjaan']);
		$data['progres_nilai_keuangan_pekerjaan'] 	= str_replace('.', '', $_POST['progres_nilai_keuangan_pekerjaan']);
		$data['progres_persen_keuangan_pekerjaan'] 	= $data['progres_nilai_keuangan_pekerjaan']/$data['nilai_kontrak_pekerjaan']*100;
		
		$data['pho_core_pekerjaan'] 				= (isset($data['pho_core_pekerjaan']) ? $data['pho_core_pekerjaan'] : 0);
		$data['ba_pptk_pekerjaan'] 					= (isset($data['ba_pptk_pekerjaan']) ? $data['ba_pptk_pekerjaan'] : 0);
		$data['spm_pekerjaan'] 						= (isset($data['spm_pekerjaan']) ? $data['spm_pekerjaan'] : 0);
		$data['sp2d_pekerjaan'] 					= (isset($data['sp2d_pekerjaan']) ? $data['sp2d_pekerjaan'] : 0);
	
		$this->PekerjaanModel->edit_pekerjaan($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Pekerjaan berhasil diubah.",
				type: "success"
			});
		');

		redirect(base_url().'pekerjaan/detail/'.$data['id_pekerjaan']);
	}



	public function delete($id, $parent)
	{
		$data = array(
			'id_pekerjaan'		=> $id,
			'status_pekerjaan'	=> 0
		);

		$this->PekerjaanModel->edit_pekerjaan($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Pekerjaan berhasil dihapus.",
				type: "info"
			});
		');

		redirect(base_url().'pekerjaan/list/'.$parent);
	}

	
	public function add_action()
	{
		$data = $_POST;

		$data['pagu_pekerjaan'] 					= str_replace('.', '', $_POST['pagu_pekerjaan']);
		$data['nilai_kontrak_pekerjaan'] 			= str_replace('.', '', $_POST['nilai_kontrak_pekerjaan']);
		$data['tkdn_jumlah_pekerjaan'] 				= str_replace('.', '', $_POST['tkdn_jumlah_pekerjaan']);
		$data['tkln_jumlah_pekerjaan'] 				= str_replace('.', '', $_POST['tkln_jumlah_pekerjaan']);
		$data['progres_nilai_keuangan_pekerjaan'] 	= str_replace('.', '', $_POST['progres_nilai_keuangan_pekerjaan']);
		$data['progres_persen_keuangan_pekerjaan'] 	= $data['progres_nilai_keuangan_pekerjaan']/$data['nilai_kontrak_pekerjaan']*100;

		$data['pho_core_pekerjaan'] 				= (isset($data['pho_core_pekerjaan']) ? $data['pho_core_pekerjaan'] : 0);
		$data['ba_pptk_pekerjaan'] 					= (isset($data['ba_pptk_pekerjaan']) ? $data['ba_pptk_pekerjaan'] : 0);
		$data['spm_pekerjaan'] 						= (isset($data['spm_pekerjaan']) ? $data['spm_pekerjaan'] : 0);
		$data['sp2d_pekerjaan'] 					= (isset($data['sp2d_pekerjaan']) ? $data['sp2d_pekerjaan'] : 0);
	

		$this->PekerjaanModel->post_pekerjaan($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Pekerjaan berhasil ditambah.",
				type: "success"
			});
		');

		redirect(base_url().'pekerjaan/list/'.$_POST['parent_pekerjaan']);
	}


	public function add_sub_action()
	{
		$data = $_POST;

		$data['pagu_sub_pekerjaan'] 					= str_replace('.', '', $_POST['pagu_sub_pekerjaan']);
		$data['nilai_kontrak_sub_pekerjaan'] 			= str_replace('.', '', $_POST['nilai_kontrak_sub_pekerjaan']);
		$data['tkdn_jumlah_sub_pekerjaan'] 				= str_replace('.', '', $_POST['tkdn_jumlah_sub_pekerjaan']);
		$data['tkln_jumlah_sub_pekerjaan'] 				= str_replace('.', '', $_POST['tkln_jumlah_sub_pekerjaan']);
		$data['progres_nilai_keuangan_sub_pekerjaan'] 	= str_replace('.', '', $_POST['progres_nilai_keuangan_sub_pekerjaan']);
		$data['progres_persen_keuangan_sub_pekerjaan'] 	= $data['progres_nilai_keuangan_sub_pekerjaan']/$data['nilai_kontrak_sub_pekerjaan']*100;

		$data['pho_core_sub_pekerjaan'] 				= (isset($data['pho_core_sub_pekerjaan']) ? $data['pho_core_sub_pekerjaan'] : 0);
		$data['ba_pptk_sub_pekerjaan'] 					= (isset($data['ba_pptk_sub_pekerjaan']) ? $data['ba_pptk_sub_pekerjaan'] : 0);
		$data['spm_sub_pekerjaan'] 						= (isset($data['spm_sub_pekerjaan']) ? $data['spm_sub_pekerjaan'] : 0);
		$data['sp2d_sub_pekerjaan'] 					= (isset($data['sp2d_sub_pekerjaan']) ? $data['sp2d_sub_pekerjaan'] : 0);
	

		$id = $this->PekerjaanModel->post_sub_pekerjaan($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Sub Paket berhasil ditambah.",
				type: "success"
			});
		');

		redirect(base_url().'pekerjaan/detail_sub/'.$id);
	}


	public function detail_sub($id=false)
	{

		$data = array(
			'pk'				=> $this->PekerjaanModel->get_sub_pekerjaan_detail($id),

		);

		// print_r($data['pk']);die;

		$enc_id = $id;

		//Create QR CODE//
		$params['data'] = base_url().'pekerjaan/detail_sub/'.$enc_id;
		$params['level'] = 'L';
		$params['size'] = 10;
		$params['savename'] = FCPATH.'uploads/qr/sub_'.$enc_id.'.png';
		$this->ciqrcode->generate($params);

		$v['admin_title'] 	= $data['pk']['nama_sub_pekerjaan'];
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		$v['script']		= $this->load->view('script/script_pekerjaan', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('pekerjaan/sub_pekerjaan_detail');
		$this->load->view('templates/footer');
	}

	public function edit_sub($id=false)
	{
		$data = array(
			'pk'				=> $this->PekerjaanModel->get_sub_pekerjaan_detail($id),
			'ppk'				=> $this->UserModel->get_ppk(),
			'pptk'				=> $this->UserModel->get_pptk(),
			'vendor'			=> $this->PekerjaanModel->get_vendor(),
			'jenis_konstruksi'	=> $this->PekerjaanModel->get_jk(),
		);

		$v['admin_title'] 	= $data['pk']['nama_sub_pekerjaan'];
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);
		
		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('pekerjaan/sub_pekerjaan_edit');
		$this->load->view('templates/footer');
	}

	public function edit_sub_action()
	{
		$data = $_POST;

		$data['pagu_sub_pekerjaan'] 					= str_replace('.', '', $_POST['pagu_sub_pekerjaan']);
		$data['nilai_kontrak_sub_pekerjaan'] 			= str_replace('.', '', $_POST['nilai_kontrak_sub_pekerjaan']);
		$data['tkdn_jumlah_sub_pekerjaan'] 				= str_replace('.', '', $_POST['tkdn_jumlah_sub_pekerjaan']);
		$data['tkln_jumlah_sub_pekerjaan'] 				= str_replace('.', '', $_POST['tkln_jumlah_sub_pekerjaan']);
		$data['progres_nilai_keuangan_sub_pekerjaan'] 	= str_replace('.', '', $_POST['progres_nilai_keuangan_sub_pekerjaan']);
		$data['progres_persen_keuangan_sub_pekerjaan'] 	= $data['progres_nilai_keuangan_sub_pekerjaan']/$data['nilai_kontrak_sub_pekerjaan']*100;
		
		$data['pho_core_sub_pekerjaan'] 				= (isset($data['pho_core_sub_pekerjaan']) ? $data['pho_core_sub_pekerjaan'] : 0);
		$data['ba_pptk_sub_pekerjaan'] 					= (isset($data['ba_pptk_sub_pekerjaan']) ? $data['ba_pptk_sub_pekerjaan'] : 0);
		$data['spm_sub_pekerjaan'] 						= (isset($data['spm_sub_pekerjaan']) ? $data['spm_sub_pekerjaan'] : 0);
		$data['sp2d_sub_pekerjaan'] 					= (isset($data['sp2d_sub_pekerjaan']) ? $data['sp2d_sub_pekerjaan'] : 0);
	
		$this->PekerjaanModel->update_sub_pekerjaan($data);

		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Sub Paket berhasil diubah.",
				type: "success"
			});
		');

		redirect(base_url().'pekerjaan/detail_sub/'.$data['id_sub_pekerjaan']);
	}


}
