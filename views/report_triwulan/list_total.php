
              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Total Jasa Angkut</th>
                                                <th>Total Subsidi Tol</th>
                                                 <th>Total Transport</th>
                                                <th>Total Harga Urukan</th>
                                                 <th>Total HPP</th>
												 
                                            </tr>
                                        </thead>
                                        <tbody>
                                                
                                            <tr>
                                            	<td><?= tool_format_number_report($total_jasa_angkut) ?></td>
												<td><?= tool_format_number_report($total_subsidi_tol) ?></td>
                                                 <td><?= tool_format_number_report($total_transport) ?></td>
                                                <td><?= tool_format_number_report($total_harga_urukan) ?></td>
                                                <td bgcolor="#FFFF00" style="font-weight:bold;"><?= tool_format_number_report($total_hpp) ?></td>
											
                       
                                                 </tr>
                                        

                                             

                                          
                                        </tbody>
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                