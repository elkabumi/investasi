<?php

function get_config_dollar(){
	$query = mysql_query("SELECT coonfig_dollar  from configs");
	$row = mysql_fetch_array($query);
	$result = $row['0'];
	return $result;
}


?>