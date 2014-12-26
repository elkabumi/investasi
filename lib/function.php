<?php

function get_ip() {
   $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';

      return $ipaddress;
 
}

function log_data($type, $data_id, $user_id, $desc){
	$ip = get_ip();
	$data = "'',
					'".date("Y-m-d H:m:s")."', 
					'$ip',
					'$user_id', 
					'$type', 
					'$data_id', 
					'$desc'
			";
	$query = mysql_query("insert into log_data values($data)");
}

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}
function get_event_code(){
	$query = mysql_query("select event_code from config");
	$row = mysql_fetch_object($query);
	$result = $row->event_code + 1;
	return $result;
}
function new_date(){
	$new_date = date("Y-m-d H:m:s");
	return $new_date;
}

function get_header(){
	include '../views/layout/header.php';
}

function get_footer(){
	include '../views/layout/footer.php';
}

function get_isset($data){
	$result = (isset($data)) ? $data : "";
	return $result;
}

function format_date($date){

	$date = explode("-", $date);
	$new_date = $date[2]."/".$date[1]."/".$date[0];

	return $new_date;

}
function get_hour($data){
	$data = explode(" ", $data);
	$hour = $data[1];
	$h = explode(":", $hour);
	$new_hour = $h[0].":".$h[1].":".$h[2];
	return $new_hour;
}

function get_date($data){
	$data = explode(" ", $data);
	$date = $data[0];
	$h = explode("-", $date);
	$new_date = $h[2]."/".$h[1]."/".$h[0];
	return $new_date;
}

function format_back_date($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date2($date){

	$date = explode("/", $date);
	if($date[0] < 10){
		$date[0] = '0'.$date[0];
	}

	if($date[1] < 10){
		$date[1] = '0'.$date[1];
	}
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}
function format_back_date3($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date4($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."/".$date[1]."/".$date[0];

	return $back_date;

}
function format_back_date_upload($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}

function cek_type_file($tipe_file){
	   $hasil = 0; //false 
	   $tipe  = $tipe_file;
	   if (($tipe == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") or ($tipe == "application/vnd.ms-excel") ) {
		  $hasil = 1; //true
	   }
	   
	   return $hasil;
}
function format_date_xl($date_xl){
	$month=array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
	$date_xl = explode("-", $date_xl);
	$back_date =  $date_xl[2]."-".$month[$date_xl[1]]."-".$date_xl[0];
	
	return $back_date;
}

function get_user_data(){
	$query_user = mysql_query("select * from users where user_id = '".$_SESSION['user_id']."'");
	$row_user = mysql_fetch_object($query_user);

	$name = ucfirst($row_user->user_name);

	switch($row_user->user_type_id){
		case 1: $type = "Admin"; break;
		case 2: $type = "Kepala Bidang "; break;
		case 3: $type = "Staf Input"; break;
		case 4: $type = "View Data"; break;
		case 5: $type = "-"; break;
	}
	
	$user_img = $row_user->user_img;

	return array($name, $type, $user_img);
}

function create_report($title) {
				$format =			header("Pragma: public");
									header("Expires: 0");
									header("Cache-Control : must-revalidate, post-check=0, pre-check=0");
									header("Content-type: application/force-download");
								    header("Content-type: application/octet-stream");
									header("Content-type: application/download");
								    header("Content-Disposition: attachment; filename=$title.xls");
								    header("Content-transfer-encoding: binary");
									
return $format;
}

function tool_format_number($data){
	$data = number_format($data, 0);
	$data = "<div style='text-align:right'>".$data."</div>";
	return $data;
}
function tool_format_number_report($data){
	$data = number_format($data, 2);
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}
function format_report($data){
	$data = "<div style='text-align:right; font-size:26px;'>".$data."</div>";
	return $data;
}

function show_message($message, $link){
	?>
    <script type="text/javascript">
    alert("<?= $message ?>");
	window.location = "<?= $link ?>";
    </script>
    <?php
	
}
function get_city_id($city){
	$query	= mysql_query("SELECT city_id FROM cities WHERE city_name LIKE '%".$city."%'");
	$row	= mysql_fetch_object($query);
	return $row->city_id;
}
function get_country_id($country){
	$query	= mysql_query("SELECT country_id FROM  countries WHERE country_name LIKE '%".$country."%'");
	$row	= mysql_fetch_object($query);
	return $row->country_id;
}
function format_money($money){
	$cx = array("*",",","."," ");
	$f = array("","","","");
	$money = str_replace($cx,$f,$money);
	return $money;
}
function get_ip_id($no_ip){
	$query	= mysql_query("SELECT master_id FROM  master WHERE no_ip = '".$no_ip."' AND master_ip_type_id = '1'");
	$row	= mysql_fetch_object($query);
	return $row->master_id;
}
?>