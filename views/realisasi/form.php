

<script type="text/javascript">
		function valregister(){
         	var x=register.i_investasi.value;
            var x1=parseInt(x);
			var y=register.i_investasi_dollar.value;
            var y1=parseInt(y);
            if(register.i_investasi.value > 0 && register.i_investasi_dollar.value > 0 ){
                        alert("mohon pilih salah satu inputan investasi dollar atau rupiah");
                        register.i_investasi.focus();
                        return false;
            }
			  return true; 
		}
</script>
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

				
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          

          <form name="register" action="<?php echo $action;?>" method="post" enctype="multipart/form-data" onSubmit="return valregister()">
          
          <div class="box box-cokelat">
                	<div class="box-body">
                     	<div class="col-md-6">
                        
                        	<div class="form-group">
                            	<label>Tahun</label>
                                	<select id="basic" name="i_master_year" class="selectpicker show-tick form-control" data-live-search="true">
                                    <?php
                                       $year = date("Y");
									   for($iy = $year; $iy >= $year - 5; $iy--){
                                    ?>
                                         <option value="<?= $iy ?>" <?php if($iy == $row->master_year){ ?> selected="selected"<?php }?>><?= $iy ?></option>
                                    <?php
                                        }
                                     ?>
                                          
                                     </select>
                           </div>
                           <div class="form-group">
                                <label>Nama Perusahaan</label>
                                 	<input required type="text" name="i_nama_perusahaan" class="form-control" placeholder="Enter ..." value="<?= $row->nama_perusahaan ?>"/>
                                <input type="hidden" name="row_id" class="form-control" placeholder="Enter ..." value="<?= $id_ip  ?>"/> 
                           </div>
						<div class="form-group">
                           <label>Alamat</label>
                           	<input required type="text" name="i_alamat" class="form-control" placeholder="Enter ..." value="<?= $row->alamat ?>"/>						</div>
                                        
                        <div class="form-group">
							<label>No IP</label>
								<input required readonly="readonly" type="text" name="i_no_ip" class="form-control" placeholder="Enter ..." value="<?= $row->no_ip ?>"/>
						</div>
                        
                        <div class="form-group">
							<label>No Perusahaan</label>
								<input required type="text"  name="i_no_perusahaan" class="form-control" placeholder="Enter ..." value="<?= $row->no_perusahaan ?>"/>
                      	</div>
                                        
                        <div class="form-group">
                             <label>No Kode Proyek</label>
                                <input required type="text"  name="i_no_kode_proyek" class="form-control" placeholder="Enter ..." value="<?= $row->no_kode_proyek ?>"/>
                          </div>
                                        
                           <?php 
								if($id_ip != ''){
									$row->investasi_dollar = '0';	
									$row->investasi = '0';	
								}
										
								if($master_category_id == '1'){
							?>
                                       
									<div class="form-group">
                                       <label>Investasi (dolar)</label>
											<div class="input-group">
                                            	<span class="input-group-addon">$</span>
					
                    								
                    <input  type="text" class="form-control"  name="i_investasi_dollar"  id="i_investasi_dollar" value="<?php echo $row->investasi_dollar; ?> ">
												<span class="input-group-addon">.00</span>
											</div>
									</div>
                                     
										 <input  type="hidden" class="form-control"  name="i_investasi"  id="i_investasi" value="<?= $row->investasi ?>">
											
                                        <?php }else  if($master_category_id == '2' or $master_category_id == '3' ){ ?>
                                       
                                        <div class="form-group">
                                       <label>Investasi (Rupiah)</label>
                                		<div class="input-group">
											<span class="input-group-addon">Rp</span>
										 <input  type="text" class="form-control"  name="i_investasi"  id="i_investasi" value="<?= $row->investasi ?>">
											<span class="input-group-addon">.00</span>
 										  </div>
										</div>
                                        		 <input type="hidden" class="form-control"  name="i_investasi_dollar"  id="i_investasi_dollar" value="<?= $row->investasi_dollar ?>">
                                    
                                    
                                    
                                     <?php }else{ ?>
                                    
                                     <div class="form-group">
                                    
                                       <label>Investasi (dolar)</label>
                                		<div class="input-group">
											<span class="input-group-addon">&nbsp;$&nbsp;</span>
											 	<input   type="text" class="form-control"  name="i_investasi_dollar"  id="i_iinvestasi_dollar" value="<?= $row->investasi_dollar ?>">
											<span class="input-group-addon">.00</span>
 										  </div>
										</div>
                                
                                
                                      <div class="form-group">
                                       <label>Investasi (Rupiah)</label>
                                		<div class="input-group">
											<span class="input-group-addon">Rp</span>
											 <input   type="text" class="form-control"  name="i_investasi"  id="i_investasi" value="<?= $row->investasi ?>">
											<span class="input-group-addon">.00</span>
 										  </div>
                                          </div>
                                 		<?php } ?>
                                 
                                 
                                        
                                <div class="form-group">
                                            <label>Tenaga kerja Laki-Laki </label>
                                            <input  type="text" name="i_tk_laki" class="form-control" placeholder="Enter ..." value="<?= $row->master_tk_laki ?>"/>
                                        </div>
                                           <div class="form-group">
                                            <label>Tenaga kerja Perempuan </label>
                                            <input  type="text" name="i_tk_perempuan" class="form-control" placeholder="Enter ..." value="<?= $row->master_tk_perempuan ?>"/>
                                        </div>
                                
                                      <div class="form-group">
                                            <label>Tenaga kerja Asing</label>
                                            <input  type="text" name="i_tk_asing" class="form-control" placeholder="Enter ..." value="<?= $row->master_tk_asing ?>"/>
                                          
                                        </div>
                                          
                                           
                                       </div>
                                        <div class="col-md-6">
                                    
                                        
                                           
                                     
                                          <?php
                                   			if($id){
									 ?>
                                              <div class="form-group">
                                            <label>Total Tenaga Kerja</label>
                                            <input  type="text"  name="i_total_tenaga_kerja" class="form-control" placeholder="Enter ..." value="<?= $row->tenaga_kerja ?>" readonly="readonly"/>
                                        </div>
                                       <?
											}
											?>
                                     
                                        
                                       
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input required type="text" name="i_kapasitas" class="form-control" placeholder="Enter ..." value="<?= $row->kapasitas ?>"/>
                                        </div>
                                      
                                    
                                        
                                         <div class="form-group">
                                            <label>Ekspor</label>
                                            <input required type="text" name="i_ekspor" class="form-control" placeholder="Enter ..." value="<?= $row->ekspor ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label>Negara</label>
                                        <select id="basic" name="i_country_id" class="selectpicker show-tick form-control" data-live-search="true">
                                       
                                           <?php
                                        $query_country = mysql_query("select * from countries");
                                        while($row_country = mysql_fetch_array($query_country)){
                                        ?>
                                         <option value="<?= $row_country['country_id']?>" <?php if($row_country['country_id'] == $row->country_id){ ?> selected="selected"<?php }?>><?= $row_country['country_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      
                                       <div class="form-group">
                                        <label>Lokasi</label>
                                        <select id="basic" name="i_city_id" class="selectpicker show-tick form-control" data-live-search="true">
                                       
                                           <?php
                                        $query_city = mysql_query("select * from cities");
                                        while($row_city = mysql_fetch_array($query_city)){
                                        ?>
                                         <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $row->city_id){ ?> selected="selected"<?php }?>><?= $row_city['city_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      
                                        <div class="form-group">
                                        <label>Bidang Usaha</label>
                                        <select id="basic" name="i_business_type_id" class="selectpicker show-tick form-control" data-live-search="true">
                                       
                                           <?php
                                        $query_buss = mysql_query("select * from business_types");
                                        while($row_buss = mysql_fetch_array($query_buss)){
                                        ?>
                                         <option value="<?= $row_buss['business_type_id']?>" <?php if($row_buss['business_type_id'] == $row->business_type_id){ ?> selected="selected"<?php }?>><?= $row_buss['business_type_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                                            <!-- textarea -->
                                        <div class="form-group">
                                            <label>Sub Bidang Usaha</label>
                                            <textarea class="form-control" name="i_business_sub_type_id" rows="3" placeholder="Enter ..."><?= $row-> 	business_sub_type_id ?></textarea>
                                        </div>
                                               <?php
											 
                                   			if($id and $row->master_sub_category_id == '1' and  $type == '1'){
									 ?>
                                              <div class="form-group">
                                            <label>harga  dollar</label>
                                            <input  type="text"  name="i_master_dollar" class="form-control" placeholder="Enter ..." value="<?= $row->master_config_dollar ?>" />
                                        </div>
                                <?php
											}else if($id and $row->investasi_dollar > '0' and  $type == '1'){
									?>
                                    <div class="form-group">
                                            <label>harga  dollar</label>
                                            <input  type="text"  name="i_master_dollar" class="form-control" placeholder="Enter ..." value="<?= $row->master_config_dollar ?>" />
                                        </div>
                                    <?
									
											}else{
										?>
                                               <input  type="hidden"  name="i_master_dollar" class="form-control" placeholder="Enter ..." value="<?= $master_dollar  ?>" />
                                   <?php	
											}
											?>
                                         <div class="form-group">
                                            <label>NPWP</label>
                                            <input required type="text" name="i_npwp" class="form-control" placeholder="Enter ..." value="<?= $row->npwp ?>"/>
                                          
                        
                                          
                                         </div>
                                        
                                     
										<div class="form-group">
                                        <label>Upload</label>
                                        <?php
                                        if($id){
										?>
                                        <br />
                                        <img src="<?= $row->master_img ?>" width="100" />
                                        <?php
										}
										?>
                                        <input type="file" name="i_master_img" id="i_master_img" />
                                        </div>
                                   		
                                           <!-- textarea -->
                                        <div class="form-group">
                                            <label>Lain - lain</label>
                                            <textarea class="form-control" name="i_keterangan" rows="3" placeholder="Enter ..."><?= $row->keterangan ?></textarea>
                                        </div>
                                       
                                       </div>
                                       <div style="clear:both;"></div>
                                       
                                   
                                   
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                <input class="btn btn-cokelat" name="save" id="save"  type="submit" value="Save" />
                                
                                <a href="<?= $close_button?>" class="btn btn-cokelat" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->