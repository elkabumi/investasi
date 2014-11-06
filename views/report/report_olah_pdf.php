<?php 
$content = '';
$content .= '
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	 <td align="center"  size=24 colspan="18">Laporan Olah '.$nama_category .' </td>
  </tr>
</table>';
$content .= '  
			<table border="1" cellpadding="4" cellspacing="0" >
					<thead>
                    		<tr bgcolor="#dddddd">
                                            ';
							$content .= '	<td>No</td>
												<td>Kategori</td>
                                            	<td>Nama Perusahaan</td>
                                                <td data-hide="phone">Alamat</td>
                                                <td data-hide="phone">No IP</td>
                                                <td data-hide="phone">No IU</td>
                                                <td data-hide="all">No Perusahaan</td>
                                                <td data-hide="all">No Kode Proyek</td>       
                                                <td data-hide="all">Investasi</td>
                                                <td data-hide="all">Tenaga Kerja</td>
                                                <td data-hide="all">Kapasitas</td>
                                                <td data-hide="all">Ekspor</td>                                           
                                                <td data-hide="phone">Negara</td>
                                                <td data-hide="phone">Lokasi</td>
                                                <td data-hide="phone,tablet">NPWP</td>
                                                <td data-hide="phone">Bidang Usaha</td>
                                                <td data-hide="all">Lain-lain</td>
                                                <td data-hide="all">Tahun</td>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>';
                                            
                                             
                                           $no = 1;
                                            while($row_item = mysql_fetch_array($query)){
                                       		$content .= '
                                            	<tr>
                                            		<td>';  $content .= $no;
											
											 		$content .= '</td>
													 <td>';
											 
													if($row_item['master_type_id'] == 2){
														$content .= "Realisasi ";
													}
													$content .= $row_item['master_category_name'];
												if($row_item['master_category_id'] == 6){
													$content .= " ( ".$row_item['master_ip_type_name']." )";
												} 
												$content .= '</td>
												<td>';
												 $content .= $row_item['nama_perusahaan']; 
												  $content .= '</td>
                                                <td>'; $content .= $row_item['alamat']; 
												 $content .= '</td>
                                                 <td>'; $content .=  $row_item['no_ip'];
												  $content .= '</td>
                                                <td>';  $content .=  $row_item['no_iu']; 
												 $content .= '</td>
												<td>'; $content .=  $row_item['no_perusahaan'];
												 $content .= '</td>
                                                
                                                <td>';
												$vol = $row_item['no_kode_proyek'];
												 $content .=  $vol;
												  $content .= '</td>
                       							<td align="right">'; $content .=  $row_item['investasi'];
												 $content .= '</td>
                                                <td align="right">';
												$content .= ($row_item['tenaga_kerja']);
												$content .= '</td>
                                                <td align="right">';
												$content .= ($row_item['kapasitas']);
												$content .= '</td>
                                                <td align="right">'; 
												 $content .= ($row_item['ekspor']);
												  $content .= '</td>
                                                
                                                <td>'; $content .=  $row_item['country_name'];
												 $content .= '</td>
                                                
                                                <td>'; $content .=  $row_item['city_name'];
												 $content .= '</td>
                                                
                                                <td>'; $content .=  $row_item['npwp'];
												 $content .= '</td>
												 
												 
												 <td>'; $content .=  $row_item['business_type_name'];
												 $content .= '</td>
												 <td>'; $content .=  $row_item['keterangan'];
												 $content .= '</td>
												 
												 <td>'; $content .=  $row_item['master_year'];
												 $content .= '</td>
												 
                                                
                                               
                                                 </tr>';
                                           
                                        

                                              
											$no_item++;
                                            }
                                            
											
                                            $content .= '
                                        </tbody>
                                         
                                    </table>';
									

define('FPDF_FONTPATH','../lib/pdftable/font/');
require('../lib/pdftable/lib/pdftable.inc.php');
$p = new PDFTable();
$p->AddPage();
$p->DefOrientation='L';
$p->setfont('arial','',8);
$p->SetMargins(20,20,20);
$p->htmltable($content);
$p->output($title.'.pdf','I');
?>
									
									

