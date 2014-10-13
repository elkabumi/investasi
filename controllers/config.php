<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/config_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("harga");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		$query = select();
		$add_button = "config.php?page=form";

		include '../views/config/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "config.php?page=list";

			$row = read_id();
			$action = "config.php?page=edit";

		include '../views/config/form.php';
		get_footer();
	break;

	case 'edit':
		

		extract($_POST);

		$i_transport_service = get_isset($i_transport_service);
		$i_toll_subsidy = get_isset($i_toll_subsidy);
		$i_land_price = get_isset($i_land_price);

		$data = " transport_service = '$i_transport_service',
				toll_subsidy = '$i_toll_subsidy', 
				land_price = '$i_land_price'";

		update($data, $id);

		header('Location: config.php?page=form&did=2');

	break;
}

?>