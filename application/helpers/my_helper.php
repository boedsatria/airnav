<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function nama_bidang($kode)
    {
        $ci = &get_instance();
        $ci->db->select('nama_unitpengelola');
        $ci->db->from("unit_pengelola");
        $ci->db->where("kode_unitpengelola", $kode);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['nama_unitpengelola'] : 0);
    }
    function get_anggaran($year)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(nilai_kontrak_pekerjaan) as tnk');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("tahun_program", $year);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }

    function get_program($year)
    {
        $ci = &get_instance();
        $ci->db->select('count(id_program) as tnk');
        $ci->db->from("program");
        // $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        // $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        // $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("tahun_program", $year);
        $ci->db->where('status_program', 1);
        // $ci->db->where('status_kegiatan', 1);
        // $ci->db->where('status_sub_kegiatan', 1);
        // $ci->db->where('status_pekerjaan', 1);
        // $ci->db->group_by('id_program');
        $data = $ci->db->get();
        // print_r($ci->db->last_query());die;
        $data = $data->row_array();

        return ($data ? $data['tnk'] : 0);
    }

    function get_kegiatan($year)
    {
        $ci = &get_instance();
        $ci->db->select('count(id_kegiatan) as tnk');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->where("tahun_program", $year);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        // $ci->db->group_by('id_kegiatan');
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }

    function get_sub_kegiatan($year)
    {
        $ci = &get_instance();
        $ci->db->select('count(id_sub_kegiatan) as tnk');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->where("tahun_program", $year);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }
    function get_pekerjaan($year)
    {
        $ci = &get_instance();
        $ci->db->select('count(id_pekerjaan) as tnk');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("tahun_program", $year);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }

    function get_selesai($year)
    {
        $ci = &get_instance();
        $ci->db->select('count(id_pekerjaan) as tnk');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("tahun_program", $year);
        $ci->db->where("progres_fisik_pekerjaan", 100);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }

    function total_nilai_kontrak_program($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(nilai_kontrak_pekerjaan) as tnk');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_program", $id);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }
    function progres_nilai_keuangan_program($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_nilai_keuangan_pekerjaan) as pnkp');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_program", $id);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['pnkp'] : 0);
    }
    function progres_persen_keuangan_program($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_nilai_keuangan_pekerjaan)/SUM(nilai_kontrak_pekerjaan)*100 as ppkp');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_program", $id);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['ppkp'] : 0);
    }
    function progres_fisik_program($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_fisik_pekerjaan)/COUNT(progres_fisik_pekerjaan) as pfp');
        $ci->db->from("program");
        $ci->db->join('kegiatan', 'parent_kegiatan = id_program');
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_program", $id);
        $ci->db->where('status_program', 1);
        $ci->db->where('status_kegiatan', 1);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['pfp'] : 0);
    }



    function total_nilai_kontrak_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(nilai_kontrak_pekerjaan) as tnk');
        $ci->db->from("kegiatan");
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_kegiatan", $id);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }
    function progres_nilai_keuangan_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_nilai_keuangan_pekerjaan) as pnkp');
        $ci->db->from("kegiatan");
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_kegiatan", $id);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['pnkp'] : 0);
    }
    function progres_persen_keuangan_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_nilai_keuangan_pekerjaan)/SUM(nilai_kontrak_pekerjaan)*100 as ppkp');
        $ci->db->from("kegiatan");
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_kegiatan", $id);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['ppkp'] : 0);
    }
    function progres_fisik_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_fisik_pekerjaan)/COUNT(progres_fisik_pekerjaan) as pfp');
        $ci->db->from("kegiatan");
        $ci->db->join('sub_kegiatan', 'parent_sub_kegiatan = id_kegiatan');
        $ci->db->join('pekerjaan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("id_kegiatan", $id);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['pfp'] : 0);
    }


    function total_nilai_kontrak_sub_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(nilai_kontrak_pekerjaan) as tnk');
        $ci->db->from("pekerjaan");
        $ci->db->join('sub_kegiatan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("parent_pekerjaan", $id);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['tnk'] : 0);
    }
    function progres_nilai_keuangan_sub_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_nilai_keuangan_pekerjaan) as pnkp');
        $ci->db->from("pekerjaan");
        $ci->db->join('sub_kegiatan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("parent_pekerjaan", $id);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['pnkp'] : 0);
    }
    function progres_persen_keuangan_sub_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_nilai_keuangan_pekerjaan)/SUM(nilai_kontrak_pekerjaan)*100 as ppkp');
        $ci->db->from("pekerjaan");
        $ci->db->join('sub_kegiatan', 'parent_pekerjaan = id_sub_kegiatan');
        $ci->db->where("parent_pekerjaan", $id);
        $ci->db->where('status_sub_kegiatan', 1);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['ppkp'] : 0);
    }
    function progres_fisik_sub_kegiatan($id)
    {
        $ci = &get_instance();
        $ci->db->select('SUM(progres_fisik_pekerjaan)/COUNT(progres_fisik_pekerjaan) as pfp');
        $ci->db->from("pekerjaan");
        $ci->db->where("parent_pekerjaan", $id);
        $ci->db->where('status_pekerjaan', 1);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['pfp'] : 0);
    }

    function pmeter($data)
    {
        if($data < 50):
            $color = 'bg-danger';
        elseif($data < 75):
            $color = 'bg-warning';
        elseif($data < 99):
            $color = 'bg-success';
        else:
            $color = 'bg-blue';
        endif;

        $pro   =   floatval(number_format($data,2)).'%';
        $pro .=    '<div class="progress ">
                        <div class="progress-bar '.$color.'" style="width: '.$data.'%; height:6px;" role="progressbar">
                            <span class="sr-only">'.$data.'% Complete</span>
                        </div>
                    </div>';
        return $pro;
    }

    function get_maps_detail()
    {
        // [107.0029054590415, -6.233016158286867, 'Penurapan Kali Sisi Selatan Jalan Pangeran Jayakarta', 'Harapan Mulya', 'Rp200.000.000', '<?= base_url() . "kegiatan/detail/1" 
        
        $ci = &get_instance();
        $ci->db->select("lon_pekerjaan, lat_pekerjaan, nama_pekerjaan, kecamatan_pekerjaan, nilai_kontrak_pekerjaan, CONCAT('".base_url()."pekerjaan/detail/', id_pekerjaan) as link");
        $ci->db->from("pekerjaan");
        $ci->db->where("lon_pekerjaan !=", '');
        $ci->db->where("lat_pekerjaan !=", '');
        $data = $ci->db->get();
        $data = $data->result_array();

        $array = array();
        $x = 0;

        foreach ($data as $kk => $vv):
            $array[$kk] = array_values($vv);
        endforeach;

        return ($array ? $array : '');
    }

    function get_maps_pekerjaan($id)
    {
        // [107.0029054590415, -6.233016158286867, 'Penurapan Kali Sisi Selatan Jalan Pangeran Jayakarta', 'Harapan Mulya', 'Rp200.000.000', '<?= base_url() . "kegiatan/detail/1" 
        
        $ci = &get_instance();
        $ci->db->select("lon_pekerjaan, lat_pekerjaan, nama_pekerjaan, kecamatan_pekerjaan, nilai_kontrak_pekerjaan, CONCAT('".base_url()."pekerjaan/detail/', id_pekerjaan) as link");
        $ci->db->from("pekerjaan");
        // $ci->db->where("lon_pekerjaan !=", '');
        // $ci->db->where("lat_pekerjaan !=", '');
        $ci->db->where("id_pekerjaan", $id);
        $data = $ci->db->get();
        $data = $data->row_array();

        $array = array_values($data);

        return ($array ? $array : '');
    }

    function nip($data)
    {
        $ci = &get_instance();
        $ci->db->from("user");
        $ci->db->where("nama_user", $data);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? 'NIP. '.$data['nik_user'] : '');
    }
    function get_tim($id, $position)
    {
        $ci = &get_instance();
        $ci->db->from("user");
        $ci->db->where("id_user", $id);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data[$position] : '');
    }
    function has_sub($id)
    {
        $ci = &get_instance();
        $ci->db->from("sub_pekerjaan");
        $ci->db->where("parent_sub_pekerjaan", $id);
        $data = $ci->db->get();
        $data = $data->num_rows();
        return $data;
    }
    function get_nama_user($id)
    {
        $ci = &get_instance();
        $ci->db->from("user");
        $ci->db->where("id_user", $id);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['nama_user'] : '');
    }
    function get_nama_pekerjaan($id)
    {
        $ci = &get_instance();
        $ci->db->from("pekerjaan");
        $ci->db->where("id_pekerjaan", $id);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['nama_pekerjaan'] : '');
    }
    function get_kode_pekerjaan($id)
    {
        $ci = &get_instance();
        $ci->db->from("pekerjaan");
        $ci->db->where("id_pekerjaan", $id);
        $data = $ci->db->get();
        $data = $data->row_array();
        return ($data ? $data['kode_pekerjaan'] : '');
    }
    function get_menu_parent()
    {
        $ci = &get_instance();
        $ci->db->from("menu");
        $ci->db->where("parent_menu", 0);
        $data = $ci->db->get();
        return $data->result_array();
    }
    function get_slug_parent($parent)
    {
        $ci = &get_instance();
        $ci->db->from("menu");
        $ci->db->where("id_menu", $parent);
        $datas = $ci->db->get();
        $datas = $datas->row_array();
        if($parent == 0):
            $data = "";
        else:
            $data = $datas['slug_menu'].'/';
        endif;

        return $data;
    }
    function get_menu_slug($id)
    {
        $ci = &get_instance();
        $ci->db->from("menu");
        $ci->db->where("id_menu", $id);
        $datas = $ci->db->get();
        $datas = $datas->row_array();

        return $datas['slug_menu'];
    }
    function get_menu_child($parent)
    {
        $ci = &get_instance();
        $ci->db->from("menu");
        $ci->db->where("parent_menu", $parent);
        $data = $ci->db->get();
        return $data->result_array();
    }
    function get_menu_name($slug)
    {
        $ci = &get_instance();
        $ci->db->from("menu");
        $ci->db->where("slug_menu", $slug);
        $data = $ci->db->get();
        if($data->num_rows() > 0):
            $data = $data->row_array();
            $v = $data['nama_menu'];
        else:
            $v = "";
        endif;

        return $v;
    }
    function get_menu_by_id($id)
    {
        $ci = &get_instance();
        $ci->db->from("menu");
        $ci->db->where("id_menu", $id);
        $data = $ci->db->get();
        if($data->num_rows() > 0):
            $data = $data->row_array();
            $v = $data;
        else:
            $v = "";
        endif;

        return $v;
    }

    function wa($field)
    {
        $ci = &get_instance();
        $ci->db->from("whatsapp_button");
        $datas = $ci->db->get();
        $data = $datas->row_array();
        $v = $data[$field];
        return $v;
    }
    function vid($field)
    {
        $ci = &get_instance();
        $ci->db->from("video_banner");
        $datas = $ci->db->get();
        $data = $datas->row_array();
        $v = $data[$field];
        return $v;
    }
    function get_room($id, $field)
    {
        $ci = &get_instance();
        $ci->db->from("room");
        $ci->db->where("id_room", $id);
        $datas = $ci->db->get();
        $data = $datas->row_array();
        $v = $data[$field];
        return $v;
    }
    function get_room_pic($id)
    {
        $ci = &get_instance();
        $ci->db->from("room_pic");
        $ci->db->where("parent_room_pic", $id);
        $datas = $ci->db->get();
        $data = $datas->result_array();
        $v = $data;
        return $v;
    }
    function count_room()
    {
        $ci = &get_instance();
        $ci->db->select("sum(unit_room) as total");
        $ci->db->from("room");
        $datas = $ci->db->get();
        $data = $datas->row_array();
        $v = $data;
        return $v['total'];
    }

    function count_data($id, $table)
    {
        $ci=& get_instance();
        $ci->load->database();    
        $data = $ci->db
        ->where('parent_'.$table, $id)
        ->get($table)->num_rows();

        return $data;
    }


    function send_email($to, $cc, $subject, $message, $attach = false)
    {
        // $to = 'stribez@gmail.com';
        // $cc = '130384@yahoo.com';
        // $subject = 'COBA';
        // $attach = false;
        // $message = "<html><body>TEST</body></html>";

        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "mail.superiorcanggu.com";
        $config['smtp_crypto'] = "ssl";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "noreply@superiorcanggu.com";
        $config['smtp_pass'] = "100%Id/En";
        $config['charset'] = "iso-8859-1";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $ci->email->initialize($config);
        $ci->email->from('noreply@superiorcanggu.com', "Superior Canggu");
        $ci->email->to($to);
        $ci->email->cc($cc);
        $ci->email->subject($subject);
        $ci->email->message($message);
        if(is_array($attach)) $ci->email->attach($attach['path'].$attach['file']);
        // $ci->email->send();

        // print_r($ci->email->print_debugger());die;
        if ( ! $ci->email->send())
        {
            // Generate error
            return 'Error';
        } else {
            return 'Success';
        }

    }

    function send_notification($title, $desc, $user, $type, $type_id)
    {
        $ci=& get_instance();
        $ci->load->database(); 

        $post = array(
            'notification_title'        =>  $title,
            'notification_description'  =>  $desc,
            'notification_user'         =>  $user,
            'notification_type'         =>  $type,
            'notification_type_id'      =>  $type_id
        );
    
        $ci->db->insert('notification', $post);
        return $ci->db->insert_id();
    }


    function no_reg($total)
	{
        $sub1 = substr($total,-3);
        $sub2 = substr($total,-2);
        $sub3 = substr($total,-1);

        $total1 =  random_string('numeric', 3);
        $total2 =  random_string('numeric', 2);
        $total3 =  random_string('numeric', 1);

        if($sub1==0){
            $total =  $total + $total1;
        } else if($sub2 == 0){
            $total = $total + $total2; 
        } else if($sub3 == 0){
            $total = $total + $total3;
        }else{
	        $total = $total;
        }
        $data = array('price' => $total, 'code' => substr($total, -3, 3));
        return $data;
    }
  
    function encrypt_uri($uri)
    {
        $CI =&get_instance();
        $CI->load->library('encryption'); // load library 
        return strtr($CI->encryption->encrypt($uri), '+=/', '.-~');
    }

    function decrypt_uri($uri)
    {
        $CI =&get_instance();
        $CI->load->library('encryption'); // load library 
        return $CI->encryption->decrypt(strtr($uri, '.-~', '+=/'));
    }

    function upload_files($path, $slug, $name = 'file')
    {
        $CI =&get_instance();
        $CI->load->library(['upload', 'image_lib']); // load library 
        $CI->load->library('session'); // load library 

        $img_name = microtime(true)*10000;
        
        $data = array();
        $config['upload_path']          = './uploads/tmp/';
        $config['file_name']            = $slug.'_'.$img_name;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 0;

        $CI->upload->initialize($config);
        
        if ( ! $CI->upload->do_upload($name))
        {
            $error = array('error' => $CI->upload->display_errors());
            return $error;
        }
        else
        {
            $data = array('upload_data' => $CI->upload->data());
        }

        $config1['image_library'] = 'gd2';
        $config1['source_image'] = $data['upload_data']['full_path'];
        $config1['new_image'] = './uploads/'.$path.'/';

        if ($CI->session->userlogin['role_user'] > 2):
        $config1['create_thumb'] = TRUE;
        $config1['thumb_marker']  = '';
        $config1['maintain_ratio'] = TRUE;
        $config1['width']         = 600;
        $config1['height']       = 600;
        endif;

        
        $CI->image_lib->initialize($config1);
        
        $CI->image_lib->resize();  
        $CI->image_lib->clear();
        
        if (!$CI->image_lib->resize()) {
            // $CI->handle_error($CI->image_lib->display_errors());
        }
        else {
            // ob_end_clean();
        }
        
        unlink('./uploads/tmp/'.$data['upload_data']['file_name']);

        $new_name = $data['upload_data']['file_name'];
        return $new_name;
    }

    function upload_pdf($slug)
    {
        $CI =&get_instance();
        $CI->load->library(['upload', 'image_lib']); // load library 

        $img_name = microtime(true)*10000;
        
        $data = array();
        
        $config['upload_path']      = './uploads/files/';
        $config['allowed_types']    = 'pdf';
        $config['max_size']         = '15000000';
        $config['file_name']        = $slug.'_'.$img_name;
        
        $CI->upload->initialize($config);
        
        if ( ! $CI->upload->do_upload('file'))
        {
            $data = $CI->upload->display_errors();
        }
        else
        {
            $data = $CI->upload->data();
        }

        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile('uploads/files/'.$data['file_name']);
        // $pdf    = $parser->parseFile('uploads/files/wecopos.pdf');
        $data['pages'] = $pdf->getDetails()['Pages'];

        return $data;
    }

    function check_admin()
    {
        $CI =&get_instance();
        $CI->load->library('session'); // load library 
        if ($CI->session->userdata('userlogin')['role_user'] > 2) redirect (base_url().'forbiden');
    }

    function check_register($data)
    {
        $CI =&get_instance();
        $CI->load->library('session'); // load library 
        if ($CI->session->userdata('userlogin')['id_user'] != $data->event_user_user) redirect (base_url().'forbiden');
        if ($data->event_user_active > 0) redirect (base_url().'event/'.$data->event_slug);
    }

    function check_login()
    {
        $CI =&get_instance();
        $CI->load->library('session'); // load library 
        // if ($CI->session->userdata('userlogin') == null) redirect (base_url('login'));
    }

    function tgl_indo($tgl)
    {
        $tanggal = substr($tgl, 8, 2);
        $bulan = getBulan_indo(substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        return  $bulan . ' ' .$tanggal . ', ' . $tahun;
    }

    function getBulan_indo($bln)
    {
        switch ($bln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Aug";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Oct";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Dec";
                break;
        }
    }

    function tgl_indo_lengkap($tanggal){
        if ($tanggal == '0000-00-00') return ' '; 
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return (string)((int)($pecahkan[2])) . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    
    function tgl_indo_jam($tgl)
    {
        //2021-12-12 00:00:00
        $tanggal = substr($tgl, 8, 2);
        $bulan = getBulan_indo(substr($tgl, 5, 2));
        $tahun = substr($tgl, 2, 2);
        $jam = substr($tgl, 11, 5);
        return $tanggal . ' ' . $bulan . ' ' . $tahun. ' - '.$jam. ' wib' ;
    }
    
  
    function hari_indo($tanggal)
    {
        if ($tanggal == '0000-00-00') return ''; 
        $hari = array (
            1    =>  'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
        );
        
        $day = strftime("%u",strtotime($tanggal));
    
//    print_r();die;
 
        return $hari[ (int) $day ];
    }
  
    function tgl_plus($tanggal, $add)
    {
        if ($tanggal == '0000-00-00') return ''; 
        $date = new DateTime($tanggal);

        $date->modify($add.' day');
        $d = $date->format('Y-m-d') . "\n";
    
        return $d;
    }

  
    function angka($number) {
        $number = explode('.',$number);
        $number = $number[0];
    
        $hyphen      = ' ';
        $conjunction = ' ';
        $separator   = ' ';
        $negative    = 'minus ';
        $decimal     = ' koma ';
        $dictionary  = array(
            0                   => 'nol',
            1                   => 'satu',
            2                   => 'dua',
            3                   => 'tiga',
            4                   => 'empat',
            5                   => 'lima',
            6                   => 'enam',
            7                   => 'tujuh',
            8                   => 'delapan',
            9                   => 'sembilan',
            10                  => 'sepuluh',
            11                  => 'sebelas',
            12                  => 'dua belas',
            13                  => 'tiga belas',
            14                  => 'empat belas',
            15                  => 'lima belas',
            16                  => 'enam belas',
            17                  => 'tujuh belas',
            18                  => 'delapan belas',
            19                  => 'sembilan belas',
            20                  => 'dua puluh',
            30                  => 'tiga puluh',
            40                  => 'empat puluh',
            50                  => 'lima puluh',
            60                  => 'enam puluh',
            70                  => 'tujuh puluh',
            80                  => 'delapan puluh',
            90                  => 'sembilan puluh',
            100                 => 'ratus',
            1000                => 'ribu',
            100000              => 'ratus ribu',
            1000000             => 'juta',
            1000000000          => 'miliar',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
        );
    
        if (!is_numeric($number)) {
            return false;
        }
    
        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'angka only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        
        
        
        if ($number < 0) {
            return $negative . angka(abs($number));
        }
    
        $string = $fraction = null;
    
        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }
    
        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                
                if ($string == 'satu ratus') {
                    $string = 'seratus';
                }
                if ($remainder) {
                    $string .= $conjunction . angka($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = angka($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= angka($remainder);
                }
                break;
        }
    
        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
        if ($string == 'satu ribu') {
            $string = 'seribu';
        }
        if ($string == 'satu ratus') {
            $string = 'seratus';
        }
        if ($string == 'satu ratus ribu') {
            $string = 'seratus ribu';
        }
        return $string;
    }
  
    function dateOnly($tanggal)
    {     
        if ($tanggal == '0000-00-00') return ''; 
        $date = new DateTime($tanggal);

        $d = $date->format('Y-m-d');
        $data = explode("-", $d);
        
        $d = $data[2];
        
        return (int) $d;
    }
    function monthOnly($tanggal)
    {
        if ($tanggal == '0000-00-00') return ''; 
        $data = explode("-", $tanggal);
        $m = $data[1];
        return (int) $m;
    }
    function yearOnly($tanggal)
    {
        if ($tanggal == '0000-00-00') return ''; 
        $data = explode("-", $tanggal);
        $m = $data[0];
        return $m;
    }
  
    function monthOnly_indo($tanggal){
        if ($tanggal == '0000-00-00') return ''; 
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
    
        return $bulan[ (int)$pecahkan[1] ];
    }
  
  
    function monthRoman($tanggal)
    {
        if ($tanggal == '0000-00-00') return ''; 
        $date = explode("-", $tanggal);
        $data = $date[1];
        if ($data == '01'):
        $result = 'I';
        elseif ($data == '02'):
        $result = 'II';
        elseif ($data == '03'):
        $result = 'III';
        elseif ($data == '04'):
        $result = 'IV';
        elseif ($data == '05'):
        $result = 'V';
        elseif ($data == '06'):
        $result = 'VI';
        elseif ($data == '07'):
        $result = 'VII';
        elseif ($data == '08'):
        $result = 'VIII';
        elseif ($data == '09'):
        $result = 'IX';
        elseif ($data == '10'):
        $result = 'X';
        elseif ($data == '11'):
        $result = 'XI';
        else :
        $result = 'XII';
        endif;
        return $result;
    }

  
    function seo_title($s)
    {
        $c = array(' ');
        $d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', '–');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '_', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }
    function rupiah($data)
    {
        return 'Rp'.number_format($data, 0, ',', '.');
    }

    function cek_terakhir($datetime, $full = false)
    {
        $today = time();
        $createdday = strtotime($datetime);
        $datediff = abs($today - $createdday);
        $difftext = "";
        $years = floor($datediff / (365 * 60 * 60 * 24));
        $months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        $hours = floor($datediff / 3600);
        $minutes = floor($datediff / 60);
        $seconds = floor($datediff);
        //year checker  
        if ($difftext == "") {
            if ($years > 1)
                $difftext = $years . " Years";
            elseif ($years == 1)
                $difftext = $years . " Year";
        }
        //month checker  
        if ($difftext == "") {
            if ($months > 1)
                $difftext = $months . " Months";
            elseif ($months == 1)
                $difftext = $months . " Month";
        }
        //month checker  
        if ($difftext == "") {
            if ($days > 1)
                $difftext = $days . " Days";
            elseif ($days == 1)
                $difftext = $days . " Day";
        }
        //hour checker  
        if ($difftext == "") {
            if ($hours > 1)
                $difftext = $hours . " Hours";
            elseif ($hours == 1)
                $difftext = $hours . " Hour";
        }
        //minutes checker  
        if ($difftext == "") {
            if ($minutes > 1)
                $difftext = $minutes . " Min";
            elseif ($minutes == 1)
                $difftext = $minutes . " Min";
        }
        //seconds checker  
        if ($difftext == "") {
            if ($seconds > 1)
                $difftext = $seconds . " Sec";
            elseif ($seconds == 1)
                $difftext = $seconds . " Sec";
        }
        return $difftext;
    }