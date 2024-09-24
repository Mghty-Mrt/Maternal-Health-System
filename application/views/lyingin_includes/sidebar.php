  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar bg-home">
      <!-- Sidebar scroll-->
      <div>
        <div class="row">
          <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="../lyingin/dashboard" class="text-nowrap logo-img">
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
                <a class="sidebar-link" href="../lyingin/dashboard" aria-expanded="false">
                  <span class="text-light" style="margin-left: 10px">
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Dashboard</span>
                </a>
              </li>

              <?php if($this->session->userdata('role_id') == 10) {?>
              <li class="sidebar-item">
                <a class="sidebar-link" href="../lyingin/bedslot" aria-expanded="false">
                  <span class="text-light" style="margin-left: 10px">
                  <i class="fas fa-procedures"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Bed Slot</span>
                </a>
              </li>
              <?php } ?>

              <!-- <li class="sidebar-item">
                <a class="sidebar-link" href="../lyingin/docschedule" aria-expanded="false">
                  <span class="text-light" style="margin-left: 10px">
                  <i class="fas fa-procedures"></i>
                  </span>
                  <span class="hide-menu text-light fw-bold">Doctor's Schedule</span>
                </a>
              </li> -->
                
              <?php if($this->session->userdata('role_id') == 8 || $this->session->userdata('role_id') == 10) {?>
              <li class="sidebar-item">
              <a class="sidebar-link" href="../lyingin/referlist" aria-expanded="false">
              <span class="text-light" style="margin-left: 10px">
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu fw-bold text-light">Refer Patients</span>
              </a>
            </li>

            <?php } ?>
             
            <?php if($this->session->userdata('role_id') == 8){ ?>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../lyingin/deliveryrecordlist" aria-expanded="false">
              <span class="text-light" style="margin-left: 10px">
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu fw-bold text-light">Delivery Records</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../lyingin/newbornlist" aria-expanded="false">
              <span class="text-light" style="margin-left: 10px">
                  <i class="fas fa-baby fs-5 ms-1 pe-1"></i>
                </span>
                <span class="hide-menu fw-bold text-light">Newborn Records</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../lyingin/postnatallist" aria-expanded="false">
              <span class="text-light" style="margin-left: 10px">
                  <i class="fas fa-book-medical fs-4 ms-1 pe-1"></i>
                </span>
                <span class="hide-menu fw-bold text-light">Postnatal Records</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="../lyingin/fetal_death" aria-expanded="false">
              <span class="text-light" style="margin-left: 10px">
                  <i class="fas fa-file fs-4 ms-1 pe-1"></i>
                </span>
                <span class="hide-menu fw-bold text-light">Fetal Death Record</span>
              </a>
            </li>
            <?php } ?>

            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->