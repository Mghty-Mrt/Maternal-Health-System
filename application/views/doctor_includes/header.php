<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Maternal Health System - Doctor</title>
  
  <!-- main assets  -->
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/fav.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="../assets/libs/bootstrap/dist/css/boostrap.min.css" />
  <link rel="stylesheet" href="../assets/css/custom.css" />
  <link rel="stylesheet" href="../assets/css/fontawesome.css" />
  <link rel="stylesheet" href="../assets/css/trystyle.css">
  <link rel="stylesheet" href="../assets/libs/simplebar/dist/simplebar.min.css" />

  <!-- font awesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- quill RTE  -->
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>

  <!-- sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script src="../assets/libs/jquery/dist/jquery-3.6.0.min.js"></script>
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  
  <!-- DataTables JavaScript -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <!-- alerts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- ss  -->
  <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  
  <!-- excel  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

  <!-- canvasjs pdf  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
          integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="">

<script>
    var sessionTimeout;

    function resetSessionTimeout() {
        clearTimeout(sessionTimeout);
        sessionTimeout = setTimeout(function() {
            window.location.href = "<?php print '../doctor/confirm_logout' ?>";
        }, 600000); // 10 min 
    }

    $(document).ready(function() {
        // Reset session timeout on user activity
        $(document).on('mousemove click keydown', function() {
            resetSessionTimeout();
        });

        // Initialize session timeout
        resetSessionTimeout();
    });
</script>
  
