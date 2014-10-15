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
                                 <table data-filter="#filter" class="footable" data-page-size="10" id="new_table">
      <thead>
        <tr>
                                            <th data-class="expand" data-sort-initial="true">No</th>
                                            	<th>Nama Perusahaan</th>
                                            <th data-hide="phone">Alamat</th>
                                                <th data-hide="phone">NO IP</th>
                                                <th data-hide="phone">NO IU</th>
                                              
                                                <th data-hide="phone">Negara</th>
                                                <th data-hide="phone,tablet">Lokasi</th>
                                                <th data-hide="phone,tablet">NPWP</th>
                                                <th data-hide="phone,tablet">Bidang Usaha</th>
                                                <th width="10%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            	<td><?= $no ?></td>
                                             	<td><?= $row['nama_perusahaan']?></td>
                                                <td><?= $row['alamat']?></td>
                                                <td><?= $row['no_ip']?></td>
                                                <td><?= $row['no_iu']?></td>
                                             
                                                <td><?= $row['country_name']?></td>
                                                <td><?= $row['city_name']?></td>
                                                <td><?= $row['npwp']?></td>
                                                <td><?= $row['business_type_name']?></td>
                                                 <td style="text-align:center;">
                                             
                                                
                                                <a href="realisasi.php?page=form&id=<?= $row['master_id']?>&master_category_id=<?= $master_category_id ?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['master_id']; ?>,'realisasi.php?page=delete&id=')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a></td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                           <tfoot class="footable-pagination">
        <tr>
          <td colspan="12"><div class="pagination pagination-centered"></div></td>
        </tr>
      </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->