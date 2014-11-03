<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/dashboard_izin_prinsip_triwulan_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 7;
$title = "Realisasi Izin Prinsip PMA dan PMDN";

switch ($page) {
	case 'list':
		get_header();
		
		$action = "dashboard_izin_prinsip_triwulan.php?page=form_result&preview=1";
		
		if(isset($_GET['preview'])){
			$year_default = $_GET['year'];
		}else{
			$year_default = date('Y');
		}
		
		
		include '../views/dashboard_izin_prinsip_triwulan/list.php';
		
		get_footer();
	break;
	
	case 'form_result':
	
		if(isset($_GET['preview'])){
			
			extract($_POST);
			$year = (isset($_POST['i_year'])) ? $_POST['i_year'] : null;
			echo $year;
		}
		
		header("Location: dashboard_izin_prinsip_triwulan.php?page=list&preview=1&year=$year");
	break;
}

?>