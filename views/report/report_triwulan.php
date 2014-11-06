<?php echo $format; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="font-size:32px; font-weight:bold;" colspan="<?= $colspan_aktif ?>">Laporan Triwulan <?= $nama_category ?> </td>
  </tr>
  <tr>
    <td align="center" style="font-size:22px; font-weight:bold;"  colspan="<?= $colspan_aktif ?>"><?= "Triwulan ".$i_triwulan." - ".$i_master_year; ?></td>
  </tr>
</table>
<!--
<br />
<table border="1" cellpadding="4" cellspacing="0" class="table table-bordered"> 
 <thead>
                                            <tr>
 <?php
$title = array(
		"Triwulan - Tahun",
		"Jumlah Data",
		"Total Investasi",
		"Total Tenaga Kerja"
		);
$content = array($tanggal, $jumlah_data, $jumlah_investasi, $jumlah_tenaga_kerja);
for($i=0; $i<=3; $i++){
?>
    <th <?php if($i==0 || $i ==1){ ?> colspan="2"<?php } ?> bgcolor="#dddddd"><?= $title[$i]?>&nbsp;</th>
     <?php } ?>
  </tr>
  </thead>
<tbody>
  <tr> <?php
for($i2=0; $i2<=3; $i2++){
?>
    <td <?php if($i2==0 || $i2 ==1){ ?> colspan="2"<?php } ?> style="font-size:24px;"><?= $content[$i2] ?>&nbsp;</td>
   <?php } ?>   
  </tr></tbody>

</table>             
                   
        
                
                <!-- list item -->
                <br />
 <table border="1" cellpadding="4" cellspacing="0" class="table table-bordered table-striped" id="example1">
                                        <thead>
                                            <tr bgcolor="#dddddd">
                                                <?php
                                               $nama_kolom = array(
										   		'',
										   		'Kategori',
												'Tanggal',
												'Nama Perusahaan',
												'Alamat',
												'No IP',
												'No IU',
												'No Perusahaan',
												'No Kode Proyek',
												'Investasi (Rp)',
												'Investasi ($)',
												'Kurs Dollar',
												'Tenaga Kerja Pria',
												'Tenaga Kerja Wanita',
												'Tenaga Kerja Asing',
												'Total Tenaga Kerja',
												'Kapasitas',
												'Ekspor',
												'Negara',
												'Lokasi',
												'NPWP',
												'Bidang Usaha',
												'Sub Bidang Usaha',
												'Produksi',
												'Tanggal Expired',
												'Lain-lain',
												'Tahun'
												
										   );
											  ?>
                                              
                                          		<th  data-class="expand" data-sort-initial="true">No</th>
                                                <?php
                                                for($ic=1; $ic<=26; $ic++){
												?>
                                          		<?php if($kol[$ic] == 1){ ?><th><?= $nama_kolom[$ic]; ?></th><?php } ?>
                                             
                                                <?php
												}
												?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
                                           $no_item = 1;
                                            while($row = mysql_fetch_array($query_item)){
                                       ?>
                                            <tr>
                                          
                                             		<td><?= $no_item ?></td>
                                                <?php if($kol[1] == 1){ ?><td><?php
													if($row['master_type_id'] == 2){
													echo "Realisasi ".$row['master_sub_category_name'];
													}
													
												if($row['master_category_id'] == 6 && $row['master_type_id'] == 1){
													echo $row['master_category_name'];
													echo " ".$row['master_sub_category_name'];
													echo " ( ".$row['master_ip_type_name']." )";
												} 
												$spasi = "&nbsp;";
												?></td><?php } ?>
                                                <?php if($kol[2] == 1){ ?><td><?= $spasi.format_date($row['master_date']) ?></td><?php } ?>
                                             	<?php if($kol[3] == 1){ ?><td><?= $spasi.$row['nama_perusahaan']?></td><?php } ?>
                                                <?php if($kol[4] == 1){ ?><td><?= $spasi.$row['alamat']?></td><?php } ?>
                                                <?php if($kol[5] == 1){ ?><td><?= $spasi.$row['no_ip']?></td><?php } ?>
                                                <?php if($kol[6] == 1){ ?> <td><?= $spasi.$row['no_iu']?></td><?php } ?>
                                                <?php if($kol[7] == 1){ ?><td><?= $spasi.$row['no_perusahaan']?></td><?php } ?>
                                                <?php if($kol[8] == 1){ ?><td><?= $spasi.$row['no_kode_proyek']?></td><?php } ?>
                                                <?php if($kol[9] == 1){ ?><td align="right"><?= $spasi.$row['investasi']?></td><?php } ?>
                                                <?php if($kol[10] == 1){ ?><td align="right"><?= $spasi.$row['investasi_dollar']?></td><?php } ?>
                                                <?php if($kol[11] == 1){ ?><td align="right"><?= $spasi.$row['master_config_dollar']?></td><?php } ?>
                                                <?php if($kol[12] == 1){ ?><td><?= $spasi.$row['master_tk_laki']?></td><?php } ?>
                                                <?php if($kol[13] == 1){ ?><td><?= $spasi.$row['master_tk_perempuan']?></td><?php } ?>
                                                <?php if($kol[14] == 1){ ?><td><?= $spasi.$row['master_tk_asing']?></td><?php } ?>
                                                <?php if($kol[15] == 1){ ?><td><?= $spasi.$row['tenaga_kerja']?></td><?php } ?>
                                                <?php if($kol[16] == 1){ ?><td align="right"><?= $spasi.$row['kapasitas']?></td><?php } ?>
                                                <?php if($kol[17] == 1){ ?><td align="right"><?= $spasi.$row['ekspor']?></td><?php } ?>
                                                <?php if($kol[18] == 1){ ?><td><?= $spasi.$row['country_name']?></td><?php } ?>
                                                <?php if($kol[19] == 1){ ?><td><?= $spasi.$row['city_name']?></td><?php } ?>
                                                <?php if($kol[20] == 1){ ?><td><?= $spasi.$row['npwp']?></td><?php } ?>
                                                <?php if($kol[21] == 1){ ?><td><?= $spasi.$row['business_type_name']?></td><?php } ?>
                                                <?php if($kol[22] == 1){ ?> <td><?= $spasi.$row['business_sub_type_id']?></td><?php } ?>
                                                <?php if($kol[23] == 1){ ?> <td><?= $spasi.$row['master_production']?></td><?php } ?>
                                                <?php if($kol[24] == 1){ ?><td><?= $spasi.format_date($row['master_expired_date']) ?></td><?php } ?>
                                                <?php if($kol[25] == 1){ ?><td><?= $spasi.$row['keterangan']?></td><?php } ?>
                                                <?php if($kol[26] == 1){ ?><td><?= $spasi.$row['master_year']?></td><?php } ?>
                                                 </tr>
                                           
                                        

                                              <?php
											$no_item++;
                                            }
                                            ?>

                                          
                                        </tbody>
                                         
                                    </table>