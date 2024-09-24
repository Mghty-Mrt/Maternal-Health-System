<style>
    .signature {
        border: 0;
        border-radius: 0%;
        border-bottom: 1px solid lightgray;
    }
</style>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">

        <div id="dischargem">

            <!-- <a href="../doctor/newpatients"><i class="ti ti-arrow-back fs-5"></i>Back</a> -->
            <div class="d-flex justify-content-center">
                <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Discharge Mother</small> <br> (RECORD) </h5>
                <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                <!-- <a href="../doctor/newpatients" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a> -->
            </div>

            <hr class="border-5 shadow-none mb-4">

            <!-- Date & time -->
            <div class="row">
                <input type="hidden" name="ref_id" id="ref_id" value="<?php print $patient_record[0]->rpid ?>">
                <div class="col-md-6">
                    <label for="hr" class="">Date</label>
                    <div class="input-group">
                        <input type="date" id="discharge_date" name="discharge_date" class="form-control shadow-none shadow-none">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="hr" class="">Time</label>
                    <div class="input-group">
                        <input type="time" id="discharge_time" name="discharge_time" class="form-control shadow-none shadow-none">
                    </div>
                </div>
            </div>

            <!-- General Appearance -->
            <label for="" class="mt-3">General Appearance</label>
            <div class="input-group">
                <textarea class="form-control shadow-none shadow-none" rows="4" id="general_apperance" name="general_apperance"></textarea>
            </div>

            <!-- Blood pressure etc. -->
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="bp" class="">Blood Pressure:</label>
                    <input type="text" class="form-control shadow-none" id="bp">
                </div>
                <div class="col-md-3">
                    <label for="pr" class="">Pulse Rate:</label>
                    <input type="text" class="form-control shadow-none" id="pr">
                </div>
                <div class="col-md-3">
                    <label for="rr" class="">Respiratory Rate:</label>
                    <input type="text" class="form-control shadow-none" id="rr">
                </div>
                <div class="col-md-3">
                    <label for="temperature" class="">Temperature:</label>
                    <input type="text" class="form-control shadow-none" id="temperature">
                </div>
            </div>


            <!-- Physical Examination/Internal Examination -->

            <div class="mt-3">
                <label for="" class="fw-semibold mb-2">Physical Examination/Internal Examination:</label>

                <div class="row">
                    <div class="col-md-6">
                        <div class="div">
                            <label for="contactNumber" class="fw-semibold">Uterus</label>
                            <div class="container mt-1">
                                <form>
                                    <div class="" style="display: flex; gap: 5%;">
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="well" name="uterus_well" value="Well contracted">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox1">
                                                Well contracted
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="notwell" name="uterus_notwell" value="Not well contracted">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox2">
                                                Not well contracted
                                            </label>
                                        </div>
                                        <!-- Add more checkbox buttons as needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <div class="div">
                            <label for="contactNumber" class="fw-semibold">Episiorraphy</label>
                            <div class="container mt-1">
                                <form>
                                    <div class="" style="display: flex; gap: 5%;">
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="well_coapted" name="Episiorraphy_well_coapted" value="Well Coapted">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox1">
                                                Well Coapted
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="Dehised" name="Episiorraphy_Dehised" value="Dehised">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox2">
                                                Dehised
                                            </label>
                                        </div>
                                        <!-- Add more checkbox buttons as needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <div class="div">
                            <label for="contactNumber" class="fw-semibold">Infection</label>
                            <div class="container mt-1">
                                <form>
                                    <div class="" style="display: flex; gap: 5%;">
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="present" name="Infection_present" value="Present">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox1">
                                                Present
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="Absent" name="Infection_Absent" value="Absent">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox2">
                                                Absent
                                            </label>
                                        </div>
                                        <!-- Add more checkbox buttons as needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <div class="div">
                            <label for="contactNumber" class="fw-semibold">Edeme (Extremeties)</label>
                            <div class="container mt-1">
                                <form>
                                    <div class="" style="display: flex; gap: 5%;">
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="Profuse" name="Edeme_Profuse" value="Profuse">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox1">
                                                Profuse
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="Moderate" name="Edeme_Moderate" value="Mederate">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox2">
                                                Moderate
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="Minimal" name="Edeme_Minimal" value="Minimal">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox2">
                                                Minimal
                                            </label>
                                        </div>
                                        <!-- Add more checkbox buttons as needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="">
                        <div class="div">
                            <label for="contactNumber" class="fw-semibold">Vaginal bleeding</label>
                            <div class="container mt-1">
                                <form>
                                    <div class="" style="display: flex; gap: 5%;">
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="Yes" name="Vaginal_bleeding_Yes" value="Yes">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox1">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" style="padding: 12px;" type="checkbox" id="No" name="Vaginal_bleeding_No" value="No">
                                            <label class="form-check-label mt-1 ms-1" for="checkbox2">
                                                No
                                            </label>
                                        </div>
                                        <!-- Add more checkbox buttons as needed -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Other Findings</label>
                        <div class="">
                            <textarea class="form-control shadow-none" id="other_findings" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="">Medications</label>
                        <div class="">
                            <textarea class="form-control shadow-none" id="medications" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <label for="" class="mt-3">Return Visit/Follow-Up</label>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="date" id="return_date" class="form-control shadow-none">
                    </div>
                    <div class="col-md-6">
                        <input type="time" id="return_time" class="form-control shadow-none">
                    </div>
                </div>
                <hr>

                <!-- Final/Discharge Diagnosis -->
                <div class="row mb-5">
                    <div class="col-md-12">
                        <label for="exampleInput">Final/Discharge Diagnosis</label>
                        <textarea class="form-control shadow-none" id="final_diagnosis" rows="4"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control shadow-none signature text-uppercase text-center" id="examined_by">
                        <center><label for="examined_by" class="mt-2">Examined by (Medical Officer)</label></center>
                    </div>

                    <div class="col-md-6">
                        <input type="text" class="form-control shadow-none signature text-uppercase text-center" name="discharge_by" id="discharge_by">
                        <center><label for="exampleInput" class="mt-2">Discharge by (Midwife)</label></center>
                    </div>
                </div>

                <div class="row mb-3 mt-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <input type="text" class="form-control shadow-none signature text-uppercase text-center" name="patient_sign" id="patient_sign" value="<?php print $patient_record[0]->firstname ?> <?php print $patient_record[0]->middlename ?> <?php print $patient_record[0]->lastname ?>" readonly>
                        <center><label for="exampleInput" class="mt-2">Signature of Patient over Printed Name</label></center>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <hr class="border-5 shadow-none mt-5">

            </div>
        </div>

                <div class="col-md-12 d-flex justify-content-end mt-3">
                    <button type="button" onclick="saveDischarge()" class="btn btn-success" id="btnsave"> Save <i class="ti ti-send"></i></button>
                    <button type="button" onclick="printDischarge()" class="btn btn-warning ms-3">Print <i class="fas fa-print"></i></button>
                </div>

        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>


