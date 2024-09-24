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
              <small class="fw-bold"><b></b> <?= $user_info[0]->rname ?></small>
            <!-- </a> -->
            
          </li>

          <!-- <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="true">
              <i class="ti ti-bell-ringing"></i>
              <div class="notification bg-danger rounded-circle"></div>
            </a>
            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2" data-bs-popper="static">
              <div class="d-flex align-items-center justify-content-between py-3 px-7">
                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                <span class="badge text-bg-danger rounded-4 px-3 py-1 lh-sm">5 new</span>
              </div>
              <div class="message-body simplebar-scrollable-y" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                  <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                  </div>
                  <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                      <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                          <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
                            <span class="me-3">
                              <img src="../assets/images/profile/user-1.jpg" alt="user" class="rounded-circle" width="48" height="48">
                            </span>
                            <div class="w-75 d-inline-block v-middle">
                              <h6 class="mb-1 fw-semibold lh-base">Jaun Joined the Team!</h6>
                              <span class="fs-2 d-block text-body-secondary">Congratulate him</span>
                            </div>
                          </a>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="simplebar-placeholder" style="width: 360px; height: 432px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                  <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                  <div class="simplebar-scrollbar" style="height: 300px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                </div>
              </div>
              <div class="py-6 px-7 mb-1">
                <button class="btn btn-outline-secondary w-100">See All Notifications</button>
              </div>

            </div>
          </li> -->

          <?php foreach ($user_info as $info) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                <?php if ($info->image == "") { ?>
                  <img src="../assets/images/profile/default.jpg" alt="default profile" class="rounded-circle border" width="35" height="35">
                <?php } else { ?>
                  <img src="/mhs_micro/profile/<?php print $info->image ?>?t=<?= time() ?>" class="rounded-circle border" width="35" height="35" alt="">
                <?php } ?>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                    <?php if ($info->image == "") { ?>
                      <img src="../assets/images/profile/default.jpg" alt="default profile" class="rounded-circle" width="70" height="70">
                    <?php } else { ?>
                      <img src="/mhs_micro/profile/<?php print $info->image ?>?t=<?= time() ?>" class="rounded-circle" width="70" height="70" alt="">
                    <?php } ?>
                    <div class="ms-3">
                      <h5 class="mb-1 fs-3"><?php print $info->lastname ?>, <?php print $info->firstname ?> <?php print $info->middlename ?></h5>
                      <span class="mb-1 d-block"><?php print $info->rname ?></span>
                      <p class="mb-0 d-flex align-items-center gap-2">
                        <i class="ti ti-mail fs-4"></i> <?php print $info->email ?>
                      </p>
                    </div>
                  </div>

                  <a href="../admin/profile" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">Profile</p>
                  </a>
                  <a href="../admin/account" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="fas fa-user-cog"></i>
                    <p class="mb-0 fs-3 mx-1">Account</p>
                  </a>
                  <a onclick="logout()" class="btn bg-card-2 mx-3 mt-2 d-block"><i class="fas fa-sign-out-alt"></i> Logout</a>

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
    function logout(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#13DEB9",
            cancelButtonColor: "#FA896B",
            confirmButtonText: "Yes, logout!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php print '../admin/confirm_logout'; ?>";
            } else {
                // location.reload();
            }
        });
      }
    </script>

  <script>
    function updateDateTime() {
      // Get current date and time
      const now = new Date();

      // Display real-time
      const realTimeElement = document.getElementById('realTime');
      realTimeElement.textContent = `${now.toLocaleTimeString()}`;

      // Display date
      const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      };
      const formattedDateElement = document.getElementById('currentDate');
      formattedDateElement.textContent = `${now.toLocaleDateString(undefined, options)}`.toUpperCase();
    }

    // Update every second (1000 milliseconds)
    setInterval(updateDateTime, 1000);

    // Initial call to display date and time immediately
    updateDateTime();
  </script>