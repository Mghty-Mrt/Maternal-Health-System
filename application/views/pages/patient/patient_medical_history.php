<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-home fs-3"></i> Home /<span class="text-muted">Medical History</span></h5>
            </div>
            <div class="row">

            <?php if(count($done_record) == 0){ ?>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <img src="../assets/images/backgrounds/nodata.png" class="card-img" alt="">
                    </div>
                    <div class="col-md-3"></div>
                </div>
            <?php } else { ?>
            <?php foreach($done_record as $done){ ?>
                <div class="col-md-6">
                    <div class="p-4 rounded-4 text-bg-light">
                        <div class="d-flex align-items-center gap-6 flex-wrap">
                            <img src="../assets/images/profile/default.jpg" alt="modernize-img" class="rounded-circle" width="33" height="33">
                            <h6 class="mb-0"><?= $done->lastname ?>, <?= $done->firstname ?> <?= $done->middlename ?> </h6>
                            <span class="fs-2">
                                <span class="p-1 text-bg-success rounded-circle d-inline-block"></span> 
                                <?= date('M j, Y, g:i a', strtotime($done->pc_date)) ?>
                            </span>
                        </div>
                        <p class="my-3">
                            Congratulations Mother! Thank you for trusting Maternal Health System.
                            It's an honor to serve you. May the best luck be with you, God bless you.
                            <br><small class="fw-bold">- Maternal Team </small>
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <a class="btn btn-primary p-1 hstack justify-content-center fs-2" href="../patient/details" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Like">
                                    Medical History
                                    <i class="ti ti-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    } 
                }
                ?>

            </div>

        </div>
    </div>
</div>