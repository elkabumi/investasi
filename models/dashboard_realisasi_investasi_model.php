<?php

function get_data($category, $year, $country_id, $city_id, $business_type_id, $sub_business_type){
	
	$parameter = "";
	if($country_id){ $parameter .= " and country_id = '$country_id'"; }
	if($city_id){ $parameter .= " and city_id = '$city_id'"; }
	if($business_type_id){ $parameter .= " and business_type_id = '$business_type_id'"; }
	if($sub_business_type){ $parameter .= " and business_sub_type_id like '%$sub_business_type%'"; }

	$query = mysql_query("select sum(investasi) as jumlah from master where master_sub_category_id = '$category' and master_year = '$year' and master_type_id = '2' $parameter");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	$result = $result / 1000000000000;
	return $result;
}

function get_data_dollar($category, $year, $country_id, $city_id, $business_type_id, $sub_business_type){
	
	$parameter = "";
	if($country_id){ $parameter .= " and country_id = '$country_id'"; }
	if($city_id){ $parameter .= " and city_id = '$city_id'"; }
	if($business_type_id){ $parameter .= " and business_type_id = '$business_type_id'"; }
	if($sub_business_type){ $parameter .= " and business_sub_type_id like '%$sub_business_type%'"; }
	
	$query = mysql_query("select sum(investasi_dollar * master_config_dollar) as jumlah from master where master_sub_category_id = '$category' and master_year = '$year' and master_type_id = '2' $parameter");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	
	$result = $result / 1000000000000;
	return $result;
}

function get_data_total($year, $country_id, $city_id, $business_type_id, $sub_business_type){
	
	$parameter = "";
	if($country_id){ $parameter .= " and country_id = '$country_id'"; }
	if($city_id){ $parameter .= " and city_id = '$city_id'"; }
	if($business_type_id){ $parameter .= " and business_type_id = '$business_type_id'"; }
	if($sub_business_type){ $parameter .= " and business_sub_type_id like '%$sub_business_type%'"; }
	
	$query = mysql_query("select sum(investasi) as jumlah, sum(investasi_dollar * master_config_dollar) as jumlah_dollar from master where (master_sub_category_id = '1' or master_sub_category_id = '2' or master_sub_category_id = '3') and master_year = '$year' and master_type_id = '2' $parameter");
	$row = mysql_fetch_array($query);
	
	$jumlah = ($row['jumlah']) ? $row['jumlah'] : 0;
	$jumlah_dollar = ($row['jumlah_dollar']) ? $row['jumlah_dollar'] : 0;
	
	$result = $jumlah + $jumlah_dollar;
	$result = $result / 1000000000000;
	return $result;
}

?>