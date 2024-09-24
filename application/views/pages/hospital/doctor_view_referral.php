<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Referral Form -->
            <div id="referralform">
                <div class="d-flex justify-content-center">
                    <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                    <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <small>Health Center</small> <br> Maternal Referral Form </h5>
                    <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                </div>

                <hr class="border-5 shadow-none">

                <div class="row">
                    <?php foreach ($ReferPatients as $refFa) { ?>
                        <?php $ref_details = json_decode($refFa->referral_details, true) ?>
                        <input type="hidden" id="to" value="">
                        <div class="col-md-6 mt-3">
                            <label for="to" class="">To</label>
                            <input type="text" value="<?= $recifaciity[0]->name ?>" class="form-control shadow-none" id="to" name="to">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="dateOfReferral" class="">Date/Time Referral Initiated</label>
                            <input type="datetime-local" class="form-control shadow-none" id="dateOfReferral" name="dateOfReferral" value="<?= $ref_details['Date/TimeReferral'] ?? '' ?>">
                        </div>

                        <input type="hidden" id="from" value="">
                        <div class="col-md-6 mt-3">
                            <label for="to" class="">From</label>
                            <input type="text" class="form-control shadow-none" id="from" name="from" value="<?= $refFa->fname ?>">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="refnum" class="">Referral Number</label>
                            <input type="text" class="form-control shadow-none" id="refnum" name="refnum" value=" <?= $ref_details['ReferralNumber'] ?? '' ?> ">
                        </div>

                        <div class="col-md-6 d-flex justify-content-center mt-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="mrfpublic" name="pub_priv_mrfpublic" value="Public" <?= in_array('Public', $ref_details) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleCheck1">Public</label>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center mt-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="mrfprivate" name="pub_priv_mrfprivate" value="Private" <?= in_array('Private', $ref_details) ? 'checked' : '' ?>>
                                <label class="form-check-label " for="exampleCheck1">Private</label>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="contactnum" class="">Contact Number</label>
                            <input type="text" class="form-control shadow-none" id="contactnum" name="contactnum" value="<?= $ref_details['ContactNo.'] ?? '' ?>">
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="phmember" class="">Philhealth/Member Dependent:</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" class="form-check-input" id="phmember" name="Philhealth_phmember" value="Yes" <?= in_array('Yes', $ref_details) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="exampleCheck1">Yes</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" class="form-check-input" id="phmember" name="Philhealth_phmember" value="No" <?= in_array('No', $ref_details) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3 mb-3">
                            <label for="address" class="">Address</label>
                            <input type="text" class="form-control shadow-none" id="address" name="address" value=" <?= $ref_details['Address'] ?? '' ?> ">
                        </div>

                        <input type="hidden" name="patient_id" id="patient_id" value="">
                        <div class="col-md-5 mb-4">
                            <label for="pname" class="">Patient's Name</label>
                            <input type="text" class="form-control shadow-none" id="pname" name="pname" value=" <?= $ref_details['PatientName'] ?? '' ?> ">
                        </div>

                        <div class="col-md-1">
                            <label for="receivingPersonnel" class="">Age</label>
                            <input type="text" class="form-control shadow-none" id="page" name="page" value="<?= $ref_details['PatientAge'] ?? '' ?>">
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="">Address</label>
                            <input type="text" class="form-control shadow-none" id="pataddress" name="pataddress" value=" <?= $ref_details['PatientAddress'] ?? '' ?> ">
                        </div>

                        <div class="col-md-6">
                            <label for="patcontactperson" class="">Contact Person</label>
                            <input type="text" class="form-control shadow-none" id="patcontactperson" name="patcontactperson" value="<?= $ref_details['PatientContactPerson'] ?? '' ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="patcontactnumber" class="">Contact Number</label>
                            <input type="text" class="form-control shadow-none" id="patcontactnumber" name="patcontactnumber" value="<?= $ref_details['PatientContactNo.'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3 mt-3">
                            <label for="obscore" class="">OB Score</label>
                            <input type="text" class="form-control shadow-none" id="obscore" name="obscore" value="<?= $ref_details['ObScore'] ?? '' ?>">
                        </div>

                        <div class="col-md-2 mt-3">
                            <label for="gestational_age" class="">Gestational Age</label>
                            <input type="text" class="form-control shadow-none" id="gestational_age" name="gestational_age" value="<?= $ref_details['GestationalAge'] ?? '' ?>">
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label for="with_prenatal" class="">With Prenatal:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-input" id="yes" name="with_prental_yes" value="Yes" <?= in_array('Yes', $ref_details) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="yes">Yes</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" class="form-check-input" id="no" name="with_prental_no" value="No" <?= in_array('No', $ref_details) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="no">No</label>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-0 mb-4">
                            <label for="address" class="">Where</label>
                            <input type="text" class="form-control shadow-none" id="where" name="where" value="<?= $ref_details['Where'] ?? '' ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="brief_history" class="">Brief History</label>
                            <textarea rows="4" class="form-control shadow-none" id="brief_history" name="brief_history" placeholder="Response"><?= $ref_details['BriefHistory'] ?? '' ?></textarea>
                        </div>

                        <?php $danger_sign = json_decode($refFa->danger_sign, true) ?>

                        <label class="fw-bolder">Danger Signs: (Check the boxes all that Apply)</label>
                        <div class="col-md-12 mt-8 mb-3">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="unconcious" name="danger_sign_unconcious" value="Unconcious(does not answer)" <?= in_array('Unconcious(does not answer)', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Unconcious(does not answer)</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="consulvsing" name="danger_sign_consulvsing" value="Convulsing" <?= in_array('Convulsing', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Convulsing</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="vaginalbleeding" name="danger_sign_vaginalbleeding" value="Vaginal Bleeding" <?= in_array('Vaginal Bleeding', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Vaginal Bleeding</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="fever" name="fever" value="danger_sign_Fever" <?= in_array('danger_sign_Fever', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Fever</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="severeadbominalpain" name="danger_sign_severeadbominalpain" value="Severe Abdominal Pain" <?= in_array('Severe Abdominal Pain', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Severe Abdominal Pain</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="severvomiting" name="danger_sign_severvomiting" value="Severe Vomiting" <?= in_array('Severe Vomiting', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Severe Vomiting</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="veryill" name="danger_sign_veryill" value="Looks Very ill" <?= in_array('Looks Very ill', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Looks Very ill</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="headache" name="danger_sign_headache" value="Headache" <?= in_array('Headache', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Headache</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="dbreathing" name="danger_sign_dbreathing" value="Severe Diffuculty of Breathing" <?= in_array('Severe Diffuculty of Breathing', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Severe Diffuculty of Breathing</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="vdisturbance" name="danger_sign_vdisturbance" value="Severe Visual Disturbance" <?= in_array('Severe Visual Disturbance', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Severe Visual Disturbance</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="prelabor" name="danger_sign_prelabor" value="Preterm Labor" <?= in_array('Preterm Labor', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Preterm Labor</label>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <input type="checkbox" class="form-check-input" id="prom" name="danger_sign_prom" value="Prom" <?= in_array('Prom', $danger_sign) ? 'checked' : '' ?>>
                                    <label class="form-check-label " for="exampleCheck1">Prom</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 text-right">
                            <label>PE Findings:</label>
                            <textarea name="pefind" id="pefind" cols="30" rows="4" class="form-control shadow-none"><?= $ref_details['PEFindings'] ?? '' ?></textarea>

                            <div class="col-md-12 mt-3 mb-0">
                                <label class="fw-bolder">Vital Signs:</label>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-3 mb-3">
                                    <label for="bp" class="">Blood Pressure</label>
                                    <input type="text" class="form-control shadow-none" id="bp" name="bp" value="<?= $ref_details['BP'] ?? '' ?>">
                                </div>

                                <div class="col-md-3">
                                    <label for="pr" class="">Pulse Rate</label>
                                    <input type="text" class="form-control shadow-none" id="pr" name="pr" value="<?= $ref_details['PR'] ?? '' ?>">
                                </div>

                                <div class="col-md-3 mt-0">
                                    <label for="rr" class="">Respiratory Rate</label>
                                    <input type="text" class="form-control shadow-none" id="rr" name="rr"><?= $ref_details['RR'] ?? '' ?></textarea>
                                </div>

                                <div class="col-md-3 mt-0">
                                    <label for="t" class="">T</label>
                                    <input type="text" class="form-control shadow-none" id="t" name="t" value="<?= $ref_details['T'] ?? '' ?>">
                                </div>

                                <div class="col-md-4 mt-0">
                                    <label for="funheight" class="">Fundic Height</label>
                                    <input type="text" class="form-control shadow-none" id="funheight" name="funheight" value="<?= $ref_details['FundicHeight'] ?? '' ?>">
                                </div>

                                <div class="col-md-4 mt-0">
                                    <label for="fetheart" class="">Fetal Hearttone</label>
                                    <input type="text" class="form-control shadow-none" id="fetheart" name="fetheart" value="<?= $ref_details['FetalHearttone'] ?? '' ?>">
                                </div>

                                <div class="col-md-4 mt-0">
                                    <label for="internalexam" class="">Internal Examination</label>
                                    <input type="text" class="form-control shadow-none" id="internalexam" name="internalexam" value=" <?= $ref_details['InternalExam'] ?? '' ?> ">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="response" class="">Laboratory Work-Up and Results</label>
                            <textarea rows="4" class="form-control shadow-none" id="response" placeholder="Response"><?= $ref_details['LabResults'] ?? '' ?></textarea>
                        </div>

                        <label class="fw-bolder mb-2">Medications/Interventions:</label>
                        <div class="col-md-3 mb-3 mb-3">
                            <label for="methergin" class="">Methergin</label>
                            <input type="text" class="form-control shadow-none" id="methergin" name="methergin" value=" <?= $ref_details['Methergin'] ?? '' ?> ">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="im" class="">IM</label>
                            <input type="text" class="form-control shadow-none" id="im" name="im" value=" <?= $ref_details['IM'] ?? '' ?> ">
                        </div>

                        <div class="col-md-3 mb-3 mt-0">
                            <label for="i4" class="">I4</label>
                            <input type="text" class="form-control shadow-none" id="i4" name="i4" value=" <?= $ref_details['I4'] ?? '' ?> ">
                        </div>

                        <div class="col-md-3 mb-3 mt-0">
                            <label for="oral" class="">Oral</label>
                            <input type="text" class="form-control shadow-none" id="oral" name="oral" value=" <?= $ref_details['Oral'] ?? '' ?> ">
                        </div>


                        <div class="col-md-3 mb-3">
                            <label for="timeCalled" class="">Time Given</label>
                            <input type="time" class="form-control shadow-none" id="timeCalled" name="timeCalled" value="<?= $ref_details['TimeGiven'] ?? '' ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="oxytocin" class="">Oxytocin</label>
                            <input type="text" class="form-control shadow-none" id="oxytocin" name="oxytocin" value=" <?= $ref_details['Oxytocin'] ?? '' ?> ">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="anthype" class="">Anti-Hypertensives</label>
                            <input type="text" class="form-control shadow-none" id="anthype" name="anthype" value=" <?= $ref_details['AntiHypertensives'] ?? '' ?> ">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="nifedipine" class="">Nifedipine</label>
                            <input type="text" class="form-control shadow-none" id="nifedipine" name="nifedipine" value=" <?= $ref_details['Nifedipine'] ?? '' ?> ">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="hydralazine" class="">Hydralazine</label>
                            <input type="text" class="form-control shadow-none" id="hydralazine" name="hydralazine" value=" <?= $ref_details['Hydralazine'] ?? '' ?> ">
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="others_specify" class="">Others(Specify)</label>
                            <input type="text" class="form-control shadow-none" id="others_specify" name="others_specify" value=" <?= $ref_details['OthersSpecify'] ?? '' ?> ">
                        </div>

                        <div class="col-md-6 mt-0 mb-3">
                            <label for="impression" class="">Impression</label>
                            <input type="text" class="form-control shadow-none" id="impression" name="impression" value=" <?= $ref_details['Impression'] ?? '' ?> ">
                        </div>
                        <div class="col-md-6 mt-0 mb-3">
                            <label for="rfr" class="">Reason for Referral</label>
                            <input type="text" class="form-control shadow-none" id="rfr" name="rfr" value=" <?= $ref_details['ReasonRefferal'] ?? '' ?> ">
                        </div>

                        <div class="col-md-6 mt-0 mb-3">
                            <label for="refphymid" class="">Name of Referring Physician/Midwife</label>
                            <input type="text" class="form-control shadow-none" id="refphymid" name="refphymid" value=" <?= $ref_details['NameRefPhysicianMidwife'] ?? '' ?> ">
                        </div>
                        <div class="col-md-6 mt-0 mb-3">
                            <label for="refphymidnum" class="">Contact Number</label>
                            <input type="text" class="form-control shadow-none" id="refphymidnum" name="refphymidnum" value=" <?= $ref_details['ContactRefPhysicianMidwife'] ?? '' ?> ">
                        </div>

                        <div class="col-md-6 mt-0 mb-3">
                            <label for="recephysician" class="">Name of Receiving Physician</label>
                            <input type="text" class="form-control shadow-none" id="recephysician" name="recephysician" value=" <?= $ref_details['NameReceivePhysician'] ?? '' ?> ">
                        </div>
                        <div class="col-md-6 mt-0 mb-3">
                            <label for="recephysiciannum" class="">Contact Number</label>
                            <input type="text" class="form-control shadow-none" id="addrecephysiciannumress" name="recephysiciannum" value=" <?= $ref_details['ContactReceivePhysician'] ?? '' ?> ">
                        </div>

                        <hr class="border-5 shadow-none mb-4 mt-4">
                </div>
            </div>
        <?php } ?>

        <div class="col-md-12 d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-danger printrefform me-2" onclick=generatePdf()>PDF <i class="ti ti-download"></i></button>
            <button type="button" class="btn btn-warning printrefform ms-2" onclick=printPdf()>Print <i class="ti ti-printer"></i></button>
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
    function printPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('referralform');

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
    window.jsPDF = window.jspdf.jsPDF;

    function generatePdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('referralform');

        html2canvas(htmlElement, {
            allowTaint: true,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var pdfWidth = jsPdf.internal.pageSize.getWidth();
            var pdfHeight = jsPdf.internal.pageSize.getHeight();

            var imgWidth = pdfWidth - 65; // margin
            var imgHeight = (canvas.height * imgWidth) / canvas.width;

            if (imgHeight > pdfHeight) {
                imgHeight = pdfHeight - 65; // margin
                imgWidth = (canvas.width * imgHeight) / canvas.height;
            }

            var leftMargin = 30; // left margin
            var topMargin = 30; // top margin

            jsPdf.addImage(imgData, 'PNG', leftMargin, topMargin, pdfWidth - 60, imgHeight);
            jsPdf.save("Referral_form.pdf");
            window.open(jsPdf.output('bloburl'));
        });

    }
</script>