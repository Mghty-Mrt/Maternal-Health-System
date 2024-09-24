<div class="container-fluid">
  <div class="d-flex justify-content-between">
    <h5 class="text-main"><b>Dashboard</b></h5>
    <a href="../admin/report" class="btn btn-primary mb-2 btn-sm card-hover">Generate Report <i class="ti ti-report"></i></a>
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
                    <p class="me-1 fs-3 mb-0 fw-semibold text-main">District II</p>
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

    <!-- card 2 -->
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <!-- Yearly Breakup -->
          <div class="card overflow-hidden card-hover">
            <div class="card-body">
              <div class="row mt-3">
                <div class="col-md-6 mt-1">
                  <div class="d-flex flex-row align-items-center mb-3">
                    <div class="round-40 card-hover shadow p-3 rounded-4 d-flex align-items-center justify-content-center text-bg-light">
                      <!-- <i class="fas fa-wheelchair text-main" style="font-size: 54px"></i> -->
                      <img src="../assets/images/logos/pregy.png" alt="">
                    </div>
                    <div class="ms-3 align-self-center">
                      <?php
                      $total = count($total_patients);
                      ?>
                      <h3 class="mb-0 fs-6 text-main"><?php print $total ?> </h3>
                      <span class="text-muted fw-bolder">Total Patients</span>
                    </div>
                  </div>
                </div>

                <div class="col-6">
                  <div class="d-flex justify-content-end card-hover mb-2">

                    <canvas id="myDoughnutChart2" width="125" height="115"></canvas>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
      <div class="card bg-primary-subtle card-hover">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <div class="round-40 p-3 rounded-4 text-primary d-flex align-items-center justify-content-center text-bg-light">
              <i class="fas fa-users fs-6"></i>
            </div>
            <div class="ms-3 align-self-center">
              <h3 class="mb-0 fs-6 text-primary"><?php print $totalusers ?></h3>
              <span class="text-muted text-primary fw-bolder">Users</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
      <div class="card bg-warning-subtle card-hover">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <div class="round-40 p-3 rounded-4 text-warning d-flex align-items-center justify-content-center text-bg-light">
              <i class="fas fa-hospital-alt fs-6"></i>
            </div>
            <div class="ms-3 align-self-center">
              <h3 class="mb-0 fs-6 text-warning fw-semibold"><?php print $total_health_center ?></h3>
              <span class="text-muted fw-bolder">Health Center</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
      <div class="card bg-danger-subtle card-hover">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <div class="round-40 p-3 rounded-4 text-danger d-flex align-items-center justify-content-center text-bg-light">
              <i class="fas fa-hospital fs-6"></i>
            </div>
            <div class="ms-3 align-self-center">
              <h3 class="mb-0 fs-6 text-danger"><?php print $total_hospital ?></h3>
              <span class="text-muted fw-bolder">Hospital </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
      <div class="card bg-success-subtle card-hover">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <div class="round-40 p-3 rounded-4 text-success d-flex align-items-center justify-content-center text-bg-light">
              <i class="fas fa-procedures fs-6"></i>
            </div>
            <div class="ms-3 align-self-center">
              <h3 class="mb-0 fs-6 text-success"><?php print $total_lyingin ?></h3>
              <span class="text-muted fw-bolder">Lying-in </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card card-hover">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <small class="card-title fw-normal text-main">Active Account Monthly</small>
            <div>
              <select id="yearDropdown" class="form-select" onchange="updateChart()">
                <!-- Options generated dynamically -->
              </select>
            </div>
          </div>
          <div>
            <canvas id="myBarChart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <small class="card-title fw-normal text-main">New Registered User per Day</small>
          <hr>
          <div>
            <canvas id="myLineChart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
    </div> -->
  </div>

  <script>
    var ctx2 = document.getElementById('myDoughnutChart2').getContext('2d');

    <?php $ongoing = count($ongoing_patients); ?>
    var ongoing_patients = <?php print $ongoing; ?>

    <?php $done = count($done_patients); ?>
    var done_patients = <?php print $done; ?>

    var data2 = {
      labels: ['Ongoing Patients', 'Done Patients'],
      datasets: [{
        data: [ongoing_patients, done_patients],
        backgroundColor: ['#FFAE1F', '#16A637'],
      }]
    };

    var myDoughnutChart2 = new Chart(ctx2, {
      type: 'doughnut',
      data: data2,
      options: {
        cutoutPercentage: 0,
        maintainAspectRatio: false,
        elements: {
          arc: {
            borderWidth: 0,
          }
        },
        plugins: {
          legend: {
            display: false // Hide the internal labels
          }
        }
      }
    });
  </script>

  <?php
  $account_count_by_month = array();
  $account_count_by_year = array();
  $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

  foreach ($months as $month) {
    $account_count_by_month[$month] = 0;
  }

  foreach ($total_active as $ta) {
    $date = date_create($ta->acc_date);
    $month = date_format($date, "F");
    $year = date_format($date, "Y");

    $account_count_by_month[$year][$month] = isset($account_count_by_month[$year][$month]) ? $account_count_by_month[$year][$month] + 1 : 1;

    if (array_key_exists($year, $account_count_by_year)) {
      $account_count_by_year[$year]++;
    } else {
      $account_count_by_year[$year] = 1;
    }
  }

  $account_count_by_month_json = json_encode($account_count_by_month);
  ?>

  <script>
    // Generate year options and update chart data when DOM content is loaded
    document.addEventListener('DOMContentLoaded', function() {
      generateYearOptions();
      updateChart();
    });

    function generateYearOptions() {
      var currentYear = new Date().getFullYear(); // Get current year
      var selectElement = document.getElementById('yearDropdown');

      // Loop from current year back to 2000 and generate options
      for (var year = currentYear; year >= 2023; year--) {
        var option = document.createElement('option');
        option.value = year;
        option.text = year;
        selectElement.add(option);
      }
    }

    var ctx = document.getElementById('myBarChart').getContext('2d');
    var myBarChart;

    function updateChart() {
      var selectedYear = document.getElementById('yearDropdown').value;
      var dataByYear = <?php echo $account_count_by_month_json; ?>;
      var monthlyData = dataByYear[selectedYear] || {};

      var labels = <?php echo json_encode($months); ?>; // Include all months
      var data = labels.map(month => monthlyData[month] || 0); // Map data for each month

      // Update the chart data with the monthly data for the selected year
      myBarChart.data.labels = labels;
      myBarChart.data.datasets[0].data = data;

      // Update the chart
      myBarChart.update();
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

    myBarChart = new Chart(ctx, {
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

  <!-- <script>
    var ctx = document.getElementById('myBarChart').getContext('2d');

    var data2 = {
      labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
      datasets: [{
        data: [100, 20, 10, 40, 50, 70, 20, 10, 40, 50, 70, 100],
        backgroundColor: ['#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9', '#13DEB9'],
        borderWidth: 0,
        borderRadius: 5,
      }]
    };

    var myBarChart = new Chart(ctx, {
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
  </script> -->

  <!-- <script>
    var ctx = document.getElementById('myLineChart').getContext('2d');

    // Sample data for total patients per day (replace this with your actual data)
    var days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    var totalPatients = [13, 20, 15, 70, 25, 50, 22]; // Replace this with your actual patient counts per day

    var data = {
      labels: days,
      datasets: [{
        label: 'Total Patients',
        data: totalPatients,
        fill: true, // Disable area fill below the line
        borderColor: 'limegreen', // Line color
        borderWidth: 2 // Line width
      }]
    };

    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
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
            display: false, // Show legend
            labels: {
              font: {
                size: 12 // Legend label font size
              }
            }
          }
        }
      }
    });
  </script> -->