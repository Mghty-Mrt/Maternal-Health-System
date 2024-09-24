<div class="container-fluid">
    <div class="card" id="saveitrfrom">
        <div class="card-body">
            <div id="itrForm">
                <?php foreach ($PatientInfo as $perinfo) { ?>

                    <!-- <a href="../doctor/newpatients" class=""><i class="ti ti-arrow-back fs-5"></i>Back</a> -->
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Individual Treatment Record</small> <br> (ITR) </h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                        <!-- <a href="../doctor/newpatients" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a> -->
                    </div>

                    <hr class="border-5 shadow-none mb-4">

                    <div class="modal fade" id="itr_modal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content rounded-2">
                                <div class="modal-header bg-home">
                                    <h1 class="modal-title fs-5 text-light" id="modalTitle"><i class="fas fa-file"></i> Individual Treatment Records</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalContent">

                                    <div id="AP_details">

                                        <h5 class="mt-2 mb-2 text-main">Individual Treatment Record List:</h5>

                                        <p class="mb-2 ms-4 text-info card-hover" data-bs-toggle="modal" data-bs-target="#bs-fullscreen"> <i class="fas fa-file-prescription"></i> 1st Visit Individual Treatment Record</p>
                                        <p class="mb-2 ms-4 text-info card-hover"> <i class="fas fa-file-prescription"></i> 2nd Visit Individual Treatment Record</p>
                                        <p class="mb-2 ms-4 text-info card-hover"> <i class="fas fa-file-prescription"></i> 3rd Visit Individual Treatment Record</p>
                                        <p class="mb-2 ms-4 text-info card-hover"> <i class="fas fa-file-prescription"></i> 4th Visit Individual Treatment Record</p>

                                    </div>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-danger rounded-2" data-bs-dismiss="modal">Close</button>
                                </div> -->
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="bs-fullscreen" tabindex="-1" aria-labelledby="bs-example-modal-lg" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header bg-home">
                                    <h6 class="modal-title h5 text-light" id="exampleModalFullscreenLabel">
                                        <i class="fas fa-file-prescription"></i> Patient Individual Treatment Record (ITR)
                                    </h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- content here -->
                                    <div class="d-flex justify-content-center">
                                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Individual Treatment Record</small> <br> (ITR) </h5>
                                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                                        <!-- <a href="../doctor/newpatients" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a> -->
                                    </div>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div> -->
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div id="positiveSection">
                        <input type="hidden" name="p_id" id="p_id" value="<?= $perinfo->prid ?>">
                        <input type="hidden" name="pid" id="pid" value="<?= $perinfo->pid ?>">
                        <input type="hidden" name="access_id" id="access_id" value="<?= $perinfo->access_code_id ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pstatus">Patient's Name</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control shadow-none" id="p_name" value="<?= $perinfo->firstname ?> <?= $perinfo->middlename ?> <?= $perinfo->lastname ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="findings">Age</label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control shadow-none" value="<?= $perinfo->age ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Occupation</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->occupation ?>" readonly>
                                </div>
                            </div>

                            <?php
                            $husband_data = json_decode($husband[0]->husband_data, true);
                            ?>

                            <label for="" class="mb-2 text-main fw-bolder">HUSBAND INFORMATION: </label>
                            <div class="col-md-4">
                                <label for="hname">First Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hc_name" id="hc_name" class="form-control shadow-none" value="<?= $husband_data['hf_name'] . " " . $husband_data['hm_name'] . " " . $husband_data['hl_name'] ?>">
                                </div>
                            </div>

                            <input type="hidden" name="hf_name" id="hf_name" class="form-control shadow-none" value="<?= $husband_data['hf_name'] ?>">
                            <input type="hidden" name="hm_name" id="hm_name" class="form-control shadow-none" value="<?= $husband_data['hm_name'] ?>">
                            <input type="hidden" name="hl_name" id="hl_name" class="form-control shadow-none" value="<?= $husband_data['hl_name'] ?>">

                            <!-- <div class="col-md-4">
                                <label for="hname">Middle Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hm_name" id="hm_name" class="form-control shadow-none" value="<?= $husband_data['hm_name'] ?>">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="hname">Last Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hl_name" id="hl_name" class="form-control shadow-none" value="<?= $husband_data['hl_name'] ?>">
                                </div>
                            </div> -->

                            <div class="col-md-4">
                                <label for="hage">Age</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="hage" id="hage" class="form-control shadow-none" value="<?= $husband_data['hage'] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hoccu">Occupation</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hoccu" id="hoccu" class="form-control shadow-none" value="<?= $husband_data['hoccu'] ?>">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="pstatus">Contact Number</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" value="<?= $perinfo->mobileno ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="findings">Address</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->street . ' St., ' . $perinfo->bname ?>, Quezon City" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Barangay</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->bname ?>" readonly>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 card-hover mb-1">
                                <!-- <a class="text-secondary itr"> <i class="fas fa-question-circle"></i> View Individual Treatment Records (ITR) ?</a> -->
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
                                            <h6 class=" mb-0 text-center fw-semibold text-main">REMARKS/NOTES</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- DOCTOR'S NOTES INPUT-->
                                        <td>

                                            <textarea name="drorder" id="drorder" cols="1000" rows="68" class="rounded-2 p-3 form-control shadow-none border-0" placeholder="Type your notes here..."></textarea>

                                        </td>
                                        <!-- MIDWIVE'S NOTES INPUT-->
                                        <td>

                                            <?php
                                            // Decode the JSON data
                                            $notesData = json_decode($perinfo->notes, true);
                                            ?>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label for="Menarche">Menarche</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Menarche" name="Menarche" class="form-control shadow-none" value="<?= $notesData['Menarche'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Interval">Interval</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Interval" name="Interval" class="form-control shadow-none" value="<?= $notesData['Interval'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Duration">Duration</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Duration" name="Duration" class="form-control shadow-none" value="<?= $notesData['Duration'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="G">Gravida</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="G" name="G" class="form-control shadow-none" value="<?= $notesData['G'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="P">Para</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="P" name="P" class="form-control shadow-none" value="<?= $notesData['P'] ?>">
                                                    </div>
                                                </div>



                                                <div class="col-md-4">
                                                    <label for="LMP">Last Menstrual Period</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="LMP" name="LMP" class="form-control shadow-none" value="<?= $notesData['LMP'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="EDC">Estimated Date of Confinement</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="EDC" name="EDC" class="form-control shadow-none" value="<?= $notesData['EDC'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Age of Gestation</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="AOG" name="AOG" class="form-control shadow-none" value="<?= $notesData['AOG'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Weight</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="WT" name="WT" class="form-control shadow-none" value="<?= $notesData['WT'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Height</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="HT" name="HT" class="form-control shadow-none" value="<?= $notesData['HT'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Temperature</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Temp" name="Temp" class="form-control shadow-none" value="<?= $notesData['Temp'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Blood Pressure</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="BP" name="BP" class="form-control shadow-none" value="<?= $notesData['BP'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Nutritional Status</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Nutritional_status" name="Nutritional_status" class="form-control shadow-none" value="<?= $notesData['Nutritional_status'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Tetanus Diphtheria Immunization</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Td_Immunization" name="Td_Immunization" class="form-control shadow-none" value="<?= $notesData['Td_Immunization'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Status (Date given/dose)</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="datedose" name="datedose" class="form-control shadow-none" value="<?= $notesData['datedose'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="">FT method used</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="ftmethod" name="ftmethod" class="form-control shadow-none" value="<?= $notesData['ftmethod'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="">(Leopold's Method) Fundal Height</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="fundicHt" name="fundicHt" class="form-control shadow-none" placeholder="cm." value="<?= $notesData['fundicHt'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 1</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L1" name="L1" class="form-control shadow-none" value="<?= $notesData['L1'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 2</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L2" name="L2" class="form-control shadow-none" value="<?= $notesData['L2'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 3</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L3" name="L3" class="form-control shadow-none" value="<?= $notesData['L3'] ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 4</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L4" name="L4" class="form-control shadow-none" value="<?= $notesData['L4'] ?>">
                                                    </div>
                                                </div>

                                                <div class="table-responsive">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="">Fetal Heart Tone</label><br>
                                                            <div class="input-group mb-3">
                                                                <input type="text" id="fht" name="fht" class="form-control shadow-none" placeholder="/min" value="<?= $notesData['fht'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    // Decode the JSON data
                                                    $medical_h = json_decode($perinfo->medical_history, true);
                                                    ?>

                                                    <div class="mb-2">
                                                        <div>
                                                            <label class="fw-semibold">Medical History(Past/Present):</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="hypertension" class="">Hypertension</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Hypertension" name="medical_history_Hypertension" class="form-check-input shadow-none" value="Hypertension" <?= in_array('Hypertension', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="TB" class="">Tubercolosis</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Tubercolosis" name="medical_history_Tubercolosis" class="form-check-input shadow-none" value="Tubercolosis" value="Tubercolosis" <?= in_array('Tubercolosis', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="diabetes" class="">Diabetes</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Diabetes" name="medical_history_Diabetes" class="form-check-input shadow-none" value="Diabetes" <?= in_array('Diabetes', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="allergy" class="">Allergy</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Allergy" name="medical_history_Allergy" class="form-check-input shadow-none" value="Allergy" value="Allergy" <?= in_array('Allergy', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="heart_disease" class="">Heart Disease</label>
                                                            <div class="">
                                                                <input type="checkbox" id="heart_disease" name="medical_history_heart_disease" class="form-check-input shadow-none" value="Heart Disease" <?= in_array('Heart Disease', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="goiter" class="">Goiter</label>
                                                            <div class="">
                                                                <input type="checkbox" id="goiter" name="medical_history_goiter" class="form-check-input shadow-none" value="Goiter" <?= in_array('Goiter', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="sti" class="">STI</label>
                                                            <div class="">
                                                                <input type="checkbox" id="sti" name="medical_history_sti" class="form-check-input shadow-none" value="STI" <?= in_array('STI', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="asthma" class="">Bronchial Asthma</label>
                                                            <div class="">
                                                                <input type="checkbox" id="asthma" name="medical_history_asthma" class="form-check-input shadow-none" value="Bronchial Asthma" <?= in_array('Bronchial Asthma', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="bleeding" class="">Bleeding Disorder</label>
                                                            <div class="">
                                                                <input type="checkbox" id="bleeding" name="medical_history_bleeding" class="form-check-input shadow-none" value="Bleeding Disorder" <?= in_array('Bleeding Disorder', $medical_h) ? 'checked' : '' ?>>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="">
                                                                <label class="">Others</label>
                                                                <div class="input-group mb-6">
                                                                    <input type="text" id="Others" name="medical_history_Others" class="form-control shadow-none" value="<?= $medical_h['Others'] ?? '' ?>">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="mb-2 mt-2">
                                                            <div>
                                                                <label class="fw-semibold">Personal/Social History:</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <?php
                                                            // Decode the JSON data
                                                            $personal_h = json_decode($perinfo->personal_social_history, true);
                                                            ?>

                                                            <div class="col-md-4">
                                                                <label for="smoke" class="">Smoking</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="smoke" name="personal_social_history_smoke" class="form-check-input shadow-none" value="Smoking" <?= in_array('Smoking', $personal_h) ? 'checked' : '' ?>>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="alcohol" class="">Drinking Alcohol</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="alcohol" name="personal_social_history_alcohol" class="form-check-input shadow-none" value="Dringking Alcohol" <?= in_array('Dringking Alcohol', $personal_h) ? 'checked' : '' ?>>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 mb-3">
                                                                <label for="drugs" class="">Taking Prohibited Drugs</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="drucs" name="personal_social_history_drucs" class="form-check-input shadow-none" value="Taking Prohibited Drugs" <?= in_array('Taking Prohibited Drugs', $personal_h) ? 'checked' : '' ?>><br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <hr class="mb-2">
                                                        <div class="d-flex justify-content-between">
                                                            <label for="lab" class="fw-semibold">LABORATORY EXAM</label>
                                                            <small class="bg-info-subtle card-hover py-1 px-2 rounded-2 text-secondary mb-2" data-bs-toggle="modal" data-bs-target="#dynamicmodalLab" onclick="lab()">Request Laboratory ?</small>
                                                        </div>

                                                        <table class="table table-bordered text-nowrap mb-3 align-middle text-center">
                                                            <tr>
                                                                <th class="border-bottom-0 bg-light">
                                                                    <h6 class="mb-0">Request Date</h6>
                                                                </th>
                                                                <th class="border-bottom-0 bg-light">
                                                                    <h6 class=" mb-0">Laboratory</h6>
                                                                </th>
                                                                <th class="border-bottom-0 bg-light">
                                                                    <h6 class=" mb-0">Result</h6>
                                                                </th>
                                                            </tr>

                                                            <?php foreach ($Labs as $lab) { ?>
                                                                <?php
                                                                // Decode the JSON data
                                                                $labRequestData = json_decode($lab->lab_request, true);
                                                                ?>
                                                                <tr>
                                                                    <td id="createdAt">
                                                                        <input type="text" class="form-control shadow-none border-0" id="labdate" name="lab_labdate" value="<?= date('M. d, Y , h:i a', strtotime($lab->createdAt)) ?>">
                                                                    </td>
                                                                    <td>
                                                                        <?php foreach ($labRequestData as $key => $value) { ?>
                                                                            <p class="mb-0 text-start" id="labrequests">
                                                                                <small class="fw-bolder">
                                                                                    <input type="checkbox" id="type" name="lab_type" class="form-check-input shadow-none p-2" value="<?= "$value" ?>">
                                                                                </small> <?= "$value" ?>
                                                                            </p>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <textarea class="form-control shadow-none mb-2 border-0" name="lab_result" id="result" cols="30" rows="3" placeholder="Type the results here..."></textarea>
                                                                        <!-- <form action="../doctor/saveimg" method="POST"> -->
                                                                        <div class="row">
                                                                            <small class="text-info text-start"><b>NOTE:</b> Add file one by one.</small>
                                                                            <div class="col-md-9">
                                                                                <input type="file" class="form-control shadow-none" name="lab_labresult" id="labresultInput" capture="user" accept="image/*" multiple>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <button type="button" onclick="saveimg()" id="addbtn" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                                                                            </div>

                                                                            <div id="invalidImg" class="invalid-feedback mb-3" style="display: none;"></div>
                                                                        </div>
                                                                        <!-- </form> -->
                                                                        <!-- <p class="mt-2 text-start" id="labresultImages"></p> -->

                                                                        <div class="row mt-3">
                                                                            <div class="col-md-12">
                                                                                <div id="labresultImages"></div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        </table>

                                                        <?php
                                                        // Decode the JSON data
                                                        $dental_r = json_decode($perinfo->dental_record, true);
                                                        ?>

                                                        <div class="mb-2">
                                                            <div>
                                                                <label class="fw-semibold">Dental Record:</label>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <p>18</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_18" id="Up_18" value="18" <?= in_array('18', $dental_r) ? 'checked' : '' ?>>
                                                            <p>17</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_17" id="Up_17" value="17" <?= in_array('17', $dental_r) ? 'checked' : '' ?>>
                                                            <p>16</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_16" id="Up_16" value="16" <?= in_array('16', $dental_r) ? 'checked' : '' ?>>
                                                            <p>15</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_15" id="Up_15" value="15" <?= in_array('15', $dental_r) ? 'checked' : '' ?>>
                                                            <p>14</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_14" id="Up_14" value="14" <?= in_array('14', $dental_r) ? 'checked' : '' ?>>
                                                            <p>13</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_13" id="Up_13" value="13" <?= in_array('13', $dental_r) ? 'checked' : '' ?>>
                                                            <p>12</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_12" id="Up_12" value="12" <?= in_array('12', $dental_r) ? 'checked' : '' ?>>
                                                            <p>11</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_11" id="Up_11" value="11" <?= in_array('11', $dental_r) ? 'checked' : '' ?>>
                                                            <p>21</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_21" id="Up_21" value="21" <?= in_array('21', $dental_r) ? 'checked' : '' ?>>
                                                            <p>22</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_22" id="Up_22" value="22" <?= in_array('22', $dental_r) ? 'checked' : '' ?>>
                                                            <p>23</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_23" id="Up_23" value="23" <?= in_array('23', $dental_r) ? 'checked' : '' ?>>
                                                            <p>24</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_24" id="Up_24" value="24" <?= in_array('24', $dental_r) ? 'checked' : '' ?>>
                                                            <p>25</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_25" id="Up_25" value="25" <?= in_array('25', $dental_r) ? 'checked' : '' ?>>
                                                            <p>26</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_26" id="Up_26" value="26" <?= in_array('26', $dental_r) ? 'checked' : '' ?>>
                                                            <p>27</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_27" id="Up_27" value="27" <?= in_array('27', $dental_r) ? 'checked' : '' ?>>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p>48</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_48" id="Down_48" value="48" <?= in_array('48', $dental_r) ? 'checked' : '' ?>>
                                                            <p>47</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_47" id="Down_47" value="47" <?= in_array('47', $dental_r) ? 'checked' : '' ?>>
                                                            <p>46</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_46" id="Down_46" value="46" <?= in_array('46', $dental_r) ? 'checked' : '' ?>>
                                                            <p>45</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_45" id="Down_45" value="45" <?= in_array('45', $dental_r) ? 'checked' : '' ?>>
                                                            <p>44</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_44" id="Down_44" value="44" <?= in_array('44', $dental_r) ? 'checked' : '' ?>>
                                                            <p>43</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_43" id="Down_43" value="43" <?= in_array('43', $dental_r) ? 'checked' : '' ?>>
                                                            <p>42</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_42" id="Down_42" value="42" <?= in_array('42', $dental_r) ? 'checked' : '' ?>>
                                                            <p>41</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_41" id="Down_41" value="41" <?= in_array('41', $dental_r) ? 'checked' : '' ?>>
                                                            <p>31</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_31" id="Down_31" value="31" <?= in_array('31', $dental_r) ? 'checked' : '' ?>>
                                                            <p>32</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_32" id="Down_32" value="32" <?= in_array('32', $dental_r) ? 'checked' : '' ?>>
                                                            <p>33</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_33" id="Down_33" value="33" <?= in_array('33', $dental_r) ? 'checked' : '' ?>>
                                                            <p>34</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_34" id="Down_34" value="34" <?= in_array('34', $dental_r) ? 'checked' : '' ?>>
                                                            <p>35</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_35" id="Down_35" value="35" <?= in_array('35', $dental_r) ? 'checked' : '' ?>>
                                                            <p>36</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_36" id="Down_36" value="36" <?= in_array('36', $dental_r) ? 'checked' : '' ?>>
                                                            <p>37</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_37" id="Down_37" value="37" <?= in_array('37', $dental_r) ? 'checked' : '' ?>>
                                                        </div>

                                                        <?php
                                                        // Decode the JSON data
                                                        //$counseling_on = json_decode($perinfo->counseling, true);
                                                        ?>

                                                        <!-- <div class=" mb-2">
                                                            <div>
                                                                <label class="fw-semibold">Counseling On:</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label for="fplan" class="">Family Planning</label><br>
                                                                <div class="input-group">
                                                                    <input type="checkbox" id="fplan" name="counseling_fplan" class="form-check-input shadow-none" value="Family Planning" <?= in_array('Family Planning', $counseling_on) ? 'checked' : '' ?>>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="nutri" class="">Nutrition</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="nutri" name="counseling_nutri" class="form-check-input shadow-none" value="Nutrition" <?= in_array('Nutrition', $counseling_on) ? 'checked' : '' ?>>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="hrf" class="">High Risk Factors</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="hrf" name="counseling_hrf" class="form-check-input shadow-none" value="High Risk Factors" <?= in_array('High Risk Factors', $counseling_on) ? 'checked' : '' ?>><br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label for="dsign" class="">Danger Signs</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="dsign" name="counseling_dsign" class="form-check-input shadow-none" value="Danger Signs" <?= in_array('Danger Signs', $counseling_on) ? 'checked' : '' ?>>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="bfeeding" class="">Breastfeeding</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="bfeeding" name="counseling_bfeeding" class="form-check-input shadow-none" value="Breastfeeding" <?= in_array('Breastfeeding', $counseling_on) ? 'checked' : '' ?>>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="hiv" class="">HIV/AIDS</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="hiv" name="counseling_hiv" class="form-check-input shadow-none" value="HIV/AIDS" <?= in_array('HIV/AIDS', $counseling_on) ? 'checked' : '' ?>><br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="">Others</label>
                                                                <div class="input-group mb-6">
                                                                    <input type="text" id="cothe" name="counseling_cothe" class="form-control shadow-none" value="<?= $counseling_on['Others'] ?? '' ?>">
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="pstatus">Visit <small class="text-info"> <b>NOTE:</b> Last visit is (<?= $perinfo->visits ?>)</small></label>
                                                                <div class="input-group mb-3">
                                                                    <input list="v_list" type="text" name="visit" id="visit" class="form-control shadow-none">
                                                                </div>
                                                                <datalist id="v_list">
                                                                    <option value="">2nd</option>
                                                                    <option value="">3rd</option>
                                                                    <option value="">4th</option>
                                                                    <option value="">5th</option>
                                                                    <option value="">6th</option>
                                                                    <option value="">7th</option>
                                                                    <option value="">8th</option>
                                                                </datalist>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="followUp">Follow-Up Checkup</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="date" name="followUp" id="followUp" class="form-control shadow-none" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
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

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 mt-5">
                                <?php foreach ($user_info as $info) { ?>
                                    <input type="text" class="form-control shadow-none border-top-0 border-end-0 border-start-0 rounded-0 text-center" value="<?= $info->rcode ?>. <?= $info->firstname ?> <?= $info->middlename ?> <?= $info->lastname ?>">
                                <?php } ?>
                                <center><label for="">Checkup by</label></center>
                            </div>
                            <div class="col-md-4"></div>
                        </div>

                        <hr class="border-5 shadow-none mb-4">

                    </div>

            </div>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <button type="button" onclick="submitFcItr()" class="btn btn-success submititrform">Submit <i class="ti ti-send"></i></button>
                <button type="button" class="btn btn-warning printitrform" onclick="printitr()" style="display: none;">Print <i class="fas fa-print"></i></button>
            </div>
        <?php } ?>
        </div>
    </div>
</div>


<!-- Request Lab Modal -->
<div class="modal fade" id="dynamicmodalLab" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title text-light fs-5" id="modalTitle"> <i class="fas fa-file"></i> Request Laboratory</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

                <form id="printForm">
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mt-2" width="80px" height="68px" alt="">
                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Request Laboratory</small></h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2" width="95px" alt="">
                    </div>

                    <hr class="border-5 shadow-none mb-3">

                    <input type="hidden" name="prid" id="prid">

                    <div class="row">
                        <div class="col-md-12">
                            <small class="text-info s_note" style="display: none;"> <i class="fas fa-exclamation-circle"></i> The patient have the following conditions, please request Laboratory exam.</small>
                        </div>
                        <div class="col-md-6">
                            <!-- Display medical history data -->
                            <h6 class="text-muted" style="display: none">Medical History </h6>
                            <ol style="list-style-type: disc;" id="medicalHistoryList"></ol>
                        </div>

                        <div class="col-md-6">
                            <!-- Display personal social history data -->
                            <h6 class="text-muted" style="display: none">Personal Social History </h6>
                            <ol style="list-style-type: disc;" id="personalSocialHistoryList"></ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cname">Name</label>
                            <div class="input-group">
                                <input type="text" name="cname" id="cname" class="form-control shadow-none" autocomplete="off" readonly>
                            </div>
                            <div id="invalidName" class="invalid-feedback mb-3" style="display: none;"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="impre">Impression</label>
                            <div class="input-group">
                                <input type="text" name="impre" id="impre" class="form-control shadow-none" autocomplete="off" required>
                            </div>
                            <div id="invalidImpre" class="invalid-feedback mb-3" style="display: none;"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="reffby">Reffered By</label>
                            <div class="input-group">
                                <?php foreach ($user_info as $info) { ?>
                                    <input type="text" name="reffby" id="reffby" class="form-control shadow-none" autocomplete="off" value="<?= $info->rcode ?>. <?= $info->firstname ?> <?= $info->middlename ?> <?= $info->lastname ?>">
                                <?php } ?>
                            </div>
                            <div id="invalidRefby" class="invalid-feedback mb-3" style="display: none;"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Follow-up Visit</label>
                            <div class="input-group">
                                <input type="date" class="form-control shadow-none" name="f_visit" id="f_visit">
                            </div>
                            <div id="invalidf_visit" class="invalid-feedback mb-3" style="display: none;"></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="fs-4 fw-bold">Laboratory: </p>
                        <div id="invalidPregtest" class="invalid-feedback mb-3" style="display: none;"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_cbw" id="cbw" value="CBW w/ Platelet">
                                <label class="form-check-label" for="inlineCheckbox1">CBW w/ Platelet</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_bt" id="bt" value="BT">
                                <label class="form-check-label" for="inlineCheckbox1">Bleeding Time</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_ct" id="ct" value="CT/BT">
                                <label class="form-check-label" for="inlineCheckbox1">Clotting Time / Bleeding Time</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_pbs" id="pbs" value="PBS ESR">
                                <label class="form-check-label" for="inlineCheckbox1">Peripheral Blood Smear Erythrocyte Sedimentation Rate</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_uri" id="uri" value="Urinalysis">
                                <label class="form-check-label" for="inlineCheckbox1">Urinalysis</label>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_stool" id="stool" value="Stool">
                                <label class="form-check-label" for="inlineCheckbox1">Stool</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_contech" id="contech" value="Concentration Tech. For Amoeba">
                                <label class="form-check-label" for="inlineCheckbox1">Concentration Tech. For Amoeba</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_culsen" id="culsen" value="Culture & Sensitivity">
                                <label class="form-check-label" for="inlineCheckbox1">Culture & Sensitivity</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_occub" id="occub" value="Occult Bld">
                                <label class="form-check-label" for="inlineCheckbox1">Occult Bld</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_aso" id="aso" value="ASO">
                                <label class="form-check-label" for="inlineCheckbox1">Antistreptolysin O</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_vdrl" id="vdrl" value="VDRL">
                                <label class="form-check-label" for="inlineCheckbox1">Venereal Disease Research Laboratory</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_hbsag" id="hbsag" value="HBsAg">
                                <label class="form-check-label" for="inlineCheckbox1">Hepatitis B surface antigen</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_tydot" id="tydot" value="Typhi Dot">
                                <label class="form-check-label" for="inlineCheckbox1">Typhi Dot</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_hepa" id="hepa" value="Hepa Profile">
                                <label class="form-check-label" for="inlineCheckbox1">Hepa Profile</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_bun" id="bun" value="BUN">
                                <label class="form-check-label" for="inlineCheckbox1">Blood Urea Nitrogen</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_crea" id="crea" value="Crea">
                                <label class="form-check-label" for="inlineCheckbox1">Creatinine</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_fbs" id="fbs" value="FBS">
                                <label class="form-check-label" for="inlineCheckbox1">Fetal Blood Sampling</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_uricacid" id="uricacid" value="Uric Acid">
                                <label class="form-check-label" for="inlineCheckbox1">Uric Acid</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_rbs" id="rbs" value="RBS">
                                <label class="form-check-label" for="inlineCheckbox1">Random Blood Sugar</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_ogct" id="ogct" value="OGCT">
                                <label class="form-check-label" for="inlineCheckbox1">Oral Glucose Challenge Test</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_chole" id="chole" value="Chole">
                                <label class="form-check-label" for="inlineCheckbox1">Chole</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_hdldtg" id="hdldtg" value="HD/LD/TG">
                                <label class="form-check-label" for="inlineCheckbox1">HD/LD/TG</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_nakci" id="nakci" value="Na,K,CI">
                                <label class="form-check-label" for="inlineCheckbox1">Na,K,CI (Sodium-Potassium-Chloride)</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_t3t4tsh" id="t3t4tsh" value="T3/T4/TSH">
                                <label class="form-check-label" for="inlineCheckbox1">T3/T4/TSH</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lab_pregtest" id="pregtest" value="Pregnancy Test">
                                <label class="form-check-label" for="inlineCheckbox1">Pregnancy Test</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-center">
                                <div class="input-group">
                                    <input type="text" class="form-control shadow-none border-top-0 border-start-0 border-end-0 rounded-0 text-center" value="<?= $info->rcode ?>. <?= $info->firstname ?> <?= $info->middlename ?> <?= $info->lastname ?>" readonly>
                                </div>
                            </div>
                            <center><label for="sign" class="text-center mt-2">Signature</label></center>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" onclick="prepareAndSubmitForm()" class="btn btn-success savebtn">Save <i class="fas fa-save"></i></button>
                <button type="button" onclick="printLab()" class="btn btn-warning printbtn" style="display: none;">Print <i class="fas fa-print"></i></button>

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
    function lab() {
        var p_name = $('#p_name').val();
        var followUp = $('#followUp').val();
        var prid = $('#p_id').val();

        document.getElementById("prid").value = prid;
        document.getElementById("cname").value = p_name;
        document.getElementById("f_visit").value = followUp;
    }
</script>

<script>
    var filenames = []; // Array to store filenames

    document.getElementById('labresultInput').addEventListener('change', function(event) {
        var fileList = event.target.files;
        var imagesHTML = '';

        // Loop through each file in the fileList
        for (var i = 0; i < fileList.length; i++) {

            var img = document.createElement('img');
            img.src = URL.createObjectURL(fileList[i]);
            img.style.maxWidth = '50px';
            img.style.height = '30px';
            img.style.marginRight = '10px';
            document.getElementById('labresultImages').appendChild(img);

            // Store filename in the array
            filenames.push(fileList[i].name);
        }
    });

    function submitFcItr() {
        var p_id = $('#p_id').val();
        var pid = $('#pid').val();
        var access_id = $('#access_id').val();
        var visit = $('#visit').val();
        var drorder = $('#drorder').val();
        var followUp = $('#followUp').val();
        var time = $('#time').val();

        var hasbund_Data = {
            'hf_name': $('#hf_name').val(),
            'hm_name': $('#hm_name').val(),
            'hl_name': $('#hl_name').val(),
            'hage': $('#hage').val(),
            'hoccu': $('#hoccu').val(),
        };

        var notes_Data = {
            'Menarche': $('#Menarche').val(),
            'Interval': $('#Interval').val(),
            'Duration': $('#Duration').val(),
            'G': $('#G').val(),
            'P': $('#P').val(),
            'oth': $('#oth').val(),
            'LMP': $('#LMP').val(),
            'EDC': $('#EDC').val(),
            'AOG': $('#AOG').val(),
            'WT': $('#WT').val(),
            'HT': $('#HT').val(),
            'Temp': $('#Temp').val(),
            'BP': $('#BP').val(),
            'Nutritional_status': $('#Nutritional_status').val(),
            'Td_Immunization': $('#Td_Immunization').val(),
            'datedose': $('#datedose').val(),
            'ftmethod': $('#ftmethod').val(),
            'fundicHt': $('#fundicHt').val(),
            'L1': $('#L1').val(),
            'L2': $('#L2').val(),
            'L3': $('#L3').val(),
            'L4': $('#L4').val(),
            'fht': $('#fht').val()
        };

        var medical_history_data = {};
        $('input[name^="medical_history"]:checked').each(function() {
            medical_history_data[$(this).attr('name')] = $(this).val();
        });
        medical_history_data['Others'] = $('#Others').val();

        var personal_social_history_data = {};
        $('input[name^="personal_social_history"]:checked').each(function() {
            personal_social_history_data[$(this).attr('name')] = $(this).val();
        });

        var lab_result_data = {};
        $('input[name^="lab2_type[]"]:checked').each(function() {
            // lab_result_data[$(this).attr('name')] = $(this).val();
            var value = $(this).val();

            // Check if the key already exists in the object
            if (lab_result_data[value]) {
                // If the key exists, push the value to the existing array
                lab_result_data[value].push(value);
            } else {
                // If the key doesn't exist, create a new array with the value
                lab_result_data[value] = [value];
            }
        });
        lab_result_data['labdate'] = $('#labdate').val();
        lab_result_data['result'] = $('#result').val();
        lab_result_data['result_img'] = filenames;

        var dental_decord_data = {};
        $('input[name^="Dental"]:checked').each(function() {
            dental_decord_data[$(this).attr('name')] = $(this).val();
        });

        var counseling_data = {};
        $('input[name^="counseling"]:checked').each(function() {
            counseling_data[$(this).attr('name')] = $(this).val();
        });
        counseling_data['Others'] = $('#cothe').val();

        // Convert data to JSON
        var hasbund_Json = JSON.stringify(hasbund_Data);
        var notes_Json = JSON.stringify(notes_Data);
        var medical_history_Json = JSON.stringify(medical_history_data);
        var personal_social_history_Json = JSON.stringify(personal_social_history_data);
        var lab_result_Json = JSON.stringify(lab_result_data);
        var dental_decord_Json = JSON.stringify(dental_decord_data);
        var counseling_Json = JSON.stringify(counseling_data);

        // alert(lab_result_Json);

        $.ajax({
            url: '../doctor/fcitr',
            method: 'POST',
            data: {
                'p_id': p_id,
                'pid': pid,
                'access_id': access_id,
                'drorder': drorder,
                'visit': visit,
                'followUp': followUp,
                'time': time,
                'hasbund_Json': hasbund_Json,
                'notes_Json': notes_Json,
                'medical_history_Json': medical_history_Json,
                'personal_social_history_Json': personal_social_history_Json,
                'lab_result_Json': lab_result_Json,
                'dental_decord_Json': dental_decord_Json,
                'counseling_Json': counseling_Json
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                // $('button[type="button"]').prop('disabled', true);
                $('.printitrform').show();
                $('.submititrform').hide();

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
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Submitted successfully  "
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
    function saveimg() {
        var formData = new FormData();
        var files = $('#labresultInput')[0].files;

        for (var i = 0; i < files.length; i++) {
            formData.append('img_file[]', files[i]);
        }
        var isValid = true;
        var lab_img = $('#labresultInput').val();
        if (!lab_img) {
            $('#invalidImg').html('<i class="fas fa-exclamation-circle ms-2"></i> Please insert an image.');
            $('#invalidImg').show();
            $('#labresultInput').addClass('is-invalid');
            isValid = false;
        } else {
            $('#labresultInput').removeClass('is-invalid');
            $('#invalidImg').hide();
        }

        if (!isValid) {
            return false;
        }

        $.ajax({
            url: '../doctor/savelab_img',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                // $('button[id="addbtn"]').prop('disabled', true);
                $('#labresultInput').addClass('is-valid');

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
                        // window.location.href = "../doctor/newpatients";
                        $('#labresultInput').removeClass('is-valid');
                        $('#labresultInput').val('');
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
    window.jsPDF = window.jspdf.jsPDF;

    function printitr() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('itrForm');

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

<!-- lab part  -->
<script>
    function prepareAndSubmitForm() {
        var prid = $('#prid').val();
        var impre = $('#impre').val();
        var reffby = $('#reffby').val();
        var f_visit = $('#f_visit').val();

        var formData = {};

        // strored checked Checkboxes
        $('input[name^="lab"]:checked').each(function() {
            formData[$(this).attr('name')] = $(this).val();
        });

        // Convert the form data to JSON
        var jsonData = JSON.stringify(formData);

        //console.log(jsonData);

        var isValid = true;

        var reffby = $('#reffby').val();
        if (!reffby) {
            $('#invalidRefby').html('<i class="fas fa-exclamation-circle ms-2"></i> Reffered By is required.');
            $('#invalidRefby').show();
            $('#reffby').addClass('is-invalid');
            isValid = false;
        } else {
            $('#reffby').removeClass('is-invalid');
            $('#invalidRefby').hide();
        }

        var f_visit = $('#f_visit').val();
        if (!f_visit) {
            $('#invalidf_visit').html('<i class="fas fa-exclamation-circle ms-2"></i> Follow-up visit is required.');
            $('#invalidf_visit').show();
            $('#f_visit').addClass('is-invalid');
            isValid = false;
        } else {
            $('#f_visit').removeClass('is-invalid');
            $('#invalidf_visit').hide();
        }

        var impre = $('#impre').val();
        if (!impre) {
            $('#invalidImpre').html('<i class="fas fa-exclamation-circle ms-2"></i>  Impression is required.');
            $('#invalidImpre').show();
            $('#impre').addClass('is-invalid');
            isValid = false;
        } else {
            $('#impre').removeClass('is-invalid');
            $('#invalidImpre').hide();
        }

        var cname = $('#cname').val();
        if (!cname) {
            $('#invalidName').html('<i class="fas fa-exclamation-circle ms-2"></i>  Name is required.');
            $('#invalidName').show();
            $('#cname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#cname').removeClass('is-invalid');
            $('#invalidName').hide();
        }

        // Check if formData is empty
        var isValidCbox = Object.keys(formData).length > 0;

        if (!isValidCbox) {
            $('#invalidPregtest').html('<i class="fas fa-exclamation-circle ms-2"></i> Labotarory is required.');
            $('#invalidPregtest').show();
            $('input[type=checkbox]').addClass('is-invalid');
            isValid = false;
        } else {
            $('input[type=checkbox]').removeClass('is-invalid');
            $('#invalidPregtest').hide();
        }

        if (!isValid) {
            return false;
        }

        $.ajax({
            url: '../doctor/submitrstlab',
            method: 'POST',
            data: {
                'prid': prid,
                'impre': impre,
                'reffby': reffby,
                'f_visit': f_visit,
                'jsonData': jsonData
            },

            beforeSend: function() {
                $('#loadinggif').show();
            },

            success: function(response) {

                // Disable the Save button
                $('.savebtn').prop('disabled', true);
                $('.savebtn').hide();
                $('.printbtn').show();

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    // didClose: () => {
                    //     window.location.href = "../doctor/newpatients";
                    // }
                });
                Toast.fire({
                    icon: "success",
                    title: "Laboratory save successfully"
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

    function printLab() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('printForm');

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
    $(document).ready(function() {
        // Add hover event handler to the div element
        $('.itr').hover(function() {
            // When mouse enters the div, show the modal
            $('#itr_modal').modal('show');
        }, function() {
            // When mouse leaves the div, do nothing (optional)
        });
    });
</script>