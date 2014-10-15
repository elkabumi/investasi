<?php

function select_detail($i_master_category_id, $i_triwulan, $i_master_year){
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
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name
							from master a
							join business_types d on d.business_type_id = a.business_type_id
							LEFT join countries e on e.country_id = a.country_id
							LEFT join cities f on f.city_id = a.city_id
							where a.master_category_id = $i_master_category_id AND a.master_year = $i_master_year AND $where 
						");
	return $query;
}

function get_jumlah_data($i_master_category_id, $i_triwulan, $i_master_year){
	
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

	$query = mysql_query("select count(a.master_id) as jumlah
							from master a
							where a.master_category_id = $i_master_category_id AND a.master_year = $i_master_year AND $where 
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_jumlah_investasi($i_master_category_id, $i_triwulan, $i_master_year){
	
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

	$query = mysql_query("select sum(a.investasi) as jumlah
							from master a
							where a.master_category_id = $i_master_category_id AND a.master_year = $i_master_year AND $where 
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_jumlah_tenaga_kerja($i_master_category_id, $i_triwulan, $i_master_year){
	
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

	$query = mysql_query("select sum(a.tenaga_kerja) as jumlah
							from master a
							where a.master_category_id = $i_master_category_id AND a.master_year = $i_master_year AND $where 
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
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