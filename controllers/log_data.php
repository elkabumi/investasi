<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/log_data_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";

$_SESSION['menu_active'] = 4;
$title ='Log Data';
switch ($page) {
	case 'form':
		get_header();
		$action = 'log_data.php?page=form_action';
		
		$date_default = "";
		
		if(isset($_GET['preview'])){
			
				$date_default = $_GET['date'];
			
		}
		include '../views/log_data/form.php';
		
		
		if(isset($_GET['preview'])){

				$date = (isset($_GET['date'])) ? $_GET['date'] : null;
				
				$d = explode("-", $date);
				$d_awal = format_back_date($d[0]);
				$d_akhir = format_back_date($d[1]);
				
				$query = select($d_awal, $d_akhir);
						
				include '../views/log_data/list_result.php';
			
		}
		
		
		get_footer();
	break;
	
	case 'form_action':
		
		extract($_POST);
		
		$i_date = get_isset($i_date);
		$i_date = str_replace(" ", "", $i_date);
		
		header("Location: log_data.php?page=form&preview=1&date=".$i_date);
		
	break;
	
	}

?>