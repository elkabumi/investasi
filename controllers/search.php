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
		$action1 = 'search.php?page=form_action1';
		$action2 = 'search.php?page=form_action2';
		if(isset($_GET['preview'])){
			if($_GET['preview'] == '1'){
				 $type = 1;
			}else if($_GET['preview'] == '2'){
				 $type = 2;
			}
		}else{
			$type =1;
		}
		include '../views/search/form.php';
		
		if(isset($_GET['preview'])){
				
			if($_GET['preview'] == '2'){
				$type = 2;
				$category = (isset($_GET['category'])) ? $_GET['category'] : null;
				$country = (isset($_GET['country'])) ? $_GET['country'] : null;
			
				$triwulan = (isset($_GET['triwulan'])) ? $_GET['triwulan'] : null;
				$year = (isset($_GET['year'])) ? $_GET['year'] : null;
				
			
	
							
				
				$query = select2($category, $country,$triwulan,$year);
				
				include '../views/search/list_result.php';

			}else if($_GET['preview'] == '1'){
				 $type = 1;
				if(isset($_GET['date'])){
					$i_date = $_GET['date'];
				}else{
					extract($_POST);
					$i_date = get_isset($i_date);
				}
				$i_date = str_replace(" ","", $i_date);
				
				$date = explode("-", $i_date);
			
				$category = (isset($_GET['category'])) ? $_GET['category'] : null;
				$country = (isset($_GET['country'])) ? $_GET['country'] : null;
				$date1 = format_back_date($date[0]);
				$date2 = format_back_date($date[1]);
				
				
				$query = select1($category,$country,$date1,$date2);
		
						
				include '../views/search/list_result.php';
			
				
			}
		}
		
		
		get_footer();
	break;
	
	case 'form_action1':
		
		extract($_POST);
		
		$i_master_category_id = get_isset($i_master_category_id);
		$i_country_id = get_isset($i_country_id);
		$i_date = (isset($_POST['i_date'])) ? $_POST['i_date'] : null;
		$date_default = $i_date;
		$date_url = "&date=".str_replace(" ","", $i_date);
	
		
		
		header("Location: search.php?page=form&preview=1&category=".$i_master_category_id."&country=".$i_country_id."&date=".$date_default."");
	
	break;
	
	case 'form_action2':
		
		extract($_POST);
		
		$i_master_category_id = get_isset($i_master_category_id);
		$i_country_id = get_isset($i_country_id);
	
		$i_triwulan = get_isset($i_triwulan);
		$i_master_year = get_isset($i_master_year);
		
		
		
		
		header("Location: search.php?page=form&preview=2&category=".$i_master_category_id."&country=".$i_country_id."&triwulan=".$i_triwulan."&year=".$i_master_year."");
	
	break;
	}

?>