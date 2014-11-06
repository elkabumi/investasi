<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 3;

			$title = "Izin Usaha";


switch ($page) {
	case 'list':
		get_header();

		
		
		$query = select();
		log_data(1, 0, $_SESSION['user_id'], "izin usaha");
		$add_button = "master.php?page=list_izin_prinsip";


		include '../views/master/list.php';
		get_footer();
	break;
	
	case 'list_izin_prinsip':
		get_header();

		
		
		$query = select_izin_prinsip();
		
		log_data(1, 0, $_SESSION['user_id'], "izin usaha");
		
		$add_button = "izin_prinsip.php?page=form";
$close = "master.php?page=list";
		
		include '../views/master/list_izin_prinsip.php';
		get_footer();
	break;
	
	
	
	case 'form':
		get_header();

		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$type = (isset($_GET['type'])) ? $_GET['type'] : null;
		$close_button = "master.php?page=list_izin_prinsip";
		$category = (isset($_GET['category'])) ? $_GET['category'] : null;
	
			$row = read_id($id);
			
			if($type == '1'){
				$action = "master.php?page=edit&id=$id";
			
			}else{

				$action = "master.php?page=save";
			}
			$master_dollar =  get_config_dollar();

		include '../views/master/form.php';
		get_footer();
	break;


	case 'save':

		extract($_POST);
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
		$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		
		
		
		
		$i_kapasitas = get_isset($i_kapasitas);
		$i_ekspor = get_isset($i_ekspor);
		$row_id = get_isset($row_id);
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
			$data = "'', '1', '7', '$i_master_category_id', '$i_nama_perusahaan', '$i_alamat', '$i_no_ip', '$i_no_iu', '$i_no_perusahaan', '$i_no_kode_proyek',$data2, '$tenaga_kerja', '$i_kapasitas', '$i_ekspor', '$i_country_id', '$i_city_id', '$i_npwp', '$i_business_type_id','$i_business_sub_type_id','$i_keterangan', '$i_user_id', '$i_master_year', '$i_master_date', '$image','0','$row_id','','','$i_tk_laki','$i_tk_perempuan','$i_tk_asing',$data3";
		
		create($data);
		$id = mysql_insert_id();
		log_data(2, $id, $_SESSION['user_id'], "izin usaha");
	
		show_message("Simpan berhasil", "master.php?page=list&master_type_id=$master_type_id&did=1");
		
		

	break;

	
	case 'edit':
		
		$id = get_isset($_GET['id']);	
		
		extract($_POST);

		$i_master_category_id = get_isset($i_master_category_id);
		$i_nama_perusahaan = get_isset($i_nama_perusahaan);
		$i_alamat = get_isset($i_alamat);
		$i_no_ip = get_isset($i_no_ip);
		$i_no_iu = get_isset($i_no_iu);
		$i_no_perusahaan = get_isset($i_no_perusahaan);
		$i_no_kode_proyek = get_isset($i_no_kode_proyek);
		$i_investasi = get_isset($i_investasi);
		$i_investasi_dollar = get_isset($i_investasi_dollar);
		
		$i_tenaga_kerja = get_isset($i_tenaga_kerja);
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
					no_iu = '$i_no_iu', 
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
					$data2
				";
			
			
		
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
						no_iu = '$i_no_iu', 
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
		
		log_data(3, $id, $_SESSION['user_id'], "izin usaha");
		show_message("Simpan berhasil", "master.php?page=list&master_type_id=$master_type_id&did=2");

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	
		$r_img = get_img($id);
			
			if($r_img != ""){
				if(file_exists($r_img)){
					unlink($r_img); 
				}
			}
			
		delete($id);

		log_data(4, $id, $_SESSION['user_id'], "izin usaha");
		
		header('Location: master.php?page=list&did=3');

	break;
}

?>