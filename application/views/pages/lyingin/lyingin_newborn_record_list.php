<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title mb-4">Dashboard / <span class="text-muted">Newborn Record Lists</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">    
                    <button type="button" class="btn btn-success btn-sm mb-4" id="showbBtn">Birth Certificate <i class="fs-3 ti ti-file-pencil"></i> </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="lyreferp" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Newborn ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Referred Patient</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Newborn Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Date</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Newborn Record</h6>
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
                        <?php foreach ($NewbornRecords as $rp) { ?>
                            <tr id="tr">
                                <td><?= $rp->nrid ?></td>
                                <td>
                                    <?= $rp->firstname ?>
                                    <?= $rp->middlename ?>
                                    <?= $rp->lastname ?>
                                </td>
                                <?php
                                // Decode the JSON data
                                $babyinfo = json_decode($rp->baby_info, true);
                                ?>
                                <td><?= $babyinfo['firstname'] ?> <?= $babyinfo['middilename'] ?> <?= $babyinfo['lastname'] ?> </td>
                                <td><?= date('M, d Y \a\t h:i a', strtotime($rp->nrdate)) ?></td>
                                <td>
                                    <?php if ($rp->drid == $rp->nrdrid) { ?>
                                        <span class="text-success fw-bold bg-secondary-subtle p-1 rounded-1 fs-2"><i class="fas fa-check-circle me-1"></i>Newborn Record</span>
                                    <?php } else { ?>
                                        <span class="text-secondary fw-bold bg-secondary-subtle p-1 rounded-1 fs-2"><i class="fas fa-clock me-1"></i>Pending</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <!-- <span class="btn btn-info fs-2 btn-sm btnView"><i class="far fa-eye"></i> View Records</span> -->
                                    <a href="../lyingin/postnatal?id=<?= $rp->rpid ?>" class="btn btn-dark fs-2 btn-sm btn_p"><i class="fs-3 ti ti-file-pencil"></i> Postnatal</a>
                                    <a target="_blank" href="../lyingin/generate_birth_certificate?id=<?= $rp->rpid ?>" class="btn btn-success fs-2 btn-sm btn_bc" style="display: none"><i class="fs-3 ti ti-file-pencil"></i> Generate Birth Certificate</a>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                        <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../lyingin/editNewbornrecord?id=<?= $rp->nrid ?>"> <i class="fs-4 ti ti-eye"> </i> View</a>
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
        $('#lyreferp').DataTable();
    });
</script>


<script>
    $(document).ready(function() {
        // var feedbackVisible = false;

        $("#showbBtn").click(function() {
            $(".btn_bc").toggle();
            $(".btn_p").toggle();

            // feedbackVisible = !feedbackVisible;
            // $("#showFeedbackBtn").prop('disabled', feedbackVisible);

        });
    });

</script>