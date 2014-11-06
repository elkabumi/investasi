<?php

function get_config_dollar(){
	$query = mysql_query("SELECT config_dollar  from configs");
	$row = mysql_fetch_array($query);
	$result = $row['0'];
	return $result;
}
function get_data_total($category,$year,$country_id,$city_id,$business_id,$sub_business_id){
	if($category == '1'){
		$where = " WHERE 
						 (master_sub_category_id = '1' OR master_sub_category_id = '2'  OR master_sub_category_id = '3') 
						 AND master_year = '$year' AND master_type_id = '2'";
	}else if($category == '2'){
		$where = " WHERE 
						 (master_sub_category_id = '1' OR master_sub_category_id = '2') 
						 AND master_year = '$year' AND master_type_id = '1' AND master_category_id ='6'";
	}
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
	if($sub_business_id == '0'){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("SELECT * from master ".$where."".$country."".$city."".$business."".$sub_business."
							 ");
	
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
function get_data_proyek_realisasi($category, $year,$country_id,$city_id,$business_id,$sub_business_id){
	if($category == '0'){
		$where ="(master_sub_category_id = '1' or master_sub_category_id = '2') AND";
	}else{
		$where = 'master_sub_category_id = '.$category.' AND ';
	}
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
	if($sub_business_id == '0'){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	
	
	$query = mysql_query("select count(master_id) as jumlah from master where  ".$where." master_year = '$year' and master_type_id = '2'".$country."".$city."".$business."".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}


function get_data_investasi_realisasi($category, $year,$country_id,$city_id,$business_id,$sub_business_id){
	if($category == '0'){
		$where ="(master_sub_category_id = '1' or master_sub_category_id = '2') AND";
	}else{
		$where = 'master_sub_category_id = '.$category.' AND ';
	}
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
	if($sub_business_id == '0'){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
$query = mysql_query("select * from master where ".$where."  master_year = '$year' and master_type_id = '2'".$country."".$city."".$business."".$sub_business."");
	
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

	
	$result = $total_data / 1000000000000;;
	return $result;

}

function get_data_pekerja_realisasi($category, $year,$country_id,$city_id,$business_id,$sub_business_id){
	
	if($category == '0'){
		$where ="(master_sub_category_id = '1' or master_sub_category_id = '2') AND";
	}else{
		$where = 'master_sub_category_id = '.$category.' AND ';
	}
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
	if($sub_business_id == '0'){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("select SUM(tenaga_kerja) as jumlah from master  where ".$where." master_year = '$year' and master_type_id = '2'".$country."".$city."".$business."".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}






function get_data_proyek_izin($category, $year,$country_id,$city_id,$business_id,$sub_business_id){
	if($category == '0'){
		$where ="(master_sub_category_id = '1' or master_sub_category_id = '2') AND";
	}else{
		$where = 'master_sub_category_id = '.$category.' AND ';
	}
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
	if($sub_business_id == '0'){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("select count(master_id) as jumlah from master where  ".$where." master_year = '$year' and master_type_id = '1' AND master_category_id ='6'".$country."".$city."".$business."".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}



function get_data_investasi_izin($category, $year,$country_id,$city_id,$business_id,$sub_business_id){
	if($category == '0'){
		$where ="(master_sub_category_id = '1' or master_sub_category_id = '2') AND";
	}else{
		$where = 'master_sub_category_id = '.$category.' AND ';
	}
	
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
	if($sub_business_id == '0'){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
$query = mysql_query("select * from master where ".$where."  master_year = '$year' and master_type_id = '1' AND master_category_id ='6'".$country."".$city."".$business."".$sub_business."");
	
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


function get_data_pekerja_izin($category, $year,$country_id,$city_id,$business_id,$sub_business_id){
	if($category == '0'){
		$where ="(master_sub_category_id = '1' or master_sub_category_id = '2') AND";
	}else{
		$where = 'master_sub_category_id = '.$category.' AND ';
	}
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
	if($sub_business_id == '0'){
		$sub_business ='';
	}else{
		$sub_business = "AND business_sub_type_id LIKE '%$sub_business_id%'";
	}
	
	$query = mysql_query("select SUM(tenaga_kerja) as jumlah from master  where ".$where." master_year = '$year' and master_type_id = '1' AND master_category_id ='6'".$country."".$city."".$business."".$sub_business."");
	$row = mysql_fetch_array($query);
	$result = ($row['jumlah']) ? $row['jumlah'] : 0;
	return $result;
}


?>