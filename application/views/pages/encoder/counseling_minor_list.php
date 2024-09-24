<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Minor List</span></h5>
                </div>
                <!-- <div class="col-md-8 d-flex justify-content-end">
                    <a href="../encoder/newponline" class="btn btn-success btn-sm mb-4 me-2"><i class="fas fa-plus"></i> Online Patient</a>
                    <a href="../encoder/newp" class="btn btn-primary btn-sm mb-4"><i class="fas fa-plus"></i> New Patient</a>
                </div> -->
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="c_minor">
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Registration ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Patient Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Guardian Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Guardian ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Relationship</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Age</h6>
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
                        <?php foreach ($minor as $m) { ?>
                            <tr id="tr">
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><?= $m->oreg_id ?></h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal"><?= $m->firstname ?> <?= $m->middlename ?> <?= $m->lastname ?></p>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $m->name ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?php if ($m->identification == "" && $m->identification_2 == "") { ?>
                                        <i class="fas fa-image fs-5"></i>
                                    <?php } else { ?>
                                        <?php if ($m->identification == "") { ?>
                                            <i class="fas fa-image fs-5"></i>
                                        <?php } else { ?>
                                            <a target="_blank" href="/mhs_micro/guardian_id/<?= $m->identification ?>">
                                                <img src="/mhs_micro/guardian_id/<?= $m->identification ?>" class="card-img rounded-1" style="width: 45px;" height="25px">
                                            </a>
                                        <?php } ?>

                                        <?php if ($m->identification_2 == "") { ?>
                                            <!-- <i class="fas fa-image fs-5" style="width: 45px;" height="25px"></i> -->
                                        <?php } else { ?>
                                            <a target="_blank" href="/mhs_micro/guardian_id/<?= $m->identification_2 ?>">
                                                <img src="/mhs_micro/guardian_id/<?= $m->identification_2 ?>" class="card-img rounded-1" style="width: 45px;" height="25px">
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $m->relationship ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?= $m->age ?>
                                </td>
                                <td class="border-bottom-0">
                                    <?php if ($m->o_status == 0) { ?>
                                        <span class="text-secondary fw-bold fs-2 bg-primary-subtle rounded-3 px-2 py-1"> <i class="ti ti-refresh fs-3 fw-bold"></i> For Counseling</span>
                                    <?php } elseif ($m->o_status == 1) { ?>
                                        <span class="text-success fw-bold fs-2 bg-success-subtle rounded-3 px-2 py-1"> <i class="fas fa-check-circle"></i> Done Counseling</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <?php if ($m->o_status == 0) { ?>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#counseling_modal" onclick="counseling(<?= $m->oreg_id ?>, '<?= $m->firstname . ' ' . $m->middlename . ' ' . $m->lastname ?>', '<?= $m->name ?>')"><i class="fs-4 ti ti-edit"></i>Counseling</a>
                                                </li>
                                            <?php } ?>

                                            <?php if ($m->o_status == 1) { ?>
                                                <!-- <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#dynamicmodal" onclick="view(<?= $m->oreg_id ?>)"><i class="fs-4 ti ti-eye"></i>View</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="javascript:void(0)"><i class="fs-4 ti ti-edit"></i>Edit</a>
                                                </li> -->
                                            <?php } ?>
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

<div class="modal fade" id="counseling_modal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable rounded-1 modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-light" id="modalTitle"><i class="fas fa-file"></i> Counseling</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

                <div id="AP_details">
                    <div class="d-flex justify-content-center">
                        <img src="../assets/images/logos/quezoncity.png" class="me-1 mt-2" width="70px" height="58px" alt="">
                        <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Minor Counseling</small></h5>
                        <img src="../assets/images/logos/healthdepartment.png" class="ms-2" width="80px" alt="">
                    </div>

                    <div class="row mt-4">
                        <input type="hidden" name="c_id" id="c_id">
                        <div class="col-md-6 mb-3">
                            <label for="" class="fw-bold">Patient Name</label>
                            <input type="text" class="form-control shadow-none" id="p_name" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="fw-bold">Guardian Name</label>
                            <input type="text" class="form-control shadow-none" id="g_name" readonly>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="fw-bold">Remarks</label>
                            <textarea name="remarks" id="remarks" rows="7" class="form-control shadow-none" placeholder="Type your remarks here..."></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="Savecoun()">Save <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#c_minor').DataTable();
    });

    function counseling(id, patient_name, guardian_name) {
        var oreg_id = id;

        document.getElementById('c_id').value = oreg_id;
        document.getElementById('p_name').value = patient_name;
        document.getElementById('g_name').value = guardian_name;

    }

    function Savecoun() {

        var id = $('#c_id').val();
        var remarks = $('#remarks').val();

        // console.log(id, remarks);

        $.ajax({
            url: '../encoder/submitcounseling',
            type: 'POST',
            data: {
                'id': id,
                'remarks': remarks
            },
            success: function(response) {
                $('#counseling_modal').modal('hide');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

    }
</script>