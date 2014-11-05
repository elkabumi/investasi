<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/business_type_model.php';



$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$title = "BIdang Usaha";

switch ($page) {
	case 'list':
		get_header();

		
		
		$query = select();
		log_data(1, 0, $_SESSION['user_id'], "bidang usaha");
		
		$add_button = "business_type.php?page=form";


		include '../views/business_type/list.php';
		
		
		get_footer();
	break;
	case 'form':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$close_button = "business_type.php?page=list";
		if($id){
			$row = read_id($id);
			//log_data(1, $id, $_SESSION['user_id'], "Kabupaten/Kota");
			$action = "business_type.php?page=edit&id=$id ";
		} else{
			//inisialisasi
			$row = new stdClass();
			$row->business_type_name = false;
			$row->business_type_desc = false;
			$action = "business_type.php?page=save";
		}
		

		include '../views/business_type/form.php';
		
		
		get_footer();
	break;
	
	case 'save':

		extract($_POST);
		
			
		$i_nama = get_isset($i_nama);
		$i_keterangan = get_isset($i_keterangan);
		$i_category = get_isset($i_category);
		
		$data = "'', '$i_nama', '$i_keterangan', '$i_category'";
	
		create($data);
		$id = mysql_insert_id();
		log_data(2, $id, $_SESSION['user_id'], "bidang usaha");
		
		show_message("Simpan berhasil", "business_type.php?page=list&did=1");
	break;
	
	case 'edit':
		
		$id = get_isset($_GET['id']);	
		extract($_POST);
		$i_nama = get_isset($i_nama);
		$i_keterangan = get_isset($i_keterangan);
		$i_category = get_isset($i_category);
		$data = "business_type_name = '$i_nama',
				 	business_type_description = '$i_keterangan',
					business_parent_type_id  = '$i_category'";
		
		update($data, $id);
		log_data(3, $id, $_SESSION['user_id'], "bidang usaha");
		show_message("Simpan berhasil", "business_type.php?page=list&did=2");
	break;
	
	case 'delete':
		
		
		$id = get_isset($_GET['id']);	
		
		delete($id);
		log_data(4, $id, $_SESSION['user_id'], "bidang usaha");
			
			header('Location: business_type.php?page=list&did=3');
	break;
}

?>