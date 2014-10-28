<?php

function get_config_dollar(){
	$query = mysql_query("SELECT config_dollar  from configs");
	$row = mysql_fetch_array($query);
	$result = $row['0'];
	return $result;
}

function get_data($category, $year){
	$query = mysql_query("select sum(investasi) as jumlah from master where master_sub_category_id = '$category' and master_year = '$year' and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	$result = $result / 1000000000000;
	return $result;
}

function get_data_dollar($category, $year){
	$query = mysql_query("select sum(investasi_dollar) as jumlah from master where master_sub_category_id = '$category' and master_year = '$year' and master_type_id = '2'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	
	$query_config = mysql_query("select config_dollar from configs");
	$row_config = mysql_fetch_object($query_config);
	
	$result = $result * $row_config->config_dollar;
	$result = $result / 1000000000000;
	return $result;
}

?>