<div class="container-fluid">
    <div class="card" id="saveitrfrom">
        <div class="card-body">
            <form id="itrForm">

                <?php foreach ($editPatientInfo as $editperinfo) { ?>
                    <input type="hidden" name="pi_id" id="pi_id" value="<?= $editperinfo->pi_id ?>">
                    <input type="hidden" name="p_id" id="p_id" value="<?= $editperinfo->p_id ?>">

                    <!-- <a href="../doctor/newpatients" class=""><i class="ti ti-arrow-back fs-5"></i>Back</a> -->
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Individual Treatment Record</small> <br> (ITR) </h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                        <!-- <a href="../doctor/newpatients" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a> -->
                    </div>

                    <hr class="border-5 shadow-none mb-4">

                    <div id="positiveSection">

                        <div class="row">
                            <div class="col-md-4">
                                <label for="pstatus">Patient's Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $editperinfo->firstname ?> <?= $editperinfo->middlename ?> <?= $editperinfo->lastname ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="findings">Age</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" value="<?= $editperinfo->age ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Occupation</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $editperinfo->occupation ?>">
                                </div>
                            </div>


                            <?php
                            // Decode the JSON data
                            $husbandData = json_decode($editperinfo->husband_data, true);
                            ?>

                            <div class="col-md-4">
                                <label for="hname">Husband's Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hname" id="hname" class="form-control shadow-none" value="<?= $husbandData['hname'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hage">Age</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="hage" id="hage" class="form-control shadow-none" value="<?= $husbandData['hage'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="hoccu">Occupation</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="hoccu" id="hoccu" class="form-control shadow-none" value="<?= $husbandData['hoccu'] ?? '' ?>">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="pstatus">Contact Number</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $editperinfo->mobileno ?> ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="findings">Address</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value=" <?= $editperinfo->street ?> " readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Barangay</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $editperinfo->fname ?> ">
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

                                            <textarea name="drorder" id="drorder" cols="1000" rows="70" class="rounded-2 p-3 form-control shadow-none"><?= $editperinfo->doctor_order ?></textarea>

                                        </td>
                                        <!-- MIDWIVE'S NOTES INPUT-->
                                        <td>

                                            <?php
                                            // Decode the JSON data
                                            $husbandData = json_decode($editperinfo->notes, true);
                                            ?>

                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label for="Menarche">Menarche</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Menarche" name="Menarche" class="form-control shadow-none" value="<?= $husbandData['Menarche'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Interval">Interval</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Interval" name="Interval" class="form-control shadow-none" value="<?= $husbandData['Interval'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="Duration">Duration</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Duration" name="Duration" class="form-control shadow-none" value="<?= $husbandData['Duration'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="G">Gravida</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="G" name="G" class="form-control shadow-none" value="<?= $husbandData['G'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="P">Para</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="P" name="P" class="form-control shadow-none" value="<?= $husbandData['P'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="oth"> ()</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="oth" name="oth" class="form-control shadow-none" value="<?= $husbandData['oth'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="LMP">Last Menstrual Period</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="LMP" name="LMP" class="form-control shadow-none" value="<?= $husbandData['LMP'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="EDC">Estimated Date of Confinement</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="EDC" name="EDC" class="form-control shadow-none" value="<?= $husbandData['EDC'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Age of Gestation</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="AOG" name="AOG" class="form-control shadow-none" value="<?= $husbandData['AOG'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Weight</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="WT" name="WT" class="form-control shadow-none" value="<?= $husbandData['WT'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Height</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="HT" name="HT" class="form-control shadow-none" value="<?= $husbandData['HT'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Temperature</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Temp" name="Temp" class="form-control shadow-none" value="<?= $husbandData['Temp'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Blood Pressure</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="BP" name="BP" class="form-control shadow-none" value="<?= $husbandData['BP'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Nutritional status</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Nutritional_status" name="Nutritional_status" class="form-control shadow-none" value="<?= $husbandData['Nutritional_status'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Td Immunization</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="Td_Immunization" name="Td_Immunization" class="form-control shadow-none" value="<?= $husbandData['Td_Immunization'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="">Status (Date given/dose)</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="date" id="datedose" name="datedose" class="form-control shadow-none" value="<?= $husbandData['datedose'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="">FT method used</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="ftmethod" name="ftmethod" class="form-control shadow-none" value="<?= $husbandData['ftmethod'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="">(Leopold's Method) Fundic ht.</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="fundicHt" name="fundicHt" class="form-control shadow-none" placeholder="cm." value="<?= $husbandData['fundicHt'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 1</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L1" name="L1" class="form-control shadow-none" value="<?= $husbandData['L1'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 2</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L2" name="L2" class="form-control shadow-none" value="<?= $husbandData['L2'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 3</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L3" name="L3" class="form-control shadow-none" value="<?= $husbandData['L3'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="">Lumbar Vertebrae 4</label><br>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="L4" name="L4" class="form-control shadow-none" value="<?= $husbandData['L4'] ?? '' ?>">
                                                    </div>
                                                </div>

                                                <div class="table-responsive">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label class="">FHT</label><br>
                                                            <div class="input-group mb-3">
                                                                <input type="text" id="fht" name="fht" class="form-control shadow-none" placeholder="/min" value="<?= $husbandData['fht'] ?? '' ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    // Decode the JSON data
                                                    $medical_h = json_decode($editperinfo->medical_history, true);
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
                                                                <input type="checkbox" id="Tubercolosis" name="medical_history_Tubercolosis" class="form-check-input shadow-none" value="Tubercolosis" <?= in_array('Tubercolosis', $medical_h) ? 'checked' : '' ?>>
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
                                                                <input type="checkbox" id="Allergy" name="medical_history_Allergy" class="form-check-input shadow-none" value="Allergy" <?= in_array('Allergy', $medical_h) ? 'checked' : '' ?>>
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
                                                                    <input type="text" id="m_Others" name="medical_history_Others" class="form-control shadow-none" value="<?= $medical_h['Others'] ?? '' ?>">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <?php
                                                        // Decode the JSON data
                                                        $personal_h = json_decode($editperinfo->personal_social_history, true);
                                                        ?>

                                                        <div class="mb-2 mt-2">
                                                            <div>
                                                                <label class="fw-semibold">Personal/Social History:</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">

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

                                                            <div class="col-md-4">
                                                                <label for="drugs" class="">Taking Prohibited Drugs</label><br>
                                                                <div class="">
                                                                    <input type="checkbox" id="drucs" name="personal_social_history_drucs" class="form-check-input shadow-none" value="Taking Prohibited Drugs" <?= in_array('Taking Prohibited Drugs', $personal_h) ? 'checked' : '' ?>><br>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <label for="lab" class="fw-semibold mt-3">LABORATORY EXAM</label>
                                                        <table class="table table-bordered text-nowrap mb-3 align-middle text-center">
                                                            <tr>
                                                                <th class="border-bottom-0 bg-light">
                                                                    <h6 class="mb-0">Date</h6>
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
                                                                                    <?php
                                                                                    // Decode the JSON data
                                                                                    $lab_result = json_decode($editperinfo->laboratory_exam, true);
                                                                                    ?>
                                                                                    <!-- <input type="checkbox" id="type" name="lab_type" class="form-check-input shadow-none p-2" value="<?= "$value" ?>" <?= in_array($value, $lab_result) ? 'checked' : '' ?>> -->
                                                                                </small> <?= "$value" ?>
                                                                            </p>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>

                                                                        <?php
                                                                        // Decode the JSON data
                                                                        $lab_result = json_decode($editperinfo->laboratory_exam, true);
                                                                        ?>

                                                                        <?php if ($lab_result == "") { ?>
                                                                            <p></p>
                                                                        <?php } else { ?>
                                                                            <p class="border rounded-2 p-2"><?= $lab_result['result'] ?? '' ?></p>
                                                                        <?php } ?>
                                                                        <div class="row mt-3">
                                                                            <div class="col-md-12">
                                                                                <div id="labresultImages">
                                                                                    <?php
                                                                                    if (isset($lab_result['result_img']) && is_array($lab_result['result_img'])) {
                                                                                        print '<div class="row">';
                                                                                        foreach ($lab_result['result_img'] as $filename) {
                                                                                            // Generate the path to the image
                                                                                            $imagePath = '/mhs_micro/lab_result/' . $filename;

                                                                                            // Display the image
                                                                                            print '<div class="col-md-3">';
                                                                                            print '<a href="' . htmlspecialchars($imagePath) . '" target="_blank">';
                                                                                            print '<img src="' . htmlspecialchars($imagePath) . '" class="img-fluid border rounded-1" style="width: 80px; height: 35px;" alt="' . htmlspecialchars($filename) . '">';
                                                                                            print '</a>';
                                                                                            print '</div>';
                                                                                        }
                                                                                        print '</div>';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>


                                                        </table>

                                                        <?php
                                                        // Decode the JSON data
                                                        $dental_r = json_decode($editperinfo->dental_record, true);
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
                                                        // $counseling_on = json_decode($editperinfo->counseling, true);
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
                                                            <div class="col-md-6">
                                                                <label for="followUp">Follow-Up Checkup</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="date" name="followUp" id="followUp" class="form-control shadow-none" value="<?= $editperinfo->followUp_checkUp ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="time">Time</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="time" name="time" id="time" class="form-control shadow-none" value="<?= $editperinfo->time ?>" required>
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
                                    <input type="text" class="form-control shadow-none" value="Positive" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="pstatus">Email Address<small class="text-info">*change this if inactive.</small></label>
                                <div class="input-group mb-3">
                                    <input type="email" name="email" id="email" class="form-control shadow-none" value="<?= $editperinfo->email ?>">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="pstatus">Mobile Number <small class="text-info">*change this if inactive.</small></label>
                                <div class="input-group mb-3">
                                    <input type="number" name="mno" id="mno" class="form-control shadow-none" value="<?= $editperinfo->mobileno ?>">
                                </div>
                            </div>
                        </div>

                        <hr class="border-5 shadow-none mb-4">

            </form>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <!-- <button type="button" onclick="updateitr()" class="btn btn-primary updateitrform">Save Changes <i class="fas fa-save"></i></button> -->
                <!-- <button type="button" class="btn btn-warning printitrform" onclick=printirt() style="display: none;">Print <i class="fas fa-print"></i></button> -->
            </div>
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