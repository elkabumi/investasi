<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/search_negara_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Data Investasi Berdasarkan Asal negara");

$_SESSION['menu_active'] = 5;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$action = "search_Negara.php?page=form_result&preview=1";
		
			$i_master_sub_category_id = false;
			$i_triwulan = false;
			$i_master_year = false;
			$i_country_id = false;
		
		if(isset($_GET['preview'])){
			$i_country_id = get_isset($_GET['country_id']);
			
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
		}
		
		
		include '../views/search_negara/form.php';
		
		if(isset($_GET['preview'])){
			
			
			$i_country_id = get_isset($_GET['country_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query = select_country($i_country_id);
		
			

			$tanggal = $i_triwulan." - ".$i_master_year;
			
			include '../views/search_negara/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		//if(isset($_GET['preview'])){
			$i_country_id = (isset($_POST['i_country_id'])) ? $_POST['i_country_id'] : null;
			$i_master_sub_category_id = (isset($_POST['i_master_sub_category_id'])) ? $_POST['i_master_sub_category_id'] : null;
			$i_triwulan = (isset($_POST['i_triwulan'])) ? $_POST['i_triwulan'] : null;
			$i_master_year = (isset($_POST['i_master_year'])) ? $_POST['i_master_year'] : null;
		//}
		
		header("Location: search_negara.php?page=list&preview=1&country_id=$i_country_id&triwulan=$i_triwulan&master_year=$i_master_year&master_sub_category_id=$i_master_sub_category_id");
	break;
	

	
	
	case 'download':
	
			$i_country_id = get_isset($_GET['country_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query = select_country($i_country_id);
			$title = 'Searb_negara';
			$format = create_report($title."_".$i_master_year);
			include '../views/report/search_negara.php';
			

	break;
	
	case 'download_pdf':
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_semester = get_isset($_GET['semester']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query_item = select_detail($i_master_category_id, $i_semester, $i_master_year);

			$tanggal = $i_semester." - ".$i_master_year;
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_semester, $i_master_year);
			
			include '../views/report/search_negara_pdf.php';
	
	break;
	
	
}

?>