<!-- <div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-home fs-3"></i> Home /<span class="text-muted"> Record's List</span></h5>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="record">
          <thead class="text-dark fs-3 bg-home">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Visits</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Pregnancy Status</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date Visit</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
              </th>
            </tr>
          </thead>
          <tbody id="tbl_content">
            <?php foreach ($record as $r) { ?>
              <tr id="tr">
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $r->firstname ?> <?= $r->middlename ?> <?= $r->lastname ?></p>
                </td>
                <td class="border-bottom-0">
                  <span class=""><?php print $r->visits ?></span>
                </td>
                <td class="border-bottom-0">
                  <?php
                  $status = $r->ptname;
                  $spanClass = '';
                  $iconClass = '';
                  switch ($status) {
                    case 1:
                      $spanClass = 'text-secondary bg-primary-subtle';
                      $iconClass = '';
                      $Text = 'Prenatal Period';
                      break;
                    case 2:
                      $spanClass = 'text-warning bg-warning-subtle';
                      $iconClass = '';
                      $Text = 'Natal Period';
                      break;
                    case 3:
                      $spanClass = 'text-success bg-success-subtle';
                      $iconClass = '';
                      $Text = 'Postnatal Period';
                      break;
                    case 4:
                      $spanClass = 'text-secondary bg-secondary-subtle';
                      $iconClass = '';
                      $Text = '1st Check Up ITR';
                      break;
                    default:
                      $spanClass = 'text-secondary bg-secondary-subtle';
                      $Text = 'Unknown Status';
                  }
                  ?>
                  <span class="badge rounded-2 fs-2 fw-bold <?php print $spanClass ?>"><?php print $Text ?></span>
                </td>
                <td class="border-bottom-0">

                  <span><?php print date('M j, Y, g:i a', strtotime($r->datecheckup)) ?></span>

                </td>
                <td>
                  <?php if ($r->ptname == 4) { ?>
                    <a class="btn btn-secondary btn-sm" href="../patient/itrrecord?id=<?= $r->pid ?>"><i class="ti ti-eye me-1"></i>View</a>
                  <?php } elseif ($r->ptname == 1) { ?>
                    <a class="btn btn-success btn-sm" href="../patient/prenrecord?id=<?= $r->pid ?>"><i class="ti ti-eye me-1"></i>View</a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#record').DataTable();
  });
