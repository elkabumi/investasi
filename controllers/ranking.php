<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/ranking_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("ranking");

$_SESSION['menu_active'] = 5;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if(!isset($_GET['preview'])){
			log_data(1, 0, $_SESSION['user_id'], "laporan tahunan");
		}
		$action = "ranking.php?page=form_result&preview=1";
		
		
			$i_master_year1 = "";
			$i_master_year2 = "";
			
		
		if(isset($_GET['preview'])){
			 
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
			
		}
		
		
		include '../views/ranking/form.php';
		
		if(isset($_GET['preview'])){
			
			
			
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
			
			
			$query_item = select_detail($i_master_year1, $i_master_year2);
			
			log_data(10, 0, $_SESSION['user_id'], "Ranking");
/*
			$tanggal = $i_master_year1." s/d ".$i_master_year2;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_master_year1, $i_master_year2);
			
			include '../views/ranking/form_result.php';*/
			
			include '../views/ranking/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		
			$i_master_year1 = (isset($_POST['i_master_year1'])) ? $_POST['i_master_year1'] : null;
			$i_master_year2 = (isset($_POST['i_master_year2'])) ? $_POST['i_master_year2'] : null;
		
	
		header("Location: ranking.php?page=list&preview=1&master_year1=$i_master_year1&master_year2=$i_master_year2");
		
	break;
	
	case 'form_download':
	get_header();
	
	
	$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
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
				
	$action = "ranking.php?page=download&master_category_id=$i_master_category_id&master_sub_category_id=$i_master_sub_category_id&master_year1=$i_master_year1&master_year2=$i_master_year2&country=".$country."&city=".$city."&busines=".$busines."&tenaga=".$_GET['tenaga']."&investasi=".$_GET['investasi']."&sub_busines=$sub_busines";
	
	include '../views/ranking/form_download.php';
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
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
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
			
			$query_item = select_detail($i_master_category_id,  $i_master_sub_category_id, $i_master_year1, $i_master_year2, $country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2, $sub_busines);
			
						
			$title = 'ranking';
			$format = create_report($title."_".$i_master_year1."_".$i_master_year2);
			log_data(11, 0, $_SESSION['user_id'], "laporan tahunan");
			include '../views/report/ranking.php';
			

	break;
	
	case 'download_pdf':
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
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
			
			$query_item = select_detail($i_master_category_id,  $i_master_sub_category_id, $i_master_year1, $i_master_year2, $country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2, $sub_busines);

			/*
			$tanggal = $i_master_year1." s/d ".$i_master_year2;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_master_year1, $i_master_year2);
			*/
			
			log_data(12, 0, $_SESSION['user_id'], "laporan tahunan");
			include '../views/report/ranking_pdf.php';
	
	break;
	
	
}

?>