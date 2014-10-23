

                <!-- Main content -->
               
                    <div class="row">
                    <div class="col-xs-12 center" >
                    <div class="title_page">DATA INVESTASI PMA BERDASARKAN IZIN PRINSIP JANUARI S/D MARET 2014
                    </div></div>
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                             
                                 <table data-filter="#filter" class="footable">
      <thead>
        <tr>
                                             <th rowspan="2">No</th>
                                          		<th rowspan="2">Lokasi</th>
                                                <?php
												
												$akhir = $i_triwulan * 3;
												$awal = $akhir -  2;
                                                for($i_bulan = $awal; $i_bulan <= $akhir; $i_bulan++){
													$nama_bulan = array("", "Januari", "Februari", "Maret","April","mei","juni","juli","agustus","september","oktober","november","desember" );
												?>
                                            	<th colspan="3" align="center"><?= $nama_bulan[$i_bulan] ?></th>
                                             	<?php
												}
												?>
                                                <th colspan="3" align="center">Triwulan I</th>
                                            </tr>
                                             <tr>
                                                <?php
                                                for($i_bulan_th = 1; $i_bulan_th <= 3; $i_bulan_th++){
												?>
                                             <th>P</th>
                                              <th><?php if($i_master_sub_category_id == '1'){
												  $mata_uang = '$';
												  }else{
												  $mata_uang = 'Rp';}
												  ?>Investasi <?=$mata_uang?></th>
                                              <th>TK </th>
                                              <?php
												}
											  ?>
                                              <th>P</th>
                                              <th>Investasi</th>
                                              <th>TK (Orang)</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        
                                        <tbody>
                                        <?php
										$no=1;
										while($row=mysql_fetch_array($query)){
										?>
									 	<tr bgcolor="#eee">
                                         <td><?=$no;?></td>
                                        <td><?=$row['city_name']?></td>
                                       <?
                                     			$akhir = $i_triwulan * 3;
												$awal = $akhir -  2;
                                                for($i_bulan = $awal; $i_bulan <= $akhir; $i_bulan++){
												$pekerja=pekerja($row['city_id'],$i_bulan,$i_master_sub_category_id,$i_master_year);
												$investasi=investasi($row['city_id'],$i_bulan,$i_master_sub_category_id,$i_master_year);
												
												$jumlah=jumlah($row['city_id'],$i_bulan,$i_master_sub_category_id,$i_master_year);
										?>
                                         <td><?=$jumlah?></td>
                                         <td><?=$investasi?></td>
                                         <td><?=$pekerja?></td>
                                        <?php
												}
										?>
                                          <?
                                     		
												$pekerja=pekerja_total($row['city_id'],$i_triwulan,$i_master_sub_category_id,$i_master_year);
												$investasi=investasi_total($row['city_id'],$i_triwulan,$i_master_sub_category_id,$i_master_year);
												
												$jumlah=jumlah_total($row['city_id'],$i_triwulan,$i_master_sub_category_id,$i_master_year);
										?>
                                  		 <td><?=$jumlah?></td>
                                         <td><?=$investasi?></td>
                                         <td><?=$pekerja?></td>
                                        </tr>
                                        <?php
                                        $no++;
											}
                                              
                                        
                                        ?>
                                               <tr>
                                           <td colspan="2" align="center"><strong>Jumlah</strong></td>
                                           <?
                                     			$akhir = $i_triwulan * 3;
												$awal = $akhir -  2;
                                                for($i_bulan = $awal; $i_bulan <= $akhir; $i_bulan++){
												$pekerja=pekerja(0,$i_bulan,$i_master_sub_category_id,$i_master_year);
												$investasi=investasi(0,$i_bulan,$i_master_sub_category_id,$i_master_year);
												
												$jumlah=jumlah(0,$i_bulan,$i_master_sub_category_id,$i_master_year);
										?>
                                         <td><?=$jumlah?></td>
                                         <td><?=$investasi?></td>
                                         <td><?=$pekerja?></td>
                                        <?php
												}
										?>
                                          <?
                                     		
												$pekerja=pekerja_total(0,$i_triwulan,$i_master_sub_category_id,$i_master_year);
												$investasi=investasi_total(0,$i_triwulan,$i_master_sub_category_id,$i_master_year);
												
												$jumlah=jumlah_total(0,$i_triwulan,$i_master_sub_category_id,$i_master_year);
										?>
                                  		 <td><?=$jumlah?></td>
                                         <td><?=$investasi?></td>
                                         <td><?=$pekerja?></td>
                                        
                                              
                                         </tr>  
                                          
                                        </tbody>
                                      <tfoot class="footable-pagination">
        <tr>
          <td colspan="18"><div class="pagination pagination-centered"></div></td>
        </tr>
       
                                   </tfoot> 
                                    </table>

                      </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->