</script> -->

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-home fs-3"></i> Home /<span class="text-muted">Patient's Records</span></h5>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-hover">
            <div class="card-header bg-home d-flex justify-content-between">
              <p class="card-title mb-0 fs-4 text-light fw-bold">Prenatal Record</p>
              <i class="fas fa-folder-open text-light fs-4 mt-1"></i>
            </div>
            <div class="card-body">
              <div class="row" style="height: 230px; overflow-y: auto;">

                <?php foreach ($record as $r) { ?>
                  <?php if ($r->patient_type_id  == 4 || $r->patient_type_id == 1) { ?>
                    <div class="col-6 mb-3 card-hover">
                      <a href="../patient/itrrecord?id=<?= $r->pid ?>" class="text-center rounded-4 border py-3 d-block">
                        <i class="far fa-file-pdf display-6 text-secondary"></i>
                        <span class="text-muted d-block"><?php print $r->visits ?> </span>
                        <span class="text-muted mt-0" style="font-size: 55%"><?php print date('M j, Y, g:i a', strtotime($r->datecheckup)) ?></span>
                      </a>
                    </div>
                  <?php } ?>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>

        <!-- <div class="col-md-4">
          <div class="card">
            <div class="card-header bg-home d-flex justify-content-between">
              <p class="card-title mb-0 fs-4 text-light fw-bold">Prenatal Records</p>
              <i class="fas fa-folder-open text-light fs-4 mt-1"></i>
            </div>
            <div class="card-body">
              <div class="d-flex align-items-center">
              </div>
              <div class="row" style="height: 230px; overflow-y: auto;">
                <?php foreach ($record as $r) { ?>
                  <?php if ($r->patient_type_id  == 1) { ?>
                    <div class="col-6 mb-3 card-hover">
                      <?php if($r->visits == '2nd Visit'){ ?>
                      <a href="../patient/prenrecord?id=<?= $r->pid ?>" class="text-center rounded-4 border py-3 d-block">
                      <?php } else{ ?>
                      <a href="../patient/fupre?id=<?= $r->pid ?>" class="text-center rounded-4 border py-3 d-block">
                        <?php } ?>
                        <i class="far fa-file-pdf display-6 text-warning"></i>
                        <span class="text-muted d-block"><?php print $r->visits ?> </span>
                        <span class="text-muted mt-0" style="font-size: 55%"><?php print date('M j, Y, g:i a', strtotime($r->datecheckup)) ?></span>
                      </a>
                    </div>
                  <?php } elseif ($r->patient_type_id  == 3) { ?>
                    <p class="text-muted text-center mb-0"> <i class="fas fa-exclamation-circle"></i> No Natal records found or Patient Refered to Hospital.</p>
                    <img src="../assets/images/logos/doctor.png" class="image-fluid" style="width: 100%; height: 195px; filter: grayscale(100%);" alt=""> 
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>
        </div> -->

        <div class="col-md-6">
          <div class="card card-hover">
            <div class="card-header bg-home d-flex justify-content-between">
              <p class="card-title mb-0 fs-4 text-light fw-bold">Natal Records</p>
              <i class="fas fa-folder-open text-light fs-4 mt-1"></i>
            </div>
            <div class="card-body">
              <div class="row" style="height: 230px; overflow-y: auto;">

                <?php
                if (!empty($record)) {
                  $r = $record[0]; // Accessing the first element directly

                  if (empty($r->dr_id) && empty($r->nr_id)) {
                ?>
                    <!-- <p class="text-muted text-center mb-0"> <i class="fas fa-exclamation-circle"></i> No Natal records found or Patient Refered to Hospital.</p>
                    <img src="../assets/images/logos/doctor.png" class="image-fluid" style="width: 100%; height: 195px; filter: grayscale(100%);" alt=""> -->
                  <?php
                  } else {
                  ?>
                    <div class="col-6 mb-3 card-hover">
                      <a href="../patient/viewmother?id=<?= $r->dr_id ?>" class="text-center rounded-4 border py-3 d-block">
                        <i class="far fa-file-pdf display-6 text-danger"></i>
                        <span class="text-muted d-block"> Mother</span>
                        <span class="text-muted mt-0" style="font-size: 55%"><?php print date('M j, Y, g:i a', strtotime($r->drdate)) ?></span>
                      </a>
                    </div>

                    <div class="col-6 mb-3 card-hover">
                      <a href="../patient/viewnewborn?id=<?= $r->nr_id ?>" class="text-center rounded-4 border py-3 d-block">
                        <i class="far fa-file-pdf display-6 text-danger"></i>
                        <span class="text-muted d-block">Baby</span>
                        <span class="text-muted mt-0" style="font-size: 55%"><?php print date('M j, Y, g:i a', strtotime($r->ndate)) ?></span>
                      </a>
                    </div>
                <?php
                  }
                }
                ?>

              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-hover">
            <div class="card-header bg-home d-flex justify-content-between">
              <p class="card-title mb-0 fs-4 text-light fw-bold">Postnatal Records</p>
              <i class="fas fa-folder-open text-light fs-4 mt-1"></i>
            </div>
            <div class="card-body">
              <div class="row" style="height: 230px; overflow-y: auto;">

                <?php foreach ($record as $r) { ?>
                  <?php if ($r->patient_type_id  == 3) { ?>
                    <div class="col-6 mb-3 card-hover">
                      <a href="../patient/editPostnatal?id=<?= $r->ppon_id ?>" class="text-center rounded-4 border py-3 d-block">
                        <i class="far fa-file-pdf display-6 text-success"></i>
                        <span class="text-muted d-block"><?php print $r->visits ?> </span>
                        <span class="text-muted mt-0" style="font-size: 55%"><?php print date('M j, Y, g:i a', strtotime($r->datecheckup)) ?></span>
                      </a>
                    </div>
                  <?php } elseif ($r->patient_type_id  == 1) { ?>
                    <!-- <p class="text-muted text-center mb-0"> <i class="fas fa-exclamation-circle"></i> No Postnatal records found or Patient Refered to Hospital.</p>
                    <img src="../assets/images/logos/doctor.png" class="image-fluid" style="width: 100%; height: 195px; filter: grayscale(100%);" alt=""> -->
                  <?php } ?>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-hover">
            <div class="card-header bg-home d-flex justify-content-between">
              <p class="card-title mb-0 fs-4 text-light fw-bold">Postpartum Records</p>
              <i class="fas fa-folder-open text-light fs-4 mt-1"></i>
            </div>
            <div class="card-body">
              <div class="row" style="height: 230px; overflow-y: auto;">

                <?php
                if (!empty($record)) {
                  $r = $record[0]; // Accessing the first element directly

                  if ($r->ppo_id == "" && $r->ppo_id == "") {
                ?>
                    <!-- <p class="text-muted text-center mb-0"> <i class="fas fa-exclamation-circle"></i> No Postpartum records found or Patient Refered to Hospital.</p>
                    <img src="../assets/images/logos/doctor.png" class="image-fluid" style="width: 100%; height: 195px; filter: grayscale(100%);" alt=""> -->
                  <?php
                  } else {
                  ?>
                    <div class="col-6 mb-3 card-hover">
                      <a href="../patient/postpartum?id=<?= $r->ppo_id ?>" class="text-center rounded-4 border py-3 d-block">
                        <i class="far fa-file-pdf display-6 text-danger"></i>
                        <span class="text-muted d-block"> 1/2 Months</span>
                        <span class="text-muted mt-0" style="font-size: 55%"><?php print date('M j, Y, g:i a', strtotime($r->ppo_date)) ?></span>
                      </a>
                    </div>
                <?php
                  }
                }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>