<?php

function select_detail($i_master_category_id, $i_master_sub_category_id, $i_triwulan, $i_master_year, $country,$city,$busines,$tenaga1,$tenaga2,$investasi1,$investasi2, $sub_busines){
	
	$parameter = "";
	if($i_master_category_id != 0){
		 if($i_master_category_id == 1){
			 $parameter .= " AND a.master_type_id = '1' and a.master_category_id = '6'";
			 	switch($i_master_sub_category_id){
					
					case 1:  $parameter .= " AND a.master_sub_category_id = '1'"; break;
					case 2:  $parameter .= " AND a.master_sub_category_id = '2'"; break;
				}
		 }else if($i_master_category_id == 2){
			 $parameter .= " AND a.master_type_id = '1' and a.master_category_id = '7'";
			 switch($i_master_sub_category_id){
					
					case 3:  $parameter .= " AND a.master_sub_category_id = '1'"; break;
					case 4:  $parameter .= " AND a.master_sub_category_id = '2'"; break;
				}
		 }else{
			 $parameter .= " AND a.master_type_id = '2' and a.master_category_id = '6'";
			 switch($i_master_sub_category_id){
					
					case 5:  $parameter .= " AND a.master_sub_category_id = '1'"; break;
					case 6:  $parameter .= " AND a.master_sub_category_id = '2'"; break;
					case 7:  $parameter .= " AND a.master_sub_category_id = '3'"; break;
					case 8:  $parameter .= " AND a.master_sub_category_id = '4'"; break;
					case 9:  $parameter .= " AND a.master_sub_category_id = '5'"; break;
				}
		 }
		 
	}
	
	if($country){ $parameter .= " and a.country_id = '$country'"; }
	if($city){ $parameter .= " and a.city_id = '$city'"; }
	if($busines){ $parameter .= " and a.business_type_id = '$busines'"; }
	if($sub_busines){ $parameter .= " and a.business_sub_type_id like '%$sub_busines%'"; }
	if($tenaga1 != '' && $tenaga2 != ''){ $parameter .= ' AND a.tenaga_kerja  BETWEEN '.$tenaga1.' AND '.$tenaga2.''; }
	if($investasi1 != '' && $investasi2 != ''){ $parameter .= ' AND a.investasi + (a.investasi_dollar * a.master_config_dollar)  BETWEEN '.$investasi1.' AND '.$investasi2.''; }
	
	if($i_triwulan == '1'){
		$where = " and DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 3 ";
		
	}else if($i_triwulan == '2'){
		$where = " and DATE_FORMAT( master_date, '%m' ) BETWEEN 4 AND 6 ";
	}else if($i_triwulan == '3'){
		$where =  "and DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 9 ";
	}
	else if($i_triwulan == '4'){
		$where = " and DATE_FORMAT( master_date, '%m' ) BETWEEN 10 AND 12";
	}
	
	$parameter = $parameter.$where;
	
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name, g.master_category_name, h.master_ip_type_name, i.master_category_name as master_sub_category_name
							from master a
							join business_types d on d.business_type_id = a.business_type_id
							LEFT join countries e on e.country_id = a.country_id
							LEFT join cities f on f.city_id = a.city_id
							join master_categories g on g.master_category_id = a.master_category_id
							left join master_ip_types h on h.master_ip_type_id = a.master_ip_type_id
							LEFT join master_categories i on i.master_category_id = a.master_sub_category_id
							where  a.master_year = $i_master_year $where 
						");
	return $query;
}

function get_jumlah_data($i_master_category_id, $i_triwulan, $i_master_year){
	if($i_master_category_id != 0){
		 if($i_master_category_id < 6){
			 $category = " AND a.master_type_id = '2' and a.master_sub_category_id = $i_master_category_id";
		 }else{
			$category = ' AND a.master_category_id = '.$i_master_category_id.' and a.master_type_id = 1';
		 }
	}else{
		$category = "";
	}
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
							where a.master_year = $i_master_year $category AND $where 
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_jumlah_investasi($i_master_category_id, $i_triwulan, $i_master_year){
	if($i_master_category_id != 0){
		 if($i_master_category_id < 6){
			 $category = " AND a.master_type_id = '2' and a.master_sub_category_id = $i_master_category_id";
		 }else{
			$category = ' AND a.master_category_id = '.$i_master_category_id.' and a.master_type_id = 1';
		 }
	}else{
		$category = "";
	}
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

	$query = mysql_query("select sum(a.investasi) + sum(a.investasi_dollar * a.master_config_dollar) as jumlah
							from master a
							where a.master_year = $i_master_year $category AND $where 
						");
	$result = mysql_fetch_object($query);
	$hasil = $result->jumlah / 1000000000000;
	return $hasil;
	
}

function get_jumlah_tenaga_kerja($i_master_category_id, $i_triwulan, $i_master_year){
	if($i_master_category_id != 0){
		 if($i_master_category_id < 6){
			 $category = " AND a.master_type_id = '2' and a.master_sub_category_id = $i_master_category_id";
		 }else{
			$category = ' AND a.master_category_id = '.$i_master_category_id.' and a.master_type_id = 1';
		 }
	}else{
		$category = "";
	}
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
							where a.master_year = $i_master_year $category AND $where 
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