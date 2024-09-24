<div class="container-fluid">
    <div class="card" id="pageLoad">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title fw-bold text-uppercase fs-3"> <i class="fas fa-hospital fs-3"></i> <?php foreach ($facility as $fac) { ?> <?= $fac->name ?> <?php } ?> / <span class="text-muted">Lying In Details</span></h5>
                <a href="../admin/lyingin" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up fw-semibold"></i> Back</a>
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">
                        <span><i class="fas fa-user-nurse"></i> Lying In Users</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="true">
                        <span><i class="fas fa-clipboard-list"></i> Refer Patients</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="prenatal-tab" data-bs-toggle="tab" href="#prenatal" role="tab" aria-controls="prenatal" aria-selected="true">
                        <span><i class="fas fa-bed"></i> Bedslot</span>
                    </a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link" id="prenatal-tab" data-bs-toggle="tab" href="#prenatal" role="tab" aria-controls="prenatal" aria-selected="true">
                        <span><i class="fas fa-archive"></i> Archived Patients</span>
                    </a>
                </li> -->
            </ul>

            <div class="tab-content tabcontent-border p-3" id="myTabContent">

                <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="profile-tab">
                    <p id="tab-content">

                    <div class="row">
                        <?php foreach ($lyusers as $persuly) { ?>
                            <div class="col-md-3">
                                <div class="card card-hover">
                                    <div class="card-body p-4 text-center border-bottom">
                                        <?php if ($persuly->image == "") { ?>
                                            <img src="../assets/images/profile/default.jpg" alt="" class="rounded-3 mb-3" width="80" height="80">
                                        <?php } else { ?>
                                            <img src="/mhs_micro/profile/<?php print $persuly->image ?>" alt="" class="rounded-3 mb-3" width="80" height="80">
                                        <?php } ?>
                                        <h5 class="fw-semibold mb-0 fs-5"><?php print $persuly->firstname ?> <?php print $persuly->lastname ?></h5>
                                        <span class="text-dark fs-2"><?php print $persuly->rname ?></span><br>
                                        <span class="badge bg-success-subtle text-success rounded-4 fs-2"> <i class="fas fa-circle"></i> Online</span>
                                        <div class="d-flex justify-content-between mt-3 mx-5">
                                            <i class="fas fa-envelope text-danger"></i>
                                            <i class="fab fa-facebook text-secondary fs-4"></i>
                                            <i class="fas fa-phone-alt text-success"></i>
                                        </div>
                                    </div>
                                    <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0 card-footer bg-home">
                                        <button type="button" class="btn text-light btn-sm rounded-1" data-bs-toggle="modal" data-bs-target="#dynamicmodal" onclick="viewlyuser(<?= $persuly->suid ?>)"><i class="fas fa-info-circle"></i> View</button>
                                        <!-- <button type="button" class="btn btn-danger btn-sm rounded-circle ms-2"><i class="fas fa-phone"></i></button> -->
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    </p>
                </div>

                <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab">
                    <p id="tab-content">

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title mb-4">Lying In Details / <span class="text-muted">Refer Patients</span></h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button type="button" class="btn btn-danger btn-sm mb-4 mx-1" onclick="dlreftoPdf()"><i class="ti ti-download"></i> Pdf</button>
                            <button type="button" class="btn btn-success btn-sm mb-4 mx-1" onclick="dlreftoExcel()"><i class="ti ti-download"></i> Excel</button>
                            <button type="button" class="btn btn-warning btn-sm mb-4 mx-1" onclick="printreftoPdf()"><i class="ti ti-printer"></i> Print</button>

                        </div>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                            <strong><i class="fas fa-check-circle"></i> Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="failedAlert">
                            <strong><i class="fas fa-times-circle"></i> Failed!</strong> <?php echo $this->session->flashdata('failed'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive" id="ref_patients">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="referpatients" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Refer ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Refer From</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date refer</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <?php foreach ($refpatients as $ref) { ?>
                                    <tr id="tr">
                                        <td class="border-bottom-0">
                                            <?= $ref->rpid ?>
                                        </td>
                                        <td class="border-bottom-0">
                                            <?php $patientname = json_decode($ref->referral_details, true); ?>
                                            <?= $patientname['PatientName'] ?? '' ?>
                                        </td>
                                        <td class="border-bottom-0">
                                            <?= $ref->fname ?>
                                        </td>
                                        <td class="border-bottom-0">
                                            <?= date('M d, Y \a\t h:i a', strtotime($ref->refdate)) ?>
                                        </td>
                                        <td class="border-bottom-0">
                                            <?php if ($ref->rpstat == 0) { ?>
                                                Pending Feedback
                                            <?php } elseif ($ref->rpstat == 2) { ?>
                                                Feedback Sent
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                    <i class="ti ti-dots fs-5"></i>
                                                </span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="#"><i class="fs-4 ti ti-eye"></i>View</a>
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
                    </p>
                </div>

                <div class="tab-pane fade" id="prenatal" role="tabpanel" aria-labelledby="prenatal-tab">
                    <p id="tab-content">

                    <div class="row border-bottom">
                        <div class="col-md-6">
                            <h5 class="card-title mb-4">Lying In Details / <span class="text-muted">Bed Slot</span></h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button type="button" class="btn btn-danger btn-sm mb-4 mx-1" onclick="dlbedPdf()"><i class="ti ti-download"></i> Pdf</button>
                            <!-- <button type="button" class="btn btn-success btn-sm mb-4 mx-1"><i class="ti ti-download"></i> Excel</button> -->
                            <button type="button" class="btn btn-warning btn-sm mb-4 mx-1" onclick="printbedPdf()"><i class="ti ti-printer"></i> Print</button>

                        </div>

                        <div class="row" id="bed_slot">
                            <?php foreach ($slots as $slot) { ?>
                                <div class="col-md-2">
                                    <?php if ($slot->slot_status == 1) { ?>
                                        <div class="card text-white bg-success rounded shadow-none card-hover">
                                            <div class="card-body p-4">
                                                <span>
                                                    <i class="ti ti-bed fs-8"></i>
                                                </span>
                                                <h3 class="card-title mt-1 mb-0 text-white"> Bed <?php echo $slot->slots ?></h3>
                                                <p class="card-text text-white-50 fs-3 fw-normal">
                                                    available
                                                </p>
                                            </div>
                                        </div>

                                    <?php } elseif ($slot->slot_status == 2) {  ?>

                                        <div class="card text-white bg-warning rounded shadow-none card-hover ">
                                            <div class="card-body p-4">
                                                <span>
                                                    <i class="ti ti-bed fs-8"></i>
                                                </span>
                                                <h3 class="card-title mt-1 mb-0 text-white"> Bed <?php echo $slot->slots ?></h3>
                                                <p class="card-text text-white-50 fs-3 fw-normal">
                                                    Occupied
                                                </p>
                                            </div>
                                        </div>


                                    <?php } elseif ($slot->slot_status == 0) {  ?>

                                        <div class="card text-white bg-danger rounded shadow-none card-hover ">
                                            <div class="card-body p-4">
                                                <span>
                                                    <i class="ti ti-bed fs-8"></i>
                                                </span>
                                                <h3 class="card-title mt-1 mb-0 text-white"> Bed <?php echo $slot->slots ?></h3>
                                                <p class="card-text text-white-50 fs-3 fw-normal">
                                                    Not available
                                                </p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Dynamic Modal -->
<div class="modal fade" id="dynamicmodal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle">Loading Modal...</h1>
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

<!-- archive modal -->
<div class="modal fade" id="dynamicmodalArchive" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content bg-home" id="modalContentArc">
            <div class="modal-header">
            </div>
            <div class="modal-body" id="modalContentArc">

            </div>
        </div>
    </div>
</div>

<script>
    function viewlyuser(suid) {
        var su_id = suid;

        $.ajax({
            url: '../admin/getlyuser',
            method: 'POST',
            data: {
                'su_id': su_id
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                // $('button[type="button"]').prop('disabled', true);
                // $('#dynamicmodal').modal('show');
                $('#modalContent').html(response);
                $('#modalTitle').html('<i class="fas fa-info-circle"></i> Lying-in User Details')

            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $('#loadinggif').hide();
            }
        });

    }
</script>

<script>
    $(document).ready(function() {
        $('#referpatients').DataTable();
    });

    function dlreftoExcel() {
        var table = $('#referpatients').DataTable();

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

        var tableTitle = "Refer_Patients";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>

<script>
    function printreftoPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('ref_patients');

        html2canvas(htmlElement, {
            allowTaint: true,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var pdfWidth = jsPdf.internal.pageSize.getWidth();
            var pdfHeight = jsPdf.internal.pageSize.getHeight();

            var imgWidth = pdfWidth - 65; // margin
            var imgHeight = (canvas.height * imgWidth) / canvas.width;

            // Check if image height exceeds page height
            if (imgHeight > pdfHeight) {
                imgHeight = pdfHeight - 65; // margin
                imgWidth = (canvas.width * imgHeight) / canvas.height;
            }

            var leftMargin = 30; // left margin
            var topMargin = 30; // top margin

            jsPdf.addImage(imgData, 'PNG', leftMargin, topMargin, pdfWidth - 60, imgHeight);

            jsPdf.autoPrint(); // Automatically print
            window.open(jsPdf.output('bloburl'), '_blank');
        });
    }
</script>

<script>
    window.jsPDF = window.jspdf.jsPDF;

    function dlreftoPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('ref_patients');

        html2canvas(htmlElement, {
            allowTaint: true,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var pdfWidth = jsPdf.internal.pageSize.getWidth();
            var pdfHeight = jsPdf.internal.pageSize.getHeight();

            var imgWidth = pdfWidth - 65; // margin
            var imgHeight = (canvas.height * imgWidth) / canvas.width;

            if (imgHeight > pdfHeight) {
                imgHeight = pdfHeight - 65; // margin
                imgWidth = (canvas.width * imgHeight) / canvas.height;
            }

            var leftMargin = 30; // left margin
            var topMargin = 30; // top margin

            jsPdf.addImage(imgData, 'PNG', leftMargin, topMargin, pdfWidth - 60, imgHeight);
            jsPdf.save("Refer_Patients.pdf");
            window.open(jsPdf.output('bloburl'));
        });

    }
</script>

<script>
    $(document).ready(function() {
        $('#allpatients').DataTable();
    });

    function dlOverAllToExcel() {
        var table = $('#allpatients').DataTable();

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

        var tableTitle = "Over_All_Patients";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>

<script>
    function printOverAllPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('Over_all');

        html2canvas(htmlElement, {
            allowTaint: true,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var pdfWidth = jsPdf.internal.pageSize.getWidth();
            var pdfHeight = jsPdf.internal.pageSize.getHeight();

            var imgWidth = pdfWidth - 65; // margin
            var imgHeight = (canvas.height * imgWidth) / canvas.width;

            // Check if image height exceeds page height
            if (imgHeight > pdfHeight) {
                imgHeight = pdfHeight - 65; // margin
                imgWidth = (canvas.width * imgHeight) / canvas.height;
            }

            var leftMargin = 30; // left margin
            var topMargin = 30; // top margin

            jsPdf.addImage(imgData, 'PNG', leftMargin, topMargin, pdfWidth - 60, imgHeight);

            jsPdf.autoPrint(); // Automatically print
            window.open(jsPdf.output('bloburl'), '_blank');
        });
    }
</script>

<script>
    window.jsPDF = window.jspdf.jsPDF;

    function genarateOverAllPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('Over_all');

        html2canvas(htmlElement, {
            allowTaint: true,
            useCORS: true
        }).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            var pdfWidth = jsPdf.internal.pageSize.getWidth();
            var pdfHeight = jsPdf.internal.pageSize.getHeight();

            var imgWidth = pdfWidth - 65; // margin
            var imgHeight = (canvas.height * imgWidth) / canvas.width;

            if (imgHeight > pdfHeight) {
                imgHeight = pdfHeight - 65; // margin
                imgWidth = (canvas.width * imgHeight) / canvas.height;
            }

            var leftMargin = 30; // left margin
            var topMargin = 30; // top margin

            jsPdf.addImage(imgData, 'PNG', leftMargin, topMargin, pdfWidth - 60, imgHeight);
            jsPdf.save("Over_All_Patients.pdf");
            window.open(jsPdf.output('bloburl'));
        });

    }
</script>

<script>
    $(document).ready(function() {
        // Check if there's a stored active tab
        var activeTab = sessionStorage.getItem('activeTab');

        // If there's an activeTab stored, set it as the active tab
        if (activeTab) {
            $('#myTab a[href="#' + activeTab + '"]').tab('show');
        }

        // Store the active tab when a new tab is shown
        $('#myTab a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var activeTabId = $(e.target).attr('href').substr(1);
            sessionStorage.setItem('activeTab', activeTabId);
        });
    });
</script>