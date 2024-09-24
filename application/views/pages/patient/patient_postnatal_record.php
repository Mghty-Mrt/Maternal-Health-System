<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <!-- <a href="../doctor/newpatients"><i class="ti ti-arrow-back fs-5"></i>Back</a> -->
            <div class="d-flex justify-content-center">
                <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Post Natal Record</small> <br> (POSTNATAL) </h5>
                <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                <!-- <a href="../doctor/newpatients" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a> -->
            </div>

            <hr class="border-5 shadow-none mb-4">

            <div id="positiveSection">

                <input type="hidden" name="id" id="id" value="">
                <div class="row">
                    <?php foreach ($PostnatalRecords as $postrec) { ?>

                            <?php
                            // Decode the JSON data
                            $patientinfo = json_decode($postrec->patient_info, true);
                            ?>

                        <input type="hidden" name="ppreid" id="ppreid" value="">
                        <input type="hidden" name="access_code_id" id="access_code_id" value="<?= $postrec->access_code_id ?>">
                        <div class="col-md-8">
                            <label for="pname">Patient's Name</label>
                            <div class="input-group mb-3">
                                <input type="text" name="pname" id="pname" class="form-control shadow-none" value="<?= $patientinfo['Patient_Name'] ?? '' ?>" >

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="age">Age</label>
                            <div class="input-group mb-3">
                                <input type="number" name="page" id="page" class="form-control shadow-none" value="<?= $patientinfo['Patient_Age'] ?? '' ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="findings">Address</label>
                            <div class="input-group mb-3">
                                <input type="text" name="paddress" id="paddress" class="form-control shadow-none" value="<?= $patientinfo['Patient_Address'] ?? '' ?>">
                            </div>
                        </div>
                </div>
           
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4 bg-light">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class=" mb-0 text-center fw-semibold">DOCTOR'S ORDER</h6>
                            </th>

                            <?php
                            // Decode the JSON data
                            $note = json_decode($postrec->notes, true);
                            ?>

                            <th class="border-bottom-0">
                                <h6 class=" mb-0 text-center fw-semibold">MIDWIVE'S NOTES</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- DOCTOR'S NOTES INPUT-->
                            <td>

                                <textarea name="dr_order" id="dr_order" cols="500" rows="60" class="form-control shadow-none"> <?= $postrec->dr_order ?> </textarea>

                            </td>
                            <!-- MIDWIVE'S NOTES INPUT-->
                            <td>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label>Temperature</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="temp" name="temp" class="form-control shadow-none" value="<?= $note['Patient_Temperature'] ?? '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Blood Pressure</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="bp" name="bp" class="form-control shadow-none" value="<?= $note['Patient_BloodPressure'] ?? '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Weight</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="weight" name="weight" class="form-control shadow-none" value="<?= $note['Patient_Weight'] ?? '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Type of Delivery</label><br>
                                        <div class="input-group mb-3">
                                            <select class="form-select mr-sm-2 form-control shadow-none" name="typeofdelivery" id="typeofdelivery">
                                                <option selected><?= $note['Patient_Type_of_Delivery'] ?? '' ?></1</option>
                                                <option value="2">2</option>
                                                <option value="1">3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="">Date of Delivery</label>
                                        <div class="input-group mb-3">
                                            <input type="date" name="datedelivery" id="datedelivery" class="form-control shadow-none"  value="<?= $note['Patient_Date_of_Delivery'] ?? '' ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Place of Delivery</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="placedel" name="placedel" class="form-control shadow-none"  value="<?= $note['Patient_Place_of_Delivery'] ?? '' ?>" >
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <label>Outcome</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="outcome" name="outcome" class="form-control shadow-none"  value="<?= $note['Patient_Outcome'] ?? '' ?>" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Sex</label><br>
                                        <div class="input-group mb-3">
                                            <select class="form-select mr-sm-2 form-control shadow-none" name="sex" id="sex" >
                                                <option selected><?= $note['Patient_Sex']??'' ?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Baby's Weight</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="babyweight" name="babyweight" class="form-control shadow-none"  value="<?= $note['Patient_Baby_Weight'] ?? '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Attended by</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="attendby" name="attendby" class="form-control shadow-none"  value="<?= $note['Patient_Attend_by'] ?? '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="BF">Breast Feeding</label><br>
                                        <div class="input-group mb-3">
                                            <select class="form-select mr-sm-2 form-control shadow-none" name="breastf" id="breastf" >
                                                <option selected><?= $note['Patient_Breast_Feeding']??'' ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Intention to used Family Planning Method:</label><br>
                                        <div class="input-group mb-3">
                                            <select class="form-select mr-sm-2 form-control shadow-none" name="intention" id="intention">
                                                <option selected><?= $note['Patient_Intention_FP_Method']??'' ?></option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Family Planning Method</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="fpmethod" name="fpmethod" class="form-control shadow-none"  value="<?= $note['Patient_FP_Method'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Vacuum Extraction Supplementation</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="vacsupp" name="vacsupp" class="form-control shadow-none"  value="<?= $note['Patient_Vac_Supplementation'] ?? '' ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Ferrous Sulfate Supplementation</label><br>
                                        <div class="input-group mb-3">
                                            <input type="text" id="fessupp" name="fessupp" class="form-control shadow-none" value="<?= $note['Patient_Feso4_Supplemenation'] ?? '' ?>">
                                        </div>
                                    </div>



                                    <div class="table-responsive">
                                        <h5 class="text-left">Physical Examination:</h5>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label>Breast</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="breast" name="breast" class="form-control shadow-none" value="<?= $note['Patient_Breast'] ?? '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Uterus</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="uterus" name="uterus" class="form-control shadow-none" value="<?= $note['Patient_Uterus'] ?? '' ?>" >
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="text-left">Vaginal Discharge:</h5>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label>Present</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="present" name="present" class="form-control shadow-none" value="<?= $note['Patient_Present'] ?? '' ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Absent</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="absent" name="absent" class="form-control shadow-none" value="<?= $note['Patient_Absent'] ?? '' ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="text-left">Laceration/Episiotomy:</h5>
                                            <div class="input-group mb-6">
                                                <input type="text" id="laceration_episiotomy" name="laceration_episiotomy" class="form-control shadow-none" value="<?= $note['Patient_Laceration_Episiotomy'] ?? '' ?>" >
                                            </div>
                                        </div>

                                        
                                            <?php
                                            // Decode the JSON data
                                            $advicecounsel = json_decode($postrec->advice_counsel, true);
                                            ?>

                                        <div class="mb-2">
                                            <div>
                                                <label class="fw-semibold">Advise & Counsel on:</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="personalhygiene">Personal Hygiene</label>
                                                <div>
                                                    <input type="checkbox" class="form-check-input shadow-none" id="personalhygiene" name="ac_personalhygiene" value="Personal Hygiene"  <?= in_array('Personal Hygiene', $advicecounsel) ? 'checked' : '' ?> >
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="immunization">Immunization</label>
                                                <div>
                                                    <input type="checkbox" class="form-check-input shadow-none" id="immunization" name="ac_immunization" value="Immunization"  <?= in_array('Immunization', $advicecounsel) ? 'checked' : '' ?>>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="diabetes">Nutrition</label>
                                                <div>
                                                    <input type="checkbox" class="form-check-input shadow-none" id="nutrition" name="ac_nutrition" value="Nutrition"  <?= in_array('Nutrition', $advicecounsel) ? 'checked' : '' ?>>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="famplan">Family Planning</label>
                                                <div>
                                                    <input type="checkbox" class="form-check-input shadow-none" id="famplan" name="ac_famplan" value="Family Planning"  <?= in_array('Family Planning', $advicecounsel) ? 'checked' : '' ?>>
                                                </div>
                                            </div>


                                            <?php
                                            // Decode the JSON data
                                            $advicecounseldsign = json_decode($postrec->advice_counsel_postpartum_dsign, true);
                                            ?>

                                            <div class="mb-2 mt-3">
                                                <div>
                                                    <label class="fw-semibold">Advise & Counsel on Post Partum Danger signs: </label>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label for="vaginal">Vaginal Bleeding</label><br>
                                                    <div>
                                                        <input type="checkbox" class="form-check-input shadow-none" id="vaginal" name="advice_counsel_dsign_vaginal" value="Vaginal Bleeding" <?= in_array('Vaginal Bleeding', $advicecounseldsign) ? 'checked' : '' ?>>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="fever">Fever</label><br>
                                                    <div>
                                                        <input type="checkbox" class="form-check-input shadow-none" id="fever" name="advice_counsel_dsign_fever"  value="Fever" <?= in_array('Fever', $advicecounseldsign) ? 'checked' : '' ?>>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="abpain">Severe Abdominal Pain</label><br>
                                                    <div>
                                                        <input type="checkbox" class="form-check-input shadow-none" id="abpain" name="advice_counsel_dsign_abpain"  value="Severe Abdominal " <?= in_array('Severe Abdominal', $advicecounseldsign) ? 'checked' : '' ?>><br>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="vomiting">Severe Vomiting</label><br>
                                                    <div>
                                                        <input type="checkbox" class="form-check-input shadow-none" id="vomiting" name="advice_counsel_dsign_vomiting"  value="Severe Vomiting" <?= in_array('Severe Vomiting', $advicecounseldsign) ? 'checked' : '' ?>><br>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="headache">Severe Headache</label><br>
                                                    <div>
                                                        <input type="checkbox" class="form-check-input shadow-none" id="headache" name="advice_counsel_dsign_headache" value="Severe Headache" <?= in_array('Severe Headache', $advicecounseldsign) ? 'checked' : '' ?>><br>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="UC">Unconscious/Convulsing</label><br>
                                                    <div>
                                                        <input type="checkbox" class="form-check-input shadow-none" id="UC" name="advice_counsel_dsign_UC" value="Unconscious/Convulsing" <?= in_array('Unconscious/Convulsing', $advicecounseldsign) ? 'checked' : '' ?>><br>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="ill">Looks Very Ill</label><br>
                                                    <div>
                                                        <input type="checkbox" class="form-check-input shadow-none" id="ill" name="advice_counsel_dsign_ill" value="Looks Very Ill" <?= in_array('Looks Very Ill', $advicecounseldsign) ? 'checked' : '' ?>><br>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <label>Other Medical Problem:</label>
                                                        <div class="input-group mb-6">
                                                            <input type="text" id="medicalprob" name="advice_counsel_dsign_medicalprob" class="form-control shadow-none" value="<?= $note['Others'] ?? '' ?>">
                                                        </div>

                                                    </div>      
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Follow-Up Date</label>
                                                    <input type="date" id="followUp_date" name="followUp_date" class="form-control shadow-none" value="<?= $postrec->followUp_checkUp ?>">

                                                </div>
                                                <div class="col-md-6">
                                                    <label>Follow-Up Time</label>
                                                    <input type="time" id="followUp_time" name="followUp_time" class="form-control shadow-none" value="<?= $postrec->time ?>">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 d-flex justify-content-center mt-3">
                <!-- <button type="button" class="btn btn-success" onclick="postnatal()"> Submit <i class="ti ti-send"></i></button> -->
            </div>

            </div>
            <?php } ?>
        </div>
    </div>
