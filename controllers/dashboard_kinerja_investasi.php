<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/dashboard_kinerja_investasi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$title = "Dashboard Kinerja Investasi";

switch ($page) {
	case 'list':
		get_header();
		$action = "dashboard_kinerja_investasi.php?page=form_result&preview=1";
		
		if(isset($_GET['preview'])){
			$year = $_GET['year'];
		}else{
			$year = date('Y');
		}
			
		include '../views/dashboard_kinerja_investasi/list.php';
		
		get_footer();
	break;
	
	case 'form_result':
	
		if(isset($_GET['preview'])){
			
			extract($_POST);
			$year = (isset($_POST['i_year'])) ? $_POST['i_year'] : null;
			echo $year;
		}
		
		header("Location: dashboard_kinerja_investasi.php?page=list&preview=1&year=$year");
	break;
}

?>