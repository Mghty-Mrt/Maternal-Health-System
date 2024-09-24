<div class="container-fluid">
    <div class="card md-9 text-right">
        <div class="card-body">
            <!-- Referral Feedback Form -->

            <div id="newpform">
                <div class="d-flex justify-content-center">
                    <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                    <h5 class="card-title fs-4 text-main text-center fs-5 mt-3">Quezon City Health Department <br> <small>Health Center</small> <br> Feedback Form </h5>
                    <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                </div>

                <hr class="border-5 shadow-none">

                <div class="row">
                    <input type="hidden" name="ref_id" id="ref_id" value="">

                    <?php
                    $feed_data = json_decode($feedback[0]->patient_info, true);
                    ?>

                    <div class="col-md-6 mt-9">
                        <label for="Receiving Hospital">Name of Receiving Hospital</label>
                        <input type="text" class="form-control shadow-none" id="Receiving_Hospital" value=" <?= $feed_data['Receiving_Hospital'] ?? '' ?> " placeholder="Hospital Name">
                    </div>

                    <div class="col-md-3 mt-9">
                        <label for="Receiving Hospital">Name of Receiver</label>
                        <div class="input-group">
                            <select name="receiver" id="receiver" class="form-select">
                                <option value=""> <?= $feed_data['Receiver'] ?? '' ?> </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mt-9   ">
                        <label for="Referral No.">Referral Number</label>
                        <input type="text" class="form-control shadow-none" id="ReferralNo" value=" <?= $feed_data['ReferralNo'] ?? '' ?> " placeholder="-----------">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-9">
                        <label for="Patient's Name">Patient's Name</label>
                        <input type="text" class="form-control shadow-none" id="Patient_Name" value=" <?= $feedback[0]->firstname ?> <?= $feedback[0]->middlename ?> <?= $feedback[0]->lastname ?> " placeholder="Complete Name">
                    </div>

                    <div class="col-md-3    ">
                        <label for="receivingPersonnel">Age</label>
                        <input type="text" class="form-control shadow-none" id="patient_age" value=" <?= $feedback[0]->age ?> " placeholder="--">
                    </div>

                    <div class="col-md-12 mt-3 mb-4  ">
                        <label for="receivingFacility">Address</label>
                        <input type="text" class="form-control shadow-none" id="patient_address" value=" <?= $feed_data['Patient_Address'] ?? '' ?> " placeholder="Complete Name">
                    </div>
                </div>

                <?php
                $outcome_result = json_decode($feedback[0]->outcome, true);
                ?>

                <div class="row">
                    <h5 class="fw-semibold mb-3 text-right">Outcome(Please Check):</h5>
                    <div class="col-md-3">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="normalspodeliv" name="outcome_normalspodeliv" value="Normal Spontaneous Delivery" <?= in_array('Normal Spontaneous Delivery', $outcome_result) ? 'checked' : '' ?>>
                            <label for="exampleCheck1">Normal Spontaneous Delivery</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="bloodtransfu" name="outcome_bloodtransfu" value="Blood Transfusion" <?= in_array('Blood Transfusion', $outcome_result) ? 'checked' : '' ?>>
                            <label for="exampleCheck1">Blood Transfusion</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="ceasarean" name="outcome_ceasarean" value="Ceasarean Section" <?= in_array('Ceasarean Section', $outcome_result) ? 'checked' : '' ?>>
                            <label for="exampleCheck1">Ceasarean Section</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="dc" name="outcome_dc" value="D & C" <?= in_array('D & C', $outcome_result) ? 'checked' : '' ?>>
                            <label for="exampleCheck1">Dilatation and Curettage</label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="forcedeliv" name="outcome_forcedeliv" value="Forcep Delivery" <?= in_array('Forcep Delivery', $outcome_result) ? 'checked' : '' ?>>
                            <label for="exampleCheck1">Forcep Delivery</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="others" name="others">
                            <label for="exampleCheck1">Others (Specify):</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control shadow-none" id="others" name="outcome_others">
                    </div>

                    <div class="col-md-12 mb-3 mt-2">
                        <label for="response">Final Diagnosis</label>
                        <p class="border p-3 rounded-2"> - <?= $feedback[0]->final_diagnos ?> </p>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="response">Recommendations</label>
                        <p class="border p-3 rounded-2"> - <?= $feedback[0]->recommendation ?> </p>
                    </div>

                    <hr class="border-5 shadow-none">


                </div>
            </div>

            <div class="col-md-12 d-flex justify-content-end mt-3">
                <!-- <a href="../doctor/itr" class="btn btn-danger me-3"><i class="ti ti-arrow-back-up"></i> Cancel</a> -->
                <button type="button" onclick="generatePdf()" class="btn btn-danger me-2"> <i class="ti ti-download"></i> PDF</button>
                <button type="button" onclick="printPdf()" class="btn btn-warning"> <i class="ti ti-printer"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.jsPDF = window.jspdf.jsPDF;

    function printPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'a4');
        var htmlElement = document.getElementById('newpform');

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


<script>
    window.jsPDF = window.jspdf.jsPDF;

    function generatePdf() {
        let jsPdf = new jsPDF('p', 'pt', 'A4');
        var htmlElement = document.getElementById('newpform');

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
            jsPdf.save("Referral_Feedback.pdf");
            window.open(jsPdf.output('bloburl'));
        });
    }
</script>