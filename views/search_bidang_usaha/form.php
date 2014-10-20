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
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                    	
                                       
                                     <div class="col-md-6">
                                        
											<div class="form-group">
												<label>Triwulan</label>
												<select id="basic" name="i_triwulan" class="selectpicker show-tick form-control" data-live-search="true">
											   
												   <?php
												for($i=1; $i<=4; $i++){
												?>
												 <option value="<?=$i?>"  <?php if($i_triwulan == $i){ ?> selected="selected"<?php }?>>Triwulan <?= $i ?></option>
												<?php
												}
												?>
												  
												</select>
											  </div>
                                              
										  </div>     
                                          
                                           <div class="col-md-6">
                                          
											 <div class="form-group">
												<label>Tahun</label>
												<select id="basic" name="i_master_year" class="selectpicker show-tick form-control" data-live-search="true">
											   
												   <?php
											   $year = date("Y");
											   for($iy = $year; $iy >= $year - 5; $iy--){
												?>
												 <option value="<?= $iy ?>"  <?php if($i_master_year == $iy){ ?> selected="selected"<?php }?>><?= $iy ?></option>
												<?php
												}
												?>
												  
												</select>
											  </div>
                                              </div>
                                              
                                              <div style="clear:both;"></div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-cokelat" type="submit" value="Preview"/>
                             	 <?php if(isset($_GET['preview'])){ ?><a href="search_bidang_usaha.php?page=download&master_category_id=<?= $_GET['master_category_id']?>&semester=<?= $_GET['semester']?>&master_year=<?= $_GET['master_year']?>" class="btn btn-cokelat" >Download Excel</a>
								 <a href="search_bidang_usaha.php?page=download_pdf&master_category_id=<?= $_GET['master_category_id']?>&semester=<?= $_GET['semester']?>&master_year=<?= $_GET['master_year']?>" class="btn btn-cokelat" >Download PDF</a>
								 <?php } ?>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              