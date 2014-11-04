<?php

function get_config_dollar(){
	$query = mysql_query("SELECT config_dollar  from configs");
	$row = mysql_fetch_array($query);
	$result = $row['0'];
	return $result;
}
function get_data($year,$country_id,$city_id,$business_id,$sub_business_id){
	if($country_id == '0'){
		$country ='';
	}else{
		$country = "AND country_id ='$country_id'";
	}
	
	if($city_id == '0'){
		$city ='';
	}else{
		$city = "AND city_id ='$city_id'";
	}
	
	if($business_id == '0'){
		$business ='';
	}else{
		$business = "AND business_type_id ='$business_id'";
	}
	if($sub_business_id == ''){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("select   sum(investasi) + sum(investasi_dollar * master_config_dollar) as jumlah from master where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'".$country."
											".$city."
											".$business."
											".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	$result = $result / 1000000000000;
	return $result;
}


function get_data_unit_usaha($year,$country_id,$city_id,$business_id,$sub_business_id){
	if($country_id == '0'){
		$country ='';
	}else{
		$country = "AND country_id ='$country_id'";
	}
	
	if($city_id == '0'){
		$city ='';
	}else{
		$city = "AND city_id ='$city_id'";
	}
	
	if($business_id == '0'){
		$business ='';
	}else{
		$business = "AND business_type_id ='$business_id'";
	}
	if($sub_business_id == ''){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("select count(master_id) as jumlah from master where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'".$country."
											".$city."
											".$business."
											".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}


function get_data_dollar($year,$country_id,$city_id,$business_id,$sub_business_id){
	if($country_id == '0'){
		$country ='';
	}else{
		$country = "AND country_id ='$country_id'";
	}
	
	if($city_id == '0'){
		$city ='';
	}else{
		$city = "AND city_id ='$city_id'";
	}
	
	if($business_id == '0'){
		$business ='';
	}else{
		$business = "AND business_type_id ='$business_id'";
	}
	if($sub_business_id == ''){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("select   sum(investasi) + sum(investasi_dollar * master_config_dollar) as jumlah
							from master  where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'".$country."
											".$city."
											".$business."
											".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	
	$result = $result / 1000000000000;
	return $result;
}

function get_data_pekerja( $year,$country_id,$city_id,$business_id,$sub_business_id){
	
	if($country_id == '0'){
		$country ='';
	}else{
		$country = "AND country_id ='$country_id'";
	}
	
	if($city_id == '0'){
		$city ='';
	}else{
		$city = "AND city_id ='$city_id'";
	}
	
	if($business_id == '0'){
		$business ='';
	}else{
		$business = "AND business_type_id ='$business_id'";
	}
	if($sub_business_id == ''){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("select SUM(tenaga_kerja) as jumlah from master   where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'".$country."
											".$city."
											".$business."
											".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}

function get_data_total_unit_usaha($year, $year2,$country_id,$city_id,$business_id,$sub_business_id){
	if($country_id == '0'){
		$country ='';
	}else{
		$country = "AND country_id ='$country_id'";
	}
	
	if($city_id == '0'){
		$city ='';
	}else{
		$city = "AND city_id ='$city_id'";
	}
	
	if($business_id == '0'){
		$business ='';
	}else{
		$business = "AND business_type_id ='$business_id'";
	}
	if($sub_business_id == ''){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$where = "AND master_year BETWEEN $year  AND $year2";
	$query = mysql_query("select count(master_id) as jumlah from master where master_sub_category_id = '3' ".$where." and master_type_id = '2'".$country."
											".$city."
											".$business."
											".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}

function get_data_total_dollar($year, $year2,$country_id,$city_id,$business_id,$sub_business_id){
	if($country_id == '0'){
		$country ='';
	}else{
		$country = "AND country_id ='$country_id'";
	}
	
	if($city_id == '0'){
		$city ='';
	}else{
		$city = "AND city_id ='$city_id'";
	}
	
	if($business_id == '0'){
		$business ='';
	}else{
		$business = "AND business_type_id ='$business_id'";
	}
	if($sub_business_id == ''){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$where = "AND master_year BETWEEN $year  AND $year2";
	$query = mysql_query("select   sum(investasi) + sum(investasi_dollar * master_config_dollar) as jumlah
							from master  where master_sub_category_id = '3'".$where." and master_type_id = '2'".$country."
											".$city."
											".$business."
											".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	
	$result = $result / 1000000000000;
	return $result;
}
function get_data_total_pekerja($year, $year2,$country_id,$city_id,$business_id,$sub_business_id){
	if($country_id == '0'){
		$country ='';
	}else{
		$country = "AND country_id ='$country_id'";
	}
	
	if($city_id == '0'){
		$city ='';
	}else{
		$city = "AND city_id ='$city_id'";
	}
	
	if($business_id == '0'){
		$business ='';
	}else{
		$business = "AND business_type_id ='$business_id'";
	}
	if($sub_business_id == ''){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$where = "AND master_year BETWEEN $year  AND $year2";
	$query = mysql_query("select SUM(tenaga_kerja) as jumlah from master   where master_sub_category_id = '3'".$where."  and master_type_id = '2'".$country."
											".$city."
											".$business."
											".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}
?>