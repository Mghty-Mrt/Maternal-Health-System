<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Equipments</span></h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary btn-sm mb-4 me-2" id="addEqpmnt" data-bs-toggle="modal" data-bs-target="#dynamicmodalAdd"> <i class="fas fa-plus"></i> Add New </button>
                    <!-- <button type="button" class="btn btn-success btn-sm mb-4" id="showRqstLabBtn">Restock </button> -->
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="equipments" data-order='[[0,"desc"]]'>
                    <thead class="text-dark fs-3 bg-home">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Equipment ID</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Total Quantity</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Available Quantity</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Used Quantity</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Type</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_content">
                        <?php foreach($Equipments as $eqp ) { ?>
                            <tr id="tr">
                                <td><?= $eqp->id ?></td>
                                <td><?= $eqp->name ?></td>
                                <td><?= $eqp->total_qty?></td>
                                <td>
                                    <?php if($eqp->available_qty == "" ) { ?>
                                        0
                                    <?php  } else { ?>
                                        <?= $eqp->available_qty ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($eqp->used_qty == "") { ?>
                                        0
                                    <?php } else { ?>
                                        <?= $eqp->used_qty ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?= $eqp->etname ?>
                                </td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                            <i class="ti ti-dots fs-5"></i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                            <!-- <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="#"><i class="fs-4 ti ti-eye"></i>View</a> <i class="fs-4 ti ti-edit"></i>Edit</a>
                                            </li> -->
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#dynamicmodaledit" onclick="view(<?= $eqp->id ?>)"> <i class="fs-4 ti ti-eye"></i>View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="javascript:void(0)" onclick="confirmArchive(<?= $eqp->id ?>)"><i class="fs-4 ti ti-archive"></i>Archive</a>
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

<!-- Request Lab Modal -->
<div class="modal fade" id="dynamicmodalAdd" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle">Add New Equipment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">
            <form action="../hospital/add" method="POST">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="">Name</label>
                    <div class="input-group">
                        <input type="text" id="name" name="name" class="form-control shadow-none">
                    </div>   
                    <div id="invalidbors" class="invalid-feedback" style="display: none;"></div>
                </div>
                <div class="col-md-12">
                    <label for="">Description</label>
                    <div class="input-group mb-3">
                        <textarea name="desc" id="desc" cols="30" rows="4" class="form-control shadow-none"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Equipment Type</label>
                    <div class="input-group mb-3">
                        <select name="eqtyp" id="eqtyp" class="form-select">
                        <?php foreach($EquipmentType as $et) { ?>
                            <option value="<?= $et->id ?>"><?= $et->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Total Quantity</label>
                    <div class="input-group mb-3">
                        <input type="number" name="tqty" id="tqty" class="form-control shadow-none">
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancel</button>
            <button type="submit" id="btnsubmit" class="btn btn-success"> Add</button>
          </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="dynamicmodaledit" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-home">
        <h1 class="modal-title fs-4 text-light" id="modalTitle">Edit Equipment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">

      </div>
      
    </div>
  </div>
</div>

<!-- <script>
    function validate(){
        var isValid = true;

        var email = $('#name').val();
        if (!email || !validateEmail(email)) {
            $('#invalidbors').html('<i class="fas fa-exclamation-circle ms-2"></i> Email is required and must be valid.');
            $('#invalidbors').show();
            $('#email').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidbors').hide();
            $('#email').removeClass('is-invalid');
        }

        if (!isValid) {
            return false; // Exit the function if form validation fails
        }
    }
</script> -->

<script>
  function view(id) {
    var equi_id = id;

    $.ajax({
      url: '../hospital/viewequi',
      method: 'POST',
      data: {
        equi_id: equi_id
      },
      success: function(response) {
        $('#modal-body').html(response);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
</script>

<script>
    $(document).ready(function() {
        $('#equipments').DataTable();
    });
</script>

<script>
    function confirmArchive(eqid) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to archive this Equipment!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, archive it!'
        }).then((result) => {
            if (result.isConfirmed) {
                archive(eqid);
            }
        });
    }

    function archive(eqid) {
        $.ajax({
            url: '../hospital/archive',
            method: 'POST',
            data: { eqid: eqid },
            success: function(response) {
                // Handle success response
                Swal.fire({
                    title: 'Archived!',
                    text: 'The equipment has been archived.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function(xhr, status, error) {
                Swal.fire('Error!', 'Failed to archive the equipment.', 'error');
            }
        });
    }
</script>