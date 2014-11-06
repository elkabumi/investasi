<!-- Content Header (Page header) -->
<script>
function show_sub(str)
{
	if (str=="")
	{
	document.getElementById("fom").innerHTML="";
	return;
	} 
	if (window.XMLHttpRequest)
	{// kode for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	}
	else
	{// kode for IE6, IE5
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("fom").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","../views/report_triwulan/sub_form.php?id="+str,true);
	xmlhttp.send();
	}
</script>

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

                          
                          

                           <form role="form" action="<?= $action?>" method="post" name="testform">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                
                                    	 <div class="col-md-3">
                                                 
                                
                                        <div class="form-group">          
                                        	
													<label>Kategori </label>
													<select id="basic" name="i_master_category_id" class="form-control" data-live-search="true"  onChange="show_sub(this.value)"  >
                                                   <option value="0">-- Pilih Semua --</option>
											   
												   <?php
													$query_owner = mysql_query("select * from category");
													while($row_owner = mysql_fetch_array($query_owner)){
													?>
													 <option value="<?= $row_owner['cat_id']?>" <?php if($row_owner['cat_id'] == $i_master_category_id){ ?> selected="selected"<?php }?>><?php  echo $row_owner['category'] ?></option>
													<?php
														}
													?>
												  
													</select>
                                                   
											  	</div>
                                        </div>
                                        
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Sub Kategori </label>
                                         		<select  class="form-control"  id="fom" name="i_master_sub_category_id">
											    <?php
												if(isset($_GET['preview'])){
												$q_sub=mysql_query("SELECT * FROM subcategory where cat_id = ". $_GET['master_category_id']);
														?>
														<option value="0">-- Pilih Semua --</option>
														<?php
														while($row_sub=mysql_fetch_array($q_sub)){
												?>
													
														<option value="<?php echo $row_sub[0] ?>" <?php if($row_sub[0] == $i_master_sub_category_id){ ?> selected="selected"<?php }?>><?php echo $row_sub['2']?></option>
												<?
														}
												}
													
												?>
												</select>
                                        </div>
                                        </div>
                                       
                                       
                                     <div class="col-md-3">
                                        
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
                                          
                                           <div class="col-md-3">
                                          
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
                                              
                                               <div class="col-md-6">
                             
                                        		
											  
                                        
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
                                      
                                       <div class="form-group">
                                        <label>Sub Bidang Usaha</label>
                                         <input  type="text" name="i_sub_business_type_id" class="form-control" placeholder="Enter ..." value="<?= $sub_busines ?>"/>
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
                                <input class="btn btn-cokelat" type="submit" value="Preview"/>
                             	 <?php if(isset($_GET['preview'])){ ?><a href="<?= "report_triwulan.php?page=form_download&master_category_id=$i_master_category_id&master_sub_category_id=$i_master_sub_category_id&triwulan=".$i_triwulan."&master_year=$i_master_year&country=$country&city=$city&busines=$busines&tenaga=".$_GET['tenaga']."&investasi=".$_GET['investasi']."&sub_busines=$sub_busines"; ?>" class="btn btn-cokelat" >Download Excel</a>
								 <a href="<?= "report_triwulan.php?page=download_pdf&master_category_id=$i_master_category_id&master_sub_category_id=$i_master_sub_category_id&triwulan=".$i_triwulan."&master_year=$i_master_year&country=$country&city=$city&busines=$busines&tenaga=".$_GET['tenaga']."&investasi=".$_GET['investasi']."&sub_busines=$sub_busines"; ?>" class="btn btn-cokelat" >Download PDF</a>
								 <?php } ?>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              