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

                    <form action="../doctor/negative" method="POST" class="">
                        <div id="negativeSection" style="display: none;">
                            <input type="hidden" name="id" id="id" value="<?= $perinfo->prid ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nstatus">Pregnancy Status</label>
                                    <div class="input-group mb-3">
                                        <select class="form-select mr-sm-2" name="nstatus" id="nstatus">
                                            <option value="3">Negative</option>
                                            <option value="2">Positive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="findings">Findings</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Other Reasons/Findings <small class="text-danger fs-1">*Optional only</small></label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="other" id="other" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </div>
                    </form>

                    <div id="positiveSection">
                        <input type="hidden" name="prid" id="prid" value="<?= $perinfo->prid ?>">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="pstatus">Patient's Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->firstname ?> <?= $perinfo->middlename ?> <?= $perinfo->lastname ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="findings">Age</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" value="<?= $perinfo->age ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Occupation</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->occupation ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="hname">Husband's Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hname" id="hname" class="form-control shadow-none">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hage">Age</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="hage" id="hage" class="form-control shadow-none">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hoccu">Occupation</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hoccu" id="hoccu" class="form-control shadow-none">
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
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->street ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Barangay</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->bname ?>" readonly>
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
                                            <h6 class=" mb-0 text-center fw-semibold text-main">REMARKS/NOTES</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- DOCTOR'S NOTES INPUT-->
                                        <td>

                                            <textarea name="drorder" id="drorder" cols="1000" rows="70" class="rounded-2 p-3 form-control shadow-none border-0"></textarea>

                                        </td>
                                        <!-- MIDWIVE'S NOTES INPUT-->
                                        <td>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label for="Menarche">Menarche</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Menarche" name="Menarche" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Interval">Interval</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Interval" name="Interval" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Duration">Duration</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Duration" name="Duration" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="G">Gravida</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="G" name="G" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="P">Para</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="P" name="P" class="form-control shadow-none">
                                                    </div>
                                                </div>



                                                <div class="col-md-4">
                                                    <label for="LMP">Last Menstrual Period</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="LMP" name="LMP" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="EDC">Estimated Date of Confinement</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="EDC" name="EDC" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Age of Gestation</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="AOG" name="AOG" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Weight</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="WT" name="WT" class="form-control shadow-none" value="<?= $perinfo->weight ?> kg.">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Height</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="HT" name="HT" class="form-control shadow-none" value="<?= $perinfo->height ?> cm.">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Temperature</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Temp" name="Temp" class="form-control shadow-none" value="<?= $perinfo->temp ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Blood Pressure</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="BP" name="BP" class="form-control shadow-none" value="<?= $perinfo->bp ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Nutritional Status</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Nutritional_status" name="Nutritional_status" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Tetanus Diphtheria Immunization</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Td_Immunization" name="Td_Immunization" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Status (Date given/dose)</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="datedose" name="datedose" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="">FT method used</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="ftmethod" name="ftmethod" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="">(Leopold's Method) Fundal Height</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="fundicHt" name="fundicHt" class="form-control shadow-none" placeholder="cm.">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 1</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L1" name="L1" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 2</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L2" name="L2" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 3</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L3" name="L3" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 4</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L4" name="L4" class="form-control shadow-none">
                                                    </div>
                                                </div>

                                                <div class="table-responsive">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="">Fetal Heart Tone</label><br>
                                                            <div class="input-group mb-3">
                                                                <input type="text" id="fht" name="fht" class="form-control shadow-none" placeholder="/min">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-2">
                                                        <div>
                                                            <label class="fw-semibold">Medical History(Past/Present):</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="hypertension" class="">Hypertension</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Hypertension" name="medical_history_Hypertension" class="form-check-input shadow-none" value="Hypertension">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="TB" class="">Tubercolosis</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Tubercolosis" name="medical_history_Tubercolosis" class="form-check-input shadow-none" value="Tubercolosis">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="diabetes" class="">Diabetes</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Diabetes" name="medical_history_Diabetes" class="form-check-input shadow-none" value="Diabetes">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="allergy" class="">Allergy</label>
                                                            <div class="">
                                                                <input type="checkbox" id="Allergy" name="medical_history_Allergy" class="form-check-input shadow-none" value="Allergy">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="heart_disease" class="">Heart Disease</label>
                                                            <div class="">
                                                                <input type="checkbox" id="heart_disease" name="medical_history_heart_disease" class="form-check-input shadow-none" value="Heart Disease">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="goiter" class="">Goiter</label>
                                                            <div class="">
                                                                <input type="checkbox" id="goiter" name="medical_history_goiter" class="form-check-input shadow-none" value="Goiter">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="sti" class="">STI</label>
                                                            <div class="">
                                                                <input type="checkbox" id="sti" name="medical_history_sti" class="form-check-input shadow-none" value="STI">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="asthma" class="">Bronchial Asthma</label>
                                                            <div class="">
                                                                <input type="checkbox" id="asthma" name="medical_history_asthma" class="form-check-input shadow-none" value="Bronchial Asthma">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="bleeding" class="">Bleeding Disorder</label>
                                                            <div class="">
                                                                <input type="checkbox" id="bleeding" name="medical_history_bleeding" class="form-check-input shadow-none" value="Bleeding Disorder">
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="">
                                                                <label class="">Others</label>
                                                                <div class="input-group mb-6">
                                                                    <input type="text" id="Others" name="medical_history_Others" class="form-control shadow-none">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="mb-2 mt-2">
                                                            <div>
                                                                <label class="fw-semibold">Personal/Social History:</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label for="smoke" class="">Smoking</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="smoke" name="personal_social_history_smoke" class="form-check-input shadow-none" value="Smoking">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="alcohol" class="">Drinking Alcohol</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="alcohol" name="personal_social_history_alcohol" class="form-check-input shadow-none" value="Dringking Alcohol">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="drugs" class="">Taking Prohibited Drugs</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="drucs" name="personal_social_history_drucs" class="form-check-input shadow-none" value="Taking Prohibited Drugs"><br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <label for="lab" class="fw-semibold mt-3">LABORATORY EXAM</label>
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
                                                                        <textarea class="form-control shadow-none mb-2" name="lab_result" id="result" cols="30" rows="2"></textarea>
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

                                                        <div class="mb-2">
                                                            <div>
                                                                <label class="fw-semibold">Dental Record:</label>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-between">
                                                            <p>18</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_18" id="Up_18" value="18">
                                                            <p>17</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_17" id="Up_17" value="17">
                                                            <p>16</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_16" id="Up_16" value="16">
                                                            <p>15</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_15" id="Up_15" value="15">
                                                            <p>14</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_14" id="Up_14" value="14">
                                                            <p>13</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_13" id="Up_13" value="13">
                                                            <p>12</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_12" id="Up_12" value="12">
                                                            <p>11</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_11" id="Up_11" value="11">
                                                            <p>21</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_21" id="Up_21" value="21">
                                                            <p>22</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_22" id="Up_22" value="22">
                                                            <p>23</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_23" id="Up_23" value="23">
                                                            <p>24</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_24" id="Up_24" value="24">
                                                            <p>25</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_25" id="Up_25" value="25">
                                                            <p>26</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_26" id="Up_26" value="26">
                                                            <p>27</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_27" id="Up_27" value="27">
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <p>48</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_48" id="Down_48" value="48">
                                                            <p>47</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_47" id="Down_47" value="47">
                                                            <p>46</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_46" id="Down_46" value="46">
                                                            <p>45</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_45" id="Down_45" value="45">
                                                            <p>44</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_44" id="Down_44" value="44">
                                                            <p>43</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_43" id="Down_43" value="43">
                                                            <p>42</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_42" id="Down_42" value="42">
                                                            <p>41</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_41" id="Down_41" value="41">
                                                            <p>31</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_31" id="Down_31" value="31">
                                                            <p>32</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_32" id="Down_32" value="32">
                                                            <p>33</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_33" id="Down_33" value="33">
                                                            <p>34</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_34" id="Down_34" value="34">
                                                            <p>35</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_35" id="Down_35" value="35">
                                                            <p>36</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_36" id="Down_36" value="36">
                                                            <p>37</p>
                                                            <input type="checkbox" class="form-check-input shadow-none" name="Dental_37" id="Down_37" value="37">
                                                        </div>



                                                        <div class=" mb-2">
                                                            <div>
                                                                <label class="fw-semibold">Counseling On:</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label for="fplan" class="">Family Planning</label><br>
                                                                <div class="input-group">
                                                                    <input type="checkbox" id="fplan" name="counseling_fplan" class="form-check-input shadow-none" value="Family Planning">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="nutri" class="">Nutrition</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="nutri" name="counseling_nutri" class="form-check-input shadow-none" value="Nutrition">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="hrf" class="">High Risk Factors</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="hrf" name="counseling_hrf" class="form-check-input shadow-none" value="High Risk Factors"><br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label for="dsign" class="">Danger Signs</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="dsign" name="counseling_dsign" class="form-check-input shadow-none" value="Danger Signs">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="bfeeding" class="">Breastfeeding</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="bfeeding" name="counseling_bfeeding" class="form-check-input shadow-none" value="Breastfeeding">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="hiv" class="">HIV/AIDS</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="hiv" name="counseling_hiv" class="form-check-input shadow-none" value="HIV/AIDS"><br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="">Others</label>
                                                                <div class="input-group mb-6">
                                                                    <input type="text" id="cothe" name="counseling_cothe" class="form-control shadow-none">
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

                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="pstatus">Pregnancy Status</label>
                                <div class="input-group mb-3">
                                    <select class="form-select shadow-none mr-sm-2" name="pstatus" id="pstatus">
                                        <option selected>-- Select Result --</option>
                                        <option value="2">Positive</option>
                                        <option value="3">Negative</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="pstatus">Email Address : <small class="text-info">*change this if inactive.</small></label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email" class="form-control shadow-none" value="<?= $perinfo->email ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="pstatus">Mobile Number : <small class="text-info">*change this if inactive.</small></label>
                                <div class="input-group mb-3">
                                    <input type="number" name="mno" id="mno" class="form-control shadow-none" value="<?= $perinfo->mobileno ?>" required>
                                </div>
                            </div>
                        </div>

                        <hr class="border-5 shadow-none mb-4">

                </div>
                
        </div>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <button type="button" onclick="submitItr()" class="btn btn-success submititrform">Submit <i class="ti ti-send"></i></button>
                <button type="button" class="btn btn-warning printitrform" onclick="printitr()" style="display: none;">Print <i class="fas fa-print"></i></button>
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

    function submitItr() {
        var prid = $('#prid').val();
        var drorder = $('#drorder').val();
        var email = $('#email').val();
        var followUp = $('#followUp').val();
        var time = $('#time').val();

        var hasbund_Data = {
            'hname': $('#hname').val(),
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
        $('input[name^="lab"]:checked').each(function() {
            lab_result_data[$(this).attr('name')] = $(this).val();
        });
        lab_result_data['labdate'] = $('#labdate').val();
        lab_result_data['result'] = $('#result').val();
        lab_result_data['result_img'] = filenames; // Use the filenames array

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
            url: '../midwife/positive',
            method: 'POST',
            data: {
                'prid': prid,
                'drorder': drorder,
                'email': email,
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
                    timer: 2000,
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
    $(document).ready(function() {
        $('#pstatus').on('change', function() {
            var selectedValue = $(this).val();

            if (selectedValue === '3') { // If positive option is chosen
                $('#negativeSection').show();
                $('#positiveSection').hide();
            } else { // If negative option is chosen or other options
                $('#negativeSection').hide();
                $('#positiveSection').show();
            }
        });
    });

    $(document).ready(function() {
        $('#nstatus').on('change', function() {
            var selectedValue = $(this).val();

            if (selectedValue === '2') { // If positive option is chosen
                $('#positiveSection').show();
                $('#negativeSection').hide();
            } else { // If negative option is chosen or other options
                $('#positiveSection').hide();
                $('#negativeSection').show();
            }
        });
    });
</script>

<!-- validations -->
<script>
    document.getElementById("mno").addEventListener("input", function() {
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
    });
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