<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/report_semester_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Laporan Semester");

$_SESSION['menu_active'] = 3;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if(!isset($_GET['preview'])){
			log_data(1, 0, $_SESSION['user_id'], "laporan semester");
		}
		$action = "report_semester.php?page=form_result&preview=1";
		
			$i_master_category_id = "";
			$i_semester = "";
			$i_master_year = "";
		
		if(isset($_GET['preview'])){
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_semester = get_isset($_GET['semester']);
			$i_master_year = get_isset($_GET['master_year']);
		}
		
		
		include '../views/report_semester/form.php';
		
		if(isset($_GET['preview'])){
			
			
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_semester = get_isset($_GET['semester']);
			$i_master_year = get_isset($_GET['master_year']);
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id, $i_semester, $i_master_year);
			log_data(10, 0, $_SESSION['user_id'], "laporan semester");
			$tanggal = $i_semester." - ".$i_master_year;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_semester, $i_master_year);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_semester, $i_master_year);
			/*
			$total_jasa_angkut = get_total_jasa_angkut($date1, $date2, $i_owner_id);
			$total_subsidi_tol = get_total_subsidi_tol($date1, $date2, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date1, $date2, $i_owner_id);
			$total_hpp = get_total_hpp($date1, $date2, $i_owner_id);
			*/
			
			include '../views/report_semester/form_result.php';
			include '../views/report_semester/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		//if(isset($_GET['preview'])){
			$i_master_category_id = (isset($_POST['i_master_category_id'])) ? $_POST['i_master_category_id'] : null;
			$i_semester = (isset($_POST['i_semester'])) ? $_POST['i_semester'] : null;
			$i_master_year = (isset($_POST['i_master_year'])) ? $_POST['i_master_year'] : null;
		//}
		
		header("Location: report_semester.php?page=list&preview=1&master_category_id=$i_master_category_id&semester=$i_semester&master_year=$i_master_year");
	break;
	

	
	
	case 'download':
	
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
						
			$title = 'report_semester';
			$format = create_report($title."_".$i_master_year);
			log_data(11, 0, $_SESSION['user_id'], "laporan semester");
			include '../views/report/report_semester.php';
			

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
			
			log_data(12, 0, $_SESSION['user_id'], "laporan semester");
			include '../views/report/report_semester_pdf.php';
	
	break;
	
	
}

?>