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
						$data = get_data($y,$country_id,$city_id,$business_id,$sub_business_id);
						echo $data;
						if($y!=$year_default){ echo ","; }
				 	}  
				 ?>
					],
				color: '#f9c'
					
            }, {
                name: 'PMA',
                data: [<?php
				$year_3 = $year - 4;
                for($y=$year_3; $y<=$year; $y++){
					$data = get_data_dollar($y,$country_id,$city_id,$business_id,$sub_business_id);
						echo $data;
						if($y!=$year_default){ echo ","; }
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
                     format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                },
				showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Nilai investasi',
            data: [
				  <?php
				  
				   $data_pmdn = get_data($year_4,$country_id,$city_id,$business_id,$sub_business_id);
				   $data_pma = get_data_dollar($year_4,$country_id,$city_id,$business_id,$sub_business_id);
				   
				  
					?>
					
			
			
			
			
			
			{
                    name: 'PMDN',
                    y: <?=$data_pmdn ?>,
                   
					color: '#f9c'
                },
                {name:'PMA'
				,y: <?=$data_pma ?>, color: '#933'},
                
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
                                    	
                   
                                       
                                    <div class="col-md-4"> 
                                     
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
                                                </div>
                                      <div class="col-md-4"> 
                                                <div class="form-group">
                                        <label>Negara</label>
                                        <select id="basic" name="i_country_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- PILIH SEMUA --</option>
                                       
                                       
                                           <?php
                                        $query_country = mysql_query("select * from countries");
                                        while($row_country = mysql_fetch_array($query_country)){
                                        ?>
                                         <option value="<?= $row_country['country_id']?>" <?php if($row_country['country_id'] == $country_id){ ?> selected="selected"<?php }?>><?= $row_country['country_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      
                                      </div>
                                      <div class="col-md-4"> 
                                      <div class="form-group">
                                        <label>Lokasi</label>
                                        <select id="basic" name="i_city_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- PILIH SEMUA --</option>
                                       
                                           <?php
                                        $query_city = mysql_query("select * from cities");
                                        while($row_city = mysql_fetch_array($query_city)){
                                        ?>
                                         <option value="<?= $row_city['city_id']?>" <?php if($row_city['city_id'] == $city_id){ ?> selected="selected"<?php }?>><?= $row_city['city_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      </div>
                                      
                                      
                                       <div class="col-md-4"> 
                                   
                                               <div class="form-group">
                                        <label>Bidang Usaha</label>
                                        <select id="basic" name="i_business_type_id" class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="0">-- PILIH SEMUA --</option>
                                       
                                           <?php
                                        $query_buss = mysql_query("select * from business_types");
                                        while($row_buss = mysql_fetch_array($query_buss)){
                                        ?>
                              <option value="<?= $row_buss['business_type_id']?>" <?php if($row_buss['business_type_id'] == $business_id) 		{ ?> selected="selected"<?php }?>><?= $row_buss['business_type_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      </div>
                                      
                                       <div class="col-md-8"> 
                                   
                                               <div class="form-group">
                                        <label>Bidang Usaha</label>
                                         <input  type="text" name="i_sub_business_type_id" class="form-control" placeholder="Enter ..." value="<?= $sub_business_id ?>"/>
                                      </div>
                                      </div>
                                              </form>
									
                                                 
                                          
                              
                                              
                                              <div style="clear:both;"></div>

                                       
                                      
                                   
                                </div><!-- /.box-body -->
                             
                    <div class="box-footer">
                                <input class="btn btn-cokelat" type="submit" value="Preview"/>
                                </div>
                  
                      
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
						  $asli_total1 = get_data_total($year1,$country_id,$city_id,$business_id,$sub_business_id);
						  $asli_total2 = get_data_total($year2,$country_id,$city_id,$business_id,$sub_business_id);
                          $total1 = (get_data_total($year1,$country_id,$city_id,$business_id,$sub_business_id) == 0) ? 1: get_data_total($year1,$country_id,$city_id,$business_id,$sub_business_id);
                          $total2 = (get_data_total($year2,$country_id,$city_id,$business_id,$sub_business_id) == 0) ? 1 : get_data_total($year2,$country_id,$city_id,$business_id,$sub_business_id);
                         
                          if($total1 > $total2){
                              $persen = ($total1 / $total2) * 100;
                              $persen = $persen - 100;
							  if($asli_total2  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								}
                              $persen = number_format($persen, 2);
                              echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
                          }else if($total1 < $total2){
                              $persen = ($total2 / $total1) * 100;
                              $persen = $persen - 100;
							   if($asli_total1  == '0' and $persen != '0'){
								  	$persen = $persen + 100 ;
								  }
                              $persen = number_format($persen, 2);
                              echo "menurun <span style='color:#F00'> - ".$persen." %</span>";
                          }else{
						  		echo "sama <span style='color:#F00'>0%</span>";
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
                                            $data = get_data($y,$country_id,$city_id,$business_id,$sub_business_id);
                                            echo "<td align='center'>".$data."</td>";
                                            
                                        }
                                        ?>
                      </tr>
                      <tr>
                        <td style="background-color:#993333">PMA</td>
                       <?php
                                        $year_5 = $year - 4;
                                       	for($y=$year_5 ; $y<=$year; $y++){
                                            $data = get_data_dollar($y,$country_id,$city_id,$business_id,$sub_business_id);
                                            echo "<td align='center'>".$data."</td>";
                                        }
                                        ?>
                      </tr>
                      <tr>
                        <td><b>TOTAL</b></td>
                       <?php
                                         $year_5 = $year - 4;
                                       	for($y=$year_5 ; $y<=$year; $y++){
                                            $data = get_data_total($y,$country_id,$city_id,$business_id,$sub_business_id);
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