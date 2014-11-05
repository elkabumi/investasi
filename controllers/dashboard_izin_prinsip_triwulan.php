<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/dashboard_izin_prinsip_triwulan_model.php';

log_data(1, 0, $_SESSION['user_id'], "dashboard realisasi Izin Prinsip pma dan pmdn");

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
			$country_id = $_GET['country_id'];
			$city_id = $_GET['city_id'];
			$business_type_id = $_GET['business_type_id'];
			$sub_business_type = $_GET['sub_business_type'];
		}else{
			$year_default = date('Y');
			$country_id = 0;
			$city_id = 0;
			$business_type_id = 0;
			$sub_business_type = "";
		}
		
		
		include '../views/dashboard_izin_prinsip_triwulan/list.php';
		
		get_footer();
	break;
	
	case 'form_result':
	
		if(isset($_GET['preview'])){
			
			extract($_POST);
			$year = (isset($_POST['i_year'])) ? $_POST['i_year'] : null;
			$country_id = (isset($_POST['i_country_id'])) ? $_POST['i_country_id'] : null;
			$city_id = (isset($_POST['i_city_id'])) ? $_POST['i_city_id'] : null;
			$business_type_id = (isset($_POST['i_business_type_id'])) ? $_POST['i_business_type_id'] : null;
			$sub_business_type = (isset($_POST['i_sub_business_type'])) ? $_POST['i_sub_business_type'] : null;
		}
		
		header("Location: dashboard_izin_prinsip_triwulan.php?page=list&preview=1&year=$year&country_id=$country_id&city_id=$city_id&business_type_id=$business_type_id&sub_business_type=$sub_business_type");
	break;
}

?>