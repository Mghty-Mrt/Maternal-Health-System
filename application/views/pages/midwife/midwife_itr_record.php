<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Individual Treatment Record (Prenatal)</span></h5>
                <button type="button" class="btn btn-success btn-sm me-2 mb-4" onclick="dlToExcel()" id="showDischargeMother"> <i class="ti ti-download"></i> Excel </button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="itrpatients" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">ITR ID</h6>
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
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Next Checkup</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">CheckUp</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach ($PatientsItr as $itr) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <?= $itr->piid ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $itr->firstname ?> <?= $itr->middlename ?> <?= $itr->lastname ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $itr->visits ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= date('M j, Y, g:i a', strtotime ($itr->picreated)) ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= date('M j, Y', strtotime ($itr->followUp_checkUp)) ?>, <?= date('g:i a', strtotime ($itr->time)) ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?php if($itr->checkUpStatus == 0) { ?>
                                        <a href="../midwife/preItrCheckup?id=<?= $itr->pid ?>" class="btn btn-primary fs-2 btn-sm btnCheck"><i class="fs-3 ti ti-file-pencil"></i> Prenatal Checkup</a>
                                    <?php } else { ?>
                                        <button type="button" class="btn bg-primary-subtle text-secondary fs-2 btn-sm"> <i class="fas fa-check-circle"></i> Done Prenatal</button>
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
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="../midwife/itrEdit?id=<?= $itr->piid ?>"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a>
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


<script>
    $(document).ready(function() {
        $('#itrpatients').DataTable();
    });

    function dlToExcel() {
        var table = $('#itrpatients').DataTable();

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

        var tableTitle = "ITR_record";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>