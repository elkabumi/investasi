<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/realisasi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";

$_SESSION['menu_active'] = 1;
$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : 1;
		if($master_category_id == 1){
			$title = "PMA";
		}else if($master_category_id == 2){
			$title = "PMDN";
		}else if($master_category_id == 3){
				$title = "Non Fas";
		}else if($master_category_id == 4){
				$title = "IU";
		}else if($master_category_id == 5){
				$title = "Ekspor";
		}
switch ($page) {
	case 'form':
		get_header();
		$action = '';
		include '../views/search/form.php';
		get_footer();
	break;
}

?>