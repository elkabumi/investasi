<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/user_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("home");

//$_SESSION['menu_active'] = 6;

switch ($page) {
	case 'list':
		get_header();
		include '../views/home/list.php';
		get_footer();
	break;
	
}

?>