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
                                    	   	
                                        <div class="col-md-12">
                                        
											<div class="form-group">
												<label>Kategori</label>
												<select id="basic" name="i_master_sub_category_id" class="selectpicker show-tick form-control">
											   
											
												 <option value="1" <?php if($i_master_sub_category_id == 1){ ?> selected="selected"<?php }?>>PMA</option>
												<option value="2" <?php if($i_master_sub_category_id ==2 ){ ?> selected="selected"<?php }?>>PMDN</option>
												  
												</select>
											  </div>
                                              
										  </div> 
                                        <div class="col-md-4">
                                        
									     <div class="form-group">
                                        <label>Lokasi</label>
                                        <select id="basic" name="i_city_id" class="selectpicker show-tick form-control" data-live-search="true">
                                       <option value="0">-- Pilih Semua--</option>
                                           <?php
                                        $query_city = mysql_query("select * from cities");
                                        while($row_city = mysql_fetch_array($query_city)){
                                        ?>
                                         <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $i_city_id){ ?> selected="selected"<?php }?>><?= $row_city['city_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                              
										  </div>    
                                       
                                     <div class="col-md-4">
                                        
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
                                          
                                           <div class="col-md-4">
                                          
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
                             	 
								 
								 <?php /* if(isset($_GET['preview'])){ ?>
                            <a href="search_lokasi.php?page=download&city_id=<?= $_GET['city_id']?>&triwulan=<?= $_GET['triwulan']?>&master_year=<?= $_GET['master_year']?>&master_sub_category_id=<?= $_GET['master_sub_category_id']?>" class="btn btn-cokelat" >Download Excel</a>
								 
                            <a href="search_lokasi.php?page=download_pdf&city_id=<?= $_GET['city_id']?>&triwulan=<?= $_GET['triwulan']?>&master_year=<?= $_GET['master_year']?>&master_sub_category_id=<?= $_GET['master_sub_category_id']?>" class="btn btn-cokelat" >Download pdf</a>
								 
                                 
								 <?php } */
								 ?>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              