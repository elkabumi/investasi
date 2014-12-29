

                <!-- Main content -->
               
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                   <?php
                               include '../views/layout/search2.php';
							   ?>
                                 <table data-filter="#filter" class="footable" data-page-size="10" id="new_table">
      <thead>
        <tr>
                                          
                                          		 <th data-class="expand" data-sort-initial="true" data-type="numeric">Ranking</th>
                                                <th>Negara</th>
                                            	<th>Jumlah Investasi</th>
                                                <th>Jumlah Tenaga Kerja</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           	$no = 1;
										  	
                                            while($row = mysql_fetch_array($query_item)){
                                            ?>
                                            <tr>
                                           		<td><b><?= $no ?></b></td>
                                                <td><?= $row['country_name']?></td>
                                                <td><?= $row['total_dollar']?></td>
                                                <td><?= $row['tenaga_kerja']?></td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                      <tfoot class="footable-pagination">
        <tr>
          <td colspan="12"><div class="pagination pagination-centered"></div></td>
        </tr>
      </tfoot> 
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->