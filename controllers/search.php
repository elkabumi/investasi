<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/search_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "form";

$_SESSION['menu_active'] = 1;
$title ='Search';
switch ($page) {
	case 'form':
		get_header();
		$action = 'search.php?page=form_action';
		include '../views/search/form.php';
		
		if(isset($_GET['preview'])){
				
			
			$category = (isset($_GET['category'])) ? $_GET['category'] : null;
			$country = (isset($_GET['country'])) ? $_GET['country'] : null;
		
			$triwulan = (isset($_GET['triwulan'])) ? $_GET['triwulan'] : null;
			$year = (isset($_GET['year'])) ? $_GET['year'] : null;
			
		

						
			
			$query = select($category, $country,$triwulan,$year);
			
			include '../views/search/list_result.php';

		}
		
		
		get_footer();
	break;
	
	case 'form_action':
		
		extract($_POST);
		
		$i_master_category_id = get_isset($i_master_category_id);
		$i_country_id = get_isset($i_country_id);
		$i_date = get_isset($i_date);
		$i_triwulan = get_isset($i_triwulan);
		$i_master_year = get_isset($i_master_year);
		
		
		
		
		header("Location: search.php?page=form&preview=1&category=".$i_master_category_id."&country=".$i_country_id."&triwulan=".$i_triwulan."&year=".$i_master_year."");
	
	break;
	}

?>