<style>
    table.dataTable thead {
        margin-top: 20px;
    }

    table.dataTable th,
    table.dataTable td {
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
    }

    table.dataTable th:first-child,
    table.dataTable td:first-child {
        padding-left: 20px;
    }

    table.dataTable th:last-child,
    table.dataTable td:last-child {
        padding-right: 20px;
    }

    table.dataTable tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 10px;
    }

    .dataTables_wrapper .dataTables_length label,
    .dataTables_wrapper .dataTables_filter label {
        font-weight: bold;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input[type="search"] {
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .dataTables_wrapper .dataTables_length select:focus,
    .dataTables_wrapper .dataTables_filter input[type="search"]:focus {
        outline: none;
        border-color: #2684ff;
        box-shadow: 0 0 5px rgba(38, 132, 255, 0.5);
    }
</style>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title mb-4">Dashboard / <span class="text-muted">Patients</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm mb-4 mx-1"><i class="ti ti-download"></i> Pdf</button>
                    <button type="button" class="btn btn-success btn-sm mb-4 mx-1"><i class="ti ti-download"></i> Excel</button>
                    <button type="button" class="btn btn-primary btn-sm mb-4 mx-1"><i class="ti ti-printer"></i> Print</button>

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
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="allpatients" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Patient ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Date/Time Created</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Status</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Check-up Stage</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <tr id="tr">
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0"></h6>
                            </td>
                            <td class="border-bottom-0">
                            </td>
                            <td class="border-bottom-0">
                            </td>
                            <td class="border-bottom-0">
                            </td>
                            <td class="border-bottom-0">
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
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="#"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#allpatients').DataTable();
    });
</script>