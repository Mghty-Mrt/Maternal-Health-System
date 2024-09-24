<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-center">
                <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <small>Lying-in</small> <br> Newborn Record </h5>
                <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
            </div>

            <hr class="border-5 shadow-none">

            <div class="d-flex justify-content-between">
                <h5 class="text-left mt-3 fw-semibold">NAME OF BABY</h5>
            </div>
            <form action="">
                <?php $baby =json_decode($newborn[0]->baby_info, true); ?>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">First Name</label>
                        <div class="input-group">
                            <input type="text" name="bbfname" id="bbfname" class="form-control shadow-none" value=" <?= $baby['firstname'] ?? '' ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Middle Name</label>
                        <div class="input-group">
                            <input type="text" name="bbmname" id="bbmname" class="form-control shadow-none" value=" <?= $baby['middilename'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Last Name</label>
                        <div class="input-group">
                            <input type="text" name="bblname" id="bblname" class="form-control shadow-none" value=" <?= $baby['lastname'] ?? '' ?> " readonly>

                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="form-label">Date Of Birth</label>
                        <input type="date" class="form-control shadow-none" id="bbbdate" value="<?= $baby['birthdate'] ?? '' ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="form-label">Time Of Birth</label>
                        <input type="time" class="form-control shadow-none" id="bbtimebirth" value="<?= $baby['birthtime'] ?? '' ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="">Sex</label>
                        <div class="input-group">
                            <input type="text" class="form-control shadow-none" value="<?= $baby['sex'] ?? ''?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <h5 class="text-left mt-3 fw-semibold">GENERAL APPEARANCE</h5>
                </div>
                <?php $gp = json_decode($newborn[0]->general_apperance, true); ?>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="">Active</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbactive" id="bbactive" class="form-control shadow-none" value="<?= $gp['Active'] ?? '' ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Placcid</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbplaccid" id="bbplaccid" class="form-control shadow-none" value="<?= $gp['Placcid'] ?? '' ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Cyanotic</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbcyanotic" id="bbcyanotic" class="form-control shadow-none" value="<?= $gp['Cyanotic'] ?? '' ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Macerated</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbMacerated" id="bbMacerated" class="form-control shadow-none" value="<?= $gp['Macerated'] ?? '' ?>" readonly>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-left mt-3 fw-semibold">APGAR (Appearance, Pulse, Grimace, Activity, and
Respiration) SCORE</h5>
                    </div>
                    <?php $as = json_decode($newborn[0]->apgar_score, true); ?>
                    <div class="row mt-3 mb-3">
                        <div class="col-md-6">
                            <label for="">At 1 Minute</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bb1min" id="bb1min" class="form-control shadow-none" value="<?= $as['At_1_Minute'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">At 5 Minutes</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bb5min" id="bb5min" class="form-control shadow-none" value="<?= $as['At_5_Minutes'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Heart Rate (per min):</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbhrpermin" id="bbhrpermin" class="form-control shadow-none" value="<?= $as['Heart_Rate_per_min'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Respiratory Rate</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbrespiratoryrate" id="bbrespiratoryrate" class="form-control shadow-none" value="<?= $as['Respiratory_Rate'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Rectal Temperature</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbrectaltemp" id="bbrectaltemp" class="form-control shadow-none" value="<?= $as['Rectal_Temperature'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Weight (in kg.)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbweight" id="bbweight" class="form-control shadow-none" value="<?= $as['Weight'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Length (cm)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bblength" id="bblength" class="form-control shadow-none" value="<?= $as['Length'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Head Circumference(cm)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbheadcircum" id="bbheadcircum" class="form-control shadow-none" value="<?= $as['Head_Circumference'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Chest Circumference(cm)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbchestcircum" id="bbchestcircum" class="form-control shadow-none" value="<?= $as['Chest_Circumference'] ?? '' ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-left mt-2 fw-semibold">MATURATION INDEX</h5>
                    </div>
                    <?php $mi = json_decode($newborn[0]->maturation_index, true); ?>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Term</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbterm" id="bbterm" class="form-control shadow-none" value="<?= $mi['Term'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Preterm</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbpreterm" id="bbpreterm" class="form-control shadow-none" value="<?= $mi['Preterm'] ?? '' ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Post Mature</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbpostmature" id="bbpostmature" class="form-control shadow-none" value="<?= $mi['Post_Mature'] ?? '' ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-left mt-2 fw-semibold">ROUTINE NEWBORN CARE</h5>
                    </div>
                    <?php $rnc = json_decode($newborn[0]->routine_newborn_care, true); ?>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">BGC(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" name="bbbgcdate" id="bbbgcdate" class="form-control shadow-none" value="<?= $rnc['BGC'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Hepatitis B1(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" name="bbHepatitisb1" id="bbHepatitisb1" class="form-control shadow-none" value="<?= $rnc['Hepatitis_B1'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Vitamin K(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" name="bbVitamink" id="bbVitamink" class="form-control shadow-none" value="<?= $rnc['Vitamin_K'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Credes Prophylaxis:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbCredesProphylaxis" id="bbCredesProphylaxis" class="form-control shadow-none" value="<?= $rnc['Credes_Prophylaxis'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Cord Dressing:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbCordDressing" id="bbCordDressing" class="form-control shadow-none" value="<?= $rnc['Cord_Dressing'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Cord Dressing done by:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbcorddressdoneby" id="bbcorddressdoneby" class="form-control shadow-none" value="<?= $rnc['Cord_Dressing_done_by'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Examined by:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbExaminedby" id="bbExaminedby" class="form-control shadow-none" value="<?= $rnc['Examined_by'] ?? '' ?>">
                            </div>
                        </div>
                        <th>
                            <div class="d-flex justify-content-between">
                                <h5 class="text-left mt-3 mb-2 fw-semibold">INITIAL DIAGNOSIS:</h5>
                            </div>
                        </th>
                        <tr>
                            <td>
                                <p class="p-4 rounded-2" style="border: 1px solid lightgray;"><?= $newborn[0]->initial_diagnosis ?></p>
                            </td>
                        </tr>
                        <th>
                            <div class="d-flex justify-content-between">
                                <h5 class="text-left mt-4 mb-2 fw-semibold">ABNORMAL FINDINGS:</h5>
                            </div>
                        </th>
                        <tr>
                            <td>     
                                <p class="p-4 rounded-2" style="border: 1px solid lightgray;"><?= $newborn[0]->abnormal_findings ?></p>
                            </td>
                        </tr>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th colspan="3">
                                    <div class>
                                        <h5 class="card-title mb-10 fs-5 fw-semibold text-center">Course in the ward (Newborn)</h5>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="col-md-12 mb-0 fw-bolder fs-3 text-center">Date (Time)</div>
                                                </th>
                                                <th>
                                                    <div class="col-md-12 mb-0 fw-bolder fs-3 text-center">MD's Order's</div>
                                                </th>
                                                <th>
                                                    <div class="col-md-12 mb-0 fw-bolder fs-3 text-center">Date (Time)</div>
                                                </th>
                                                <th>
                                                    <div class="col-md-12 mb-0 fw-bolder fs-3 text-center">MIDWIFE's NOTE'S</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php $mod = json_decode($newborn[0]->md_order, true) ?>
                                                <td>
                                                    <input type="datetime-local" name="md_orderdate" id="md_orderdate" class="form-control shadow-none" value="<?= $mod['md_order_date'] ?? ''?>">
                                                </td>
                                                <td>
                                                    <p class="p-4 rounded-2" style="border: 1px solid lightgray"><?= $mod['md_order'] ?? ''?></p>
                                                </td>
                                                
                                                <?php $mnotes = json_decode($newborn[0]->md_notes, true) ?>
                                                <td>
                                                    <input type="datetime-local" name="md_notesdate" id="md_notesdate" class="form-control shadow-none" value="<?= $mnotes['md_notes_date'] ?? '' ?>">
                                                </td>
                                                <td>
                                                    <p class="p-4 rounded-2" style="border: 1px solid lightgray"><?= $mnotes['md_notes'] ?? ''?></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="border-5 shadow-none">

                <div class="col-md-12 d-flex justify-content-end mt-3">
                    <!-- <button type="button" onclick="dltoPdf()" class="btn btn-danger"><i class="ti ti-download"></i> PDF </button>
                    <button type="button" onclick="printNewbornRecord()" class="btn btn-warning ms-2"><i class="ti ti-printer"></i> Print </button> -->
                </div>

            </form>
        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>