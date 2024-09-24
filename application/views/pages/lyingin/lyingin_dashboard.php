<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="card overflow-hidden">
            <div class="card-body p-4">
              <!-- <h5 class="card-title mb-9 fw-semibold">Health Center</h5> -->
              <div class="row align-items-center">
                <div class="col-8">
                  <h4 class="fw-semibold mb-2 text-main">Welcome to Maternal <br> Health System</h4>
                  <div class="d-flex align-items-center mb-3">
                    <span class="me-1 d-flex align-items-center justify-content-center">
                    </span>
                    <p class="text-main me-1 fs-3 mb-0 fw-semibold text-main">District II</p>
                  </div>
                </div>

                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div class="text-white  d-flex align-items-center justify-content-center">
                      <img src="../assets/images/backgrounds/welcome.png" alt="..." width="140%" height="120px">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card overflow-hidden">
        <div class="card-body">
          <!-- <h5 class="card-title fw-semibold text-main">Total Residents</h5> -->
          <div class="row">
            <div class="col-md-5">
              <img src="../assets/images/logos/midwife.png" alt="" width="154" class="rounded-1 card-hover">
            </div>
            <div class="col-md-7">
              <h4 class="fw-semibold mb-2 text-main"><br> Quezon City Lying-ins <br> Interface</h4>
              <p class="text-main me-1 fs-3 mb-0 fw-semibold text-main">Lying-ins in District II</p>
            </div>
            </div>

        </div>
      </div>
    </div>

    <!-- <div class="row">
      <div class="col-md-4">
        <div class="card w-100">
          <div class="card-header text-bg-warning">
            <h4 class="mb-0 text-white card-title">Free Checkup</h4> <small>Mar 23, 2024</small>
          </div>
          <div class="card-body">
            <h3 class="card-title d-flex justify-content-center">
              <img src="../assets/images/logos/sec.png" height="100px" width="200px" alt="">
            </h3>
            <p class="card-text">
              With supporting text below as a natural lead-in to additional content.
            </p>
            <a href="javascript:void(0)" class="btn btn-warning">See Details</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card w-100">
          <div class="card-header text-bg-warning">
            <h4 class="mb-0 text-white card-title">Free Checkup</h4> <small>Mar 23, 2024</small>
          </div>
          <div class="card-body">
            <h3 class="card-title d-flex justify-content-center">
              <img src="../assets/images/logos/sec.png" height="100px" width="200px" alt="">
            </h3>
            <p class="card-text">
              With supporting text below as a natural lead-in to additional content.
            </p>
            <a href="javascript:void(0)" class="btn btn-warning">See Details</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card w-100">
          <div class="card-header text-bg-warning">
            <h4 class="mb-0 text-white card-title">Free Checkup</h4> <small>Mar 23, 2024</small>
          </div>
          <div class="card-body">
            <h3 class="card-title d-flex justify-content-center">
              <img src="../assets/images/logos/sec.png" height="100px" width="200px" alt="">
            </h3>
            <p class="card-text">
              With supporting text below as a natural lead-in to additional content.
            </p>
            <a href="javascript:void(0)" class="btn btn-warning">See Details</a>
          </div>
        </div>
      </div>
    </div> -->

  </div>
</div>

<?php if ($notif_count == 0) { ?>
    <!-- <p>No notifications today</p> -->
  <?php } else { ?>
    <script>
      function showSweetAlert(notif_count) {
        Swal.fire({
          title: 'Warning',
          text: 'You have ' + notif_count + ' Referrals!',
          icon: 'warning',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            // window.location.href = '../hospital/referList';
          }
        });
      }

      showSweetAlert(<?php echo $notif_count; ?>);
      playNotificationSound();

      function playNotificationSound() {
        var audio = new Audio('../assets/notif/emergency.mp3');
        audio.play();
      }
    </script>
  <?php } ?>