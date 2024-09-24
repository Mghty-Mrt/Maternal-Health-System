<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title mb-4">Dashboard / <span class="text-muted">Fetal Death Record</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                        <!-- <button type="button" class="btn btn-outline-dark btn-sm me-2 mb-4" id="showNewbFBtn">Fetal Death <i class="fs-3 ti ti-file-pencil"></i> </button> -->
                        <!-- <button type="button" class="btn btn-dark btn-sm me-2 mb-4" id="showNewbMBtn">Mother Death <i class="fs-3 ti ti-file-pencil"></i> </button> -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="fetal_death" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Baby Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Mother</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Date</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Status</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php  foreach($fetal as $f ) { ?>
                            <tr id="tr">
                                <td><?= $f->nr_id ?></td>
                                <td>
                                    <?php $baby = json_decode($f->baby_info, true) ?>
                                    <?= $baby['firstname'] .' '. $baby['middilename'] .' '. $baby['lastname'] ?>
                                </td>
                                <td>
                                    <?php $mom = json_decode($f->referral_details, true) ?>
                                    <?= $mom['PatientName']?>
                                </td>
                                <td><?= date('M, d Y \a\t h:i a', strtotime($f->nr_date)) ?></td>
                                <td>
                                    <span class="bg-danger rounded-2 py-1 px-2 fs-2 text-light">Fetal Death</span>
                                </td>
                            </tr>
                            <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#fetal_death').DataTable();
    });
</script>