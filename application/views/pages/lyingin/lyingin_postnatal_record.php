<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title mb-4">Dashboard / <span class="text-muted">Postnatal Records</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-warning btn-sm me-2 mb-4" id="showDischargeMother">Discharge Mother <i class="fs-3 ti ti-file-pencil"></i> </button>
                        <button type="button" class="btn btn-danger btn-sm me-2 mb-4" id="showDischargeBaby">Discharge Baby <i class="fs-3 ti ti-file-pencil"></i> </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="lypostnatal" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Postnatal ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Patient Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Delivery Type</h6>
                            </th>
                            <!-- <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Date</h6>
                            </th> -->
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Status</h6>
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
                        <?php foreach($PostnatalList as $rp ) { ?>
                            <tr id="tr">
                                <td><?= $rp->ppnid ?></td>
                                <td>
                                    <?= $rp->firstname ?>
                                    <?= $rp->middlename ?>
                                    <?= $rp->lastname ?>
                                </td>
                                <td>Normal Spontaneous Delivery</td>
                                <!-- <td><?= date('M, d Y \a\t h:i a', strtotime($rp->ppndate)) ?></td> -->
                                <td>
                                    <?php if($rp->ppnstat == 1) { ?>
                                    <span class="text-secondary fw-bold bg-secondary-subtle p-1 rounded-1 fs-2"><i class="fas fa-clock me-1"></i>Recovering</span>
                                    <?php } elseif($rp->ppnstat == 2) { ?>
                                    <span class="text-success fw-bold bg-secondary-subtle p-1 rounded-1 fs-2"><i class="fas fa-check-circle me-1"></i>Discharged</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="../lyingin/followup?id=<?= $rp->ppnid ?>" class="btn btn-dark fs-2 btn-sm btnView"><i class="ti ti-file-pencil"></i> Follow-Up Checkup</a>
                                    <a href="../lyingin/dischargem?id=<?= $rp->rpid ?>" class="btn btn-warning fs-2 btn-sm btnmother" style="display:none;"><i class="fs-3 ti ti-file-pencil"></i> Mother</a>
                                    <a href="../lyingin/dischargenb?id=<?= $rp->rpid ?>" class="btn btn-danger fs-2 btn-sm btnbaby" style="display:none;"><i class="fs-3 ti ti-file-pencil"></i> Baby</a>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <!-- <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../lyingin/viewrefer?id=<?= $rp->rpid ?>"><i class="fs-4 ti ti-eye"></i>View</a>
                                            </li> -->
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../lyingin/editPostnatal?id=<?= $rp->ppnid ?>"><i class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            <li>
                                                <!-- <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a> -->
                                            </li>
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

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#lypostnatal').DataTable();
    });
</script>


<script>
    $(document).ready(function() {
        var disMom = false;

        $("#showDischargeMother").click(function() {
            $(".btnmother").toggle();
            $(".btnView").toggle();

            disMom = !disMom;
            $("#showDischargeBaby").prop('disabled', disMom);
        });
    });

    $(document).ready(function() {
        var disbaby = false;

        $("#showDischargeBaby").click(function() {
            $(".btnbaby").toggle();
            $(".btnView").toggle();

            disbaby = !disbaby;
            $("#showDischargeMother").prop('disabled', disbaby);
        });
    });

</script>
