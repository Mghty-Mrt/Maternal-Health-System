<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title mb-4">Dashboard / <span class="text-muted">Refer Patients List</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <?php if($this->session->userdata('role_id') == 8){ ?>
                    <!-- <button type="button" class="btn btn-danger btn-sm me-2 mb-4" id="showPostnatalBtn">Transfer Referral <i class="fs-3 ti ti-send"></i> </button> -->
                    <button type="button" class="btn btn-success btn-sm me-2 mb-4" id="showFeedbackBtn">Feedback Outcome <i class="fs-3 ti ti-file-pencil"></i> </button>
                    <button type="button" class="btn btn-warning btn-sm me-2 mb-4" id="showDelivRecordBtn">Delivery Record <i class="fs-3 ti ti-file-pencil"></i> </button>
                    <!-- <button type="button" class="btn btn-danger btn-sm me-2 mb-4" id="showNewbRecordBtn">Newborn Record <i class="fs-3 ti ti-file-pencil"></i> </button> -->
                    <?php } ?>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="lyreferp" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Referral ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">From</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">ReferPatients</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Date</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Feedback</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Check</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach ($ReferPatients as $rp) { ?>
                            <tr id="tr">
                                <td><?= $rp->rpid ?></td>
                                <td><?= $rp->fname ?></td>
                                <td>
                                    <?= $rp->firstname ?>
                                    <?= $rp->middlename ?>
                                    <?= $rp->lastname ?>
                                </td>
                                <td><?= date('M. d Y \a\t h:i a', strtotime($rp->rp_date)) ?></td>
                                <td>
                                    <?php if ($rp->rpstatus == 0) { ?>
                                        <span class="text-secondary fw-bold bg-secondary-subtle p-1 rounded-1 fs-2"><i class="fas fa-clock me-1"></i>Pending</span>
                                    <?php } elseif ($rp->rpstatus == 2) { ?>
                                        <span class="text-success fw-bold bg-success-subtle p-1 rounded-1 fs-2"><i class="fas fa-check-circle me-1"></i>Feedback Outcome</span>
                                    <?php } elseif ($rp->rpstatus == 1) { ?>
                                        <span class="text-primary fw-bold bg-secondary-subtle p-1 rounded-1 fs-2"><i class="fas fa-check-circle me-1"></i>Feedback Sent</span>
                                    <?php } elseif ($rp->rpstatus == 3) { ?>
                                        <span class="text-danger fw-bold bg-danger-subtle p-1 rounded-1 fs-2"><i class="ti ti-send me-1"></i>Patient Transfered</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($this->session->userdata('role_id') == 8){ ?>
                                    <?php if ($rp->rpstatus == 0 || $rp->rpstatus == 1 || $rp->rpstatus == 2) { ?>
                                        <span class="btn btn-info fs-2 btn-sm btnView" data-bs-toggle="modal" data-bs-target="#feedbackmodal" data-id="<?= $rp->rpid ?>"><i class="fas fa-reply-all"></i> Feedback</span>                                        
                                        <a href="../lyingin/lyfeedback?id=<?= $rp->rpid ?>" class="btn btn-success fs-2 btn-sm btnFeedback" style="display:none;"><i class="fs-3 ti ti-file-pencil"></i> Feedback Outcome</a>
                                        <a href="../lyingin/delivery?id=<?= $rp->rpid ?>" class="btn btn-warning fs-2 btn-sm btnDelivRecord" style="display:none;"><i class="fs-3 ti ti-file-pencil"></i> Delivery Record</a>
                                        <a href="../lyingin/newbornrecord?id=<?= $rp->rpid ?>" class="btn btn-danger fs-2 btn-sm btnNewbRecord" style="display:none;"><i class="fs-3 ti ti-file-pencil"></i> Newborn Record</a>
                                        <a class="btn btn-danger fs-2 btn-sm btnPostnatal" style="display:none;" data-bs-toggle="modal" data-bs-target="#dynamicmodalref" data-id="<?= $rp->pppre ?>&<?= $rp->rpid ?>"><i class="fs-3 ti ti-send"></i> Refer Patient</a>
                                    <?php } elseif ($rp->rpstatus == 3) { ?>
                                        <span class="text-danger fw-bold bg-danger-subtle p-1 rounded-1 fs-2"><i class="ti ti-send me-1"></i>Patient Transfered</span>
                                    <?php } ?>
                                    
                                    <?php } else {?> 
                                        <span class="text-light fw-bold bg-dark-subtle p-1 rounded-1 fs-2"><i class="fas fa-ban"></i> Feedback</span>
                                    <?php }?>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <?php if ($rp->rpstatus == 0 || $rp->rpstatus == 1 || $rp->rpstatus == 2) { ?>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../lyingin/viewrefer?id=<?= $rp->rpid ?>"><i class="fs-4 ti ti-eye"></i>View</a>
                                                    <a class="btn btn-danger fs-2 btn-sm btnPostnatal" data-bs-toggle="modal" data-bs-target="#dynamicmodalref" data-id="<?= $rp->pppre ?>&<?= $rp->rpid ?>"><i class="fs-3 ti ti-send"></i> Refer Patient</a>
                                                </li>
                                                <!-- <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-success" href=""><i class="fs-4 ti ti-edit"></i>Edit</a>
                                            </li> -->
                                            
                                            <?php if($this->session->userdata('role_id') == 8){ ?>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a>
                                                </li>
                                                <?php } ?>
                                            <?php } elseif ($rp->rpstatus == 3) { ?>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3">
                                                        <span class="text-danger fw-bold bg-danger-subtle p-1 rounded-1 fs-2"><i class="ti ti-send me-1"></i>Patient Transfered</span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php  } ?>
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
                        <div class="card">
                            <div class="card-body">
                                <p class="border rounded-3 text-center shadow card-hover" style="font-size: 100px"><i class="text-success fas fa-thumbs-up"></i></p>
                                <div class="d-flex justify-content-center">
                                    <form action="../lyingin/referral_report_positive" method="POST">
                                        <input type="hidden" name="ref_id" id="ref_id" value="">
                                        <button type="submit" class="btn btn-success">Received</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="border rounded-3 text-center shadow card-hover" style="font-size: 100px"><i class="text-danger fas fa-thumbs-down"></i></p>

                                <form action="../lyingin/referral_report_negative" method="POST">
                                    <div class="row">
                                        <input type="hidden" name="ref_id" id="ref_id" value="">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-danger">Didn't Arrive</button>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="days" id="days" placeholder="Days count..." required>
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

<!-- Referral Modal -->
<div class="modal fade" id="dynamicmodalref" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle">Transfer Referral</h1>
                <button type="button" class="text-danger fs-5 bg-transparent" data-bs-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i> </button>
            </div>
            <div class="modal-body" id="modalContent">
                <!-- <input type="hidden" name="patient_id" id="patient_id" value="<?= $today->pid ?>"> -->
                <div class="row">
                    <?php foreach ($facilityType as $ft) { ?>
                        <!-- <div class="col-md-3"></div> -->
                        <div class="col-md-12">
                            <div class="card text-center bg-light-subtle card-hover d-flex justify-content-center">
                                <div class="p-2 d-block mt-3">
                                    <img src="../assets/images/logos/doctor.png" class="rounded-2 img-fluid" style="height: 100px; width: 150px;">
                                    <h5 class="mt-3 fs-4 text-main"><?= $ft->name ?></h5>
                                    <form method="post" action="../lyingin/findfacilities">
                                        <input type="hidden" name="ppreId" id="ppreId" readonly>
                                        <input type="hidden" name="rpid" id="rpid" readonly>
                                        <input type="hidden" name="ftId" id="ftId" value="<?= $ft->id ?>" readonly>
                                        <button type="submit" onclick="showLoading()" class="btn btn-success btn-sm w-50 mb-3 mt-1">Select <i class="fas fa-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-3"></div> -->
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

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>

<script>
    $(document).ready(function() {
        // Listen for the modal's "show.bs.modal" event
        $('#dynamicmodalref').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var dataId = button.data('id');
            var dataIds = dataId.split('&'); // Split the data-id value by '&' separator
            var ppreId = dataIds[0]; // First part of the split value
            var rpid = dataIds[1]; // Second part of the split value
            var modal = $(this);
            modal.find('.modal-body #ppreId').val(ppreId);
            modal.find('.modal-body #rpid').val(rpid); // Assuming you have an input field with id "rpid"
        });
    });
</script>


<!-- <script>
    $(document).ready(function() {
        // Listen for the modal's "show.bs.modal" event
        $('#dynamicmodalref').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var ppreId = button.data('id');
            var modal = $(this);
            modal.find('.modal-body #ppreId').val(ppreId);
        });
    });
