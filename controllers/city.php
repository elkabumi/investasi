<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/city_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";

$_SESSION['menu_active'] = 1;
$title = "Kabupaten/Kota";

switch ($page) {
	case 'list':
		get_header();

		
		
		$query = select();
		$add_button = "city.php?page=form";


		include '../views/city/list.php';
		
		
		get_footer();
	break;
	case 'form':
		get_header();
		
		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		if($id){
			$row = read_id($id);
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
		
		show_message("Simpan berhasil", "city.php?page=list&did=2");
	break;
	
	case 'delete':
		
		
		$id = get_isset($_GET['id']);	
		
		delete($id);
	
			header('Location: city.php?page=list&did=3');
	break;
}

?>