<?php

function select(){
	$query = mysql_query("select *
						from owners
						");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from owners where owner_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into owners values(".$data.")");
}

function update($data, $id){
	mysql_query("update owners set ".$data." where owner_id = '$id'");
}

function delete($id){
	mysql_query("delete from owners  where owner_id = '$id'");
}


?>