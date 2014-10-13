<?php 
$content = '';
$content .= '
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" size=24>Laporan Harian </td>
  </tr>
  
  <tr>
    <td align="center" size=18 >'; $content .= $supplier." - ".$date_view; $content .='</td>
  </tr>
</table>';

$content .= '

<br />
<table border="1" cellpadding="4" cellspacing="0" > 
 <thead>
                                            <tr>';
 $title = array(
		"Tanggal",
		"Jumlah Truk",
		"Jumlah Pengiriman",
		"Jumlah Volume"
		);
$content_box = array($date_view, $total_truk, $total_pengiriman, $total_volume);
for($i=0; $i<=3; $i++){

$content .= '<td bgcolor="#CCCCCC" style=bold><strong>';
$content .= $title[$i];
$content .= '</strong></td>';
      } 
$content .= '
  </tr>
  </thead>
<tbody>
  <tr>';
  
for($i2=0; $i2<=3; $i2++){

$content .= '    <td align="right" size=14 >';
 $content .= ($content_box[$i2]);
 $content .= '</td>';
   } 
$content .= '   
  </tr></tbody>

</table>';


$content .= '             
                   
                   

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

                  
                                    <table width="100%" border="1" cellpadding="4" cellspacing="0">
                                        <thead>
                                            <tr bgcolor="#dddddd" >
                                            <td style=bold>Total Jasa Angkut</td>
                                                <td style=bold>Total Subsidi Tol</td>
												<td style=bold>Total Transport</td>
                                                <td style=bold>Total Harga Urukan</td>
                                                 <td style=bold>Total HPP</td>
												 
                                            </tr>
                                        </thead>
                                        <tbody>
                                                
                                            <tr>
                                            	<td align="right" size=14 >'; $content .= number_format($total_jasa_angkut,0); $content .= '</td>
												<td align="right" size=14 >'; $content .= number_format($total_subsidi_tol,0); $content .= '</td>
												<td align="right" size=14 >'; $content .= number_format($total_transport,0); $content .= '</td>
                                                <td align="right" size=14 >'; $content .= number_format($total_harga_urukan,0); $content .= '</td>
                                                <td bgcolor="#FFFF00" align="right" size=16 >';  $content .= number_format($total_hpp,0); $content .= '</td>
											
                       
                                                 </tr>
                                        

                                             

                                          
                                        </tbody>
                                         
                                    </table>';
									
									


                
           $content .= '     <!-- list item -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

  <table border="1" cellpadding="4" cellspacing="0" >
                                        <thead>
                                            <tr bgcolor="#dddddd">
                                            ';
											
                                            $nb = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
											$content .= '
                                            <td width="5%" rowspan="2" style=bold>No</td>
                                               
                                                <td rowspan="2" style=bold>Jam</td>
                                                 <td rowspan="2" style=bold>Kode</td>
                                                 <td rowspan="2" style=bold>'; $content .=  $nb; $content .= 'Nopol'; $content .=  $nb; $content .= '</td>
												  <td rowspan="2" style=bold>'; $content .= $nb; $content .= 'Suplier'; $content .=  $nb; $content .= '</td>
												  <td style=bold colspan="'; $content .= $max_vol; $content .= '" >Volume Pengiriman</td>
                                                   <td rowspan="2" style=bold>Total Rit</td>
                                                   <td rowspan="2" style=bold>Total Volume</td>
                                                   <td rowspan="2" style=bold>Jasa Angkut Per Rit M3</td>
                                                   <td rowspan="2" style=bold>Subsidi Tol</td>
                                                   <td rowspan="2" style=bold>Harga Tanah Per Rit Truk</td>
                                                   <td rowspan="2" style=bold>Total Jasa Angkut</td>
                                                   <td rowspan="2" style=bold>Total Subsidi Tol</td>
                                                   <td rowspan="2" style=bold>Total Harga Urukan</td>
                                                   <td rowspan="2" style=bold> HPP';  $content .= $nb; $content .= '</td>
                                            </tr>
                                            <tr bgcolor="#dddddd">';
											    for($i_v=1; $i_v<=$max_vol; $i_v++){
												
                                               $content .= '<td style=bold>Vol-';  
											   $content .= $i_v.$nb;
											   $content .= '</td>';
                                                
												}
												$content .= '
                                            </tr>
                                        </thead>
                                        <tbody>';
                                            
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_item)){
												
											$j_par = mysql_query("select count(*) as jumlah_rit from transactions where truck_id = '".$row_item['truck_id']."' AND transaction_date like '$date%'");
											$r_par = mysql_fetch_object($j_par);
						
                                            $content .= '
                                            <tr>
                                            <td>';
											
											$content .= $no_item;
											$content .= '</td>
											
                                                <td>';
												$content .= get_hour($row_item['transaction_date']); 
												$content .= '</td>
                                                <td>';
												$content .= $row_item['truck_code']; 
												$content .= '</td>
                                                <td>';
												$content .= $row_item['truck_nopol'];
												$content .= '</td>
                                                <td>';
												$content .= $row_item['owner_name']; $content .= '
												</td>';
												$n_vol = 0;
                                                $q_vol = mysql_query("select truck_volume from transactions where truck_id = '".$row_item['truck_id']."' AND transaction_date like '$date%'");
												while($r_vol = mysql_fetch_array($q_vol)){
												$content .= '
                                                <td>';
												$vol_no = $r_vol['truck_volume']; 
												$vol_no = str_replace(".",",",  $vol_no);
												$content .=  $vol_no;
												$content .= '</td>';
                                               
											   $n_vol++;
												}
											   
											   $selisih_v = $max_vol - $n_vol;
											   $td = "";
											   if($selisih_v > 0){
												   for($icv=1; $icv<=$selisih_v; $icv++){
													   $td .= "<td>&nbsp;</td>";
												   }
											   }
											   
											   $content .=  $td;
											   
                                               $content .= '
                                                <td>';
												$content .= $r_par->jumlah_rit;
												$content .= '</td>
                                                <td>';
														$jumlah_volume =  get_jumlah_volume($date, $row_item['truck_id']);
														
														$jumlah_volume_view = str_replace(".",",",  $jumlah_volume);
												
														$content .=  $jumlah_volume_view; 
												$content .= '</td>
                                                <td  align="right">';
												$content .= number_format($row_item['transaction_transport_service'], 0); 
												$content .= '</td>
                                             	<td  align="right">';
												$content .= number_format($row_item['transaction_toll_subsidy'], 0); 
												$content .= '</td>
                                                <td  align="right">';$content .= number_format($row_item['transaction_land_price'], 0); 
												$content .= '</td>
                                                <td  align="right">'; 
													$jumlah_jasa_angkut =  $jumlah_volume * $row_item['transaction_transport_service']; 
													$content .=  number_format($jumlah_jasa_angkut, 0); 
                                                    $content .= '</td>
                                                <td  align="right">'; 
                                                	$jumlah_subsidi_tol = $r_par->jumlah_rit *  $row_item['transaction_toll_subsidy'];
													$content .=  number_format($jumlah_subsidi_tol, 0);
												$content .= '</td>
                                                <td  align="right">';
												
                                                	$jumlah_harga_urukan = $r_par->jumlah_rit *  $row_item['transaction_land_price'];
													$content .=  number_format($jumlah_harga_urukan, 0);
												$content .= '
												</td>
                                                <td  align="right"><b>';
												
                                                	$hpp = $jumlah_jasa_angkut + $jumlah_subsidi_tol + $jumlah_harga_urukan;
													$content .=  number_format($hpp, 0);
												$content .= '</b></td>
                                                </tr>';
                                            
                                            
											$no_item++;
                                            }
											
                                            $content .= '
											
											<tr bgcolor="#FFFF00">
                                              <td align="right" colspan="';
											  $new_col = $max_vol + 10; 
											  $content .=  $new_col; 
											  $content .= '" style=bold><strong>TOTAL</strong></td>
                                              <td align="right"  style=bold><strong>';
                                              $content .= number_format($total_jasa_angkut, 0);
											  $content .= '
                                              </strong></td>
                                              <td align="right" style=bold ><strong>';
                                              $content .=  number_format($total_subsidi_tol, 0);
											  $content .= '
                                              </strong></td>
                                              <td align="right"  style=bold><strong>';
                                              $content .=  number_format($total_harga_urukan, 0);
											  $content .= '
                                              </strong></td>
                                              <td align="right"  style=bold>';
											 
                                                $content .= number_format($total_hpp, 0);
												$content .= '
                                              </td>
                                            </tr>
                                           
                                          
                                        </tbody>
                                         
                                    </table>';
									

define('FPDF_FONTPATH','../lib/pdftable/font/');
require('../lib/pdftable/lib/pdftable.inc.php');
$p = new PDFTable();
$p->AddPage();
$p->setfont('arial','',12);
$p->SetMargins(20,20,20);
$p->htmltable($content);
$p->output('Report_summary.pdf','I');
?>
									
									

