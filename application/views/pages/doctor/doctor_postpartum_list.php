<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Refered Patients</span></h5>
                </div>

                <div class="col-md-6 d-flex justify-content-end">
                    <!-- <button type="button" class="btn btn-primary btn-sm me-2 mb-4" id="showReferralBtn">Complete <i class="fas fa-question"></i> </button> -->
                    <!-- <button type="button" class="btn btn-success btn-sm mb-4" id="showPostnatalBtn">Postnatal CheckUp <i class="fas fa-question"></i> </button> -->

                    <button type="button" class="btn btn-success btn-sm me-2 mb-4" onclick="dlToExcel()" id="showDischargeMother"> <i class="ti ti-download"></i> Excel </button>
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
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Mother</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Baby</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date Visit</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach ($c_partum as $index => $partum) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <?= $partum->pre_id ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $partum->firstname ?> <?= $partum->middlename ?> <?= $partum->lastname ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?php $baby = json_decode($partum->baby_info, true); ?>
                                    <?php print $baby['Child_Name'] ?? '' ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= date('M j, Y, g:i a', strtotime($partum->ppo_date)) ?>
                                </td>
                                <td>
                                    <?php if ($partum->pc_id == 0) : ?>
                                        <button type="button" class="btn btn-primary btn-sm btnPartum" data-id="<?= $partum->pre_id ?>" id="btnPartum<?= $index ?>">
                                            <i class="ti ti-upload"></i> Mark as Complete
                                        </button>
                                    <?php else : ?>
                                        <button type="button" class="btn bg-home text-light btn-sm">
                                            <i class="fas fa-check-circle"></i> Patient Completed
                                        </button>
                                    <?php endif; ?>

                                    <!-- <div class="dropdown dropstart btndone">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="#"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a>
                                            </li>
                                        </ul>
                                    </div> -->
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
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btnPartum');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: true
                });

                swalWithBootstrapButtons.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Mark as complete! ",
                    cancelButtonText: "Cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        const id = button.dataset.id;
                        // alert(id);
                        $.ajax({
                            url: '../doctor/complete',
                            method: 'POST',
                            data: {
                                'pre_id': id
                            },

                            beforeSend: function() {
                                $('#loadinggif').show();
                            },

                            success: function(response) {

                                swalWithBootstrapButtons.fire({
                                    title: "Completed!",
                                    text: "congratulations Patient now marked as complete.",
                                    icon: "success"
                                });

                                location.reload();

                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            },
                            complete: function() {
                                $('#loadinggif').hide();
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Your action is safe :)",
                            icon: "error"
                        });
                    }
                });
            });
        });
    });
</script>

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