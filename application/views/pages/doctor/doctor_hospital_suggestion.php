<?php
// Sort the distances array based on the distance value in ascending order
usort($distances, function($a, $b) {
    return $a['distance'] - $b['distance'];
});

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mb-5 mt-2">
                        <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Hospital Suggestion</span>
                    </h5>
                </div>
                <div class="col-md-4">
                    <form class="position-relative">
                        <input type="text" class="form-control shadow-none search-chat py-2 ps-5 rounded-2" id="text-srh" placeholder="Search Hospital...">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php foreach($distances as $index => $distance) { ?>
                <div class="col-md-4">
                    <div class="card card-hover">
                        <div class="card-body">
                            <?php if($distance['hospital']->image == ""){ ?>
                                    <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                                <?php } else { ?>
                                    <img src="/mhs_micro/facilities/<?php print $distance['hospital']->image ?>" class="rounded-3 img-fluid" style="height: 200px" width="100%">
                                <?php } ?>

                            <div class="d-flex justify-content-center mt-2">
                                <span class="badge bg-success rounded-1 me-2 fs-3"><i class="fas fa-clock"></i> Open</span>
                                <span class="badge <?= $index === 0 ? 'bg-secondary' : 'bg-warning' ?> rounded-1 fs-3"><i class="fas fa-map-marked-alt"></i> <?= $index === 0 ? 'Nearest' : 'Distance' ?> <small class="fw-semibold"><?= $distance['distance'] ?> km</small></span>
                            </div>

                            <h5 class="card-title mt-2"><?= $distance['hospital']->name ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                                <?= $distance['hospital']->address ?>
                            </h6>
                            <!-- <p class="card-text pt-2">
                                <?= $distance['hospital']->description ?>
                            </p> -->
                            <a href="#" class="card-link">Inquire</a>
                            <a href="#" class="card-link">View profile</a>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
