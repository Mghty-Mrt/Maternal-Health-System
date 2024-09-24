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

            <div class="d-flex justify-content-center">
                <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <small>Lying-in</small> <br> Delivery Record </h5>
                <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
            </div>

            <hr class="border-5 shadow-none">

            <div class="row">
                <div class="col-md-3">
                    <label class="mb-1 fw-bold">A. Presentation</label>

                </div>
                <?php $record = json_decode($mother[0]->record, true); ?>
                <div class="row">
                    <div class="col-md-3">
                        <label>Cephalic</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Cephalic" name="Cephalic" class="form-control signature shadow-none" value=" <?= $record['Presentation_Cephalic'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Face</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Face" name="Face" class="form-control signature shadow-none" value=" <?= $record['Presentation_Face'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Brow</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Brow" name="Brow" class="form-control signature shadow-none" value=" <?= $record['Presentation_Brow'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Breach</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Breach" name="Breach" class="form-control signature shadow-none" value=" <?= $record['Presentation_Breach'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">B. Amniotic Fluid</label>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Time of Rupture:</label>
                        <div class="input-group mb-3">
                            <?php
                            $timestamp = strtotime($record['AmnioticFluid_TimeOfRapture']);
                            $formatted_time = date('g:i A', $timestamp);
                            ?>
                            <input type="text" id="time_rapture" name="time_rapture" class="form-control signature shadow-none" value=" <?= $formatted_time ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Clear</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Clear" name="Clear" class="form-control signature shadow-none" value=" <?= $record['AmnioticFluid_Clear'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Thin</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Thin" name="Thin" class="form-control signature shadow-none" value=" <?= $record['AmnioticFluid_Thin'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Thick</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Thick" name="Thick" class="form-control signature shadow-none" value=" <?= $record['AmnioticFluid_Thick'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">C. Degree of Laceration</label>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>1st</label>
                        <div class="input-group mb-3">
                            <input type="text" id="1st" name="1st" class="form-control signature shadow-none" value=" <?= $record['DegreeofLaceration_1st'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>2nd</label>
                        <div class="input-group mb-3">
                            <input type="text" id="2nd" name="2nd" class="form-control signature shadow-none" value=" <?= $record['DegreeofLaceration_2nd'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>3rd</label>
                        <div class="input-group mb-3">
                            <input type="text" id="3rd" name="3rd" class="form-control signature shadow-none" value=" <?= $record['DegreeofLaceration_3rd'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>4th</label>
                        <div class="input-group mb-3">
                            <input type="text" id="4th" name="4th" class="form-control signature shadow-none" value=" <?= $record['DegreeofLaceration_4th'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">D. Episiotomy</label>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>None</label>
                        <div class="input-group mb-3">
                            <input type="text" id="None" name="None" class="form-control signature shadow-none" value=" <?= $record['Episiotomy_None'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Midline</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Midline" name="Midline" class="form-control signature shadow-none" value=" <?= $record['Episiotomy_Midline'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Mid-lateral</label>
                        <div class="input-group mb-3">
                            <input type="text" id="mid_lateral" name="mid_lateral" class="form-control signature shadow-none" value=" <?= $record['Episiotomy_mid_lateral'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">E. Placenta</label>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Spontaneous</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Spontaneous" name="Spontaneous" class="form-control signature shadow-none" value=" <?= $record['Placenta_Spontaneous'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Manual</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Manual" name="Manual" class="form-control signature shadow-none" value=" <?= $record['Placenta_Manual'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Complete</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Complete" name="Complete" class="form-control signature shadow-none" value=" <?= $record['Placenta_Complete'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Incomplete</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Incomplete" name="Incomplete" class="form-control signature shadow-none" value=" <?= $record['Placenta_Incomplete'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">F. Cord</label>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Normal</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Normal" name="Normal" class="form-control signature shadow-none" value=" <?= $record['Cord_Normal'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Cord loop:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="cord_loop" name="cord_loop" class="form-control signature shadow-none" value=" <?= $record['Cord_CordLoop'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Tight</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Tight" name="Tight" class="form-control signature shadow-none" value=" <?= $record['Cord_Tight'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Loose</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Loose" name="Loose" class="form-control signature shadow-none" value=" <?= $record['Cord_Loose'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">G. Initial Breastfeeding</label>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Yes</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Yes" name="Yes" class="form-control signature shadow-none" value=" <?= $record['InitialBreastfeeding_Yes'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>No</label>
                        <div class="input-group mb-3">
                            <input type="text" id="No" name="No" class="form-control signature shadow-none" value=" <?= $record['InitialBreastfeeding_NO'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">H. Estimated Blood Loss:</label>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>ml</label>
                        <div class="input-group mb-3">
                            <input type="text" id="ml" name="ml" class="form-control signature shadow-none" value=" <?= $record['EstimatedBloodLoss_Yes'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>>500ml</label>
                        <div class="input-group mb-3">
                            <input type="text" id="500ml" name="500ml" class="form-control signature shadow-none" value=" <?= $record['EstimatedBloodLoss_NO'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <label class="mb-1 fw-bold">I. Diagnosis:</label>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <p class="rounded-2 p-4" style="border: 1px solid lightgray"><?php print $mother[0]->diagnose ?></p>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <?php $attending = json_decode($mother[0]->attending_physicians, true); ?>
                    <div class="col-md-6">
                        <label>Delivered by:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="deliv_by" name="deliv_by" class="form-control signature shadow-none" value=" <?= $attending['Delivered_by'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Signature(Printed Name):</label>
                        <div class="input-group mb-3">
                            <input type="text" id="deliv_sign" name="deliv_sign" class="form-control signature shadow-none" value=" <?= $attending['Delivered_sign'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Assisted by:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="assist_by" name="assist_by" class="form-control signature shadow-none" value=" <?= $attending['Assisted_by'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Signature(Printed Name):</label>
                        <div class="input-group mb-3">
                            <input type="text" id="assist_sign" name="assist_sign" class="form-control signature shadow-none" value=" <?= $attending['Assisted_sign'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Repaired by:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="repaired_by" name="repaired_sign" class="form-control signature shadow-none" value=" <?= $attending['Repaired_by'] ?? '' ?> " readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Signature(Printed Name):</label>
                        <div class="input-group mb-3">
                            <input type="text" id="repaired_sign" name="repaired_sign" class="form-control signature shadow-none" value=" <?= $attending['Repaired_sign'] ?? '' ?> " readonly>
                        </div>

                    </div>
                </div>

            </div>

            <hr class="border-5 shadow-none" style="border: 2px dashed;">

            <?php $md1 = json_decode($mother[0]->md_order_1, true); ?>
            <h5 class="fw-bold mb-3 text-center text-main">Course In The Ward</h5>
            <hr class="mb-3">
            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <?php
                            $timestamp = strtotime($md1['md_datetime']);
                            $formatted_datetime = date('F j, Y g:i A', $timestamp);
                        ?>
                        <input type="text" id="md_datetime" name="md_order_md_datetime" class="form-control shadow-none" value="<?= $formatted_datetime ?? '' ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold">MD's Order's:</label><br>
                    <div class="mb-3">
                        <input type="checkbox" id="Admits_patient" name="md_order_Admits_patient" value="Admits patient" <?= in_array('Admits patient', $md1) ? 'checked' : '' ?>>
                        <label for="proc1"> Admits patient</label><br>
                        <input type="checkbox" id="Secure_consent" name="md_order_Secure_consent" value="Secure consent" <?= in_array('Secure consent', $md1) ? 'checked' : '' ?>>
                        <label for="proc2"> Secure consent</label><br>
                        <input type="checkbox" id="m_bp" name="md_order_m_bp" value="Monitor BP, (?), progress of labor" <?= in_array('Monitor BP, (?), progress of labor', $md1) ? 'checked' : '' ?>>
                        <label for="proc3"> Monitor BP, (?), progress of labor</label>
                        <input type="text" id="md_sign" name="md_order_md_sign" class="signature mt-3" value="<?= $md1['md_sign'] ?? '' ?>"><br>
                        <label for="sig1">signature</label>
                    </div>
                </div>
            <?php $mdn1 = json_decode($mother[0]->md_notes_1, true); ?>
                <div class="col-md-3">
                        <?php
                            $timestampn = strtotime($mdn1['DateTime']);
                            $formatted_datetimen = date('F j, Y g:i A', $timestampn);
                        ?>
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <input type="text" id="md_datetime_note" name="md_datetime_note" class="form-control shadow-none" value="<?= $formatted_datetimen ?? '' ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold">Midwife's Note:</label><br>
                    <div class="mb-3">
                        <p class="p-4 rounded-2" style="border: 1px solid lightgray"><?= $mdn1['MidwifeNotes'] ?? '' ?></p>
                    </div>
                </div>
            </div>

            <?php $md2 = json_decode($mother[0]->md_order_2, true); ?>
            <div class="row">
                <div class="col-md-3">
                        <?php
                            $timestamp2 = strtotime($md2['md2_datetime']);
                            $formatted_datetime2 = date('F j, Y g:i A', $timestamp2);
                        ?>
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <input type="text" id="md2_datetime" name="md_order2_md2_datetime" class="form-control shadow-none" value="<?= $formatted_datetime2 ?? '' ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold">MD's Order's:</label><br>
                    <div class="mb-3">
                        <input type="checkbox" id="vital_sign" name="md_order2_vital_sign" value="Vital signs q 15 mins" <?= in_array('Vital signs q 15 mins', $md2) ? 'checked' : '' ?>>
                        <label for="proc4"> Vital signs q 15 mins</label><br>
                        <input type="checkbox" id="Oxytocin" name="md_order2_Oxytocin" value="Oxytocin amp.,IM" <?= in_array('xytocin amp.,IM', $md2) ? 'checked' : '' ?>>
                        <label for="proc5"> Oxytocin amp.,IM</label><br>
                        <input type="checkbox" id="Amoxycillin" name="md_order2_Amoxycillin" value="Amoxycillin 500mg. l cap TID" <?= in_array('Amoxycillin 500mg. l cap TID', $md2) ? 'checked' : '' ?>>
                        <label for="proc6"> Amoxycillin 500mg. l cap TID</label><br>
                        <input type="checkbox" id="Mefenamic" name="md_order2_Mefenamic" value="Mefenamic acid 500mg. 1 cap TID" <?= in_array('Mefenamic acid 500mg. 1 cap TID ', $md2) ? 'checked' : '' ?>>
                        <label for="proc7"> Mefenamic acid 500mg. 1 cap TID </label><br>
                        <input type="checkbox" id="FeSo4" name="md_order2_FeSo4" value="FeSo4 1 tab. O.D" <?= in_array('FeSo4 1 tab. O.D', $md2) ? 'checked' : '' ?>>
                        <label for="proc8"> FeSo4 1 tab. O.D</label><br>
                        <input type="checkbox" id="VAC" name="md_order2_VAC" value="VAC 200,000 i.u" <?= in_array('VAC 200,000 i.u', $md2) ? 'checked' : '' ?>>
                        <label for="proc9"> VAC 200,000 i.u</label>
                        <input type="text" id="md2_sign" name="md_order2_md2_sign" class="signature mt-3" value="<?= $md2['md2_sign'] ?? ''?>"><br>
                        <label for="sig2">signature</label>
                    </div>
                </div>

                <?php $mdn2 = json_decode($mother[0]->md_notes_2, true); ?>
                <div class="col-md-3">
                        <?php
                            $timestampn2 = strtotime($mdn2['DateTime']);
                            $formatted_datetimen2 = date('F j, Y g:i A', $timestampn2);
                        ?>
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <input type="text" id="md2_datetime_note" name="md2_datetime_note" class="form-control shadow-none" value=" <?= $formatted_datetimen2 ?? '' ?> ">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold">Midwife's Note:</label><br>
                    <div class="mb-3">
                        <p class="p-4 rounded-2" style="border: 1px solid lightgray"><?= $mdn2['MidwifeNotes'] ?? '' ?></p>
                    </div>
                </div>
            </div>

            <hr class="border-5 shadow-none">

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <button type="button" onclick="dltoPdf()" class="btn btn-danger"><i class="ti ti-download"></i> PDF</button>
                <button type="button" onclick="printDeliveryRecord()" class="btn btn-warning ms-2"><i class="ti ti-printer"></i> Print</button>
            </div>

        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>