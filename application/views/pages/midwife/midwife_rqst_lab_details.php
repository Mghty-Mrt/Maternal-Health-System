<form id="printForm">
<div class="d-flex justify-content-center">
    <img src="../assets/images/logos/quezoncity.png" class="me-1 mt-2" width="80px" height="68px" alt="">
    <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Request Laboratory</small></h5>
    <img src="../assets/images/logos/healthdepartment.png" class="ms-2" width="95px" alt="">
</div>

<hr class="border-5 shadow-none mb-3">

<?php foreach ($PatientsInfo as $perinfo) { ?>
        <input type="hidden" name="prid" id="prid" value="<?= $perinfo->prid ?>">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cname">Name</label>
                <div class="input-group">
                    <input type="text" name="cname" id="cname" class="form-control shadow-none" autocomplete="off" value="<?= $perinfo->firstname ?> <?= $perinfo->middlename ?> <?= $perinfo->lastname ?>" readonly>
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
                    <input type="datetime-local" class="form-control shadow-none" name="f_visit" id="f_visit">
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
                    <input class="form-check-input shadow-none" type="checkbox" name="cbw" id="cbw" value="CBW w/ Platelet">
                    <label class="form-check-label" for="inlineCheckbox1">CBW w/ Platelet</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="bt" id="bt" value="BT">
                    <label class="form-check-label" for="inlineCheckbox1">Bleeding Time</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="ct" id="ct" value="CT/BT">
                    <label class="form-check-label" for="inlineCheckbox1">Clotting Time / Bleeding Time</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="pbs" id="pbs" value="PBS ESR">
                    <label class="form-check-label" for="inlineCheckbox1">Peripheral Blood Smear Erythrocyte Sedimentation Rate</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="uri" id="uri" value="Urinalysis">
                    <label class="form-check-label" for="inlineCheckbox1">Urinalysis</label>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="stool" id="stool" value="Stool">
                    <label class="form-check-label" for="inlineCheckbox1">Stool</label>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="contech" id="contech" value="Concentration Tech. For Amoeba">
                    <label class="form-check-label" for="inlineCheckbox1">Concentration Tech. For Amoeba</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="culsen" id="culsen" value="Culture & Sensitivity">
                    <label class="form-check-label" for="inlineCheckbox1">Culture & Sensitivity</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="occub" id="occub" value="Occult Bld">
                    <label class="form-check-label" for="inlineCheckbox1">Occult Bld</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="aso" id="aso" value="ASO">
                    <label class="form-check-label" for="inlineCheckbox1">Antistreptolysin O</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="vdrl" id="vdrl" value="VDRL">
                    <label class="form-check-label" for="inlineCheckbox1">Venereal Disease Research Laboratory</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="hbsag" id="hbsag" value="HBsAg">
                    <label class="form-check-label" for="inlineCheckbox1">Hepatitis B surface antigen</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="tydot" id="tydot" value="Typhi Dot">
                    <label class="form-check-label" for="inlineCheckbox1">Typhi Dot</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="hepa" id="hepa" value="Hepa Profile">
                    <label class="form-check-label" for="inlineCheckbox1">Hepa Profile</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="bun" id="bun" value="BUN">
                    <label class="form-check-label" for="inlineCheckbox1">Blood Urea Nitrogen</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="crea" id="crea" value="Crea">
                    <label class="form-check-label" for="inlineCheckbox1">Creatinine</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="fbs" id="fbs" value="FBS">
                    <label class="form-check-label" for="inlineCheckbox1">Fetal Blood Sampling</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="uricacid" id="uricacid" value="Uric Acid">
                    <label class="form-check-label" for="inlineCheckbox1">Uric Acid</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="rbs" id="rbs" value="RBS">
                    <label class="form-check-label" for="inlineCheckbox1">Random Blood Sugar</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="ogct" id="ogct" value="OGCT">
                    <label class="form-check-label" for="inlineCheckbox1">Oral Glucose Challenge Test</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="chole" id="chole" value="Chole">
                    <label class="form-check-label" for="inlineCheckbox1">Chole</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="hdldtg" id="hdldtg" value="HD/LD/TG">
                    <label class="form-check-label" for="inlineCheckbox1">HD/LD/TG</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="nakci" id="nakci" value="Na,K,CI">
                    <label class="form-check-label" for="inlineCheckbox1">Na,K,CI (Sodium-Potassium-Chloride)</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="t3t4tsh" id="t3t4tsh" value="T3/T4/TSH">
                    <label class="form-check-label" for="inlineCheckbox1">T3/T4/TSH</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input shadow-none" type="checkbox" name="pregtest" id="pregtest" value="Pregnancy Test">
                    <label class="form-check-label" for="inlineCheckbox1">Pregnancy Test</label>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="d-flex justify-content-center">
                    <div class="input-group">
                        <input type="text" class="form-control shadow-none border-top-0 border-start-0 border-end-0 rounded-0 text-center text-uppercase" value="<?= $info->rcode ?>. <?= $info->firstname ?> <?= $info->middlename ?> <?= $info->lastname ?>" readonly>
                    </div>
                </div>
                <center><label for="sign" class="text-center mt-2">Signature</label></center>
            </div>
            <div class="col-md-3"></div>
        </div>
    </form>

    <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> -->
        <button type="button" onclick="prepareAndSubmitForm()" class="btn btn-success savebtn">Save <i class="fas fa-save"></i></button>
        <button type="button" onclick="printLab()" class="btn btn-warning printbtn" style="display: none;">Print <i class="fas fa-print"></i></button>
        <!-- <a href="../doctor/printLab?id=<?= $perinfo->prid ?>" style="display: none;" target="_blank" class="btn btn-warning printbtn">Print <i class="fas fa-print"></i></a> -->
    </div>

<?php } ?>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
    </div>
</div>

<script>
    function prepareAndSubmitForm() {
        var prid = $('#prid').val();
        var impre = $('#impre').val();
        var reffby = $('#reffby').val();
        var f_visit = $('#f_visit').val();

        var formData = {};

        // strored checked Checkboxes
        $('input[type=checkbox]:checked').each(function() {
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
            url: '../midwife/submitrstlab',
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