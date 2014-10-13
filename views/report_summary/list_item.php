

              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box" style="width:150% !important;">
                             
                                <div class="box-body2 table-responsive">
                                    <table  class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr>
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
                                            <tr>
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
											
                                                <td><?= $row_item['transaction_hour']; ?></td>
                                                <td><?= $row_item['truck_code']; ?></td>
                                                <td><?= $row_item['truck_nopol']?></td>
                                                <td><?= $row_item['owner_name']?></td>
												
                                                <?php
												$n_vol = 0;
                                                $q_vol = mysql_query("select truck_volume from transactions where truck_id = '".$row_item['truck_id']."' AND transaction_date like '$date%'");
												while($r_vol = mysql_fetch_array($q_vol)){
												?>
                                                
                                                <td><?= $r_vol['truck_volume'] ?></td>
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
														echo $jumlah_volume; ?></td>
                                                <td><?= tool_format_number($row_item['transaction_transport_service']); ?></td>
                                                <td><?= tool_format_number($row_item['transaction_toll_subsidy']); ?></td>
                                                <td><?= tool_format_number($row_item['transaction_land_price']); ?></td>
                                                <td><?php 
													$jumlah_jasa_angkut =  $jumlah_volume * $row_item['transaction_transport_service']; 
													echo tool_format_number($jumlah_jasa_angkut); ?></td>
                                                <td><?php
                                                	$jumlah_subsidi_tol = $r_par->jumlah_rit *  $row_item['transaction_toll_subsidy'];
													echo tool_format_number($jumlah_subsidi_tol);
												?></td>
                                                <td><?php
                                                	$jumlah_harga_urukan = $r_par->jumlah_rit *  $row_item['transaction_land_price'];
													echo tool_format_number($jumlah_harga_urukan);
												?></td>
                                                <td><b><?php
                                                	$hpp = $jumlah_jasa_angkut + $jumlah_subsidi_tol + $jumlah_harga_urukan;
													echo tool_format_number($hpp);
												?></b></td>
                                                </tr>
                                            <?php
											$no_item++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                