<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/report_summary_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("Report summary");

$_SESSION['menu_active'] = 3;

switch ($page) {
	
	case 'list':
		get_header();

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$date_default = "";
		$date_url = "";
		$i_owner_id = "";
		
		if(isset($_GET['preview'])){
			$i_date = get_isset($_GET['date']);
			$date_default = $i_date;
			$date_url = "&date=".str_replace(" ","", $i_date);
			$i_owner_id = get_isset($_GET['owner']);
		}
		
		$action = "report_summary.php?page=form_result&preview=1";
		
		include '../views/report_summary/form.php';
		
		if(isset($_GET['preview'])){
			
				if(isset($_GET['date'])){
					$i_date = $_GET['date'];
				}else{
					extract($_POST);
					$i_date = get_isset($i_date);
				}
			
			$date = format_back_date($i_date);
			
			$i_owner_id = get_isset($_GET['owner']);
			
			$query_item = select_summary($date, $i_owner_id);
			
			$max_vol = get_max_vol($date, $i_owner_id);
			
			$total_truk = get_total_truk($date, $i_owner_id);
			$total_pengiriman = get_total_pengiriman($date, $i_owner_id);
			$total_volume = (get_total_volume($date, $i_owner_id)) ? get_total_volume($date, $i_owner_id) : 0;
			
			$total_jasa_angkut = get_total_jasa_angkut($date, $i_owner_id);
			$total_subsidi_tol = get_total_subsidi_tol($date, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date, $i_owner_id);
			$total_hpp = get_total_hpp($date, $i_owner_id);
			
			include '../views/report_summary/form_result.php';
			include '../views/report_summary/list_total.php';
			
			if($total_truk > 0){
				include '../views/report_summary/list_item.php';
			}
		}
		
		
		get_footer();
	break;

	case 'form_result':
		

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		
		$date_default = "";
		$date_url = "";
		
		//if(isset($_GET['preview'])){
			$i_owner_id = (isset($_POST['i_owner_id'])) ? $_POST['i_owner_id'] : null;
			extract($_POST);
			$i_date = (isset($_POST['i_date'])) ? $_POST['i_date'] : null;
			$date_default = $i_date;
			$date_url = "&date=".str_replace(" ","", $i_date);
		//}
		
		header("Location: report_summary.php?page=list&preview=1&date=$date_default&owner=$i_owner_id");
	break;
	

	
	case 'form_detail':
		$title = ucfirst("Report Event Detail");
		get_header();


			$id = (isset($_GET['id'])) ? $_GET['id'] : null;
			$date1 = (isset($_GET['date1'])) ? $_GET['date1'] : null;
			$date2 = (isset($_GET['date2'])) ? $_GET['date2'] : null;
			$owner_id = (isset($_GET['owner'])) ? $_GET['owner'] : null;
		
			
			$query_detail=read_id($date1,$date2,$id);
			$date1 = format_back_date4($date1);
			$date2 = format_back_date4($date2);
		
			$close_button = "report_summary.php?page=list&preview=1&date=$date1 - $date2&owner=$owner_id"; 
			
			include '../views/report_summary/list_detail.php';
		get_footer();
	break;
	
	case 'download':

			$date = get_isset($_GET['date']);
			$date_view = $date;
			$date = format_back_date($date);
			$i_owner_id = get_isset($_GET['owner']);
			
			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}
			
			$query_item = select_summary($date, $i_owner_id);
			
			$max_vol = get_max_vol($date, $i_owner_id);
			
			$total_truk = get_total_truk($date, $i_owner_id);
			$total_pengiriman = get_total_pengiriman($date, $i_owner_id);
			$total_volume = (get_total_volume($date, $i_owner_id)) ? get_total_volume($date, $i_owner_id) : 0;
			$total_volume = str_replace(".",",", $total_volume);
			
			$total_jasa_angkut = get_total_jasa_angkut($date, $i_owner_id);
			$total_jasa_angkut = str_replace(".",",", $total_jasa_angkut);
			$total_subsidi_tol = get_total_subsidi_tol($date, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date, $i_owner_id);
			$total_hpp = get_total_hpp($date, $i_owner_id);
			
			//$title = 'ABSENSI';
			
			$title = 'report_summary_'.$date;
			$supplier_title = str_replace(" ","_", $supplier);
			$format = create_report($title."_".$supplier_title."_".$_GET['date']);
			
			include '../views/report/report_summary.php';
			

	break;
	
	case 'download_pdf':
		$date = get_isset($_GET['date']);
		$date_view = $date;
			$date = format_back_date($date);
			$i_owner_id = get_isset($_GET['owner']);
			
			if($i_owner_id == 0){
				$supplier = "All Supplier";
			}else{
				$supplier = get_data_owner($i_owner_id);
			}
			
			$query_item = select_summary($date, $i_owner_id);
			
			$max_vol = get_max_vol($date, $i_owner_id);
			
			$total_truk = get_total_truk($date, $i_owner_id);
			$total_pengiriman = get_total_pengiriman($date, $i_owner_id);
			$total_volume = (get_total_volume($date, $i_owner_id)) ? get_total_volume($date, $i_owner_id) : 0;
			$total_volume = str_replace(".",",", $total_volume);
			
			$total_jasa_angkut = get_total_jasa_angkut($date, $i_owner_id);
			$total_jasa_angkut = str_replace(".",",", $total_jasa_angkut);
			$total_jasa_angkut = intval($total_jasa_angkut);
			
			$total_subsidi_tol = get_total_subsidi_tol($date, $i_owner_id);
			$total_transport = $total_jasa_angkut + $total_subsidi_tol;
			$total_harga_urukan = get_total_harga_urukan($date, $i_owner_id);
			$total_hpp = get_total_hpp($date, $i_owner_id);
			
			include '../views/report/report_summary_pdf.php';
			/*
			 include(dirname(__FILE__).'/../views/report/report_summary_pdf.php');
			$content = ob_get_clean();
		
			// convert to PDF
			require_once(dirname(__FILE__).'/../lib/htmltopdf/html2pdf.class.php');
			try
			{
				$html2pdf = new HTML2PDF('L', 'A4', 'fr');
				$html2pdf->pdf->SetDisplayMode('fullpage');
		//      $html2pdf->pdf->SetProtection(array('print'), 'spipu');
				$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output('exemple07.pdf');
			}
			catch(HTML2PDF_exception $e) {
				echo $e;
				exit;
			}*/
	break;
	
	
	
	
	
	
}

?>