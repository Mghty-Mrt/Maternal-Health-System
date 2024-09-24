<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Prenatal Patients</span></h5>
                <button type="button" class="btn btn-success btn-sm me-2 mb-4" onclick="dlToExcel()" id="showDischargeMother"> <i class="ti ti-download"></i> Excel </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="prenatalpatients" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Prenatal ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Visits</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Next Checkup</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Checkup By</h6>
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
                        <?php foreach ($prenatalpatients as $prenatal) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <?= $prenatal->ppreid ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $prenatal->firstname ?> <?= $prenatal->middlename ?> <?= $prenatal->lastname ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $prenatal->visits ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= date('M j, Y', strtotime ($prenatal->followUp_checkUp)) ?>, <?= date('g:i a', strtotime ($prenatal->time)) ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $prenatal->rlcode ?>. <?= $prenatal->fname ?> <?= $prenatal->lname ?>
                                </td>
                                <td class="border-bottom-0">
                                <?php if($prenatal->pstat == 1){ ?>
                                        <button type="button" class="btn btn-danger fs-2 btn-sm btnReferral" style="display:show;" data-bs-toggle="modal" data-bs-target="#dynamicmodalref" data-id ="<?= $prenatal->ppre ?>"><i class="fs-3 ti ti-send"></i> Refer Patient</button>
                                <?php } elseif($prenatal->pstat == 2){ ?>
                                        <button type="button" class="btn bg-danger-subtle text-danger fs-2 btn-sm"><i class="fas fa-check-circle"></i> Patient Referred</button
                                <?php } elseif($prenatal->pstat == 0){ ?>
                                        <button type="button" class="btn bg-home text-light fs-2 btn-sm"><i class="fas fa-check-circle"></i> Patient Completed</button
                                <?php } ?>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <!-- <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="#"><i class="fs-4 ti ti-eye"></i>View</a>
                                            </li> -->
                                            <li>
                                                <?php if($prenatal->visits == '2nd Visit'){ ?>
                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="../doctor/editprenatal?id=<?= $prenatal->ppreid ?>"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                                <?php } else { ?>
                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="../doctor/editprenatal2?id=<?= $prenatal->ppreid ?>"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                                <?php } ?>
                                            </li>
                                            <li>
                                                <!-- <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a> -->
                                            </li>
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
        $('#prenatalpatients').DataTable();
    });

    function dlToExcel() {
        var table = $('#prenatalpatients').DataTable();

        // Specify the column indexes to include in the Excel file
        var columnIndexes = [0, 1, 2, 3, 4];

        // Get the column names from the table header
        var header = columnIndexes.map(function(index) {
            return table.column(index).header().innerText;
        });

        // Get the data from the specified columns
        var data = table.rows().data().toArray().map(function(row) {
            return columnIndexes.map(function(index) {
                return row[index];
            });
        });

        // Add the header to the data array
        data.unshift(header);

        // Create a new workbook
        var wb = XLSX.utils.book_new();

        // Add a new worksheet to the workbook
        var ws = XLSX.utils.aoa_to_sheet(data);
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

        var tableTitle = "Prenatal_record";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>