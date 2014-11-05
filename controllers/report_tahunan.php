<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/report_tahunan_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Laporan Tahunan");

$_SESSION['menu_active'] = 5;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if(!isset($_GET['preview'])){
			log_data(1, 0, $_SESSION['user_id'], "laporan tahunan");
		}
		$action = "report_tahunan.php?page=form_result&preview=1";
		
			$i_master_category_id = "";
			$i_master_year1 = "";
			$i_master_year2 = "";
		
		if(isset($_GET['preview'])){
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
		}
		
		
		include '../views/report_tahunan/form.php';
		
		if(isset($_GET['preview'])){
			
			
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id, $i_master_year1, $i_master_year2);
log_data(10, 0, $_SESSION['user_id'], "laporan tahunan");
			$tanggal = $i_master_year1." s/d ".$i_master_year2;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_master_year1, $i_master_year2);
			
			include '../views/report_tahunan/form_result.php';
			include '../views/report_tahunan/list_item.php';
		}
		
		
		get_footer();
	break;
	
	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		//if(isset($_GET['preview'])){
			$i_master_category_id = (isset($_POST['i_master_category_id'])) ? $_POST['i_master_category_id'] : null;
			$i_master_year1 = (isset($_POST['i_master_year1'])) ? $_POST['i_master_year1'] : null;
			$i_master_year2 = (isset($_POST['i_master_year2'])) ? $_POST['i_master_year2'] : null;
		//}
		
		header("Location: report_tahunan.php?page=list&preview=1&master_category_id=$i_master_category_id&master_year1=$i_master_year1&master_year2=$i_master_year2");
	break;
	

	
	
	case 'download':
	
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id, $i_master_year1, $i_master_year2);

			$tanggal = $i_master_year1." s/d ".$i_master_year2;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_master_year1, $i_master_year2);
			
						
			$title = 'report_tahunan';
			$format = create_report($title."_".$i_master_year1."_".$i_master_year2);
			log_data(11, 0, $_SESSION['user_id'], "laporan tahunan");
			include '../views/report/report_tahunan.php';
			

	break;
	
	case 'download_pdf':
			$i_master_category_id = get_isset($_GET['master_category_id']);
			$i_master_year1 = get_isset($_GET['master_year1']);
			$i_master_year2 = get_isset($_GET['master_year2']);
			
			if($i_master_category_id == 0){
				$nama_category = "Semua Kategori";
			}else{
				$nama_category = get_master_category($i_master_category_id);
			}
			
			$query_item = select_detail($i_master_category_id, $i_master_year1, $i_master_year2);

			$tanggal = $i_master_year1." s/d ".$i_master_year2;
			$jumlah_data = get_jumlah_data($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = get_jumlah_investasi($i_master_category_id, $i_master_year1, $i_master_year2);
			$jumlah_investasi = number_format($jumlah_investasi, 2);
			$jumlah_tenaga_kerja = get_jumlah_tenaga_kerja($i_master_category_id, $i_master_year1, $i_master_year2);
			
			log_data(12, 0, $_SESSION['user_id'], "laporan tahunan");
			include '../views/report/report_tahunan_pdf.php';
	
	break;
	
	
}

?>