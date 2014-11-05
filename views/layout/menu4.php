<li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Dashboard</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="dashboard_kinerja_investasi.php"><i class="fa fa-chevron-circle-right"></i>Kinerja Investasi</a></li>
                                <li><a href="dashboard_realisasi_investasi.php"><i class="fa fa-chevron-circle-right"></i>Realisasi Investasi</a></li>
                                <li><a href="dashboard_izin_prinsip.php"><i class="fa fa-chevron-circle-right"></i>Persetujuan Izin Prinsip</a></li>
                                 <li><a href="dashboard_realisasi_investasi_non_fas.php"><i class="fa fa-chevron-circle-right"></i><div class="menu_new">Perkembangan Realisasi PMDN Non Fas</div></a></li>
                             <li><a href="dashboard_realisasi_investasi_triwulan.php"><i class="fa fa-chevron-circle-right"></i><div class="menu_new">Realisasi Investasi PMA, PMDN dan Non Fas</div></a></li>     
                               <li><a href="dashboard_izin_prinsip_triwulan.php"><i class="fa fa-chevron-circle-right"></i><div class="menu_new">Realisasi Izin Prinsip PMA dan PMDN</div></a></li>     
                             	
                            </ul>
                  </li>
                
                  
                     
                     
                  
                        
                     <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 5){ echo "active"; }?>">
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
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 6){ echo "class='active'"; }?>>
                            <a href="olah.php?page=form">
                                <i class="fa fa-pencil-square-o"></i>
                                <span>Olah</span>
                            </a>
                            
                  </li>
                  
                  
                  
                    <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 7){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-search"></i>
                                <span>Search Data Investasi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="search_bidang_usaha.php?page=list"><i class="fa fa-chevron-circle-right"></i>Menurut Bidang Usaha</a></li>
                                <li><a href="search_lokasi.php?page=list"><i class="fa fa-chevron-circle-right"></i>Menurut Lokasi Proyek</a></li>
                                 <li><a href="search_negara.php?page=list"><i class="fa fa-chevron-circle-right"></i>Menurut Asal Negara</a></li>
                             
                            </ul>
                  </li>
                  
             