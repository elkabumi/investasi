<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
include '../models/realisasi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 4;
$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : 1;
		if($master_category_id == 1){
			$title = "PMA";
		}else if($master_category_id == 2){
			$title = "PMDN";
		}else if($master_category_id == 3){
				$title = "Non Fas";
		}else if($master_category_id == 4){
				$title = "IU";
		}else if($master_category_id == 5){
				$title = "Ekspor";
		}
switch ($page) {
	case 'list':
		get_header();

		
		
		$query = select($master_category_id);
		log_data(1, 0, $_SESSION['user_id'], "realisasi ".$title."");
		
		$add_button = "realisasi.php?page=list_izin_prinsip&master_category_id=$master_category_id";
		$upload_button = "realisasi.php?page=form_upload&master_category_id=$master_category_id";

		include '../views/realisasi/list.php';
		get_footer();
	break;
	
	case 'list_izin_prinsip':
		get_header();
		
		
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		
		$query = select_izin_prinsip();
		
		log_data(1, 0, $_SESSION['user_id'], "realisasi ".$title."");
		
		$close_button = "master.php?page=list_izin_prinsip";
		$close = "realisasi.php?page=list&master_category_id=$master_category_id";

		include '../views/realisasi/list_izin_prinsip.php';
		get_footer();
	break;
	
	
	case 'form':
		get_header();

		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$id_ip = (isset($_GET['id_ip'])) ? $_GET['id_ip'] : null;
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		$close_button = "realisasi.php?page=list&master_category_id=$master_category_id";
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		
		if($id != ''){
			$row = read_id($id);
		
		}else if($id_ip != ''){
			$row = read_id($id_ip);
			
		}
		
				
			
	
	
			
			if($type == '1'){
				$action = "realisasi.php?page=edit&id=$id&master_category_id=$master_category_id";
			}else{
				$action = "realisasi.php?page=save&master_category_id=$master_category_id&id_ip=$id_ip";
			}
			$master_dollar =  get_config_dollar();
	
			include '../views/realisasi/form.php';
		
		
		
		
		
		get_footer();
	break;
	
	case 'form_upload':
	
		get_header();
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		$close_button = "realisasi.php?page=list";
		$action='realisasi.php?page=save_upload&master_category_id='.$master_category_id.'';
		include '../views/realisasi/form_upload.php';
		get_footer();
	break;
	
	case'save_upload':
		extract($_POST);
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		$i_user_id = get_isset($_SESSION['user_id']);
		$type_file   = $_FILES['file_xls']['type'];
		
		$data = new Spreadsheet_Excel_Reader($_FILES['file_xls']['tmp_name']);
		$hasildata = $data->rowcount($sheet_index=0);
		
		for($j=2; $j<=$hasildata; $j++){
			
			
			 $no				= strtolower(trim($data->val($j,1))); 
			 $tahun 			= strtolower(trim($data->val($j,2)));
			 $negara 			= get_country_id(strtolower(trim($data->val($j,3))));	 
			 $lokasi 			= get_city_id(strtolower(trim($data->val($j,4)))); 		 
			 $npwp			  	= strtolower(trim($data->val($j,5)));
			 $no_perusahaan 	= strtolower(trim($data->val($j,6)));
			 $no_kode_proyek 	= strtolower(trim($data->val($j,7)));
			 $alamat_perusahaan 	= strtolower(trim($data->val($j,8)));
			 $nama_perusahaan 	= strtolower(trim($data->val($j,9)));
			 $no_ip			 	= strtolower(trim($data->val($j,10)));
			 
			 $tanggal_ip 		= format_back_date_upload(strtolower(trim($data->val($j,11))));
			 $tanggal_exp_ip 	= format_back_date_upload(strtolower(trim($data->val($j,12))));	 
			 $kategoty			= strtolower(trim($data->val($j,13)));	
			 $investasi			= format_money(strtolower(trim($data->val($j,14))));
			 $kode_bid_usaha	= strtolower(trim($data->val($j,15)));
			 $sub_bid_usaha		= strtolower(trim($data->val($j,16)));
			 $produksi			= strtolower(trim($data->val($j,17)));
			 $ekspor			= strtolower(trim($data->val($j,18)));
			 $tk_laki			= strtolower(trim($data->val($j,19))); 			 
			 $tk_wanita 		= strtolower(trim($data->val($j,20))); 
			 $tk_asing 			= strtolower(trim($data->val($j,21))); 
			 $kapasitas 		= strtolower(trim($data->val($j,22))); 		 
			 $ket				= strtolower(trim($data->val($j,23)));
			 $total_tk			= $tk_laki + $tk_wanita + $tk_asing;	
		
			$ip_id = get_ip_id($no_ip);
			if($kategoty != '' and $no_ip !='' ){
				if($kategoty == '1'){
							$master_dollar =  get_config_dollar();
							$jml_investasi="'0','$investasi'";
							$dollar ="'$master_dollar'";
				}else if($kategoty == '2'){
							$jml_investasi="'$investasi','0'";
							$dollar="'0'";
							
				}
				$create_data = "'', '2', '6', '$master_category_id', '$nama_perusahaan', '$alamat_perusahaan', '$no_ip', '', '$no_perusahaan', '$no_kode_proyek',$jml_investasi, '$total_tk', '$kapasitas', '$ekspor', '$negara', '$lokasi', '$npwp', '$kode_bid_usaha','$sub_bid_usaha','$ket', '$i_user_id', '$tahun', '$tanggal_ip', '','0','$ip_id','$tanggal_exp_ip','','$tk_laki','$tk_wanita','$tk_asing',$dollar";
				mysql_query("INSERT INTO master VALUES(".$create_data.")");	
			}
			
		}
		show_message("upload berhasil", "realisasi.php?page=list&master_category_id=$master_category_id&did=4");
	break;
	case 'save':

		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		$id_ip = (isset($_GET['id_ip'])) ? $_GET['id_ip'] : null;
		
		extract($_POST);
		
		//$i_master_type_ip_id = get_isset($_GET['master_category_id']);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		//$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		$i_investasi = get_isset($i_investasi);
		$i_investasi_dollar = get_isset($i_investasi_dollar);
		//$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		$i_business_sub_type_id = get_isset($i_business_sub_type_id);
		$i_expired_date = '';//format_back_date(get_isset($i_expired_date));
		$row_id = get_isset($row_id);
		$i_keterangan = get_isset($i_keterangan);
		$i_user_id = get_isset($_SESSION['user_id']);
		$i_master_year =get_isset($i_master_year);
		$i_master_date = date("Y-m-d");
		$i_master_img = get_isset($_FILES['i_master_img']['name']);
		$i_tk_laki = get_isset($i_tk_laki);
		$i_tk_perempuan = get_isset($i_tk_perempuan);
		$i_tk_asing = get_isset($i_tk_asing);
		$tenaga_kerja = $i_tk_laki + $i_tk_perempuan +$i_tk_asing;
		$path = '../img/master_img/';
		
		if($i_master_img!=""){
			$image = $path.$i_master_date."_".$_FILES['i_master_img']['name'];
			move_uploaded_file($_FILES['i_master_img']['tmp_name'], $image);
		}else{
			$image = "";
		}
		if($master_category_id == '1' ){
			$master_dollar =  get_config_dollar();
				$data2="'0','$i_investasi_dollar'";
				$data3="'$master_dollar'";
		}else if($master_category_id == '2' or $master_category_id == '3'){
				$data2="'$i_investasi','0'";
				$data3="'0'";
		}else {
		if($i_investasi_dollar > 0 and $i_investasi <='0' ){
				$master_dollar =  get_config_dollar();
				$data2="'0','$i_investasi_dollar'";
				$data3="'$master_dollar'";	
				
			}else if($i_investasi > 0 and $i_investasi_dollar <= '0' ){
				
				$data2="'$i_investasi','0'";
				$data3="'0'";	
			}
			
		}
		
		$data = "'', '2', '6', '$master_category_id', '$i_nama_perusahaan', '$i_alamat', '$i_no_ip', '', '$i_no_perusahaan', '$i_no_kode_proyek',$data2, '$tenaga_kerja', '$i_kapasitas', '$i_ekspor', '$i_country_id', '$i_city_id', '$i_npwp', '$i_business_type_id','$i_business_sub_type_id', '$i_keterangan', '$i_user_id', '$i_master_year', '$i_master_date', '$image','0','$id_ip','$i_expired_date','','$i_tk_laki','$i_tk_perempuan','$i_tk_asing',$data3";
		
		create($data);
		$id = mysql_insert_id();
		log_data(2, $id, $_SESSION['user_id'],  "realisasi ".$title."");
		
		show_message("Simpan berhasil", "realisasi.php?page=list&master_category_id=".$master_category_id."&did=1");
	

	break;
	
	

	
case 'edit':
		
		$id = get_isset($_GET['id']);	
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		
		extract($_POST);

		
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		//$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		$i_investasi = get_isset($i_investasi);
		$i_investasi_dollar = get_isset($i_investasi_dollar);
		
		//$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		
		$i_business_sub_type_id = get_isset($i_business_sub_type_id);
		$i_keterangan = get_isset($i_keterangan);
		$i_user_id = get_isset($_SESSION['user_id']);
		$i_master_year = get_isset($i_master_year);
		$i_master_date = date("Y-m-d");
		$i_master_img = get_isset($_FILES['i_master_img']['name']);
		$i_tk_laki = get_isset($i_tk_laki);
		$i_tk_perempuan = get_isset($i_tk_perempuan);
		$i_tk_asing = get_isset($i_tk_asing);
		$tenaga_kerja = $i_tk_laki + $i_tk_perempuan +$i_tk_asing;
		
		$path = '../img/master_img/';
		
		if($i_master_img!=""){
			
			
			$r_img = get_img($id);
			
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
			}
			
			$image = $path.$i_master_date."_".$_FILES['i_master_img']['name'];
			move_uploaded_file($_FILES['i_master_img']['tmp_name'], $image);
			if($master_category_id == '1'){
				$i_master_dollar = get_isset($i_master_dollar);
			
				$data2 = "investasi = '',
						investasi_dollar= '$i_investasi_dollar',
						master_config_dollar ='$i_master_dollar'
				";
			}else if($master_category_id == '2' or $master_category_id == '3'){
				$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
			
			}else {
			if($i_investasi_dollar > 0 and $i_investasi <='0' ){
				$master_dollar =  get_config_dollar();
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi_dollar',
						master_config_dollar ='$i_master_dollar'
				";
			}else if($i_investasi > 0 and $i_investasi_dollar <= '0' ){
				$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";	
			}
			
		}
			
				$data = "
					nama_perusahaan = '$i_nama_perusahaan',
					alamat = '$i_alamat', 
					no_ip = '$i_no_ip', 
					
					no_perusahaan = '$i_no_perusahaan', 
					no_kode_proyek = '$i_no_kode_proyek', 
					
					tenaga_kerja = '$tenaga_kerja',
					kapasitas = '$i_kapasitas',
					ekspor = '$i_ekspor',
					country_id = '$i_country_id',
					city_id = '$i_city_id',
					npwp = '$i_npwp',
					business_type_id = '$i_business_type_id',
					business_sub_type_id = '$i_business_sub_type_id',
					keterangan = '$i_keterangan',
					master_year = '$i_master_year',
					master_img = '$image',
					
					master_tk_laki = '$i_tk_laki',
					master_tk_perempuan = '$i_tk_perempuan',
					master_tk_asing = '$i_tk_asing',
					$data2 
				";
			
			
		
		}else{
			if($master_category_id == '1'){
					$i_master_dollar = get_isset($i_master_dollar);
			
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi_dollar',
						master_config_dollar ='$i_master_dollar'
				";
			}else if($master_category_id == '2' or $master_category_id == '3'){
					$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
			
			}else {
			if($i_investasi_dollar > 0 and $i_investasi <='0' ){
				$master_dollar =  get_config_dollar();
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi_dollar',
						master_config_dollar ='$i_master_dollar'
				";
			}else if($i_investasi > 0 and $i_investasi_dollar <= '0' ){
				$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";	
			}
			
		}
					$data = " 
						nama_perusahaan = '$i_nama_perusahaan',
						alamat = '$i_alamat', 
						no_ip = '$i_no_ip', 
						
						no_perusahaan = '$i_no_perusahaan', 
						no_kode_proyek = '$i_no_kode_proyek', 
					
						tenaga_kerja = '$tenaga_kerja',
						kapasitas = '$i_kapasitas',
						ekspor = '$i_ekspor',
						country_id = '$i_country_id',
						city_id = '$i_city_id',
						npwp = '$i_npwp',
						business_type_id = '$i_business_type_id',
						business_sub_type_id = '$i_business_sub_type_id',
						keterangan = '$i_keterangan',
						master_year = '$i_master_year',
						
						
						master_tk_laki = '$i_tk_laki',
						master_tk_perempuan = '$i_tk_perempuan',
						master_tk_asing = '$i_tk_asing',
					$data2 
					";
				
				
		}
		update($data, $id);
	log_data(3, $id, $_SESSION['user_id'],  "realisasi ".$title."");
		show_message("Edit berhasil", "realisasi.php?page=list&master_category_id=".$master_category_id."&did=2");
	break;

	
	
	case 'delete':
$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		
	
$id = get_isset($_GET['id']);

	delete($id);
	
	log_data(4, $id, $_SESSION['user_id'],  "realisasi ".$title."");	
		header('Location: realisasi.php?page=list&master_category_id='.$master_category_id.'&did=3');

	break;
}

?>