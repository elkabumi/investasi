<?php

function select($d_awal, $d_akhir){

$query = mysql_query("select a.*, b.user_name, c.log_data_type_name
					 from log_data a
					 join users b on b.user_id = a.user_id
					 join log_data_types c on c.log_data_type_id = a.log_data_type_id
					 where log_data_time >= '$d_awal 00:00:00' and log_data_time <= '$d_akhir 23:59:59'
						");
	return $query;
}




?>