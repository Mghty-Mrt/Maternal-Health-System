  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar bg-home">
      <!-- Sidebar scroll-->
      <div>
        <div class="row">
          <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="../midwife/dashboard" class="text-nowrap logo-img">
              <img src="../assets/images/logos/maternology.png" class="mt-3" width="90" alt="maternology logo" />
            </a>

            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <h5 class="mt-2 text-center text-light"><b>Maternity System</b></h5>
          <!-- Sidebar navigation-->
          <!-- for scrollable "scroll-sidebar" -->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <!-- id for default "sidebarnav" -->
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu text-light">Pages</span>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../midwife/dashboard" aria-expanded="false">
                  <span class="text-light" style="margin-left: 20px">
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Dashboard</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../midwife/newpatients" aria-expanded="false">
                  <span class="text-light" style="margin-left: 20px">
                    <i class="ti ti-list-check fs-6"></i>
                  </span>
                  <?php
                  //$bgClass = ($total_new_patients == 0) ? 'bg-success' : 'bg-danger';
                  ?>
                  <span class="hide-menu text-light fw-bold"> New Patients <small class="badge text-light rounded-circle fs-2 px-2 py-1 lh-sm <?php //print $bgClass; 
                                                                                                                                              ?>"><?php //echo $total_new_patients; 
                                                                                                                                                                          ?></small></span>
                </a>
              </li>
              
              <li class="sidebar-item">
                <a class="sidebar-link" href="../midwife/followup" aria-expanded="false">
                  <span class="text-light" style="margin-left: 23px">
                    <i class="far fa-calendar-alt" style="font-size: 16px;"></i>
                  </span>
                  <?php
                  $bgClass = ($total_today_patients == 0) ? 'bg-success' : 'bg-danger';
                  ?>
                  <!-- <span class="hide-menu text-light fw-bold">Today's Patients</span> -->
                  <span class="hide-menu text-light fw-bold">Today's Patients <small class="badge text-bg-success rounded-circle fs-2 px-2 py-1 lh-sm <?php print $bgClass; ?>"><?php echo $total_today_patients;?></small></span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../midwife/uncheckup" aria-expanded="false">
                  <span class="text-light" style="margin-left: 23px">
                    <i class="fas fa-user-times fs-3"></i>
                  </span>
                  <?php
                  $bgClass = ($total_uncheck_patients == 0) ? 'bg-success' : 'bg-danger';
                  ?>
                  <span class="hide-menu text-light fw-bold">Uncheckup Patients <small class="badge text-bg-success rounded-circle fs-2 px-2 py-1 lh-sm <?php print $bgClass; ?>"><?php echo $total_uncheck_patients;?></small></span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="../midwife/itr" aria-expanded="false">
                  <span class="text-light" style="margin-left: 23px">
                    <i class="fas fa-clipboard fs-4"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Prenatal Record</span>
                </a>
              </li>

              <!-- <li class="sidebar-item"> -->
                <!-- <a class="sidebar-link" href="../midwife/prenatal" aria-expanded="false">
                  <span class="text-light" style="margin-left: 12px">
                    <i class="fas fa-hospital-user" style="font-size: 15px;"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Patients</span>
                </a> -->
                <!-- <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                  <span class="d-flex text-light" style="margin-left: 18px">
                    <i class="fas fa-users pe-1" style="font-size: 15px;"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Patients</span><i class="ti ti-chevron-down text-light" style="float: right; padding-left: 80px"></i>
                </a>
                <ul aria-expanded="false" class="collapse first-level">
                  <ol class="sidebar-item">
                    <a href="../midwife/itr" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="fas fa-clipboard fs-4 text-light"></i>
                      </div>
                      <span class="hide-menu text-light fw-bold">Treatment Record</span>
                    </a>
                  </ol>
                  <ol class="sidebar-item">
                    <a href="../midwife/prenatal" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="fas fa-hospital-user text-light"></i>
                      </div>
                      <span class="hide-menu text-light fw-bold">Prenatal Record</span>
                    </a>
                  </ol> -->
                  <!-- <ol class="sidebar-item">
                    <a href="../doctor/natallist" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="ti ti-bed text-light"></i>
                      </div>
                      <span class="hide-menu text-light fw-bold">Natal Record</span>
                    </a>
                  </ol>
                  <ol class="sidebar-item">
                    <a href="../doctor/postnatallist" class="sidebar-link">
                      <div class="round-16 d-flex align-items-center justify-content-center">
                        <i class="fas fa-baby text-light"></i>
                      </div>
                      <span class="hide-menu text-light fw-bold">Postnatal Record</span>
                    </a>
                  </ol> -->
                <!-- </ul> -->
              <!-- </li> -->

              <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="../midwifepatients/patients" aria-expanded="false">
              <span class="text-light" style="margin-left: 20px">
              <i class="fas fa-bed" style="font-size: 16px;"></i>
                </span>
                <span class="hide-menu text-light fw-bold">Natal Stage</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../midwifepatients/patients" aria-expanded="false">
              <span class="text-light" style="margin-left: 22px">
              <i class="fas fa-baby" style="font-size: 20px; margin-right: 3px;"></i>
                </span>
                <span class="hide-menu text-light fw-bold">Postnatal Stage</span>
              </a>
            </li> -->

              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu text-light">SUPPORT</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="#" aria-expanded="false">
                  <span class="text-light" style="margin-left: 20px">
                    <i class="far fa-question-circle" style="font-size: 20px; padding-right: 3px"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Help Center</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->