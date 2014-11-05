<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/config_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";
$title = ucfirst("harga");

$_SESSION['menu_active'] = 8;

switch ($page) {
	
	
	case 'form':
		get_header();
		log_data(1, 0, $_SESSION['user_id'], "config");

		$close_button = "config.php?page=list";

			$row = read_id();
			$action = "config.php?page=edit";

		include '../views/config/form.php';
		get_footer();
	break;

	case 'edit':
		

		extract($_POST);

		$i_config_dollar = get_isset($i_config_dollar);
		
		
		$data = "config_dollar = '$i_config_dollar'";

		update($data);
		log_data(3, 0, $_SESSION['user_id'], "config");

		header('Location: config.php?page=form&did=2');

	break;
}

?>