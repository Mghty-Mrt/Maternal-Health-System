<div class="container-fluid">
    <div class="card" id="pageLoad">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <?php foreach($Barangays as $brgy) { ?>
                <h5 class="card-title fw-bold text-uppercase fs-3"> <i class="fas fa-building fs-3"></i> <?php print $brgy->name ?> / <span class="text-muted">Barangay Details</span></h5>
                <a href="../admin/barangay" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up fw-semibold"></i> Back</a>
                <?php } ?>
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#home5" role="tab" aria-controls="home5" aria-expanded="true" aria-selected="false" tabindex="-1">
                        <span><i class="fas fa-users"></i> Resident List</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="true">
                        <span><i class="fas fa-archive"></i> Archived Resident</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content tabcontent-border p-3" id="myTabContent">
                <div role="tabpanel" class="tab-pane fade" id="home5" aria-labelledby="home-tab">
                    <p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title mb-4">Barangay Details / <span class="text-muted">Resident List</span></h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button type="button" class="btn btn-danger btn-sm mb-4 mx-1" onclick="generatePdf()"><i class="ti ti-download"></i> Pdf</button>
                            <button type="button" class="btn btn-success btn-sm mb-4 mx-1" onclick="dlToExcel()"><i class="ti ti-download"></i> Excel</button>
                            <button type="button" class="btn btn-warning btn-sm mb-4 mx-1" onclick="printPdf()"><i class="ti ti-printer"></i> Print</button>
                    
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
                    <div class="table-responsive" id="resident_list">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="residents" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Resident ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Street</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Created At</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <?php foreach ($residentList as $perresi) { ?>
                                    <input type="hidden" id="brgy_id" name="brgy_id" value="<?=$perresi->fid ?>">
                                <tr id="tr">
                                    <td class="border-bottom-0">
                                        <?php print $perresi->id ?>
                                    </td>
                                    <td class="border-bottom-0">
                                        <?php print $perresi->firstname ?> <?php print $perresi->middlename ?> <?php print $perresi->lastname ?>
                                    </td>
                                    <td class="border-bottom-0">
                                        <?php print $perresi->street ?>
                                    </td>
                                    <td class="border-bottom-0">
                                        <?php print date('F j, Y / g:i a', strtotime($perresi->createdAt)) ?>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                <i class="ti ti-dots fs-5"></i>
                                            </span>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                <li>
                                                    <button class="dropdown-item d-flex align-items-center gap-3 text-secondary" id="btnViewR" data-bs-toggle="modal" data-bs-target="#dynamicmodal" data-id="<?= $perresi->rsdid?>"><i class="fs-4 ti ti-eye"></i>View</button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item d-flex align-items-center gap-3 text-success"id="btnEditR" data-bs-toggle="modal" data-bs-target="#dynamicmodal" data-id="<?= $perresi->rsdid?>"><i class="fs-4 ti ti-edit"></i>Edit </button>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item d-flex align-items-center gap-3 text-danger btnArchiveR"data-bs-toggle="modal" data-bs-target="#dynamicmodalArchive" data-id="<?= $perresi->rsdid?>"><i class="fs-4 ti ti-archive"></i>Archive</button>
                                                </li>
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

                <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab">
                    <p id="tab-content">
                        
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title mb-4">Barangay Details / <span class="text-muted">Archived Resident</span></h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <button type="button" class="btn btn-danger btn-sm mb-4 mx-1" onclick="generatePdfArc()"><i class="ti ti-download"></i> Pdf</button>
                            <button type="button" class="btn btn-success btn-sm mb-4 mx-1" onclick="dlToExcelArc()"><i class="ti ti-download"></i> Excel</button>
                            <button type="button" class="btn btn-warning btn-sm mb-4 mx-1" onclick="printPdfArc()"><i class="ti ti-printer"></i> Print</button>
                    
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
                    <div class="table-responsive" id="archived_residents">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="archiveResidents" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Resident ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Street</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Archived AT</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <?php foreach ($ArchivedresidentList as $perArcresi) { ?>
                                    
                                <tr id="tr">
                                    <td class="border-bottom-0">
                                        <?php print $perArcresi->id ?>
                                    </td>
                                    <td class="border-bottom-0">
                                        <?php print $perArcresi->firstname ?> <?php print $perArcresi->middlename ?> <?php print $perArcresi->lastname ?>
                                    </td>
                                    <td class="border-bottom-0">
                                        <?php print $perArcresi->street ?>
                                    </td>
                                    <td class="border-bottom-0">
                                        <?php print date('F j, Y / g:i a', strtotime($perArcresi->createdAt)) ?>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart">
                                            <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                <i class="ti ti-dots fs-5"></i>
                                            </span>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                <li>
                                                <button class="dropdown-item d-flex align-items-center gap-3 text-warning btnRestore" data-bs-toggle="modal" data-bs-target="#dynamicmodalRestore" data-id="<?= $perArcresi->id ?>"> <i class="fs-4 ti ti-refresh"></i>Restore</button>
                                                </li>
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
            </div>
        </div>
    </div>
</div>

<!-- Dynamic Modal -->
<div class="modal fade" id="dynamicmodal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-5" id="modalTitle">Loading Modal...</h1>
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
    <div class="modal-content">
        <div class="modal-header bg-danger">
            <h4 class="modal-title fs-5" id="modalTitle"><i class="fas fa-archive"></i> <span class="fs-4">Archive Confirmation</span></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body" id="modalContentArc">

      </div>
    </div>
  </div>
</div>

<!-- restore modal -->
<div class="modal fade" id="dynamicmodalRestore" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h4 class="modal-title fs-5" id="modalTitle"><i class="ti ti-refresh"></i> <span class="fs-4">Restore Confirmation</span></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body" id="modalContentRes">

      </div>
    </div>
  </div>
</div>


<script>
    function printPdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('resident_list');

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

    function generatePdf() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('resident_list');

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
            jsPdf.save("Residents.pdf");
            window.open(jsPdf.output('bloburl'));
        });

    }
