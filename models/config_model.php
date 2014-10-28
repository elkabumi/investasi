<?php

function select(){
	$query = mysql_query("select *
						from configs
						");
	return $query;
}

function read_id(){
	$query = mysql_query("select * from configs");
	$result = mysql_fetch_object($query);
	return $result;
}


function update($data){
	mysql_query("update configs set ".$data);
}



?>