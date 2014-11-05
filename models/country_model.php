<?php

function select(){
	
	$query = mysql_query("select * from countries order by country_name");
	return $query;
}



function read_id($id){
	$query = mysql_query("select * from countries where country_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into countries values(".$data.")");

	
}

function update($data, $id){
	mysql_query("update countries set ".$data." where country_id = '$id'");
	
}

function delete($id){
	mysql_query("delete from countries  where country_id = '$id'");
}


?>