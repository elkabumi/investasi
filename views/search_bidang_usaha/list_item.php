

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
                                          		<th rowspan="2">Bidang Usaha</th>
                                                <?php
                                                for($i_bulan = 1; $i_bulan <= 3; $i_bulan++){
													$nama_bulan = array("", "Januari", "Februari", "Maret");
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
                                              <th>Investasi</th>
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
										$no = 1;
                                        for($i_parent_bu = 1; $i_parent_bu <= 3; $i_parent_bu++){
											$no_parent = array("", "I", "II", "III");
											$nama_parent = array("", "PRIMER", "SEKUNDER", "TERSIER");
											?>
											 <tr bgcolor="#eee">
                                        <td><strong><?= $no_parent[$i_parent_bu]; ?></strong></td>
                                        <td><strong>SEKTOR <?= $nama_parent[$i_parent_bu]; ?></strong></td>
                                        <?php
                                                for($i_bulan_td_parent = 1; $i_bulan_td_parent <= 3; $i_bulan_td_parent++){
												?>
                                        <td><?php echo get_data_p_parent($i_parent_bu, $i_bulan_td_parent, $i_master_sub_category_id) ?></td>
                                        <td><?php echo get_data_investasi_parent($i_parent_bu, $i_bulan_td_parent, $i_master_sub_category_id) ?></td>
                                        <td><?php echo get_data_tk_parent($i_parent_bu, $i_bulan_td_parent, $i_master_sub_category_id) ?></td>
                                        <?php
												}
										?>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        </tr>
											<?php
												$q_bu = array("", $query_bu1, $query_bu2, $query_bu3);
											while($row_bu = mysql_fetch_array($q_bu[$i_parent_bu])){
										?>
                                            
                                        <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row_bu['business_type_name']; ?></td>
                                       <?php
                                                for($i_bulan_td = 1; $i_bulan_td <= 3; $i_bulan_td++){
												?>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
                                        <?php
												}
										?>
                                        <td>test</td>
                                        <td>test</td>
                                        <td>test</td>
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