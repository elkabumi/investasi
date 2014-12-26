<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
include '../models/izin_prinsip_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 3;
$title = "Izin Prinsip";

switch ($page) {
	case 'list':
		get_header();

		log_data(1, 0, $_SESSION['user_id'], "izin prinsip");
		
		$query = select();
		$add_button = "izin_prinsip.php?page=form";
		$upload_button = "izin_prinsip.php?page=form_upload";


		include '../views/izin_prinsip/list.php';
		get_footer();
	break;
	
	case 'list_detail':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$category = (isset($_GET['category'])) ? $_GET['category'] : null;
		$query = select_detail($id);
		
		log_data(1, 0, $_SESSION['user_id'], "izin prinsip");
		
		$add_button = "izin_prinsip.php?page=form_detail&id=$id&category=$category";
		$close = "izin_prinsip.php?page=list";


		include '../views/izin_prinsip/list_detail.php';
		get_footer();
	break;

	case 'form':
		get_header();

		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$category = (isset($_GET['category'])) ? $_GET['category'] : null;
		$close_button = "izin_prinsip.php?page=list";
		
		if($id){
			$row = read_id($id);
			$action = "izin_prinsip.php?page=edit&id=$id&category=$category ";
			$row->master_expired_date = format_date($row->master_expired_date);
			$master_dollar =  get_config_dollar();
		} else{
			//inisialisasi
			$row = new stdClass();
			$row->master_category_id = false;
			$row->master_sub_category_id = false;
			$row->nama_perusahaan = false;
			$row->alamat = false;
			$row->no_ip = false;
			$row->no_iu = false;
			$row->no_perusahaan = false;
			$row->no_kode_proyek = false;
			$row->investasi = false;
			$row->investasi_dollar = false;
			$row->kapasitas = false;
			$row->ekspor = false;
			$row->country_id = false;
			$row->city_id = false;
			$row->npwp = false;	
			$row->business_type_id = false;	
			$row->business_sub_type_id = false;	
			$row->keterangan = false;	
			$row->master_year = false;	
			$row->master_date = false;	
			$row->master_img = false;	
			$row->master_expired_date = false;	
			$row->master_tk_laki = false;	
			$row->master_tk_perempuan = false;	
			$row->master_tk_asing = false;	

			$action = "izin_prinsip.php?page=save";
		}

		include '../views/izin_prinsip/form.php';
		get_footer();
	break;
	case 'form_upload':
		get_header();
		$action='izin_prinsip.php?page=save_upload';
		$close_button = "izin_prinsip.php?page=list";
		include '../views/izin_prinsip/form_upload.php';
		get_footer();
	break;
	case'save_upload':
		extract($_POST);
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
			 $ip_type			= strtolower(trim($data->val($j,24)));
			 $total_tk			= $tk_laki + $tk_wanita + $tk_asing;	
		
			if($ip_type == '1'){
				if($kategoty == '1'){
						$master_dollar =  get_config_dollar();
						$jml_investasi="'0','$investasi'";
						$dollar ="'$master_dollar'";
				}else if($kategoty == '2'){
						$jml_investasi="'$investasi','0'";
						$dollar="'0'";
						
				}
				
				$create_data = "'', '1', '6', '$kategoty', '$nama_perusahaan', '$alamat_perusahaan', '$no_ip', '', '$no_perusahaan', '$no_kode_proyek',$jml_investasi, '$total_tk', '$kapasitas', '$ekspor', '$negara', '$lokasi', '$npwp', '$kode_bid_usaha','$sub_bid_usaha','$ket', '$i_user_id', '$tahun', '$tanggal_ip', '','1','0','$tanggal_exp_ip','','$tk_laki','$tk_wanita','$tk_asing',$dollar";
				mysql_query("INSERT INTO master VALUES(".$create_data.")");
				
			}else if($ip_type == '2' or $ip_type == '3' or $ip_type == '4' or $ip_type == '5'){
				$ip_id = get_ip_id($no_ip);
				echo $ip_id;
				if($kategoty == '1'){
						$master_dollar =  get_config_dollar();
						$jml_investasi="'0','$investasi'";
						$dollar ="'$master_dollar'";
				}else if($kategoty == '2'){
						$jml_investasi="'$investasi','0'";
						$dollar="'0'";
						
				}
				$create_data = "'', '1', '6', '$kategoty', '$nama_perusahaan', '$alamat_perusahaan', '$no_ip', '', '$no_perusahaan', '$no_kode_proyek',$jml_investasi, '$total_tk', '$kapasitas', '$ekspor', '$negara', '$lokasi', '$npwp', '$kode_bid_usaha','$sub_bid_usaha','$ket', '$i_user_id', '$tahun', '$tanggal_ip', '','$ip_type','$ip_id','$tanggal_exp_ip','','$tk_laki','$tk_wanita','$tk_asing',$dollar";
				mysql_query("INSERT INTO master VALUES(".$create_data.")");
			}
								
			
						

			
		}
		show_message("upload berhasil", "izin_prinsip.php?page=list&did=4");
	break;
	case 'form_detail':
		get_header();

		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$id_ip = (isset($_GET['id_ip'])) ? $_GET['id_ip'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		$category = (isset($_GET['category'])) ? $_GET['category'] : null;
	
		
	
			$row = read_id($id);
			
			if($type == '1'){
				  	$action = "izin_prinsip.php?page=edit_detail&id=$id&id_ip=$id_ip&category=$category";
					$close_button = "izin_prinsip.php?page=list_detail&id=$id_ip";
			}else{

				$action = "izin_prinsip.php?page=save_detail&id_ip=$id&category=$category";
				$close_button = "izin_prinsip.php?page=list_detail&id=$id";
				
			}
			
			$master_dollar =  get_config_dollar();

		include '../views/izin_prinsip/form_detail.php';
		get_footer();
	break;

	
	
	
	case 'save':

		extract($_POST);
		
			
		$i_master_category_id = get_isset($i_master_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		//$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		
		$i_investasi = get_isset($i_investasi);
		$i_kapasitas = get_isset($i_kapasitas);
		
		
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		$i_business_sub_type_id = get_isset($i_business_sub_type_id);
		$i_expired_date = format_back_date(get_isset($i_expired_date));
	
		$i_keterangan = get_isset($i_keterangan);
		$i_user_id = get_isset($_SESSION['user_id']);
		$i_master_year = get_isset($i_master_year);
		$i_master_date = date("Y-m-d");
		
		$i_tk_laki = get_isset($i_tk_laki);
		$i_tk_perempuan = get_isset($i_tk_perempuan);
		$i_tk_asing = get_isset($i_tk_asing);
		$tenaga_kerja = $i_tk_laki + $i_tk_perempuan +$i_tk_asing;
		
		$i_master_img = get_isset($_FILES['i_master_img']['name']);
		
		$path = '../img/master_img/';
		
		if($i_master_img!=""){
			$image = $path.$i_master_date."_".$_FILES['i_master_img']['name'];
			move_uploaded_file($_FILES['i_master_img']['tmp_name'], $image);
		}else{
			$image = "";
		}
		if($i_master_category_id == '1'){
			$master_dollar =  get_config_dollar();
				$data2="'0','$i_investasi'";
				$data3="'$master_dollar'";	
		}else{
				$data2="'$i_investasi','0'";
				$data3="'0'";
		}
		$data = "'', '1', '6', '$i_master_category_id', '$i_nama_perusahaan', '$i_alamat', '$i_no_ip', '', '$i_no_perusahaan', '$i_no_kode_proyek',$data2, '$tenaga_kerja', '$i_kapasitas', '$i_ekspor', '$i_country_id', '$i_city_id', '$i_npwp', '$i_business_type_id','$i_business_sub_type_id','$i_keterangan', '$i_user_id', '$i_master_year', '$i_master_date', '$image','1','0','$i_expired_date','','$i_tk_laki','$i_tk_perempuan','$i_tk_asing',$data3";
	
	create($data);
	$id = mysql_insert_id();
	log_data(2, $id, $_SESSION['user_id'], "izin prinsip");
		
	
	show_message("Simpan berhasil", "izin_prinsip.php?page=list&did=1");
		
		

	break;

	case 'save_detail':
		$id_ip = (isset($_GET['id_ip'])) ? $_GET['id_ip'] : null;
		$category = (isset($_GET['category'])) ? $_GET['category'] : null;
		
		extract($_POST);
		if($category == '1'){
			$i_investasi = get_isset($i_investasi_dollar);	
		}else{
			$i_investasi = get_isset($i_investasi);
		}
		
			
		$i_master_category_id = get_isset($i_master_category_id);
		$i_master_type_ip_id = get_isset($i_master_type_ip_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);

		//$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
			$i_business_sub_type_id = get_isset($i_business_sub_type_id);
		$i_expired_date = format_back_date(get_isset($i_expired_date));
		$row_id = get_isset($row_id);
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
			$image = $path.$i_master_date."_".$_FILES['i_master_img']['name'];
			move_uploaded_file($_FILES['i_master_img']['tmp_name'], $image);
		}else{
			$image = "";
		}
		if($i_master_category_id == '1'){
			$master_dollar =  get_config_dollar();
				$data2="'0','$i_investasi'";
				$data3="'$master_dollar'";	
		}else{
				$data2="'$i_investasi','0'";
				$data3="'0'";
		}
			$data = "'', '1', '6', '$i_master_category_id', '$i_nama_perusahaan', '$i_alamat', '$i_no_ip', '$i_no_iu', '$i_no_perusahaan', '$i_no_kode_proyek',$data2, '$tenaga_kerja', '$i_kapasitas', '$i_ekspor', '$i_country_id', '$i_city_id', '$i_npwp', '$i_business_type_id','$i_business_sub_type_id', '$i_keterangan', '$i_user_id', '$i_master_year', '$i_master_date', '$image','$i_master_type_ip_id','$row_id','$i_expired_date','','$i_tk_laki','$i_tk_perempuan','$i_tk_asing',$data3";
	
	create($data);
	$id = mysql_insert_id();
	log_data(2, $id, $_SESSION['user_id'], "izin prinsip");
		
		show_message("Simpan berhasil", "izin_prinsip.php?page=list_detail&did=1&id=$id_ip");
		
		

	break;




	
	case 'edit':
		
		$id = get_isset($_GET['id']);	
		
		$category = (isset($_GET['category'])) ? $_GET['category'] : null;
		
		extract($_POST);
		if($category == '1'){
			$i_investasi = get_isset($i_investasi_dollar);	
		}else{
			$i_investasi = get_isset($i_investasi);
		}
		
		$i_master_category_id = get_isset($i_master_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		//$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		
		
		//$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		
			$i_business_sub_type_id = get_isset($i_business_sub_type_id);
		$i_expired_date = format_back_date(get_isset($i_expired_date));
		$i_keterangan = get_isset($i_keterangan);
		$i_user_id = get_isset($_SESSION['user_id']);
		$i_master_year = get_isset($i_master_year);
		$i_master_date = date("Y-m-d");
		$i_master_img = get_isset($_FILES['i_master_img']['name']);
		$i_expired_date = get_isset($i_expired_date);
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
			
			if($i_master_category_id == '1'){
			$i_master_dollar = get_isset($i_master_dollar);
			
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi',
						master_config_dollar ='$i_master_dollar'
				";
			}else{
				$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
			
			}
			$data = " master_sub_category_id = '$i_master_category_id',
					nama_perusahaan = '$i_nama_perusahaan',
					alamat = '$i_alamat', 
					no_ip = '$i_no_ip', 
					no_iu = '', 
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
					master_expired_date = '$i_expired_date',
					master_tk_laki = '$i_tk_laki',
					master_tk_perempuan = '$i_tk_perempuan',
					master_tk_asing = '$i_tk_asing',
					$data2";
		
		}else{
				if($i_master_category_id == '1'){
					$i_master_dollar = get_isset($i_master_dollar);
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi',
						master_config_dollar ='$i_master_dollar'
				";
				}else{
						$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
				}
				$data = " master_sub_category_id = '$i_master_category_id',
						nama_perusahaan = '$i_nama_perusahaan',
						alamat = '$i_alamat', 
						no_ip = '$i_no_ip', 
						no_iu = '', 
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
						
						master_expired_date = '$i_expired_date',
						master_tk_laki = '$i_tk_laki',
						master_tk_perempuan = '$i_tk_perempuan',
						master_tk_asing = '$i_tk_asing',
						$data2
					";
			}
				
				
				
				

		

		update($data, $id);
		log_data(3, $id, $_SESSION['user_id'], "izin prinsip");
		show_message("Simpan berhasil", "izin_prinsip.php?page=list&did=2");

	break;
	
	
	
	
		
	case 'edit_detail':
		
		$id = get_isset($_GET['id']);	
		$id_ip = get_isset($_GET['id_ip']);
		$category = (isset($_GET['category'])) ? $_GET['category'] : null;
		
		extract($_POST);
		if($category == '1'){
			$i_investasi = get_isset($i_investasi_dollar);	
		}else{
			$i_investasi = get_isset($i_investasi);
		}
	
		
		
		
	
		$i_master_type_ip_id = get_isset($i_master_type_ip_id);
		$i_master_category_id = get_isset($i_master_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		//$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		
		
		//$i_tenaga_kerja = get_isset($i_tenaga_kerja);
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$i_country_id = get_isset($i_country_id);
		$i_city_id = get_isset($i_city_id);
		$i_npwp = get_isset($i_npwp);
		$i_business_type_id = get_isset($i_business_type_id);
		$i_business_sub_type_id = get_isset($i_business_sub_type_id);
		$i_expired_date = format_back_date(get_isset($i_expired_date));
		$i_keterangan = get_isset($i_keterangan);
		$i_user_id = get_isset($_SESSION['user_id']);
		$i_master_year = get_isset($i_master_year);
		$i_master_date = date("Y-m-d");
		$i_master_img = get_isset($_FILES['i_master_img']['name']);
		$i_expired_date = get_isset($i_expired_date);
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
			
			if($i_master_category_id == '1'){
			$i_master_dollar = get_isset($i_master_dollar);
			
			
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi',
						master_config_dollar ='$i_master_dollar'
				";
			}else{
				$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
			
			}
			$data = " master_sub_category_id = '$i_master_category_id',
					nama_perusahaan = '$i_nama_perusahaan',
					alamat = '$i_alamat', 
					no_ip = '$i_no_ip', 
					no_iu = '', 
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
					master_expired_date = '$i_expired_date',
					master_tk_laki = '$i_tk_laki',
					master_tk_perempuan = '$i_tk_perempuan',
					
						master_ip_type_id =  '$i_master_type_ip_id',
					master_tk_asing = '$i_tk_asing',
					$data2
				";
		
		}else{
				if($i_master_category_id == '1'){
					if($i_master_category_id == '1'){
					$i_master_dollar = get_isset($i_master_dollar);
					$data2 = "investasi = '',
						investasi_dollar= '$i_investasi',
						master_config_dollar ='$i_master_dollar'
				";
				}else{
						$data2 = "investasi = '$i_investasi',
							investasi_dollar= '',
							master_config_dollar ='0'";
				
				}
					$data = " master_sub_category_id = '$i_master_category_id',
						nama_perusahaan = '$i_nama_perusahaan',
						alamat = '$i_alamat', 
						no_ip = '$i_no_ip', 
						no_iu = '', 
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
						
						master_expired_date = '$i_expired_date',
						master_tk_laki = '$i_tk_laki',
						master_tk_perempuan = '$i_tk_perempuan',
						master_ip_type_id =  '$i_master_type_ip_id',
						master_tk_asing = '$i_tk_asing',
						$data2
					";
				
				}
			}
				
		

		
		update($data, $id);
		
		log_data(3, $id, $_SESSION['user_id'], "izin prinsip");
		
		show_message("Simpan berhasil", "izin_prinsip.php?page=list_detail&id=$id_ip&did=2");

	break;

	case 'delete':
		
		$id_ip = get_isset($_GET['id_ip']);	
		$id = get_isset($_GET['id']);	
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		$r_img = get_img($id);
			
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
			}
			
		delete($id);
		
		log_data(4, $id, $_SESSION['user_id'], "izin prinsip");
		if($type == '1'){
			
			header('Location: izin_prinsip.php?page=list_detail&id='.$id_ip.'&did=3');
		}else{
			header('Location: izin_prinsip.php?page=list&did=3');
		}
	break;
	case 'download';
	
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$query = select_pict($id);
		
	
	header('Content-disposition: attachment; filename='.$query['1'].'-'.$query['0'].'.jpg');
		header('Content-type: application/jpeg');
		readfile(''.$query['2'].'');
		
	
	exit();
	break;
}

?>