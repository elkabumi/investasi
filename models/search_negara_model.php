<?php
function select_country($country_id){
	if($country_id != 0){
		$where = "WHERE country_id = $country_id";
	}else{
		$where = "";
	}
	$query=mysql_query("SELECT * from countries $where");
	
	return $query;
}
function jumlah($country_id,$i_bulan,$i_master_sub_category_id,$i_master_year){
	if($i_bulan != '0'){
		$bulan ="and DATE_FORMAT( master_date, '%m' ) = $i_bulan";
	}else{
		$bulan ="";
	}
	if($country_id != '0'){
		$country = "and country_id = '$country_id'";
	}else{
		$country = '';
	}
	$query =mysql_query("select count(*) as jumlah from master
							where master_type_id = 1
							and master_category_id = 6
							and master_sub_category_id = '$i_master_sub_category_id'
							and master_year = $i_master_year
							$bulan
							$country
						");
	

	$row=mysql_fetch_array($query);
	return $row['0'];
	
}

function jumlah_total($country_id,$i_triwulan,$i_master_sub_category_id,$i_master_year){
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
	if($country_id != '0'){
		$country = "and country_id = '$country_id'";
	}else{
		$country = '';
	}
	$query =mysql_query("select count(*) as jumlah from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						and master_year = $i_master_year
						$triwulan
						$country
						");

	$row=mysql_fetch_array($query);
	return $row['0'];
}
function investasi($country_id,$i_bulan,$i_master_sub_category_id,$i_master_year){
	if($i_master_sub_category_id == '1'){
		$sum='investasi_dollar';
	}else{
		$sum='investasi';
	}
	if($i_bulan != '0'){
		$bulan ="and DATE_FORMAT( master_date, '%m' ) = $i_bulan";
	}else{
		$bulan ="";
	}
	if($country_id != '0'){
		$country = "and country_id = $country_id";
	}else{
		$country = '';
	}
	$query =mysql_query("select sum($sum) as jumlah_investasi from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$bulan
						$country
						");

	$row=mysql_fetch_array($query);
	return $row['0'];
}

function investasi_total($country_id,$i_triwulan,$i_master_sub_category_id,$i_master_year){
	if($i_master_sub_category_id == '1'){
		$sum='investasi_dollar';
	}else{
		$sum='investasi';
	}
	if($i_triwulan == '1'){
		$triwulan =  " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	if($country_id != '0'){
		$country = "and country_id = '$country_id'";
	}else{
		$country = '';
	}
	$query =mysql_query("select sum($sum) as jumlah_investasi from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$triwulan
						$country
						");

	$row=mysql_fetch_array($query);
	return $row['0'];
}
function pekerja($country_id,$i_bulan,$i_master_sub_category_id,$i_master_year){
	if($i_bulan != '0'){
		$bulan ="and DATE_FORMAT( master_date, '%m' ) = $i_bulan";
	}else{
		$bulan ="";
	}
	if($country_id != '0'){
		$country = "and country_id = '$country_id'";
	}else{
		$country = '';
	}
	$query =mysql_query("select sum(tenaga_kerja) as pekerja from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$bulan
						$country
						");


	$row=mysql_fetch_array($query);
	return $row['0'];

}


function pekerja_total($country_id,$i_triwulan,$i_master_sub_category_id,$i_master_year){
	if($i_triwulan == '1'){
		$triwulan =  " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$triwulan = " AND DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	

	if($country_id != '0'){
		$country = "and country_id = '$country_id'";
	}else{
		$country = '';
	}
	$query =mysql_query("select sum(tenaga_kerja) as pekerja from master
						where master_type_id = 1
						and master_category_id = 6
						and master_sub_category_id = '$i_master_sub_category_id'
						
						and master_year = $i_master_year
						$triwulan
						$country
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