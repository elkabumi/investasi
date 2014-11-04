
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
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Nomor Polisi sudah ada
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan Gagal !</b>
               Kode sudah digunakan
                </div>
           
                </section>
                <?php
                }
				?>
				
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          
					<form action="<?= $action?>" name="register" method="post" enctype="multipart/form-data" role="form" onsubmit="return form_investasi()">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                     <div class="col-md-6">
                                    
                                        
                                       
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama Kabupaten/kota</label>
                                            <input required type="text" name="i_nama" class="form-control" placeholder="Enter ..." value="<?= $row->city_name ?>"/>
                                        </div>
                                      
                                    
                                        
                                          
                                   
                                           <!-- textarea -->
                                        <div class="form-group">
                                            <label>Lain - lain</label>
                            <textarea class="form-control" name="i_keterangan" rows="3" placeholder="Enter ..."><?= $row->city_desc ?></textarea>
                                        </div>
                                       
                                       
                                          
                                       
                                       </div>
                                       <div style="clear:both;"></div>
                                       
                                   
                                   
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                <input class="btn btn-cokelat" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-cokelat" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->