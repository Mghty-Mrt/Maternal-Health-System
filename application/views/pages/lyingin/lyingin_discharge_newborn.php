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
            <div id="dischargenb">
                <div class="row">

                    <!-- <a href="../doctor/newpatients"><i class="ti ti-arrow-back fs-5"></i>Back</a> -->
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Discharge Newborn</small> <br> (RECORD) </h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                        <!-- <a href="../doctor/newpatients" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a> -->
                    </div>

                    <hr class="border-5 shadow-none mb-4">

                    <input type="hidden" name="dm_id" id="dm_id" value="<?php print $discharge_mother[0]->dmid ?>">
                    <input type="hidden" name="ref_id " id="ref_id" value="<?php print $discharge_mother[0]->refer_patient_id ?>">
                    <div class="col-md-3">
                        <label class="">General Appearance</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <textarea name="general_appearance" id="general_appearance" class="form-control shadow-none" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="fw-semibold mb-2">Vital Signs:</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="fw-bold">Sucking</label>
                        </div>
                        <div class="col-md-4">
                            <label class="">Good</label>
                            <div class="input-group mb-3">
                                <input type="radio" class="form-check-input" style="padding: 12px;" id="good" name="Sucking_good" value="Good">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Poor</label>
                            <div class="input-group mb-3">
                                <input type="radio" class="form-check-input" style="padding: 12px;" id="poor" name="Sucking_poor" value="Poor">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="">Capillary Refill</label>
                            <div class="input-group mb-3">
                                <input type="text" id="cr" name="Sucking_cr" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Respiratory Rate</label>
                            <div class="input-group mb-3">
                                <input type="text" id="rr" name="Sucking_rr" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Temperature</label>
                            <div class="input-group mb-3">
                                <input type="text" id="temp" name="Sucking_temp" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="">Pentinent PE Findings:</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <textarea name="pentinent_pe_findings" id="pentinent_pe_findings" class="form-control shadow-none" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="fw-semibold mb-2">Cord:</label>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <label class="">Dry</label>
                            <div class="input-group mb-3">
                                <input type="text" id="dry" name="Cord_dry" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Bleeding</label>
                            <div class="input-group mb-3">
                                <input type="text" id="bleeding" name="Cord_bleeding" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Odorous</label>
                            <div class="input-group mb-3">
                                <input type="text" id="odorous" name="Cord_odorous" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="fw-semibold mb-2">Newborn Screening:</label>
                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <label class="">Done(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" id="done" name="Newborn_Screening_done" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Schedule(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" id="schedule" name="Newborn_Screening_schedule" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="">Referred:</label>
                            <div class="input-group mb-3">
                                <input type="text" id="referred" name="Newborn_Screening_referred" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="">Birth Certificate:</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <textarea name="birth_certificate" id="birth_certificate" class="form-control shadow-none" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="">Medications:</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <textarea name="medications" id="medications" class="form-control shadow-none" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="">Remarks:</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <textarea name="remarks" id="remarks" class="form-control shadow-none" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="">Final Diagnosis:</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <textarea name="final_diagnosis" id="final_diagnosis" class="form-control shadow-none" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="fw-semibold">Examined by:</label><br>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center align-items-center">
                            <div class="input-group mb-3">
                                <input type="text" id="Examined_by" name="Examined_by" class="form-control shadow-none signature text-center text-uppercase">
                            </div>
                            <label class="">Medical Officer:</label>
                            <br><br>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="fw-semibold">Discharge by</label><br>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto text-center align-items-center">
                            <div class="input-group mb-3">
                                <input type="text" id="Discharge_by" name="Discharge_by" class="form-control shadow-none signature text-center text-uppercase">
                            </div>
                            <label class="">Midwife</label>
                            <br><br>
                        </div>
                    </div>

                    <hr class="border-5 shadow-none mt-4">
                </div>

            </div>
            <div class="col-md-12 d-flex justify-content-end mt-3">
                <button type="button" onclick="saveDischargenb()" class="btn btn-success" id="btnsave"> Save <i class="ti ti-send"></i></button>
                <button type="button" onclick="printDischargenb()" class="btn btn-warning ms-3">Print <i class="fas fa-print"></i></button>
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

    function printDischargenb() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('dischargenb');

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
    function saveDischargenb() {
        var ref_id = $('#ref_id').val();
        var dm_id = $('#dm_id').val();
        var general_appearance = $('#general_appearance').val();
        var pentinent_pe_findings = $('#pentinent_pe_findings').val();
        var birth_certificate = $('#birth_certificate').val();
        var medications = $('#medications').val();
        var remarks = $('#remarks').val();
        var final_diagnosis = $('#final_diagnosis').val();
        var Examined_by = $('#Examined_by').val();
        var Discharge_by = $('#Discharge_by').val();

        var vital_signs_data = {};
        $('input[name^="Sucking"]:checked').each(function() {
            vital_signs_data[$(this).attr('name')] = $(this).val();
        });
        vital_signs_data['CR'] = $('#cr').val();
        vital_signs_data['RR'] = $('#rr').val();
        vital_signs_data['Temp'] = $('#temp').val();

        var cord_data = {
            'Dry': $('#dry').val(),
            'Bleeding': $('#bleeding').val(),
            'Odorous': $('#odorous').val(),
        };

        var newborn_screening_data = {
            'Done(date)': $('#done').val(),
            'Schedule(Date)': $('#schedule').val(),
            'Referred': $('#referred').val(),
        };

        // Convert data to JSON
        var vital_signs_Json = JSON.stringify(vital_signs_data);
        var cord_Json = JSON.stringify(cord_data);
        var newborn_screening_Json = JSON.stringify(newborn_screening_data);

        $.ajax({
            url: '../lyingin/savedischargenewb',
            method: 'POST',
            data: {
                'ref_id': ref_id,
                'dm_id': dm_id,
                'general_appearance': general_appearance,
                'pentinent_pe_findings': pentinent_pe_findings,
                'birth_certificate': birth_certificate,
                'medications': medications,
                'remarks': remarks,
                'final_diagnosis': final_diagnosis,
                'Examined_by': Examined_by,
                'Discharge_by': Discharge_by,
                'vital_signs_Json': vital_signs_Json,
                'cord_Json': cord_Json,
                'newborn_screening_Json': newborn_screening_Json
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
                });
                Toast.fire({
                    icon: "success",
                    title: "Discharge Newborn record saved successfully  "
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