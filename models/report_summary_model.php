<?php

function select_summary($date, $i_owner_id){
	$parameter = ($i_owner_id == 0) ? "" : " WHERE a.owner_id = $i_owner_id ";
	
	$query = mysql_query("SELECT DATE_FORMAT(b.transaction_date,'%d-%m-%Y') AS tanggal_transaksi, a.truck_code, a.truck_id, a.truck_p, a.truck_l, a.truck_t,a.owner_id, b . * , c.owner_name
							
							FROM trucks a
							JOIN (SELECT transaction_id AS id_trans, truck_nopol,transaction_date, transaction_transport_service,transaction_hour,
							transaction_toll_subsidy, transaction_land_price
									FROM transactions h
									WHERE h.truck_nopol = truck_nopol
									AND h.transaction_date LIKE '$date%'
									GROUP BY truck_nopol
							) AS b ON b.truck_nopol = a.truck_nopol
							JOIN owners c ON a.owner_id = c.owner_id
							$parameter ");
	return $query;
}

function read_id($date1,$date2,$id){
	$query = mysql_query("select
						DATE_FORMAT(b.transaction_date,'%d-%m-%Y') AS tanggal_transaksi,				
						a.truck_p,a.truck_l,a.truck_t,b.*,c.owner_name, d.user_name,b.truck_volume AS volume
								from trucks a
						JOIN transactions b ON a.truck_id = b.truck_id
						JOIN owners c ON a.owner_id = c.owner_id    
						JOIN users d ON d.user_id = b.user_id 
						WHERE
						b.transaction_date >= '$date1 00:00:00' and b.transaction_date <= '$date2 23:59:59' AND b.truck_id = '$id'");
	return $query;

}

function get_max_vol($date, $i_owner_id){
	$parameter = ($i_owner_id == 0) ? "" : " WHERE a.owner_id = $i_owner_id ";
	$query = mysql_query("SELECT max(b.jumlah_truk) as max_vol
							FROM trucks a
							JOIN (SELECT truck_nopol, count(truck_nopol) as jumlah_truk
									FROM transactions h
									WHERE h.truck_nopol = truck_nopol
									AND h.transaction_date LIKE '$date%'
									GROUP BY truck_nopol
							) AS b ON b.truck_nopol = a.truck_nopol	
							$parameter
							");
	$row = mysql_fetch_object($query);
	return $row->max_vol;
}

function get_jumlah_volume($date, $truck_id){
	$query = mysql_query("select sum(truck_volume) as jumlah
							from transactions where truck_id = '".$truck_id."' 
							AND transaction_date like '$date%'
							");
	$row = mysql_fetch_object($query);
	return $row->jumlah;
}



function get_total_truk($date, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("SELECT count(b.truck_nopol) as jumlah_truk
							FROM trucks a
							JOIN (SELECT h.truck_nopol,transaction_date
									FROM transactions h
									JOIN trucks d ON d.truck_id = h.truck_id    
									WHERE h.truck_nopol = d.truck_nopol
									AND h.transaction_date like '$date%'
									$parameter
									GROUP BY h.truck_nopol
							) AS b ON b.truck_nopol = a.truck_nopol
							 ");
	$result = mysql_fetch_object($query);
	return $result->jumlah_truk;
}

function get_total_pengiriman($date, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select count(transaction_id) as jumlah_pengiriman 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id    
						WHERE
						transaction_date like '$date%'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah_pengiriman;
}

function get_total_volume($date, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.truck_volume) as jumlah_volume 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date like '$date%'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah_volume;
}

function get_total_jasa_angkut($date, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_transport_service * a.truck_volume) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date like '$date%'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_total_subsidi_tol($date, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_toll_subsidy) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date like '$date%'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_total_harga_urukan($date, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_land_price) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date like '$date%'
						$parameter
						");
	$result = mysql_fetch_object($query);
	return $result->jumlah;
	
}

function get_total_hpp($date, $owner){
	$parameter = ($owner == 0) ? "" : " and d.owner_id = $owner ";
	$query = mysql_query("select sum(a.transaction_hpp) as jumlah 
						from transactions a
						JOIN trucks d ON d.truck_id = a.truck_id     
						WHERE
						transaction_date like '$date%'
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