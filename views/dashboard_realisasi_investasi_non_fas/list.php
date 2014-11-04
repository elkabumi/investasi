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
						$data = get_data($y,$country_id,$city_id,$business_id,$sub_business_id);
						echo $data;
						if($y!=$year_default){ echo ","; }
					}
					?>
				],
				color: '#67A3D2'
           
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
                                    	
                   
                                       
                                    <div class="col-md-4"> 
                                     
                                          <form role="form" action="<?= $action?>" method="post">
											<div class="form-group">
												<label>Tahun</label>
												<select id="basic" name="i_year" class="selectpicker show-tick form-control" data-live-search="true">
											   
												   <?php
												$year_select = date("Y") - 4;
												
                   								for($y=date("Y"); $y>=$year_select; $y--){
													
												?>
												
												 <option value="<?php echo $y;?>" <?php if($y == $year_default){?> selected="selected"<?php } ?>><?php echo $y;?></option>
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
 <table width="100%" border="0" cellspacing="0" cellpadding="10" class="tabel_manual" id="new_table">
  <thead>
	<tr>
        <td>TAHUN</td>
        <td>UNIT USAHA</td>
        <td>INVESTASI (Rp. Trilyun)</td>
        <td>TENAGA KERJA(Orang)</td>
                    
     </tr>
   </thead>
   <tbody>
    <?php
			$year = $year_default - 5;
			for($i=$year; $i<=$year_default; $i++){
	?>
    <tr>
    <?php
    	$data_proyek = get_data_unit_usaha($i,$country_id,$city_id,$business_id,$sub_business_id);
		$data_dollar= get_data_dollar($i,$country_id,$city_id,$business_id,$sub_business_id);
		$data_pekerja= get_data_pekerja($i,$country_id,$city_id,$business_id,$sub_business_id);
	?>
    	<td><?= $i?></td>
        <td><?= $data_proyek?></td>
         <td><?php echo number_format($data_dollar,2) ?></td>
      <td><?= $data_pekerja?></td>
    </tr>
    <?php
			}
	?>
  
   <tr >
  <?php
    	$data_total_proyek = get_data_total_unit_usaha($year,$year_default,$country_id,$city_id,$business_id,$sub_business_id);
		$data_total_dollar= get_data_total_dollar($year,$year_default,$country_id,$city_id,$business_id,$sub_business_id);
		$data_total_pekerja= get_data_total_pekerja($year,$year_default,$country_id,$city_id,$business_id,$sub_business_id);
	?>
		<td><strong>Jumlah</strong></td>
        <td><strong><?= $data_total_proyek?></strong></td>
        <td><?php echo number_format($data_total_dollar,2) ?></td>
     	<td><strong><?= $data_total_pekerja?></strong></td>
  </tr>
    </tbody>
  </table>


</div>

</div>


 


</section>