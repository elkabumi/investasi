  <section class="content-header">
                    <h1>
                        <?= $title ?>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title ?></a></li>
                      
                        <li class="active">Data</li>
                    </ol>
                </section>

                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Tambah data truck Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
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
                                            <th>Kode</th>
                                                <th>Nopol</th>
                                                <th>P x L x T</th>
                                               
                                                <th>Volume(m3)</th>
                                                <th>Pemilik</th>
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no ?></td>
                                             <td><?= $row['truck_code']?></td>
                                                <td><?= $row['truck_nopol']?></td>
                                                <td><?= $row['truck_p']." x ".$row['truck_l']." x ".$row['truck_t']?></td>
                                                <td><?= $row['truck_volume']?></td>
                                                <td><?= $row['owner_name']?></td>
                                               
                                                <td style="text-align:center;">
                                            <?	if(isset($_GET['type']) == '1'){
											?>
                                                <a href="edit_transaction.php?page=form&id=<?= $row['truck_id']; ?>" class="btn btn-default" >Proses</a></td>		
											<?
												}else{
												?>
                                                <a href="transaction.php?page=form&id=<?= $row['truck_id']; ?>" class="btn btn-default" >Proses</a></td>
                                                <? } ?>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="7"><a href="<?= $add_truck ?>" class="btn btn-default" >Add</a>
                                                <?php if(isset($_GET['type']) == '1'){
													?>
												<a href="<?= $close ?>" class="btn btn-default" >Close</a>	
												<?php } ?></th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->