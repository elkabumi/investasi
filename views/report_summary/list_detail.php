<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $title?> 
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title?> </a></li>
                        
                        <li class="active">Form</li>
                    </ol>
                </section>
                
                 <?php
                if(isset($_GET['err']) && $_GET['err'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-warning"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Data Item masih kosong
                </div>
           
                </section>
                <?php
                }
				?>

                <!-- Main content -->
                <section class="content">
              
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
                                                 <th>Nopol</th>
												  <th>P x L x T</th>
												  <th>Volume</th>
												  <th>Nama Pemilik</th>
                                                  <th>Checker</th>
                                                <th width="20%">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                 
                                                 <?php
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_detail)){
                                       ?>
                                  
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= $row_item['tanggal_transaksi']; ?></td>
                                                <td><?= $row_item['transaction_hour']; ?></td>
                                                <td><?= $row_item['truck_nopol']?></td>
												<td><?php echo $row_item['truck_p']."". $row_item['truck_l']."". $row_item['truck_t']; ?></td>
                                                <td><?= $row_item['volume']?></td>
                                                <td><?= $row_item['owner_name']?></td>
												<td><?= $row_item['user_name']?></td>
                                            	<td><?= $row_item['transaction_description']?></td>
                       
                                                 </tr>
                                        

                                              <?php
											$no_item++;
                                            }
                                            ?>

                                       </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="4"><a href="<?= $close_button ?>" class="btn btn-default" >Close</a></th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                </section>