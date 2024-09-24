<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-start"><a href="../doctor/dashboard" class="btn btn-danger mb-3 btn-sm"> <i class="ti ti-arrow-back-up"></i> Back </a></div>
                    <div class="d-flex justify-content-end"><button type="button" class="btn btn-success mb-3 btn-sm" onclick="dlToExcel()"> Download <i class="ti ti-download"></i> </button></div>
                </div>
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="report" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">#No.</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Receiving Facility</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">My Referral</h6>
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
                            <tr id="tr">
                                <td><?= $r->rp_id ?></td>
                                <td>
                                    <?= $r->fname ?>
                                </td>

                                <?php
                                $total_to = $this->Doctor_model->gettotal_to($r->refer_to);
                                if (is_array($total_to) || is_object($total_to)) {
                                    $total_to_count = count($total_to);
                                    $totalReferralCount += $total_to_count;
                                } else {
                                    $total_to_count = 0;
                                }
                                ?>
                                <td><?= $total_to_count ?></td>
                                <?php

                                $facilities_id = $this->session->userdata('facilities_id');
                                $Total_arrived = $this->Doctor_model->getTotal_arrived($facilities_id, $r->refer_to);
                                if (is_array($Total_arrived) || is_object($Total_arrived)) {
                                    $Total_arrived_count = count($Total_arrived);
                                    $totalArrivedCount += $Total_arrived_count;
                                } else {
                                    $Total_arrived_count = 0;
                                }
                                ?>
                                <td><?= $Total_arrived_count ?></td>

                                <?php

                                $facilities_id = $this->session->userdata('facilities_id');
                                $Total_unarrived = $this->Doctor_model->getTotal_unarrived($facilities_id, $r->refer_to);
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
        $('#report').DataTable();
    });

    // console.log("Total Amount:", totalAmount);

    function dlToExcel() {
        var table = $('#report').DataTable();

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
        var footerRow = $('#report tfoot tr th').map(function() {
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

        var tableTitle = "Doctor_report";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>