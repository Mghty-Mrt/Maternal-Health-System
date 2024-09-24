<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maternal Health System</title>

  <link rel="shortcut icon" type="image/png" href="assets/images/logos/fav.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="assets/libs/bootstrap/dist/css/boostrap.min.css" />
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/trystyle.css">
  <script src="assets/libs/jquery/dist/jquery-3.6.0.min.js"></script>

  <!-- alerts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<style>
  .bg-home-img {
    background-image: url('assets/images/backgrounds/MHS_BACKGROUND.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
  }

  .btn-bg-main {
    transition: background 0.3s ease;
    background: rgb(17, 82, 114, 1);
    border: rgb(17, 82, 114, 1) 1px solid;
    color: white;
  }

  .btn-bg-main:hover {
    border: rgb(17, 82, 114, 1) 1px solid;
    color: rgb(17, 82, 114, 1);
  }

  .text-main {
    color: rgb(17, 82, 114, 1);
  }
</style>

<body class="bg-home-img">

  <main class="">

    <nav class="navbar navbar-expand-lg pt-4 card-hover">
      <div class="container">
        <a class="navbar-brand card-hover" href="home">
          <img src="assets/images/logos/maternology.png" class="card-hover" width="75" alt="maternology logo" />
          <span class="h3 text-dark p-2"><b>Maternal Health System</b></span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-lg-auto me-lg-1">
            <li class="nav-item">
              <a class="nav-link fs-3 text-main fw-bold card-hover" href="home/appointment">
                <!-- <i class="fas fa-calendar-check"></i>  -->
                Pre-Registration</a>
            </li>

            <li class="nav-item">
              <a class="nav-link fs-3 text-main fw-bold card-hover" href="home/events">
                <!-- <i class="fas fa-calendar-check"></i>  -->
                Events</a>
            </li>

            <li class="nav-item">
              <a class="nav-link fs-3 text-main fw-bold card-hover" href="home/about">
                <!-- <i class="fas fa-info-circle"></i>  -->
                About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link fs-3 text-main fw-bold card-hover" href="home/contact"> Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-main btnAdd fs-3 fw-bold card-hover" href="#" data-bs-toggle="modal" data-bs-target="#dynamicmodal">
                <!-- <i class="fas fa-sign-in-alt"></i>  -->
                Login</a>
            </li>

          </ul>

        </div>
      </div>
    </nav>

    <section class=" d-flex justify-content-center align-items-center mt-1 opacity-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-12 mb-5 pb-5 pb-lg-0 mb-lg-0 card-hover ms-5" style="padding-top: 80px">
            <h1 class="text-dark mb-4 fw-semibold">Maternal Health <br> System of <br> District II in <br> Quezon City <br><small class="h5 text-dark">Developing Natural Care in Motherhood</small></h1>
            <form action="home/email" method="POST">
              <?php foreach ($adminstatus as $adstat) { ?>
                <?php if ($adstat->is_verified == 0) { ?>
                  <button type="submit" class="btn btn-light shadow rounded-5 p-3">Get Started</button>
                <?php } ?>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Login Modal -->
  <div class="modal fade" id="dynamicmodal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
      <div class="modal-content rounded-4 bg-home" style="padding-left: 50px; padding-right: 50px;">
        <div class="modal-body">
          <a href="home" class="text-nowrap logo-img text-center d-block w-100">
            <img src="assets/images/logos/maternology.png" class="" width="150px" alt="maternology logo" />
            <h5 class="text-light">Maternal Health System</h5>
            <!-- <hr class="border-light"> -->
          </a>
          <p class="mb-3 text-center text-light fw-regular">Enter your active and registered account.</p>
          <!-- <h4 class="text-center mb-3 text-light"><b>LOGIN</b></h4> -->
          <?php
          if (isset($_GET['error']) && $_GET['error'] !== "") {
          ?>
            <div class="alert alert-danger d-flex" role="alert">
              <div class="text-body"><i class="fas fa-exclamation-circle text-danger fs-4"></i><strong class="text-danger"> Error:</strong> <?php print $_GET['error'] ?></div>
            </div>
          <?php
          }
          ?>

          <form action="home/checkuserlog" method="POST">
            <label for="email" class="text-light fw-bold">Email</label>
            <div class="input-group mb-2">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope text-main"></i></span>
              <input type="email" class="form-control shadow-none fs-4 border-0 bg-light" name="email" id="email" placeholder="Enter your email..." aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <?php //echo form_error('email', '<div class="text-danger">', '</div>'); 
            ?>

            <label for="email" class="text-light fw-bold">Password</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-key text-main"></i></span>
              <input type="password" class="form-control shadow-none fs-4 border-0 bg-light" name="password" id="password" placeholder="Enter your password..." aria-label="Username" aria-describedby="basic-addon1" required>
              <span class="input-group-text bg-light eye text-main" onclick="eyeToggle()"><i class="fas fa-eye-slash fs-3 text-main"></i></span>
            </div>
            <?php //echo form_error('password', '<div class="text-danger">', '</div>'); 
            ?>

            <div class="d-flex justify-content-center align-items-center mb-3">
              <a class="text-light fw-bold" href="home/emailrqst">Forgot Password ?</a>
            </div>

            <div class="d-flex justify-content-center align-items-center">
              <button type="submit" class="btn btn-light text-main px-4 fs-4 mb-3 border-0">LOGIN</a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</body>

</html>

<?php if ($this->session->flashdata('success')) : ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '<?= $this->session->flashdata("success") ?>',
      showConfirmButton: false,
      timer: 2000,
    });
  </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '<?= $this->session->flashdata("error") ?>',
      showConfirmButton: false,
      timer: 2000,
    });
  </script>
<?php endif; ?>

<script>
  $(document).ready(function() {
    <?php
    if (isset($_GET['error']) && $_GET['error'] !== "") {
    ?>
      $('#dynamicmodal').modal('show');
    <?php
    }
    ?>
  });
</script>

<script>
  function eyeToggle() {
    const passwordInput = $("#password");
    const eyeIcon = $(".eye i");

    if (passwordInput.attr("type") === "password") {
      passwordInput.attr("type", "text");
      eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
    } else {
      passwordInput.attr("type", "password");
      eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
    }
  }
</script>

<script>
  function generateCode() {
    const characters = '0123456789';
    const codeLength = 7;

    // Generate a random code
    let randomCode = '';
    for (let i = 0; i < codeLength; i++) {
      const randomIndex = Math.floor(Math.random() * characters.length);
      randomCode += characters.charAt(randomIndex);
    }

    document.getElementById('code').value = randomCode;
  }
</script>

<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/sidebarmenu.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/simplebar/dist/simplebar.js"></script>
<script src="assets/js/dashboard.js"></script>

</body>