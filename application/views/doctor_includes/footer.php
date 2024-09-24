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

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<!-- <script src="../assets/libs/simplebar/dist/simplebar.js"></script> -->
<script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="../assets/js/dashboard.js"></script>
<script src="../assets/js/custom.js"></script>

<script src="../assets/js/app/chat.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>


<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;
  var pusher = new Pusher('dab0a4d19551e57e6fb4', {
    cluster: 'ap1'
  });

  // Subscribe to 'pre-registration' channel
  
  var user_id = <?php print $user_info[0]->suid ?>;
  var preRegistrationChannel = pusher.subscribe('pre-registration-' + user_id);
  preRegistrationChannel.bind('new-patients', function(data) {
    playNotificationSound();
    showSweetAlert(data.message);

    // var userid = data.message;

  //   $.ajax({
  //   url: "../doctor/insertnotif",
  //   method: "POST",
  //   data : {
  //       'userid': data.to_id,
  //       'from_id': data.from_id
  //   },
  //   success: function(result) {
  //     // $("#result").html(result);
  //     console.log('success');
  //   }
  // });

  var user_id = data.to_id;

  $.ajax({
      url: "../doctor/latestnotif",
      method: 'POST',
      data: {
        'user_id':user_id,
      },
      success: function(result) {
        $("#notif_msg").html(result);
      }
    });

  });

  // Subscribe to 'referral-feedback' channel
  var referralFeedbackChannel = pusher.subscribe('referral-feedback');
  referralFeedbackChannel.bind('patients-feedback', function(data) {
    playNotificationSound();
    showSweetAlertfeed(data.message);
  });

  function showSweetAlert(message) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      },
      didClose: () => {
        // window.location.href = "../hospital/referList";
        // location.reload();
      }
    });
    Toast.fire({
      icon: "warning",
      title: 'You have new Patient', message
    });
  }

  function showSweetAlertfeed(message) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      },
      didClose: () => {
        // window.location.href = "../hospital/referList";
        // location.reload();
      }
    });
    Toast.fire({
      icon: "info",
      title: message
    });
  }

  function playNotificationSound() {
    var audio = new Audio('../assets/notif/success.mp3');
    audio.play();
  }
</script>

<script>
  Pusher.logToConsole = true;

  var pusher = new Pusher('dab0a4d19551e57e6fb4', {
    cluster: 'ap1'
  });

  var channel = pusher.subscribe('new-chat1');
  channel.bind('incoming-chat1', function(data) {
    // alert(JSON.stringify(data)); //usual alert of pusher
    // showSweetAlert(data.message);
    playNotificationSound();

    $.ajax({
      url: "../doctor/live_chat",
      method: 'POST',
      data: {
        'acc_id': data.acc_id,
        'access_id': data.access_id
      },
      success: function(result) {
        $("#chat_reply_latest").html(result);
      }
    })

  });

  // function showSweetAlert(message) {
  //   playNotificationSound();

  //   const Toast = Swal.mixin({
  //     toast: true,
  //     position: "top-end",
  //     showConfirmButton: false,
  //     timer: 3000,
  //     timerProgressBar: true,
  //     didOpen: (toast) => {
  //       toast.onmouseenter = Swal.stopTimer;
  //       toast.onmouseleave = Swal.resumeTimer;
  //     },
  //     didClose: () => {
  //       // location.reload();
  //     }
  //   });
  //   Toast.fire({
  //     icon: "info",
  //     title: message
  //   });
  // }
  </script>

<script>
  var currentYear = new Date().getFullYear();
  document.getElementById('currentYear').innerText = currentYear;
</script>

</body>

</html>