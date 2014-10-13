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

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-default">
                                
                               
                                <div class="box-body">
                                    
                                     <div class="col-md-6">
                                     <div class="form-group">
                                            <label>Kode</label>
                                            <input required type="text" name="i_truck_code" class="form-control" placeholder="Enter ..." value="<?= $row->truck_code ?>"/>
                                        </div>
                                     
                                        
                                       
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nopol</label>
                                            <input required type="text" name="i_truck_nopol" class="form-control" placeholder="Enter ..." value="<?= $row->truck_nopol ?>"/>
                                        </div>
                                      
                                    
                                        
                                         <div class="form-group">
                                            <label>Panjang (m)</label>
                                            <input required type="text" name="i_truck_p" class="form-control" placeholder="Enter ..." value="<?= $row->truck_p ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Lebar (m)</label>
                                            <input required type="text" name="i_truck_l" class="form-control" placeholder="Enter ..." value="<?= $row->truck_l ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Tinggi (m)</label>
                                            <input required type="text" name="i_truck_t" class="form-control" placeholder="Enter ..." value="<?= $row->truck_t ?>"/>
                                        </div>
                                        <? if($id  != ''){
											?>
                                         <div class="form-group">
                                            <label>Volume (m3)</label>
                                            <input required type="text" readonly="readonly"  name="i_truck_volume" class="form-control" placeholder="Enter ..." value="<?= $row->truck_volume ?>"/>
                                        </div>
                                        <? } ?>
                                     	
                                   
                                        
                                        <div class="form-group">
                                        <label>Pemilik</label>
                                        <select id="basic" name="i_owner_id" class="selectpicker show-tick form-control" data-live-search="true">
                                           <?php
                                        $query_owner = mysql_query("select * from owners");
                                        while($row_owner = mysql_fetch_array($query_owner)){
                                        ?>
                                        <option value="<?= $row_owner['owner_id']?>" <?php if($row_owner['owner_id'] == $row->owner_id){ ?>selected <?php } ?>><?= $row_owner['owner_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>

                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="i_truck_description" rows="3" placeholder="Enter ..."><?= $row->truck_description ?></textarea>
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