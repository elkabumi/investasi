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
	xmlhttp.open("GET","../views/report_tahunan/sub_form.php?id="+str,true);
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
                                
                            
                                       
                                     <div class="col-md-6">
                                        
											<div class="form-group">
												<label>Tahun</label>
												<select id="basic" name="i_master_year1" class="selectpicker show-tick form-control" data-live-search="true">
											   
												   <?php
											   $year = date("Y");
											   for($iy = $year; $iy >= $year - 5; $iy--){
												?>
												 <option value="<?= $iy ?>"  <?php if($i_master_year1 == $iy){ ?> selected="selected"<?php }?>><?= $iy ?></option>
												<?php
												}
												?>
												  
												</select>
											  </div>
                                              
										  </div> 
                                         
                                          
                                           <div class="col-md-6">
                                          
											
											 <div class="form-group">
												<label>S/d</label>
												<select id="basic" name="i_master_year2" class="selectpicker show-tick form-control" data-live-search="true">
											   
												   <?php
											   $year = date("Y");
											   for($iy2 = $year; $iy2 >= $year - 5; $iy2--){
												?>
												 <option value="<?= $iy2 ?>"  <?php if($i_master_year2 == $iy2){ ?> selected="selected"<?php }?>><?= $iy2 ?></option>
												<?php
												}
												?>
												  
												</select>
											  </div>
                                            
                                           </div>
                                              <div style="clear:both;"></div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    
                    <div class="box-footer">
                                <input class="btn btn-cokelat" type="submit" value="Preview"/>
                             	
                                </div>
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
              