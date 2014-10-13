<div class="row">
<?php
$title = array(
		"Tanggal",
		"Jumlah Truk",
		"Jumlah Pengiriman",
		"Jumlah Volume"
		);
$content = array(format_date($date), $total_truk, $total_pengiriman, $total_volume);
for($i=0; $i<=3; $i++){
?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div  style="background-color:#FFF;">
                                     <div class="box box-default" style="padding:10px;">
                               	<?php
                                if($i==0){ ?>
									 <span style="font-size:36px; color:#09F; font-weight:bold;">
								<?php }else{
								?>
                                    <span style="font-size:36px; font-weight:bold;">
                                      <?php
								}
									  ?>
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