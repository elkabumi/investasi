
              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Kode</th>
                                                 <th>Nopol</th>
                                                  <th>Supir</th>
												  <th>P x L x T</th>
												  
												  <th>Nama Pemilik</th>
                                                  <th>Volume</th>
                                                  <th>Jasa Angkut</th>
                                                  <th>Subsidi Tol</th>
                                                  <th>Harga Urukan</th>
                                                  <th>HPP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_item)){
                                       ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= $row_item['tanggal_transaksi']; ?></td>
                                                <td><?= $row_item['transaction_hour']; ?></td>
                                                 <td><?= $row_item['truck_code']?></td>
                                                <td><?= $row_item['truck_nopol']?></td>
                                                <td><?= $row_item['truck_driver']?></td>
												<td><?php echo $row_item['truck_p']." x ". $row_item['truck_l']." x ". $row_item['truck_t']; ?></td>
                                                
                                                <td><?= $row_item['owner_name']?></td>
												<td><?= $row_item['volume']?></td>
                       							<td><?= tool_format_number($row_item['volume'] * $row_item['transaction_transport_service'])?></td>
                                                <td><?= tool_format_number($row_item['transaction_toll_subsidy'])?></td>
                                                <td><?= tool_format_number($row_item['transaction_land_price'])?></td>
                                                <td><?= tool_format_number($row_item['transaction_hpp'])?></td>
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
                  

                