<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/report_triwulan_model.php';

log_data(1, 0, $_SESSION['user_id'], "laporan triwulan");
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Laporan Triwulan");

$_SESSION['menu_active'] = 3;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$action = "report_triwulan.php?page=form_result&preview=1";
		
			$i_master_category_id = "";
			$i_triwulan = "";
			$i_master_year = "";
		
		if(isset($_GET['preview'])){
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
		}
		
		
		include '../views/report_triwulan/form.php';
		
		if(isset($_GET['preview'])){
			
			
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id, $i_triwulan, $i_master_year);

			$tanggal = $i_triwulan." - ".$i_master_year;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_triwulan, $i_master_year);
			/*
			$total_jasa_angkut = get_total_jasa_angkut($date1, $date2, $i_owner_id);
			$total_subsidi_tol = get_total_subsidi_tol($date1, $date2, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date1, $date2, $i_owner_id);
			$total_hpp = get_total_hpp($date1, $date2, $i_owner_id);
			*/
			
			include '../views/report_triwulan/form_result.php';
			include '../views/report_triwulan/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		//if(isset($_GET['preview'])){
			$i_master_category_id = (isset($_POST['i_master_category_id'])) ? $_POST['i_master_category_id'] : null;
			$i_triwulan = (isset($_POST['i_triwulan'])) ? $_POST['i_triwulan'] : null;
			$i_master_year = (isset($_POST['i_master_year'])) ? $_POST['i_master_year'] : null;
		//}
		
		header("Location: report_triwulan.php?page=list&preview=1&master_category_id=$i_master_category_id&triwulan=$i_triwulan&master_year=$i_master_year");
	break;
	

	
	
	case 'download':
	
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query_item = select_detail($i_master_category_id, $i_triwulan, $i_master_year);

			$tanggal = $i_triwulan." - ".$i_master_year;
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_triwulan, $i_master_year);
						
			$title = 'report_triwulan';
			$format = create_report($title."_".$i_master_year);
			
			include '../views/report/report_triwulan.php';
			

	break;
	
	case 'download_pdf':
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_triwulan = get_isset($_GET['triwulan']);
			$i_master_year = get_isset($_GET['master_year']);
			
			$query_item = select_detail($i_master_category_id, $i_triwulan, $i_master_year);

			$tanggal = $i_triwulan." - ".$i_master_year;
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_triwulan, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_triwulan, $i_master_year);
			
			include '../views/report/report_triwulan_pdf.php';
	
	break;
	
	
}

?>