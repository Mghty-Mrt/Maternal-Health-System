<!--  Main wrapper -->
<div class="body-wrapper">
  <!--  Header Start -->
  <header class="app-header border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>

        <li class="nav-item me-3 d-block fs-4 fw-semibold text-main">
          <small id="currentDate"></small>
        </li>
        <li class="nav-item d-block fs-4 fw-semibold text-main">
          <small id="realTime"></small>
        </li>

      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item dropdown">
            <!-- <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="true"> -->
              <!-- <i class="ti ti-bell-ringing"></i> -->
              <small class="fw-bold"><?= $user_info[0]->rname ?></small>
            <!-- </a> -->
            
          </li>

          <?php foreach($user_info as $info) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../assets/images/profile/default.jpg" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                  <img src="../assets/images/profile/user-1.jpg" class="rounded-circle" width="70" height="70" alt="">
                  <div class="ms-3">
                    <h5 class="mb-1 fs-3"><?php print $info->lastname ?>, <?php print $info->firstname ?> <?php print $info->middlename ?></h5>
                    <span class="mb-1 d-block"><?php print $info->rname ?></span>
                    <p class="mb-0 d-flex align-items-center gap-2">
                      <i class="ti ti-mail fs-4"></i> <?php print $info->email ?>
                    </p>
                  </div>
                </div>

                <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">Profile</p>
                </a>
                <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="fas fa-user-cog"></i>
                  <p class="mb-0 fs-3 mx-1">Account</p>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-list-check fs-6"></i>
                  <p class="mb-0 fs-3">My Task</p>
                </a>
                <a href="../midwife/logout" class="btn bg-card-2 mx-3 mt-2 d-block"><i class="fas fa-sign-out-alt"></i> Logout</a>

              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
  <!--  Header End -->

  <script>
    function updateDateTime() {
        // Get current date and time
        const now = new Date();

        // Display real-time
        const realTimeElement = document.getElementById('realTime');
        realTimeElement.textContent = `${now.toLocaleTimeString()}`;

        // Display date
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDateElement = document.getElementById('currentDate');
        formattedDateElement.textContent = `${now.toLocaleDateString(undefined, options)}`.toUpperCase();
    }

    // Update every second (1000 milliseconds)
    setInterval(updateDateTime, 1000);

    // Initial call to display date and time immediately
    updateDateTime();
</script>