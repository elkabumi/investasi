<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/truck_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("truck");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "truck.php?page=form&type=1";


		include '../views/truck/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		if($type == 1){
			$close_button = "truck.php?page=list";
		}else{
			$close_button = "transaction.php?page=list";
		}
		
		if($id){
			$row = read_id($id);
			$action = "truck.php?page=edit&id=$id";
		} else{
			//inisialisasi
			$row = new stdClass();
			$row->truck_nopol = false;
			$row->truck_p = false;
			$row->truck_l = false;
			$row->truck_t = false;
			$row->truck_volume = false;
			$row->owner_id = false;
			$row->truck_description = false;
			$row->truck_code = false;

			$action = "truck.php?page=save&type=$type";
		}

		include '../views/truck/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);
		$i_truck_nopol = get_isset($i_truck_nopol);
		$i_truck_nopol = trim($i_truck_nopol);
		
		$i_truck_code = get_isset($i_truck_code);
		$i_truck_code = trim($i_truck_code);
		
		$get_nopol = cek_nopol($i_truck_nopol);
		$get_code = cek_code($i_truck_code);
		if($get_nopol > 0){ 
			header('Location: truck.php?page=form&did=1');
		}
		/*if($get_code > 0){
			header('Location: truck.php?page=form&did=2');
		}*/
		
		else{
			
		$i_truck_p = get_isset($i_truck_p);
		$i_truck_l = get_isset($i_truck_l);
		$i_truck_t = get_isset($i_truck_t);
		$i_truck_volume = $i_truck_p * $i_truck_l * $i_truck_t;
		$i_owner_id = get_isset($i_owner_id);
		$i_truck_description = get_isset($i_truck_description);
		
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;

		$data = "'', '$i_truck_code', '$i_truck_nopol', '$i_truck_p', '$i_truck_l', '$i_truck_t', '$i_truck_volume', '$i_owner_id', '$i_truck_description'";
		create($data);
		if($type == 1){
			header('Location: truck.php?page=list&did=1');
		}else{
			header('Location: transaction.php?page=list&did=2');
		}
		}

	break;

	
	case 'edit':
		
		$id = get_isset($_GET['id']);	
		
		extract($_POST);

		$i_truck_code = get_isset($i_truck_code);
		$i_truck_nopol = get_isset($i_truck_nopol);
		$i_truck_p = get_isset($i_truck_p);
		$i_truck_l = get_isset($i_truck_l);
		$i_truck_t = get_isset($i_truck_t);
		$i_truck_volume = $i_truck_p * $i_truck_l * $i_truck_t;
		$i_owner_id = get_isset($i_owner_id);
		$i_truck_description = get_isset($i_truck_description);


		$data = " truck_code = '$i_truck_code',
				truck_nopol = '$i_truck_nopol',
				truck_p = '$i_truck_p', 
				truck_l = '$i_truck_l', 
				truck_t = '$i_truck_t', 
				truck_volume = '$i_truck_volume', 
				owner_id = '$i_owner_id', 
				truck_description = '$i_truck_description'";

		update($data, $id);

		header('Location: truck.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: truck.php?page=list&did=3');

	break;
}

?>