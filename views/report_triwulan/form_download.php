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
                  <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            
                            
                            <div class="box">
                             
                           
                                <div class="box-body2 table-responsive">

       
            <table width="100%" class="footable" >
                <thead>
                <tr>
                     <th data-class="expand" data-sort-initial="true" data-type="numeric">No</th>
                                                
                                                <th >Nama Kolom</th>
                                                <th >Config</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                                           $no = 1;
										   $nama_kolom = array(
										   '',
										   		'Kategori',
												'Tanggal',
												'Nama Perusahaan',
												'Alamat',
												'No IP',
												'No IU',
												'No Perusahaan',
												'No Kode Proyek',
												'Investasi (Rp)',
												'Investasi ($)',
												'Kurs Dollar',
												'Tenaga Kerja Pria',
												'Tenaga Kerja Wanita',
												'Tenaga Kerja Asing',
												'Total Tenaga Kerja',
												'Kapasitas',
												'Ekspor',
												'Negara',
												'Lokasi',
												'NPWP',
												'Bidang Usaha',
												'Sub Bidang Usaha',
												'Produksi',
												'Tanggal Expired',
												'Lain-lain',
												'Tahun'
												
										   );
                                           for($i=1;$i<=13;$i++){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                              
                                                <td><?= $nama_kolom[$i] ?></td>
                                                <td>  <label>
                                            <input type="checkbox" name="i_kolom<?= $no?>" class="minimal" value="1"/>
                                        </label></td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                </tbody>
                <tfoot>
                </tfoot>
            </table>
                               

                              </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        
                         <div class="col-md-6">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">

       
            <table width="100%" class="footable" >
                <thead>
                <tr>
                     <th data-class="expand" data-sort-initial="true" data-type="numeric">No</th>
                                                
                                                <th >Nama Kolom</th>
                                                <th >Config</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                                           $no2 = 14;
                                           for($i2=14;$i2<=26;$i2++){
                                            ?>
                                            <tr>
                                            <td><?= $no2?></td>
                                              
                                                <td><?= $nama_kolom[$i2] ?></td>
                                                <td>  <label>
                                            <input type="checkbox" name="i_kolom<?= $no2?>" class="minimal" value="1"/>
                                        </label></td>
                                            </tr>
                                            <?php
											$no2++;
                                            }
                                            ?>

                </tbody>
                <tfoot>
                </tfoot>
            </table>
                               

                              </div><!-- /.box-body -->
                             
                             
                            </div><!-- /.box -->
                        </div>
                        
                       
                        
                    </div> <input class="btn btn-cokelat" type="submit" value="Download Excel"/> </form>

                </section><!-- /.content -->