<?php

function select(){
	
	$query = mysql_query("select * from business_types order by business_type_name");
	return $query;
}



function read_id($id){
	$query = mysql_query("select * from business_types where business_type_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into business_types values(".$data.")");

	
}

function update($data, $id){
	mysql_query("update business_types set ".$data." where business_type_id = '$id'");
	
}

function delete($id){
	mysql_query("delete from business_types  where business_type_id = '$id'");
}


?>