<?php

function select(){
	$query = mysql_query("select a.*, b.owner_name
						from trucks a
						join owners b on b.owner_id = a.owner_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from trucks where truck_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into trucks values(".$data.")");
}

function update($data, $id){
	mysql_query("update trucks set ".$data." where truck_id = '$id'");
}

function delete($id){
	mysql_query("delete from trucks  where truck_id = '$id'");
}
function cek_nopol($nopol){
	$q=mysql_query("SELECT COUNT(truck_id) as jumlah FROM trucks where truck_nopol = '$nopol'");
	$result = mysql_fetch_array($q);
	$row = $result['0'];
	return $row;
}
function cek_code($code){
	$q=mysql_query("SELECT COUNT(truck_id) as jumlah FROM trucks where truck_code = '$code'");
	$result = mysql_fetch_array($q);
	$row = $result['0'];
	return $row;
}

?>