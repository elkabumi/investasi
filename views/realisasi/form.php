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

                          
                          

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-default">
                                
                               
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
                                    
                       
                                     
                                        
                                       
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama Perusahaan</label>
                                            <input required type="text" name="i_nama_perusahaan" class="form-control" placeholder="Enter ..." value="<?= $row->nama_perusahaan ?>"/>
                                        </div>
                                      
                                    
                                        
                                         <div class="form-group">
                                            <label>Alamat</label>
                                            <input required type="text" name="i_alamat" class="form-control" placeholder="Enter ..." value="<?= $row->alamat ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>No IP</label>
                                            <input required type="text" name="i_no_ip" class="form-control" placeholder="Enter ..." value="<?= $row->no_ip ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>No IU</label>
                                            <input required type="text" name="i_no_iu" class="form-control" placeholder="Enter ..." value="<?= $row->no_iu ?>"/>
                                        </div>
                                       
                                         <div class="form-group">
                                            <label>No Perusahaan</label>
                                            <input required type="text"  name="i_no_perusahaan" class="form-control" placeholder="Enter ..." value="<?= $row->no_perusahaan ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>No Kode Proyek</label>
                                            <input required type="text"  name="i_no_kode_proyek" class="form-control" placeholder="Enter ..." value="<?= $row->no_kode_proyek ?>"/>
                                        </div>
                                       
                                     	<div class="form-group">
                                            <label>Investasi</label>
                                            <input required type="text"  name="i_investasi" class="form-control" placeholder="Enter ..." value="<?= $row->investasi ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tenaga Kerja</label>
                                            <input required type="text"  name="i_tenaga_kerja" class="form-control" placeholder="Enter ..." value="<?= $row->tenaga_kerja ?>"/>
                                        </div>
                                   
                                        
                                       

                                     
                                       
                                       </div>
                                        <div class="col-md-6">
                                    
                                    
                                           
                                     
                                        
                                       
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
                                <input class="btn btn-default" type="submit" value="Save"/>
                                <a href="<?= $close_button?>" class="btn btn-default" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->