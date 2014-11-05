<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/city_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 2;
$title = "Kabupaten/Kota";

switch ($page) {
	case 'list':
		get_header();

		log_data(1, 0, $_SESSION['user_id'], "Kabupaten/Kota");


		
		$query = select();
		$add_button = "city.php?page=form";


		include '../views/city/list.php';
		
		
		get_footer();
	break;
	case 'form':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$close_button = "city.php?page=list";
		if($id){
			
			$row = read_id($id);
			//log_data(1, $id, $_SESSION['user_id'], "Kabupaten/Kota");

			$action = "city.php?page=edit&id=$id ";
		} else{
			//inisialisasi
			$row = new stdClass();
			$row->city_name = false;
			$row->city_desc = false;
			$action = "city.php?page=save";
		}
		

		include '../views/city/form.php';
		
		
		get_footer();
	break;
	
	case 'save':

		extract($_POST);
		
			
		$i_nama = get_isset($i_nama);
		$i_keterangan = get_isset($i_keterangan);
	
		
		$data = "'', '$i_nama', '$i_keterangan'";
	
		create($data);
		$id = mysql_insert_id();
		log_data(2, $id, $_SESSION['user_id'], "Kabupaten/Kota");
		
		show_message("Simpan berhasil", "city.php?page=list&did=1");
	break;
	
	case 'edit':
		
		$id = get_isset($_GET['id']);	
		extract($_POST);
		$i_nama = get_isset($i_nama);
		$i_keterangan = get_isset($i_keterangan);
		$data = "city_name = '$i_nama',
				city_desc = '$i_keterangan'";
		
		update($data, $id);
		log_data(3, $id, $_SESSION['user_id'], "Kabupaten/Kota");
		
		show_message("Simpan berhasil", "city.php?page=list&did=2");
	break;
	
	case 'delete':
		
		
		$id = get_isset($_GET['id']);	
		
		delete($id);
	
		log_data(4, $id, $_SESSION['user_id'], "Kabupaten/Kota");
		
			header('Location: city.php?page=list&did=3');
	break;
}

?>