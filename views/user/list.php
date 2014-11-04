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
               Edit Berhasil
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
                }else if(isset($_GET['did']) && $_GET['did'] == 4){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               User berhasil di aktifkan
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 5){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               User berhasil di nonaktifkan
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
                               
                               
                               
         
              
        
           <?php
                               include '../views/layout/search.php';
							   ?>
            <table class="footable metro-blue" data-filter="#filter" data-page-size="10" id="new_table">
                <thead>
                <tr>
                     <th data-class="expand" data-sort-initial="true">No</th>
                                                
                                                <th >Name</th>
                                                  <th data-hide="phone">Type</th>
                                                   <th data-hide="phone">Phone</th> 
                                                    <th>Config</th> 
                </tr>
                </thead>
                <tbody>
                <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                              
                                                <td><?= $row['user_name']?></td>
                                                <?php
												$tipe = array("","Admin","Kepala Bidang", "Staf Input", "View Data");
												?>
                                                 <td><?= $tipe[$row['user_type_id']] ?></td>
                                                 <td><?= $row['user_phone']?></td>
                                               
                                               <td style="text-align:center;">

                                                  <?php
                                                  if($row['user_active_status'] == 1){
												  ?>
                                                    <a href="javascript:void(0)" onclick="confirm_user_deactived(<?= $row['user_id']; ?>,'user.php?page=deactived&id=')" class="btn btn-default" title="Non Aktifkan Data" >X</a>
                                                    
                                                    <?php
												  }else{
													?>
                                                     <a href="javascript:void(0)" onclick="confirm_user_actived(<?= $row['user_id']; ?>,'user.php?page=actived&id=')" class="btn btn-default" title="Aktifkan Data" ><i class="fa fa-check"></i></a>
                                                    <?php
												  }
													?>
 <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['user_id']; ?>,'user.php?page=delete&id=')" class="btn btn-default" title="Hapus Data" ><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        <div class="pagination pagination-centered"></div>
                    </td>
                </tr>
                </tfoot>
            </table>
                               

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->