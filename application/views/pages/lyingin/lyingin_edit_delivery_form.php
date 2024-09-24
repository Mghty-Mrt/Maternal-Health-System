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
            <div id="deliveryForm">
            <?php foreach($DeliveryRecords as $editdelrecord) { ?>

            <div class="d-flex justify-content-center">
                <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <small>Lying-in</small> <br> Delivery Record </h5>
                <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
            </div>

            <hr class="border-5 shadow-none">

          
                            <?php
                            // Decode the JSON data
                            $recorD = json_decode($editdelrecord->record, true);
                            ?>

            <div class="row">
                <input type="hidden" id="refer_id" name="refer_id" value=" ">
                <div class="col-md-3">
                    <label class="mb-1 fw-bold">A. Presentation</label>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Cephalic</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Cephalic" name="Cephalic" class="form-control signature shadow-none"  value="<?= $recorD['Presentation_Cephalic'] ?? '' ?>" >
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <label>Face</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Face" name="Face" class="form-control signature shadow-none" value="<?= $recorD['Presentation_Face'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Brow</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Brow" name="Brow" class="form-control signature shadow-none" value="<?= $recorD['Presentation_Brow'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Breach</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Breach" name="Breach" class="form-control signature shadow-none" value="<?= $recorD['Presentation_Breach'] ?? '' ?>">
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
                            <input type="time" id="time_rapture" name="time_rapture" class="form-control signature shadow-none" value="<?= $recorD['AmnioticFluid_TimeOfRapture'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Clear</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Clear" name="Clear" class="form-control signature shadow-none" value="<?= $recorD['AmnioticFluid_Clear'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Thin</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Thin" name="Thin" class="form-control signature shadow-none" value="<?= $recorD['AmnioticFluid_Thin'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Thick</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Thick" name="Thick" class="form-control signature shadow-none" value="<?= $recorD['AmnioticFluid_Thick'] ?? '' ?>">
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
                            <input type="text" id="1st" name="1st" class="form-control signature shadow-none" value="<?= $recorD['DegreeofLaceration_1st'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>2nd</label>
                        <div class="input-group mb-3">
                            <input type="text" id="2nd" name="2nd" class="form-control signature shadow-none" value="<?= $recorD['DegreeofLaceration_2nd'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>3rd</label>
                        <div class="input-group mb-3">
                            <input type="text" id="3rd" name="3rd" class="form-control signature shadow-none" value="<?= $recorD['DegreeofLaceration_3rd'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>4th</label>
                        <div class="input-group mb-3">
                            <input type="text" id="4th" name="4th" class="form-control signature shadow-none" value="<?= $recorD['DegreeofLaceration_4th'] ?? '' ?>">
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
                            <input type="text" id="None" name="None" class="form-control signature shadow-none  value="<?= $recorD['Episiotomy_None'] ?? '' ?>"">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Midline</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Midline" name="Midline" class="form-control signature shadow-none"  value="<?= $recorD['Episiotomy_Midline'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Mid-lateral</label>
                        <div class="input-group mb-3">
                            <input type="text" id="mid_lateral" name="mid_lateral" class="form-control signature shadow-none"  value="<?= $recorD['Episiotomy_mid_lateral'] ?? '' ?>">
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
                            <input type="text" id="Spontaneous" name="Spontaneous" class="form-control signature shadow-none" value="<?= $recorD['Placenta_Spontaneous'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Manual</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Manual" name="Manual" class="form-control signature shadow-none" value="<?= $recorD['Placenta_Manual'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Complete</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Complete" name="Complete" class="form-control signature shadow-none" value="<?= $recorD['Placenta_Complete'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Incomplete</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Incomplete" name="Incomplete" class="form-control signature shadow-none" value="<?= $recorD['Placenta_Incomplete'] ?? '' ?>">
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
                            <input type="text" id="Normal" name="Normal" class="form-control signature shadow-none" value="<?= $recorD['Cord_Normal'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Cord loop:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="cord_loop" name="cord_loop" class="form-control signature shadow-none" value="<?= $recorD['Cord_CordLoop'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Tight</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Tight" name="Tight" class="form-control signature shadow-none" value="<?= $recorD['Cord_Tight'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Loose</label>
                        <div class="input-group mb-3">
                            <input type="text" id="Loose" name="Loose" class="form-control signature shadow-none" value="<?= $recorD['Cord_Loose'] ?? '' ?>">
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
                            <input type="text" id="Yes" name="Yes" class="form-control signature shadow-none" value="<?= $recorD['InitialBreastfeeding_Yes'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>No</label>
                        <div class="input-group mb-3">
                            <input type="text" id="No" name="No" class="form-control signature shadow-none" value="<?= $recorD['InitialBreastfeeding_NO'] ?? '' ?>">
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
                            <input type="text" id="ml" name="ml" class="form-control signature shadow-none" value="<?= $recorD['EstimatedBloodLoss_Yes'] ?? '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>>500ml</label>
                        <div class="input-group mb-3">
                            <input type="text" id="500ml" name="500ml" class="form-control signature shadow-none" value="<?= $recorD['EstimatedBloodLoss_NO'] ?? '' ?>">
                        </div>

                    </div>
                </div>



                <div class="col-md-3">
                    <label class="mb-1 fw-bold">I. Diagnosis:</label>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <textarea name="Diagnosis" id="Diagnosis" cols="160" rows="8" class="form-control shadow-none"><?= $editdelrecord->diagnose ?> </textarea>
                        </div>

                    </div>
                </div>


                    
                            <?php
                            // Decode the JSON data
                            $recorD = json_decode($editdelrecord->attending_physicians, true);
                            ?>

                <div class="row">
                    <div class="col-md-6">
                        <label>Delivered by:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="deliv_by" name="deliv_by" class="form-control signature shadow-none" value="<?= $recorD['Delivered_by'] ?? '' ?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Signature(Printed Name):</label>
                        <div class="input-group mb-3">
                            <input type="text" id="deliv_sign" name="deliv_sign" class="form-control signature shadow-none" value="<?= $recorD['Delivered_sign'] ?? '' ?>" >
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Assisted by:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="assist_by" name="assist_by" class="form-control signature shadow-none" value="<?= $recorD['Assisted_by'] ?? '' ?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Signature(Printed Name):</label>
                        <div class="input-group mb-3">
                            <input type="text" id="assist_sign" name="assist_sign" class="form-control signature shadow-none" value="<?= $recorD['Assisted_sign'] ?? '' ?>" >
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Repaired by:</label>
                        <div class="input-group mb-3">
                            <input type="text" id="repaired_by" name="repaired_sign" class="form-control signature shadow-none" value="<?= $recorD['Repaired_by'] ?? '' ?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Signature(Printed Name):</label>
                        <div class="input-group mb-3">
                            <input type="text" id="repaired_sign" name="repaired_sign" class="form-control signature shadow-none" value="<?= $recorD['Repaired_sign'] ?? '' ?>" >
                        </div>
                    </div>
                </div>

            </div>

            <hr class="border-5 shadow-none" style="border: 2px dashed;">


                            <?php
                            // Decode the JSON data
                            $mdorder1 = json_decode($editdelrecord->md_order_1, true);
                            ?>

            <h5 class="fw-bold mb-3 text-center text-main">Course In The Ward</h5>
            <hr class="mb-3">
            <div class="row mt-3">
                <div class="col-md-3">
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <input type="datetime-local" id="md_datetime" name="md_order_md_datetime" class="form-control shadow-none"  value="<?= $mdorder1['md_datetime'] ?? '' ?>">
                    </div>
                </div>


                            

                <div class="col-md-3">
                    <label class="fw-bold">MD's Order's:</label><br>
                    <div class="mb-3">
                        <input type="checkbox" id="Admits_patient" name="md_order_Admits_patient" value="Admits patient"  <?= in_array('Admits patient', $mdorder1) ? 'checked' : '' ?>>
                        <label for="proc1"> Admits patient</label><br>
                        <input type="checkbox" id="Secure_consent" name="md_order_Secure_consent" value="Secure consent"  <?= in_array('Secure consent', $mdorder1) ? 'checked' : '' ?>>
                        <label for="proc2"> Secure consent</label><br>
                        <input type="checkbox" id="m_bp" name="md_order_m_bp" value="Monitor BP, (?), progress of labor"  <?= in_array('Monitor BP, (?), progress of labor', $mdorder1) ? 'checked' : '' ?>>
                        <label for="proc3"> Monitor BP, (?), progress of labor</label>


                        <input type="text" id="md_sign" name="md_order_md_sign" class="signature mt-3" value="<?= $mdorder1['md_sign'] ?? '' ?>" ><br>
                        <label for="sig1">signature</label>
                    </div>
                </div>

                            <?php
                            // Decode the JSON data
                            $recorD = json_decode($editdelrecord->md_notes_1, true);
                            ?>

                <div class="col-md-3">
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <input type="datetime-local" id="md_datetime_note" name="md_datetime_note" class="form-control shadow-none"  value="<?= $recorD['DateTime'] ?? '' ?>">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <label class="fw-bold">Midwife's Note:</label><br>
                    <div class="mb-3">
                        <textarea name="md_order_md_notes" id="md_notes" cols="35" rows="10" class="form-control shadow-none"> <?= $recorD['MidwifeNotes'] ?? '' ?> </textarea>
                    </div>
                </div>
            </div>

                            <?php
                            // Decode the JSON data
                            $mdorder2 = json_decode($editdelrecord->md_order_2, true);
                            ?>

            <div class="row">
                <div class="col-md-3">
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <input type="datetime-local" id="md2_datetime" name="md_order2_md2_datetime" class="form-control shadow-none" value="<?= $mdorder2['md2_datetime'] ?? '' ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold">MD's Order's:</label><br>
                    <div class="mb-3">
                        <input type="checkbox" id="vital_sign" name="md_order2_vital_sign" value="Vital signs q 15 mins"   <?= in_array('Vital signs q 15 mins', $mdorder2) ? 'checked' : '' ?>>
                        <label for="proc4"> Vital signs q 15 mins</label><br>
                        <input type="checkbox" id="Oxytocin" name="md_order2_Oxytocin" value="Oxytocin amp.,IM"   <?= in_array('Oxytocin amp.,IM', $mdorder2) ? 'checked' : '' ?>>
                        <label for="proc5"> Oxytocin amp.,IM</label><br>
                        <input type="checkbox" id="Amoxycillin" name="md_order2_Amoxycillin" value="Amoxycillin 500mg. l cap TID"  <?= in_array('Amoxycillin 500mg. l cap TID', $mdorder2) ? 'checked' : '' ?>>
                        <label for="proc6"> Amoxycillin 500mg. l cap TID</label><br>
                        <input type="checkbox" id="Mefenamic" name="md_order2_Mefenamic" value="Mefenamic acid 500mg. 1 cap TID "  <?= in_array('Mefenamic acid 500mg. 1 cap TID', $mdorder2) ? 'checked' : '' ?>>
                        <label for="proc7"> Mefenamic acid 500mg. 1 cap TID </label><br>
                        <input type="checkbox" id="FeSo4" name="md_order2_FeSo4" value="FeSo4 1 tab. O.D"  <?= in_array('FeSo4 1 tab. O.D', $mdorder2) ? 'checked' : '' ?>>
                        <label for="proc8"> FeSo4 1 tab. O.D</label><br>
                        <input type="checkbox" id="VAC" name="md_order2_VAC" value="VAC 200,000 i.u"  <?= in_array('VAC 200,000 i.u', $mdorder2) ? 'checked' : '' ?>>
                        <label for="proc9"> VAC 200,000 i.u</label>

                        <input type="text" id="md2_sign" name="md_order2_md2_sign" class="signature mt-3"  value="<?= $mdorder2['md2_sign'] ?? '' ?>"> <br>
                        <label for="sig2">signature</label>
                    </div>
                </div>

                            <?php
                            // Decode the JSON data
                            $mdnotes2 = json_decode($editdelrecord->md_notes_2, true);
                            ?>

                <div class="col-md-3">
                    <label class="fw-bold">Date (Time):</label><br>
                    <div class="input-group mb-3">
                        <input type="datetime-local" id="md2_datetime_note" name="md2_datetime_note" class="form-control shadow-none" value="<?= $mdnotes2['DateTime'] ?? '' ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="fw-bold">Midwife's Note:</label><br>
                    <div class="mb-3">
                        <textarea name="md2_notes" id="md2_notes" cols="35" rows="10" class="form-control shadow-none">  <?= $mdnotes2['MidwifeNotes'] ?? '' ?></textarea>
                    </div>
                </div>
            </div>

            <hr class="border-5 shadow-none">

            </div>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <!-- <button type="button" onclick="submitDeliveryRecord()" class="btn btn-success">Submit <i class="ti ti-send"></i></button> -->
                <button type="button" onclick="printPDF()" class="btn btn-warning ms-2">Print <i class="fas fa-print"></i></button>
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
    window.jsPDF = window.jspdf.jsPDF;

    function printPDF() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('deliveryForm');

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

<!-- <script>
    function submitDeliveryRecord() {
        var refer_id = $('#refer_id').val();
        var diagnosis = $('#Diagnosis').val();

        var record_data = {
            'Presentation_Cephalic': $('#Cephalic').val(),
            'Presentation_Face': $('#Face').val(),
            'Presentation_Brow': $('#Brow').val(),
            'Presentation_Breach': $('#Breach').val(),

            'AmnioticFluid_TimeOfRapture': $('#time_rapture').val(),
            'AmnioticFluid_Clear': $('#Clear').val(),
            'AmnioticFluid_Thin': $('#Thin').val(),
            'AmnioticFluid_Thick': $('#Thick').val(),

            'DegreeofLaceration_1st': $('#1st').val(),
            'DegreeofLaceration_2nd': $('#2nd').val(),
            'DegreeofLaceration_3rd': $('#3rd').val(),
            'DegreeofLaceration_4th': $('#4th').val(),

            'Episiotomy_None': $('#None').val(),
            'Episiotomy_Midline': $('#Midline').val(),
            'Episiotomy_mid_lateral': $('#mid_lateral').val(),
            
            'Placenta_Spontaneous': $('#Spontaneous').val(),
            'Placenta_Manual': $('#Manual').val(),
            'Placenta_Complete': $('#Complete').val(),
            'Placenta_Incomplete': $('#Incomplete').val(),
            
            'Cord_Normal': $('#Normal').val(),
            'Cord_CordLoop': $('#cord_loop').val(),
            'Cord_Tight': $('#Tight').val(),
            'Cord_Loose': $('#Loose').val(),

            'InitialBreastfeeding_Yes': $('#Yes').val(),
            'InitialBreastfeeding_NO': $('#No').val(),
            
            'EstimatedBloodLoss_Yes': $('#ml').val(),
            'EstimatedBloodLoss_NO': $('#500ml').val(),
        };

        var attending_pysicians_data = {
            'Delivered_by': $('#deliv_by').val(),
            'Delivered_sign': $('#deliv_sign').val(),

            'Assisted_by': $('#assist_by').val(),
            'Assisted_sign': $('#assist_sign').val(),

            'Repaired_by': $('#repaired_sign').val(),
            'Repaired_sign': $('#repaired_sign').val(),
        };

        var md_order1_data = {};
        $('input[name^="md_order"]:checked').each(function() {
            md_order1_data[$(this).attr('name')] = $(this).val();
        });
        md_order1_data['md_datetime'] = $('#md_datetime').val();
        md_order1_data['md_sign'] = $('#md_sign').val();

        var md_notes1_data = {
            'DateTime' : $('#md_datetime_note').val(),
            'MidwifeNotes' : $('#md_notes').val(),
        };

        var md_order2_data = {};
        $('input[name^="md_order2"]:checked').each(function() {
            md_order2_data[$(this).attr('name')] = $(this).val();
        });
        md_order2_data['md2_datetime'] = $('#md2_datetime').val();
        md_order2_data['md2_sign'] = $('#md2_sign').val();

        var md_notes2_data = {
            'DateTime' : $('#md2_datetime_note').val(),
            'MidwifeNotes' : $('#md2_notes').val(),
        };

        // Convert data to JSON
        var record_data_Json = JSON.stringify(record_data);
        var attending_pysicians_data_Json = JSON.stringify(attending_pysicians_data);
        var md_order1_data_Json = JSON.stringify(md_order1_data);
        var md_notes1_data_Json = JSON.stringify(md_notes1_data);
        var md_order2_data_Json = JSON.stringify(md_order2_data);
        var md_notes2_data_Json = JSON.stringify(md_notes2_data);

        $.ajax({
                url: '../lyingin/saveDeliveryRecord',
                method: 'POST',
                data: {
                    'refer_id': refer_id,
                    'diagnosis': diagnosis,
                    'record_data_Json': record_data_Json,
                    'attending_pysicians_data_Json': attending_pysicians_data_Json,
                    'md_order1_data_Json': md_order1_data_Json,
                    'md_notes1_data_Json': md_notes1_data_Json,
                    'md_order2_data_Json': md_order2_data_Json,
                    'md_notes2_data_Json': md_notes2_data_Json
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
                            }); Toast.fire({
                                icon: "success",
                                title: "Delivery record saved successfully  "
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