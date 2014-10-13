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
                                            <label>Kode</label>
                                            <input required type="text" name="i_kode"readonly="readonly" class="form-control" placeholder="Enter ..." value="<?= $row->truck_code  ?>"/>
											<input type="hidden" name="i_id" readonly="readonly" class="form-control" placeholder="Enter ..." value="<?= $row->truck_id  ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Polisi</label>
                                            <input required type="text" name="i_nopol"readonly="readonly" class="form-control" placeholder="Enter ..." value="<?= $row->truck_nopol  ?>"/>
										
                                        </div>
										
										<div class="form-group">
                                            <label>Nama Suplier</label>
                                            <input required type="text" name="i_owner"  readonly="readonly" class="form-control" placeholder="Enter ..." value="<? echo $row->owner_name ?>"/>
                                        </div>
                                         <div class="form-group">
                                            <label>Nama sopir</label>
                                            <input required type="text" name="i_sopir"  class="form-control" placeholder="Enter ..." value=""/>
                                            
                                        </div>
	            <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= date("d/m/Y"); ?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    
         <div class="bootstrap-timepicker">
                                         <div class="form-group">
                                            <label>Jam</label>
                                            <input required type="text" name="i_hour" class="form-control timepicker" placeholder="Enter ...">
                                        </div>
                                	</div>

                                         <div class="form-group">
                                            <label>Panjang (m)</label>
                                            <input required type="text" name="i_p"  class="form-control" placeholder="Enter ..." value="<?php echo $row->truck_p   ?>"/>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Lebar (m)</label>
                                            <input required type="text" name="i_l"  class="form-control" placeholder="Enter ..." value="<?php echo $row->truck_l   ?>"/>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Tinggi (m)</label>
                                            <input required type="text" name="i_t"  class="form-control" placeholder="Enter ..." value="<?php echo $row->truck_t   ?>"/>
                                        </div>
                            
                                       <!--
										<div class="form-group">
                                            <label>Volume (m3)</label>
                                            <input required type="text" name="i_volume" class="form-control" placeholder="Enter ..." value="<?//= $row->truck_volume  ?>"/>
                                        </div>-->
                                        
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="i_description" rows="3" placeholder="Enter ..."></textarea>
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