<script>
    window.jsPDF = window.jspdf.jsPDF;

    function printDischarge() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('dischargem');

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

            jsPdf.autoPrint(); // Automatically print
            window.open(jsPdf.output('bloburl'), '_blank');
        });
    }
</script>

<script>
    function saveDischarge() {
        var ref_id = $('#ref_id').val();
        var other_findings = $('#other_findings').val();
        var medications = $('#medications').val();
        var return_date = $('#return_date').val();
        var return_time = $('#return_time').val();
        var final_diagnosis = $('#final_diagnosis').val();
        var examined_by = $('#examined_by').val();
        var discharge_by = $('#discharge_by').val();
        var patient_sign = $('#patient_sign').val();

        var discharge_record_data = {
            'Discharge_date': $('#discharge_date').val(),
            'Discharge_time': $('#discharge_time').val(),
            'General_Apperance': $('#general_apperance').val(),
            'Blood_Pressure': $('#bp').val(),
            'PR': $('#pr').val(),
            'RR': $('#rr').val(),
            'Temperature': $('#temperature').val(),
        };

        var Uterus_data = {};
        $('input[name^="uterus"]:checked').each(function() {
            Uterus_data[$(this).attr('name')] = $(this).val();
        });

        var Episiorraphy_data = {};
        $('input[name^="Episiorraphy"]:checked').each(function() {
            Episiorraphy_data[$(this).attr('name')] = $(this).val();
        });

        var Infection_data = {};
        $('input[name^="Infection"]:checked').each(function() {
            Infection_data[$(this).attr('name')] = $(this).val();
        });

        var Edeme_data = {};
        $('input[name^="Edeme"]:checked').each(function() {
            Edeme_data[$(this).attr('name')] = $(this).val();
        });

        var Vaginal_bleeding_data = {};
        $('input[name^="Vaginal_bleeding"]:checked').each(function() {
            Vaginal_bleeding_data[$(this).attr('name')] = $(this).val();
        });

        // Combine all data into a single object
        var combinedData = {
            Uterus: Uterus_data,
            Episiorraphy: Episiorraphy_data,
            Infection: Infection_data,
            Edeme: Edeme_data,
            VaginalBleeding: Vaginal_bleeding_data
        };

        // Convert data to JSON
        var discharge_record_Json = JSON.stringify(discharge_record_data);
        var combinedDataJson = JSON.stringify(combinedData);

        $.ajax({
                url: '../lyingin/savedischargem',
                method: 'POST',
                data: {
                    'ref_id': ref_id,
                    'discharge_record_Json': discharge_record_Json,
                    'combinedDataJson': combinedDataJson,
                    'return_date': return_date,
                    'return_time': return_time,
                    'other_findings': other_findings,
                    'medications': medications,
                    'final_diagnosis': final_diagnosis,
                    'examined_by': examined_by,
                    'discharge_by': discharge_by,
                    'patient_sign': patient_sign
                },
                beforeSend: function() {
                    $('#loadinggif').show();
                },
                success: function(response) {
                    $('button[id="btnsave"]').prop('disabled', true);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                                didClose: () => {
                                    // location.reload();
                                    // $('#btnsave').prop('disabled', true);
                                }
                            }); Toast.fire({
                                icon: "success",
                                title: "Discharge mother record saved successfully  "
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