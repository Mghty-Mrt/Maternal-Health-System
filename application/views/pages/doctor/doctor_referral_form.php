<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Referral Form -->
            <div id="referralform">
                <form id="referal">
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                        <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <small>Health Center</small> <br> Maternal Referral Form </h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                    </div>

                    <hr class="border-5 shadow-none">

                    <div class="row">
                        <?php foreach ($getreferringfacility as $refFa) { ?>
                            <input type="hidden" id="to" value="<?= $refFa->id ?>">
                            <input type="hidden" id="f_type" name="f_type" value="<?= $refFa->facility_type_id ?>">
                            <input type="hidden" id="case_id" name="case_id" value="<?php print $case_id ?>">
                            <div class="col-md-6 mt-3">
                                <label for="to" class="">To</label>
                                <input type="text" value="<?= $refFa->name ?>" class="form-control shadow-none" id="to" name="to">
                            </div>
                        <?php } ?>

                        <div class="col-md-6 mt-3">
                            <label for="dateOfReferral" class="">Date/Time Referral Initiated</label>
                            <input type="datetime-local" class="form-control shadow-none" id="dateOfReferral" name="dateOfReferral">
                        </div>

                        <?php foreach ($fromfacility as $from) { ?>
                            <input type="hidden" id="from" value="<?= $from->id ?>">
                            <div class="col-md-6 mt-3">
                                <label for="to" class="">From</label>
                                <input type="text" class="form-control shadow-none" id="from" name="from" value="<?= $from->name ?>">
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="refnum" class="">Referral Number</label>
                                <input type="number" class="form-control shadow-none" id="refnum" name="refnum" value="<?= $refnumber ?>">
                            </div>

                            <div class="col-md-6 d-flex justify-content-center mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="mrfpublic" name="pub_priv_mrfpublic" value="Public">
                                    <label class="form-check-label" for="exampleCheck1">Public</label>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex justify-content-center mt-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="mrfprivate" name="pub_priv_mrfprivate" value="Private">
                                    <label class="form-check-label " for="exampleCheck1">Private</label>
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="contactnum" class="">Contact Number</label>
                                <input type="number" class="form-control shadow-none" id="contactnum" name="contactnum">
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <label for="phmember" class="">Philhealth/Member Dependent:</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" class="form-check-input" id="phmember" name="Philhealth_phmember" value="Yes">
                                        <label class="form-check-label" for="exampleCheck1">Yes</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" class="form-check-input" id="phmember" name="Philhealth_phmember" value="No">
                                        <label class="form-check-label " for="exampleCheck1">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3 mb-3">
                                <label for="address" class="">Address</label>
                                <input type="text" value="<?= $from->address ?>" class="form-control shadow-none" id="address" name="address">
                            </div>
                        <?php } ?>

                        <?php foreach ($refer_patiner_info as $rpi) { ?>
                            <input type="hidden" name="patient_id" id="patient_id" value="<?= $rpi->preid ?>">
                            <div class="col-md-5 mb-4">
                                <label for="pname" class="">Patient's Name</label>
                                <input type="text" class="form-control shadow-none" id="pname" name="pname" value="<?= $rpi->firstname ?> <?= $rpi->middlename ?> <?= $rpi->lastname ?>">
                            </div>

                            <div class="col-md-1">
                                <label for="receivingPersonnel" class="">Age</label>
                                <input type="text" class="form-control shadow-none" id="page" name="page" value="<?= $rpi->age ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="address" class="">Address</label>
                                <input type="text" class="form-control shadow-none" id="pataddress" name="pataddress" value="<?= $rpi->street ?> <?= $rpi->fname ?> <?= $rpi->city ?>">
                            </div>

                            <?php $cper = json_decode($rpi->husband_data, true); ?>
                            <div class="col-md-6">
                                <label for="patcontactperson" class="">Contact Person</label>
                                <input type="text" class="form-control shadow-none" id="patcontactperson" name="patcontactperson" value="<?= $cper['hname'] ?? '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="patcontactnumber" class="">Contact Number</label>
                                <input type="text" class="form-control shadow-none" id="patcontactnumber" name="patcontactnumber" value="<?= $rpi->mobileno ?>">
                            </div>
                        <?php } ?>

                        <div class="col-md-4 mb-3 mt-3">
                            <label for="obscore" class="">Obstetrics Score </label>
                            <input type="text" class="form-control shadow-none" id="obscore" name="obscore">
                        </div>

                        <div class="col-md-2 mt-3">
                            <label for="gestational_age" class="">Gestational Age</label>
                            <input type="text" class="form-control shadow-none" id="gestational_age" name="gestational_age">
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label for="with_prenatal" class="">With Prenatal:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-input" id="yes" name="with_prental_yes" value="Yes">
                                    <label class="form-check-label " for="yes">Yes</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-input" id="no" name="with_prental_no" value="No">
                                    <label class="form-check-label " for="no">No</label>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-0 mb-4">
                            <label for="address" class="">Where</label>
                            <input type="text" class="form-control shadow-none" id="where" name="where"></textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="brief_history" class="">Brief History</label>
                            <textarea rows="4" class="form-control shadow-none" id="brief_history" name="brief_history" placeholder="Response"></textarea>
                        </div>

                        <label class="fw-bolder">Danger Signs: (Check the boxes all that Apply)</label>
                        <div class="col-md-12 mt-8 mb-3">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="unconcious" name="danger_sign_unconcious" value="Unconcious(does not answer)">
                                    <label class="form-check-label " for="exampleCheck1">Unconcious(does not answer)</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="consulvsing" name="danger_sign_consulvsing" value="Convulsing">
                                    <label class="form-check-label " for="exampleCheck1">Convulsing</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="vaginalbleeding" name="danger_sign_vaginalbleeding" value="Vaginal Bleeding">
                                    <label class="form-check-label " for="exampleCheck1">Vaginal Bleeding</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="fever" name="fever" value="danger_sign_Fever">
                                    <label class="form-check-label " for="exampleCheck1">Fever</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="severeadbominalpain" name="danger_sign_severeadbominalpain" value="Severe Abdominal Pain">
                                    <label class="form-check-label " for="exampleCheck1">Severe Abdominal Pain</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="severvomiting" name="danger_sign_severvomiting" value="Severe Vomiting">
                                    <label class="form-check-label " for="exampleCheck1">Severe Vomiting</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="veryill" name="danger_sign_veryill" value="Looks Very ill">
                                    <label class="form-check-label " for="exampleCheck1">Looks Very ill</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="headache" name="danger_sign_headache" value="Headache">
                                    <label class="form-check-label " for="exampleCheck1">Headache</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="dbreathing" name="danger_sign_dbreathing" value="Severe Diffuculty of Breathing">
                                    <label class="form-check-label " for="exampleCheck1">Severe Diffuculty of Breathing</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="vdisturbance" name="danger_sign_vdisturbance" value="Severe Visual Disturbance">
                                    <label class="form-check-label " for="exampleCheck1">Severe Visual Disturbance</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="prelabor" name="danger_sign_prelabor" value="Preterm Labor">
                                    <label class="form-check-label " for="exampleCheck1">Preterm Labor</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="prom" name="danger_sign_prom" value="Prom">
                                    <label class="form-check-label " for="exampleCheck1">Prom</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 text-right">
                            <label>PE Findings:</label>
                            <textarea name="pefind" id="pefind" cols="30" rows="4" class="form-control shadow-none"></textarea>

                            <div class="col-md-12 mt-3 mb-0">
                                <label class="fw-bolder">Vital Signs:</label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3 mb-3">
                                    <label for="bp" class="">Blood Pressure</label>
                                    <input type="text" class="form-control shadow-none" id="bp" name="bp">
                                </div>

                                <div class="col-md-3">
                                    <label for="pr" class="">Pulse Rate</label>
                                    <input type="text" class="form-control shadow-none" id="pr" name="pr">
                                </div>

                                <div class="col-md-3 mt-0">
                                    <label for="rr" class="">Respiratory Rate</label>
                                    <input type="text" class="form-control shadow-none" id="rr" name="rr"></textarea>
                                </div>

                                <div class="col-md-3 mt-0">
                                    <label for="t" class="">Temperature</label>
                                    <input type="text" class="form-control shadow-none" id="t" name="t">
                                </div>

                                <div class="col-md-4 mt-0">
                                    <label for="funheight" class="">Fundal Height</label>
                                    <input type="text" class="form-control shadow-none" id="funheight" name="funheight">
                                </div>

                                <div class="col-md-4 mt-0">
                                    <label for="fetheart" class="">Fetal Heart Tone</label>
                                    <input type="text" class="form-control shadow-none" id="fetheart" name="fetheart">
                                </div>

                                <div class="col-md-4 mt-0">
                                    <label for="internalexam" class="">Internal Examination</label>
                                    <input type="text" class="form-control shadow-none" id="internalexam" name="internalexam">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="response" class="">Laboratory Work-Up and Results</label>
                            <textarea rows="4" class="form-control shadow-none" id="response" placeholder="Response"></textarea>
                        </div>

                        <label class="fw-bolder mb-2">Medications/Interventions:</label>
                        <div class="col-md-3 mb-3 mb-3">
                            <label for="methergin" class="">Methergin</label>
                            <input type="text" class="form-control shadow-none" id="methergin" name="methergin">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="im" class="">Intramuscular injection</label>
                            <input type="text" class="form-control shadow-none" id="im" name="im">
                        </div>

                        <div class="col-md-3 mb-3 mt-0">
                            <label for="i4" class="">I4</label>
                            <input type="text" class="form-control shadow-none" id="i4" name="i4"></textarea>
                        </div>

                        <div class="col-md-3 mb-3 mt-0">
                            <label for="oral" class="">Oral</label>
                            <input type="text" class="form-control shadow-none" id="oral" name="oral">
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="timeCalled" class="">Time Given</label>
                            <input type="time" class="form-control shadow-none" id="timeCalled" name="timeCalled">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="oxytocin" class="">Oxytocin</label>
                            <input type="text" class="form-control shadow-none" id="oxytocin" name="oxytocin">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="anthype" class="">Anti-Hypertensives</label>
                            <input type="text" class="form-control shadow-none" id="anthype" name="anthype">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="nifedipine" class="">Nifedipine</label>
                            <input type="text" class="form-control shadow-none" id="nifedipine" name="nifedipine">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="hydralazine" class="">Hydralazine</label>
                            <input type="text" class="form-control shadow-none" id="hydralazine" name="hydralazine">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="others_specify" class="">Others(Specify)</label>
                            <input type="text" class="form-control shadow-none" id="others_specify" name="others_specify">
                        </div>

                        <div class="col-md-6 mt-0 mb-3">
                            <label for="impression" class="">Impression</label>
                            <input type="text" class="form-control shadow-none" id="impression" name="impression">
                        </div>
                        <div class="col-md-6 mt-0 mb-3">
                            <label for="rfr" class="">Reason for Referral</label>
                            <input type="text" class="form-control shadow-none" id="rfr" name="rfr">
                        </div>

                        <div class="col-md-6 mt-0 mb-3">
                            <label for="refphymid" class="">Name of Referring Physician/Midwife</label>
                            <input type="text" class="form-control shadow-none" id="refphymid" name="refphymid">
                        </div>
                        <div class="col-md-6 mt-0 mb-3">
                            <label for="refphymidnum" class="">Contact Number</label>
                            <input type="text" class="form-control shadow-none" id="refphymidnum" name="refphymidnum">
                        </div>

                        <div class="col-md-6 mt-0 mb-3">
                            <label for="recephysician" class="">Name of Receiving Physician</label>
                            <input type="text" class="form-control shadow-none" id="recephysician" name="recephysician">
                        </div>
                        <div class="col-md-6 mt-0 mb-3">
                            <label for="recephysiciannum" class="">Contact Number</label>
                            <input type="text" class="form-control shadow-none" id="addrecephysiciannumress" name="recephysiciannum">
                        </div>

                        <hr class="border-5 shadow-none mb-4 mt-4">
                </form>
            </div>
        </div>

        <div class="col-md-12 d-flex justify-content-end mt-3">
            <!-- <a href="../doctor/today" class="btn btn-danger me-3"><i class="ti ti-arrow-back-up"></i> Cancel</a> -->
            <button type="button" onclick="submitReferral()" class="btn btn-success submitref">Send <i class="ti ti-send"></i></button>
            <button type="button" class="btn btn-warning printrefform" onclick="printPdf()" style="display: none;">Print <i class="fas fa-print"></i></button>
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
    function submitReferral() {
        var patient_id = $('#patient_id').val();
        var from = $('#from').val();
        var to = $('#to').val();
        var f_type = $('#f_type').val();
        var case_id = $('#case_id').val();

        var referral_details = {
            'Date/TimeReferral': $('#dateOfReferral').val(),
            'ReferralNumber': $('#refnum').val(),
            'ContactNo.': $('#contactnum').val(),
            'Address': $('#address').val(),
            'PatientName': $('#pname').val(),
            'PatientAge': $('#page').val(),
            'PatientAddress': $('#pataddress').val(),
            'PatientContactPerson': $('#patcontactperson').val(),
            'PatientContactNo.': $('#patcontactnumber').val(),
            'ObScore': $('#obscore').val(),
            'GestationalAge': $('#gestational_age').val(),
            'Where': $('#where').val(),
            'BriefHistory': $('#brief_history').val(),
            'PEFindings': $('#pefind').val(),
            'BP': $('#bp').val(),
            'PR': $('#pr').val(),
            'RR': $('#rr').val(),
            'T': $('#t').val(),
            'FundicHeight': $('#funheight').val(),
            'FetalHearttone': $('#fetheart').val(),
            'InternalExam': $('#internalexam').val(),
            'LabResults': $('#response').val(),
            'Methergin': $('#methergin').val(),
            'IM': $('#im').val(),
            'I4': $('#i4').val(),
            'Oral': $('#oral').val(),
            'TimeGiven': $('#timeCalled').val(),
            'Oxytocin': $('#oxytocin').val(),
            'AntiHypertensives': $('#anthype').val(),
            'Nifedipine': $('#nifedipine').val(),
            'Hydralazine': $('#hydralazine').val(),
            'OthersSpecify': $('#others_specify').val(),
            'Impression': $('#impression').val(),
            'ReasonRefferal': $('#rfr').val(),
            'NameRefPhysicianMidwife': $('#refphymid').val(),
            'ContactRefPhysicianMidwife': $('#refphymidnum').val(),
            'NameReceivePhysician': $('#recephysician').val(),
            'ContactReceivePhysician': $('#addrecephysiciannumress').val(),
        };

        // Add additional properties based on the other objects
        $('input[name^="pub_priv"]:checked').each(function() {
            referral_details[$(this).attr('name')] = $(this).val();
        });

        $('input[name^="Philhealth"]:checked').each(function() {
            referral_details[$(this).attr('name')] = $(this).val();
        });

        $('input[name^="with_prenatal"]:checked').each(function() {
            referral_details[$(this).attr('name')] = $(this).val();
        });

        var referral_details_Json = JSON.stringify(referral_details);

        var danger_sign = {};
        $('input[name^="danger_sign"]:checked').each(function() {
            danger_sign[$(this).attr('name')] = $(this).val();
        });

        var referral_details_Json = JSON.stringify(referral_details);
        var danger_sign_Json = JSON.stringify(danger_sign);

        //alert(counseling_Json);

        $.ajax({
            url: '../doctor/sendReferral',
            method: 'POST',
            data: {
                'patient_id': patient_id,
                'f_type': f_type,
                'case_id': case_id,
                'from': from,
                'to': to,
                'referral_details_Json': referral_details_Json,
                'danger_sign_Json': danger_sign_Json
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                // $('button[type="button"]').prop('disabled', true);
                $('.printrefform').show();
                $('.submitref').hide();

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
                        // window.location.href = "../doctor/today";
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Referral Sent successfully  "
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
    window.jsPDF = window.jspdf.jsPDF;

    function printPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('referal');

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