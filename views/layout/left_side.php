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
                            <p style="color:#333;  text-shadow: 1pt 1px 1px #ffffff;">
                                        <?php
                                       
                                        echo $user_data[0];
                                        ?>
                                </p>

                            <a style="color:#333;  text-shadow: 1pt 1px 1px #ffffff;"><?= $user_data[1]?></a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <?php //if(isset($_SESSION['menu_active'])) { echo $_SESSION['menu_active']; }?>
                    <ul class="sidebar-menu">
                     
                          <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span>Izin</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="master.php?page=list&master_type_id=6"><i class="fa fa-chevron-circle-right"></i> Izin Prinsip</a></li>
                                <li><a href="master.php?page=list&master_type_id=7"><i class="fa fa-chevron-circle-right"></i> Izin Usaha</a></li>
                             	
                            </ul>
                  </li>
                  
                
                         <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 2){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-briefcase"></i>
                                <span>Realisasi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="realisasi.php?page=list&master_category_id=1"><i class="fa fa-chevron-circle-right"></i> PMA</a></li>
                                <li><a href="realisasi.php?page=list&master_category_id=2"><i class="fa fa-chevron-circle-right"></i> PMDN</a></li>
                                <li><a href="realisasi.php?page=list&master_category_id=3"><i class="fa fa-chevron-circle-right"></i> Non Fas</a></li>
                               <li><a href="realisasi.php?page=list&master_category_id=4"><i class="fa fa-chevron-circle-right"></i> IU</a></li>
                               <li><a href="realisasi.php?page=list&master_category_id=5"><i class="fa fa-chevron-circle-right"></i> Ekspor</a></li>
                            </ul>
                      </li>
                  
                        
                     <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 3){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="report_triwulan.php?page=list"><i class="fa fa-chevron-circle-right"></i>Triwulan</a></li>
                                <li><a href="report_semester.php?page=list"><i class="fa fa-chevron-circle-right"></i>Semester</a></li>
                                 <li><a href="report_tahunan.php?page=list"><i class="fa fa-chevron-circle-right"></i>Tahunan</a></li>
                             
                            </ul>
                  </li>
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 3){ echo "active"; }?>">
                            <a href="olah.php?page=form">
                                <i class="fa fa-pencil-square-o"></i>
                                <span>Olah</span>
                            </a>
                            
                  </li>
                  
                  
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 3){ echo "active"; }?>">
                            <a href="search.php?page=form">
                                <i class="fa fa-search"></i>
                                <span>Search</span>
                               
                            </a>
                            
                  </li>
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 3){ echo "active"; }?>">
                            <a href="user.php">
                                <i class="fa fa-user"></i>
                                <span>User</span>
                               
                            </a>
                            
                  </li>
                 
              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>