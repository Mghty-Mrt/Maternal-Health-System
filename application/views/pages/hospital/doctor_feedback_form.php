<div class="container-fluid">
    <div class="card md-9 text-right">
        <div class="card-body">
            <!-- Referral Feedback Form -->

            <div class="d-flex justify-content-center">
                <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <small>Health Center</small> <br> Feedback Form </h5>
                <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
            </div>

            <hr class="border-5 shadow-none">

            <div class="row">
                <?php foreach ($ReferPatients as $pref) { ?>
                    <input type="hidden" name="ref_id" id="ref_id" value="<?= $pref->rpid ?>">
                    <div class="col-md-6 mt-9">
                        <label for="Receiving Hospital">Name of Receiving Hospital</label>
                        <input type="text" class="form-control shadow-none" id="Receiving_Hospital" value="<?= $pref->fname ?>" placeholder="Hospital Name">
                    </div>

                    <div class="col-md-3 mt-9">
                        <label for="Receiving Hospital">Name of Receiver</label>
                        <div class="input-group">
                            <select name="receiver" id="receiver" class="form-select">
                                <?php foreach ($facilities as $recei) { ?>
                                    <?php if ($pref->refer_from == $recei->facilities_id) { ?>
                                        <option value="<?= $recei->code ?>. <?= $recei->firstname ?> <?= $recei->middlename ?> <?= $recei->lastname ?>"> <?= $recei->code ?>. <?= $recei->firstname ?> <?= $recei->middlename ?> <?= $recei->lastname ?> </option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="feedbackto" id="feedbackto" value="<?= $recei->suid ?>">
                        </div>
                    </div>

                    <?php
                    // Decode the JSON data
                    $refData = json_decode($pref->referral_details, true);
                    ?>

                    <div class="col-md-3 mt-9   ">
                        <label for="Referral No.">Referral No.</label>
                        <input type="text" class="form-control shadow-none" id="ReferralNo" value="<?= $refData['ReferralNumber'] ?? '' ?>" placeholder="-----------"></textarea>
                    </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-9">
                    <label for="Patient's Name">Patient's Name</label>
                    <input type="text" class="form-control shadow-none" id="Patient_Name" value="<?= $pref->firstname ?> <?= $pref->middlename ?> <?= $pref->lastname ?>" placeholder="Complete Name">
                </div>

                <div class="col-md-3    ">
                    <label for="receivingPersonnel">Age</label>
                    <input type="text" class="form-control shadow-none" id="patient_age" value="<?= $pref->age ?>" placeholder="--">
                </div>

                <div class="col-md-12 mt-3 mb-4  ">
                    <label for="receivingFacility">Address</label>
                    <input type="text" class="form-control shadow-none" id="patient_address" value="<?= $refData['PatientAddress'] ?? '' ?>" placeholder="Complete Name">
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <h5 class="fw-semibold mb-4 text-right">Outcome(Please Check):</h5>
            <div class="col-md-3">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="normalspodeliv" name="outcome_normalspodeliv" value="Normal Spontaneous Delivery">
                    <label for="exampleCheck1">Normal Spontaneous Delivery</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="bloodtransfu" name="outcome_bloodtransfu" value="Blood Transfusion">
                    <label for="exampleCheck1">Blood Transfusion</label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="ceasarean" name="outcome_ceasarean" value="Ceasarean Section">
                    <label for="exampleCheck1">Ceasarean Section</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="dc" name="outcome_dc" value="D & C">
                    <label for="exampleCheck1">D & C</label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="forcedeliv" name="outcome_forcedeliv" value="Forcep Delivery">
                    <label for="exampleCheck1">Forcep Delivery</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="others" name="others">
                    <label for="exampleCheck1">Others (Specify):</label>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control shadow-none" id="others" name="outcome_others">
            </div>

            <div class="col-md-12 mb-4  ">
                <label for="response">Final Diagnosis</label>
                <textarea rows="4" class="form-control shadow-none" id="final_diag" placeholder="Response"></textarea>
            </div>

            <div class="col-md-12 mb-4  ">
                <label for="response">Recommendations</label>
                <textarea rows="4" class="form-control shadow-none" id="recommendations" placeholder="Response"></textarea>
            </div>

            <hr class="border-5 shadow-none">

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <!-- <a href="../doctor/itr" class="btn btn-danger me-3"><i class="ti ti-arrow-back-up"></i> Cancel</a> -->
                <button type="button" onclick="submitReferFeedback()" class="btn btn-success">Send <i class="ti ti-send"></i></button>
            </div>

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
    function submitReferFeedback() {
        var ref_id = $('#ref_id').val();
        var feedbackto = $('#feedbackto').val();
        var final_diagnos = $('#final_diag').val();
        var recommendations = $('#recommendations').val();

        var personal_data = {
            'Receiving_Hospital': $('#Receiving_Hospital').val(),
            'Receiver': $('#receiver').val(),
            'ReferralNo': $('#ReferralNo').val(),
            'Patient_Name': $('#Patient_Name').val(),
            'Patient_Age': $('#patient_age').val(),
            'Patient_Address': $('#patient_address').val(),
        };

        var outcome_data = {};
        $('input[name^="outcome"]:checked').each(function() {
            outcome_data[$(this).attr('name')] = $(this).val();
        });
        outcome_data['Others'] = $('#Others').val();

        // Convert data to JSON
        var personal_data_Json = JSON.stringify(personal_data);
        var outcome_Json = JSON.stringify(outcome_data);

        // alert(personal_data_Json);

        $.ajax({
            url: '../hospital/referfeedback',
            method: 'POST',
            data: {
                'ref_id': ref_id,
                'feedbackto': feedbackto,
                'final_diagnos': final_diagnos,
                'recommendations': recommendations,
                'personal_data_Json': personal_data_Json,
                'outcome_Json': outcome_Json
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[type="button"]').prop('disabled', true);
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
                        window.location.href = "../hospital/referList";
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Feedback sent successfully  "
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