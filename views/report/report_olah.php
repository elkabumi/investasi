<?php echo $format; ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="font-size:32px; font-weight:bold;" colspan="18">Laporan Olah <?= $nama_category ?> </td>
  </tr>
</table>

<br />
<table border="1" cellpadding="4" cellspacing="0" class="table table-bordered"> 
 <thead>
 <tr bgcolor="#dddddd">
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
                                    </table>
