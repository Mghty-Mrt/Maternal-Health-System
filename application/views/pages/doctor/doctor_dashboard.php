<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <h5 class="card-title text-main mb-2"><b>Dashboard</b></h5>
    <a href="../doctor/report" class="btn btn-info btn-sm mb-2 card-hover">Generate Report <i class="ti ti-report"></i></a>
  </div>
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden card-hover">
            <div class="card-body p-4">
              <!-- <h5 class="card-title mb-9 fw-semibold">Health Center</h5> -->
              <div class="row align-items-center p-3">
                <div class="col-8">
                  <h4 class="fw-semibold mb-2 text-main">Welcome to Maternal Health System</h4>
                  <div class="d-flex align-items-center mb-3">
                    <span class="me-1 d-flex align-items-center justify-content-center">
                    </span>
                    <p class="text-main me-1 fs-3 mb-0 fw-semibold">District II</p>
                  </div>
                </div>

                <div class="col-4">
                  <div class="d-flex justify-content-end">
                    <div class="text-white  d-flex align-items-center justify-content-center">
                      <img src="../assets/images/backgrounds/welcome.png" alt="..." width="140%" height="120px">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden card-hover">
            <div class="card-body p-4">
              <?php foreach ($user_info as $info) { ?>
                <div class="row align-items-center p-0">
                  <div class="col-5">
                    <h4 class="fw-semibold mb-2 text-main">Welcome!!! <br>
                      <small class="fs-4">Dr. <?php print $info->firstname ?> <?php print $info->lastname ?></small>
                    </h4>
                    <div class="d-flex align-items-center mb-2">
                      <span class="me-1 d-flex align-items-center justify-content-center">
                      </span>
                      <p class="text-main fs-3 mb-0 fw-bold">(<?php print $info->rname ?>)</p>
                    </div>
                  </div>

                  <div class="col-7">
                    <div class="d-flex justify-content-end">
                      <div class="text-white  d-flex align-items-center justify-content-center">
                        <img src="../assets/images/logos/doctor.png" height="152" width="300" alt="doctor">
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card 3 -->
    <div class="col-lg-3">
      <a href="../doctor/today">
        <div class="card overflow-hidden card-hover">
          <div class="d-flex flex-row">
            <div class="p-3 bg-home">
              <h3 class="text-light box mb-0">
                <i class="ti ti-calendar" style="font-size: 115%"></i>
              </h3>
            </div>
            <div class="p-3">
              <h3 class="text-success mb-0 fs-6"> <?php print $total_today_patients; ?> </h3>
              <span class="text-muted">Today's Patients</span>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- card 4 -->
    <div class="col-lg-3">
      <a href="../doctor/newpatients">
        <div class="card overflow-hidden card-hover">
          <div class="d-flex flex-row">
            <div class="p-3 bg-home">
              <h3 class="text-light box mb-0">
                <i class="ti ti-list-check"></i>
              </h3>
            </div>
            <div class="p-3">
              <h3 class="text-success mb-0 fs-6"><?php print $total_new_patients; ?></h3>
              <span class="text-muted">New Patients</span>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- card 6 -->
    <div class="col-lg-3">
    <a href="../doctor/uncheckuppatients">
      <div class="card overflow-hidden card-hover">
        <div class="d-flex flex-row">
          <div class="p-3 bg-home">
            <h3 class="text-light box mb-0">
              <i class="ti ti-refresh"></i>
            </h3>
          </div>
          <div class="p-3">
            <h3 class="text-success mb-0 fs-6"><?php print $total_uncheckup_patients; ?></h3>
            <span class="text-muted">Pending Patients</span>
          </div>
        </div>
      </div>
    </a>
    </div>

    <!-- card 7 -->
    <div class="col-lg-3">
    <a href="../doctor/discharge">
      <div class="card overflow-hidden card-hover">
        <div class="d-flex flex-row">
          <div class="p-3 bg-home">
            <h3 class="text-light box mb-0">
              <i class="ti ti-send"></i>
            </h3>
          </div>
          <div class="p-3">
            <h3 class="text-success mb-0 fs-6"><?php print $total_referrals ?></h3>
            <span class="text-muted">Referred Patients</span>
          </div>
        </div>
      </div>
    </a>
    </div>

    <!-- card 5 -->
    <div class="col-lg-3">
    <a href="../doctor/discharge">
      <div class="card overflow-hidden card-hover">
        <div class="d-flex flex-row">
          <div class="p-3 bg-home">
            <h3 class="text-light box mb-0">
              <i class="ti ti-building-hospital"></i>
            </h3>
          </div>
          <div class="p-3">
            <h3 class="text-success mb-0 fs-6"><?php print $total_hospital_referrals ?></h3>
            <span class="text-muted">Hospital Referrals</span>
          </div>
        </div>
      </div>
    </a>
    </div>

    <!-- card 5 -->
    <div class="col-lg-3">
      
    <a href="../doctor/discharge">
      <div class="card overflow-hidden card-hover">
        <div class="d-flex flex-row">
          <div class="p-3 bg-home">
            <h3 class="text-light box mb-0">
              <i class="ti ti-building"></i>
            </h3>
          </div>
          <div class="p-3">
            <h3 class="text-success mb-0 fs-6"><?php print $total_lyingin_referrals ?></h3>
            <span class="text-muted">Lying-in Referrals</span>
          </div>
        </div>
      </div>
    </a>
    </div>

    <!-- card 5 -->
    <div class="col-lg-3"> 
    <a href="../doctor/feedback">
      <div class="card overflow-hidden card-hover">
        <div class="d-flex flex-row">
          <div class="p-3 bg-home">
            <h3 class="text-light box mb-0">
              <i class="fas fa-user-check" style="font-size: 20px;"></i>
            </h3>
          </div>
          <div class="p-3">
            <h3 class="text-success mb-0 fs-6"><?php print $total_arrived_referrals ?></h3>
            <span class="text-muted">Arrived Patients</span>
          </div>
        </div>
      </div>
              </a>
    </div>

    <!-- card 5 -->
    <div class="col-lg-3">
    <a href="../doctor/feedback">
      <div class="card overflow-hidden card-hover">
        <div class="d-flex flex-row">
          <div class="p-3 bg-home">
            <h3 class="text-light box mb-0">
              <i class="fas fa-user-times" style="font-size: 20px;"></i>
            </h3>
          </div>
          <div class="p-3">
            <h3 class="text-success mb-0 fs-6"><?php print $total_unarrived_referrals ?></h3>
            <span class="text-muted">Unarrived Patients</span>
          </div>
        </div>
      </div>
    </a>
    </div>

  </div>

  <div class="col-md-12">
    <div class="card card-hover">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <small class="card-title fw-normal text-main">Monthly Patients</small>
          <div>
            <select id="yearDropdown" class="form-select" onchange="updateChart()">
              <!-- Options generated dynamically -->
            </select>
          </div>
        </div>
        <hr>
        <div>
          <canvas id="DrmyBarChart" width="400" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>

  <?php
  $patients_count_by_month = array();
  $patients_count_by_year = array();
  $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

  foreach ($months as $month) {
    $patients_count_by_month[$month] = 0;
  }

  foreach ($total_patients as $tp) {
    $date = date_create($tp->prdatetime);
    $month = date_format($date, "F");
    $year = date_format($date, "Y");

    $patients_count_by_month[$year][$month] = isset($patients_count_by_month[$year][$month]) ? $patients_count_by_month[$year][$month] + 1 : 1;

    if (array_key_exists($year, $patients_count_by_year)) {
      $patients_count_by_year[$year]++;
    } else {
      $patients_count_by_year[$year] = 1;
    }
  }

  $patients_count_by_month_json = json_encode($patients_count_by_month);
  ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      generateYearOptions();
      updateChart();
    });

    function generateYearOptions() {
      var currentYear = new Date().getFullYear(); // Get current year
      var selectElement = document.getElementById('yearDropdown');

      // Loop current year back to 2023
      for (var year = currentYear; year >= 2023; year--) {
        var option = document.createElement('option');
        option.value = year;
        option.text = year;
        selectElement.add(option);
      }
    }

    var ctx = document.getElementById('DrmyBarChart').getContext('2d');
    var DrmyBarChart;

    function updateChart() {
      var selectedYear = document.getElementById('yearDropdown').value;
      var dataByYear = <?php echo $patients_count_by_month_json; ?>;
      var monthlyData = dataByYear[selectedYear] || {};

      var labels = <?php echo json_encode($months); ?>;
      var data = labels.map(month => monthlyData[month] || 0);

      DrmyBarChart.data.labels = labels;
      DrmyBarChart.data.datasets[0].data = data;

      // Update the chart
      DrmyBarChart.update();
    }

    var data2 = {
      labels: [],
      datasets: [{
        data: [],
        backgroundColor: '#13DEB9',
        borderWidth: 0,
        borderRadius: 5,
      }]
    };

    DrmyBarChart = new Chart(ctx, {
      type: 'bar',
      data: data2,
      options: {
        animation: {
          duration: 2000, // Animation duration in milliseconds
          easing: 'easeInOutQuart', // Easing function
        },
        maintainAspectRatio: false,
        scales: {
          x: {
            grid: {
              display: false // Hide x-axis gridlines
            }
          },
          y: {
            beginAtZero: true // Start y-axis at 0
          }
        },
        plugins: {
          legend: {
            display: false // Hide legend
          }
        }
      }
    });
  </script>

  <?php if ($notif_count == 0) { ?>
    <!-- <p>No notifications today</p> -->
  <?php } else { ?>
    <script>
      function showSweetAlert(notif_count) {
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
          title: 'You have ' + notif_count + ' new Patient(s)',
        });
      }

      showSweetAlert(<?php echo $notif_count; ?>);
      playNotificationSound();

      function playNotificationSound() {
        var audio = new Audio('../assets/notif/success.mp3');
        audio.play();
      }
    </script>
  <?php } ?>