<?php

function select(){
	$query = mysql_query("select *
		from users a 
			where user_id <> 11
			");
	return $query;
}

function read_id($id){
	$query = mysql_query("select *
			from users 
			where user_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into users values(".$data.")");
}

function update($data, $id){
	mysql_query("update users set ".$data." where user_id = '$id'");
}

function delete($id){
	mysql_query("delete from users  where user_id = '$id'");
}

function actived($id){
	mysql_query("update users set user_active_status = '1' where user_id = '$id'");
}

function deactived($id){
	mysql_query("update users set user_active_status = '0' where user_id = '$id'");
}

function cek_name_login($name){
	$query = mysql_query("select count(user_id)
							from users 
						where user_login = '".$name."'");
	$result = mysql_fetch_array($query);
	$row = $result['0'];
	return $row;
}

?>