</div>




<!-- <script>
    function postnatal() {
        //Variable Arrays
        var dr_order = $('#dr_order').val();
        var ppreid = $('#ppreid').val();
        var access_code_id = $('#access_code_id').val();
        var followUp_date = $('#followUp_date').val();
        var followUp_time = $('#followUp_time').val();
        var patient_info = {
            'Patient_Name': $('#pname').val(),
            'Patient_Age': $('#page').val(),
            'Patient_Address': $('#paddress').val(),
        };
        var notes = {
            'Patient_Temperature': $('#temp').val(),
            'Patient_BloodPressure': $('#bp').val(),
            'Patient_Weight': $('#weight').val(),
            'Patient_Type_of_Delivery': $('#typeofdelivery').val(),
            'Patient_Date_of_Delivery': $('#datedelivery').val(),
            'Patient_Place_of_Delivery': $('#placedel').val(),
            'Patient_Outcome': $('#outcome').val(),
            'Patient_Sex': $('#sex').val(),
            'Patient_Baby_Weight': $('#babyweight').val(),
            'Patient_Attend_by': $('#attendby').val(),
            'Patient_Breast_Feeding': $('#breastf').val(),
            'Patient_Intention_FP_Method': $('#intention').val(),
            'Patient_FP_Method': $('#fpmethod').val(),
            'Patient_Vac_Supplementation': $('#vacsupp').val(),
            'Patient_Feso4_Supplemenation': $('#fessupp').val(),
            'Patient_Breast': $('#breast').val(),
            'Patient_Uterus': $('#uterus').val(),
            'Patient_Present': $('#present').val(),
            'Patient_Absent': $('#absent').val(),
            'Patient_Laceration_Episiotomy': $('#laceration_episiotomy').val()
        };

        //Variable Checkbox
        var advice_counsel_data = {};
        $('input[name^="ac"]:checked').each(function() {
            advice_counsel_data[$(this).attr('name')] = $(this).val();
        });

        var advice_counsel_dsign_data = {};
        $('input[name^="advice_counsel_dsign"]:checked').each(function() {
            advice_counsel_dsign_data[$(this).attr('name')] = $(this).val();

            //Variable Input
        });
        advice_counsel_dsign_data['Others'] = $('#medicalprob').val();


        // Convert data to JSON

        var patient_info_json = JSON.stringify(patient_info);
        var notes_json = JSON.stringify(notes);
        var advice_counsel_json = JSON.stringify(advice_counsel_data);
        var advice_counsel_dsign_json = JSON.stringify(advice_counsel_dsign_data);


        $.ajax({
            url: '../lyingin/submitPostNatal',
            method: 'POST',
            data: {
                'ppreid': ppreid,
                'access_code_id': access_code_id,
                'patient_info_json': patient_info_json,
                'dr_order': dr_order,
                'notes_json': notes_json,
                'advice_counsel_json': advice_counsel_json,
                'advice_counsel_dsign_json': advice_counsel_dsign_json,
                'followUp_date': followUp_date,
                'followUp_time': followUp_time,

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
                        location.reload();
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Postnatal Saved Successfully"
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
</script> -->