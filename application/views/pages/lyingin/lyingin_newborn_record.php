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
                <input type="hidden" name="refer_id" id="refer_id" value="<?php print $refer_id ?>">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">First Name</label>
                        <div class="input-group">
                            <input type="text" name="bbfname" id="bbfname" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Middle Name</label>
                        <div class="input-group">
                            <input type="text" name="bbmname" id="bbmname" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Last Name</label>
                        <div class="input-group">
                            <input type="text" name="bblname" id="bblname" class="form-control shadow-none">

                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="form-label">Date Of Birth</label>
                        <input type="date" class="form-control shadow-none" id="bbbdate">
                    </div>
                    <div class="col-md-4">
                        <label for="form-label">Time Of Birth</label>
                        <input type="time" class="form-control shadow-none" id="bbtimebirth">
                    </div>
                    <div class="col-md-4">
                        <label for="">Sex</label>
                        <div class="input-group">
                            <select name="bbsex" id="bbsex" class="form-select shadow-none">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <h5 class="text-left mt-3 fw-semibold">GENERAL APPEARANCE</h5>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="">Active</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbactive" id="bbactive" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Placcid</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbplaccid" id="bbplaccid" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Cyanotic</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbcyanotic" id="bbcyanotic" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Macerated</label>
                        <div class="input-group mb-3">
                            <input type="text" name="bbMacerated" id="bbMacerated" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-left mt-3 fw-semibold">Appearance, Pulse, Grimace, Activity, and
