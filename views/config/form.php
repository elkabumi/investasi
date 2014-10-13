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
                if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
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
                                    
                                        <!-- text input -->
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