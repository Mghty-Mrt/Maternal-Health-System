
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
                  <div class="mb-5">
                    <div class="d-flex justify-content-center">
                      <img src="../assets/images/logos/insurance.png" alt="" class="img-fluid mb-3" width="150">
                    </div>
                    <h3 class="fw-bolder fs-7 mb-3 text-center">Verification</h3>
                    <p>We sent a verification code to your gmail. Please enter the code in the field below.
                    </p>
                    <h6 class="fw-bolder">******lsy@gmail.com</h6>
                  </div>
                  <form action="../verification/verify" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label fw-semibold">Enter your 12 digits/letters verification
                        code</label>
                      <div class="d-flex align-items-center gap-2 gap-sm-3">
                        <input type="text" name="vcode" id="vcode" class="form-control fw-bolder fs-5 shadow-none rounded-2 text-center" maxlength="12" autocomplete="off" required>
                      </div>
                    </div>
                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-success py-8 mb-4">Verify Account</button>
                    </div>
                  </form>
                  <form action="../verification/resend">
                    <div class="d-flex justify-content-center">
                      <p class="fs-2 mb-0 text-dark">Didn't get the code?
                      <button type="submit" class="text-primary fw-medium ms-2">Resend</button>
                      </p>
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
            window.location.href = '../verification/secondstep';
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

<?php if ($this->session->flashdata('success_mail')): ?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?= $this->session->flashdata("success_mail") ?>',
        showConfirmButton: false,
        timer: 2000,
    });
    </script>
<?php endif; ?>