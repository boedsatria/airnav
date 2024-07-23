<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Import extends CI_Controller
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
			// 'pk'				=> $this->PekerjaanModel->get_pekerjaan_detail($id),
		);

		$v['admin_title'] 	= 'Import Files';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		// $v['script']		= $this->load->view('script/script_dashboard', $data, TRUE);

		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('import/import_files');
		$this->load->view('templates/footer');
	}


	public function import_action()
	{
		$files = $_FILES['files']['tmp_name'];
		if (file_exists($files)) :
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($files);

			$sheets = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

			$this->upload_kegiatan_files($sheets, $_POST['year']);
		endif;
	}

	public function upload_kegiatan_files($files, $tahun)
	{

		$data = array();
		$i = 1;
		$x = 0;
		foreach ($files as $row) {

			// karena data yang di excel di mulai dari baris ke 2
			// maka jika $i lebih dari 1 data akan di masukan ke database
			if ($i >= 10) {
				$z = 1;
				foreach ($row as $k => $v) :
					$data[$x]['tahun'] = $tahun;
					$data[$x]['`' . $z . '`'] = $v;
					// print_r($v);
					// die;
					$z++;
				endforeach;

				// if ($this->PekerjaanModel->cek_eksis($data[$x]['`7`'])) :
				// 	// print_r('ada');
				// 	$this->PekerjaanModel->update_data($data[$x]);
				// else :
				// print_r('tidak ada');
				$this->PekerjaanModel->post_data($data[$x]);
				// endif;
				$x++;
			}
			$i++;
		}
		// print_r($data);
		// die;
		$this->session->set_flashdata('swal', '
			Swal.fire({
				title: "Berhasil",
				text: "Pekerjaan berhasil diimport sebanyak ' . $x + 1 . ' pekerjaan.",
				type: "success"
			});
		');
		redirect(base_url() . 'import?tahun=' . $tahun, 'refresh');
	}


	public function hasil()
	{
		$data = array(
			'pekerjaan'			=> $this->PekerjaanModel->get_import_data(),
			'ppk'				=> $this->UserModel->get_ppk(),
			'pptk'				=> $this->UserModel->get_pptk(),
			'vendor'			=> $this->PekerjaanModel->get_vendor(),
		);

		$v['admin_title'] 	= 'Data Import';
		$v['preloader'] 	= $this->load->view('templates/preloader', $data, TRUE);
		$v['copyright'] 	= $this->load->view('templates/copyright', $data, TRUE);
		$v['script']		= $this->load->view('script/script_import', $data, TRUE);

		$this->load->view('templates/header', $v);
		$this->load->view('templates/topbar');
		$this->load->view('templates/leftbar');
		$this->load->view('import/import_list');
		$this->load->view('templates/footer');
	}

	public function import_edit_action()
	{
		$data = array(
			'id' => $_POST['id'],
			'`' . $_POST['field'] . '`' => $_POST['val']
		);
		$this->PekerjaanModel->edit_data_import($data);
	}
}
