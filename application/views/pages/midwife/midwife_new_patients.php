<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">New Patients</span></h5>
                <button type="button" class="btn btn-warning btn-sm mb-4" id="showRqstLabBtn">Request Laboratory <i class="fas fa-question"></i></button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="newpatients">
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Patient ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date/Time Added</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Status</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Checkup</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach ($NewPatients as $perNewP) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $perNewP->prid ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?= $perNewP->firstname ?> <?= $perNewP->middlename ?> <?= $perNewP->lastname ?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <span class=""><?= date('M j, Y g:i a', strtotime($perNewP->prdatetime)) ?></span>
                                </td>
                                <td class="border-bottom-0">
                                    <?php
                                    $status = $perNewP->prstatus;
                                    $spanClass = '';
                                    $iconClass = '';
                                    switch ($status) {
                                        case 1:
                                            $spanClass = 'bg-primary-subtle text-primary';
                                            $iconClass = '';
                                            $Text = 'Pending';
                                            break;
                                        case 2:
                                            $spanClass = 'bg-success-subtle text-success';
                                            $iconClass = '';
                                            $Text = 'Positive';
                                            break;
                                        case 3:
                                            $spanClass = 'bg-danger-subtle text-danger';
                                            $iconClass = '';
                                            $Text = 'Negative';
                                            break;
                                        default:
                                        case 4:
                                            $spanClass = 'bg-dark-subtle text-dark';
                                            $iconClass = '';
                                            $Text = 'UncheckUp';
                                            break;
                                    }
                                    ?>
                                    <span class="badge rounded-2 fs-2 <?php print $spanClass; ?> "> <i class="fas fa-circle fs-1"></i> <?php print $Text ?> </span>
                                </td>
                                <td class="border-bottom-0">
                                    <a href="../midwife/itrcheckup?id=<?= $perNewP->prid?>" class="btn btn-secondary fs-2 btn-sm btnCheck"><i class="fs-3 ti ti-file-pencil"></i> Checkup</a>
                                    <?php if($perNewP->lpre_id == $perNewP->prid){ ?>
                                        <span class="btn bg-warning-subtle fs-2 text-warning btn-sm btnLab" style="display: none;"><i class="fs-3 fw-bolder ti ti-circle-check"></i> Request Laboratory </span>
                                    <?php } else { ?>
                                        <span class="btn btn-warning fs-2 btn-sm btnLab" style="display: none;" data-bs-toggle="modal" data-bs-target="#dynamicmodalLab" data-id="<?= $perNewP->prid ?>"><i class="fs-3 ti ti-zoom-question"></i>  Request Laboratory </span>
                                    <?php } ?>    
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../midwife/viewnewp?id=<?= $perNewP->prid ?>"><i class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            <!-- <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="#"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a>
                                            </li> -->
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
    </div>
</div>

<!-- Request Lab Modal -->
<div class="modal fade" id="dynamicmodalLab" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-5" id="modalTitle">Dynamic Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

            </div>
            <!-- <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
            <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
          </div> -->
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#newpatients').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        var postnatalVisible = false;

        $("#showRqstLabBtn").click(function() {
            $(".btnLab").toggle();
            $(".btnCheck").toggle();

            postnatalVisible = !postnatalVisible;
            $("#showReferralBtn").prop('disabled', postnatalVisible);
        });
    });
</script>

<script>
    $(document).on('click', '.btnLab', function() {
        var pre_patient_id = $(this).data('id');
        // alert(pre_patient_id);

        $.ajax({
            url: '../midwife/rqstLab?=' + pre_patient_id,
            method: 'GET',
            data: {
                pre_patient_id: pre_patient_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div class="text-light"> <i class="fas fa-file-prescription"></i> <b>Request Laboratory</b> </div>');
                $('#modalContent').html(data);
                $('#dynamicmodalLab').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get System User Details!');
            }
        });
    });
</script>