</script>

<script>
    function printPdfArc() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('archived_residents');

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

    function generatePdfArc() {
        let jsPdf = new jsPDF('p', 'pt', 'Legal');
        var htmlElement = document.getElementById('archived_residents');

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
            jsPdf.save("Archived_Residents.pdf");
            window.open(jsPdf.output('bloburl'));
        });

    }
</script>

<script>
    $(document).ready(function() {
        $('#residents').DataTable();
    });

    function dlToExcel() {
        var table = $('#residents').DataTable();

        // Specify the column indexes to include in the Excel file
        var columnIndexes = [0, 1, 2, 3];

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

        var tableTitle = "Residents_record";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>

<script>
    $(document).ready(function() {
        $('#archiveResidents').DataTable();
    });

    function dlToExcelArc() {
        var table = $('#archiveResidents').DataTable();

        // Specify the column indexes to include in the Excel file
        var columnIndexes = [0, 1, 2, 3];

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

        var tableTitle = "Archived_Residents_record";

        // Save the workbook to a file
        var fileName = tableTitle + ".xlsx";
        XLSX.writeFile(wb, fileName);
    }
</script>

<script>
    $(document).ready(function() {
        // Find and hide the alerts after 2 seconds
        setTimeout(function() {
            $('#successAlert, #failedAlert').fadeOut('slow');
        }, 2000);
    });
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

<script>
    $(document).on('click', '#btnViewR', function() {
        var resident_id = $(this).data('id');
        //alert(resident_id);

        $.ajax({
            url: '../admin/viewresident?=' + resident_id,
            method: 'GET',
            data: {
                resident_id: resident_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div class="text-light"> <i class="fas fa-info-circle fs-6"></i> View Resident </div>');
                $('#modalContent').html(data);
                $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).on('click', '#btnEditR', function() {
        var resident_id = $(this).data('id');
        //alert(resident_id);

        $.ajax({
            url: '../admin/editResident?=' + resident_id,
            method: 'GET',
            data: {
                resident_id: resident_id
            },
            success: function(data) {
                $('#modalTitle').html('<div class="text-light"> <i class="fas fa-edit"></i> Edit Resident </div>');
                $('#modalContent').html(data);
                $('#dynamicmodal').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
      var archive_id = null;

      $('.btnArchiveR').click(function(e) {
        resident_id = $(this).data('id');
        facility_id = <?php echo $perresi->fid; ?>;
        //alert(resident_id);

        $('#modalContentArc').html('<span class="d-flex justify-content-center pt-2"><i class="fas fa-exclamation-triangle text-warning" style="font-size: 55px;"></i></span>' +
          '<p class="text-center text-dark fs-4"><strong class="text-warning">Warning</strong><br> Are you sure you want to <br> Archive this Resident?</p>' +
          '<div class="modal-footer d-flex justify-content-center mb-3">' +
          '<button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="fas fa-times"></i> No</button>' +
          '<button type="button" class="btn btn-danger" id="confirmArchiveBtn"><i class="fas fa-check"></i> Yes</button>' +
          '</div>');
          $('#dynamicmodalArchive').modal('show');
        });

      $(document).on('click', '#confirmArchiveBtn', function() {

        $.ajax({
          type: 'POST',
          url: '../admin/archiveresident',
          data: {
            id: resident_id
          },
          success: function(response) {
            console.log('Archive success:', response);
            window.location.href = "../admin/viewbarangaydetails?id=" + facility_id;
            // $('#tr').html(response);
            //$('#dynamicmodalArchive').modal('hide');
          },
          error: function(xhr, status, error) {
            // Handle errors here
            console.error('Archive error:', error);
            
          }
        });

        $('#dynamicmodalArchive').modal('hide');
      });
    });
  </script>

<script>
    $(document).ready(function() {
      var archive_id = null; 

      $('.btnRestore').click(function(e) {
        restore_id = $(this).data('id');
        facility_id = <?php echo $perArcresi->fid; ?>;
        //alert(restore_id);

        $('#modalContentRes').html('<span class="d-flex justify-content-center"> <i class="fas fa-info-circle text-secondary" style="font-size: 60px;"></i></span>' +
          '<p class="text-center text-dark fs-3"><strong class="text-secondary fs-5">Information</strong> <br> When you restore this Resident it will <br> return to the active resident list. <br> Are you sure you want to Restore <br> this Resident?</p>' +
          '<div class="modal-footer d-flex justify-content-center mb-3">' +
          '<button type="button" class="btn btn-warning" data-bs-dismiss="modal"><i class="fas fa-times"></i> No</button>' +
          '<button type="button" class="btn btn-secondary" id="confirmRestoreBtn"><i class="fas fa-check"></i> Yes</button>' +
          '</div>');
          $('#dynamicmodalRestore').modal('show');
        });

      $(document).on('click', '#confirmRestoreBtn', function() {

        $.ajax({
          type: 'POST',
          url: '../admin/restoreresident',
          data: {
            id: restore_id
          },
          success: function(response) {
            console.log('Restore success:', response);
            window.location.href = "../admin/viewbarangaydetails?id=" + facility_id;
            //$('#archiveResidents').html(response);
    
          },
          error: function(xhr, status, error) {
            // Handle errors here
            console.error('Restore error:', error);
            
          }
        });

        $('#dynamicmodalRestore').modal('hide');
      });
    });
  </script>