Respiration SCORE</h5>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col-md-6">
                            <label for="">At 1 Minute</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bb1min" id="bb1min" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">At 5 Minutes</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bb5min" id="bb5min" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Heart Rate (per min):</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbhrpermin" id="bbhrpermin" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Respiratory Rate</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbrespiratoryrate" id="bbrespiratoryrate" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Rectal Temperature</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbrectaltemp" id="bbrectaltemp" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Weight (in kg.)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbweight" id="bbweight" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Length (cm)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bblength" id="bblength" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Head Circumference(cm)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbheadcircum" id="bbheadcircum" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Chest Circumference(cm)</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbchestcircum" id="bbchestcircum" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-left mt-2 fw-semibold">MATURATION INDEX</h5>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">Term</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbterm" id="bbterm" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Preterm</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbpreterm" id="bbpreterm" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Post Mature</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbpostmature" id="bbpostmature" class="form-control shadow-none">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h5 class="text-left mt-2 fw-semibold">ROUTINE NEWBORN CARE</h5>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="">BGC(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" name="bbbgcdate" id="bbbgcdate" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Hepatitis B1(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" name="bbHepatitisb1" id="bbHepatitisb1" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Vitamin K(Date):</label>
                            <div class="input-group mb-3">
                                <input type="datetime-local" name="bbVitamink" id="bbVitamink" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Credes Prophylaxis:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbCredesProphylaxis" id="bbCredesProphylaxis" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Cord Dressing:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbCordDressing" id="bbCordDressing" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Cord Dressing done by:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbcorddressdoneby" id="bbcorddressdoneby" class="form-control shadow-none">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Examined by:</label>
                            <div class="input-group mb-3">
                                <input type="text" name="bbExaminedby" id="bbExaminedby" class="form-control shadow-none">
                            </div>
                        </div>
                        <th>
                            <div class="d-flex justify-content-between">
                                <h5 class="text-left mt-3 mb-2 fw-semibold">INITIAL DIAGNOSIS:</h5>
                            </div>
                        </th>
                        <tr>
                            <td>
                                <textarea name="bbinitialdiagnos" id="bbinitialdiagnos" cols="40" rows="7" class="form-control shadow-none"></textarea>
                            </td>
                        </tr>
                        <th>
                            <div class="d-flex justify-content-between">
                                <h5 class="text-left mt-4 mb-2 fw-semibold">ABNORMAL FINDINGS:</h5>
                            </div>
                        </th>
                        <tr>
                            <td>
                                <textarea name="bbabnormalfindings" id="bbabnormalfindings" cols="40" rows="7" class="form-control shadow-none"></textarea>
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
                                                <td>
                                                    <input type="datetime-local" name="md_orderdate" id="md_orderdate" class="form-control shadow-none">
                                                </td>
                                                <td>
                                                    <textarea name="md_order" id="md_order" cols="50" rows="15" class="form-control shadow-none"></textarea>
                                                </td>
                                                <td>
                                                    <input type="datetime-local" name="md_notesdate" id="md_notesdate" class="form-control shadow-none">
                                                </td>
                                                <td>
                                                    <textarea name="md_notes" id="md_notes" cols="50" rows="15" class="form-control shadow-none"></textarea>
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
                    <button type="button" onclick="submitNewbornRecord()" class="btn btn-success">Submit <i class="ti ti-send"></i></button>
                    <button type="button" onclick="printNewbornRecord()" class="btn btn-warning ms-2">Print <i class="fas fa-print"></i></button>
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

<script>
    function submitNewbornRecord() {
        var refer_id = $('#refer_id').val();
        var initial_diagnosis = $('#bbinitialdiagnos').val();
        var abnormal_findings = $('#bbabnormalfindings').val();

        var baby_data = {
            'firstname': $('#bbfname').val(),
            'middilename': $('#bbmname').val(),
            'lastname': $('#bblname').val(),
            'birthdate': $('#bbbdate').val(),
            'birthtime': $('#bbtimebirth').val(),
            'sex': $('#bbsex').val(),
        };

        var general_apperance_data = {
            'Active': $('#bbactive').val(),
            'Placcid': $('#bbplaccid').val(),
            'Cyanotic': $('#bbcyanotic').val(),
            'Macerated': $('#bbMacerated').val(),
        };
        
        var apgar_score_data = {
            'At_1_Minute': $('#bb1min').val(),
            'At_5_Minutes': $('#bb5min').val(),
            'Heart_Rate_per_min': $('#bbhrpermin').val(),
            'Respiratory_Rate': $('#bbrespiratoryrate').val(),
            'Rectal_Temperature': $('#bbrectaltemp').val(),
            'Weight': $('#bbweight').val(),
            'Length': $('#bblength').val(),
            'Head_Circumference': $('#bbheadcircum').val(),
            'Chest_Circumference': $('#bbchestcircum').val(),
        };

        var maturation_index_data = {
            'Term': $('#bbterm').val(),
            'Preterm': $('#bbpreterm').val(),
            'Post_Mature': $('#bbpostmature').val(),
        };

        var routine_newborn_care_data = {
            'BGC': $('#bbbgcdate').val(),
            'Hepatitis_B1': $('#bbHepatitisb1').val(),
            'Vitamin_K': $('#bbVitamink').val(),
            'Credes_Prophylaxis': $('#bbCredesProphylaxis').val(),
            'Cord_Dressing': $('#bbCordDressing').val(),
            'Cord_Dressing_done_by': $('#bbcorddressdoneby').val(),
            'Examined_by': $('#bbExaminedby').val(),
        };

        var md_order_data = {
            'md_order_date': $('#md_orderdate').val(),
            'md_order': $('#md_order').val(),
        };

        var md_notes_data = {
            'md_notes_date': $('#md_notesdate').val(),
            'md_notes': $('#md_notes').val(),
        };

        // Convert data to JSON
        var baby_data_Json = JSON.stringify(baby_data);
        var general_apperance_data_Json = JSON.stringify(general_apperance_data);
        var apgar_score_data_Json = JSON.stringify(apgar_score_data);
        var maturation_index_data_Json = JSON.stringify(maturation_index_data);
        var routine_newborn_care_data_Json = JSON.stringify(routine_newborn_care_data);
        var md_order_data_Json = JSON.stringify(md_order_data);
        var md_notes_data_Json = JSON.stringify(md_notes_data);

        // console.log(baby_data_Json);

        $.ajax({
            url: '../lyingin/submitnewbornrecord',
            method: 'POST',
            data: {
                'refer_id': refer_id,
                'initial_diagnosis': initial_diagnosis,
                'abnormal_findings': abnormal_findings,
                'baby_data_Json': baby_data_Json,
                'general_apperance_data_Json': general_apperance_data_Json,
                'apgar_score_data_Json': apgar_score_data_Json,
                'maturation_index_data_Json': maturation_index_data_Json,
                'routine_newborn_care_data_Json': routine_newborn_care_data_Json,
                'md_order_data_Json': md_order_data_Json,
                'md_notes_data_Json': md_notes_data_Json
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
                    title: "Newborn record saved successfully  "
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