 	<script type="text/javascript">
$(function () {
    $('#container').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 20,
                beta: 0,
                viewDistance: 100,
                depth: 50
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'Diagram'
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
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Trilyun Rupiah'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

		series: [
		<?php
		$m_c_d_name = array("", "PMA", "PMDN", "Non Fas", "Total");
		$m_c_d_stack = array("", "pma", "pmdn", "nonfas", "total");
		$color = array("", "#69C", "#C30", "#0C6", "#FF0");
		
		for($m_c_d=1; $m_c_d<=4; $m_c_d++){
		?>
		{
            name: '<?= $m_c_d_name[$m_c_d]?>',
            data: [
				<?php
				$year = $year_default - 4;
				for($y_d=$year; $y_d<=$year_default; $y_d++){
							if($m_c_d == 1){
								$data = get_data_dollar($m_c_d, $y_d);
							}elseif($m_c_d == 4){
								$data = get_data_total($y_d);
							}else{
								$data = get_data($m_c_d, $y_d);
							}
							echo $data; if($y_d!=$year_default){ echo ","; }
						}
				?>
			],
			
            stack: '<?= $m_c_d_stack[$m_c_d]?>'
        },
		<?php
		}
		?>
		
		]
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
                   
                  
        

<div class="col-md-12">


<div class="box box-danger">
<table data-filter="#filter" class="footable">  <thead>
<tr>
<th rowspan="2">NO</th>
    <th rowspan="2">TRIWULAN</th>
    
    				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						
						echo "<th align='center' colspan='3'>".$y."</th>";
						
					}
					?>
  </tr>
  <tr>
    
    				<?php
					$year = $year_default - 4;
					$m_cat_name = array("","PMA", "PMDN", "Non Fas");
					for($y=$year; $y<=$year_default; $y++){
						for($m_cat=1; $m_cat<=3; $m_cat++){
							echo "<th align='center'>".$m_cat_name[$m_cat]."</th>";
						}
					}
					?>
  </tr>
    </thead>
    <?php
	$no = 1;
	$t_name = array("","I", "II", "III", "IV");
    for($t=1; $t<=4; $t++){
	?>
  <tr>
  <td align="center"><?= $no; ?></td>
    <td align="center"><?= $t_name[$t]; ?></td>
    
    				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						
						
						for($m_cat=1; $m_cat<=3; $m_cat++){
							if($m_cat == 1){
								$data = get_data_dollar_triwulan($t, $m_cat, $y);
							}else{
								$data = get_data_triwulan($t, $m_cat, $y);
							}
							echo "<td align='center'>".$data."</td>";
						}
						
					}
					?>
  </tr>
 
 <?php
 $no++;
	}
 ?> 
 <tr bgcolor="#FFFF00">
  <td align="center" colspan="2"><strong>TOTAL</strong></td>
    
    				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						
						
						for($m_cat=1; $m_cat<=3; $m_cat++){
							if($m_cat == 1){
								$data = get_data_total_dollar_triwulan($m_cat, $y);
							}else{
								$data = get_data_total_triwulan($m_cat, $y);
							}
							echo "<td align='center'>".$data."</td>";
						}
						
					}
					?>
  </tr>
 
</table>
  </div>

</div>

</div>


 
	<div class="row">
                   
                  
        

<div class="col-md-12">
<div class="box box-danger">

<div id="container" style="height: 400px"></div>


</div>
</div>
</div>


  

</section>