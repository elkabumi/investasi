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
	xmlhttp.open("GET","../views/search/sub_form.php?id="+str,true);
	xmlhttp.send();
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
                                 <div class="col-md-6">
                                    	
                                    
                                       
                                         <div class="form-group">
                                        <label>Kategori</label>
                                        <select id="basic" name="i_master_category_id" class="selectpicker show-tick form-control" data-live-search="true"  onChange="show_sub(this.value)" >
                                       
                                           <?php
                                        $query_owner = mysql_query("select * from master_categories ");
                                        while($row_owner = mysql_fetch_array($query_owner)){
                                        ?>
                                         <option value="<?= $row_owner['master_category_id']?>">Realisai <?= $row_owner['master_category_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      
                                       <div class="form-group">
                                        <label>Negara</label>
                                        <select class="form-control"  id="fom" name="i_country_id">
                                       
                                        </select>
                                        </div>
                                      
</div>
 <div class="col-md-12">
                                              <div class="form-group">
                                        <label>Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="reservation" name="i_date" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                       
 
                                    </div>
                                    
                                    
      <div class="col-md-6">
                                    	
                                    
                                       
                                         <div class="form-group">
                                        <label>Triwulan</label>
                                        <select id="basic" name="i_triwulan" class="selectpicker show-tick form-control" data-live-search="true">
                                       
                                           <?php
                                        for($i=1; $i<=4; $i++){
										?>
                                         <option value="<?=$i?>">Triwulan <?= $i ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      
</div>                              
                                 
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
                                    </div>
                                    
                                    
                                    
                                       <div style="clear:both;"></div>
                                       
                                   
                                   
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                <input class="btn btn-default" type="submit" value="Search"/>
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->             