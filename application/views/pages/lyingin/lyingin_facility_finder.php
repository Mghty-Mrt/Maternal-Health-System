<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <?php foreach ($facilityType as $ftyp) { ?>
                <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="fas fa-hospital"></i> <?= $ftyp->name ?> Suggestions / <span class="text-muted">Refer Patient</span> </h5>

                <div class="row">

                    <div class="col-md-6 mt-2">
                        <label>Referring Facility Type</label>
                        <div class="input-group">
                            <input type="text" class="form-control shadow-none" value="<?= $ftyp->name ?>" readonly>
                        </div>
                    </div>

                    <?php if ($ftyp->id == 3) { ?>
                        <div class="col-md-6 mt-2">
                            <label for="case">Patient Case</label>
                            <div class="input-group">
                                <select name="case" id="case" class="form-select" onchange="filterCase()">
                                    <option selected>-- Select Case --</option>
                                    <?php foreach ($equipmentType as $et) { ?>
                                        <option value="<?= $et->id ?>"><?= $et->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    <?php } ?>

                <?php } ?>
                </div>

                <!-- hospital -->
                <?php if ($ftyp->id == 3) { ?>
                    <div class="row mt-3" id="facilitiesContainer">
                        <?php

                        foreach ($facilities as $fc) {
                        ?>
                            <input type="hidden" name="patient_id" id="patient_id" value="<?php print $patient_id ?>">
                            <input type="hidden" name="rp_id" id="rp_id" value="<?php print $rp_id ?>">
                            <div class="col-md-4">
                                <div class="card card-hover">
                                    <div class="card-body">
                                        <?php if ($fc->image == "") { ?>
                                            <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                                        <?php } else { ?>
                                            <img src="/mhs_micro/facilities/<?php print $fc->image ?>" class="rounded-3 img-fluid" style="height: 200px" width="100%">
                                        <?php } ?>

                                        <?php
                                        $havailableCount = 0;

                                        foreach ($hospitalbed as $ly) {
                                            if ($ly->fid == $fc->id && $ly->slot_status == 1) {
                                                $havailableCount++;
                                            }
                                        }
                                        ?>

                                        <?php
                                        $hnotavailableCount = 0;

                                        foreach ($hospitalbed as $ly) {
                                            if ($ly->fid == $fc->id && $ly->slot_status == 0) {
                                                $hnotavailableCount++;
                                            }
                                        }
                                        ?>

                                        <?php
                                        $hoccupiedCount = 0;

                                        foreach ($hospitalbed as $ly) {
                                            if ($ly->fid == $fc->id && $ly->slot_status == 2) {
                                                $hoccupiedCount++;
                                            }
                                        }
                                        ?>
                                        <div class="d-flex justify-content-center mt-1">
                                            <span class='text-main fw-bold text-center'> Available bed slot <b class="text-secondary">[<?= $havailableCount ?>]</b> </span>
                                        </div>
                                        <div class="d-flex justify-content-center mt-2" id="statusContainer">
                                            <span class="badge bg-warning rounded-1 me-2 fs-3"><i class="fas fa-clock"></i> Open</span>
                                            <!-- <span class="badge <?= $index === 0 ? 'bg-success' : 'bg-danger' ?> rounded-1 fs-3"><i class="fas fa-map-marked-alt"></i> <?= $index === 0 ? 'Nearest' : 'Distance' ?> <?= $distanceValue ?>km</span> -->
                                        </div>
                                        <h5 class="card-title mt-2"><?= $fc->name ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                                            <?= $fc->address ?>
                                        </h6>
                                        <!-- <a href="#" class="card-link">View details</a>
                                             <a href="../doctor/referralform?id=<?= $fc->fid ?>" class="card-link">Proceed <i class="fas fa-angle-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" style="width: 50%; height: 50%" alt="Loading...">
    </div>
</div>

<script>
    function filterCase() {
        var case_id = document.getElementById('case').value;
        var patient_id = $('#patient_id').val();
        var rp_id = $('#rp_id').val();

        $.ajax({
            url: '../lyingin/filterFacilities',
            method: 'POST',
            data: {
                case_id: case_id,
                patient_id: patient_id,
                rp_id: rp_id,
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                // Update the content of the facilities container with the new facilities
                document.getElementById('facilitiesContainer').innerHTML = response;
            },
            error: function(error) {
                console.error('Error fetching status: ', error);
            },
            complete: function() {
                $('#loadinggif').hide();
            }
        });
    }
</script>
