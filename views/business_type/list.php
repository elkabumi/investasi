 

  <section class="content-header">
                    <h1>
                       <?= $title?>
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
                   
               <div class="callout callout-info">
                <h4>Sukses !</h4>
                <p>Simpan data berhasil</p>
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="callout callout-info">
                <h4>Sukses !</h4>
                <p>Edit data berhasil</p>
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
               <div class="callout callout-info">
                <h4>Sukses !</h4>
                <p>Hapus data berhasil</p>
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
                                 <table data-filter="#filter" class="footable" data-page-size="10" id="new_table">
      <thead>
        <tr>
         
         									 	<th  data-class="expand" data-sort-initial="true" data-type="numeric">No</th>
                                            	<th>Kode bidang usaha</th>
                                                <th>Nama bidang usaha</th>
                                                <th>keterangan</th>
                                                <th width="25%">Config</th>
        </tr>
      </thead>
      <tbody>
         <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            	<td><?= $no ?></td>
                                             	<td><?= $row['business_type_code']?></td>
                                                <td><?= $row['business_type_name']?></td>
                                                <td><?= $row['business_type_description']?></td>
            
                                    
                                                 <td style="text-align:center;">
                                                                
                                                
                                                 <a href="business_type.php?page=form&id=<?= $row['business_type_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                 
                                                <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['business_type_id']; ?>,'business_type.php?page=delete&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>
                                             </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>
       
			
      </tbody>
      <tfoot class="footable-pagination">
        <tr>
          <td colspan="19"><div class="pagination pagination-centered"></div></td>
        </tr>
      </tfoot>
    </table>

                              </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->