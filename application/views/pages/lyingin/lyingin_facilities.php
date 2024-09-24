<?php
// Create an array combining availability and distance information
$combined = [];
foreach ($facilities as $index => $fac) {
    $facilityAvailability = true;
    foreach ($equipments as $eq) {
        if ($eq->facilities_id == $fac->fid && $eq->available_qty < 5) {
            $facilityAvailability = false;
            break;
        }
    }

    // Calculate the distance if available
    $distance = isset($distances[$index]['distance']) ? $distances[$index]['distance'] : null;

    $combined[] = [
        'facility' => $fac,
        'availability' => $facilityAvailability,
        'distance' => $distance
    ];
}

// Sort the combined array by availability (available facilities first) and then by distance (nearest first)
usort($combined, function ($a, $b) {
    // Sort by availability first (available facilities first)
    if ($a['availability'] != $b['availability']) {
        return $a['availability'] ? -1 : 1;
    }

    // Sort by distance (nearest first)
    if ($a['distance'] != null && $b['distance'] != null) {
        return $a['distance'] - $b['distance'];
    }

    return 0; // If distances are not available, maintain the order
});
?>

<?php foreach ($combined as $index => $item) { ?>
    <?php
    $facility = $item['facility'];
    $facilityAvailability = $item['availability'];
    $distance = $item['distance'];
    ?>
    <div class="col-md-4">
        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id ?>">
        <input type="hidden" name="rp_id" id="rp_id" value="<?php echo $rp_id ?>">
        <div class="card card-hover">
            <div class="card-body">
                <?php if ($facility->image == "") { ?>
                    <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                <?php } else { ?>
                    <img src="/mhs_micro/facilities/<?php echo $facility->image ?>" class="rounded-3 img-fluid" style="height: 200px" width="100%">
                <?php } ?>

                <?php
                $havailableCount = 0;

                foreach ($hospitalbed as $ly) {
                    if ($ly->fid == $facility->id && $ly->slot_status == 1) {
                        $havailableCount++;
                    }
                }
                ?>

                <?php
                $notavailableCount = 0;

                foreach ($hospitalbed as $ly) {
                    if ($ly->fid == $facility->id && $ly->slot_status == 0) {
                        $notavailableCount++;
                    }
                }
                ?>

                <?php
                $occupiedCount = 0;

                foreach ($hospitalbed as $ly) {
                    if ($ly->fid == $facility->id && $ly->slot_status == 2) {
                        $occupiedCount++;
                    }
                }
                ?>

                <div class="d-flex justify-content-center mt-1">
                    <span class='text-main fw-bold text-center'> Available bed slot <b class="text-secondary">[<?php print $havailableCount ?>]</b> </span>
                </div>

                <div class="d-flex justify-content-center mt-2" id="statusContainer">
                    <?php if ($facilityAvailability && $havailableCount != 0) { ?>
                        <span class="badge bg-success rounded-1 me-2 fs-3"><i class="fas fa-thumbs-up"></i> Available</span>
                    <?php } else { ?>
                        <span class="badge bg-danger rounded-1 me-2 fs-3"><i class="fas fa-thumbs-down"></i> Not Available</span>
                    <?php } ?>
                    <!-- Display the calculated distance here -->
                    <!-- <span class="badge <?php echo $index === 0 ? 'bg-secondary' : 'bg-danger' ?> rounded-1 fs-3">
                        <i class="fas fa-map-marked-alt"></i>
                        <?php echo $index === 0 ? '<small class="fw-semibold">Nearest</small>' : '<small class="fw-thin">Distance</small>' ?>
                        <small class="fw-semibold"><?php echo $distance !== null ? $distance . ' km' : 'N/A' ?></small>
                    </span> -->
                </div>
                <h5 class="card-title mt-2"><?php echo $facility->name ?></h5>
                <h6 class="card-subtitle mb-2 text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                    <?php echo $facility->address ?>
                </h6>
                <div class="d-flex justify-content-between">
                    <?php if ($facilityAvailability && $havailableCount != 0) { ?>
                        <!-- <a href="#" class="card-link">View details</a> -->
                        <a id="referralLink" href="../lyingin/referralform?id=<?php echo $facility->fid ?>&patient_id=<?php echo $patient_id ?>&case_id=<?php print $case_id ?>&rp_id=<?php print $rp_id ?>" class="card-link">Proceed <i class="fas fa-angle-right"></i></a>
                    <?php } else { ?>
                        <!-- <a href="#" class="card-link">View details</a> -->
                        <a class="card-link text-danger">Proceed <i class="fas fa-ban"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

