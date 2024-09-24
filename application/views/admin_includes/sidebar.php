  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    <aside class="left-sidebar bg-home">
      <!-- Sidebar scroll-->
      <div>
        <div class="row">
          <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="../admin/dashboard" class="text-nowrap logo-img">
              <img src="../assets/images/logos/maternology.png" class="mt-3" width="90" alt="maternology logo">
            </a>

            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <h5 class="mt-2 text-center text-light"><b>Maternity System</b></h5>
          <!-- <span class="d-block text-center fw-bolder text-success"><?php print $user_info[0]->rname ?></span> -->
                      
          <!-- Sidebar navigation-->
          <!-- for scrollable "scroll-sidebar" -->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px -24px;">
              <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
              </div>
              <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                  <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                    <div class="simplebar-content" style="padding: 0px 24px;">
                      <!-- for the default active hover "id="sidebarnav" -->
                      <ul id="sidebarnav">
                        <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu text-light">Pages</span>
                        </li>

                        <li class="sidebar-item">
                          <a class="sidebar-link" href="../admin/dashboard" aria-expanded="false">
                            <span class="text-light" style="margin-left: 10px">
                              <i class="ti ti-layout-dashboard" style="font-size: 100%;"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">Dashboard</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="../admin/barangay" aria-expanded="false">
                            <span class="text-light" style="margin-left: 11px">
                              <i class="fas fa-building"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">Barangays</span>
                          </a>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="../admin/healthcenter" aria-expanded="false">
                            <span class="text-light" style="margin-left: 10px">
                              <i class="fas fa-hospital" style="font-size: 100%;"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">Health Centers</span>
                          </a>
                        </li>
                        <!-- <li class="sidebar-item">
                          <a class="sidebar-link" href="../admin/patientsall" aria-expanded="false">
                            <span class="text-light" style="margin-left: 10px">
                              <i class="fas fa-wheelchair" style="font-size: 100%; padding-right: 2px"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">Lying-in</span>
                          </a>
                        </li> -->
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="../admin/lyingin" aria-expanded="false">
                            <span class="text-light" style="margin-left: 10px">
                            <i class="fas fa-bed" style="font-size: 100%;"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">Lying In</span>
                          </a>
                        </li>
                        
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="../admin/hospital" aria-expanded="false">
                            <span class="text-light" style="margin-left: 10px">
                              <i class="fas fa-hospital-alt" style="font-size: 100%;padding-right: 5px"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">Hospitals</span>
                          </a>
                        </li>

                        <li class="sidebar-item">
                          <a class="sidebar-link" href="../admin/systemusers" aria-expanded="false">
                            <span class="text-light" style="margin-left: 10px">
                              <i class="fas fa-user-nurse" style="font-size: 100%; padding-right: 5px"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">System User</span>
                          </a>
                        </li>
                        
                        <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu text-light">SUPPORT</span>
                        </li>
                        <li class="sidebar-item">
                          <a class="sidebar-link" href="#" aria-expanded="false">
                            <span class="text-light" style="margin-left: 10px">
                              <i class="far fa-question-circle" style="font-size: 100%px; padding-right: 3px"></i>
                            </span>
                            <span class="hide-menu fw-bold text-light">Help Center</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="simplebar-placeholder" style="width: auto; height: 453px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
              <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
              <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
            </div>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </div>
    </aside>