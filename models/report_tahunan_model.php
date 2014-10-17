<?php

function select_detail($i_master_category_id, $i_master_year1, $i_master_year2){
	if($i_master_category_id != 0){
		$category = " AND a.master_category_id = $i_master_category_id";
	}else{
		$category = "";
	}
	
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name, g.master_category_name, h.master_ip_type_name
							from master a
							join business_types d on d.business_type_id = a.business_type_id
							LEFT join countries e on e.country_id = a.country_id
							LEFT join cities f on f.city_id = a.city_id
							join master_categories g on g.master_category_id = a.master_category_id
							left join master_ip_types h on h.master_ip_type_id = a.master_ip_type_id
							where  a.master_year >= $i_master_year1 and a.master_year <= $i_master_year2 $category  
						");
	return $query;
}

function get_jumlah_data($i_master_category_id, $i_master_year1, $i_master_year2){
	if($i_master_category_id != 0){
		$category = " AND a.master_category_id = $i_master_category_id";
	}else{
		$category = "";
	}
	

	$query = mysql_query("select count(a.master_id) as jumlah
							from master a
							where  a.master_year >= $i_master_year1 and a.master_year <= $i_master_year2 $category  
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_jumlah_investasi($i_master_category_id, $i_master_year1, $i_master_year2){
	if($i_master_category_id != 0){
		$category = " AND a.master_category_id = $i_master_category_id";
	}else{
		$category = "";
	}
	
	
	$query = mysql_query("select sum(a.investasi) as jumlah
							from master a
							where  a.master_year >= $i_master_year1 and a.master_year <= $i_master_year2 $category  
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_jumlah_tenaga_kerja($i_master_category_id, $i_master_year1, $i_master_year2){
	if($i_master_category_id != 0){
		$category = " AND a.master_category_id = $i_master_category_id";
	}else{
		$category = "";
	}
	
	$query = mysql_query("select sum(a.tenaga_kerja) as jumlah
							from master a
							where  a.master_year >= $i_master_year1 and a.master_year <= $i_master_year2 $category  
						");
	$result = mysql_fetch_object($query);
	
	$hasil = ($result->jumlah) ? $result->jumlah : 0 ;
	
	return $hasil;
	
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