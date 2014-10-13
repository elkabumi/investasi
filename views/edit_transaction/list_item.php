

              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Tanggal</th>
                                                
                                                 <th>Nopol</th>
                                                 
												  <th>P x L X T</th>
                                                 
												  <th>Nama Pemilik</th>
												  <th>Jumlah Rit</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_item)){
												
											$j_par = mysql_query("select count(*) as jumlah_participant from transactions where truck_id = '".$row_item['truck_id']."' AND transaction_date >= '$date1 00:00:00'
									AND transaction_date <= '$date2 23:59:59'");
											$r_par = mysql_fetch_object($j_par);
						
                                            ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= $row_item['tanggal_transaksi']; ?></td>
                                               
                                                <td><?= $row_item['truck_nopol']?></td>
                                               
												<td><?php echo $row_item['truck_p']." x ". $row_item['truck_l']." x ". $row_item['truck_t']; ?></td>
                                               
                                                <td><?= $row_item['owner_name']?></td>
												<td><?php echo $r_par->jumlah_participant; ?></td>
                                               
                                               
                                                <td style="text-align:center;">
                                                    <a href="edit_transaction.php?page=form_detail&id=<?= $row_item['truck_id']?>&date1=<?= $date1?>&date2=<?=$date2?><? if($i_owner_id != '0'){?>&owner=<?= $row_item['owner_id']?><? }else{ ?>&owner=0<? } ?>" class="btn btn-default" >Detail</a>
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
                  

                