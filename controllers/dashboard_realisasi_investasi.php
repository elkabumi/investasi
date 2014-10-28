<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/dashboard_izin_prinsip_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$title = "Dashboard Izin Prinsip";

switch ($page) {
	case 'list':
		get_header();

		
		
		
		$add_button = "izin_prinsip.php?page=form";


		include '../views/dashboard_izin_prinsip/list.php';
		get_footer();
	break;
}

?>