  <form>
    <?php foreach($BrgyUserData as $perBrgyuser) { ?>
    <div class="row">
        <div class="col-md-8">
        <?php if($perBrgyuser->image == "") { ?>
            <img src="../assets/images/profile/default.jpg" class="rounded-circle float-start me-3" height="150" alt="profile"/>
            <?php } else { ?>
            <img src="/mhs_micro/profile/<?= $perBrgyuser->image ?>" class="rounded-circle float-start me-2" height="150" width="155" alt="profile"/>
            <?php } ?>
            <p class="card-title mt-4 fw-semibold"><?= $perBrgyuser->lastname ?>, <?= $perBrgyuser->firstname ?> <?= $perBrgyuser->middlename ?> <br><small class="fs-3"><?= $perBrgyuser->rname ?></small></p>
            <p class="fs-3"><i class="ti ti-mail"></i> <?= $perBrgyuser->email ?> <br><span class="fs-3"><i class="ti ti-phone"></i> <?= $perBrgyuser->mobileno ?> </span></p>
        </div>
        <div class="col-md-4 mt-2">
            <p class="float-end"> 
            <div class="d-flex align-items-center justify-content-around m-4">
                    <div class="text-center">
                      <i class="ti ti-users fs-6 d-block mb-2 bg-primary-subtle rounded-2 p-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1 text-primary"></h4>
                      <p class="mb-0 fs-4">Patients</p>
                    </div>
                    <div class="text-center">
                      <i class="ti ti-transfer-in fs-6 d-block mb-2 bg-success-subtle rounded-2 p-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1 text-success"></h4>
                      <p class="mb-0 fs-4">Referred</p>
                    </div>
                    <!-- <div class="text-center">
                      <i class="ti ti-chart-line fs-6 d-block mb-2 bg-warning-subtle rounded-2 p-2"></i>
                      <h4 class="mb-0 fw-semibold lh-1 text-warning">85%</h4>
                      <p class="mb-0 fs-4">Ratings</p>
                    </div> -->
                  </div>
            </p>
        </div>
    </div>
    <?php } ?>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary"> Print</button>
    </div>
</form>