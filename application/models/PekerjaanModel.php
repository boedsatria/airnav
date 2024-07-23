<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PekerjaanModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
  }




  function cek_eksis($kode)
  {
    $data = $this->db
      ->where('`7`', $kode)
      ->or_where('`7` !=', '')
      ->get('data')->num_rows();
    return $data;
  }


  function post_data($data)
  {
    $this->db->insert('data', $data);
  }

  function update_data($data)
  {
    $this->db->where('`7`', $data['`7`']);
    $this->db->update('data', $data);
  }













  function get_program_all($year)
  {
    $data = $this->db
      ->where('tahun_program', $year)
      ->where('status_program', 1)
      ->get('program')->result_array();
    return $data;
  }

  function get_program_detail($id)
  {
    $data = $this->db
      ->where('id_program', $id)
      ->get('program')->row_array();
    return $data;
  }

  function get_kegiatan($id)
  {
    $data = $this->db
      ->join('program', 'id_program = parent_kegiatan')
      ->where('parent_kegiatan', $id)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->get('kegiatan')->result_array();
    return $data;
  }

  function get_kegiatan_detail($id)
  {
    $data = $this->db
      ->join('program', 'id_program = parent_kegiatan')
      ->where('id_kegiatan', $id)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->get('kegiatan')->row_array();
    return $data;
  }

  function get_sub_kegiatan($id)
  {
    $data = $this->db
      ->select('*, (select SUM(pagu_pekerjaan) from pekerjaan a where a.parent_pekerjaan = id_sub_kegiatan) as total_pagu_pekerjaan, (select SUM(progres_fisik_pekerjaan)/COUNT(progres_fisik_pekerjaan) from pekerjaan b where b.parent_pekerjaan = id_sub_kegiatan) as persen_fisik')
      ->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan', 'LEFT')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('parent_sub_kegiatan', $id)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->group_by('id_sub_kegiatan', $id)
      ->get('sub_kegiatan')->result_array();
    return $data;
  }

  function get_sub_kegiatan_detail($id)
  {
    $data = $this->db
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('id_sub_kegiatan', $id)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->get('sub_kegiatan')->row_array();
    return $data;
  }

  function get_pekerjaan($id)
  {
    $data = $this->db
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('parent_pekerjaan', $id)
      // ->where('sub_pekerjaan', 0)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->get('pekerjaan')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }

  function get_my_pekerjaan($id)
  {
    $data = $this->db
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      // ->where('parent_pekerjaan', $id)
      ->where('pptk_pekerjaan', $id)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->get('pekerjaan')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }

  function get_sub($parent)
  {
    $tahun = $parent['tahun_program'];

    $data = $this->db
      ->join('pekerjaan', 'id_pekerjaan = parent_sub_pekerjaan')
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('tahun_program', $tahun)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->get('sub_pekerjaan')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }
  function get_sub_pekerjaan($id)
  {
    $data = $this->db
      ->join('pekerjaan', 'id_pekerjaan = parent_sub_pekerjaan')
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('parent_sub_pekerjaan', $id)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->get('sub_pekerjaan')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }

  function get_pekerjaan_detail($id)
  {
    $data = $this->db
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      // ->join('kecamatan', 'id_kecamatan = kecamatan_pekerjaan')
      ->where('id_pekerjaan', $id)
      ->get('pekerjaan')->row_array();
    return $data;
  }
  function get_sub_pekerjaan_detail($id)
  {
    $data = $this->db
      ->join('pekerjaan', 'id_pekerjaan = parent_sub_pekerjaan')
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      // ->join('kecamatan', 'id_kecamatan = kecamatan_pekerjaan')
      ->where('id_sub_pekerjaan', $id)
      ->get('sub_pekerjaan')->row_array();
    return $data;
  }



  function get_program_by_staff($id)
  {
    $role = $this->UserModel->get_user_detail($id);

    if ($role['role_user'] == 6) :
      $pptk = $this->UserModel->get_nama_atasan($id);
    else :
      $pptk = $role['nama_user'];
    endif;

    $this->db
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->where('pptk_pekerjaan', $pptk);

    // ->or_where('pptk_pekerjaan != ', '')
    $data = $this->db->get('pekerjaan')->result_array();

    return $data;
  }


  function edit_program($data)
  {
    $this->db->where('id_program', $data['id_program']);
    $this->db->update('program', $data);
  }
  function update_tim($data, $id)
  {
    $this->db->set('tim_pekerjaan', $data);
    $this->db->where('id_pekerjaan', $id);
    $this->db->update('pekerjaan');
  }

  function edit_kegiatan($data)
  {
    $this->db->where('id_kegiatan', $data['id_kegiatan']);
    $this->db->update('kegiatan', $data);
  }

  function edit_sub_kegiatan($data)
  {
    $this->db->where('id_sub_kegiatan', $data['id_sub_kegiatan']);
    $this->db->update('sub_kegiatan', $data);
  }

  function edit_pekerjaan($data)
  {
    $this->db->where('id_pekerjaan', $data['id_pekerjaan']);
    $this->db->update('pekerjaan', $data);

    // $this->update_pagu_pekerjaan($data);
  }

  function update_pagu_pekerjaan($id)
  {
    $data = $this->db
      ->select('SUM(nilai_kontrak_pekerjaan) as total_pagu_sub_kegiatan, SUM(progres_nilai_keuangan_pekerjaan) as progres_nilai_keuangan_sub_kegiatan, (SUM(progres_nilai_keuangan_pekerjaan)/pagu_sub_kegiatan*100) as progres_persen_keuangan_sub_kegiatan, SUM(progres_fisik_pekerjaan)/COUNT(progres_fisik_pekerjaan) as progres_fisik_sub_kegiatan')
      ->join('sub_kegiatan', 'parent_pekerjaan = id_sub_kegiatan')
      // ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      // ->join('program', 'id_program = parent_kegiatan')
      ->where('parent_pekerjaan', $id['parent_pekerjaan'])
      // ->group_by('parent_pekerjaan', $data['parent_pekerjaan'])
      ->get('pekerjaan')->row_array();

    $array = array(
      'total_pagu_sub_kegiatan'               => $data['total_pagu_sub_kegiatan'],
      'progres_nilai_keuangan_sub_kegiatan'   => $data['progres_nilai_keuangan_sub_kegiatan'],
      'progres_persen_keuangan_sub_kegiatan'  => $data['progres_persen_keuangan_sub_kegiatan'],
      'progres_fisik_sub_kegiatan'            => $data['progres_fisik_sub_kegiatan']

    );

    $this->db->where('id_sub_kegiatan', $id['parent_pekerjaan']);
    $this->db->update('sub_kegiatan', $array);
  }

  function get_kecamatan()
  {
    $this->db->from('kecamatan');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }
  function get_jk()
  {
    $this->db->from('jenis_konstruksi');
    $result = $this->db->get();
    $result = $result->result_array();
    return $result;
  }

  function get_user_all()
  {
    $this->db->from('user');
    //    $this->db->where('id_user', $id);
    $result = $this->db->get();
    $result = $result->result();

    return $result;
  }
  function get_vendor()
  {
    $this->db->from('perusahaan');
    $result = $this->db->get();
    $result = $result->result_array();
    return $result;
  }



  function get_rekap($year, $ppk = false)
  {
    $data = $this->db
      ->select(
        'bidang_pekerjaan, 
        (select sum(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and a.bidang_pekerjaan = b.bidang_pekerjaan) as pagu_pl, 
      
        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and a.bidang_pekerjaan = b.bidang_pekerjaan) as jml_pl, 

        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and b.progres_fisik_pekerjaan = 100.00 and a.bidang_pekerjaan = b.bidang_pekerjaan) as selesai_pl, 

        (select count(b.no_spk_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and b.no_spk_pekerjaan != "" and a.bidang_pekerjaan = b.bidang_pekerjaan) as spk_pl, 
        
        (select sum(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and a.bidang_pekerjaan = b.bidang_pekerjaan) as pagu_lelang, 
        
        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and a.bidang_pekerjaan = b.bidang_pekerjaan) as jml_lelang,

        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and b.progres_fisik_pekerjaan = 100.00 and a.bidang_pekerjaan = b.bidang_pekerjaan) as selesai_lelang,

        (select count(b.no_spk_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and b.no_spk_pekerjaan != "" and a.bidang_pekerjaan = b.bidang_pekerjaan) as spk_lelang'

      )
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('tahun_program', $year)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->group_by('bidang_pekerjaan')
      ->get('pekerjaan a')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }

  function get_rekap_pokir($year, $ppk = false)
  {
    $data = $this->db
      ->select(
        'bidang_pekerjaan, 
        (select sum(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as pagu_pl, 
      
        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as jml_pl, 

        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and b.progres_fisik_pekerjaan = 100.00 and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as selesai_pl, 

        (select count(b.no_spk_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and b.no_spk_pekerjaan != "" and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as spk_pl, 
        
        (select sum(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as pagu_lelang, 
        
        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as jml_lelang,

        (select count(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and b.progres_fisik_pekerjaan = 100.00 and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as selesai_lelang,

        (select count(b.no_spk_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="LELANG" and b.no_spk_pekerjaan != "" and a.bidang_pekerjaan = b.bidang_pekerjaan and b.keterangan_pekerjaan in ("POKIR")) as spk_lelang'

      )
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->where('tahun_program', $year)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->where('keterangan_pekerjaan', 'POKIR')
      ->group_by('bidang_pekerjaan')
      ->get('pekerjaan a')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }
  function get_rekap_pptk($year, $pptk = false)
  {
    $data = $this->db
      ->select(
        'pptk_pekerjaan, bidang_pekerjaan, jabatan_user, 

        (select sum(b.pagu_pekerjaan) from pekerjaan b where b.jenis_pekerjaan="PL" and a.pptk_pekerjaan = b.pptk_pekerjaan) as pagu_pl, 
      
        (select count(b.pagu_pekerjaan) from pekerjaan b where a.pptk_pekerjaan = b.pptk_pekerjaan) as jml_paket, 

        (select count(b.pagu_pekerjaan) from pekerjaan b where b.keterangan_pekerjaan="POKIR" and b.progres_fisik_pekerjaan = 100.00 and a.pptk_pekerjaan = b.pptk_pekerjaan) as selesai_fisik, 

        (select count(b.pho_core_pekerjaan) from pekerjaan b where b.pho_core_pekerjaan = 1 and a.pptk_pekerjaan = b.pptk_pekerjaan) as jml_pho,
        
        (select count(b.ba_pptk_pekerjaan) from pekerjaan b where b.ba_pptk_pekerjaan = 1 and a.pptk_pekerjaan = b.pptk_pekerjaan) as jml_ba,
        
        (select count(b.spm_pekerjaan) from pekerjaan b where b.spm_pekerjaan = 1 and a.pptk_pekerjaan = b.pptk_pekerjaan) as jml_spm,
        
        (select count(b.sp2d_pekerjaan) from pekerjaan b where b.sp2d_pekerjaan = 1 and a.pptk_pekerjaan = b.pptk_pekerjaan) as jml_sp2d'

      )
      ->join('sub_kegiatan', 'id_sub_kegiatan = parent_pekerjaan')
      ->join('kegiatan', 'id_kegiatan = parent_sub_kegiatan')
      ->join('program', 'id_program = parent_kegiatan')
      ->join('user', 'pptk_pekerjaan = nama_user', 'LEFT')
      ->where('tahun_program', $year)
      ->where('status_program', 1)
      ->where('status_kegiatan', 1)
      ->where('status_sub_kegiatan', 1)
      ->where('status_pekerjaan', 1)
      ->where('pptk_pekerjaan', $pptk)
      // ->where('keterangan_pekerjaan', 'POKIR')
      ->group_by('pptk_pekerjaan')
      ->get('pekerjaan a')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }




  function post_pekerjaan($data)
  {
    $this->db->insert('pekerjaan', $data);
    return $this->db->insert_id();
  }
  function update_pekerjaan($data)
  {
    $this->db->where('id_pekerjaan', $data['id_pekerjaan']);
    $this->db->update('pekerjaan', $data);
  }
  function post_sub_pekerjaan($data)
  {
    $this->db->insert('sub_pekerjaan', $data);
    return $this->db->insert_id();
  }
  function update_sub_pekerjaan($data)
  {
    $this->db->where('id_sub_pekerjaan', $data['id_sub_pekerjaan']);
    $this->db->update('sub_pekerjaan', $data);
  }

  function post_act($data)
  {
    $this->db->insert('program', $data);
  }
  function post_kegiatan($data)
  {
    $this->db->insert('kegiatan', $data);
  }
  function post_sub_kegiatan($data)
  {
    $this->db->insert('sub_kegiatan', $data);
  }



  function get_import_data()
  {
    $data = $this->db
      ->get('data')->result_array();
    // print_r($this->db->last_query());die;
    return $data;
  }
  function edit_data_import($data)
  {
    $this->db->where('id', $data['id']);
    $this->db->update('data', $data);
  }
}
