<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/realisasi_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 2;
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
		$add_button = "realisasi.php?page=list_izin_prinsip&master_category_id=$master_category_id";


		include '../views/realisasi/list.php';
		get_footer();
	break;
	
	case 'list_izin_prinsip':
		get_header();
		
		
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		
		$query = select_izin_prinsip();
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
		$i_master_year = date('Y');
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
		if($master_category_id == '1'){
			$master_dollar =  get_config_dollar();
				$data2="'0','$i_investasi_dollar'";
				$data3="'$master_dollar'";
		}else if($master_category_id == '2'){
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
						investasi_dollar= '$i_investasi',
						master_config_dollar ='$i_master_dollar'
				";
			}else if($master_category_id == '2'){
					$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
			
			}else {
			if($i_investasi_dollar > 0 and $i_investasi <='0' ){
				$master_dollar =  get_config_dollar();
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi',
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
						investasi_dollar= '$i_investasi',
						master_config_dollar ='$i_master_dollar'
				";
			}else if($master_category_id == '2'){
					$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
			
			}else {
			if($i_investasi_dollar > 0 and $i_investasi <='0' ){
				$master_dollar =  get_config_dollar();
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi',
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
	
		show_message("Edit berhasil", "realisasi.php?page=list&master_category_id=".$master_category_id."&did=2");
	break;

	
	
	case 'delete':
$master_category_id = (isset($_GET['master_category_id'])) ? $_GET['master_category_id'] : null;
		
	
$id = get_isset($_GET['id']);

	delete($id);	
		header('Location: realisasi.php?page=list&master_category_id='.$master_category_id.'&did=3');

	break;
}

?>