<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maternal Health System</title>

    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/fav.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="../assets/libs/bootstrap/dist/css/boostrap.min.css" />
    <link rel="stylesheet" href="../assets/css/custom.css" />
    <link rel="stylesheet" href="../assets/css/fontawesome.css" />
    <link rel="stylesheet" href="../assets/css/trystyle.css">
    <script src="../assets/libs/jquery/dist/jquery-3.6.0.min.js"></script>

    <!-- alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<div class="d-flex align-items-center justify-content-center w-100 mt-5">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-4 col-xxl-3">
            <div class="card mb-0 rounded-3 mt-4">
                <div class="card-body pt-3">
                    <a href="../home/resetVerif" class="text-nowrap logo-img text-center d-block mb-2 w-100">
                        <img src="../assets/images/logos/maternology.png" class="dark-logo" width="100px" alt="maternology logo">
                    </a>
                    <h5 class="text-center text-main fw-semibold">Maternal Health System</h5>
                    <div class="mb-4 text-center">
                        <p class="fs-2">Forgot Password Verification</p>
                    </div>

                    <form action="../home/verifyfpcode" method="POST">
                        <div class="mb-2">
                            <label for="vcode" class="fs-4">Verification Code</label>
                            <div class="d-flex align-items-center gap-2 gap-sm-3">
                                <input type="text" name="vcode" id="vcode" class="form-control shadow-none text-center fs-4 fw-bolder" value="<?php echo $this->input->get('token'); ?>" autocomplete="Off">
                            </div>
                            <?php echo form_error('vcode', '<p class="text-danger mt-1"><i class="fas fa-exclamation-circle me-1"></i> <b class="me-1">Error:</b>', '</p>'); ?>
                            <?php if (isset($error)) {
                                echo "<p class='text-danger mt-1'><i class='fas fa-exclamation-circle me-1'></i><b class='me-1'>Error:</b> $error</p>";
                            } ?>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50 mt-2">Verify</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>

</body>

</html>