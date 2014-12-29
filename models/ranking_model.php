<?php

function select_detail($i_master_year1, $i_master_year2){
	
	
	$query = mysql_query("SELECT a.*, b.total_dollar,b.tenaga_kerja, b.country_id,c.country_name
												FROM master a
													JOIN (
							
							SELECT COUNT( country_id ) AS sama, country_id, SUM(investasi_dollar ) AS total_dollar, SUM(tenaga_kerja) AS tenaga_kerja
							FROM master h
							WHERE h.country_id = country_id
							GROUP BY country_id
							) AS b ON b.country_id = a.country_id
							JOIN countries c ON b.country_id = c.country_id
							where  a.master_year >= $i_master_year1 and a.master_year <= $i_master_year2 
							
							GROUP BY b.country_id ORDER BY `b`.`total_dollar` DESC
							
							LIMIT 0,10
						");
	return $query;
}




?>