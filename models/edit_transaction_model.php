<?php

function select_summary($date1, $date2,$i_owner_id){
	$parameter = ($i_owner_id == 0) ? "" : " WHERE a.owner_id = $i_owner_id ";
	
	$query = mysql_query("SELECT DATE_FORMAT(b.transaction_date,'%d-%m-%Y') AS tanggal_transaksi, a.truck_id, a.truck_p, a.truck_l, a.truck_t,a.owner_id, b . * , c.owner_name
							FROM trucks a
							JOIN (SELECT transaction_id AS id_trans, truck_nopol,transaction_date
									FROM transactions h
									WHERE h.truck_nopol = truck_nopol
									AND h.transaction_date >= '$date1 00:00:00'
									AND h.transaction_date <= '$date2 23:59:59'
									GROUP BY truck_nopol
							) AS b ON b.truck_nopol = a.truck_nopol
							JOIN owners c ON a.owner_id = c.owner_id
							$parameter ");
	return $query;
}

function read_id($date1,$date2,$id){
	$query = mysql_query("select
						DATE_FORMAT(b.transaction_date,'%d-%m-%Y') AS tanggal_transaksi,				
						b.*,c.owner_name, d.user_name,b.truck_volume AS volume
								from trucks a
						JOIN transactions b ON a.truck_id = b.truck_id
						JOIN owners c ON a.owner_id = c.owner_id    
						JOIN users d ON d.user_id = b.user_id 
						WHERE
						b.transaction_date >= '$date1 00:00:00' and b.transaction_date <= '$date2 23:59:59' AND b.truck_id = '$id'");
	return $query;

}

function read_id_truck($id){
	$query = mysql_query("select a.*, b.owner_name
							from trucks a
						join owners b on b.owner_id = a.owner_id
						where a.truck_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function read_trainer_view($id){
	$query = mysql_query("select a.*, b.*, c.city_name
							from transaction_trainers a
							join users b on a.user_id = b.user_id 
							join cities c on c.city_id = b.city_id
							where transaction_id = $id");
	return $query;
}

function read_agent_view($id){
	$query = mysql_query("select a.*, b.*
							from transaction_agents a
							join agents b on a.agent_id = b.agent_id where a.transaction_id = '$id'");
	return $query;
}
function read_id2($id){
$query = mysql_query("select a.*, c.owner_name ,b.truck_code	 	
							from transactions a

						JOIN trucks b ON b.truck_id = a.truck_id
						join owners c on c.owner_id = b.owner_id
						where a.transaction_id =  '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}
function update($data,$id){
	mysql_query("UPDATE transactions SET $data WHERE transaction_id=$id");
}
function get_data_config($id){
	$query = mysql_query("select owner_id from trucks where truck_id = '$id'");
	$row = mysql_fetch_array($query);
	
	$query_config = mysql_query("select * from owners where owner_id = '".$row['owner_id']."'");
	$row_config = mysql_fetch_array($query_config);
	
	return $row_config;
}
function create($data){
	
	mysql_query("insert into transactions values(".$data.")");
}


?>