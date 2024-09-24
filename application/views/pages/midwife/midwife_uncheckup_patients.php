<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">UncheckUp Patients</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <!-- <button type="button" class="btn btn-danger btn-sm me-2 mb-4" id="showReferralBtn">Referr Patient <i class="fas fa-question"></i> </button> -->
                    <!-- <button type="button" class="btn btn-success btn-sm mb-4" id="showPostnatalBtn">Postnatal CheckUp <i class="fas fa-question"></i> </button> -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="uncheckpatients" data-order='[[0,"desc"]]'>
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
                        <?php foreach ($uncheckpatientst as $today) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">P0<?= $today->pid ?></h6>
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
                                            $bgColorClass = 'bg-primary-subtle text-primary';
                                            break;
                                        case 'Natal':
                                            $bgColorClass = 'bg-warning-subtle text-warning';
                                            break;
                                        case 'Postnatal':
                                            $bgColorClass = 'bg-success-subtle text-success';
                                            break;
                                        case '1st Checkup ITR':
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
                                            $spanClass = 'bg-danger-subtle text-danger';
                                            $iconClass = '';
                                            $Text = 'Uncheckup';
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
                                <td class="border-bottom-0">

                                    <?php if ($today->visits == "1st Visit" && $today->checkUpStatus == 0) { ?>
                                        <a href="../midwife/preItrCheckup?id=<?= $today->pid ?>" class="btn btn-primary fs-2 btn-sm btnCheck"><i class="fs-3 ti ti-file-pencil"></i> PreNCheckUp</a>
                                    <?php } else { ?>
                                        <a href="../midwife/prefollowupcheckup?id=<?= $today->pid ?>" class="btn btn-secondary fs-2 btn-sm btnCheck"><i class="fs-3 ti ti-file-pencil"></i> FUCheckUp</a>
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
        $('#uncheckpatients').DataTable();
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