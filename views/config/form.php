
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
              
               <b>Sukses !</b>
                <p>Edit data berhasil</p>
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

                          
                          
					<form action="<?= $action?>" name="config" method="post" enctype="multipart/form-data" role="form" onsubmit="return form_config()">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                     <div class="col-md-6">
                                  
                                    
                                        
                                         <div class="form-group">
                                            <label>Kurs Rupiah terhadap dolar</label>
                                            <input required type="text" name="i_config_dollar" class="form-control" placeholder="Enter ..." value="<?= $row->config_dollar  ?>"/>
                                      
                                   
                                      
                                       
                                   </div>	
                                  
                                       
                                </div><!-- /.box-body -->
                               <div style="clear:both;"></div>
                            
                            </div><!-- /.box -->
                            
                                <div class="box-footer">
                                <input class="btn btn-cokelat" type="submit" value="Save"/>
                               
                                </div>
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->