<style>
        /* Style for fixed footer */
        .fixed-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;            
        }
    </style>

<div class="pt-3 text-center pb-2">
  <p class="mb-0 fs-4 fw-bold text-main"><a href="#" class="pe-1 text-primary text-decoration-underline"></a>Maternal Health System © <span id="currentYear"></span> <br> <small class="fs-2"><i class="fas fa-envelope"></i> Email: maternalhealth@gmail.com</small> / <small class="fs-2"><i class="fas fa-phone"></i> Phone: +639216548677</small></p>
  <small class="d-flex justify-content-end me-3 text-secondary"><i class="fas fa-cogs me-1 mt-1 text-secondary"></i> version 0.5</small>
</div>

      </div>
    </div>
  </div>
  
  <script src="../assets/libs/jquery/dist/jquery.min.js" ></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
  <script src="../assets/js/sidebarmenu.js" ></script>
  <script src="../assets/js/app.min.js" ></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js" ></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js" ></script>
  <script src="../assets/js/dashboard.js" ></script>
  <script src="../assets/js/custom.js" ></script>


  <!-- DataTables JavaScript -->
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('dab0a4d19551e57e6fb4', {
    cluster: 'ap1'
  });

  var facilities_id = <?php print $facilities_id = $this->session->userdata('facilities_id'); ?>;
  var channel = pusher.subscribe('patient-referral-' + facilities_id);
  channel.bind('incoming-patients', function(data) {
    //alert(JSON.stringify(data)); //usual alert of pusher
    showSweetAlert(data.message);

    var facilities_id = data.to_id;

    $.ajax({
        url: "../hospital/latestnotif",
        method: 'POST',
        data: {
          'facilities_id':facilities_id,
        },
        success: function(result) {
          $("#notif_msg").html(result);
        }
      });
      
  });

  function showSweetAlert(message) {
    playNotificationSound();

    Swal.fire({
      title: 'Notification',
      text: message,
      icon: 'warning',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
        // window.location.href = '../hospital/referList';
      }
    });
  }

  function playNotificationSound() {
    var audio = new Audio('../assets/notif/emergency.mp3');
    audio.play();
  }
</script>

<script>
  var currentYear = new Date().getFullYear();
  document.getElementById('currentYear').innerText = currentYear;
</script>

</body>

</html>