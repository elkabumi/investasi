<?php

function select(){
	
	$query = mysql_query("select * from cities order by city_name");
	return $query;
}



function read_id($id){
	$query = mysql_query("select * from cities where city_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into cities values(".$data.")");

	
}

function update($data, $id){
	mysql_query("update cities set ".$data." where city_id = '$id'");
	
}

function delete($id){
	mysql_query("delete from cities  where city_id = '$id'");
}


?>