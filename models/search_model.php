<?php

function select($category,$country,$triwulan,$year){
	if($country != ''){
		$where_country = 'AND a.country_id = '.$country.'';
	}else{
		$where_country ='';
	}
	if($triwulan == '1'){
		$where = "DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($triwulan == '2'){
		$where = "DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($triwulan == '3'){
		$where = "DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($triwulan == '4'){
		$where = "DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name
						from master a
						join business_types d on d.business_type_id = a.business_type_id
						LEFT join countries e on e.country_id = a.country_id
						LEFT join cities f on f.city_id = a.city_id
						where a.master_category_id = $category AND a.master_type_id = '2' AND master_year='$year' AND $where  $where_country 
						
						");
	return $query;
}




?>