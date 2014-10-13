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

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-default">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input required type="text" name="i_owner_name" class="form-control" placeholder="Enter ..." value="<?= $row->owner_name ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                          <label>Type</label>
                                           <select name="i_owner_type_id" size="1" class="form-control"/>
                                             <option value="1" <?php if($row->owner_type_id == 1){ ?> selected="selected"<?php }?>>Transport</option>
                                           <option value="2" <?php if($row->owner_type_id == 2){ ?> selected="selected"<?php }?>>Tanah</option>       
                                           </select>                                    
                                  		</div>
                                        
                                         <div class="form-group"><label>Telepon</label>
                                           <input required type="text" name="i_owner_phone" class="form-control" placeholder="Enter ..." value="<?= $row->owner_phone ?>"/>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Alamat</label>
                                            <input required type="text" name="i_owner_address" class="form-control" placeholder="Enter ..." value="<?= $row->owner_address ?>"/>
                                        </div>
                                       <div class="form-group">
                                            <label>Jasa Angkut Per Rit M3</label>
                                            <input required type="text" name="i_transport_service" class="form-control" placeholder="Enter ..." value="<?= $row->transport_service ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Subsidi Tol</label>
                                            <input required type="text" name="i_toll_subsidy" class="form-control" placeholder="Enter ..." value="<?= $row->toll_subsidy ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Tanah Per Rit Truk</label>
                                            <input required type="text" name="i_land_price" class="form-control" placeholder="Enter ..." value="<?= $row->land_price ?>"/>
                                        </div>
                                        
                                        

                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="i_owner_description" rows="3" placeholder="Enter ..."><?= $row->owner_description ?></textarea>
                                        </div>
                                      
                                   
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