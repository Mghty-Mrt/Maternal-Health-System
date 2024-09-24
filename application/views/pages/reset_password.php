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

<div class="d-flex align-items-center justify-content-center w-100 mt-3">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-4 col-xxl-3">
            <div class="card mb-0 rounded-3 mt-2">
                <div class="card-body pt-3">
                    <a href="../patient/auth" class="text-nowrap logo-img text-center d-block mb-2 w-100">
                        <img src="../assets/images/logos/maternology.png" class="dark-logo" width="100px" alt="maternology logo">
                    </a>
                    <h5 class="text-center text-main fw-semibold">Maternal Health System</h5>
                    <div class="mb-2 text-center">
                        <p class="fs-2">Update your new password here.</p>
                    </div>

                        <?php if (isset($success)) {
                            echo "<p class='text-success mt-1 text-center'><i class='fas fa-check-circle me-1'></i><b class='me-1'>Success:</b> $success</p>";
                        } ?>

                    <form action="../home/updatepass" method="POST">
                        <input type="hidden" value="<?= $account->accid ?>" name="acc_id" id="acc_id">
                        <div class="mb-2">
                            <label for="email" class="fs-3">Email</label>
                            <div class="d-flex align-items-center gap-2 gap-sm-3">
                                <input type="text" value="<?= $account->email ?>" name="email" id="email" class="form-control shadow-none" autocomplete="Off" readonly>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="cpass" class="fs-3">Password</label>
                            <div class="d-flex align-items-center gap-2 gap-sm-3">
                                <input type="password" value="<?= $account->password ?>" name="cpass" id="cpass" class="form-control shadow-none" value="" autocomplete="Off" readonly>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="npass" class="fs-3">New Password</label>
                            <div class="d-flex align-items-center gap-2 gap-sm-3">
                                <input type="text" name="npass" id="npass" class="form-control shadow-none" value="" autocomplete="Off">
                            </div>
                            <div id="password-message" style="margin-top: 5px; font-size: 13px;"></div>
                        </div>

                        <!-- <div class="mb-2">
                            <label for="copass" class="fs-3">Confirm Password</label>
                            <div class="d-flex align-items-center gap-2 gap-sm-3">
                                <input type="text" name="copass" id="copass" class="form-control shadow-none" value="" autocomplete="Off">
                            </div>
                        </div> -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50 mt-2">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

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
            //     const screenWidth = screen.width;
            //     const screenHeight = screen.height;
            //     const windowWidth = 1000;
            //     const windowHeight = 550;
            //     const left = (screenWidth - windowWidth) / 2;
            //     const top = (screenHeight - windowHeight) / 2;

            // window.open('../home', '_blank', `width=${windowWidth},height=${windowHeight},left=${left},top=${top}`);

            window.open('../home', '_blank');


            // Close the current tab
            window.close();
                
            }
        });
    </script>
<?php endif; ?>


<script>
$(document).ready(function() {
    $('#npass').on('input', function() {
        var password = $(this).val();

        // Check if the password meets the criteria
        var isValid = isPasswordValid(password);

        // Display a message based on validity
        var messageElement = $('#password-message');
        if (isValid) {
            messageElement.text('Strong Password.').removeClass('text-danger').addClass('text-success');
        } else {
            messageElement.text('Password must contain at least one uppercase letter [A-Z], one number [0-9], and one special character [$,.-%].').addClass('text-danger');
        }
    });

    $('form').submit(function(event) {
        var newPassword = $('#npass').val();

        if (!isPasswordValid(newPassword)) {
            // Password is invalid, prevent form submission
            event.preventDefault();
            $('#password-message').text('Please enter a strong password.').removeClass('text-success').addClass('text-danger');
        }
    });

    function isPasswordValid(password) {
        // Define your password criteria
        var uppercaseRegex = /[A-Z]/;
        var numberRegex = /\d/;
        var specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;

        // Check each criterion
        var hasUppercase = uppercaseRegex.test(password);
        var hasNumber = numberRegex.test(password);
        var hasSpecialChar = specialCharRegex.test(password);

        // Password is valid if it meets all criteria
        return hasUppercase && hasNumber && hasSpecialChar;
    }
});
</script>


<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>

</body>

</html>