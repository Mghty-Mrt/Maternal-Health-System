<div class="container-fluid">

  <h4 class="pb-2"><b>Dashboard</b></h4>
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <!-- <h5 class="card-title mb-9 fw-semibold">Health Center</h5> -->
                    <div class="row align-items-center p-3">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-2">Welcome to Maternal Health System</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span class="me-1 d-flex align-items-center justify-content-center">
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0 fw-semibold">District II</p>
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
                      <small class="fs-4">Md. <?php print $info->firstname ?> <?php print $info->lastname ?></small>
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
                        <img src="../assets/images/logos/midwife.png" height="152" width="300" alt="doctor">
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

          
              </div>
            </div>
          </div>
        </div>


        <!-- <script>
    // Get the canvas element
    var ctx = document.getElementById('myDoughnutChart').getContext('2d');

    // Data for the doughnut chart
    var data1 = {
        labels: ['Commonwealth', 'Cancelled','Pending', 'Absent'],
        datasets: [{
            data: [30, 40, 35, 45],
            backgroundColor: ['rgb(85, 199, 132)', 'rgb(85, 205, 186)', 'rgb(35, 202, 292)', 'rgb(55, 125, 186)'],
        }]
    };

    // Create the doughnut chart
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data1,
        options: {
            cutoutPercentage: 0, // Ensure cutoutPercentage is 0
            elements: {
                arc: {
                    borderWidth: 0, // Set arc border width to 0 to remove any residual border
                }
            },
            plugins: {
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total',
                            font: {
                                size: '20'
                            }
                        },
                        {
                            text: '100',
                            font: {
                                size: '16'
                            }
                        }
                    ]
                }
            }
        }
    });
</script> -->


<script>
    var ctx2 = document.getElementById('myDoughnutChart2').getContext('2d');

    var data2 = {
        labels: ['Payatas', 'Bagong Silangan', 'Batasan Hills', 'Holy Spirit', 'Commonwealth'],
        datasets: [{
            data: [30, 40, 35, 10, 75],
            backgroundColor: ['rgb(85, 199, 132)', 'rgb(75, 192, 192)', 'rgb(85, 205, 186)', 'rgb(35, 202, 292)', 'rgb(55, 125, 186)'],
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


<script>
  $(document).ready(function() {
    $('#dashTable').DataTable();
  });
</script>
