<div class="row">
<?php
$title = array(
		"Jumlah Hari",
		"Jumlah Truk",
		"Jumlah Pengiriman",
		"Jumlah Volume"
		);
$content = array($jumlah_hari, $jumlah_truk, $jumlah_pengiriman, $jumlah_volume);
for($i=0; $i<=3; $i++){
?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div  style="background-color:#FFF;">
                                     <div class="box box-default" style="padding:10px;">
                               
                                    <span style="font-size:36px; font-weight:bold;">
                                        <?= $content[$i]?>
                                    </span>
                                    <p>
                                       <?= $title[$i]?>
                                    </p>
                             
                               </div>
                               
                            </div>
                        </div><!-- ./col -->
                        
                        
                      <?php
}
					  ?>
                       
                    </div><!-- /.row -->