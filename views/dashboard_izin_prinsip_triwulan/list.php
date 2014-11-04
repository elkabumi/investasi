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
		$m_c_d_name = array("", "PMA", "PMDN", "Total");
		$m_c_d_stack = array("", "pma", "pmdn", "total");
		$color = array("", "#69C", "#C30", "#FF0");
		
		for($m_c_d=1; $m_c_d<=3; $m_c_d++){
		?>
		{
            name: '<?= $m_c_d_name[$m_c_d]?>',
            data: [
				<?php
				$year = $year_default - 4;
				for($y_d=$year; $y_d<=$year_default; $y_d++){
							if($m_c_d == 1){
								$data = get_data_dollar($m_c_d, $y_d, $country_id, $city_id, $business_type_id, $sub_business_type);
							}elseif($m_c_d == 3){
								$data = get_data_total($y_d, $country_id, $city_id, $business_type_id, $sub_business_type);
							}else{
								$data = get_data($m_c_d, $y_d, $country_id, $city_id, $business_type_id, $sub_business_type);
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
                      
        <!-- right column -->
        <div class="col-md-12">
            <!-- general form elements disabled -->
				<form role="form" action="<?= $action?>" method="post">
					<div class="box box-primary">
                        <div class="box-body">

                                   <div class="col-md-4">
									<div class="form-group">
										<label>Tahun</label>
										<select id="basic" name="i_year" class="selectpicker show-tick form-control" data-live-search="true">
											   
										<?php
											$year_select = $year_default - 4;
												
                   							for($y=date("Y"); $y>=$year_select; $y--){
												$y2=$y-4;
										?>
												
											<option value="<?php echo $y;?>" <?php if($y == $year_default){?> selected="selected"<?php } ?>><?php echo $y2." - ".$y;?></option>
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
                                       <option value="0">- Pilih Semua -</option>
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
                                         <option value="0">- Pilih Semua -</option>
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
                                         <option value="0">- Pilih Semua -</option>
                                           <?php
                                        $query_buss = mysql_query("select * from business_types");
                                        while($row_buss = mysql_fetch_array($query_buss)){
                                        ?>
                                         <option value="<?= $row_buss['business_type_id']?>" <?php if($row_buss['business_type_id'] == $business_type_id){ ?> selected="selected"<?php }?>><?= $row_buss['business_type_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                              
									</div>
                                   </div>
                                   
                                   
                                     <div class="col-md-8">
									<div class="form-group">
									  <label>Sub Bidang Usaha</label>
                                            <input  type="text" name="i_sub_business_type" class="form-control" placeholder="Enter ..." value="<?= $sub_business_type ?>"/>
                                              
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
<div class="col-md-12">

<div class="box box-danger">
<table data-filter="#filter" class="footable">  <thead>
<tr>
<th rowspan="2">NO</th>
    <th rowspan="2">TRIWULAN</th>
    
    				<?php
					$year = $year_default - 4;
					for($y=$year; $y<=$year_default; $y++){
						
						echo "<th align='center' colspan='2'>".$y."</th>";
						
					}
					?>
  </tr>
  <tr>
    
    				<?php
					$year = $year_default - 4;
					$m_cat_name = array("","PMA", "PMDN");
					for($y=$year; $y<=$year_default; $y++){
						for($m_cat=1; $m_cat<=2; $m_cat++){
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
						
						
						for($m_cat=1; $m_cat<=2; $m_cat++){
							if($m_cat == 1){
								$data = get_data_dollar_triwulan($t, $m_cat, $y, $country_id, $city_id, $business_type_id, $sub_business_type);
							}else{
								$data = get_data_triwulan($t, $m_cat, $y, $country_id, $city_id, $business_type_id, $sub_business_type);
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
						
						
						for($m_cat=1; $m_cat<=2; $m_cat++){
							if($m_cat == 1){
								$data = get_data_total_dollar_triwulan($m_cat, $y, $country_id, $city_id, $business_type_id, $sub_business_type);
							}else{
								$data = get_data_total_triwulan($m_cat, $y, $country_id, $city_id, $business_type_id, $sub_business_type);
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