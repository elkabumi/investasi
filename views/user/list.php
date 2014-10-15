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
                                                <th data-hide="phone">Code</th>
                                                <th >Name</th>
                                                  <th data-hide="phone">Type</th>
                                                   <th data-hide="phone">Phone</th> 
                </tr>
                </thead>
                <tbody>
                <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                                <td><?= $row['user_code']?></td>
                                                <td><?= $row['user_name']?></td>
                                                <?php
												if($row['user_type_id'] == 1){?>
                                                    <td>Admin</td>
                                                    <? }else{ ?>
                                                    <td>Eksternal</td>
                                                    <?
													}
                                                ?>
                                                 <td><?= $row['user_phone']?></td>
                                               
                                               <!-- <td style="text-align:center;">

                                                    <a href="user.php?page=form&id=<?= $row['user_id']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['user_id']; ?>,'user.php?page=delete&id=')" class="btn btn-danger" ><i class="fa fa-trash-o"></i></a>

                                                </td> -->
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">
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