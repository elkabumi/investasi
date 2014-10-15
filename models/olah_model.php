<?php

function select($category_id,$country_id,$city_id,$busines_id,$tenaga1,$tenaga2,$investasi1,$investasi2){
if($category_id != '0'){
	 $category = 'AND a.master_category_id = '.$category_id.'';
}else{
	 $category='';
}
if($country_id != '0'){
	 $country = 'a.country_id ='.$country_id.'';
}else{
	 $country='';
}
if($city_id != '0'){
	 $city = 'a.city_id ='.$city_id.'';
}else{
	 $city='';
}
if($busines_id != '0'){
	 $busines = 'a.business_type_id ='.$busines_id.'';
}else{
	 $busines ='';
}
if($tenaga1 != '' AND $tenaga2 != ''){
	$tenaga = 'AND a.tenaga_kerja  BETWEEN '.$tenaga1.' AND '.$tenaga2.'';

}else{
	$tenaga = '';
}
if($investasi1 != '' AND $investasi2 != ''){
	$investasi = 'AND a.investasi  BETWEEN '.$investasi1.' AND '.$investasi2.'';

}else{
	$investasi = '';
}
$where = "WHERE master_id <> '0'   $category  $country  $city  $busines  $tenaga  $investasi ";

$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name
						from master a
						join business_types d on d.business_type_id = a.business_type_id
						LEFT join countries e on e.country_id = a.country_id
						LEFT join cities f on f.city_id = a.city_id
						$where
						
						
						");
	return $query;
}




?>