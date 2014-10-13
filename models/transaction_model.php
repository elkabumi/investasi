<?php

function select(){
	$query = mysql_query("select a.*, b.owner_name
							from trucks a
						join owners b on b.owner_id = a.owner_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select a.*, b.owner_name
							from trucks a
						join owners b on b.owner_id = a.owner_id
						where a.truck_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	
	mysql_query("insert into transactions values(".$data.")");
}

function update($data, $id){
	mysql_query("update trucks set ".$data." where truck_id = '$id'");
}

function delete($id){
	mysql_query("delete from trucks  where truck_id = '$id'");
}

function get_data_config($id){
	$query = mysql_query("select owner_id from trucks where truck_id = '$id'");
	$row = mysql_fetch_array($query);
	
	$query_config = mysql_query("select * from owners where owner_id = '".$row['owner_id']."'");
	$row_config = mysql_fetch_array($query_config);
	
	return $row_config;
}


?>