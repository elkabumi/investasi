<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/owner_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Suplier");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "owner.php?page=form";


		include '../views/owner/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "owner.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){
			$row = read_id($id);
			$action = "owner.php?page=edit&id=$id";
		} else{
			//inisialisasi
			$row = new stdClass();
			$row->owner_name = false;
			$row->owner_phone = false;
			$row->owner_address = false;
			$row->owner_description = false;
			$row->transport_service = false;
			$row->toll_subsidy = false;
			$row->land_price = false;
			$row->owner_type_id = false;

			$action = "owner.php?page=save";
		}

		include '../views/owner/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_owner_name = get_isset($i_owner_name);
		$i_owner_phone = get_isset($i_owner_phone);
		$i_owner_address = get_isset($i_owner_address);
		$i_owner_description = get_isset($i_owner_description);
		$i_transport_service = get_isset($i_transport_service);
		$i_toll_subsidy = get_isset($i_toll_subsidy);
		$i_land_price = get_isset($i_land_price);
		$i_owner_type_id = get_isset($i_owner_type_id);


		$data = "'','$i_owner_name', '$i_owner_phone', '$i_owner_address', '$i_owner_description','$i_transport_service','$i_toll_subsidy','$i_land_price', '$i_owner_type_id'";

		create($data);

		header('Location: owner.php?page=list&did=1');

	break;

	case 'edit':
		
		$id = get_isset($_GET['id']);	
		
		extract($_POST);

		$i_owner_name = get_isset($i_owner_name);
		$i_owner_phone = get_isset($i_owner_phone);
		$i_owner_address = get_isset($i_owner_address);
		$i_owner_description = get_isset($i_owner_description);
		$i_transport_service = get_isset($i_transport_service);
		$i_toll_subsidy = get_isset($i_toll_subsidy);
		$i_land_price = get_isset($i_land_price);
		$i_owner_type_id = get_isset($i_owner_type_id);


		$data = " owner_name = '$i_owner_name',
				owner_phone = '$i_owner_phone', 
				owner_address = '$i_owner_address', 
				owner_description = '$i_owner_description',
				transport_service = $i_transport_service,
				toll_subsidy = $i_toll_subsidy,
				land_price = $i_land_price,
				owner_type_id = $i_owner_type_id
				";

		update($data, $id);

		header('Location: owner.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: owner.php?page=list&did=3');

	break;
}

?>