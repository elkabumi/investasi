<?php 
$content = '';
$content .= '
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" size=24>Laporan Detail </td>
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
		"Jumlah Hari",
		"Jumlah Truk",
		"Jumlah Pengiriman",
		"Jumlah Volume"
		);
$content_box = array($jumlah_hari, $jumlah_truk, $jumlah_pengiriman, $jumlah_volume);
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
                                            	<td align="right" size=14 >'; $content .= number_format($total_jasa_angkut); $content .= '</td>
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
                                                <td width="5%">No</td>
                                                <td>Tanggal</td>
                                                <td>Jam</td>
                                                <td>Kode</td>
                                                 <td>Nopol</td>
												  <td>P x L x T</td>
												  
												  <td>Nama Pemilik</td>
                                                  <td>Volume</td>
                                                  <td>Jasa Angkut</td>
                                                  <td>Subsidi Tol</td>
                                                  <td>Harga Urukan</td>
                                                  <td>HPP</td>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                            
                                             
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_item)){
                                       $content .= '
                                            <tr>
                                            <td>';  $content .= $no_item;
											 $content .= '</td>
												<td>';
												 $content .= $row_item['tanggal_transaksi']; 
												  $content .= '</td>
                                                <td>'; $content .= get_hour($row_item['transaction_date']); 
												 $content .= '</td>
                                                 <td>'; $content .=  $row_item['truck_code'];
												  $content .= '</td>
                                                <td>';  $content .=  $row_item['truck_nopol']; 
												 $content .= '</td>
												<td>'; $content .=  $row_item['truck_p'].' x '. $row_item['truck_l'].' x '. $row_item['truck_t']; 
												 $content .= '</td>
                                                
                                                <td>'; $content .=  $row_item['owner_name'];
												 $content .= '</td>
												<td>';
												$vol = str_replace(".",",",  $row_item['volume']);
												 $content .=  $vol;
												  $content .= '</td>
                       							<td align="right">'; $content .=  number_format($row_item['volume'] * $row_item['transaction_transport_service']);
												 $content .= '</td>
                                                <td align="right">';
												$content .=  number_format($row_item['transaction_toll_subsidy']);
												$content .= '</td>
                                                <td align="right">';
												$content .= number_format($row_item['transaction_land_price']);
												$content .= '</td>
                                                <td align="right">'; 
												 $content .= number_format($row_item['transaction_hpp']);
												  $content .= '</td>
                                                 </tr>';
                                           
                                        

                                              
											$no_item++;
                                            }
                                            
											
                                            $content .= '
											
											<tr bgcolor="#FFFF00">
                                              <td align="right" colspan="';
											  $new_col = 8; 
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
$p->output('Report_detail.pdf','I');
?>
									
									

