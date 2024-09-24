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
          <h5 class="card-title fw-semibold text-main">Total Residents</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="card overflow-hidden card-hover mb-0">
                <div class="d-flex flex-row">
                  <div class="p-3 bg-home">
                    <h3 class="text-light box mb-0">
                      <i class="ti ti-users"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <?php $total = count($total_residents) ?>
                    <h3 class="text-success mb-0 fs-6"><?= $total ?></h3>
                    <span class="text-muted">Residents</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
              <img src="../assets/images/logos/commu.png" alt="" width="200" class="rounded-1 card-hover">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card w-100">
          <div class="card-header text-bg-success">
            <h4 class="mb-0 text-white card-title">Free Checkup</h4> <small>Mar 23, 2024</small>
          </div>
          <div class="card-body">
            <h3 class="card-title d-flex justify-content-center">
              <img src="../assets/images/logos/sec.png" height="100px" width="200px" alt="">
            </h3>
            <p class="card-text">
              With supporting text below as a natural lead-in to additional content.
            </p>
            <a href="javascript:void(0)" class="btn btn-success">See Details</a>
          </div>
        </div>
      </div>

      

  </div>
</div>