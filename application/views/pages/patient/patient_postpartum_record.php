<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form id="postpartum">
            <div class="d-flex justify-content-center">
                <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <br> (POSTPARTUM) </h5>
                <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
            </div>

            <hr class="border-5 shadow-none">

            <div class="row">

                <div class="col-md-6 mt-3">
                    <label for="" class="">Name of Child</label>
                    <?php
                    // Decode the JSON data
                    $babyrecord = json_decode($postpartum[0]->baby_info, true);
                    ?>
                    <input type="text" value="<?= $babyrecord['Child_Name'] ?? '' ?>" class="form-control shadow-none" id="child" name="baby_info_child" readonly>
                </div>


                <div class="col-md-3 mt-3">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-input" id="male" name="baby_info_male" value="Male" <?= in_array('Male', $babyrecord) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleCheck1">Male</label>
                        </div>
                        <div class="col-md-5">
                            <input type="checkbox" class="form-check-input" id="female" name="baby_info_female" value="Female" <?= in_array('Female', $babyrecord) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">Female</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-input" id="qcr" name="baby_info_qcr" value="QC-R" checked>
                            <label class="form-check-label" for="exampleCheck1">QC-R</label>
                        </div>
                        <div class="col-md-5">
                            <input type="checkbox" class="form-check-input" id="nqcr" name="baby_info_nqcr" value="NQC-R">
                            <label class="form-check-label " for="exampleCheck1">NQC-R</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <label for="dateofbirth" class="">Date of Birth</label>
                    <input type="date" class="form-control shadow-none" id="dateofbirth" name="baby_info_dateofbirth" value="<?= $babyrecord['Date_of_Birth'] ?? '' ?>">
                </div>


                <input type="hidden" id="from">
                <div class="col-md-4 mt-3">
                    <label for="" class="">Place of Delivery :</label>
                    <input type="text" class="form-control shadow-none" id="placeofdelivery" name="baby_info_placeofdelivery" value="<?= $babyrecord['Place_of_Delivery'] ?? '' ?>">
                </div>

                <div class="col-md-4 mt-3">
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <input type="checkbox" class="form-check-input" id="baby_info_qc_nr" name="qcnr" value="QC-NR" checked>
                            <label class="form-check-label" for="exampleCheck1">QC-NR</label>
                        </div>
                        <div class="col-md-5">
                            <input type="checkbox" class="form-check-input" id="baby_info_nqc_nr" name="nqcnr" value="NQC-NR">
                            <label class="form-check-label " for="exampleCheck1">NQC-NR</label>
                        </div>
                    </div>
                </div>



                <div class="col-md-4 mt-3">
                    <label for="" class="">Mother's Name: </label>
                    <input type="text" class="form-control shadow-none" id="moName" name="moName" value="<?php print $postpartum[0]->firstname ?> <?php print $postpartum[0]->middlename ?> <?php print $postpartum[0]->lastname ?> ">
                </div>

                <?php 
                    $edu = json_decode($postpartum[0]->parents_info, true);
                ?>

                <div class="col-md-4 mt-3 mb-3">
                    <label for="" class="">Educational Attainment:</label>
                    <input type="text" class="form-control shadow-none" id="educAttainment" name="educAttainment" value="<?= $edu['Mother_Educational_Attainment'] ?? '' ?>">
                </div>

                <div class="col-md-4 mt-3 mb-3">
                    <label for="" class="">Occupation:</label>
                    <input type="text" class="form-control shadow-none" id="occupation" name="occupation" value="<?php print $postpartum[0]->occupation ?>">
                </div>

                <?php
                // Decode the JSON data
                $fatherData = json_decode($husband[0]->husband_data, true);

                ?>

                <div class="col-md-4">
                    <label for="" class="">Father's Name: </label>
                    <input type="text" class="form-control shadow-none" id="faName" name="faName" value="<?= $fatherData['hname'] ?? '' ?>">
                </div>

                <div class="col-md-4">
                    <label for="address" class="">Educational Attainment:</label>
                    <input type="text" class="form-control shadow-none" id="educAttainment" name="educAttainment" value="<?= $edu['Father_Educational_Attainment'] ?? '' ?>">
                </div>

                <div class="col-md-4">
                    <label for="address" class="">Occupation:</label>
                    <input type="text" class="form-control shadow-none" id="occupation" name="occupation" value="<?= $fatherData['hoccu'] ?? '' ?>">
                </div>

                <div class="col-md-12 mt-3 mb-3">
                    <label for="" class="">Address: </label>
                    <input type="text" class="form-control shadow-none" id="address" name="address" value="<?php print $postpartum[0]->street ?> <?php print $postpartum[0]->fname ?> Quezon City">
                </div>

                <input type="hidden" name="patient_id" id="patient_id" value="">
                <div class="col-md-3 mb-3">
                    <label for="" class="">Birth Order</label>
                    <input type="number" class="form-control shadow-none" id="birthOrder" name="baby_info_birthOrder" value="<?= $babyrecord['Birth_order'] ?? '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="" class="">Birth Weight:</label>
                    <input type="text" class="form-control shadow-none" id="birthWt" name="baby_info_birthWt" value="<?= $babyrecord['Birth_Weight'] ?? '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="address" class="">Time of Delivery</label>
                    <input type="time" class="form-control shadow-none" id="timeofdel" name="baby_info_timeofdel" value="<?= $babyrecord['Time_of_Delivery'] ?? '' ?>">
                </div>

                <?php
                // Decode the JSON data
                $p_d = json_decode($postpartum[0]->patients_records, true);

                ?>

                <div class="col-md-3 ">
                    <label class="label" for="exampleCheck1">CPAB:</label>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="tt1" name="patients_records_tt1" value="TT1" <?= in_array('TT1', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleCheck1">TT 1</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="tt2" name="patients_records_tt2" value="TT2" <?= in_array('TT2', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT 2</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="tt3" name="patients_records_tt3" value="TT3" <?= in_array('TT3', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT 3</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="tt4" name="patients_records_tt4" value="TT4" <?= in_array('TT4', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT 4</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="tt5" name="patients_records_tt5" value="TT5" <?= in_array('TT5', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT 5</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                    <label for="" class="">BCG</label>
                    <input type="text" class="form-control shadow-none" id="bcg" name="patients_records_bcg" value="<?= $p_d['BCG'] ?? '' ?>">
                </div>

                <div class="col-md-2">
                    <label for="" class="">Hepa B1 (w/in 24h)</label>
                    <input type="text" class="form-control shadow-none" id="hepab1" name="patients_records_hepab1" value="<?= $p_d['Hepa_b1'] ?? '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="" class="">OPV (Oral Polio Vaccine) 1</label>
                    <input type="text" class="form-control shadow-none" id="opv1" name="patients_records_opv1" value="<?= $p_d['Opv1'] ?? '' ?>">
                </div>
                <div class="col-md-3">
                    <label for="" class="">Pentavalent 1</label>
                    <input type="text" class="form-control shadow-none" id="penta1" name="patients_records_penta1" value="<?= $p_d['Penta1'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label for="" class="">(R)</label>
                    <input type="text" class="form-control shadow-none" id="r" name="patients_records_r" value="<?= $p_d['R'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label for="" class="">(L)</label>
                    <input type="text" class="form-control shadow-none" id="l" name="patients_records_l" value="<?= $p_d['L'] ?? '' ?>">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="" class="">More than 24h:</label>
                    <input type="text" class="form-control shadow-none" id="morethan24" name="patients_records_morethan24" value="<?= $p_d['More_than_24h'] ?? '' ?>">
                </div>

                <div class="col-md-6 mt-3">
                </div>

                <div class="col-md-2 mt-3">
                    <label for="" class="">Hepa B2</label>
                    <input type="text" class="form-control shadow-none" id="hepab2" name="patients_records_hepab2" value="<?= $p_d['Hepa_b2'] ?? '' ?>">
                </div>

                <div class="col-md-3 mt-3">
                    <label for="" class="">OPV (Oral Polio Vaccine) 2</label>
                    <input type="text" class="form-control shadow-none" id="opv2" name="patients_records_opv2" value="<?= $p_d['Opv2'] ?? '' ?>">
                </div>
                <div class="col-md-3 mt-3">
                    <label for="" class="">Pentavalent 2</label>
                    <input type="text" class="form-control shadow-none" id="penta2" name="patients_records_penta2" value="<?= $p_d['Penta2'] ?? '' ?>">
                </div>
                <div class="col-md-2 mt-3">
                    <label for="" class="">(R)</label>
                    <input type="text" class="form-control shadow-none" id="r" name="patients_records_r" value="<?= $p_d['R'] ?? '' ?>">
                </div>
                <div class="col-md-2 mt-3">
                    <label for="" class="">(L)</label>
                    <input type="text" class="form-control shadow-none" id="l" name="patients_records_l" value="<?= $p_d['L'] ?? '' ?>">
                </div>

                <div class="col-md-2 mt-3">
                    <label for="" class="">Hepa B2</label>
                    <input type="text" class="form-control shadow-none" id="hepab2" name="patients_records_hepab2" value="<?= $p_d['Hepa_b2'] ?? '' ?>">
                </div>

                <div class="col-md-3 mt-3">
                    <label for="" class="">OPV (Oral Polio Vaccine) 3</label>
                    <input type="text" class="form-control shadow-none" id="opv3" name="patients_records_opv3" value="<?= $p_d['Opv3'] ?? '' ?>">
                </div>
                <div class="col-md-3 mt-3">
                    <label for="" class="">Pentavalent 3</label>
                    <input type="text" class="form-control shadow-none" id="penta3" name="patients_records_penta3" value="<?= $p_d['Penta3'] ?? '' ?>">
                </div>
                <div class="col-md-2 mt-3">
                    <label for="" class="">(R)</label>
                    <input type="text" class="form-control shadow-none" id="r" name="patients_records_r" value="<?= $p_d['R'] ?? '' ?>">
                </div>
                <div class="col-md-2 mt-3">
                    <label for="" class="">(L)</label>
                    <input type="text" class="form-control shadow-none" id="l" name="patients_records_l" value="<?= $p_d['L'] ?? '' ?>">
                </div>




                <div class="col-md-4 mb-3 mt-3">
                    <label for="" class="">Rota 1</label>
                    <input type="text" class="form-control shadow-none" id="rota1" name="patients_records_rota1" value="<?= $p_d['Rota1'] ?? '' ?>">
                </div>

                <div class="col-md-4 mt-3">
                    <label for="" class="">MCV 1 (AMV): </label>
                    <input type="text" class="form-control shadow-none" id="mcv1" name="patients_records_mcv1" value="<?= $p_d['Mcv1'] ?? '' ?>">
                </div>

                <div class="col-md-4 mt-3">
                    <label for="" class="">Vitamin A: (6M) </label>
                    <input type="text" class="form-control shadow-none" id="vita" name="patients_records_vita" value="<?= $p_d['Vita'] ?? '' ?>">
                </div>

                <div class="col-md-4 mb-3 ">
                    <label for="" class="">Rota 2</label>
                    <input type="text" class="form-control shadow-none" id="rota2" name="patients_records_rota2" value="<?= $p_d['Rota2'] ?? '' ?>">
                </div>

                <div class="col-md-4 ">
                    <label for="" class="">MCV 2 (MMR): </label>
                    <input type="text" class="form-control shadow-none" id="mcv2" name="patients_records_mcv2" value="<?= $p_d['Mcv2'] ?? '' ?>">
                </div>

                <div class="col-md-4 ">
                    <label for="" class=""> (IY) </label>
                    <input type="text" class="form-control shadow-none" id="iy" name="patients_records_iy" value="<?= $p_d['Iy'] ?? '' ?>">
                </div>

                <div class="col-md-4 mb-3 ">
                    <label for="" class="">Rota 3</label>
                    <input type="text" class="form-control shadow-none" id="rota3" name="patients_records_rota3" value="<?= $p_d['Rota3'] ?? '' ?>">
                </div>

                <div class="col-md-8 ">
                    <label for="" class="">Other: </label>
                    <input type="text" class="form-control shadow-none" id="other" name="patients_records_other" value="<?= $p_d['Other'] ?? '' ?>">
                </div>



                <div class="col-md-4 ">
                    <label class="label" for="exampleCheck1">CPAB:</label>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="t1" name="patients_records_cpabt1" value="TT1" <?= in_array('TT1', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleCheck1">TT 1</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="t2" name="patients_records_cpabt2" value="TT2" <?= in_array('TT2', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT2</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="t3" name="patients_records_cpabt3" value="TT3" <?= in_array('TT3', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT 3</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="t4" name="patients_records_cpabt4" value="TT4" <?= in_array('TT4', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT 4</label>
                        </div>
                        <div class="col-md-2">
                            <input type="checkbox" class="form-check-input" id="t5" name="patients_records_cpabt5" value="TT5" <?= in_array('TT5', $p_d) ? 'checked' : '' ?>>
                            <label class="form-check-label " for="exampleCheck1">TT 5</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mt-0 mb-4">
                    <label for="address" class="">Complimentary Feeding:</label>
                    <input type="text" class="form-control shadow-none" id="feeding" name="patients_records_feeding" value="<?= $p_d['Complimentary_Feeding'] ?? '' ?>">
                </div>
                <!-- <a href="../doctor/newpatients" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a> -->
            </div>

            <hr class="border-5 shadow-none">
            </form>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <!-- <button type="button" onclick="submitPostpartum()" class="btn btn-success">Submit <i class="ti ti-send"></i></button> -->
                <!-- <button type="button" onclick="printPdf()" class="btn btn-warning ms-2">Print <i class="fas fa-print"></i></button> -->
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
    window.jsPDF = window.jspdf.jsPDF;

    function printPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('postpartum');

        html2canvas(htmlElement, {
            allowTaint: true,
            scale: 1,
            scrollY: -window.scrollY,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var imgWidth = jsPdf.internal.pageSize.getWidth() - 65;
            var imgHeight = canvas.height * imgWidth / canvas.width;

            jsPdf.addImage(imgData, 'PNG', 30, 30, imgWidth, imgHeight);

            jsPdf.autoPrint(); // Automatically prints the PDF
            window.open(jsPdf.output('bloburl'), '_blank');
        });
    }
</script>