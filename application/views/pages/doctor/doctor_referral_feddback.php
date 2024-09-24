<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
                <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Referred Patients</span></h5>
            </div>
            
            <div class="col-md-6 d-flex justify-content-end">     
                <!-- <button type="button" class="btn btn-success btn-sm me-2 mb-4" onclick="dlToExcel()" id="showDischargeMother"> <i class="ti ti-download"></i> Excel </button> -->
                </div>
                </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="postpartum" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Patient ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Patient</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Facility</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Status</h6>
                            </th>
                            <!-- <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                            </th> -->
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach ($postpartum as $partum) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <?= $partum->preg_id ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $partum->firstname ?> <?= $partum->middlename ?> <?= $partum->lastname ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $partum->fname ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?php if($partum->rsstatus == 1) { ?>
                                        <button class="btn btn-success btn-sm "> <i class="fas fa-check-circle"></i> Patient Arrived</button>
                                    <?php } elseif($partum->rsstatus == 0 && $partum->rpstat == 1 || $partum->rpstat == 2) {?>
                                        <button class="btn btn-danger btn-sm "> <i class="fas fa-check-circle"></i> Patient did not Arrived in (<?= $partum->rsreport ?>)</button>
                                    <?php } elseif ($partum->rpstat == 0) { ?>
                                        <button class="btn btn-secondary btn-sm "> <i class="fas fa-clock"></i> Pending</button>
                                    <?php } ?>
                                </td>
                                <!-- <td>
                                </td> -->
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
        var referralVisible = false;

        $("#showReferralBtn").click(function() {
            $(".btnPartum").toggle();
            $(".btndone").toggle();

            referralVisible = !referralVisible;
            $("#showPostnatalBtn").prop('disabled', referralVisible);

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#postpartum').DataTable();
    });

    function dlToExcel() {
        var table = $('#postpartum').DataTable();

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