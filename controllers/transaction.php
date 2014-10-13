<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/transaction_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Transaksi");

$_SESSION['menu_active'] = 0;

if(function_exists('date_default_timezone_set'))
date_default_timezone_set('Asia/Jakarta');

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
	
		$add_truck  = "truck.php?page=form&type=2";
		$close  = "edit_transaction.php?page=list";
		
			
		
			$add_button = "transaction.php?page=form";
			
		
		include '../views/transaction/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "transaction.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
			$row = read_id($id);
			
		

		
		
		
			$action = "transaction.php?page=save";
			include '../views/transaction/form.php';
		
		get_footer();
	break;

	case 'save':

		extract($_POST);
		
		$get_data_config = get_data_config($i_id);
		
		$date_time = date('Y-m-d h:i:s');
		$user_id = $_SESSION['user_id'];
		$i_volume = $i_p * $i_l * $i_t;
		$hpp = $i_volume * $get_data_config['transport_service'];
		$total_hpp = $hpp + $get_data_config['toll_subsidy'] + $get_data_config['land_price'];
		
		
		
		$data = "'','$i_id', '$i_nopol', '$i_volume', '$date_time','$user_id','$i_description', '".$get_data_config['transport_service']."', '".$get_data_config['toll_subsidy']."', '".$get_data_config['land_price']."', '$total_hpp',
		'$i_hour', '$i_p', '$i_l', '$i_t','$i_sopir'
		";
		
		
		create($data);

		header('Location: transaction.php?page=list&did=1');

	break;
}

?>