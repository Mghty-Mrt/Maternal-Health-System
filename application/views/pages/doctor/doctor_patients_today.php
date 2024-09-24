<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Today's Patients</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm me-2 mb-4" id="showReferralBtn">Refer Patient <i class="fas fa-question"></i> </button>
                    <!-- <button type="button" class="btn btn-success btn-sm mb-4" id="showPostnatalBtn">Postnatal CheckUp <i class="fas fa-question"></i> </button> -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="todayspatients" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Patient ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Visits</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date Visit</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Stage</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Status</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach ($patientstoday as $today) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $today->pid ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?= $today->firstname ?> <?= $today->middlename ?> <?= $today->lastname ?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <span class=""><?= $today->visits ?></span>
                                </td>
                                <td class="border-bottom-0">
                                    <span class=""><?= date('M j, Y, g:i a', strtotime($today->pdate)) ?></span>
                                </td>
                                <td class="border-bottom-0">
                                    <?php
                                    $bgColorClass = '';
                                    switch ($today->ptname) {
                                        case 'Prenatal':
                                            $bgColorClass = 'bg-light-subtle text-primary';
                                            break;
                                        case 'Natal':
                                            $bgColorClass = 'bg-light-subtle text-warning';
                                            break;
                                        case 'Postnatal':
                                            $bgColorClass = 'bg-light-subtle text-success';
                                            break;
                                        case '1st Check Up ITR':
                                            $bgColorClass = 'bg-light-subtle text-info';
                                            break;
                                        default:
                                            break;
                                    }
                                    ?>
                                    <span class="badge rounded-2 fs-2 fw-bold <?= $bgColorClass ?>"> <?= $today->ptname ?> </span>
                                </td>
                                <td class="border-bottom-0">
                                    <?php
                                    $status = $today->checkUpStatus;
                                    $spanClass = '';
                                    $iconClass = '';
                                    switch ($status) {
                                        case 0:
                                            $spanClass = 'bg-primary-subtle text-primary';
                                            $iconClass = '';
                                            $Text = 'Pending';
                                            break;
                                        case 1:
                                            $spanClass = 'bg-success-subtle text-success';
                                            $iconClass = '';
                                            $Text = 'Done';
                                            break;
                                        default:
                                            break;
                                    }
                                    ?>
                                    <span class="badge rounded-2 fs-2 fw-bold <?php print $spanClass; ?> "> <i class="fas fa-circle fs-1"></i> <?php print $Text ?> </span>
                                </td>
                                <?php if($today->pstat == 1){ ?>
                                <td class="border-bottom-0">
                                    <!-- <?php if ($today->visits == "1st Visit" && $today->checkUpStatus == 0) { ?>
                                        <a href="../doctor/preItrCheckup?id=<?= $today->pid ?>" class="btn btn-primary fs-2 btn-sm btnCheck"><i class="fs-3 ti ti-file-pencil"></i> Prenatal Checkup</a>
                                    <?php } else { ?>
                                        <a href="../doctor/prefollowupcheckup?id=<?= $today->pid ?>" class="btn btn-secondary fs-2 btn-sm btnCheck"><i class="fs-3 ti ti-file-pencil"></i> Follow-Up Checkup</a>
                                    <?php } ?> -->
                                    <a href="../doctor/PrefollowupCheckup?id=<?= $today->pid ?>" class="btn btn-primary fs-2 btn-sm btnCheck"><i class="fs-3 ti ti-file-pencil"></i> Follow-up Checkup</a>
                                    <button type="button" class="btn btn-danger fs-2 btn-sm btnReferral" style="display:none;" data-bs-toggle="modal" data-bs-target="#dynamicmodalref" data-id ="<?= $today->pppre ?>"><i class="fs-3 ti ti-send"></i> Refer Patient</button>
                                </td>
                                <?php } elseif($today->pstat == 2){ ?>
                                    <td>
                                        <button type="button" class="btn btn-success fs-2 btn-sm"><i class="fas fa-check-circle"></i> Patient Referred</button>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Referral Modal -->
<div class="modal fade" id="dynamicmodalref" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle">Select Referring Facility Type</h1>
                <button type="button" class="text-danger fs-5 bg-transparent" data-bs-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i> </button>
            </div>
            <div class="modal-body" id="modalContent">
                    <!-- <input type="hidden" name="patient_id" id="patient_id" value="<?= $today->pid ?>"> -->
                <div class="row">
                    <?php foreach ($facilityType as $ft) { ?>
                        <div class="col-md-6">
                            <div class="card text-center bg-light-subtle card-hover d-flex justify-content-center">
                                <div class="p-2 d-block mt-3">
                                    <img src="../assets/images/logos/doctor.png" class="rounded-2 img-fluid" style="height: 100px; width: 150px;">
                                    <h5 class="mt-3 fs-4 text-main"><?= $ft->name ?></h5>
                                    <form method="post" action="../doctor/findfacilities">
                                        <input type="hidden" name="ppreId" id="ppreId" readonly>
                                        <input type="hidden" name="ftId" id="ftId" value="<?= $ft->id ?>" readonly>
                                        <button type="submit" onclick="showLoading()" class="btn btn-success btn-sm w-50 mb-3 mt-1">Select <i class="fas fa-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div id="loadinggif" class="modal1">
                        <div class="modal-content1">
                            <img src="../assets/images/loading/toogle2.gif" style="width: 50%; height: 50%" alt="Loading...">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    function showLoading() {
        $('#loadinggif').show();
    }
</script>

<script>
    $(document).ready(function() {
        // Listen for the modal's "show.bs.modal" event
        $('#dynamicmodalref').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var ppreId = button.data('id'); 
            var modal = $(this);
            modal.find('.modal-body #ppreId').val(ppreId);
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#todayspatients').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        var postnatalVisible = false;

        $("#showPostnatalBtn").click(function() {
            $(".btnPostCheck").toggle();
            $(".btnCheck").toggle();

            postnatalVisible = !postnatalVisible;
            $("#showReferralBtn").prop('disabled', postnatalVisible);
        });
    });

    $(document).ready(function() {
        var referralVisible = false;

        $("#showReferralBtn").click(function() {
            $(".btnReferral").toggle();
            $(".btnCheck").toggle();

            referralVisible = !referralVisible;
            $("#showPostnatalBtn").prop('disabled', referralVisible);

        });
    });
</script>