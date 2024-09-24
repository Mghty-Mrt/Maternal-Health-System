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
                        // Sort the distances array based on the distance value in ascending order
                        usort($distances, function ($a, $b) {
                            return $a['distance'] - $b['distance'];
                        });

                        foreach ($distances as $index => $distance) {
                            $facility = $distance['facility'];
                            $distanceValue = $distance['distance'];
                        ?>
                            <input type="hidden" name="patient_id" id="patient_id" value="<?php print $patient_id ?>">
                            <div class="col-md-4">
                                <div class="card card-hover">
                                    <div class="card-body">
                                        <?php if ($distance['facility']->image == "") { ?>
                                            <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                                        <?php } else { ?>
                                            <img src="/mhs_micro/facilities/<?php print $distance['facility']->image ?>" class="rounded-3 img-fluid" style="height: 200px" width="100%">
                                        <?php } ?>

                                        <?php
                                        $havailableCount = 0;

                                        foreach ($hospitalbed as $ly) {
                                            if ($ly->fid == $distance['facility']->id && $ly->slot_status == 1) {
                                                $havailableCount++;
                                            }
                                        }
                                        ?>

                                        <?php
                                        $hnotavailableCount = 0;

                                        foreach ($hospitalbed as $ly) {
                                            if ($ly->fid == $distance['facility']->id && $ly->slot_status == 0) {
                                                $hnotavailableCount++;
                                            }
                                        }
                                        ?>

                                        <?php
                                        $hoccupiedCount = 0;

                                        foreach ($hospitalbed as $ly) {
                                            if ($ly->fid == $distance['facility']->id && $ly->slot_status == 2) {
                                                $hoccupiedCount++;
                                            }
                                        }
                                        ?>
                                        <div class="d-flex justify-content-center mt-1">
                                            <span class='text-main fw-bold text-center'> Available bed slot <b class="text-secondary">[<?= $havailableCount ?>]</b> </span>
                                        </div>
                                        <div class="d-flex justify-content-center mt-2" id="statusContainer">
                                            <span class="badge bg-warning rounded-1 me-2 fs-3"><i class="fas fa-clock"></i> Open</span>
                                            <span class="badge <?= $index === 0 ? 'bg-success' : 'bg-danger' ?> rounded-1 fs-3"><i class="fas fa-map-marked-alt"></i> <?= $index === 0 ? 'Nearest' : 'Distance' ?> <?= $distanceValue ?>km</span>
                                        </div>
                                        <h5 class="card-title mt-2"><?= $facility->name ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                                            <?= $facility->address ?>
                                        </h6>
                                        <!-- <a href="#" class="card-link">View details</a>
                                             <a href="../doctor/referralform?id=<?= $facility->fid ?>" class="card-link">Proceed <i class="fas fa-angle-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <!-- lying-in -->
                <?php if ($ftyp->id == 5) { ?>
                    <div class="row mt-3">
                        <?php foreach ($facilities as $fac) { ?>
                            <input type="hidden" name="patient_id" id="patient_id" value="<?php print $patient_id ?>">
                            <div class="col-md-4">
                                <div class="card card-hover">
                                    <div class="card-body">
                                        <?php if ($fac->image == "") { ?>
                                            <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                                        <?php } else { ?>
                                            <img src="/mhs_micro/facilities/<?php print $fac->image ?>" class="rounded-3 img-fluid" style="height: 200px" width="100%">
                                        <?php } ?>
                                        <!-- <img src="../assets/images/backgrounds/qcmc.jpg" class="rounded-3 img-fluid" width="100%"> -->

                                        <?php
                                        $availableCount = 0;

                                        foreach ($lyingin as $ly) {
                                            if ($ly->fid == $fac->fid && $ly->slot_status == 1) {
                                                $availableCount++;
                                            }
                                        }
                                        ?>

                                        <?php
                                        $notavailableCount = 0;

                                        foreach ($lyingin as $ly) {
                                            if ($ly->fid == $fac->fid && $ly->slot_status == 0) {
                                                $notavailableCount++;
                                            }
                                        }
                                        ?>

                                        <?php
                                        $occupiedCount = 0;

                                        foreach ($lyingin as $ly) {
                                            if ($ly->fid == $fac->fid && $ly->slot_status == 2) {
                                                $occupiedCount++;
                                            }
                                        }
                                        ?>

                                            <input type="hidden" name="availableCount[]" value="<?= $availableCount ?>">
                                            <input type="hidden" name="notavailableCount[]" value="<?= $notavailableCount ?>">
                                            <input type="hidden" name="occupiedCount[]" value="<?= $occupiedCount ?>">

                                        <div class="d-flex justify-content-center mt-1">
                                            <span class='text-main fw-bold text-center'> Available bed slot <b class="text-secondary">[<?= $availableCount ?>]</b> </span>
                                        </div>
                                        <div class="d-flex justify-content-center mt-2" id="statusContainer">
                                            <?php
                                            $available = false;
                                            $notavailable = false;

                                            foreach ($lyingin as $ly) {
                                                if ($ly->fid == $fac->fid) {
                                                    if ($ly->slot_status == 1) {
                                                        $available = true;
                                                        // break;
                                                    } elseif ($ly->slot_status == 0 || $ly->slot_status == 2) {
                                                        $notavailable = true;
                                                        // break;
                                                    }
                                                }
                                            }
                                            ?>

                                            <?php if ($available) { ?>
                                                <span class="badge bg-success rounded-1 me-2 fs-3"><i class="fas fa-thumbs-up"></i> Available </span>
                                                <!-- <span class="badge bg-secondary rounded-1 fs-3"><i class="fas fa-map-marked-alt"></i> Distance <small class="fw-semibold">N/Akm</small></span> -->
                                            <?php } elseif ($notavailable) { ?>
                                                <span class="badge bg-danger rounded-1 me-2 fs-3"><i class="fas fa-thumbs-down"></i>Not Available</span>
                                                <!-- <span class="badge bg-secondary rounded-1 fs-3"><i class="fas fa-map-marked-alt"></i> Distance <small class="fw-semibold">N/Akm</small></span> -->
                                            <?php } ?>
                                        </div>

                                        <h5 class="card-title mt-2"><?= $fac->name ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                                            <?= $fac->address ?>
                                        </h6>
                                        <div class="d-flex justify-content-between">
                                            <?php if ($available) { ?>
                                                <span class="card-link text-primary view-details" data-swal-toast-template="#view">View details <i class="far fa-eye"></i></span>
                                                <a href="../doctor/referralform?id=<?= $fac->fid ?> &patient_id=<?= $patient_id ?>" class="card-link">Proceed <i class="fas fa-angle-right"></i></a>
                                            <?php } elseif ($notavailable) { ?>
                                                <span class="card-link text-primary view-details" data-swal-toast-template="#view">View details <i class="far fa-eye"></i></span>
                                                <a class="card-link text-danger">Proceed <i class="fas fa-ban"></i></a>
                                            <?php } ?>
                                        </div>
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

        $.ajax({
            url: '../doctor/filterFacilities',
            method: 'POST',
            data: {
                case_id: case_id,
                patient_id: patient_id,
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

<script>
    // Function to update the availability details toast
    function updateAvailabilityDetails(availableCount, notavailableCount, occupiedCount) {
        Swal.mixin({
            toast: true,
            title: "Availability details",
            html: `<p class='text-main'>Available Bed: <span class='text-success'>(${availableCount}) <i class='ti ti-bed ms-1'></i></span> <br> 
                   <span class='text-main'>Not Available Bed:</span> <span class='text-danger'>(${notavailableCount}) <i class='ti ti-bed ms-1'></i></span> <br> 
                   <span class='text-main'>Occupied Bed:</span> <span class='text-warning'>(${occupiedCount}) <i class='ti ti-bed ms-1'></i></span> </p>`,
            icon: "info",
            showConfirmButton: false,
            showCloseButton: true,
            closeButtonAriaLabel: 'Close toast',
        }).bindClickHandler("data-swal-toast-template");
    }

    // Event listener for "View details" click
    $(document).on('click', '.view-details', function() {
        var cardBody = $(this).closest('.card-body');
        var availableCount = cardBody.find('input[name="availableCount[]"]').val();
        var notavailableCount = cardBody.find('input[name="notavailableCount[]"]').val();
        var occupiedCount = cardBody.find('input[name="occupiedCount[]"]').val();

        updateAvailabilityDetails(availableCount, notavailableCount, occupiedCount);
    });
</script>

