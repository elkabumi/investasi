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
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><a href="<?= $add_button ?>" class="btn btn-danger" >Tambah Data</a></td>
    <td align="right"><input id="filter" type="text" class="search_new" placeholder="Cari disini" size="30" /></td>
  </tr>
</table>
                                    <table data-filter="#filter" class="footable" data-page-size="10">
                                        <thead>
                                            <tr>
                                            <th  data-sort-initial="true"  data-class="expand">No</th>
                                                <th>Code</th>
                                                <th>Name</th>
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
                                         <tfoot class="footable-pagination">
        <tr>
          <td colspan="5"><ul id="pagination" class="footable-nav" /></td>
        </tr>
      </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->