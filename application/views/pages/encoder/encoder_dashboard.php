<div class="container-fluid">
  <div class="row">
  <div class="col-lg-6">
            <div class="row">
             <div class="col-lg-12">
                <div class="card overflow-hidden card-hover">
                    <div class="card-body p-4">
                    <!-- <h5 class="card-title mb-9 fw-semibold">Health Center</h5> -->
                    <div class="row align-items-center">
                        <div class="col-8">
                        <h4 class="fw-semibold mb-2 text-main">Welcome to Maternal <br> Health System</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span class="me-1 d-flex align-items-center justify-content-center">
                            </span>
                            <p class="text-main me-1 fs-3 mb-0 fw-semibold text-main">District II</p>
                        </div>
                        </div>

                        <div class="col-4">
                        <div class="d-flex justify-content-end">
                            <div class="text-white  d-flex align-items-center justify-content-center">
                            <img src="../assets/images/backgrounds/welcome.png" alt="..." width="140%" height="120px">
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <img src="../assets/images/logos/doctor.png" height="158" width="350" alt="doctor">
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
                <div class="card overflow-hidden card-hover">
                    <div class="card-body p-4">
                    <!-- <h5 class="card-title mb-9 fw-semibold">Health Center</h5> -->
                    <div class="row align-items-center">
                        <div class="col-12">
                        <div class=" justify-content-center">
                            <div class="text-white  d-flex align-items-center justify-content-center">
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
             </div>
            </div>
        </div>

        <!-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <div id="chartContainer2" style="height: 300px; width: 99%;"></div>
                </div>
            </div>
        </div> -->
  </div>
</div>

<script>
window.onload = function() {

    <?php $positive = count($positive_patients); ?>
    var positive_patients = <?php print $positive; ?>

    <?php $negative = count($negative_patients); ?>
    var negative_patients = <?php print $negative; ?>

    <?php $pending = count($pending_patients); ?>
    var pending_patients = <?php print $pending; ?>

    var chart1 = new CanvasJS.Chart("chartContainer", {
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "Pregnancy Results",
            fontColor: "rgb(17, 82, 114, 1)",
            fontWeight: "normal"
        },
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}",
            dataPoints: [
                { y: positive_patients, label: "Positive", color: "#13DEB9" },
                { y: negative_patients, label: "Negative", color: "#FA896B" },
                { y: pending_patients, label: "Pending", color: "#5D87FF" },
            ]
        }]
    });
    chart1.render();

    var chart2 = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        theme: "light1",
        title:{
            text: "Daily Patients",
            fontColor: "rgb(17, 82, 114, 1)",
            fontWeight: "normal"
        },
        data: [{        
            type: "line",
            lineColor: "#13DEB9",
            indexLabelFontSize: 20,
            dataPoints: [
                { label: "Monday", y: 450 },
                { label: "Tuesday", y: 414},
                { label: "Wednesday", y: 520, indexLabel: "\u2191 highest",markerColor: "#FA896B", markerType: "triangle" },
                { label: "Thursday", y: 460 },
                { label: "Friday", y: 450 },
                { label: "Saturday", y: 500 },
                { label: "Sunday", y: 480 }
            ]
        }]
    });
    chart2.render();
}
</script>
