 <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        	<?php
                             $user_data = get_user_data();
							if($user_data[2]==""){
								$img = "../img/user/default.jpg";
							}else{
								$img = "../img/user/".$user_data[2];
							}
							?>
                            <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p style="color:#333;">
                                        <?php
                                       
                                        echo $user_data[0];
                                        ?>
                                </p>

                            <a style="color:#333"><?= $user_data[1]?></a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <?php //if(isset($_SESSION['menu_active'])) { echo $_SESSION['menu_active']; }?>
                    <ul class="sidebar-menu">
                     
                          <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Master</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="truck.php?page=list"><i class="fa fa-chevron-circle-right"></i> Truk</a></li>
                                <li><a href="owner.php?page=list"><i class="fa fa-chevron-circle-right"></i> Suplier</a></li>
                             	
                            </ul>
                  </li>
                  
                  <?
                    if($_SESSION['user_type_id'] != '3'){
					?>
                         <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 2){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>User</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="user.php?page=list"><i class="fa fa-angle-double-right"></i> User</a></li>
                                
                               
                            </ul>
                      </li>
                      <?php
					}
					  ?>
                          <?
                    if($_SESSION['user_type_id'] != '2'){
					?>
                        <li>
                            <a href="transaction.php?page=list">
                                <i class="fa fa-calendar"></i> <span>Transaksi</span> 
                        </a></li>
                          </a></li>
                      <?php
					}
					  ?>  
                        <?
                    if($_SESSION['user_type_id'] != '3'){
					?>
                         <li>
                            <a href="edit_transaction.php?page=list">
                                <i class="fa fa-calendar"></i> <span>Edit Transaksi</span> 
                        </a></li>
                      <?php
					}
					  ?>  
                       <?
                    if($_SESSION['user_type_id'] != '3'){
					?>
                     <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 3){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="report_summary.php?page=list"><i class="fa fa-angle-double-right"></i> Harian</a></li>
                                <li><a href="report_detail.php?page=list"><i class="fa fa-angle-double-right"></i> Range Tanggal</a></li>
                             
                            </ul>
                  </li>
                  <?php
					}
				  ?>
              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>