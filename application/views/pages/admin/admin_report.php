<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-start"><a href="../admin/dashboard" class="btn btn-danger mb-3 btn-sm"> <i class="ti ti-arrow-back-up"></i> Back </a></div>
                    <div class="d-flex justify-content-end"><button type="button" class="btn btn-success mb-3 btn-sm" onclick="dlToExcel()"> Download <i class="ti ti-download"></i> </button></div>
                </div>
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="admin_report" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">#No.</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Health Centers</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Referrals</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Arrived</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Did not Arrive</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php

                        $totalReferralCount = 0;
                        $totalArrivedCount = 0;
                        $totalUnArrivedCount = 0;

                        foreach ($report as $r) { ?>
                            <tr>
                                <td><?= $r->id ?></td>
                                <td><?= $r->name ?></td>

                                <?php
                                $total_from = $this->Admin_model->gettotal_from($r->id);
                                if (is_array($total_from) || is_object($total_from)) {
                                    $total_from_count = count($total_from);
                                    $totalReferralCount += $total_from_count;
                                } else {
                                    $total_from_count = 0;
                                }
                                ?>
                                <td><?= $total_from_count ?></td>

                                <?php
                                $Total_arrived = $this->Admin_model->getTotal_arrived($r->refer_from);
                                if (is_array($Total_arrived) || is_object($Total_arrived)) {
                                    $Total_arrived_count = count($Total_arrived);
                                    $totalArrivedCount += $Total_arrived_count;
                                } else {
                                    $Total_arrived_count = 0;
                                }
                                ?>
                                <td><?= $Total_arrived_count ?></td>

                                <?php
                                $Total_unarrived = $this->Admin_model->getTotal_unarrived($r->refer_from);
                                if (is_array($Total_unarrived) || is_object($Total_unarrived)) {
                                    $Total_unarrived_count = count($Total_unarrived);
                                    $totalUnArrivedCount += $Total_unarrived_count;
                                } else {
                                    $Total_unarrived_count = 0;
                                }
                                ?>
                                <td><?= $Total_unarrived_count ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="bg-light-subtle text-main">
                        <tr>
                            <th colspan="2" style="text-align:center">TOTAL</th>
                            <th><?= $totalReferralCount ?></th>
                            <th><?= $totalArrivedCount ?></th>
                            <th><?= $totalUnArrivedCount ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#admin_report').DataTable();
    });

    // console.log("Total Amount:", totalAmount);

    function dlToExcel() {
        var table = $('#admin_report').DataTable();

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

        // Add the footer total row to the data array
        var footerRow = $('#admin_report tfoot tr th').map(function() {
            return $(this).text();
        }).get();

        data.push(footerRow);

        // Add the header to the data array
        data.unshift(header);

        // Create a new workbook
        var wb = XLSX.utils.book_new();

        // Add a new worksheet to the workbook
        var ws = XLSX.utils.aoa_to_sheet(data);
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

        var tableTitle = "Admin_report";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>