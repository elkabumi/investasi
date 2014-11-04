<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/dashboard_realisasi_investasi_non_fas_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$title = "Realisasi Investasi PMDN Non Fas";

switch ($page) {
	case 'list':
		get_header();
		
		$action = "dashboard_realisasi_investasi_non_fas.php?page=form_result&preview=1";
		
		if(isset($_GET['preview'])){
			$year_default = $_GET['year'];
			$country_id = $_GET['country_id'];
			$city_id = $_GET['city_id'];
			$business_id = $_GET['business_id'];
			$sub_business_id = $_GET['sub_business_id'];
		}else{
			$year_default = date('Y');
			$country_id = '0';
			$city_id = '0';
			$business_id = 0;
			$sub_business_id = '';
		}
		
		
		include '../views/dashboard_realisasi_investasi_non_fas/list.php';
		
		get_footer();
	break;
	
	case 'form_result':
	
		if(isset($_GET['preview'])){
			
			extract($_POST);
			$year = (isset($_POST['i_year'])) ? $_POST['i_year'] : null;
			$country_id = (isset($_POST['i_country_id'])) ? $_POST['i_country_id'] : null;
			$city_id = (isset($_POST['i_city_id'])) ? $_POST['i_city_id'] : null;
			$business_id = (isset($_POST['i_business_type_id'])) ? $_POST['i_business_type_id'] : null;
			$sub_business_id = (isset($_POST['i_sub_business_type_id'])) ? $_POST['i_sub_business_type_id'] : null;
		}
		
		header("Location: dashboard_realisasi_investasi_non_fas.php?page=list&preview=1&year=$year&country_id=$country_id&city_id=$city_id&business_id=$business_id&sub_business_id=$sub_business_id");
	break;
}

?>