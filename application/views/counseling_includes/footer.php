<div class="py-6 px-6 text-center">
  <p class="mb-0 fs-4"><a href="#" class="pe-1 text-primary text-decoration-underline"></a>Maternal Health System @ 2024</p>
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
<script src="../assets/js/custom.js"></script>


<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- 
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('dab0a4d19551e57e6fb4', {
    cluster: 'ap1'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    //alert(JSON.stringify(data));
    showCustomNotification(data.message);

    $.ajax({
      url: "../encoder/latestmsg",
      success: function(result) {
        $("#result").html(result);
      }
    })
  });


  function showCustomNotification(message) {
    var notification = $('<div class="custom-notification">' + message + '</div>');

    notification.css({
      background: '#4CAF50',
      color: '#fff',
      padding: '15px',
      borderRadius: '5px', 
      position: 'fixed', 
      top: '30px', 
      right: '30px', 
      zIndex: '1000' 
    });

    // Append the notification to the body
    $('body').append(notification);

    // Add a click event listener to remove the notification when clicked
    notification.on('click', function() {
      $(this).remove();
    });

    setTimeout(function() {
      notification.remove();
    }, 3000); //3 sec timer
  }
</script> -->

</body>

</html>