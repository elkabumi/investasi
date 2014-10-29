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
		
		include '../views/dashboard_kinerja_investasi/list.php';
		
		get_footer();
	break;
}

?>