</script> -->

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
        $('#lyreferp').DataTable();
    });
</script>


<script>
    $(document).ready(function() {
        var delivVisible = false;
        var postnatalVisible = false;
        var newbVisible = false;

        $("#showFeedbackBtn").click(function() {
            $(".btnFeedback").toggle();
            $(".btnView").toggle();

            delivVisible = !delivVisible;
            $("#showDelivRecordBtn").prop('disabled', delivVisible);

            postnatalVisible = !postnatalVisible;
            $("#showPostnatalBtn").prop('disabled', postnatalVisible);

            newbVisible = !newbVisible;
            $("#showNewbRecordBtn").prop('disabled', newbVisible);
        });
    });

    $(document).ready(function() {
        var feedbackVisible = false;
        var postnatalVisible = false;
        var newbVisible = false;

        $("#showDelivRecordBtn").click(function() {
            $(".btnDelivRecord").toggle();
            $(".btnView").toggle();

            feedbackVisible = !feedbackVisible;
            $("#showFeedbackBtn").prop('disabled', feedbackVisible);

            postnatalVisible = !postnatalVisible;
            $("#showPostnatalBtn").prop('disabled', postnatalVisible);

            newbVisible = !newbVisible;
            $("#showNewbRecordBtn").prop('disabled', newbVisible);

        });
    });

    $(document).ready(function() {
        var feedbackVisible = false;
        var delivVisible = false;
        var newbVisible = false;

        $("#showPostnatalBtn").click(function() {
            $(".btnPostnatal").toggle();
            $(".btnView").toggle();

            feedbackVisible = !feedbackVisible;
            $("#showFeedbackBtn").prop('disabled', feedbackVisible);

            delivVisible = !delivVisible;
            $("#showDelivRecordBtn").prop('disabled', delivVisible);

            newbVisible = !newbVisible;
            $("#showNewbRecordBtn").prop('disabled', newbVisible);

        });
    });

    $(document).ready(function() {
        var feedbackVisible = false;
        var delivVisible = false;
        var postnatalVisible = false;

        $("#showNewbRecordBtn").click(function() {
            $(".btnNewbRecord").toggle();
            $(".btnView").toggle();

            feedbackVisible = !feedbackVisible;
            $("#showFeedbackBtn").prop('disabled', feedbackVisible);

            delivVisible = !delivVisible;
            $("#showDelivRecordBtn").prop('disabled', delivVisible);

            postnatalVisible = !postnatalVisible;
            $("#showPostnatalBtn").prop('disabled', postnatalVisible);

        });
    });
</script>