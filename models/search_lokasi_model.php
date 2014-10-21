<?php
function select_city($city_id){
	if($city_id != 0){
		$where = "WHERE city_id = $city_id";
	}else{
		$where = "";
	}
	$query=mysql_query("SELECT * from cities $where");
	
	return $query;
}
function jumlah($city_id,$i_bulan,$i_master_sub_category_id,$i_master_year){
	if($i_bulan != '0'){
		$bulan ="and DATE_FORMAT( master_date, '%m' ) = '$i_bulan'";
	}else{
		$bulan ="";
	}
	if($city_id != '0'){
		$city = "and city_id = '$city_id'";
	}else{
		$city = '';
	}
	$query =mysql_query("select count(*) as jumlah from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						and master_year = $i_master_year
						$bulan
						$city
						");

	$row=mysql_fetch_array($query);
	return $row['0'];
}
function jumlah_total($city_id,$i_triwulan,$i_master_sub_category_id,$i_master_year){
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
	if($city_id != '0'){
		$city = "and city_id = '$city_id'";
	}else{
		$city = '';
	}
	$query =mysql_query("select count(*) as jumlah from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						and master_year = $i_master_year
						$triwulan
						$city
						");

	$row=mysql_fetch_array($query);
	return $row['0'];
}
function investasi($city_id,$i_bulan,$i_master_sub_category_id,$i_master_year){
	if($i_master_sub_category_id == '1'){
		$sum='investasi_dollar';
	}else{
		$sum='investasi';
	}
	if($i_bulan != '0'){
		$bulan ="and DATE_FORMAT( master_date, '%m' ) = '$i_bulan'";
	}else{
		$bulan ="";
	}
	if($city_id != '0'){
		$city = "and city_id = '$city_id'";
	}else{
		$city = '';
	}
	$query =mysql_query("select sum($sum) as jumlah_investasi from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$bulan
						$city
						");

	$row=mysql_fetch_array($query);
	return $row['0'];
}
function investasi_total($city_id,$i_triwulan,$i_master_sub_category_id,$i_master_year){
	if($i_master_sub_category_id == '1'){
		$sum='investasi_dollar';
	}else{
		$sum='investasi';
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
	if($city_id != '0'){
		$city = "and city_id = '$city_id'";
	}else{
		$city = '';
	}
	$query =mysql_query("select sum($sum) as jumlah_investasi from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$triwulan
						$city
						");

	$row=mysql_fetch_array($query);
	return $row['0'];
}
function pekerja($city_id,$i_bulan,$i_master_sub_category_id,$i_master_year){
	if($i_bulan != '0'){
		$bulan ="and DATE_FORMAT( master_date, '%m' ) = '$i_bulan'";
	}else{
		$bulan ="";
	}
	if($city_id != '0'){
		$city = "and city_id = '$city_id'";
	}else{
		$city = '';
	}
	$query =mysql_query("select sum(tenaga_kerja) as pekerja from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$bulan
						$city
						");


	$row=mysql_fetch_array($query);
	return $row['0'];

}


function pekerja_total($city_id,$i_triwulan,$i_master_sub_category_id,$i_master_year){
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
	if($city_id != '0'){
		$city = "and city_id = '$city_id'";
	}else{
		$city = '';
	}
	$query =mysql_query("select sum(tenaga_kerja) as pekerja from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$triwulan
						$city
						");


	$row=mysql_fetch_array($query);
	return $row['0'];

}

function get_data_p_parent($business_parent_type_id, $month, $master_sub_category_id){

	$query = "select count(*) as jumlah from master a 
						join business_types b on b.business_type_id = a.business_type_id
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$master_sub_category_id'
						and b.business_parent_type_id = $business_parent_type_id
						and DATE_FORMAT( master_date, '%m' ) = $month
						";
	//$result = mysql_fetch_object($query);
	//return $result->jumlah;
	return $query;
	
}
?>