<?php echo $format; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="font-size:32px; font-weight:bold;" colspan="12">Laporan <?= $nama_category ?> </td>
  </tr>
  <tr>
    <td align="center" style="font-size:22px; font-weight:bold;"  colspan="12"><?= "Triwulan ".$i_triwulan." - ".$i_master_year; ?></td>
  </tr>
</table>

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
                                                 <th data-class="expand" data-sort-initial="true">No</th>
                                            	<th>Nama Perusahaan</th>
                                           	 <th data-hide="phone">Alamat</th>
                                                <th data-hide="phone">NO IP</th>
                                                <th data-hide="phone">NO IU</th>
                                                <th data-hide="phone">NO Perusahaan</th>
                                                <th data-hide="phone">NO Kode Proyek</th>
                                                <th data-hide="phone">Investasi</th>
                                               <th data-hide="phone">Tenaga Kerja</th>
                                                <th data-hide="phone">Kapasitas</th>
                                                 <th data-hide="phone">Ekspor</th>
                                                <th data-hide="phone">Negara</th>
                                                <th data-hide="phone,tablet">Lokasi</th>
                                                <th data-hide="phone,tablet">NPWP</th>
                                                <th data-hide="phone,tablet">Bidang Usaha</th>
                                                 <th data-hide="phone">Lain-lain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
                                           $no_item = 1;
                                            while($row_item = mysql_fetch_array($query_item)){
                                       ?>
                                            <tr>
                                          	<td><?= $no_item ?></td>
                                             	<td><?= $row_item['nama_perusahaan']?></td>
                                                <td><?= $row_item['alamat']?></td>
                                                <td><?= $row_item['no_ip']?></td>
                                                <td><?= $row_item['no_iu']?></td>
                                                <td><?= $row_item['no_perusahaan']?></td>
                                                <td><?= $row_item['no_kode_proyek']?></td>
                                                <td><?= $row_item['investasi']?></td>
                                                <td><?= $row_item['tenaga_kerja']?></td>
                                                <td><?= $row_item['kapasitas']?></td>
                                                <td><?= $row_item['ekspor']?></td>
                                                <td><?= $row_item['country_name']?></td>
                                                <td><?= $row_item['city_name']?></td>
                                                <td><?= $row_item['npwp']?></td>
                                                <td><?= $row_item['business_type_name']?></td>
                                                <td><?= $row_item['keterangan']?></td>
                                                 </tr>
                                           
                                        

                                              <?php
											$no_item++;
                                            }
                                            ?>

                                          
                                        </tbody>
                                         
                                    </table>