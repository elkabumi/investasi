
 <section class="content-header">
                    <h1>
                       <?= $title?>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title ?></a></li>
                      
                        <li class="active">Data</li>
                    </ol>
  </section>
                
                
                
                
  <section class="content">
  	  <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                    	
                   
                                       
                                    <div class="col-md-4"> 
                                     
                                          <form role="form" action="<?= $action?>" method="post">
											<div class="form-group">
												<label>Tahun</label>
												<select id="basic" name="i_year" class="selectpicker show-tick form-control" data-live-search="true">
											   
												   <?php
												$year_select = date("Y") - 4;
												
                   								for($y=date("Y"); $y>=$year_select; $y--){
													$y2=$y-1;
												?>
												
												 <option value="<?php echo $y;?>" <?php if($y == $year){?> selected="selected"<?php } ?>><?php echo $y2." vs ".$y;?></option>
												<?php
												}
												?>
												  
												</select>
											  	</div>
                                                </div>
                                      <div class="col-md-4"> 
                                                <div class="form-group">
                                        <label>Negara</label>
                                        <select id="basic" name="i_country_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- PILIH SEMUA --</option>
                                       
                                       
                                           <?php
                                        $query_country = mysql_query("select * from countries");
                                        while($row_country = mysql_fetch_array($query_country)){
                                        ?>
                                         <option value="<?= $row_country['country_id']?>" <?php if($row_country['country_id'] == $country_id){ ?> selected="selected"<?php }?>><?= $row_country['country_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      
                                      </div>
                                      <div class="col-md-4"> 
                                      <div class="form-group">
                                        <label>Lokasi</label>
                                        <select id="basic" name="i_city_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- PILIH SEMUA --</option>
                                       
                                           <?php
                                        $query_city = mysql_query("select * from cities");
                                        while($row_city = mysql_fetch_array($query_city)){
                                        ?>
                                         <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $city_id){ ?> selected="selected"<?php }?>><?= $row_city['city_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      </div>
                                      
                                      
                                       <div class="col-md-4"> 
                                   
                                               <div class="form-group">
                                        <label>Bidang Usaha</label>
                                        <select id="basic" name="i_business_type_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- PILIH SEMUA --</option>
                                       
                                           <?php
                                        $query_buss = mysql_query("select * from business_types");
                                        while($row_buss = mysql_fetch_array($query_buss)){
                                        ?>
                              <option value="<?= $row_buss['business_type_id']?>" <?php if($row_buss['business_type_id'] == $business_id) 		{ ?> selected="selected"<?php }?>><?= $row_buss['business_type_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      </div>
                                      
                                       <div class="col-md-8"> 
                                   
                                               <div class="form-group">
                                        <label>Bidang Usaha</label>
                                         <input  type="text" name="i_sub_business_type_id" class="form-control" placeholder="Enter ..." value="<?= $sub_business_id ?>"/>
                                      </div>
                                      </div>
                                              </form>
									
                                                 
                                          
                              
                                              
                                              <div style="clear:both;"></div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    <div class="box-footer">
                                <input class="btn btn-cokelat" type="submit" value="Preview"/>
                                </div>
                  
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                        <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel_manual" style="font-size:20px;">
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <?php
								  $year1 = $year;
								  $year2 = $year1 - 1;
								   $asli_total1 = number_format(get_data_total(1,$year1,$country_id,$city_id,$business_id,$sub_business_id),2);
								  $asli_total2 = number_format(get_data_total(1,$year2,$country_id,$city_id,$business_id,$sub_business_id),2);
								  $total1 = (get_data_total(1,$year1,$country_id,$city_id,$business_id,$sub_business_id) == 0) ? 1 : get_data_total(1,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								  $total2 = (get_data_total(1,$year2,$country_id,$city_id,$business_id,$sub_business_id) == 0) ? 1 : get_data_total(1,$year2,$country_id,$city_id,$business_id,$sub_business_id);
                             ?>
                             <td><strong>Total Realisasi Investasi Tahun <?= $year?> sebesar  Rp.<?=$asli_total1?>  Trilyun </strong>
                           
								
                            </td>
                            </tr>
                            <tr>
                              <td><strong>
                                <?php
                              if($total1 > $total2){
                                  $persen = ($total1 / $total2) * 100;
                                  $persen = $persen - 100;
								  if($asli_total2  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								  }
                                  $persen = number_format($persen, 2);
								  
                                  echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
                              }else if($total1 < $total2){
                                  $persen = ($total2 / $total1) * 100;
                                  $persen = $persen - 100;
								  if($asli_total1  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								  }
                                   $persen = number_format($persen, 2);
								   
                                  echo "menurun <span style='color:#F00'> - ".$persen." %</span>";
                             }else{
						  		 echo "sama <span style='color:#F00'>0%</span>";
						  	 }
                              ?>
                              dibanding Tahun  <?= $year - 1; ?> (Rp.<?=$asli_total2?>) Trilyun
                                
                              </strong></td>
                            </tr>
                        
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
                        
                        </div>
                        
                        <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tabel_manual" id="new_table">
                          <thead>
                        <tr>
                            <td><strong>Type</strong></td>
                            
                                                
                                            <td align='center'><strong>Proyek</strong></td>
                                            <td align='center'><strong>Investasi</strong></td>
                                                  <td align='center'><strong>Tenaga kerja</strong></td>
                                          
                          </tr>
                            </thead>
                          <tr>
                            <td style="background-color:#FF99CC">PMA</td>
                           <?php
								$data_proyek = get_data_proyek_realisasi(1,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_investasi = get_data_investasi_realisasi(1,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_pekerja = get_data_pekerja_realisasi(1,$year1,$country_id,$city_id,$business_id,$sub_business_id);
                           	?>
							<td><?=$data_proyek;?> Proyek</td>
                           <td>Rp. <?php 	echo number_format($data_investasi,2);?>  Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                            
                          </tr>
                          <tr>
                            <td style="background-color:#993333">PMDN</td>
                          	<?php
								$data_proyek = get_data_proyek_realisasi(2,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_investasi = get_data_investasi_realisasi(2,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_pekerja = get_data_pekerja_realisasi(2,$year1,$country_id,$city_id,$business_id,$sub_business_id);
                           	?>
						<td><?=$data_proyek;?>  Proyek</td>
                           <td>Rp. <?php 	echo number_format($data_investasi,2);?>  Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                          </tr>
                          <tr>
                            <td><b>PMA & PMDN</b></td>
                           	<?php
								$data_proyek = get_data_proyek_realisasi(0,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_investasi = get_data_investasi_realisasi(0,$year1,$country_id,$city_id,$business_id,$sub_business_id);
                           		$data_pekerja = get_data_pekerja_realisasi(0,$year1,$country_id,$city_id,$business_id,$sub_business_id);
							?>
					<td><strong><?=$data_proyek;?> Proyek</strong></td>
                             <td><strong>Rp. <?php 	echo number_format($data_investasi,2);?>  Trilyun</strong></td>
                             <td><strong><?=$data_pekerja;?>  Tng Kerja</strong></td>
                          </tr>
                        </table>
                        </div>
                        
                        <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tabel_manual" id="">
                      
                          <tr>
                           <td  style="background-color:#FFFF00">PMDN Non Fas :</td>
                           <?php
								$data_proyek = get_data_proyek_realisasi(3,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_investasi = get_data_investasi_realisasi(3,$year1,$country_id,$city_id,$business_id,$sub_business_id);
                           		$data_pekerja = get_data_pekerja_realisasi(3,$year1,$country_id,$city_id,$business_id,$sub_business_id);
							?>
						<td><strong><?=$data_proyek;?> Proyek</strong></td>
                            <td><strong>Rp. <?php 	echo number_format($data_investasi,2);?>  Trilyun</strong></td>
                             <td><strong><?=$data_pekerja;?>  Tng Kerja</strong></td>
                          </tr>
                          </tr>
                      
                      
                        </table>
                        </div>
                    	</div>
                          <div class="col-md-6">
                          
                          
                         <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel_manual" style="font-size:20px;">
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <?php
								  $year1 = $year;
								  $year2 = $year1 - 1;
								 $asli_total1 = number_format(get_data_total(2,$year1,$country_id,$city_id,$business_id,$sub_business_id),2);
								  $asli_total2 = number_format(get_data_total(2,$year2,$country_id,$city_id,$business_id,$sub_business_id),2);
								  $total1 = (get_data_total(2,$year1,$country_id,$city_id,$business_id,$sub_business_id) == 0) ? 1 : get_data_total(2,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								  $total2 = (get_data_total(2,$year2,$country_id,$city_id,$business_id,$sub_business_id) == 0) ? 1: get_data_total(2,$year2,$country_id,$city_id,$business_id,$sub_business_id);
                             ?>
                             <td><strong>Total Nilai Izin Prinsip Investasi Tahun <?= $year?>  sebesar  Rp.<?=$asli_total1?> Trilyun </strong>
                           
								
                            </td>
                            </tr>
                            <tr>
                              <td><strong>
                                <?php
                              if($total1 > $total2){
                                  $persen = ($total1 / $total2) * 100;
                                  $persen = $persen - 100;
								  if($asli_total2  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								  }
                                  $persen = number_format($persen, 2);
                                  echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
                              }else if($total1 < $total2){
                                  $persen = ($total2 / $total1) * 100;
                                  $persen = $persen - 100;
								   if($asli_total1  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								  }
                                   $persen = number_format($persen, 2);
                                  echo "menurun <span style='color:#F00'> - ".$persen." %</span>";
                            }else{
						  		 echo "sama <span style='color:#F00'>0%</span>";
						  	 }
                              ?>
                              dibanding Tahun   <?= $year - 1; ?>  (Rp.<?=$asli_total2?>) Trilyun
                                
                              </strong></td>
                            </tr>
                        
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
                        
                        </div>
                        
                           <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tabel_manual" id="new_table2">
                          <thead>
                        <tr>
                            <td><strong>Type</strong></td>
                            
                                                
                                            <td align='center'><strong>Proyek</strong></td>
                                            <td align='center'><strong>Investasi</strong></td>
                                                  <td align='center'><strong>Tenaga kerja</strong></td>
                                          
                          </tr>
                            </thead>
                          
                          <tr>
                            <td style="background-color:#FF99CC">PMA</td>
                           <?php
								$data_proyek = get_data_proyek_izin(1,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_investasi = get_data_investasi_izin(1,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_pekerja = get_data_pekerja_izin(1,$year1,$country_id,$city_id,$business_id,$sub_business_id);
                           	?>
							<td><?=$data_proyek;?> Proyek</td>
                            <td>Rp. <?php 	echo number_format($data_investasi,2);?>  Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                            
                          </tr>
                          <tr>
                            <td style="background-color:#993333">PMDN</td>
                          	<?php
								$data_proyek = get_data_proyek_izin(2,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_investasi = get_data_investasi_izin(2,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_pekerja = get_data_pekerja_izin(2,$year1,$country_id,$city_id,$business_id,$sub_business_id);
                           	?>
						<td><?=$data_proyek;?>  Proyek</td>
                            <td>Rp. <?php 	echo number_format($data_investasi,2);?>  Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                          </tr>
                          <tr>
                            <td><b>PMA & PMDN</b></td>
                           	<?php
								$data_proyek = get_data_proyek_izin(0,$year1,$country_id,$city_id,$business_id,$sub_business_id);
								$data_investasi = get_data_investasi_izin(0,$year1,$country_id,$city_id,$business_id,$sub_business_id);
                           		$data_pekerja = get_data_pekerja_izin(0,$year1,$country_id,$city_id,$business_id,$sub_business_id);
							?>
					<td><strong><?=$data_proyek;?> Proyek</strong></td>
                             <td><strong>Rp. <?php 	echo number_format($data_investasi,2);?>  Trilyun</strong></td>
                             <td><strong><?=$data_pekerja;?>  Tng Kerja</strong></td>
                          </tr>
                        
                        
                        </table>
                        </div>
                    	</div>
                  </div>
              </section>