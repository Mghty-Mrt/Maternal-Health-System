<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <h5 class="card-title mb-4">Doctor's <span class="text-muted"> Patients List</span></h5>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="record" data-order='[[0,"desc"]]'>
          <thead class="text-dark fs-3 bg-home">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Doctor's Name</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Patient's Name</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Schedule</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Bed Slot</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-light mb-0">Action</h6>
              </th>
            </tr>
          </thead>
          <tbody id="tbl_content">

            <tr id="tr">
              <td class="border-bottom-0">
                <p class="mb-0 fw-normal"></p>
              </td>
              <td class="border-bottom-0">
                <span class=""></span>
              </td>
              <td class="border-bottom-0">

                <span class="badge rounded-2 fs-2 fw-bold "></span>
              </td>
              <td class="border-bottom-0">




              </td>
              <td>
                <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href=" "></i>View</a>
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
    $('#record').DataTable();
  });
</script>