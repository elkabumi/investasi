<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'PERSETUJUAN IZIN PRINSIP'
            },
            xAxis: {
                categories: [<?php
								$year_1 = $year - 4;
                                for($y=$year_1; $y<=$year; $y++){
							
								if($y == '1'){
									echo $y;
									
									?>
									
									<?
								}else{
									
									echo $y.",";
								}
							}
							?>]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Triliun Rupiah'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -70,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black, 0 0 3px black'
                        }
                    }
                }
            },
            series: [{
				
                name: 'PMDN',
				
                data: [	<?php
					$year_2 = $year - 4;
                     for($y=$year_2; $y<=$year; $y++){
						$query=mysql_query("SELECT SUM(investasi) as total from master 
											where master_category_id = '6' 
											and master_type_id='1'
											and master_sub_category_id ='2' 
											and master_year = '$y'");
						$total_investasi = mysql_fetch_object($query);
					
						if($total_investasi->total == ''){
							$total_investasi->total = '0';
						}
						$total_investasi->total = $total_investasi->total / 1000000000000;
						if($y == '1'){
							echo $total_investasi->total;
						}else{
							echo $total_investasi->total.",";
					}
				 }  
				 ?>
					],
				color: '#f9c'
					
            }, {
                name: 'PMA',
                data: [<?php
				$year_3 = $year - 4;
                for($y=$year_3; $y<=$year; $y++){
					$total_rupiah= '0';
					$query2=mysql_query("SELECT * from master
										where master_category_id = '6'
											  
										and master_type_id='1'
										and master_sub_category_id ='1' 
										and master_year = '$y'");
					while($total_investasi2 = mysql_fetch_object($query2)){
						if($total_investasi2->investasi_dollar == ''){
							$total_investasi2->investasi_dollar = '0';
						}
						
						$total_investasi2->investasi_dollar = $total_investasi2->investasi_dollar * $total_investasi2->master_config_dollar;
						$total_rupiah = $total_investasi2->investasi_dollar + $total_rupiah;
					}
						$total_rupiah = $total_rupiah / 1000000000000;
					if($y == '1'){
						echo $total_rupiah;
					}else{
						echo $total_rupiah.",";
					}
				 }  
				 ?>],
				color: '#933'
				 
            }]
        });
    });
    

		</script>
<?php
  
  
  for($i=2; $i>=1; $i--){
	  	$j=$i - 1;
		$year_4 = $year - $j;  
?>

 
<script type="text/javascript">
$(function () {
    $('#container<?php echo $i ?>').highcharts({
        chart: {
            type: 'pie',
            options3d: {
				enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Tahun <?=$year_4?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                },
				showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Nilai investasi',
            data: [
				  <?php
				$total_data ='0';
				$total_pma ='0';
				$total_pmdn ='0';
				$q=mysql_query("SELECT * from master where  master_category_id ='6' and master_type_id='1'  and master_year = '$year_4'");			
					
				while($total_all_invest=mysql_fetch_object($q)){
						
						if($total_all_invest->investasi_dollar == ''){
							$total_all_invest->investasi_dollar ='0';	
						}
						if($total_all_invest->investasi == ''){
							$total_all_invest->investasi ='0';
						}
						
						$total_all_invest->investasi_dollar = $total_all_invest->investasi_dollar * $total_all_invest->master_config_dollar;
						
						$total_pma =$total_all_invest->investasi_dollar + $total_pma ;
						$total_pmdn = $total_all_invest->investasi + $total_pmdn;
						$total_data = $total_data+($total_all_invest->investasi_dollar + $total_all_invest->investasi);
						
			
					}
					
					if($total_data == '0'){
						$total_data = '1';
					}
					
					$total_result_pma = ($total_pma * 100) / $total_data;
					$total_result_pmdn = ($total_pmdn * 100) / $total_data;
			?>
					
			
			
			
			
			
			{
                    name: 'PMDN',
                    y: <?=$total_result_pmdn ?>,
                    sliced: true,
                    selected: true,
					color: '#f9c'
                },
                {name:'PMA'
				,y: <?=$total_result_pma ?>, color: '#933'},
                
            ]
        }]
    });
});
		</script>
