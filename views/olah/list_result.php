

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
                                          <th  data-class="expand" data-sort-initial="true">No</th>
                                          		<th>Kategori</th>
                                            	<th>Nama Perusahaan</th>
                                                <th data-hide="phone">Alamat</th>
                                                <th data-hide="phone">No IP</th>
                                                <th data-hide="phone">No IU</th>
                                                <th data-hide="all">No Perusahaan</th>
                                                <th data-hide="all">No Kode Proyek</th>       
                                                <th data-hide="all">Investasi</th>
                                                <th data-hide="all">Tenaga Kerja</th>
                                                <th data-hide="all">Kapasitas</th>
                                                <th data-hide="all">Ekspor</th>                                           
                                                <th data-hide="phone">Negara</th>
                                                <th data-hide="phone">Lokasi</th>
                                                <th data-hide="phone,tablet">NPWP</th>
                                                <th data-hide="phone">Bidang Usaha</th>
                                                <th data-hide="all">Lain-lain</th>
                                                <th data-hide="all">Tahun</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            	<td><?= $no ?></td>
                                                <td><?php
													if($row['master_type_id'] == 2){
													echo "Realisasi ".$row['master_sub_category_name'];
													}
													
												if($row['master_category_id'] == 6 && $row['master_type_id'] == 1){
													echo $row['master_category_name'];
													echo " ( ".$row['master_ip_type_name']." )";
												} ?></td>
                                             	<td><?= $row['nama_perusahaan']?></td>
                                                <td><?= $row['alamat']?></td>
                                                <td><?= $row['no_ip']?></td>
                                                <td><?= $row['no_iu']?></td>
                                                 <td><?= $row['no_perusahaan']?></td>
                                                  <td><?= $row['no_kode_proyek']?></td>
                                                   <td><?= $row['investasi']?></td>
                                                 <td><?= $row['tenaga_kerja']?></td>
                                                <td><?= $row['kapasitas']?></td>
                                                <td><?= $row['ekspor']?></td>
                                                <td><?= $row['country_name']?></td>
                                                <td><?= $row['city_name']?></td>
                                                <td><?= $row['npwp']?></td>
                                                <td><?= $row['business_type_name']?></td>
                                                <td><?= $row['keterangan']?></td>
                                                <td><?= $row['master_year']?></td>
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