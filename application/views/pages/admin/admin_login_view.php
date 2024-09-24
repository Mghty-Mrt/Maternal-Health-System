<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Login</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/fav.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="../assets/css/custom.css" />
  <link rel="stylesheet" href="../assets/css/fontawesome.css" />
</head>

<style>
  .bg-home-img{
    background-image: url('../assets/images/backgrounds/circle-tower.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
  }
</style>

<body class="bg-light">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- for radient back color "radial-gradient" -->
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0 shadow bg-transparent rounded-5">
            
            <div class="card-body bg-white rounded-5">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/maternology.png" class="logo" width="80" alt="maternology logo" />
                </a>
                <h3 class="text-center fw-semibold">Maternal System</h3>
                <p class="text-center text-main mb-4">Please enter your valid/registered account.</p>

            <?php
              if(isset($_GET['error']) && $_GET['error'] !== ""){
            ?>
            <div class="alert alert-danger d-flex"
                 role="alert">
                <div class="text-body"><i class="fas fa-exclamation-triangle text-danger"></i><strong class="text-danger"> Error:</strong> <?php print $_GET['error']?></div>
            </div>
            <?php
            }
            ?>

                <form action="../admin/checkuserlog" method="POST">
                  <div class="mb-3 input-group">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope text-main"></i></span>
                    <input type="email" class="form-control border-gray bg-light" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email..." required>
                  </div>
                  <div class="mb-3 input-group">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-key text-main"></i></span>
                    <input type="password" class="form-control border-gray bg-light" name="password" id="password" placeholder="Enter your password..." required>
                  </div>
                  <div class="d-flex justify-content-center align-items-center mb-3">
                    <a class="fw-bold" href="#">Forgot Password ?</a>
                  </div>
                  <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-light w-50 py-8 fs-3 fw-semibold mb-3 text-main border-0 rounded-4">LOGIN</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
  