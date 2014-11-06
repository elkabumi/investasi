

                <!-- Main content -->
               
                    <div class="row">
                    <div class="col-xs-12 center" >
                    <div class="title_page">
                    <?php
                    switch($i_triwulan){
														case 1: $nama_page = "JANUARI S/D MARET"; break;
														case 2: $nama_page = "APRIL S/D JUNI"; break;
														case 3: $nama_page = "JULI S/D SEPTEMBER"; break;
														case 4: $nama_page = "OKTOBER S/D DESEMBER"; break;
													}
					?>
                    DATA INVESTASI PMA BERDASARKAN IZIN PRINSIP <?= $nama_page." ".$i_master_year; ?>
                    </div></div>
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                             
                                 <table data-filter="#filter" class="footable">
      <thead>
        <tr>
                                             <th rowspan="2" >No</th>
                                          		<th rowspan="2">Bidang Usaha</th>
                                                <?php
												
                                                for($i_bulan = 1; $i_bulan <= 3; $i_bulan++){
													switch($i_triwulan){
														case 1: $nama_bulan = array("", "Januari", "Februari", "Maret"); break;
														case 2: $nama_bulan = array("", "April", "Mei", "Juni"); break;
														case 3: $nama_bulan = array("", "Juli", "Agustus", "September"); break;
														case 4: $nama_bulan = array("", "Oktober", "November", "Desember"); break;
													}
												?>
                                            	<th colspan="3" align="center"><?= $nama_bulan[$i_bulan] ?></th>
                                             	<?php
												}
												?>
                                                <th colspan="3" align="center">
                                                <?php
                                                switch($i_triwulan){
														case 1: $nama_triwulan = "Triwulan I"; break;
														case 2: $nama_triwulan = "Triwulan II"; break;
														case 3: $nama_triwulan = "Triwulan III"; break;
														case 4: $nama_triwulan = "Triwulan IV"; break;
													}
												
												echo $nama_triwulan;
												?>
                                                </th>
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
                                              <th><?php if($i_master_sub_category_id == '1'){
												  $mata_uang = '$';
												  }else{
												  $mata_uang = 'Rp';}
												  ?>Investasi <?=$mata_uang?></th>
                                              <th>TK</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
										$no = 1;
                                        for($i_parent_bu = 1; $i_parent_bu <= 3; $i_parent_bu++){
											$no_parent = array("", "I", "II", "III");
											$nama_parent = array("", "PRIMER", "SEKUNDER", "TERSIER");
											
											 switch($i_triwulan){
														case 1: $bulan_awal = 1; $bulan_akhir = 3; break;
														case 2: $bulan_awal = 4; $bulan_akhir = 6; break;
														case 3: $bulan_awal = 7; $bulan_akhir = 9; break;
														case 4: $bulan_awal = 10; $bulan_akhir = 12; break;
													}
											
											?>
											 <tr bgcolor="#eee">
                                        <td><strong><?= $no_parent[$i_parent_bu]; ?></strong></td>
                                        <td><strong>SEKTOR <?= $nama_parent[$i_parent_bu]; ?></strong></td>
                                        <?php
                                                for($i_bulan_td_parent = $bulan_awal; $i_bulan_td_parent <= $bulan_akhir; $i_bulan_td_parent++){
												?>
                                        <td><?php echo get_data_p_parent($i_parent_bu, $i_bulan_td_parent, $i_master_sub_category_id, $i_master_year) ?></td>
                                        <td><?php echo tool_format_number(get_data_investasi_parent($i_parent_bu, $i_bulan_td_parent, $i_master_sub_category_id, $i_master_year)); ?></td>
                                        <td><?php echo get_data_tk_parent($i_parent_bu, $i_bulan_td_parent, $i_master_sub_category_id, $i_master_year) ?></td>
                                        <?php
												}
										?>
                                        <td><?php echo get_data_p_triwulan_parent($i_parent_bu, $i_triwulan, $i_master_sub_category_id, $i_master_year) ?></td>
                                        <td><?php echo tool_format_number(get_data_investasi_triwulan_parent($i_parent_bu, $i_triwulan, $i_master_sub_category_id, $i_master_year)) ?></td>
                                        <td><?php echo get_data_tk_triwulan_parent($i_parent_bu, $i_triwulan, $i_master_sub_category_id, $i_master_year) ?></td>
                                        </tr>
											<?php
												$q_bu = array("", $query_bu1, $query_bu2, $query_bu3);
											while($row_bu = mysql_fetch_array($q_bu[$i_parent_bu])){
										?>
                                            
                                        <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row_bu['business_type_name']; ?></td>
                                       <?php
                                                for($i_bulan_td = $bulan_awal; $i_bulan_td <= $bulan_akhir; $i_bulan_td++){
												?>
                                        <td><?php echo get_data_p($row_bu['business_type_id'], $i_bulan_td, $i_master_sub_category_id, $i_master_year) ?></td>
                                        <td><?php echo tool_format_number(get_data_investasi($row_bu['business_type_id'], $i_bulan_td, $i_master_sub_category_id, $i_master_year)) ?></td>
                                        <td><?php echo get_data_tk($row_bu['business_type_id'], $i_bulan_td, $i_master_sub_category_id, $i_master_year) ?></td>
                                        <?php
												}
										?>
                                        <td><?php echo get_data_p_triwulan($row_bu['business_type_id'], $i_triwulan, $i_master_sub_category_id, $i_master_year) ?></td>
                                        <td><?php echo tool_format_number(get_data_investasi_triwulan($row_bu['business_type_id'], $i_triwulan, $i_master_sub_category_id, $i_master_year)) ?></td>
                                        <td><?php echo get_data_tk_triwulan($row_bu['business_type_id'], $i_triwulan, $i_master_sub_category_id, $i_master_year) ?></td>
                                        </tr>
                                        <?php
                                        $no++;
											}
                                              
                                        }
                                        ?>
                                           
                                          
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