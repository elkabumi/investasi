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
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Maaf</b>
               Jumlah tenaga kerja yang anda masukan salah
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['err']) && $_GET['err'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Maaf</b>
               Jumlah Investasi  yang anda masukan salah
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

                          
                          

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                     <div class="col-md-6">
                             
                                        		<div class="form-group">
													<label>Kategori</label>
                                                    
                                         
													<select id="basic" name="i_master_category_id" class="selectpicker show-tick form-control" data-live-search="true"  >
											      <option value="0">-- Pilih Semua --</option>
												   <?php
													$query_owner = mysql_query("select * from master_categories order by master_type_id");
													while($row_owner = mysql_fetch_array($query_owner)){
													?>
													 <option value="<?= $row_owner['master_category_id']?>" <?php if($row_owner['master_category_id'] == $category){ ?> selected="selected"<?php }?>><?php if($row_owner['master_type_id'] == 2){ echo "Realisasi "; } echo $row_owner['master_category_name'] ?></option>
													<?php
														}
													?>
												  
													</select>
											  	</div>
											  
                                        
                                        <div class="form-group">
                                        <label>Negara</label>
                                        
                                        <select id="basic" name="i_country_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- Pilih Semua --</option>
                                           <?php
                                        $query_country = mysql_query("select * from countries");
                                        while($row_country = mysql_fetch_array($query_country)){
                                        ?>
                                         <option value="<?= $row_country['country_id']?>" <?php if($row_country['country_id'] == $country){ ?> selected="selected"<?php }?>><?= $row_country['country_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      
                                       <div class="form-group">
                                        <label>Lokasi</label>
                                        <select id="basic" name="i_city_id" class="selectpicker show-tick form-control" data-live-search="true">
                                       	 <option value="0">-- Pilih Semua --</option>
                                        <?php
                                        $query_city = mysql_query("select * from cities");
                                        while($row_city = mysql_fetch_array($query_city)){
                                        ?>
                                         <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $city){ ?> selected="selected"<?php }?>><?= $row_city['city_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                     
                                        <div class="form-group">
                                        <label>Bidang Usaha</label>
                                        <select id="basic" name="i_business_type_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- Pilih Semua --</option>
                                           <?php
                                        $query_buss = mysql_query("select * from business_types");
                                        while($row_buss = mysql_fetch_array($query_buss)){
                                        ?>
                                         <option value="<?= $row_buss['business_type_id']?>"  <?php if($row_buss['business_type_id'] == $busines){ ?> selected="selected"<?php }?>><?= $row_buss['business_type_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                        
                                    
                                        
                                     </div>
										 <div class="col-md-6">
								   <div class="form-group">
                                            <label>Tenaga kerja</label>
                                            <input  type="text" name="i_tenaga_kerja" class="form-control" placeholder="Enter ..." value="<?= $tenaga1 ?>"/>
                                             </div>
                                         <div class="form-group">
                                            <label> s/d</label>
                                            <input  type="text" name="i_tenaga_kerja2" class="form-control" placeholder="Enter ..." value="<?= $tenaga2 ?>"/>
                                        </div>
                                        
                                           <div class="form-group">
                                            <label>Investasi</label>
                                            <input  type="text" name="i_investasi" class="form-control" placeholder="Enter ..." value="<?= $investasi1 ?>"/>
                                            </div>
                                         <div class="form-group">
                                            <label> s/d</label>
                                            <input  type="text" name="i_investasi2" class="form-control" placeholder="Enter ..." value="<?= $investasi2 ?>"/>
                                        </div>
                                   		
                                   		</div>
                                         
                                        
                                       <div style="clear:both;"></div>
                                       
                                   
                                   
                                </div><!-- /.box-body -->
                                
                               	 <div class="box-footer">
											
                                					<input class="btn btn-cokelat" type="submit" value="Search"/>
                                				
                                     		  	 <?php if(isset($_GET['preview'])){ ?><a href="olah.php?page=download&category=<?= $category?>&country=<?= $country?>&city=<?= $city?>&busines=<?=$busines?>&tenaga=<?=$tenaga1."-".$tenaga2?>&investasi=<?=$investasi1."-".$investasi2?>" class="btn btn-cokelat" >Download Excel</a>
								<a href="olah.php?page=download_pdf&category=<?= $category?>&country=<?= $country?>&city=<?= $city?>&busines=<?=$busines?>&tenaga=<?=$tenaga1."-".$tenaga2?>&investasi=<?=$investasi1."-".$investasi2?>"  class="btn btn-cokelat" >Download PDF</a>
                                 <? } ?>
                                     	 </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->