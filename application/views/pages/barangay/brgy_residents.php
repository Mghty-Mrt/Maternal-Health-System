<div class="container-fluid">
  <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col-md-6">
          <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Resident List</span></h5>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
          <form action="../barangay/importexcel" method="post" enctype="multipart/form-data">
            <?php foreach ($user_info as $info) { ?>
              <input type="hidden" id="fid" name="fid" value="<?= $info->facilities_id ?>">
            <?php } ?>
            <div class="input-group mb-3">
              <label class="input-group-text bg-success border-success text-light" for="fileInput" style="height: 29px;">
                <i class="ti ti-upload fw-bold"></i> Excel
              </label>
              <input type="file" class="form-control form-control-sm" id="fileInput" name="excel_file" accept=".xls, .xlsx" required />
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
        </div>

        <div class="col-md-12 d-flex justify-content-end">
          <button type="submit" class="btn btn-success btn-sm mb-4"><i class="ti ti-file-import fs-3"></i> Import</button>
          </form>
          <button type="button" class="btn btn-primary btn-sm mb-4 ms-3" data-bs-toggle="modal" data-bs-target="#dynamicmodalAdd"><i class="fas fa-plus"></i> Create</button>
        </div>
      </div>

      <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
          <?php echo $this->session->flashdata('success'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php elseif ($this->session->flashdata('failed')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="failedAlert">
          <?php echo $this->session->flashdata('failed'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <div class="table-responsive">
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
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date Added</h6>
              </th>
              <!-- <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
              </th> -->
            </tr>
          </thead>
          <tbody id="tbl_content">
            <?php foreach ($residents as $perresi) {
            ?>
              <tr id="tr">
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?php print $perresi->id ?></h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?php print $perresi->lastname ?>, <?php print $perresi->firstname ?> </p>
                </td>
                <td class="border-bottom-0">
                  <span class=""><?php print $perresi->street ?></span>
                </td>
                <td class="border-bottom-0">
                  <span class=""><?php print date('M j, Y / g:i a', strtotime ($perresi->createdAt)) ?></span>
                </td>
                <!-- <td class="border-bottom-0">

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
                </td> -->
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="dynamicmodalAdd" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Resident</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../barangay/addResident" method="POST" id="CreateForm">
          <div class="row">
            <div class="col-md-4">
              <label for="lname">Last name</label>
              <div class="input-group mb-3">
                <input type="text" name="lname" id="lname" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <label for="fname">First name</label>
              <div class="input-group mb-3">
                <input type="text" name="fname" id="fname" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <label for="mname">Middle name</label>
              <div class="input-group mb-3">
                <input type="text" name="mname" id="mname" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="bdate">Birth Date</label>
              <div class="input-group mb-3">
                <input type="date" name="bdate" id="bdate" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="age">Age</label>
              <div class="input-group mb-3">
                <input type="number" name="age" id="age" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="cstatus">Civil Status</label>
              <div class="input-group mb-3">
                <select class="form-select mr-sm-2" name="cstatus" id="cstatus" required>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Separated">Separated</option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="occu">Occupation</label>
              <div class="input-group mb-3">
                <input type="text" name="occu" id="occu" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="mnum">Mobile No.</label>
              <div class="input-group mb-3">
                <input type="number" name="mnum" id="mnum" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="email">Email</label>
              <small class="text-danger fs-1">*if none put N/A</small>
              <div class="input-group mb-3">
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="street">Street</label>
              <div class="input-group mb-3">
                <input type="text" name="street" id="street" class="form-control" required>
              </div>
            </div>

            <div class="col-md-4">
              <label for="brgy">Barangay</label>
              <div class="input-group mb-3">
                <select class="form-select mr-sm-2" name="brgy" id="brgy" required>
                  <?php foreach ($barangay as $perbrgy) { ?>
                    <option value="<?= $perbrgy->id ?>"><?= $perbrgy->name ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <label for="city">City</label>
              <div class="input-group mb-3">
                <select class="form-select mr-sm-2" name="city" id="city" required>
                  <option value="Quezon City">Quezon City</option>
                </select>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#residents').DataTable();
    });
  </script>

  <script>
    $(document).ready(function() {
      // Find and hide the alerts after 3 seconds
      setTimeout(function() {
        $('#successAlert, #failedAlert').fadeOut('slow');
      }, 3000);
    });
  </script>

  <script>
    // Display success message
    <?php if ($this->session->flashdata('success_message')) : ?>
      Swal.fire({
        title: 'Success!',
        text: '<?= $this->session->flashdata('success_message') ?>',
        icon: 'success',
        timer: 3000,
        confirmButtonText: 'OK'
      });
    <?php endif; ?>

    // Display error message
    <?php if ($this->session->flashdata('error_message')) : ?>
      Swal.fire({
        title: 'Error!',
        text: '<?= $this->session->flashdata('error_message') ?>',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    <?php endif; ?>
  </script>