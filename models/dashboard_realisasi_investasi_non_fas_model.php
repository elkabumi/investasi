<?php

function get_config_dollar(){
	$query = mysql_query("SELECT config_dollar  from configs");
	$row = mysql_fetch_array($query);
	$result = $row['0'];
	return $result;
}
function get_data($year){
	$query = mysql_query("select   sum(investasi) + sum(investasi_dollar * master_config_dollar) as jumlah from master where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	$result = $result / 1000000000000;
	return $result;
}


function get_data_unit_usaha($year){
	
	$query = mysql_query("select count(master_id) as jumlah from master where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}


function get_data_dollar($year){
	$query = mysql_query("select   sum(investasi) + sum(investasi_dollar * master_config_dollar) as jumlah
							from master  where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	
	$result = $result / 1000000000000;
	return $result;
}

function get_data_pekerja( $year){

	$query = mysql_query("select SUM(tenaga_kerja) as jumlah from master   where master_sub_category_id = '3' and master_year = '$year' and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}

function get_data_total_unit_usaha($year, $year2){
	$where = "AND master_year BETWEEN $year  AND $year2";
	$query = mysql_query("select count(master_id) as jumlah from master where master_sub_category_id = '3' ".$where." and master_year = '$year' and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}

function get_data_total_dollar($year, $year2){
	
	$where = "AND master_year BETWEEN $year  AND $year2";
	$query = mysql_query("select   sum(investasi) + sum(investasi_dollar * master_config_dollar) as jumlah
							from master  where master_sub_category_id = '3'".$where." and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	
	$result = $result / 1000000000000;
	return $result;
}
function get_data_total_pekerja($year, $year2){

	$where = "AND master_year BETWEEN $year  AND $year2";
	$query = mysql_query("select SUM(tenaga_kerja) as jumlah from master   where master_sub_category_id = '3'".$where."  and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}
?>