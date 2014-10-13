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

                          <img src="../img/take-ios-style-notes-your-samsung-galaxy-note-2.w654.jpg" width="654" height="1162" /><img src="../img/Style3.png" width="858" height="417" /><img src="../img/nitro-tasks.png" width="959" height="607" />
<form role="form" action="<?= $action?>" method="post">
  
<div class="box box-default">
                                
                               
                                <div class="box-body">
                                    	
                                          <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="reservation" name="i_date" value="<?= $date_default?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                       
                                        <div class="form-group">
                                         <label>Pemilik </label>
                                        <select name="i_owner_id"  class="selectpicker show-tick form-control" data-live-search="true"><option value="0">-</option>
                                        <?php
                                        $query_owner = mysql_query("select * from owners");
                                        while($row_owner = mysql_fetch_array($query_owner)){
                                        ?>
                                        <option value="<?= $row_owner['owner_id']?>" <?php if($row_owner['owner_id'] == $i_owner_id){ ?> selected="selected"<?php }?>><?= $row_owner['owner_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      </div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-default" type="submit" value="Preview"/>
                           <a href="<?= $add_button ?>" class="btn btn-default" >Add Transaction</a>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                   </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              