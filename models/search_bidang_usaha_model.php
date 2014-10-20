<?php

function select_detail($i_master_category_id, $i_semester, $i_master_year){
	if($i_master_category_id != 0){
		$category = " AND a.master_category_id = $i_master_category_id";
	}else{
		$category = "";
	}
	if($i_semester == '1'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 1 AND 6 ";
		
	}else if($i_semester == '2'){
		$where = " DATE_FORMAT( master_date, '%m' ) BETWEEN 7 AND 12 ";
	}
	$query = mysql_query("select a.*, d.business_type_name, e.country_name, f.city_name, g.master_category_name, h.master_ip_type_name
							from master a
							join business_types d on d.business_type_id = a.business_type_id
							LEFT join countries e on e.country_id = a.country_id
							LEFT join cities f on f.city_id = a.city_id
							join master_categories g on g.master_category_id = a.master_category_id
							left join master_ip_types h on h.master_ip_type_id = a.master_ip_type_id
							where  a.master_year = $i_master_year $category  AND $where 
						");
	return $query;
}

?>