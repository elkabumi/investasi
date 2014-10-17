<?php 
$content = '';
$content .= '
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" size=24>Laporan Semester '; $content .= $nama_category; $content .= ' </td>
  </tr>
  
  <tr>
    <td align="center" size=18 >'; $content .= "Semester ".$i_semester." - ".$i_master_year; $content .='</td>
  </tr>
</table>';

$content .= '

<br />
<table border="1" cellpadding="4" cellspacing="0" > 
 <thead>
                                            <tr>';
$title = array(
		"Semester - Tahun",
		"Jumlah Data",
		"Total Investasi",
		"Total Tenaga Kerja"
		);
$content_box = array($tanggal, $jumlah_data, $jumlah_investasi, $jumlah_tenaga_kerja);
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
                                                 <td data-class="expand" data-sort-initial="true">No</td>
												 <td>Kategori</td>
                                            	<td>Nama Perusahaan</td>
                                           	 <td data-hide="phone">Alamat</td>
                                                <td data-hide="phone">NO IP</td>
                                                <td data-hide="phone">NO IU</td>
                                                <td data-hide="phone">NO Perusahaan</td>
                                               
                                                <td data-hide="phone">Investasi</td>
                                               <td data-hide="phone">Tenaga Kerja</td>
                                                <td data-hide="phone">Kapasitas</td>
                                                 <td data-hide="phone">Ekspor</td>
                                                <td data-hide="phone">Negara</td>
                                                <td data-hide="phone,tablet">Lokasi</td>
                                                <td data-hide="phone,tablet">NPWP</td>
                                                <td data-hide="phone,tablet">Bidang Usaha</td>
                                                 
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
												$vol = $row_item['investasi'];
												 $content .=  $vol;
												  $content .= '</td>
                       							<td align="right">'; $content .=  $row_item['tenaga_kerja'];
												 $content .= '</td>
                                                <td align="right">';
												$content .= ($row_item['kapasitas']);
												$content .= '</td>
                                                <td align="right">';
												$content .= ($row_item['ekspor']);
												$content .= '</td>
                                                <td align="right">'; 
												 $content .= ($row_item['country_name']);
												  $content .= '</td>
                                                
                                                <td>'; $content .=  $row_item['city_name'];
												 $content .= '</td>
                                                
                                                <td>'; $content .=  $row_item['npwp'];
												 $content .= '</td>
                                                
                                                <td>'; $content .=  $row_item['business_type_name'];
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
$p->setfont('arial','',12);
$p->SetMargins(20,20,20);
$p->htmltable($content);
$p->output('Report_detail.pdf','I');
?>
									
									

