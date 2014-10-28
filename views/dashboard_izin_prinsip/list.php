
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
								for($i=5; $i>=1; $i--){
								$year = date('Y') - $i;
								if($i == '1'){
									echo $year;
									
									?>
									
									<?
								}else{
									
									echo $year.",";
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
				for($y=5; $y>=1; $y--){
					$year = date('Y') - $y;
					$query=mysql_query("SELECT SUM(investasi) as total from master where master_sub_category_id ='2' and master_year = '$year'");
					$total_investasi = mysql_fetch_object($query);
					$total_investasi->total = $total_investasi->total / 1000000000000;
					if($total_investasi->total == ''){
						$total_investasi->total = '0';
					}
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
				for($i=5; $i>=1; $i--){
					$year = date('Y') - $i;
					$query2=mysql_query("SELECT SUM(investasi_dollar) as total from master where master_sub_category_id ='1' and master_year = '$year'");
					
					
					$total_investasi2 = mysql_fetch_object($query2);
					if($total_investasi2->total == ''){
						$total_investasi2->total = '0';
					}
					$kurs_dollar = get_config_dollar();
					$total_rupiah = $total_investasi2->total * $kurs_dollar;
					
					$total_rupiah = $total_rupiah / 1000000000000;
					if($i == '1'){
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


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</div>
</div>
<section>

  <section class="content">
   <div class="row">
    <div class="col-xs-12">
   <?php
  for($i=2; $i>=1; $i--){
	  $j=$i+1;
	  $year = date('Y') - $i;
	 ?>

  <div class="col-xs-6">
<script type="text/javascript">
$(function () {
    $('#container<?php echo $j ?>').highcharts({
        chart: {
            type: 'pie',
            options3d: {
				enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Tahun <?=$year?>'
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
            name: 'Nilai investasi',
            data: [
				                           	<?php
					$q=mysql_query("SELECT SUM(investasi) as investasi , sum( investasi_dollar )as investasi_dollar
FROM master WHERE master_year = '$year'");
			
					$kurs_dollar = get_config_dollar();
					$total_all_invest=mysql_fetch_object($q);
					if($total_all_invest->investasi_dollar == ''){
						$total_all_invest->investasi_dollar ='0';	
					}
					if($total_all_invest->investasi_dollar == ''){
						 $total_all_invest->investasi ='0';
					}
					$total = $total_all_invest->investasi + $total_all_invest->investasi_dollar;
					if($total == '0'){
						$total = '1';
					}
					$total_all_invest->investasi_dollar=$total_all_invest->investasi_dollar * $kurs_dollar;
					
					$total_pma = ($total_all_invest->investasi_dollar * 100) / $total;
					$total_pmdn = ($total_all_invest->investasi * 100) / $total;
					
					?>
					
			
			
			
			
			
			{
                    name: 'PMDN',
                    y: <?= $total_pmdn ?>,
                    sliced: true,
                    selected: true,
					color: '#f9c'
                },
                {name:'PMA'
				,y: <?= $total_pma ?>, color: '#933'},
                
            ]
        }]
    });
});
		</script>



<div id="container<?php echo $j ?>" style="height: 400px"></div>

</div>
<?php } ?>
</div>
</div>
<section>