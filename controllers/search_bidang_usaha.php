<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/search_bidang_usaha_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Data Investasi Berdasarkan Bidang Usaha");

$_SESSION['menu_active'] = 3;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$action = "search_bidang_usaha.php?page=form_result&preview=1";
		
			$i_master_sub_category_id = "";
			$i_triwulan = "";
			$i_master_year = "";
		
		if(isset($_GET['preview'])){
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
		}
		
		
		include '../views/search_bidang_usaha/form.php';
		
		if(isset($_GET['preview'])){
			
			
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query_bu1 = select_bu(1);
			$query_bu2 = select_bu(2);
			$query_bu3 = select_bu(3);
			
			$query_item = select_detail($i_master_sub_category_id, $i_triwulan, $i_master_year);

			$tanggal = $i_triwulan." - ".$i_master_year;
			
			include '../views/search_bidang_usaha/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		//if(isset($_GET['preview'])){
			$i_master_sub_category_id = (isset($_POST['i_master_sub_category_id'])) ? $_POST['i_master_sub_category_id'] : null;
			$i_triwulan = (isset($_POST['i_triwulan'])) ? $_POST['i_triwulan'] : null;
			$i_master_year = (isset($_POST['i_master_year'])) ? $_POST['i_master_year'] : null;
		//}
		
		header("Location: search_bidang_usaha.php?page=list&preview=1&master_sub_category_id=$i_master_sub_category_id&triwulan=$i_triwulan&master_year=$i_master_year");
	break;
	

	
	
	case 'download':
	
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_semester = get_isset($_GET['semester']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query_item = select_detail($i_master_sub_category_id, $i_semester, $i_master_year);

			$tanggal = $i_semester." - ".$i_master_year;
			if($i_master_sub_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_sub_category_id);
			}
			
			$jumlah_data = get_jumlah_data($i_master_sub_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_sub_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_sub_category_id, $i_semester, $i_master_year);
						
			$title = 'search_bidang_usaha';
			$format = create_report($title."_".$i_master_year);
			
			include '../views/report/search_bidang_usaha.php';
			

	break;
	
	case 'download_pdf':
			$i_master_sub_category_id = get_isset($_GET['master_sub_category_id']);
			$i_semester = get_isset($_GET['semester']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query_item = select_detail($i_master_sub_category_id, $i_semester, $i_master_year);

			$tanggal = $i_semester." - ".$i_master_year;
			if($i_master_sub_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_sub_category_id);
			}
			
			$jumlah_data = get_jumlah_data($i_master_sub_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_sub_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_sub_category_id, $i_semester, $i_master_year);
			
			include '../views/report/search_bidang_usaha_pdf.php';
	
	break;
	
	
}

?>