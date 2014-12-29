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
                     
                      <?php
                      if($_SESSION['user_type_id'] == 1){
						  include 'menu1.php';
					  }else if($_SESSION['user_type_id'] == 2){
						  include 'menu1.php';
					  }else if($_SESSION['user_type_id'] == 3){
					  	  include 'menu3.php';
					  }else if($_SESSION['user_type_id'] == 4){
						  include 'menu4.php';
					  }
					  ?>
                   <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; }?>>
                            <a href="ranking.php?page=list">
                               <i class="fa fa-bar-chart-o"></i>
                                <span>Ranking</span>
                            </a>
                            
                  </li>
              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>