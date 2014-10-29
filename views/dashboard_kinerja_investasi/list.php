
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
                        <div class="col-md-12">
                        <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel_manual" style="font-size:22px;">
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <?php
								  $year1 = date("Y");
								  $year2 = $year1 - 1;
								   $asli_total1 = get_data_total(1,$year1);
								  $asli_total2 = get_data_total(1,$year2);
								  $total1 = (get_data_total(1,$year1) == 0) ? 1 : get_data_total(1,$year1);
								  $total2 = (get_data_total(1,$year2) == 0) ? 1 : get_data_total(1,$year2);
                             ?>
                             <td><strong>Total Realisasi Investasi Tahun 2014 sebesar  Rp.<?=$asli_total1?>  </strong>
                           
								
                            </td>
                            </tr>
                            <tr>
                              <td><strong>
                                <?php
                              if($total1 > $total2){
                                  $persen = ($total1 / $total2) * 100;
                                  $persen = $persen - 100;
								  if($asli_total2  == '0'){
								  	$persen = $persen + 100 ;
								  }
                                  $persen = number_format($persen, 2);
								  
                                  echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
                              }else{
                                  $persen = ($total2 / $total1) * 100;
                                  $persen = $persen - 100;
								  if($asli_total1  == '0'){
								  	$persen = $persen + 100 ;
								  }
                                   $persen = number_format($persen, 2);
								   
                                  echo "menurun <span style='color:#F00'> - ".$persen." %</span>";
                              }
                              ?>
                              dibanding Tahun  <?= date("Y") - 1; ?> (Rp.<?=$asli_total2?>)
                                
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
								$data_proyek = get_data_proyek_realisasi(1,$year1);
								$data_investasi = get_data_investasi_realisasi(1,$year1);
								$data_pekerja = get_data_pekerja_realisasi(1,$year1);
                           	?>
							<td><?=$data_proyek;?> Proyek</td>
                            <td><?=$data_investasi;?>  Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                            
                          </tr>
                          <tr>
                            <td style="background-color:#993333">PMDN</td>
                          	<?php
								$data_proyek = get_data_proyek_realisasi(2,$year1);
								$data_investasi = get_data_investasi_realisasi(2,$year1);
								$data_pekerja = get_data_pekerja_realisasi(2,$year1);
                           	?>
						<td><?=$data_proyek;?>  Proyek</td>
                            <td><?=$data_investasi;?> Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                          </tr>
                          <tr>
                            <td><b>PMA & PMDN</b></td>
                           	<?php
								$data_proyek = get_data_proyek_realisasi(0,$year1);
								$data_investasi = get_data_investasi_realisasi(0,$year1);
                           		$data_pekerja = get_data_pekerja_realisasi(0,$year1);
							?>
					<td><strong><?=$data_proyek;?> Proyek</strong></td>
                            <td><strong><?=$data_investasi;?>  Trilyun</strong></td>
                             <td><strong><?=$data_pekerja;?>  Tng Kerja</strong></td>
                          </tr>
                        </table>
                        </div>
                        
                        <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tabel_manual" id="new_table">
                      
                          <tr>
                           <td  style="background-color:#FFFF00">PMDN Non Fas.:</td>
                           <?php
								$data_proyek = get_data_proyek_realisasi(3,$year1);
								$data_investasi = get_data_investasi_realisasi(3,$year1);
                           		$data_pekerja = get_data_pekerja_realisasi(3,$year1);
							?>
						<td><strong><?=$data_proyek;?> Proyek</strong></td>
                            <td><strong><?=$data_investasi;?>  Trilyun</strong></td>
                             <td><strong><?=$data_pekerja;?>  Tng Kerja</strong></td>
                          </tr>
                          </tr>
                      
                      
                        </table>
                        </div>
                    	</div>
                          <div class="col-md-12">
                          
                          
                         <div class="box box-danger">
                         <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel_manual" style="font-size:22px;">
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <?php
								  $year1 = date("Y");
								  $year2 = $year1 - 1;
								  $asli_total1 = get_data_total(2,$year1);
								  $asli_total2 = get_data_total(2,$year2);
								  $total1 = (get_data_total(2,$year1) == 0) ? 1 : get_data_total(2,$year1);
								  $total2 = (get_data_total(2,$year2) == 0) ? 1: get_data_total(2,$year2);
                             ?>
                             <td><strong>Total Nilai Izin Prinsip Investasi Tahun 2014 sebesar  Rp.<?=$asli_total1?>  </strong>
                           
								
                            </td>
                            </tr>
                            <tr>
                              <td><strong>
                                <?php
                              if($total1 > $total2){
                                  $persen = ($total1 / $total2) * 100;
                                  $persen = $persen - 100;
								  if($asli_total2  == '0'){
								  	$persen = $persen + 100 ;
								  }
                                  $persen = number_format($persen, 2);
                                  echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
                              }else{
                                  $persen = ($total2 / $total1) * 100;
                                  $persen = $persen - 100;
								   if($asli_total1  == '0'){
								  	$persen = $persen + 100 ;
								  }
                                   $persen = number_format($persen, 2);
                                  echo "menurun <span style='color:#F00'> - ".$persen." %</span>";
                              }
                              ?>
                              dibanding Tahun  <?= date("Y") - 1; ?> (Rp.<?=$asli_total2?>)
                                
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
								$data_proyek = get_data_proyek_izin(1,$year1);
								$data_investasi = get_data_investasi_izin(1,$year1);
								$data_pekerja = get_data_pekerja_izin(1,$year1);
                           	?>
							<td><?=$data_proyek;?> Proyek</td>
                            <td><?=$data_investasi;?>  Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                            
                          </tr>
                          <tr>
                            <td style="background-color:#993333">PMDN</td>
                          	<?php
								$data_proyek = get_data_proyek_izin(2,$year1);
								$data_investasi = get_data_investasi_izin(2,$year1);
								$data_pekerja = get_data_pekerja_izin(2,$year1);
                           	?>
						<td><?=$data_proyek;?>  Proyek</td>
                            <td><?=$data_investasi;?> Trilyun</td>
                             <td><?=$data_pekerja;?>  Tng Kerja</td>
                          </tr>
                          <tr>
                            <td><b>PMA & PMDN</b></td>
                           	<?php
								$data_proyek = get_data_proyek_izin(0,$year1);
								$data_investasi = get_data_investasi_izin(0,$year1);
                           		$data_pekerja = get_data_pekerja_izin(0,$year1);
							?>
					<td><strong><?=$data_proyek;?> Proyek</strong></td>
                            <td><strong><?=$data_investasi;?>  Trilyun</strong></td>
                             <td><strong><?=$data_pekerja;?>  Tng Kerja</strong></td>
                          </tr>
                          <tr>
                        
                        </table>
                        </div>
                    	</div>
                  </div>
              </section>