<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$master_type_id = (isset($_GET['master_type_id'])) ? $_GET['master_type_id'] : 6;
		if($master_type_id == 6){
			$title = "Izin Prinsip";
		}else if($master_type_id == 7){
			$title = "Izin Usaha";
		}

switch ($page) {
	case 'list':
		get_header();

		
		
		$query = select($master_type_id);
		$add_button = "master.php?page=form&master_type_id=$master_type_id";


		include '../views/master/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$close_button = "master.php?page=list&master_type_id=$master_type_id";
		
		if($id){
			$row = read_id($id);
			$action = "master.php?page=edit&id=$id&master_type_id=$master_type_id";
		} else{
			//inisialisasi
			$row = new stdClass();
			$row->master_category_id = false;
			$row->nama_perusahaan = false;
			$row->alamat = false;
			$row->no_ip = false;
			$row->no_iu = false;
			$row->no_perusahaan = false;
			$row->no_kode_proyek = false;
			$row->investasi = false;
			$row->tenaga_kerja = false;
			$row->kapasitas = false;
			$row->ekspor = false;
			$row->country_id = false;
			$row->city_id = false;
			$row->npwp = false;	
			$row->business_type_id = false;	
			$row->keterangan = false;	
			$row->master_year = false;	
			$row->master_date = false;	
			$row->master_img = false;	

			$action = "master.php?page=save&master_type_id=$master_type_id";
		}

		include '../views/master/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);
		
			
		$i_master_category_id = get_isset($i_master_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		$i_investasi = get_isset($i_investasi);
		$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		$i_keterangan = get_isset($i_keterangan);
		$i_user_id = get_isset($_SESSION['user_id']);
		$i_master_year = get_isset($i_master_year);
		$i_master_date = date("Y-m-d");
		$i_master_img = get_isset($_FILES['i_master_img']['name']);
		
		$path = '../img/master_img/';
		
		if($i_master_img!=""){
			$image = $path.$i_master_date."_".$_FILES['i_master_img']['name'];
			move_uploaded_file($_FILES['i_master_img']['tmp_name'], $image);
		}else{
			$image = "";
		}
		
		$data = "'', '1', '$master_type_id', '$i_master_category_id', '$i_nama_perusahaan', '$i_alamat', '$i_no_ip', '$i_no_iu', '$i_no_perusahaan', '$i_no_kode_proyek', '$i_investasi', '$i_tenaga_kerja', '$i_kapasitas', '$i_ekspor', '$i_country_id', '$i_city_id', '$i_npwp', '$i_business_type_id', '$i_keterangan', '$i_user_id', '$i_master_year', '$i_master_date', '$image'";
		create($data);
		
		show_message("Simpan berhasil", "master.php?page=list&master_type_id=$master_type_id&did=1");
		
		

	break;

	
	case 'edit':
		
		$id = get_isset($_GET['id']);	
		
		extract($_POST);

		$i_master_category_id = get_isset($i_master_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		$i_investasi = get_isset($i_investasi);
		$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		$i_keterangan = get_isset($i_keterangan);
		$i_user_id = get_isset($_SESSION['user_id']);
		$i_master_year = get_isset($i_master_year);
		$i_master_date = date("Y-m-d");
		$i_master_img = get_isset($_FILES['i_master_img']['name']);
		
		$path = '../img/master_img/';
		
		if($i_master_img!=""){
			
			
			$r_img = get_img($id);
			
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
			}
			
			$image = $path.$i_master_date."_".$_FILES['i_master_img']['name'];
			move_uploaded_file($_FILES['i_master_img']['tmp_name'], $image);
			
			$data = " master_sub_category_id = '$i_master_category_id',
				nama_perusahaan = '$i_nama_perusahaan',
				alamat = '$i_alamat', 
				no_ip = '$i_no_ip', 
				no_iu = '$i_no_iu', 
				no_perusahaan = '$i_no_perusahaan', 
				no_kode_proyek = '$i_no_kode_proyek', 
				investasi = '$i_investasi',
				tenaga_kerja = '$i_tenaga_kerja',
				kapasitas = '$i_kapasitas',
				ekspor = '$i_ekspor',
				country_id = '$i_country_id',
				city_id = '$i_city_id',
				npwp = '$i_npwp',
				business_type_id = '$i_business_type_id',
				keterangan = '$i_keterangan',
				master_year = '$i_master_year',
				master_img = '$image'
				
				";
		}else{
			$data = " master_category_id = '$i_master_category_id',
				nama_perusahaan = '$i_nama_perusahaan',
				alamat = '$i_alamat', 
				no_ip = '$i_no_ip', 
				no_iu = '$i_no_iu', 
				no_perusahaan = '$i_no_perusahaan', 
				no_kode_proyek = '$i_no_kode_proyek', 
				investasi = '$i_investasi',
				tenaga_kerja = '$i_tenaga_kerja',
				kapasitas = '$i_kapasitas',
				ekspor = '$i_ekspor',
				country_id = '$i_country_id',
				city_id = '$i_city_id',
				npwp = '$i_npwp',
				business_type_id = '$i_business_type_id',
				keterangan = '$i_keterangan',
				master_year = '$i_master_year'
				";
		}

		

		update($data, $id);
		show_message("Simpan berhasil", "master.php?page=list&master_type_id=$master_type_id&did=2");

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	
		$r_img = get_img($id);
			
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
			}
			
		delete($id);

		header('Location: master.php?page=list&did=3');

	break;
}

?>