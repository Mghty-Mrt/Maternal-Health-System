<div class="d-flex align-items-center justify-content-center w-100 mt-5 pt-4">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-4 col-xxl-3">
            <div class="card mb-0 rounded-3">
                <div class="card-body pt-4">
                    <a href="../patient/auth" class="text-nowrap logo-img text-center d-block mb-2 w-100">
                        <img src="../assets/images/logos/maternology.png" class="dark-logo" width="100px" alt="maternology logo">
                    </a>
                    <h5 class="text-center text-main fw-semibold">Maternal Health System</h5>
                    <div class="mb-4 text-center">
                        <p class="fs-2">We sent a access code to your email. Enter the code from the email in the field below.</p>
                        <h6 class="fw-normal fs-3">******<span class="text-warning"><i>@gmail.com</i></span></h6>
                    </div>

                    <?php
                        if (isset($_GET['error']) && $_GET['error'] !== "") {
                            ?>
                            <span class="badge bg-danger-subtle mb-2 fw-light text-danger rounded-1 w-100 p-2"><i class="fas fa-exclamation-circle text-danger fs-4"></i><strong class="text-danger"> Error:</strong> <?php print $_GET['error'] ?></span>
                            <?php
                        }
                    ?>

                    <form action="../patient/verifyAuth" method="POST">
                        <div class="mb-3">
                            <label for="codel" class="form-label fw-semibold">Enter your Access Code</label>
                            <div class="d-flex align-items-center gap-2 gap-sm-3">
                                <input type="text" name="code" id="code" class="form-control shadow-none text-uppercase fs-4 fw-bolder text-center" maxlength="14" autocomplete="Off" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success w-50 mb-3 ">Verify Code</button>
                        </div>
                        <!-- <div class="d-flex align-items-center">
                            <p class="fs-4 mb-0 text-dark">Didn't get the code?</p>
                            <a class="text-primary fw-medium ms-2" href="javascript:void(0)">Resend</a>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

