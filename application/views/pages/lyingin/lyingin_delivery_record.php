<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title mb-4">Dashboard / <span class="text-muted">Delivery Records List</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-dark btn-sm me-2 mb-4" id="showNewbFBtn">Fetal Death <i class="fs-3 ti ti-file-pencil"></i> </button>
                        <!-- <button type="button" class="btn btn-dark btn-sm me-2 mb-4" id="showNewbMBtn">Mother Death <i class="fs-3 ti ti-file-pencil"></i> </button> -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="lyreferp" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Delivery ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">From</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Referred Patients</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Date</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Check</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach($DeliveryRecords as $rp ) { ?>
                            <tr id="tr">
                                <td><?= $rp->drid ?></td>
                                <td><?= $rp->fname?></td>
                                <td>
                                    <?= $rp->firstname ?>
                                    <?= $rp->middlename ?>
                                    <?= $rp->lastname ?>
                                </td>
                                <td><?= date('M, d Y \a\t h:i a', strtotime($rp->drdate)) ?></td>
                                <td>
                                    <!-- <span class="btn btn-info fs-2 btn-sm btnView"><i class="far fa-eye"></i> View Records</span> -->
                                    <a href="../lyingin/newbornrecord?id=<?= $rp->drid ?>" class="btn btn-danger fs-2 btn-sm btn_nb"><i class="fs-3 ti ti-file-pencil"></i> Newborn Record</a>
                                    <a onclick="fetal_death(<?= $rp->drid ?>, '<?= $rp->middlename ?>', '<?= $rp->lastname ?>')" data-bs-toggle="modal" data-bs-target="#fetal_death_modal" class="btn btn-outline-dark fs-2 btn-sm btn_f" style="display: none;"><i class="fs-3 fas fa-print"></i> Fetal Death</a>
                                    <!-- <a target="_blank" href="../lyingin/generate_fetal_death_certificate?id=<?= $rp->drid ?>" class="btn btn-outline-dark fs-2 btn-sm btn_f" style="display: none;"><i class="fs-3 fas fa-print"></i> Generate Fetal Death Ceritificate</a> -->
                                    <!-- <a target="_blank" href="../lyingin/generate_death_certificate?id=<?= $rp->drid ?>" class="btn btn-dark fs-2 btn-sm btn_m" style="display: none;"><i class="fs-3 fas fa-print"></i> Generate Death Ceritificate</a> -->
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            
                                        <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="../lyingin/editDelivery?id=<?= $rp->drid ?>"><i class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            <li>
                                                <!-- <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="#"><i class="fs-4 ti ti-archive"></i>Archive</a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>


<div class="modal fade" id="fetal_death_modal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable rounded-1">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5 text-light" id="modalTitle"><i class="fas fa-file"></i> Baby's Info</h1>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body" id="modalContent">

                <div id="b_info">
                    <p class="text-info"><i class="fas fa-exclamation-circle"></i> <b>NOTE:</b> 
                        Please Input the baby's name if available.
                    </p>
                    
                    <div class="row">
                        <input type="hidden" name="dr_id" id="dr_id">
                        <div class="col-md-12 mb-3">
                            <label for="">First Name</label>
                            <div class="input-group">
                                <input type="text" name="bf_name" id="bf_name" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Middle Name</label>
                            <div class="input-group">
                                <input type="text" name="bm_name" id="bm_name" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Last Name</label>
                            <div class="input-group">
                                <input type="text" name="bl_name" id="bl_name" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Birthdate</label>
                            <div class="input-group">
                                <input type="date" name="b_date" id="b_date" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Birthtime</label>
                            <div class="input-group">
                                <input type="time" name="b_time" id="b_time" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Sex</label>
                            <div class="input-group">
                                <select class="form-select" name="b_sex" id="b_sex">
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3"> 
                    <!-- <a target="_blank" href="../lyingin/generate_fetal_death_certificate" id="fetal_certificate" style="display: none;" class="btn btn-outline-primary fs-2 btn-sm btn_f"><i class="fs-3 fas fa-print"></i> Generate Fetal Death Ceritificate</a> -->
                    
                <a target="_blank" href="../lyingin/generate_fetal_death_certificate" id="fetal_certificate" class="btn btn-outline-primary fs-2 btn-sm btn_f"><i class="fs-3 fas fa-print"></i> Generate Fetal Death Ceritificate</a>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btn-secondary" id="f_btn" onclick="save_b_info()">Save <i class="fas fa-save"></i></button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#lyreferp').DataTable();
    });
</script>

<script>
    function fetal_death(id, m_name, l_name){

        var dr_id = id;

        // Set values to hidden inputs
        document.getElementById("dr_id").value = dr_id;
        document.getElementById("bm_name").value = m_name;
        document.getElementById("bl_name").value = l_name;
    }

    function save_b_info(){

        var dr_id = $('#dr_id').val();
        var baby_data = {
            'firstname': $('#bf_name').val(),
            'middilename': $('#bm_name').val(),
            'lastname': $('#bl_name').val(),
            'birthdate': $('#b_date').val(),
            'birthtime': $('#b_time').val(),
            'sex': $('#b_sex').val(),
        };

        var baby_data_Json = JSON.stringify(baby_data);

        $.ajax({
            url: '../lyingin/submitfetalrecord',
            method: 'POST',
            data: {
                'dr_id': dr_id,
                'baby_data_Json': baby_data_Json,
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[id="f_btn"]').prop('disabled', true);
                $('#b_info').hide();
                $('#f_btn').hide();
                $('#fetal_certificate').show();
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    didClose: () => {
                        // location.reload();
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Baby's record saved successfully  "
                });
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
        var mother = false;

        $("#showNewbFBtn").click(function() {
            $(".btn_f").toggle();
            $(".btn_nb").toggle();

            mother = !mother;
            $("#showNewbMBtn").prop('disabled', mother);

        });

        var nb = false;

        $("#showNewbMBtn").click(function() {
            $(".btn_m").toggle();
            $(".btn_nb").toggle();

            nb = !nb;
            $("#showNewbFBtn").prop('disabled', nb);

        });
    });
</script>
