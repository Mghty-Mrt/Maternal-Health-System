
<div id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-lg-6 col-xl-8">
            <a href="../verification/firststep" class="text-nowrap logo-img d-block px-4 py-9 w-100 fs-5 text-main fw-bolder">
              <img src="../assets/images/logos/maternology.png" class="dark-logo me-2" width="50" alt="Logo-Dark" />
              Maternal Health System
            </a>
            <div class="d-none d-lg-flex align-items-center justify-content-center" style="height: calc(100vh - 100px);">
              <img src="../assets/images/logos/sec.png" alt="" class="img-fluid" width="470">
            </div>
          </div>
          <div class="col-lg-6 col-xl-4">
            <div class="card mb-0 shadow-none rounded-0 min-vh-100 h-100">
              <div class="auth-max-width mx-auto d-flex align-items-center w-100 h-100">
                <div class="card-body">
                  <div class="mb-2">
                    <div class="d-flex justify-content-center">
                      <img src="../assets/images/logos/insurance.png" alt="" class="img-fluid mb-3" width="120">
                    </div>
                    <h3 class="fw-bolder fs-7 mb-2 text-center">Update Account</h3>
                    <p>This is a mandatory Account updates to removed developers access. Please change your current <b>password</b> below.</p>
                  </div>
                  <form action="../verification/update" method="POST">
                    <div class="mb-3">
                      <div class="d-flex align-items-center gap-2 gap-sm-3">
                        <div class="row">
                            <?php foreach($account as $acc) { ?>
                            <div class="col-md-12 mb-2">
                                <label for="email" class="fw-bold">Email <small class="fs-1 text-danger">*If you want to change your email make sure it is active.</small></label>
                                <input type="email" name="email" id="email" class="form-control shadow-none" value="<?= $acc->email ?>" autocomplete="off">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="password" class="fw-bold">Current Password</label>
                                <input type="password" class="form-control shadow-none" value="<?= $acc->password ?>" minlength="5" autocomplete="off" readonly>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="password" class="fw-bold">New Password <small class="fs-1 text-danger">*Type here your new Password.</small></label>
                                <input type="password" name="password" id="password" class="form-control shadow-none" minlength="5" autocomplete="off">
                            </div>
                            <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-success py-8 mb-2">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->

  <?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= $this->session->flashdata("success") ?>',
        showCancelButton: false,
        confirmButtonText: 'OK',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '../home';
        }
    });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $this->session->flashdata("error") ?>',
        });
    </script>
<?php endif; ?>