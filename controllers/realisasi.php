<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/realisasi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : 1;
		if($master_category_id == 1){
			$title = "PMA";
		}else if($master_category_id == 2){
			$title = "PMDN";
		}else if($master_category_id == 3){
				$title = "Non Fas";
		}else if($master_category_id == 4){
				$title = "IU";
		}else if($master_category_id == 5){
				$title = "Ekspor";
		}
switch ($page) {
	case 'list':
		get_header();

		
		
		$query = select($master_category_id);
		$add_button = "realisasi.php?page=form&master_category_id=$master_category_id";
	

		include '../views/realisasi/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$close_button = "realisasi.php?page=list&master_category_id=$master_category_id";
		
		if($id){
			$row = read_id($id);
			if($master_category_id == '4'){
				$action = "realisasi.php?page=edit2&id=$id&master_category_id=$master_category_id";
			}else{
				$action = "realisasi.php?page=edit&id=$id&master_category_id=$master_category_id";
			}
		} else{
		
			$row = new stdClass();
			$row->master_sub_category_id = false;
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

			
			
			if($master_category_id == '4'){
				$action = "realisasi.php?page=save2&master_category_id=$master_category_id";
			}else{
				$action = "realisasi.php?page=save&master_category_id=$master_category_id";
		
			}
		}
			if($master_category_id == '4'){
				include '../views/realisasi/form2.php';
			}else{
				include '../views/realisasi/form.php';
		
			}
		
		get_footer();
	break;
	
	
	
	case 'save':

		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		extract($_POST);
		
	
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
		//echo $i_master_img;
		if($i_master_img!=""){
			$image = $path.$i_master_date."_".$_FILES['i_master_img']['name'];
			move_uploaded_file($_FILES['i_master_img']['tmp_name'], $image);
		}else{
			$image = "";
		}
		
		$data = "'',
				 '2', 
				 '$master_category_id',
				 '',
				 '$i_nama_perusahaan',
				 '$i_alamat',
				 '$i_no_ip',
				 '$i_no_iu', 
				 '$i_no_perusahaan', 
				 '$i_no_kode_proyek', 
				 '$i_investasi', 
				 '$i_tenaga_kerja', 
				 '$i_kapasitas', 
				 '$i_ekspor', 
				 '$i_country_id', 
				 '$i_city_id', 
				 '$i_npwp', 
				 '$i_business_type_id', 
				 '$i_keterangan', 
				 '$i_user_id', 
				 '$i_master_year', 
				 '$i_master_date', 
				 '$image'";
		create($data);
		
		show_message("Simpan berhasil", "realisasi.php?page=list&master_category_id=".$master_category_id."&did=1");
	

	break;
	
	case 'save2':
	
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;

		extract($_POST);
		
		$i_master_sub_category_id = get_isset($i_master_sub_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_investasi = get_isset($i_investasi);
		$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_ekspor = get_isset($i_ekspor);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		
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
		
		$data = "'',
				 '2', 
				 '$master_category_id',
				 '$i_master_sub_category_id',
				 '$i_nama_perusahaan',
				 '$i_alamat',
				 '',
				 '', 
				 '', 
				 '', 
				 '$i_investasi', 
				 '$i_tenaga_kerja', 
				 '', 
				 '$i_ekspor', 
				 '', 
				 '$i_city_id', 
				 '$i_npwp', 
				 '$i_business_type_id', 
				 '', 
				 '$i_user_id', 
				 '$i_master_year', 
				 '$i_master_date', 
				 '$image'";
		
		create($data);
	
		show_message("Simpan berhasil", "realisasi.php?page=list&master_category_id=".$master_category_id."&did=1");
		

	break;
	

	
	case 'edit':
		
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
			
		$id = get_isset($_GET['id']);	
		
		extract($_POST);

		
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

			$data = " master_category_id = '$master_category_id',
				nama_perusahaan = '$i_nama_perusahaan',
				alamat = '$i_alamat', 
				no_ip = '$i_no_ip', 
				no_iu = '$i_no_iu', 
				no_perusahaan = '$i_no_perusahaan', 
				no_kode_proyek = '$i_no_kode_proyek', 
				investasi = '$i_investasi',
				nama_perusahaan = '$i_nama_perusahaan',
				tenaga_kerja = '$i_tenaga_kerja',
				kapasitas = '$i_kapasitas',
				ekspor = '$i_ekspor',
				country_id = '$i_country_id',
				city_id = '$i_city_id',
				npwp = '$i_npwp',
				business_type_id = '$i_business_type_id',
				keterangan = '$i_keterangan',
				master_year = '$i_master_year',
				master_img = '$image'";
		}else{
			$data = " master_category_id = '$master_category_id',
				nama_perusahaan = '$i_nama_perusahaan',
				alamat = '$i_alamat', 
				no_ip = '$i_no_ip', 
				no_iu = '$i_no_iu', 
				no_perusahaan = '$i_no_perusahaan', 
				no_kode_proyek = '$i_no_kode_proyek', 
				investasi = '$i_investasi',
				nama_perusahaan = '$i_nama_perusahaan',
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

		show_message("Edit berhasil", "realisasi.php?page=list&master_category_id=".$master_category_id."&did=2");
	break;

	
	case 'edit2':
		
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		

		$id = get_isset($_GET['id']);	
		
		extract($_POST);

		
			$i_master_sub_category_id = get_isset($i_master_sub_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_investasi = get_isset($i_investasi);
		$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_ekspor = get_isset($i_ekspor);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		
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

		$data = " master_sub_category_id = '$master_sub_category_id',
				nama_perusahaan = '$i_nama_perusahaan',
				alamat = '$i_alamat',   
				investasi = '$i_investasi',
				nama_perusahaan = '$i_nama_perusahaan',
				tenaga_kerja = '$i_tenaga_kerja',
				ekspor = '$i_ekspor',
				country_id = '$i_country_id',
				city_id = '$i_city_id',
				npwp = '$i_npwp',
				business_type_id = '$i_business_type_id',
				master_year = '$i_master_year',
				master_img = '$image'
				
				";
		}else{
			$data = 
				"master_sub_category_id = '$master_sub_category_id',
				nama_perusahaan = '$i_nama_perusahaan',
				alamat = '$i_alamat',   
				investasi = '$i_investasi',
				nama_perusahaan = '$i_nama_perusahaan',
				tenaga_kerja = '$i_tenaga_kerja',
				ekspor = '$i_ekspor',
				country_id = '$i_country_id',
				city_id = '$i_city_id',
				npwp = '$i_npwp',
				business_type_id = '$i_business_type_id',
				master_year = '$i_master_year'
		
				
				";
		}
		update($data, $id);

		show_message("Edit berhasil", "realisasi.php?page=list&master_category_id=".$master_category_id."&did=2");
	break;
	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: realisasi.php?page=list&did=3');

	break;
}

?>