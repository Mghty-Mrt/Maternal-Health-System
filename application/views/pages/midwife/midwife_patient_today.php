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
      <div class="d-flex justify-content-between">
        <h5 class="card-title mb-4">Dashboard / <span class="text-muted">Today's Patients</span></h5>
        <button type="button" class="btn btn-primary btn-sm mb-4" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate"><i class="fas fa-plus"></i> Request Laboratory</button>
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
        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="tpatients" data-order='[[0,"desc"]]'>
          <thead class="text-dark fs-3 bg-home">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Patient ID</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Name</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Barangay</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Status</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Action</h6>
              </th>
            </tr>
          </thead>
          <tbody id="tbl_content">
            <?php foreach($PatientToday as $today) { ?>
            <tr id="tr">
              <td class="border-bottom-0">
                <h6 class="fw-semibold mb-0">P0<?= $today->id?></h6>
              </td>
              <td class="border-bottom-0">
                <p class="mb-0 fw-normal"><?= $today->firstname?> <?= $today->middlename?> <?= $today->lastname?></p>
              </td>
              <td class="border-bottom-0">
                <span class="">Holy Spirit</span>
              </td>
              <td class="border-bottom-0">
                <span class="">Pending</span>
              </td>
              <td class="border-bottom-0">
                <span class="badge bg-home fs-3 btnView" data-bs-toggle="modal" data-bs-target="#dynamicmodalLC"><i class="fas fa-ellipsis-h"></i></span>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Add Create -->
<div class="modal fade" id="dynamicmodalCreate" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Request Laboratory</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
          <div class="row">
            <div class="col-md-8">
              <label for="search"><b>Search Resident</b></label>
              <input list="residentList" name="search" id="search" class="form-control" placeholder="Enter name">
              <datalist id="residentList">
                <!-- Resident options will be populated here -->
              </datalist>
            </div>

            <div class="col-md-3">
              <label for="spe"><b>Send To</b></label>
              <select class="form-select mr-sm-2" name="spe" id="spe">
                <option>Doctor</option>
                <option>Midwife</option>
              </select>
            </div>

            <div class="col-md-1 text-center">
              <label for="add"></label>
              <div class="input-group mb-3">
                <button type="button" class="btn btn-secondary" id="addResident"><i class="fas fa-plus-circle fs-4"></i></button>
              </div>
            </div>
          </div>

          <div id="addedResidents">
            <!-- Display added residents here -->
          </div>

          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-success">Send <i class="fas fa-paper-plane"></i></button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#tpatients').DataTable();
  });
</script>
