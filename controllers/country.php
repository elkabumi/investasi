<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/country_model.php';


$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$title = "Negara";

switch ($page) {
	case 'list':
		get_header();

		log_data(1, 0, $_SESSION['user_id'], "negara");

		
		$query = select();
		$add_button = "country.php?page=form";


		include '../views/country/list.php';
		
		
		get_footer();
	break;
	case 'form':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		$close_button = "country.php?page=list";
		if($id){
			$row = read_id($id);
			//log_data(1, $id, $_SESSION['user_id'], "negara");
			$action = "country.php?page=edit&id=$id ";
		} else{
			//inisialisasi
			$row = new stdClass();
			$row->country_name = false;
			$row->country_desc = false;
			$action = "country.php?page=save";
		}
		

		include '../views/country/form.php';
		
		
		get_footer();
	break;
	
	case 'save':

		extract($_POST);
		
			
		$i_nama = get_isset($i_nama);
		$i_keterangan = get_isset($i_keterangan);
	
		
		$data = "'', '$i_nama', '$i_keterangan'";
	
		create($data);
		$id = mysql_insert_id();
		log_data(2, $id, $_SESSION['user_id'], "negara");
		
		show_message("Simpan berhasil", "country.php?page=list&did=1");
	break;
	
	case 'edit':
		
		$id = get_isset($_GET['id']);	
		extract($_POST);
		$i_nama = get_isset($i_nama);
		$i_keterangan = get_isset($i_keterangan);
		$data = "country_name = '$i_nama',
				 	country_description = '$i_keterangan'";
		
		update($data, $id);
		log_data(3, $id, $_SESSION['user_id'], "negara");
			
		show_message("Simpan berhasil", "country.php?page=list&did=2");
	break;
	
	case 'delete':
		
		
		$id = get_isset($_GET['id']);	
		
		delete($id);
		log_data(4, $id, $_SESSION['user_id'], "negara");
		
			header('Location: country.php?page=list&did=3');
	break;
}

?>