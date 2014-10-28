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
				$year = date("Y") - 4;
				for($y=$year; $y<=date("Y"); $y++){
					echo "'".$y."'"; if($y!=date("Y")){ echo ","; }
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
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
						$data = get_data(3, $y);
						echo $data;
						if($y!=date("Y")){ echo ","; }
					}
					?>
				],
				color: '#ff0'
            }, {
                name: 'PMDN',
                data: [
				<?php
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
						$data = get_data(2, $y);
						echo $data;
						if($y!=date("Y")){ echo ","; }
					}
					?>
				],
				color: '#f9c',
            }, {
                name: 'PMA',
                data: [
				<?php
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
						$data = get_data_dollar(1, $y);
						echo $data;
						if($y!=date("Y")){ echo ","; }
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
            text: 'Tahun <?= date("Y") - 1; ?>'
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
						$year_last = date("Y") - 1;
						$data_non_fas = 10;//get_data(3, $year_last);
						
						echo $data_non_fas;
					
					?>,
             		color: '#FFFF00'
                },
             
               {
                    name: 'PMDN',
                    y:
				<?php
						
						$data_pmdn = 20;//get_data(2, $year_last);					
						
						echo $data_pmdn;
					
					?>,
					color: '#FF99CC'
			   },
               {
                    name: 'PMA',
                    y: <?php
						$data_pma = 10;//get_data(1, $year_last);						
						
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
            text: 'Tahun <?= date("Y"); ?>'
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
						$year_now = date("Y");
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
        <?= date("Y") ?> vs <?= date("Y") - 1; ?>
      </strong></td>
    </tr>
    <tr>
      <td >
        <strong>
        <?php
      $year1 = date("Y");
	  $year2 = $year1 - 1;
	  $total1 = (get_data_total($year1) == 0) ? 1 : get_data_total($year1);
	  $total2 = (get_data_total($year2) == 0) ? 1 : get_data_total($year2);
	 
	  if($total1 > $total2){
		  $persen = ($total1 / $total2) * 100;
		  $persen = $persen - 100;
		  $persen = number_format($persen, 2);
		  echo "meningkat <span style='color:#F00'> + ".$persen." %</span>";
	  }else{
		  $persen = ($total2 / $total1) * 100;
		  $persen = $persen - 100;
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
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
						
						echo "<td align='center'>".$y."</td>";
						
					}
					?>
  </tr>
    </thead>
  <tr>
    <td style="background-color:#FFFF00">Non Fas</td>
    
    				<?php
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
						$data = get_data(3, $y);
						echo "<td align='center'>".$data."</td>";
						
					}
					?>
  </tr>
  <tr>
    <td style="background-color:#FF99CC">PMDN</td>
   <?php
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
						$data = get_data(2, $y);
						echo "<td align='center'>".$data."</td>";
						
					}
					?>
  </tr>
  <tr>
    <td style="background-color:#993333">PMA</td>
   <?php
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
						$data = get_data_dollar(1, $y);
						echo "<td align='center'>".$data."</td>";
					}
					?>
  </tr>
  <tr>
    <td><b>TOTAL</b></td>
   <?php
					$year = date("Y") - 4;
					for($y=$year; $y<=date("Y"); $y++){
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