<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Refer Patients List</span></h5>
                </div>
                <!-- <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm mb-4 me-2" id="addrpmnt" data-bs-toggle="modal" data-bs-target="#dynamicmodalAdd"> Add New </button>
                    <button type="button" class="btn btn-success btn-sm mb-4" id="showRqstLabBtn">Restock </button>
                </div> -->
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="referp" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Referral ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">From</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">ReferPatients</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Feedback</h6>
                            </th>
                            <!-- <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Past Records</h6>
                            </th> -->
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php if($this->session->userdata('role_id') == 9){ ?>
                        <?php foreach ($ReferPatients as $rp) { ?>
                            <tr id="tr">
                                <td><?= $rp->rpid ?></td>
                                <td><?= $rp->fname ?></td>
                                <td>
                                    <?= $rp->firstname ?>
                                    <?= $rp->middlename ?>
                                    <?= $rp->lastname ?>
                                </td>
                                <td><?= date('M, d Y \a\t h:i a', strtotime($rp->rp_date)) ?></td>

                                <td>
                                <?php if ($rp->rpstatus == 0) { ?>
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#feedbackmodal" data-id="<?= $rp->rpid ?>"> <i class="fas fa-reply-all"></i> Feedback</button>
                                <?php } elseif ($rp->rpstatus == 1) { ?>
                                        <button type="button" class="btn btn-primary btn-sm"> <i class="fas fa-check-circle"></i> Feedback Done</button>
                                <?php } elseif($rp->rpstatus == 2){ ?>
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fas fa-check-circle"></i> Feedback Outcome Done</button>
                                <?php } ?>
                                </td>

                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../hospital/viewrefer?id=<?= $rp->rpid ?>"><i class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="../hospital/feedback?id=<?= $rp->rpid ?>"><i class="fs-4 ti ti-edit"></i>Feedback</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="javascript:void(0)" onclick="confirmArchive(<?= $rp->rpid ?>)"><i class="fs-4 ti ti-archive"></i>Archive</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php  } ?>
                        <?php } elseif($this->session->userdata('role_id') == 11){ ?>
                            <?php foreach ($ReferPatients as $rp) { ?>
                            <tr id="tr">
                                <td><?= $rp->rpid ?></td>
                                <td><?= $rp->fname ?></td>
                                <td>
                                    <?= $rp->firstname ?>
                                    <?= $rp->middlename ?>
                                    <?= $rp->lastname ?>
                                </td>
                                <td><?= date('M, d Y \a\t h:i a', strtotime($rp->rp_date)) ?></td>

                                <td>
                                <?php if ($rp->rpstatus == 0) { ?>
                                        <button type="button" class="btn btn-secondary btn-sm"> <i class="fas fa-reply-all"></i> Pending Feedback</button>
                                <?php } elseif ($rp->rpstatus == 1) { ?>
                                        <button type="button" class="btn btn-primary btn-sm"> <i class="fas fa-check-circle"></i> Feedback Done</button>
                                <?php } elseif($rp->rpstatus == 2){ ?>
                                        <button type="button" class="btn btn-success btn-sm"> <i class="fas fa-check-circle"></i> Feedback Outcome Done</button>
                                <?php } ?>
                                </td>

                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../hospital/viewrefer?id=<?= $rp->rpid ?>"><i class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            
                                            <?php if($this->session->userdata('role_id') == 9){ ?>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="../hospital/feedback?id=<?= $rp->rpid ?>"><i class="fs-4 ti ti-edit"></i>Feedback</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="javascript:void(0)" onclick="confirmArchive(<?= $rp->rpid ?>)"><i class="fs-4 ti ti-archive"></i>Archive</a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php  } ?>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Feedback Modal -->
<div class="modal fade" id="feedbackmodal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle">Referral Feedback</h1>
                <button type="button" class="text-danger fs-5 bg-transparent" data-bs-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i> </button>
            </div>
            <div class="modal-body" id="modalContent">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <p class="border rounded-3 text-center shadow card-hover bg-success-subtle" style="font-size: 100px"><i class="text-success fas fa-thumbs-up"></i></p>
                                <div class="d-flex justify-content-center">
                                    <form action="../hospital/referral_report_positive" method="POST">
                                        <input type="hidden" name="ref_id" id="ref_id" value="">
                                        <button type="submit" class="btn btn-success">Arrived</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <p class="border rounded-3 text-center shadow card-hover bg-danger-subtle" style="font-size: 100px"><i class="text-danger fas fa-thumbs-down"></i></p>

                                <form action="../hospital/referral_report_negative" method="POST">
                                    <div class="row mb-3">
                                        <input type="hidden" name="ref_id" id="ref_id" value="">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control shadow-none" name="days" id="days" placeholder="Days count..." required>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-danger">Didn't Arrive</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="loadinggif" class="modal1">
                    <div class="modal-content1">
                        <img src="../assets/images/loading/toogle2.gif" style="width: 50%; height: 50%" alt="Loading...">
                    </div>
                </div>

            </div>
            <!-- <div class="modal-footer"> -->
            <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Close </button> -->
            <!-- <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close"> Send </button> -->
            <!-- </div> -->

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Listen for the modal's "show.bs.modal" event
        $('#feedbackmodal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var refId = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #ref_id').val(refId);
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#referp').DataTable();
    });
</script>

<script>
    function confirmArchive(rpid) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to archive this Equipment!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, archive it!'
        }).then((result) => {
            if (result.isConfirmed) {
                archive(rpid);
            }
        });
    }

    function archive(rpid) {
        $.ajax({
            url: '../hospital/archiveref',
            method: 'POST',
            data: {
                rpid: rpid
            },
            success: function(response) {
                // Handle success response
                Swal.fire({
                    title: 'Archived!',
                    text: 'The equipment has been archived.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function(xhr, status, error) {
                Swal.fire('Error!', 'Failed to archive the equipment.', 'error');
            }
        });
    }
</script>