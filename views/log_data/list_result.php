

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                   <?php
                               include '../views/layout/search2.php';
							   ?>
                                 <table data-filter="#filter" class="footable" data-page-size="10" id="new_table">
      <thead>
        <tr>
                                          <th  data-class="expand" data-sort-initial="true" data-type="numeric">No</th>
                                          		<th>Tanggal</th>
                                            	<th>Jam</th>
                                                <th>Alamat IP</th>
                                                <th>User</th>
                                                <th>Tipe log</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            	<td><?= $no ?></td>
                                                <td><?= get_date($row['log_data_time']); ?></td>
                                            	<td><?= get_hour($row['log_data_time']); ?></td>
                                                <td><?= $row['log_data_ip'] ?></td>
                                                <td><?= $row['user_name'] ?></td>
                                                <td><?= $row['log_data_type_name'] ?></td>
                                                <td><?= $row['log_data_description'] ?></td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                      <tfoot class="footable-pagination">
        <tr>
          <td colspan="7"><div class="pagination pagination-centered"></div></td>
        </tr>
      </tfoot> 
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->