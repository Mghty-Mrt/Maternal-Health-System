<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maternal Health System</title>

    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/fav.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="../assets/libs/bootstrap/dist/css/boostrap.min.css" />
    <link rel="stylesheet" href="../assets/css/custom.css" />
    <link rel="stylesheet" href="../assets/css/fontawesome.css" />
    <script src="../assets/libs/jquery/dist/jquery-3.6.0.min.js"></script>
    <script src='../assets/fullcalendar/index.global.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ss  -->
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <!-- canvasjs pdf  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 600px;
            margin: 0 auto;
        }

        .fc .fc-col-header-cell-cushion {
            padding-top: 5px;
            padding-bottom: 5px;
            color: white;
            font-size: 80%;
            text-transform: uppercase;
            font-weight: bold;
        }

        .fc-toolbar-title {
            color: Balck;
        }

        .fc-scrollgrid-section-header {
            background-color: rgb(17, 82, 114, 1);
        }

        .fc-event-main {
            text-align: center;
        }

        .fc-highlight {
            background: #a1f2e3 !important;
        }

        /* Style for suggestion box */
        .suggestions2 {
            display: none;
            position: absolute;
            background-color: #f8f9fa;
            border: 1px solid #f8f9fa;
            border-radius: 5px;
            max-height: 150px;
            overflow-y: auto;
            z-index: 1;
            width: 23%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .suggestion-item2 {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item2:hover {
            background-color: rgb(17, 82, 114, 1);
            color: white;
        }

        .fc-toolbar .fc-today-button {
            text-transform: capitalize;
        }
    </style>
</head>

<body class="bg-home">

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="../" class="btn btn-danger btn-sm mb-2"> <i class="ti ti-arrow-back-up"></i> Back</a>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h5 class="text-main fw-semibold"> <i class="fas fa-calendar-week"></i> Pre-Registration</h5>
                        <hr>
                        <div id='calendar'></div>
                    </div>

                    <input type="hidden" name="code" id="code">

                    <script>
                        var code = generate_appointment_conf_code();
                        document.getElementById("code").value = code;

                        function generate_appointment_conf_code(length = 4) {
                            var charset = "0123456789";
                            var code = "";
                            for (var i = 0; i < length; i++) {
                                var randomIndex = Math.floor(Math.random() * charset.length);
                                code += charset[randomIndex];
                            }
                            return code;
                        }
                    </script>

                    <div class="col-md-6">
                        <h5 class="text-main fw-semibold"> <i class="fas fa-calendar-week"></i> Pre-Registration Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-5 mb-3">
                                <label for="">Selected Date</label>
                                <div class="input-group">
                                    <input type="text" name="selected_date" id="selected_date" class="form-control shadow-none" readonly>
                                </div>
                                <div id="invalidDate" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <input type="hidden" name="resi_id" id="resi_id">
                            <div class="col-md-4 mb-3">
                                <label for="name">Birthdate</label>
                                <div class="input-group">
                                    <input name="bdate" id="bdate" type="date" class="form-control shadow-none" autocomplete="off" onchange="calculateAge()">
                                </div>
                                <!-- <div class="suggestions2" id="suggestions2"></div> -->
                                <div id="invalidBdate" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="name">Age</label>
                                <div class="input-group">
                                    <input name="age" id="age" type="number" class="form-control shadow-none" autocomplete="off" oninput="limitAgeLength()" readonly>
                                </div>
                                <!-- <div class="suggestions2" id="suggestions2"></div> -->
                                <div id="invalidage" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">First Name</label>
                                <div class="input-group mb">
                                    <input type="text" name="fname" id="fname" class="form-control shadow-none">
                                </div>
                                <div id="invalidFname" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Middle Name</label>
                                <div class="input-group mb">
                                    <input type="text" name="mname" id="mname" class="form-control shadow-none">
                                </div>
                                <div id="invalidMname" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Last Name</label>
                                <div class="input-group mb">
                                    <input type="text" name="lname" id="lname" class="form-control shadow-none">
                                </div>
                                <div id="invalidLname" class="invalid-feedback" style="display: none;"></div>
                            </div>


                            <div class="col-md-5 mb-3">
                                <label for="">Street</label>
                                <div class="input-group">
                                    <input type="text" name="st" id="st" class="form-control shadow-none">
                                </div>

                                <div id="invalidStreet" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Barangay</label>
                                <select name="brgy" id="brgy" class="form-select shadow-none">
                                    <!-- <option value="">- Select Barangay -</option> -->
                                    <?php foreach ($barangay as $b) { ?>
                                        <option value="<?= $b->name ?>"><?= $b->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="">City</label>
                                <input type="text" class="form-control shadow-none" value="Quezon City" readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Civil Status</label>
                                <div class="input-group">
                                    <select class="form-select mr-sm-2" name="cstatus" id="cstatus" required>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Separated">Separated</option>
                                    </select>
                                </div>
                                <div id="invalidCv" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Occupation</label>
                                <div class="input-group">
                                    <input type="text" name="occu" id="occu" class="form-control shadow-none">
                                </div>
                                <div id="invalidOccupation" class="invalid-feedback" style="display: none;"></div>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Email <small class="text-info"><b><i class="fas fa-info-circle"></i> NOTE:</b> Active Email.</small></label>
                                <div class="input-group mb">
                                    <input type="email" name="email" id="email" class="form-control shadow-none">
                                </div>
                                <div id="invalidEmail" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Mobile No. <small class="text-info"><b><i class="fas fa-info-circle"></i> NOTE:</b> Active No.</small></label>
                                <div class="input-group">
                                    <input type="number" name="mno" id="mno" class="form-control shadow-none" oninput="limitNumberLength()">
                                </div>
                                <div id="invalidNoname" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-12">
                                <label for="name">Reason</label>
                                <div class="input-group">
                                    <textarea name="reason" id="reason" cols="4" rows="2" class="form-control shadow-none" required></textarea>
                                </div>
                                <div id="invalidReason" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="name">Health Centers</label>
                                <div class="input-group">
                                    <select name="hc" id="hc" class="form-select">
                                        <option value=""></option>
                                        <?php foreach ($healthcenter as $hc) { ?>
                                            <option value="<?= $hc->id ?>" data-name="<?= $hc->name ?>"><?= $hc->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div id="invalidHc" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <input type="hidden" name="hc_name" id="hc_name">

                            <small class="text-info mt-1"><b><i class="fas fa-info-circle"></i> NOTE:</b> After this appointment there will be a confirmation code
                                sent to your registered phone number and email. Please save the code then present it to your selected
                                health center Triage upon your visit to confirm that your pre-regisration online is valid. Thank You.</small>
                        </div>


                        <input type="hidden" name="in_name" id="in_name" class="form-control shadow-none">
                        <input type="hidden" name="in_r" id="in_r" class="form-control shadow-none">
                        <input type="hidden" name="in_no" id="in_no" class="form-control shadow-none">
                        <input type="hidden" name="in_add" id="in_add" class="form-control shadow-none">
                        <input type="hidden" name="in_file" id="in_file" class="form-control shadow-none">
                        <input type="hidden" name="in_file2" id="in_file2" class="form-control shadow-none">

                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-success" id="submit_btn" onclick="submitAppointment()">Submit <i class="far fa-paper-plane"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
<!-- <button data-bs-toggle="modal" data-bs-target="#guard_modal">tscfwfw</button> -->

<script>
    $(document).ready(function() {
        $('#guard_modal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
</script>

<div class="modal fade" id="guard_modal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable rounded-1">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5 text-light" id="modalTitle"><i class="fas fa-file"></i> Minor Requirements</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body" id="modalContent">

                <div id="G_details">
                    <p class="text-danger"><i class="fas fa-exclamation-circle"></i>
                        You are a minor. Please fill up the following requirements.
                        <br> Don't forget to bring your Guardian upon visit, it is <b> (Highly Required) </b>.
                    </p>

                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="">Guardian Name</label>
                            <div class="input-group">
                                <input type="text" name="g_name" id="g_name" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="">Relationship</label>
                            <div class="input-group">
                                <!-- <input type="text" name="g_r" id="g_r" class="form-control shadow-none"> -->
                                <select name="g_r" id="g_r" class="form-select shadow-none">
                                    <option value="Mother">Mother</option>
                                    <option value="Father">Father</option>
                                    <option value="Grand Father">Grand Father</option>
                                    <option value="Mother Father">Grand Mother</option>
                                    <option value="Uncle">Uncle</option>
                                    <option value="Auntie">Auntie</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <!-- <option value="Relatives">Other Relatives</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <label for="">Contact Number</label>
                            <div class="input-group">
                                <input type="number" name="g_no" id="g_no" class="form-control shadow-none" oninput="limitNumberLength()">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="">Address</label>
                            <div class="input-group">
                                <textarea type="text" name="g_add" id="g_add" class="form-control shadow-none" rows="3"></textarea>
                            </div>
                        </div>

                        <form class="row">
                            <div class="col-md-11 mt-2">
                                <label for="" class="fs-2">Guardian ID (Front)</label>
                                <div class="input-group">
                                    <input type="file" name="g_img" id="g_img" class="form-control shadow-none form-control-sm" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-1 mt-2">
                                <div class="input-group mt-4">
                                    <button type="button" onclick="saveimg()" id="add_img_btn" class="btn btn-success btn-sm"> <i class="fas fa-save"></i> </button>
                                </div>
                            </div>

                            <div class="col-md-11 mt-2">
                                <label for="" class="fs-2">Guardian ID (Back)</label>
                                <div class="input-group">
                                    <input type="file" name="g_img2" id="g_img2" class="form-control shadow-none form-control-sm" accept="image/*">
                                </div>
                            </div>

                            <div class="col-md-1 mt-2">
                                <div class="input-group mt-4">
                                    <button type="button" onclick="saveimg2()" id="add_img_btn2" class="btn btn-success btn-sm"> <i class="fas fa-save"></i> </button>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div id="labresultImages" class="rounded-3"></div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-secondary" onclick="saveGuardian()">Save <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="APmodal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable rounded-1">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5 text-light" id="modalTitle"><i class="fas fa-file"></i> Appointment Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

                <div id="AP_details">
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mt-2" width="70px" height="58px" alt="">
                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Maternal Appointment</small></h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2" width="80px" alt="">
                    </div>

                    <h6 class="mt-2 mb-2 text-main">Here is your Appointment details, please save this.</h6>
                    <ol style="list-style-type: disc;">
                        <li><small>Name:</small> <span id="AP_name"></span></li>
                        <li><small>Appointment Date:</small> <span id="AP_date"></span></li>
                        <li><small>Appointment Code:</small> <span id="AP_code"></span></li>
                        <li><small>Health Center:</small> <span id="AP_HC"></span></li>
                        <li><small>Reason:</small> <span id="AP_reason"></span></li>
                    </ol>

                    <small class="text-info mt-3">
                        <i class="fas fa-exclamation-circle"></i> <b> NOTE: </b> Please bring a valid ID for your guardian.
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="Saveap()">Save <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" style="width: 50%; height: 50%" alt="Loading...">
    </div>
</div>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>

<script>
    document.getElementById('g_img').addEventListener('change', function(event) {
        var fileList = event.target.files;
        var imagesHTML = '';

        // Loop through each file in the fileList
        for (var i = 0; i < fileList.length; i++) {

            var img = document.createElement('img');
            img.src = URL.createObjectURL(fileList[i]);
            img.style.maxWidth = '100px';
            img.style.height = '50px';
            img.style.marginRight = '10px';
            document.getElementById('labresultImages').appendChild(img);

            // Store filename in the array
            filenames.push(fileList[i].name);
        }
    });

    document.getElementById('g_img2').addEventListener('change', function(event) {
        var fileList = event.target.files;
        var imagesHTML = '';

        // Loop through each file in the fileList
        for (var i = 0; i < fileList.length; i++) {

            var img = document.createElement('img');
            img.src = URL.createObjectURL(fileList[i]);
            img.style.maxWidth = '100px';
            img.style.height = '50px';
            img.style.marginRight = '10px';
            document.getElementById('labresultImages').appendChild(img);

            // Store filename in the array
            filenames.push(fileList[i].name);
        }
    });

    function saveimg() {
        var formData = new FormData();
        var files = $('#g_img')[0].files;
        // var g_name = $('#g_name').val();

        for (var i = 0; i < files.length; i++) {
            formData.append('img_file[]', files[i]);
        }
        var isValid = true;
        var lab_img = $('#g_img').val();
        if (!lab_img) {
            $('#invalidImg').html('<i class="fas fa-exclamation-circle ms-2"></i> Please insert an image.');
            $('#invalidImg').show();
            $('#g_img').addClass('is-invalid');
            isValid = false;
        } else {
            $('#g_img').removeClass('is-invalid');
            $('#invalidImg').hide();
        }

        // var g_name = $('#g_name').val();
        // if (!g_name) {
        //     $('#invalidImg').html('<i class="fas fa-exclamation-circle ms-2"></i> Please insert an image.');
        //     $('#invalidImg').show();
        //     $('#g_name').addClass('is-invalid');
        //     isValid = false;
        // } else {
        //     $('#g_name').removeClass('is-invalid');
        //     $('#invalidImg').hide();
        // }

        if (!isValid) {
            return false;
        }

        // alert(g_name);

        $.ajax({
            url: '../home/save_img',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[id="add_img_btn"]').prop('disabled', true);
                $('input[id="g_img"]').prop('disabled', true);
                $('#add_img_btn').hide();
                $('#g_img').addClass('is-valid');
                // $('#g_name').addClass('is-valid');

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    didClose: () => {
                        // window.location.href = "../doctor/newpatients";
                        // $('#g_img').removeClass('is-valid');
                        // $('#g_name').removeClass('is-valid');
                        // $('#g_img').val('');
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Image saved successfully  "
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $('#loadinggif').hide();
            }
        });
    }

    function saveimg2() {
        var formData = new FormData();
        var files = $('#g_img2')[0].files;
        // var g_name = $('#g_name').val();

        for (var i = 0; i < files.length; i++) {
            formData.append('img_file[]', files[i]);
        }
        var isValid = true;
        var lab_img = $('#g_img2').val();
        if (!lab_img) {
            $('#invalidImg').html('<i class="fas fa-exclamation-circle ms-2"></i> Please insert an image.');
            $('#invalidImg').show();
            $('#g_img2').addClass('is-invalid');
            isValid = false;
        } else {
            $('#g_img2').removeClass('is-invalid');
            $('#invalidImg').hide();
        }

        if (!isValid) {
            return false;
        }

        // alert(g_name);

        $.ajax({
            url: '../home/save_img',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[id="add_img_btn2"]').prop('disabled', true);
                $('input[id="g_img2"]').prop('disabled', true);
                $('#add_img_btn2').hide();
                $('#g_img2').addClass('is-valid');
                // $('#g_name').addClass('is-valid');

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    didClose: () => {
                        // window.location.href = "../doctor/newpatients";
                        // $('#g_img').removeClass('is-valid');
                        // $('#g_name').removeClass('is-valid');
                        // $('#g_img').val('');
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Image saved successfully  "
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $('#loadinggif').hide();
            }
        });
    }
</script>

<script>
    function saveGuardian() {
        // Get values from modal inputs
        var guardianName = $("#g_name").val();
        var relationship = $("#g_r").val();
        var contactNumber = $("#g_no").val();
        var address = $("#g_add").val();
        var file_img = $("#g_img").val();
        var file_img2 = $("#g_img2").val();

        var fileName = file_img.split('\\').pop();
        var fileName2 = file_img2.split('\\').pop();

        // Set values to hidden inputs
        document.getElementById("in_name").value = guardianName;
        document.getElementById("in_r").value = relationship;
        document.getElementById("in_no").value = contactNumber;
        document.getElementById("in_add").value = address;
        document.getElementById("in_file").value = fileName;
        document.getElementById("in_file2").value = fileName2;

        // Close the modal
        $('#guard_modal').modal('hide');
    }
</script>

<script>
    window.jsPDF = window.jspdf.jsPDF;

    function Saveap() {
        let jsPdf = new jsPDF('p', 'pt', 'A5');
        var htmlElement = document.getElementById('AP_details');

        html2canvas(htmlElement, {
            allowTaint: true,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var pdfWidth = jsPdf.internal.pageSize.getWidth();
            var pdfHeight = jsPdf.internal.pageSize.getHeight();

            var imgWidth = pdfWidth - 65; // margin
            var imgHeight = (canvas.height * imgWidth) / canvas.width;

            // Check if image height exceeds page height
            if (imgHeight > pdfHeight) {
                imgHeight = pdfHeight - 65; // margin
                imgWidth = (canvas.width * imgHeight) / canvas.height;
            }

            var leftMargin = 30; // left margin
            var topMargin = 30; // top margin

            jsPdf.addImage(imgData, 'PNG', leftMargin, topMargin, pdfWidth - 60, imgHeight);

            // jsPdf.autoPrint(); // Automatically print
            window.open(jsPdf.output('bloburl'), '_blank');
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#hc').change(function() {
            var selectedName = $('#hc option:selected').data('name');
            $("#hc_name").val(selectedName);
        });
    });

    function submitAppointment() {
        var eventDates = [<?php foreach ($schedules as $schedule) : ?> '<?php echo $schedule->date; ?>', <?php endforeach; ?>];
        // console.log(eventDates);

        var in_name = $('#in_name').val();
        var in_r = $('#in_r').val();
        var in_no = $('#in_no').val();
        var in_add = $('#in_add').val();
        var in_file = $('#in_file').val();
        var in_file2 = $('#in_file2').val();

        var selected_date = $('#selected_date').val();
        var fname = $('#fname').val();
        var code = $('#code').val();
        var mname = $('#mname').val();
        var lname = $('#lname').val();
        var bdate = $('#bdate').val();
        var age = $('#age').val();
        var st = $('#st').val();
        var brgy = $('#brgy').val();
        var cstatus = $('#cstatus').val();
        var occu = $('#occu').val();
        var email = $('#email').val();
        var mno = $('#mno').val();
        var reason = $('#reason').val();
        var hc = $('#hc').val();

        var isValid = true;

        var selectedDate = new Date(selected_date);
        var selectedDateFormatted = selectedDate.getFullYear() + '-' + ('0' + (selectedDate.getMonth() + 1)).slice(-2) + '-' + ('0' + selectedDate.getDate()).slice(-2);
        // console.log(selectedDateFormatted);

        // Check if the selected date is empty
        if (!selected_date) {
            $('#invalidDate').html('<i class="fas fa-exclamation-circle ms-2"></i> Selected Date is required.');
            $('#invalidDate').show();
            $('#selected_date').addClass('is-invalid');
            isValid = false;
        } else {
            // Check if the selected date is in the eventDates array
            var isHoliday = eventDates.includes(selectedDateFormatted);
            console.log('Is holiday:', isHoliday);

            if (isHoliday) {
                $('#invalidDate').html('<i class="fas fa-exclamation-circle ms-2"></i> Selected Date is a holiday.');
                $('#invalidDate').show();
                $('#selected_date').addClass('is-invalid');
                isValid = false;
            } else {
                $('#invalidDate').hide();
                $('#selected_date').removeClass('is-invalid');
            }
        }

        var bdate = $('#bdate').val();
        if (!bdate) {
            $('#invalidBdate').html('<i class="fas fa-exclamation-circle ms-2"></i> Birthdate is required.');
            $('#invalidBdate').show();
            $('#bdate').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidBdate').hide();
            $('#bdate').removeClass('is-invalid');
        }

        if (bdate) {
            var birthDate = new Date(bdate);
            // var minDate = new Date("2014-01-01"); // Minimum allowed birthdate

            // Calculate age
            var age = new Date(Date.now() - birthDate.getTime()).getFullYear() - 1970;

            // Check if the age is less than 10 or if the birthdate is before 2014
            if (age < 9) {
                $('#invalidBdate').html('<i class="fas fa-exclamation-circle ms-2"></i> Invalid age. Minimum age allowed is 9 years.');
                $('#invalidBdate').show();
                $('#bdate').addClass('is-invalid');
                isValid = false;
            } else {
                $('#invalidBdate').hide();
                $('#bdate').removeClass('is-invalid');
            }
        }

        var age = $('#age').val();
        if (!age) {
            $('#invalidage').html('<i class="fas fa-exclamation-circle ms-2"></i> Age is required.');
            $('#invalidage').show();
            $('#age').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidage').hide();
            $('#age').removeClass('is-invalid');
        }

        var st = $('#st').val();
        if (!st) {
            $('#invalidStreet').html('<i class="fas fa-exclamation-circle ms-2"></i> Street is required.');
            $('#invalidStreet').show();
            $('#st').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidStreet').hide();
            $('#st').removeClass('is-invalid');
        }

        var fname = $('#fname').val();
        if (!fname) {
            $('#invalidFname').html('<i class="fas fa-exclamation-circle ms-2"></i> First name is required.');
            $('#invalidFname').show();
            $('#fname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidFname').hide();
            $('#fname').removeClass('is-invalid');
        }

        var mname = $('#mname').val();
        if (!mname) {
            $('#invalidMname').html('<i class="fas fa-exclamation-circle ms-2"></i> Middle name is required.');
            $('#invalidMname').show();
            $('#mname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidMname').hide();
            $('#mname').removeClass('is-invalid');
        }

        var lname = $('#lname').val();
        if (!lname) {
            $('#invalidLname').html('<i class="fas fa-exclamation-circle ms-2"></i> Last name is required.');
            $('#invalidLname').show();
            $('#lname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidLname').hide();
            $('#lname').removeClass('is-invalid');
        }

        var reason = $('#reason').val();
        if (!reason) {
            $('#invalidReason').html('<i class="fas fa-exclamation-circle ms-2"></i> Reason is required.');
            $('#invalidReason').show();
            $('#reason').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidReason').hide();
            $('#reason').removeClass('is-invalid');
        }

        var mno = $('#mno').val();
        if (!mno || mno.length !== 11) {
            $('#invalidNoname').html('<i class="fas fa-exclamation-circle ms-2"></i> Required & must be 11 digits.');
            $('#invalidNoname').show();
            $('#mno').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidNoname').hide();
            $('#mno').removeClass('is-invalid');
        }

        var hc = $('#hc').val();
        if (!hc) {
            $('#invalidHc').html('<i class="fas fa-exclamation-circle ms-2"></i> Health Center is required.');
            $('#invalidHc').show();
            $('#hc').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidHc').hide();
            $('#hc').removeClass('is-invalid');
        }

        var occu = $('#occu').val();
        if (!occu) {
            $('#invalidOccupation').html('<i class="fas fa-exclamation-circle ms-2"></i> Occupation is required.');
            $('#invalidOccupation').show();
            $('#occu').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidOccupation').hide();
            $('#occu').removeClass('is-invalid');
        }

        var email = $('#email').val();
        if (!email || !validateEmail(email)) {
            $('#invalidEmail').html('<i class="fas fa-exclamation-circle ms-2"></i> Email is required and must be valid.');
            $('#invalidEmail').show();
            $('#email').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidEmail').hide();
            $('#email').removeClass('is-invalid');
        }

        if (!isValid) {
            return false; // Exit the function if form validation fails
        }

        $.ajax({
            url: '../home/submitappointment',
            method: 'POST',
            data: {

                'in_name': in_name,
                'in_r': in_r,
                'in_no': in_no,
                'in_add': in_add,
                'in_file': in_file,
                'in_file2': in_file2,

                'selected_date': selected_date,
                'code': code,
                'fname': fname,
                'mname': mname,
                'lname': lname,
                'bdate': bdate,
                'age': age,
                'st': st,
                'brgy': brgy,
                'cstatus': cstatus,
                'occu': occu,
                'reason': reason,
                'hc': hc,
                'email': email,
                'mno': mno
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[id="submit_btn"]').prop('disabled', true);
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    didClose: () => {
                        // location.reload();
                        var hc_name = $('#hc_name').val();

                        document.getElementById("AP_name").innerText = fname + " " + mname + " " + lname;
                        document.getElementById("AP_date").innerText = selectedDateFormatted;
                        document.getElementById("AP_code").innerText = code;
                        document.getElementById("AP_HC").innerText = hc_name;
                        document.getElementById("AP_reason").innerText = reason;

                        $('#APmodal').modal('show');
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Appointment submitted successfully."
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $('#loadinggif').hide();
            }
        });
    }

    // Email validation function
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function limitNumberLength() {
        var input = document.getElementById('mno');
        var maxLength = 11; // Set your desired maximum length

        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }

    function limitAgeLength() {
        var input = document.getElementById('age');
        var maxLength = 3; // Set your desired maximum length

        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }

    function calculateAge() {
        var birthdate = document.getElementById("bdate").value;

        // Calculate the age
        var today = new Date();
        var birthDate = new Date(birthdate);
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        document.getElementById("age").value = age;

        if (age < 18 && age >= 9) {
            $('#guard_modal').modal('show');
        } else {
            // Close the modal if it's already open
            $('#guard_modal').modal('hide');
        }
    }
</script>

<script>
    // Array of residents
    const residents = [
        <?php foreach ($residents as $dlist) { ?> {
                name: '<?= $dlist->firstname ?> <?= $dlist->middlename ?> <?= $dlist->lastname ?>',
                email: '<?= $dlist->email ?>',
                mobileno: '<?= $dlist->mobileno ?>',
                firstname: '<?= $dlist->firstname ?>',
                middlename: '<?= $dlist->middlename ?>',
                lastname: '<?= $dlist->lastname ?>',
                id: '<?= $dlist->id ?>'
            },
        <?php } ?>
    ];

    const input = document.getElementById('cname');
    const suggestionsContainer = document.getElementById('suggestions2');
    const emailInput = document.getElementById('email');
    const mnoInput = document.getElementById('mno');
    const fnameInput = document.getElementById('fname');
    const mnameInput = document.getElementById('mname');
    const lnameInput = document.getElementById('lname');
    const resi_idInput = document.getElementById('resi_id');

    // Function to show suggestions
    function showSuggestions() {
        const value = input.value.toLowerCase();
        suggestionsContainer.innerHTML = '';

        // Filter residents based on input value
        const filteredResidents = residents.filter(resident =>
            resident.name.toLowerCase().includes(value)
        );

        //append to suggestion
        filteredResidents.forEach(resident => {
            const suggestion = document.createElement('div');
            suggestion.textContent = resident.name;
            suggestion.classList.add('suggestion-item2');
            suggestion.addEventListener('click', () => {
                input.value = resident.name;
                fnameInput.value = resident.firstname;
                resi_idInput.value = resident.id;
                mnameInput.value = resident.middlename;
                lnameInput.value = resident.lastname;
                emailInput.value = resident.email;
                mnoInput.value = resident.mobileno;
                suggestionsContainer.style.display = 'none';
            });
            suggestionsContainer.appendChild(suggestion);
        });

        // Show suggestion box if there are suggestions, otherwise hide it
        if (filteredResidents.length > 0) {
            suggestionsContainer.style.display = 'block';
        } else {
            suggestionsContainer.style.display = 'none';
        }
    }

    // call showSuggestions
    input.addEventListener('input', showSuggestions);

    // Close suggestion box when clicking outside of it
    document.addEventListener('click', (event) => {
        if (!event.target.matches('#cname')) {
            suggestionsContainer.style.display = 'none';
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var selectedDateInput = document.getElementById('selected_date');

        var eventDates = [
            <?php foreach ($schedules as $schedule) : ?> '<?php echo $schedule->date; ?>', <?php endforeach; ?>
        ];

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: new Date(),
            initialView: 'dayGridMonth',
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true,
            selectLongPressDelay: 0, // Set delay to 0 for immediate selection
            events: [
                <?php foreach ($schedules as $schedule) : ?>
                    <?php if ($schedule->schedule_type_id == 3) { ?> {
                            title: '<?php echo $schedule->name; ?>',
                            start: '<?php echo $schedule->date; ?>',
                            backgroundColor: 'red',
                            borderColor: 'red',
                        },
                    <?php } ?>
                <?php endforeach; ?>
            ],

            eventRender: function(info) {
                var today = new Date();
                if (
                    info.event.start.getDate() === today.getDate() &&
                    info.event.start.getMonth() === today.getMonth() &&
                    info.event.start.getFullYear() === today.getFullYear()
                ) {
                    info.el.style.backgroundColor = 'rgb(17, 82, 114, 0.1)';
                }
            },

            selectAllow: function(info) {
                var selectedStartDate = info.start;

                // Get today's date
                var today = new Date();
                today.setHours(0, 0, 0, 0);

                // Check if the selected date is not a Saturday (6) or Sunday (0)
                var isWeekday = selectedStartDate.getDay() !== 6 && selectedStartDate.getDay() !== 0;

                // Check if the selected date is a valid event date
                var isEventDate = eventDates.some(function(eventDate) {
                    var date = new Date(eventDate);
                    return selectedStartDate <= date && selectedStartDate >= date;
                });

                // Check if the selected date is ahead of today
                var isAheadOfToday = selectedStartDate > today;

                return isWeekday && !isEventDate && isAheadOfToday;
            },

            select: function(info) {
                var formattedDate = info.start.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });

                selectedDateInput.value = formattedDate;
            },
        });

        calendar.render();

        // Style disabled dates
        var calendarDays = calendarEl.querySelectorAll('.fc-day[data-date]');
        calendarDays.forEach(function(day) {
            var date = day.getAttribute('data-date');
            var dateObj = new Date(date);
            var isWeekend = dateObj.getDay() === 0 || dateObj.getDay() === 6; // Check if it's a weekend
            var isPast = dateObj < new Date(); // Check if it's a past date
            var isEventDate = eventDates.includes(date); // Check if it's an event date
            if (isWeekend || isPast || isEventDate) {
                day.style.backgroundColor = '#fee7e1';
                day.classList.add('disabled-date');
            }
        });
    });
</script>


<!-- 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var selectedDateInput = document.getElementById('selected_date');

        var eventDates = [
            <?php foreach ($schedules as $schedule) : ?> '<?php print $schedule->date; ?>', <?php endforeach; ?>
        ];

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: new Date(),
            defaultView: 'dayGridMonth',
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true,
            events: [
                <?php foreach ($schedules as $schedule) : ?>
                    <?php if ($schedule->schedule_type_id == 3) { ?> {
                            title: '<?php print $schedule->name; ?>',
                            start: '<?php print $schedule->date; ?>',
                            backgroundColor: 'red',
                            borderColor: 'red',
                        },
                    <?php } ?>
                <?php endforeach; ?>
            ],

            eventRender: function(info) {
                var today = new Date();
                if (
                    info.event.start.getDate() === today.getDate() &&
                    info.event.start.getMonth() === today.getMonth() &&
                    info.event.start.getFullYear() === today.getFullYear()
                ) {
                    info.el.style.backgroundColor = 'rgb(17, 82, 114, 0.1)';
                }
            },

            selectAllow: function(info) {
                var selectedStartDate = info.start;

                // Get today's date
                var today = new Date();
                today.setHours(0, 0, 0, 0);

                // Check if the selected date is not a Saturday (6) or Sunday (0)
                var isWeekday = selectedStartDate.getDay() !== 6 && selectedStartDate.getDay() !== 0;

                // Check if the selected date is a valid event date
                var isEventDate = eventDates.some(function(eventDate) {
                    var date = new Date(eventDate);
                    return selectedStartDate <= date && selectedStartDate >= date;
                });

                // Check if the selected date is ahead of today
                var isAheadOfToday = selectedStartDate > today;

                return isWeekday && !isEventDate && isAheadOfToday;
            },

            select: function(info) {
                var formattedDate = info.start.toLocaleDateString('en-US', {
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric'
                });

                selectedDateInput.value = formattedDate;
            },
        });

        calendar.render();

        // Style disabled dates
        var calendarDays = calendarEl.querySelectorAll('.fc-day[data-date]');
        calendarDays.forEach(function(day) {
            var date = day.getAttribute('data-date');
            var dateObj = new Date(date);
            var isWeekend = dateObj.getDay() === 0 || dateObj.getDay() === 6; // Check if it's a weekend
            var isPast = dateObj < new Date(); // Check if it's a past date
            var isEventDate = eventDates.includes(date); // Check if it's an event date
            if (isWeekend || isPast || isEventDate) {
                day.style.backgroundColor = '#fee7e1';
                day.classList.add('disabled-date');
            }
        });
    });
</script> -->