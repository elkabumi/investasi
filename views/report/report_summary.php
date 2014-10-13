<?php echo $format; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="font-size:32px; font-weight:bold;" colspan="12">Laporan Harian </td>
  </tr>
  <tr>
    <td align="center" style="font-size:22px; font-weight:bold;"  colspan="12"><?= $supplier." - ".$date_view ?></td>
  </tr>
</table>

<br />
<table border="1" cellpadding="4" cellspacing="0" class="table table-bordered"> 
 <thead>
                                            <tr>
 <?php
$title = array(
		"Tanggal",
		"Jumlah Truk",
		"Jumlah Pengiriman",
		"Jumlah Volume"
		);
$content = array($date, $total_truk, $total_pengiriman, $total_volume);
for($i=0; $i<=3; $i++){
?>
    <th  bgcolor="#dddddd"><?= $title[$i]?></th>
     <?php } ?>
  </tr>
  </thead>
<tbody>
  <tr> <?php
for($i2=0; $i2<=3; $i2++){
?>
    <td  style="font-size:24px;"><?= $content[$i2] ?></td>
   <?php } ?>   
  </tr></tbody>

</table>             
                   
                   

              <br />
                  
                                    <table border="1" cellpadding="4" cellspacing="0" class="table table-bordered">
                                        <thead>
                                            <tr bgcolor="#dddddd">
                                            <th >Total Jasa Angkut</th>
                                                <th >Total Subsidi Tol</th>
                                                <th >Total Transport</th>
                                                <th >Total Harga Tanah</th>
                                                 <th >Total HPP</th>
												 
                                            </tr>
                                        </thead>
                                        <tbody>
                                                
                                            <tr>
                                            	<td ><?= format_report($total_jasa_angkut) ?></td>
												<td ><?= format_report($total_subsidi_tol) ?></td>
                                                <td><?= format_report($total_transport) ?></td>
                                                <td ><?= format_report($total_harga_urukan) ?></td>
                                                <td bgcolor="#FFFF00" style="font-weight:bold;"><?= format_report($total_hpp) ?></td>
											
                       
                                                 </tr>
                                        

                                             

                                          
                                        </tbody>
                                         
                                    </table>


                
                <!-- list item -->
                <br />
  <table border="1" cellpadding="4" cellspacing="0"  class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr bgcolor="#dddddd">
                                            <?php
                                            $nb = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
											?>
                                            <th width="5%" rowspan="2">No</th>
                                               
                                                <th rowspan="2">Jam</th>
                                                 <th rowspan="2">Kode</th>
                                                 <th rowspan="2"><?= $nb?>Nopol<?= $nb?></th>
												  <th rowspan="2"><?= $nb?>Suplier<?= $nb?></th>
												  <th colspan="<?= $max_vol?>">Volume Pengiriman</th>
                                                   <th rowspan="2">Total Rit</th>
                                                   <th rowspan="2">Total Volume</th>
                                                   <th rowspan="2">Jasa Angkut Per Rit M3</th>
                                                   <th rowspan="2">Subsidi Tol</th>
                                                   <th rowspan="2">Harga Tanah Per Rit Truk</th>
                                                   <th rowspan="2">Total Jasa Angkut</th>
                                                   <th rowspan="2">Total Subsidi Tol</th>
                                                   <th rowspan="2">Total Harga Urukan</th>
                                                   <th rowspan="2"> HPP<?= $nb?></th>
                                            </tr>
                                            <tr bgcolor="#dddddd">
                                            	<?php
                                                for($i_v=1; $i_v<=$max_vol; $i_v++){
												?>
                                               <th>Vol-<?= $i_v?><?= $nb?></th>
                                                <?php
												}
												?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_item)){
												
											$j_par = mysql_query("select count(*) as jumlah_rit from transactions where truck_id = '".$row_item['truck_id']."' AND transaction_date like '$date%'");
											$r_par = mysql_fetch_object($j_par);
						
                                            ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
											
                                                <td><?= get_hour($row_item['transaction_date']); ?></td>
                                                <td><?= $row_item['truck_code']; ?></td>
                                                <td><?= $row_item['truck_nopol']?></td>
                                                <td><?= $row_item['owner_name']?></td>
												
                                                <?php
												$n_vol = 0;
                                                $q_vol = mysql_query("select truck_volume from transactions where truck_id = '".$row_item['truck_id']."' AND transaction_date like '$date%'");
												while($r_vol = mysql_fetch_array($q_vol)){
												?>
                                                
                                                <td><?php $vol_no = $r_vol['truck_volume']; 
												$vol_no = str_replace(".",",",  $vol_no);
												echo $vol_no;
												?></td>
                                               <?php
											   $n_vol++;
												}
											   
											   $selisih_v = $max_vol - $n_vol;
											   $td = "";
											   if($selisih_v > 0){
												   for($icv=1; $icv<=$selisih_v; $icv++){
													   $td .= "<td>&nbsp;</td>";
												   }
											   }
											   
											   echo $td;
											   ?>
                                               
                                               
                                                <td><?= $r_par->jumlah_rit?></td>
                                                <td><?php
														$jumlah_volume =  get_jumlah_volume($date, $row_item['truck_id']);
														
														$jumlah_volume_view = str_replace(".",",",  $jumlah_volume);
												
														echo $jumlah_volume_view; ?></td>
                                                <td><?= ($row_item['transaction_transport_service']); ?></td>
                                                <td><?= ($row_item['transaction_toll_subsidy']); ?></td>
                                                <td><?= ($row_item['transaction_land_price']); ?></td>
                                                <td><?php 
													$jumlah_jasa_angkut =  $jumlah_volume * $row_item['transaction_transport_service']; 
													echo ($jumlah_jasa_angkut); ?></td>
                                                <td><?php
                                                	$jumlah_subsidi_tol = $r_par->jumlah_rit *  $row_item['transaction_toll_subsidy'];
													echo ($jumlah_subsidi_tol);
												?></td>
                                                <td><?php
                                                	$jumlah_harga_urukan = $r_par->jumlah_rit *  $row_item['transaction_land_price'];
													echo ($jumlah_harga_urukan);
												?></td>
                                                <td><b><?php
                                                	$hpp = $jumlah_jasa_angkut + $jumlah_subsidi_tol + $jumlah_harga_urukan;
													echo ($hpp);
												?></b></td>
                                                </tr>
                                            
                                            <?php
											$no_item++;
                                            }
                                            ?>
											<tr bgcolor="#FFFF00">
                                              <td colspan="<?php $new_col = $max_vol + 10; echo $new_col; ?>" align="right"><strong>TOTAL</strong></td>
                                              <td><strong>
                                              <?= ($total_jasa_angkut) ?>
                                              </strong></td>
                                              <td><strong>
                                              <?= ($total_subsidi_tol) ?>
                                              </strong></td>
                                              <td><strong>
                                              <?= ($total_harga_urukan) ?>
                                              </strong></td>
                                              <td><strong><span style="font-weight:bold;">
                                                <?= ($total_hpp) ?>
                                              </span></strong></td>
                                            </tr>
                                           
                                          
                                        </tbody>
                                         
                                    </table>

