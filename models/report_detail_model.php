<?php

function select_detail($date1, $date2, $owner){
	
	$parameter = ($owner == 0) ? "" : " and a.owner_id = $owner ";
	$query = mysql_query("select
						DATE_FORMAT(b.transaction_date,'%d-%m-%Y') AS tanggal_transaksi,				
						a.truck_code, a.truck_p,a.truck_l,a.truck_t,b.*,c.owner_name, d.user_name,b.truck_volume AS volume
								from trucks a
						JOIN transactions b ON b.truck_id = a.truck_id
						JOIN owners c ON a.owner_id = c.owner_id    
						JOIN users d ON d.user_id = b.user_id 
						WHERE
						b.transaction_date >= '$date1 00:00:00' and b.transaction_date <= '$date2 23:59:59'
						$parameter
						");
	return $query;
}

function read_id($id){
	$query = mysql_query("SELECT a.*, b.unit_name, c.transaction_type_name
							FROM  transactions a
							JOIN units b on a.unit_id = b.unit_id
							JOIN transaction_types c on c.transaction_type_id = a.transaction_type_id
 							WHERE  a.transaction_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function get_jumlah_truk($date1, $date2, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("SELECT count(b.truck_nopol) as jumlah_truk
							FROM trucks a
							JOIN (SELECT h.truck_nopol,transaction_date
									FROM transactions h
									JOIN trucks d ON d.truck_id = h.truck_id    
									WHERE h.truck_nopol = d.truck_nopol
									AND h.transaction_date >= '$date1 00:00:00'
									AND h.transaction_date <= '$date2 23:59:59'
									$parameter
									GROUP BY h.truck_nopol
							) AS b ON b.truck_nopol = a.truck_nopol
							 ");
	$result = mysql_fetch_object($query);
	return $result->jumlah_truk;
}

function get_jumlah_pengiriman($date1, $date2, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select count(transaction_id) as jumlah_pengiriman 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id    
						WHERE
						transaction_date >= '$date1 00:00:00' and transaction_date <= '$date2 23:59:59'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah_pengiriman;
}

function get_jumlah_volume($date1, $date2, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.truck_volume) as jumlah_volume 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date >= '$date1 00:00:00' and transaction_date <= '$date2 23:59:59'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah_volume;
}

function get_total_jasa_angkut($date1, $date2, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_transport_service * a.truck_volume) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date >= '$date1 00:00:00' and transaction_date <= '$date2 23:59:59'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_total_subsidi_tol($date1, $date2, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_toll_subsidy) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date >= '$date1 00:00:00' and transaction_date <= '$date2 23:59:59'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_total_harga_urukan($date1, $date2, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_land_price) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date >= '$date1 00:00:00' and transaction_date <= '$date2 23:59:59'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_total_hpp($date1, $date2, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_hpp) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date >= '$date1 00:00:00' and transaction_date <= '$date2 23:59:59'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_data_owner($owner_id){
	
	$query = mysql_query("select owner_name from owners where owner_id = '$owner_id'
						");
	$result = mysql_fetch_object($query);
	return $result->owner_name;
	
}



?>