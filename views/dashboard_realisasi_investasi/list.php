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
            text: 'Browser market shares at a specific website, 2014'
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
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
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
                    
                  
                        <div class="col-xs-12">
	

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</div>
</div>
</section>

             
                
                
  <section class="content">
                    <div class="row">
                    
                  
                        <div class="col-xs-12">
	

<div id="container2" style="height: 400px"></div>

</div>
</div>
</section>