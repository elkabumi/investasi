<?php

function get_config_dollar(){
	$query = mysql_query("SELECT config_dollar  from configs");
	$row = mysql_fetch_array($query);
	$result = $row['0'];
	return $result;
}
function get_data($year){
	$query = mysql_query("select sum(investasi) as jumlah from master where master_sub_category_id = '2' and master_year = '$year' and master_type_id = '1' AND master_category_id ='6'");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	$result = $result / 1000000000000;
	return $result;
}
function get_data_dollar($year){

	
	$query = mysql_query("select * from master where master_sub_category_id = '1' and master_year = '$year' and master_type_id = '1' AND master_category_id ='6'");
		$total ='0';
		$total_data ='0';
		while($row = mysql_fetch_array($query)){
		
		$row['investasi_dollar'] 			=($row['investasi_dollar']) ? $row['investasi_dollar'] : 0;
		$row['master_config_dollar']	 	=($row['master_config_dollar']) ? $row['master_config_dollar'] : 0;
		$total = $row['investasi_dollar'] * $row['master_config_dollar'];
		$total_data = $total + $total_data;
	}
	$result = $total_data / 1000000000000;;
	return $result;
}


function get_data_total($year){
	$query = mysql_query("SELECT * from master 
							 WHERE 
						 (master_sub_category_id = '1' OR master_sub_category_id = '2') 
						 AND master_year = '$year' AND master_type_id = '1' AND master_category_id ='6'");
	
	$total			='0';
	$total_dollar	='0';
	$total_data		='0';
	
	while($row = mysql_fetch_array($query)){
	
		$jumlah = ($row['investasi']) ? $row['investasi'] : 0;
		$row['investasi_dollar'] 		= ($row['investasi_dollar']) ? $row['investasi_dollar'] : 0;
		$row['master_config_dollar']	= ($row['master_config_dollar']) ? $row['master_config_dollar'] : 0;
		$jumlah_dollar = $row['investasi_dollar']  *  $row['master_config_dollar'];
		
		$total =	$jumlah + $total ;
		$total_dollar = $jumlah_dollar + $total_dollar;
		$total_data = $total_data + ($jumlah + $jumlah_dollar);
	}

	
	$result = $total_data / 1000000000000;
	return $result;
}

?>