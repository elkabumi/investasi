<?php

function select($master_category_id){
	
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name
						from master a
						join business_types d on d.business_type_id = a.business_type_id
						LEFT join countries e on e.country_id = a.country_id
						LEFT join cities f on f.city_id = a.city_id
						where a.master_category_id = $master_category_id AND a.master_type_id = '2'
						
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