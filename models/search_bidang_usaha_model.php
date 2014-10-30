<?php

function select_detail($i_master_sub_category_id, $i_triwulan, $i_master_year){
	if($i_master_sub_category_id != 0){
		$category = " AND a.master_sub_category_id = $i_master_sub_category_id";
	}else{
		$category = "";
	}
	if($i_triwulan == '1'){
		$triwulan = "AND DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$triwulan = "AND DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name, g.master_category_name, h.master_ip_type_name
							from master a
							join business_types d on d.business_type_id = a.business_type_id
							LEFT join countries e on e.country_id = a.country_id
							LEFT join cities f on f.city_id = a.city_id
							join master_categories g on g.master_category_id = a.master_category_id
							left join master_ip_types h on h.master_ip_type_id = a.master_ip_type_id
							where master_type_id = '1' and master_category_id = '6' a.master_year = $i_master_year $category 
						");
	return $query;
}

function select_bu($business_parent_type_id){
	$query = mysql_query("select * from business_types where business_parent_type_id = '$business_parent_type_id'
						");
	return $query;
}

function get_data_p_parent($business_parent_type_id, $month, $master_sub_category_id, $i_master_year){

	$query = mysql_query("select count(*) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_investasi_parent($business_parent_type_id, $month, $master_sub_category_id, $i_master_year){
	if($master_sub_category_id == 1){
		$query = mysql_query("select sum(investasi_dollar) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	}else{
		$query = mysql_query("select sum(investasi) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	}
	
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_tk_parent($business_parent_type_id, $month, $master_sub_category_id, $i_master_year){

	$query = mysql_query("select sum(tenaga_kerja) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_p($business_type_id, $month, $master_sub_category_id, $i_master_year){

	$query = mysql_query("select count(*) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_investasi($business_type_id, $month, $master_sub_category_id, $i_master_year){

	if($master_sub_category_id == 1){
		$query = mysql_query("select sum(investasi_dollar) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	}else{
		$query = mysql_query("select sum(investasi) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	}
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_tk($business_type_id, $month, $master_sub_category_id, $i_master_year){

	$query = mysql_query("select  sum(tenaga_kerja) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_p_triwulan_parent($business_parent_type_id, $i_triwulan, $master_sub_category_id, $i_master_year){
	
	if($i_triwulan == '1'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	$query = mysql_query("select count(*) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and $where
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_investasi_triwulan_parent($business_parent_type_id, $i_triwulan, $master_sub_category_id, $i_master_year){
	
	if($i_triwulan == '1'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	if($master_sub_category_id == 1){
		$query = mysql_query("select sum(investasi_dollar) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and $where
						");
	}else{
		$query = mysql_query("select sum(investasi) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and $where
						");
	}
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_tk_triwulan_parent($business_parent_type_id, $i_triwulan, $master_sub_category_id, $i_master_year){
	
	if($i_triwulan == '1'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	$query = mysql_query("select sum(tenaga_kerja) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and $where
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_p_triwulan($business_type_id, $i_triwulan, $master_sub_category_id, $i_master_year){
	
	if($i_triwulan == '1'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	$query = mysql_query("select count(*) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and $where
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_investasi_triwulan($business_type_id, $i_triwulan, $master_sub_category_id, $i_master_year){
	
	if($i_triwulan == '1'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	if($master_sub_category_id == 1){
		$query = mysql_query("select sum(investasi_dollar) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and $where
						");
	}else{
		$query = mysql_query("select sum(investasi) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and $where
						");
	}
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}

function get_data_tk_triwulan($business_type_id, $i_triwulan, $master_sub_category_id, $i_master_year){
	
	if($i_triwulan == '1'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	$query = mysql_query("select sum(tenaga_kerja) as jumlah from master a 
						where master_type_id = 1
						and master_category_id = 6
						and master_year = '$i_master_year'
						and master_sub_category_id = '$master_sub_category_id'
						and a.business_type_id = $business_type_id
						and $where
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	//return $query;
	
}


?>