<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div id="saveprentalform">
                <?php foreach ($PatientInfo as $perinfo) { ?>
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Prenatal Record</small> <br> (PRENATAL) </h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                    </div>

                    <hr class="border-5 shadow-none mb-4">

                    <input type="hidden" name="pid" id="pid" value="<?= $perinfo->pid ?>">
                    <input type="hidden" name="prid" id="prid" value="<?= $perinfo->prid ?>">
                    <input type="hidden" name="acc_code_id" id="acc_code_id" value="<?= $perinfo->access_code_id ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pstatus">Patient's Name</label>
                            <div class="input-group mb-3">
                                <input type="text" name="patname" id="patname" class="form-control shadow-none" value="<?= $perinfo->firstname ?> <?= $perinfo->middlename ?> <?= $perinfo->lastname ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="findings">Age</label>
                            <div class="input-group mb-3">
                                <input type="number" name="patage" id="patage" class="form-control shadow-none" value="<?= $perinfo->age ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="pstatus">Occupation</label>
                            <div class="input-group mb-3">
                                <input type="text" name="patoccupation" id="patoccupation" class="form-control shadow-none" value="<?= $perinfo->occupation ?>" readonly>
                            </div>
                        </div>

                        <?php
                        // Decode the JSON data
                        $husbandData = json_decode($perinfo->husband_data, true);
                        ?>
                        <div class="col-md-4">
                            <label for="hname">Husband's Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control shadow-none" id="hname" value="<?= $husbandData['hname'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="hage">Age</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control shadow-none" id="hage" value="<?= $husbandData['hage'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="hoccu">Occupation</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control shadow-none" id="hoccu" value="<?= $husbandData['hoccu'] ?? '' ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="pstatus">Date/Place of Marriage</label>
                            <div class="input-group mb-3">
                                <input type="text" name="marriage" id="marriage" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="pstatus">Contact Number</label>
                            <div class="input-group mb-3">
                                <input type="text" name="patcontactno." id="patcontactno" class="form-control shadow-none" value="<?= $perinfo->mobileno ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="findings">Address</label>
                            <div class="input-group mb-3">
                                <input type="text" name="pataddress" id="pataddress" class="form-control shadow-none" value="<?= $perinfo->street ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="pstatus">Barangay</label>
                            <div class="input-group mb-3">
                                <input type="text" name="patbrngy" id="patbrngy" class="form-control shadow-none" value="<?= $perinfo->bname ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="pstatus">Birthday</label>
                            <div class="input-group mb-3">
                                <input type="text" name="patbday" id="patbday" class="form-control shadow-none" value="<?= date('M d, Y', strtotime($perinfo->birthdate)) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="pstatus">Philhealth No.</label>
                            <div class="input-group mb-3">
                                <input type="text" name="patphno" id="patphno" class="form-control shadow-none" placeholder="xx-xxxxxxxxx-x">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="pstatus">Referred By</label>
                            <div class="input-group mb-3">
                                <input type="text" name="patref" id="patref" class="form-control shadow-none">
                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4 bg-light">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class=" mb-0 text-center fw-semibold text-main">DOCTOR'S ORDER</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class=" mb-0 text-center fw-semibold text-main">MIDWIVE'S NOTES</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- DOCTOR'S NOTES INPUT-->
                                    <td>

                                        <textarea name="dr_order" id="dr_order" cols="1000" rows="93" class="rounded-2 p-3 form-control shadow-none border-0"><?= $perinfo->doctor_order ?></textarea>

                                    </td>
                                    <!-- MIDWIVE'S NOTES INPUT-->
                                    <td>

                                        <div class="row">
                                            <?php
                                            // Decode the JSON data
                                            $notesData = json_decode($perinfo->notes, true);
                                            ?>

                                            <div class="col-md-4">
                                                <label class="">Menarche</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="Menarche" name="Menarche" class="form-control shadow-none" value="<?= $notesData['Menarche'] ?? '' ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="">Interval</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="itnerval" name="interval" class="form-control shadow-none" value="<?= $notesData['Interval'] ?? '' ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="">Duration</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="duration" name="duration" class="form-control shadow-none" value="<?= $notesData['Duration'] ?? '' ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="">Gravida</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="g" name="g" class="form-control shadow-none" value="<?= $notesData['G'] ?? '' ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="">Para </label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="p" name="p" class="form-control shadow-none" value="<?= $notesData['P'] ?? '' ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class=""> ()</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="oth" name="oth" class="form-control shadow-none" value="<?= $notesData['Oth'] ?? '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="">Last Menstrual Period</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="date" id="lmp" name="lmp" class="form-control shadow-none" value="<?= $notesData['LMP'] ?? '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="">Estimated Date of Confinement</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="date" id="edc" name="edc" class="form-control shadow-none" value="<?= $notesData['EDC'] ?? '' ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="">Age of Gestation</label><br>
                                                <div class="input-group mb-3">
                                                    <input type="text" id="aog" name="aog" class="form-control shadow-none" value="<?= $notesData['AOG'] ?? '' ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover text-nowrap mb-0 align-middle text-center">
                                                    <thead class="text-dark fs-4 bg-light">

                                                        <tr>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Obstetrical History</h6>
                                                            </th>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Year</h6>
                                                            </th>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Type of Delivery</h6>
                                                            </th>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Sex</h6>
                                                            </th>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Weight</h6>
                                                            </th>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Attended by</h6>
                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Gravida 1</h6>
                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="number" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G1_y"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G1_td"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G1_sex"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G1_wt">

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G1_by">

                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Gravida 2</h6>
                                                            </th>

                                                            <th class="border-bottom-0">

                                                                <input type="number" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G2_y"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G2_td"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G2_sex"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G2_wt">

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G2_by">

                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Gravida 3</h6>
                                                            </th>

                                                            <th class="border-bottom-0">

                                                                <input type="number" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G3_y"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G3_td"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G3_sex"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G3_wt">

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G3_by">

                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th class="border-bottom-0">
                                                                <h6 class=" mb-0">Gravida 4</h6>
                                                            </th>

                                                            <th class="border-bottom-0">

                                                                <input type="number" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G4_y"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G4_td"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G4_sex"> <!--pwede gawing dropdown-->

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G4_wt">

                                                            </th>
                                                            <th class="border-bottom-0">

                                                                <input type="text" class="text-center col-md-12 fs-2 p-1 rounded-1 shadow-none" style="border: 1px solid lightgray" id="G4_by">

                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>

                                                <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <label class="">Tetanus Diphtheria Status</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="tdstatus" name="tdstatus" class="form-control shadow-none">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="">Tetanus Diptheria Given</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="date" id="tdgiven" name="tdgiven" class="form-control shadow-none">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <div>
                                                        <label class="fw-semibold">Medical History(Past/Present):</label>
                                                    </div>
                                                </div>

                                                <?php
                                                // Decode the JSON data
                                                $medical_historyData = json_decode($perinfo->medical_history, true);
                                                ?>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="hypertension" class="">Hypertension</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="hypertension" name="medical_history_hypertension" class="" value="Hypertension" <?= in_array('Hypertension', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="TB" class="">Tubercolosis</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="TB" name="medical_history_TB" class="" value="Tubercolosis" <?= in_array('Tubercolosis', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="diabetes" class="">Diabetes</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="diabetes" name="medical_history_diabetes" class="" value="Diabetes" <?= in_array('Diabetes', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="allergy" class="">Allergy</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="allergy" name="medical_history_allergy" class="" value="Allergy" <?= in_array('Allergy', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="heart_disease" class="">Heart Disease</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="heart_disease" name="medical_history_heart_disease" class="" value="Heart Disease" <?= in_array('Heart Disease', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="goiter" class="">Goiter</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="goiter" name="medical_history_goiter" class="" value="Goiter" <?= in_array('Goiter', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="sti" class="">STI</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="sti" name="medical_history_sti" class="" value="STI" <?= in_array('STI', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="asthma" class="">Bronchial Asthma</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="asthma" name="medical_history_asthma" class="" value="Bronchial Asthma" <?= in_array('Bronchial Asthma', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="bleeding" class="">Bleeding Disorder</label>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="bleeding" name="medical_history_bleeding" class="" value="Bleeding Disorder" <?= in_array('Bleeding Disorder', $medical_historyData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="">
                                                        <div class="">
                                                            <label class="">Others</label>
                                                            <div class="input-group mb-6">
                                                                <input type="text" id="others" name="others" class="form-control shadow-none" value="<?= $medical_historyData['Others'] ?? '' ?>" readonly>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="mb-2">
                                                        <div>
                                                            <label class="fw-semibold">Family Medical History: </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <label for="hypertension" class="">Hypertension</label><br>
                                                            <div class="">
                                                                <input type="checkbox" class="form-check-input shadow-none" id="hypertensionmh" name="family_medical_history_hypertensionmh" class="" value="HypertensionMH">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="TB" class="">Tubercolosis</label><br>
                                                            <div class="">
                                                                <input type="checkbox" class="form-check-input shadow-none" id="TBmh" name="family_medical_history_TBmh" class="" value="TubercolosisMh">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="diabetes" class="">Diabetes</label><br>
                                                            <div class="">
                                                                <input type="checkbox" class="form-check-input shadow-none" id="diabetesmh" name="family_medical_history_diabetesmh" class="" value="DiabetesMH"><br>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="mb-2 mt-2">
                                                        <div>
                                                            <label class="fw-semibold">Personal/Social History:</label>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    // Decode the JSON data
                                                    $personal_social_historyData = json_decode($perinfo->personal_social_history, true);
                                                    $personal_social_historyData = is_array($personal_social_historyData) ? $personal_social_historyData : [];
                                                    ?>

                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <label for="smoking" class="">Smoking</label><br>
                                                            <div class="">
                                                                <input type="checkbox" class="form-check-input shadow-none" id="smoking" name="personal_social_history_smoking" class="" value="Smoking" <?= in_array('Smoking', $personal_social_historyData) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="drinking" class="">Drinking Alcohol</label><br>
                                                            <div class="">
                                                                <input type="checkbox" class="form-check-input shadow-none" id="drinking" name="personal_social_history_drinking" class="" value="Dringking Alcohol" <?= in_array('Dringking Alcohol', $personal_social_historyData) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="drugs" class="">Taking Prohibited Drugs</label><br>
                                                            <div class="">
                                                                <input type="checkbox" class="form-check-input shadow-none" id="drugs" name="personal_social_history_drugs" class="" value="Taking Prohibited Drugs" <?= in_array('Taking Prohibited Drugs', $personal_social_historyData) ? 'checked' : '' ?>><br>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="mb-2 mt-3">
                                                        <div class="">
                                                            <label class="">Previous FP method used</label><br>
                                                            <div class="input-group mb-6">
                                                                <input type="text" id="fpmethod" name="fpmethod" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-2">
                                                        <div>
                                                            <label class="fw-semibold">PHYSICAL EXAMINATION:</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="">Weight</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="WT" name="WT" class="form-control shadow-none" value="<?= $notesData['WT'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="">Height</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="HT" name="HT" class="form-control shadow-none" value="<?= $notesData['HT'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="">Nutritional Status</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="Nutritional_Status" name="Nutritional_Status" class="form-control shadow-none" value="<?= $notesData['Nutritional_status'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="">Blood Pressure</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="BP" name="BP" class="form-control shadow-none" value="<?= $notesData['BP'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="">Pulse Rate</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="PR" name="PR" class="form-control shadow-none">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="">Respiratory Rate</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="RR" name="RR" class="form-control shadow-none">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="">Temperature</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="Temp" name="Temp" class="form-control shadow-none" value="<?= $notesData['Temp'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="mt-2 mb-2">
                                                        <div>
                                                            <label class="fw-semibold">Leopold's Manuever:</label>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="col-md-3">
                                                        <label class="">Lumbar Vertebrae 1</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="L1" name="L1" class="form-control shadow-none" value="<?= $notesData['L1'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="">Lumbar Vertebrae 2</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="L2" name="L2" class="form-control shadow-none" value="<?= $notesData['L2'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="">Right</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="Right" name="Right" class="form-control shadow-none">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <label class="">Left</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="Left" name="Left" class="form-control shadow-none">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="">Lumbar Vertebrae 3</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="L3" name="lmlmp" class="form-control shadow-none" value="<?= $notesData['L3'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="">Lumbar Vertebrae 4</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="L4" name="L4" class="form-control shadow-none" value="<?= $notesData['L4'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="">Presentation</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="Presentation" name="Presentation" class="form-control shadow-none">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label class="">Fundal Height</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="FH" name="FH" class="form-control shadow-none">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="">Fetal Heart Tone</label><br>
                                                        <div class="input-group mb-3">
                                                            <input type="text" id="FHT" name="FHT" class="form-control shadow-none" value="<?= $notesData['fht'] ?? '' ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <div>
                                                        <label class="fw-semibold">Dental Record:</label>
                                                    </div>
                                                </div>

                                                <?php
                                                // Decode the JSON data
                                                $dental_recordData = json_decode($perinfo->dental_record, true);
                                                $dental_recordData = is_array($dental_recordData) ? $dental_recordData : [];
                                                ?>

                                                <div class="d-flex justify-content-between">
                                                    <p>18</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_18" id="Up_18" value="18" <?= in_array('18', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>17</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_17" id="Up_17" value="17" <?= in_array('17', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>16</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_16" id="Up_16" value="16" <?= in_array('16', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>15</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_15" id="Up_15" value="15" <?= in_array('15', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>14</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_14" id="Up_14" value="14" <?= in_array('14', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>13</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_13" id="Up_13" value="13" <?= in_array('13', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>12</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_12" id="Up_12" value="12" <?= in_array('12', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>11</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_11" id="Up_11" value="11" <?= in_array('11', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>21</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_21" id="Up_21" value="21" <?= in_array('21', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>22</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_22" id="Up_22" value="22" <?= in_array('22', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>23</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_23" id="Up_23" value="23" <?= in_array('23', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>24</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_24" id="Up_24" value="24" <?= in_array('24', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>25</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_25" id="Up_25" value="25" <?= in_array('25', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>26</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_26" id="Up_26" value="26" <?= in_array('26', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>27</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_27" id="Up_27" value="27" <?= in_array('27', $dental_recordData) ? 'checked' : '' ?>>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p>48</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_48" id="Down_48" value="48" <?= in_array('48', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>47</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_47" id="Down_47" value="47" <?= in_array('47', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>46</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_46" id="Down_46" value="46" <?= in_array('46', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>45</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_45" id="Down_45" value="45" <?= in_array('45', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>44</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_44" id="Down_44" value="44" <?= in_array('44', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>43</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_43" id="Down_43" value="43" <?= in_array('43', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>42</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_42" id="Down_42" value="42" <?= in_array('42', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>41</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_41" id="Down_41" value="41" <?= in_array('41', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>31</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_31" id="Down_31" value="31" <?= in_array('31', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>32</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_32" id="Down_32" value="32" <?= in_array('32', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>33</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_33" id="Down_33" value="33" <?= in_array('33', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>34</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_34" id="Down_34" value="34" <?= in_array('34', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>35</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_35" id="Down_35" value="35" <?= in_array('35', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>36</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_36" id="Down_36" value="36" <?= in_array('36', $dental_recordData) ? 'checked' : '' ?>>
                                                    <p>37</p>
                                                    <input type="checkbox" class="form-check-input shadow-none" name="Dental_37" id="Down_37" value="37" <?= in_array('37', $dental_recordData) ? 'checked' : '' ?>>
                                                </div>


                                                <div class="mb-2 mt-2">
                                                    <div>
                                                        <label class="fw-semibold">Remarks:</label>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="">Ferrous Sulfate Open</label><br>
                                                        <div class="input-group mb-6">
                                                            <input type="text" id="fesopen" name="fesopen" class="form-control shadow-none">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="">Calcium Carbonate</label><br>
                                                        <div class="input-group mb-6">
                                                            <input type="text" id="calcar" name="calcar" class="form-control shadow-none">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" mb-2">
                                                    <div>
                                                        <label class="fw-semibold">Counseling On:</label>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <?php
                                                    // Decode the JSON data
                                                    $counselingData = json_decode($perinfo->counseling, true);
                                                    ?>

                                                    <div class="col-md-4">
                                                        <label for="family_planning" class="">Family Planning</label><br>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="family_planning" name="family_planning" class="" value="Family Planning" <?= in_array('Family Planning', $counselingData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="nutrition" class="">Nutrition</label><br>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="nutrition" name="nutrition" class="" value="Nutrition" <?= in_array('Nutrition', $counselingData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="highrisk" class="">High Risk Factors</label><br>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="highrisk" name="highrisk" class="" value="High Risk Factors" <?= in_array('High Risk Factors', $counselingData) ? 'checked' : '' ?>><br>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <label for="dangersign" class="">Danger Signs</label><br>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="dangersign" name="dangersign" class="" value="Danger Signs" <?= in_array('Danger Signs', $counselingData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="bfeeding" class="">Breastfeeding</label><br>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="bfeeding" name="bfeeding" class="" value="Breastfeeding" <?= in_array('Breastfeeding', $counselingData) ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="hivaids" class="">HIV/AIDS</label><br>
                                                        <div class="">
                                                            <input type="checkbox" class="form-check-input shadow-none" id="hivaids" name="hivaids" class="" value="HIV" <?= in_array('HIV', $counselingData) ? 'checked' : '' ?>><br>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="mt-2">
                                                    <div class="">
                                                        <label class="">Others</label><br>
                                                        <div class="input-group mb-6">
                                                            <input type="text" id="cothe" name="counseling_cothe" class="form-control shadow-none" value="<?= $counselingData['Others'] ?? '' ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="followUp">Follow-Up Checkup</label>
                                                        <div class="input-group mb-3">
                                                            <input type="date" name="followUp" id="followUp" class="form-control shadow-none" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="time">Time</label>
                                                        <div class="input-group mb-3">
                                                            <input type="time" name="time" id="time" class="form-control shadow-none" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="border-5 shadow-none mb-4">
            </div>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <!-- <a href="../doctor/itr" class="btn btn-danger me-3"><i class="ti ti-arrow-back-up"></i> Cancel</a> -->
                <button type="button" onclick="submitPrenatal()" class="btn btn-success submitpre">Submit <i class="ti ti-send"></i></button>
                <button type="button" class="btn btn-warning printpreform" onclick="printpre()" style="display: none;">Print <i class="fas fa-print"></i></button>
            </div>

        <?php } ?>

        </div>
    </div>
</div>


<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>

<script>
    function submitPrenatal() {
        var prid = $('#prid').val();
        var pid = $('#pid').val();
        var acc_code_id = $('#acc_code_id').val();
        var drorder = $('#dr_order').val();
        var followUp = $('#followUp').val();
        var time = $('#time').val();

        var patient_other_Data = {
            'marriage': $('#marriage').val(),
            'patphno': $('#patphno').val(),
            'patref': $('#patref').val(),
        };

        var obhxData = {
            'G1_y': $('#G1_y').val(),
            'G1_td': $('#G1_td').val(),
            'G1_sex': $('#G1_sex').val(),
            'G1_wt': $('#G1_wt').val(),
            'G1_by': $('#G1_by').val(),
            'G2_y': $('#G2_y').val(),
            'G2_td': $('#G2_td').val(),
            'G2_sex': $('#G2_sex').val(),
            'G2_wt': $('#G2_wt').val(),
            'G2_by': $('#G2_by').val(),
            'G3_y': $('#G3_y').val(),
            'G3_td': $('#G3_td').val(),
            'G3_sex': $('#G3_sex').val(),
            'G3_wt': $('#G3_wt').val(),
            'G3_by': $('#G3_by').val(),
            'G4_y': $('#G4_y').val(),
            'G4_td': $('#G4_td').val(),
            'G4_sex': $('#G4_sex').val(),
            'G4_wt': $('#G4_wt').val(),
            'G4_by': $('#G4_by').val(),
        };

        var midwives_notes = {
            'Menarche': $('#Menarche').val(),
            'Itnerval': $('#itnerval').val(),
            'Duration': $('#duration').val(),
            'G': $('#g').val(),
            'P': $('#p').val(),
            'Oth': $('#oth').val(),
            'LMP': $('#lmp').val(),
            'EDC': $('#edc').val(),
            'AOG': $('#aog').val(),
            'TD_Status': $('#tdstatus').val(),
            'TD_Given': $('#tdgiven').val(),

            'FT_Method': $('#fpmethod').val(),
            'WT': $('#WT').val(),
            'HT': $('#HT').val(),
            'Nutritional_Status': $('#Nutritional_Status').val(),
            'BP': $('#BP').val(),
            'PR': $('#PR').val(),
            'RR': $('#RR').val(),
            'Temp': $('#Temp').val(),

            'L1': $('#L1').val(),
            'L2': $('#L2').val(),
            'Right': $('#Right').val(),
            'Left': $('#Left').val(),
            'L3': $('#L3').val(),
            'L4': $('#L4').val(),
            'Presentation': $('#Presentation').val(),
            'FH': $('#FH').val(),
            'FHT': $('#FHT').val(),

            'fesopen': $('#fesopen').val(),
            'calcar': $('#calcar').val(),
        };

        var medical_history_data = {};
        $('input[name^="medical_history"]:checked').each(function() {
            medical_history_data[$(this).attr('name')] = $(this).val();
        });
        medical_history_data['Others'] = $('#others').val();

        var personal_social_history_data = {};
        $('input[name^="personal_social_history"]:checked').each(function() {
            personal_social_history_data[$(this).attr('name')] = $(this).val();
        });

        var family_medical_history_data = {};
        $('input[name^="family_medical_history"]:checked').each(function() {
            family_medical_history_data[$(this).attr('name')] = $(this).val();
        });

        var dental_record_data = {};
        $('input[name^="Dental"]:checked').each(function() {
            dental_record_data[$(this).attr('name')] = $(this).val();
        });

        // Convert data to JSON
        var patient_other_Json = JSON.stringify(patient_other_Data);
        var obhx_Json = JSON.stringify(obhxData);
        var midwives_notes_Json = JSON.stringify(midwives_notes);
        var medical_history_Json = JSON.stringify(medical_history_data);
        var personal_social_history_Json = JSON.stringify(personal_social_history_data);
        var family_medical_history_Json = JSON.stringify(family_medical_history_data);
        var dental_record_Json = JSON.stringify(dental_record_data);

        //alert(counseling_Json);

        $.ajax({
            url: '../midwife/prenatalcheckup',
            method: 'POST',
            data: {
                'prid': prid,
                'pid': pid,
                'acc_code_id': acc_code_id,
                'drorder': drorder,
                'patient_other_Json': patient_other_Json,
                'obhx_Json': obhx_Json,
                'midwives_notes_Json': midwives_notes_Json,
                'medical_history_Json': medical_history_Json,
                'personal_social_history_Json': personal_social_history_Json,
                'family_medical_history_Json': family_medical_history_Json,
                'dental_record_Json': dental_record_Json,
                'followUp': followUp,
                'time': time
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                // $('button[type="button"]').prop('disabled', true);
                $('.printpreform').show();
                $('.submitpre').hide();

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
                        // window.location.href = "../doctor/itr";
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Prenatal Submitted successfully  "
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

    function printpre() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('saveprentalform');

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