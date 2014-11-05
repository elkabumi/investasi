<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/olah_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";

$_SESSION['menu_active'] = 6;
$title ='Olah';
switch ($page) {
	case 'form':
		get_header();
		if(!isset($_GET['preview'])){
			log_data(1, 0, $_SESSION['user_id'], "olah");
		}
		$action = 'olah.php?page=form_action';
		
		$category = "";
		$country = "";
		$city = "";
		$busines = "";
		$tenaga1 = "";
		$tenaga2 = "";
		$investasi1 = "";
		$investasi2 = "";
		if(isset($_GET['preview'])){
			
				$i_tenaga = $_GET['tenaga'];
				
				$i_investasi = $_GET['investasi'];
				
				$i_tenaga = str_replace(" ","", $i_tenaga);
				$tenaga = explode("-", $i_tenaga);
				
				$i_investasi = str_replace(" ","", $i_investasi);
				$investasi = explode("-", $i_investasi);
			
				$category = (isset($_GET['category'])) ? $_GET['category'] : null;
				$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$city = (isset($_GET['city'])) ? $_GET['city'] : null;
				$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				
				$tenaga1 = $tenaga[0];
				$tenaga2 = $tenaga[1];
				
				$investasi1 = $investasi[0];
				$investasi2 = $investasi[1];
			
		}
		include '../views/olah/form.php';
		
		
		if(isset($_GET['preview'])){
				
				$type = 1;
				$i_tenaga = $_GET['tenaga'];
				
				$i_investasi = $_GET['investasi'];
				
				$i_tenaga = str_replace(" ","", $i_tenaga);
				$tenaga = explode("-", $i_tenaga);
				
				$i_investasi = str_replace(" ","", $i_investasi);
				$investasi = explode("-", $i_investasi);
			
				$category = (isset($_GET['category'])) ? $_GET['category'] : null;
				$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$city = (isset($_GET['city'])) ? $_GET['city'] : null;
				$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				
				$tenaga1 = $tenaga[0];
				$tenaga2 = $tenaga[1];
				
				$investasi1 = $investasi[0];
				$investasi2 = $investasi[1];
				
		
				$query = select($category,$country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2);
				
				log_data(10, 0, $_SESSION['user_id'], "olah");		
				include '../views/olah/list_result.php';
			
		}
		
		
		get_footer();
	break;
	
	case 'form_action':
		
		extract($_POST);
		
		$i_master_category_id = get_isset($i_master_category_id);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_business_type_id = get_isset($i_business_type_id);
		
		$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_tenaga_kerja2 = get_isset($i_tenaga_kerja2);
		
		$i_investasi = get_isset($i_investasi);
		$i_investasi2 = get_isset($i_investasi2);
		$tenaga =  $i_tenaga_kerja." - ".$i_tenaga_kerja2;
		$investasi =  $i_investasi." - ". $i_investasi2;
		
		if($i_tenaga_kerja2 < $i_tenaga_kerja){
			header("Location: olah.php?page=form&err=1");
		}
		else if($i_investasi2 < $i_investasi){
			header("Location: olah.php?page=form&err=2");
		}
		else{
		
		header("Location: olah.php?page=form&preview=1&category=".$i_master_category_id."&country=".$i_country_id."&city=".$i_city_id."&busines=".$i_business_type_id."&tenaga=".$tenaga."&investasi=".$investasi."");
		}
	break;
	
	
	case 'download':
	
			$i_tenaga = $_GET['tenaga'];
				
			$i_investasi = $_GET['investasi'];
				
			$i_tenaga = str_replace(" ","", $i_tenaga);
			$tenaga = explode("-", $i_tenaga);
				
			$i_investasi = str_replace(" ","", $i_investasi);
			$investasi = explode("-", $i_investasi);
			
			$category = (isset($_GET['category'])) ? $_GET['category'] : null;
			$country = (isset($_GET['country'])) ? $_GET['country'] : null;
			$city = (isset($_GET['city'])) ? $_GET['city'] : null;
			$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				
			$tenaga1 = $tenaga[0];
			$tenaga2 = $tenaga[1];
				
			$investasi1 = $investasi[0];
			$investasi2 = $investasi[1];
				
				
			if($category == 0){
				$nama_category = "Semua Kategori";
				$nama_category_title = "Semua_Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			$title = 'report_olah_data_investasi';
			
			$format = create_report($title."_".$nama_category_title);
			
			
			$query = select($category,$country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2);
			log_data(11, 0, $_SESSION['user_id'], "olah");		
			include '../views/report/report_olah.php';
			

	break;
	case 'download_pdf':
			$i_tenaga = $_GET['tenaga'];
				
			$i_investasi = $_GET['investasi'];
				
			$i_tenaga = str_replace(" ","", $i_tenaga);
			$tenaga = explode("-", $i_tenaga);
				
			$i_investasi = str_replace(" ","", $i_investasi);
			$investasi = explode("-", $i_investasi);
			
			$category = (isset($_GET['category'])) ? $_GET['category'] : null;
			$country = (isset($_GET['country'])) ? $_GET['country'] : null;
			$city = (isset($_GET['city'])) ? $_GET['city'] : null;
			$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				
			$tenaga1 = $tenaga[0];
			$tenaga2 = $tenaga[1];
				
			$investasi1 = $investasi[0];
			$investasi2 = $investasi[1];
				
				
			if($category == 0){
				$nama_category = "Semua Kategori";
				$nama_category_title = "Semua_Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			$title = 'report_olah_data_investasi'.$nama_category_title;
			
			///$format = create_report($title."_".$nama_category_title);
			
			
			$query = select($category,$country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2);
				log_data(12, 0, $_SESSION['user_id'], "olah");	
			
			include '../views/report/report_olah_pdf.php';
	
	break;
	
	
	}

?>