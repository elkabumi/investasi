<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Realisasi Investasi'
            },
            xAxis: {
                categories: [
				<?php
				$year = $year_default - 4;
				for($y=$year; $y<=$year_default; $y++){
					echo "'".$y."'"; if($y!=$year_default){ echo ","; }
				}
				?>
				]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Trilyun Rupiah'
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
                            textShadow: '0 0 1px black, 0 0 1px black'
                        }
                    }
                }
            },
            series: [{
                name: 'Non Fas',
                data: [
					<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data(3, $y);
						echo $data;
						if($y!=$year_default){ echo ","; }
					}
					?>
				],
				color: '#ff0'
            }, {
                name: 'PMDN',
                data: [
				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data(2, $y);
						echo $data;
						if($y!=$year_default){ echo ","; }
					}
					?>
				],
				color: '#f9c',
            }, {
                name: 'PMA',
                data: [
				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data_dollar(1, $y);
						echo $data;
						if($y!=$year_default){ echo ","; }
					}
					?>
				],
				color: '#933'
            }]
        });
    });
    

		</script>
        
        <script type="text/javascript">
$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'pie',
            options3d: {
				enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Tahun <?= $year_default - 1; ?>'
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
            name: 'Persentase ',
            data: [
				{
                    name: 'Non Fas',
                    y: <?php
						$year_last = $year_default - 1;
						$data_non_fas = get_data(3, $year_last);
						
						echo $data_non_fas;
					
					?>,
             		color: '#FFFF00'
                },
             
               {
                    name: 'PMDN',
                    y:
				<?php
						
						$data_pmdn = get_data(2, $year_last);					
						
						echo $data_pmdn;
					
					?>,
					color: '#FF99CC'
			   },
               {
                    name: 'PMA',
                    y: <?php
						$data_pma = get_data_dollar(1, $year_last);						
						
						echo $data_pma;
				
				?>,
             		color: '#993333'
                }
                
            ]
        }]
    });
});
		</script>
        
          <script type="text/javascript">
$(function () {
    $('#container3').highcharts({
        chart: {
            type: 'pie',
            options3d: {
				enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Tahun <?= $year_default; ?>'
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
            name: 'Persentase ',
            data: [
				{
                    name: 'Non Fas',
                    y: <?php
						$year_now = $year_default;
						$data_non_fas = get_data(3, $year_now);
						
						echo $data_non_fas;
					
					?>,
             		color: '#FFFF00'
                },
             
               {
                    name: 'PMDN',
                    y:
				<?php
						
						$data_pmdn = get_data(2, $year_now);					
						
						echo $data_pmdn;
					
					?>,
					color: '#FF99CC'
			   },
               {
                    name: 'PMA',
                    y: <?php
						$data_pma = get_data_dollar(1, $year_now);						
						
						echo $data_pma;
				
				?>,
             		color: '#993333'
                }
                
            ]
        }]
    });
});
		</script>
        
        	<script type="text/javascript">
$(function () {
        $('#container4').highcharts({
            title: {
                text: 'Grafik Realisasi investasi ',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: [<?php
				$year = $year_default - 4;
				for($y=$year; $y<=$year_default; $y++){
					echo "'".$y."'"; if($y!=$year_default){ echo ","; }
				}
				?>
				]
            },
            yAxis: {
                title: {
                    text: 'Trilyun Rupiah'
                },
				 min: 0,
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Non Fas',
                data: [
				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data(3, $y);
						echo $data;
						if($y!=$year_default){ echo ","; }
					}
					?>
				],
					color: '#FFFF00',
            }, {
                name: 'PMDN',
                data: [<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data(2, $y);
						echo $data;
						if($y!=$year_default){ echo ","; }
					}
					?>
					],
				color: '#f9c',
            }, {
                name: 'PMA',
                data: [<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data_dollar(1, $y);
						echo $data;
						if($y!=$year_default){ echo ","; }
					}
					?>],
				color: '#933'
            }]
        });
    });
    

		</script>
        
        
        
        
        
        
        
        
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
									<div class="form-group">
										<label>Tahun</label>
										<select id="basic" name="i_year" class="selectpicker show-tick form-control" data-live-search="true">
											   
										<?php
											$year_select = $year_default - 4;
												
                   							for($y=date("Y"); $y>=$year_select; $y--){
												$y2=$y-1;
										?>
												
											<option value="<?php echo $y;?>" <?php if($y == $year_default){?> selected="selected"<?php } ?>><?php echo $y2." vs ".$y;?></option>
										<?php
											}
										?>
												  
										</select>
                                              
									</div>
                                   </div>
                            <div style="clear:both;"></div>
						</div>
					
                    <div class="box-footer">
                        <input class="btn btn-cokelat" type="submit" value="Preview"/>
                    </div>
				</div>
			   </form>
        </div><!--/.col (right) -->
	</div>   <!-- /.row -->



<div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
 <div class="box box-danger">
                          
            <div id="container4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

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
      <td><strong>Total Realisasi Investasi </strong></td>
    </tr>
    <tr>
      <td><strong>Tahun 
        <?= $year_default ?> vs <?= $year_default - 1; ?>
      </strong></td>
    </tr>
    <tr>
      <td >
        <strong>
        <?php
      $year1 = $year_default;
	  $year2 = $year1 - 1;
	  $total1 = (get_data_total($year1) == 0) ? 1 : get_data_total($year1);
	  $total2 = (get_data_total($year2) == 0) ? 1 : get_data_total($year2);
	 
	  if($total1 > $total2){
		  $persen = ($total1 / $total2) * 100;
		  $persen = $persen - 100;
		  $persen = number_format($persen, 2);
		  echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
	  }else if($total1 < $total2){
		  $persen = ($total2 / $total1) * 100;
		  $persen = $persen - 100;
		   $persen = number_format($persen, 2);
		  echo "menurun <span style='color:#F00'> - ".$persen." %</span>";
	  }else{
		  echo "Sama <span style='color:#F00'>0%</span>";
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
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						
						echo "<td align='center'>".$y."</td>";
						
					}
					?>
  </tr>
    </thead>
  <tr>
    <td style="background-color:#FFFF00">Non Fas</td>
    
    				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data(3, $y);
						echo "<td align='center'>".$data."</td>";
						
					}
					?>
  </tr>
  <tr>
    <td style="background-color:#FF99CC">PMDN</td>
   <?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data(2, $y);
						echo "<td align='center'>".$data."</td>";
						
					}
					?>
  </tr>
  <tr>
    <td style="background-color:#993333">PMA</td>
   <?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						$data = get_data_dollar(1, $y);
						echo "<td align='center'>".$data."</td>";
					}
					?>
  </tr>
  <tr>
    <td><b>TOTAL</b></td>
   <?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
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
<div id="container3" style="height: 400px"></div>
</div>
</div>
</div>



  

</section>