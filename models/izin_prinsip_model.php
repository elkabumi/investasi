<?php

function select(){
	
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name,g.*
						from master a
						LEFT join business_types d on d.business_type_id = a.business_type_id
						LEFT join countries e on e.country_id = a.country_id
						LEFT join cities f on f.city_id = a.city_id
						JOIN  master_categories g on g.master_category_id 	 = a.master_sub_category_id 	 	
						where a.master_type_id = 1 
						and a.master_category_id = 6 AND a.master_parent_id = 0 AND a.master_ip_type_id 	 ='1'
						
						");
	return $query;
}


function select_detail($id){
	
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name
						from master a
						LEFT join business_types d on d.business_type_id = a.business_type_id
						LEFT join countries e on e.country_id = a.country_id
						LEFT join cities f on f.city_id = a.city_id
						 where a.master_type_id = 1 
						and master_category_id = 6 AND master_parent_id = '$id'
						
						");
	return $query;
}


function read_id($id){
	$query = mysql_query("select * from master where master_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into master values(".$data.")");

	
}

function update($data, $id){
	mysql_query("update master set ".$data." where master_id = '$id'");
}

function delete($id){
	mysql_query("delete from master  where master_id = '$id'");
}

function get_img($id){
	$q_img = mysql_query("select master_img from master where master_id = '$id'");
	$r_img = mysql_fetch_object($q_img);
	return $r_img->master_img;
}


?>