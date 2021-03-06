<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/report_triwulan_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Laporan Triwulan");

$_SESSION['menu_active'] = 5;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if(!isset($_GET['preview'])){
			log_data(1, 0, $_SESSION['user_id'], "laporan triwulan");
		}
		$action = "report_triwulan.php?page=form_result&preview=1";
		
			$i_master_category_id = "";
			$i_master_sub_category_id = "";
			$i_triwulan = "";
			$i_master_year = "";
			$country = "";
			$city = "";
			$busines = "";
			$sub_busines = "";
			$tenaga1 = "";
			$tenaga2 = "";
			$investasi1 = "";
			$investasi2 = "";
		
		if(isset($_GET['preview'])){
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$city = (isset($_GET['city'])) ? $_GET['city'] : null;
				$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				$i_tenaga = $_GET['tenaga'];	
				$i_investasi = $_GET['investasi'];
				$i_tenaga = str_replace(" ","", $i_tenaga);
				$tenaga = explode("-", $i_tenaga);
				$i_investasi = str_replace(" ","", $i_investasi);
				$investasi = explode("-", $i_investasi);
				$tenaga1 = $tenaga[0];
				$tenaga2 = $tenaga[1];
				$investasi1 = $investasi[0];
				$investasi2 = $investasi[1];
				$sub_busines = (isset($_GET['sub_busines'])) ? $_GET['sub_busines'] : null;
		}
		
		
		include '../views/report_triwulan/form.php';
		
		if(isset($_GET['preview'])){
			
			
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$city = (isset($_GET['city'])) ? $_GET['city'] : null;
				$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				$i_tenaga = $_GET['tenaga'];	
				$i_investasi = $_GET['investasi'];
				$i_tenaga = str_replace(" ","", $i_tenaga);
				$tenaga = explode("-", $i_tenaga);
				$i_investasi = str_replace(" ","", $i_investasi);
				$investasi = explode("-", $i_investasi);
				
				$tenaga1 = $tenaga[0];
				$tenaga2 = $tenaga[1];
				$investasi1 = $investasi[0];
				$investasi2 = $investasi[1];
				$sub_busines = (isset($_GET['sub_busines'])) ? $_GET['sub_busines'] : null;
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id,  $i_master_sub_category_id, $i_triwulan, $i_master_year, $country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2, $sub_busines);
				log_data(10, 0, $_SESSION['user_id'], "laporan triwulan");
				/*
			$tanggal = $i_triwulan." - ".$i_master_year;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_triwulan, $i_master_year);
			
			
			
			include '../views/report_triwulan/form_result.php';
			*/
			
			include '../views/report_triwulan/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		
			$i_master_category_id = (isset($_POST['i_master_category_id'])) ? $_POST['i_master_category_id'] : null;
			$i_master_sub_category_id = (isset($_POST['i_master_sub_category_id'])) ? $_POST['i_master_sub_category_id'] : null;
			$i_triwulan = (isset($_POST['i_triwulan'])) ? $_POST['i_triwulan'] : null;
			$i_master_year = (isset($_POST['i_master_year'])) ? $_POST['i_master_year'] : null;
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_business_type_id = get_isset($i_business_type_id);
		$i_sub_business_type_id = get_isset($i_sub_business_type_id);
		
		$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_tenaga_kerja2 = get_isset($i_tenaga_kerja2);
		
		$i_investasi = get_isset($i_investasi);
		$i_investasi2 = get_isset($i_investasi2);
		$tenaga =  $i_tenaga_kerja." - ".$i_tenaga_kerja2;
		$investasi =  $i_investasi." - ". $i_investasi2;
		
		if($i_tenaga_kerja2 < $i_tenaga_kerja){
			header("Location: report_triwulan.php?page=form&err=1");
		}
		else if($i_investasi2 < $i_investasi){
			header("Location: report_triwulan.php?page=form&err=2");
		}
		else{
		
		header("Location: report_triwulan.php?page=list&preview=1&master_category_id=$i_master_category_id&master_sub_category_id=$i_master_sub_category_id&triwulan=$i_triwulan&master_year=$i_master_year&country=".$i_country_id."&city=".$i_city_id."&busines=".$i_business_type_id."&tenaga=".$tenaga."&investasi=".$investasi."&sub_busines=$i_sub_business_type_id");
		}
	break;
	
	
	case 'form_download':
	get_header();
	
	
	$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
				$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$city = (isset($_GET['city'])) ? $_GET['city'] : null;
				$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				$i_tenaga = $_GET['tenaga'];	
				$i_investasi = $_GET['investasi'];
				$i_tenaga = str_replace(" ","", $i_tenaga);
				$tenaga = explode("-", $i_tenaga);
				$i_investasi = str_replace(" ","", $i_investasi);
				$investasi = explode("-", $i_investasi);
				
				$tenaga1 = $tenaga[0];
				$tenaga2 = $tenaga[1];
				$investasi1 = $investasi[0];
				$investasi2 = $investasi[1];
				$sub_busines = (isset($_GET['sub_busines'])) ? $_GET['sub_busines'] : null;
				
	$action = "report_triwulan.php?page=download&master_category_id=$i_master_category_id&master_sub_category_id=$i_master_sub_category_id&triwulan=$i_triwulan&master_year=$i_master_year&country=".$country."&city=".$city."&busines=".$busines."&tenaga=".$_GET['tenaga']."&investasi=".$_GET['investasi']."&sub_busines=$sub_busines";
	
	include '../views/report_triwulan/form_download.php';
	get_footer();
	break;

	
	
	case 'download':
	
	$colspan_aktif = 0;
	for($i=1; $i<=26; $i++){
		$kol[$i] = (isset($_POST["i_kolom".$i])) ? $_POST["i_kolom".$i] : "";
		if($kol[$i] == 1){
			$colspan_aktif++;
		}
		
	}
	$colspan_aktif++;
	
			
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$city = (isset($_GET['city'])) ? $_GET['city'] : null;
				$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				$i_tenaga = $_GET['tenaga'];	
				$i_investasi = $_GET['investasi'];
				$i_tenaga = str_replace(" ","", $i_tenaga);
				$tenaga = explode("-", $i_tenaga);
				$i_investasi = str_replace(" ","", $i_investasi);
				$investasi = explode("-", $i_investasi);
				
				$tenaga1 = $tenaga[0];
				$tenaga2 = $tenaga[1];
				$investasi1 = $investasi[0];
				$investasi2 = $investasi[1];
				$sub_busines = (isset($_GET['sub_busines'])) ? $_GET['sub_busines'] : null;
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id,  $i_master_sub_category_id, $i_triwulan, $i_master_year, $country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2, $sub_busines);
						
			$title = 'report_triwulan';
			$format = create_report($title."_".$i_master_year);
			log_data(11, 0, $_SESSION['user_id'], "laporan triwulan");
			include '../views/report/report_triwulan.php';
			

	break;
	
	case 'download_pdf':
			
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$city = (isset($_GET['city'])) ? $_GET['city'] : null;
				$busines = (isset($_GET['busines'])) ? $_GET['busines'] : null;
				$i_tenaga = $_GET['tenaga'];	
				$i_investasi = $_GET['investasi'];
				$i_tenaga = str_replace(" ","", $i_tenaga);
				$tenaga = explode("-", $i_tenaga);
				$i_investasi = str_replace(" ","", $i_investasi);
				$investasi = explode("-", $i_investasi);
				
				$tenaga1 = $tenaga[0];
				$tenaga2 = $tenaga[1];
				$investasi1 = $investasi[0];
				$investasi2 = $investasi[1];
				$sub_busines = (isset($_GET['sub_busines'])) ? $_GET['sub_busines'] : null;
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id,  $i_master_sub_category_id, $i_triwulan, $i_master_year, $country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2, $sub_busines);
			
			/*
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_triwulan, $i_master_year);
			*/
			log_data(12, 0, $_SESSION['user_id'], "laporan triwulan");
			
			include '../views/report/report_triwulan_pdf.php';
	
	break;
	
	
}

?>