<?php } ?>


 <section class="content-header">
                    <h1>
                       <?= $title?>
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><?= $title ?></a></li>
                      
                        <li class="active">Data</li>
                    </ol>
  </section>
                
                
                
                
  <section class="content">
  
   <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          

                             <form role="form" action="<?= $action?>" method="post">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                    	
                   
                                       
                                     <div class="col-md-12">
                                          <form role="form" action="<?= $action?>" method="post">
											<div class="form-group">
												<label>Tahun</label>
												<select id="basic" name="i_year" class="selectpicker show-tick form-control" data-live-search="true">
											   
												   <?php
												$year_select = date("Y") - 4;
												
                   								for($y=date("Y"); $y>=$year_select; $y--){
													$y2=$y-1;
												?>
												
												 <option value="<?php echo $y;?>" <?php if($y == $year){?> selected="selected"<?php } ?>><?php echo $y2." vs ".$y;?></option>
												<?php
												}
												?>
												  
												</select>
											  	</div>
                                              </form>
										  </div>     
                                          
                              
                                              
                                              <div style="clear:both;"></div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    <div class="box-footer">
                                <input class="btn btn-cokelat" type="submit" value="Preview"/>
                                </div>
                  
                            
                            </div><!-- /.box -->
                             
                            
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
           <div class="row">
                    
                  
              	<div class="col-md-6">
					<div class="box box-danger">
						<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					</div>
				</div>
                
                
                <div class="col-md-6">
                    <div class="box box-danger">
                     <table width="100%" border="0" cellspacing="0" cellpadding="2" class="tabel_manual" style="font-size:22px;">
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Total Persetujuan izin prinsip</strong></td>
                        </tr>
                        <tr>
                          <td><strong>Tahun 
                            <?= $year ?> vs <?= $year-1; ?>
                          </strong></td>
                        </tr>
                        <tr>
                          <td >
                            <strong>
                            <?php
                          $year1 =$year;
                          $year2 = $year - 1;
						  $asli_total1 = get_data_total($year1);
						  $asli_total2 = get_data_total($year2);
                          $total1 = (get_data_total($year1) == 0) ? 1: get_data_total($year1);
                          $total2 = (get_data_total($year2) == 0) ? 1 : get_data_total($year2);
                         
                          if($total1 > $total2){
                              $persen = ($total1 / $total2) * 100;
                              $persen = $persen - 100;
							  if($asli_total2  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								}
                              $persen = number_format($persen, 2);
                              echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
                          }else{
                              $persen = ($total2 / $total1) * 100;
                              $persen = $persen - 100;
							   if($asli_total1  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								  }
                              $persen = number_format($persen, 2);
                              echo "menurun <span style='color:#F00'> - ".$persen." %</span>";
                          }
                          ?>
                            </strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    
                    </div>
                    
                    <div class="box box-danger">
                     <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tabel_manual" id="new_table">
                      <thead>
                    <tr>
                        <td>TAHUN</td>
                        
                                        <?php
                                        $year_5 = $year - 4;
                                        for($y=$year_5 ; $y<=$year; $y++){
                                            
                                            echo "<td align='center'>".$y."</td>";
                                            
                                        }
                                        ?>
                      </tr>
                        </thead>
                      <tr>
                        <td style="background-color:#FF99CC">PMDN</td>
                       <?php
                                        $year_5 = $year - 4;
                                       	for($y=$year_5 ; $y<=$year; $y++){
                                            $data = get_data($y);
                                            echo "<td align='center'>".$data."</td>";
                                            
                                        }
                                        ?>
                      </tr>
                      <tr>
                        <td style="background-color:#993333">PMA</td>
                       <?php
                                        $year_5 = $year - 4;
                                       	for($y=$year_5 ; $y<=$year; $y++){
                                            $data = get_data_dollar($y);
                                            echo "<td align='center'>".$data."</td>";
                                        }
                                        ?>
                      </tr>
                      <tr>
                        <td><b>TOTAL</b></td>
                       <?php
                                         $year_5 = $year - 4;
                                       	for($y=$year_5 ; $y<=$year; $y++){
                                            $data = get_data_total($y);
                                            echo "<td align='center'><b>".$data."</b></td>";
                                        }
                                        ?>
                      </tr>
                    </table>
                      </div>
                
                </div>
                
			</div>
 

		<div class="row">
				<div class="col-md-6">
					<div class="box box-danger">
						<div id="container2" style="height: 400px"></div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="box box-danger">
						<div id="container1" style="height: 400px"></div>
					</div>
				</div>
		</div>

</section>