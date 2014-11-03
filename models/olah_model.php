<?php

function select($category_id,$country_id,$city_id,$busines_id,$tenaga1,$tenaga2,$investasi1,$investasi2){
if($category_id != '0'){
	 if($category_id < 6){
		 $category = " AND a.master_type_id = '2' and a.master_sub_category_id = $category_id";
	 }else{
	 	$category = ' AND a.master_category_id = '.$category_id.' and a.master_type_id = 1';
	 }
}else{
	 $category='';
}
if($country_id != '0'){
	 $country = ' AND a.country_id ='.$country_id.'';
}else{
	 $country='';
}
if($city_id != '0'){
	 $city = ' AND a.city_id ='.$city_id.'';
}else{
	 $city='';
}
if($busines_id != '0'){
	 $busines = ' AND a.business_type_id ='.$busines_id.'';
}else{
	 $busines ='';
}
if($tenaga1 != '' && $tenaga2 != ''){
	$tenaga = 'AND a.tenaga_kerja  BETWEEN '.$tenaga1.' AND '.$tenaga2.'';

}else{
	$tenaga = '';
}
if($investasi1 != '' && $investasi2 != ''){
	$investasi = 'AND a.investasi  BETWEEN '.$investasi1.' AND '.$investasi2.'';

}else{
	$investasi = '';
}
$where = "WHERE master_id <> '0'   $category  $country  $city  $busines  $tenaga  $investasi ";

$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name, g.master_category_name, h.master_ip_type_name, i.master_category_name as master_sub_category_name
						from master a
						join business_types d on d.business_type_id = a.business_type_id
						join master_categories g on g.master_category_id = a.master_category_id
						left join master_ip_types h on h.master_ip_type_id = a.master_ip_type_id
						LEFT join countries e on e.country_id = a.country_id
						LEFT join cities f on f.city_id = a.city_id
						LEFT join master_categories i on i.master_category_id = a.master_sub_category_id
						$where
					
						");
	return $query;
}


function get_master_category($i_master_category_id){

	$query = mysql_query("select master_category_name from master_categories where master_category_id = '$i_master_category_id'
						");
	$result = mysql_fetch_object($query);
	
	if($i_master_category_id < 6){
		$hasil = "Realisasi ".$result->master_category_name;
	}else{
		$hasil = $result->master_category_name;
	}
	return $hasil;
	
}



?>