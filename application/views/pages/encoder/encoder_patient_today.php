<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <h5 class="card-title fw-bold text-uppercase fs-3 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Pre Registration</span></h5>
        </div>
        <div class="col-md-8 d-flex justify-content-end">
          <a href="../encoder/newponline" class="btn btn-success btn-sm mb-4 me-2"><i class="fas fa-plus"></i> Online Patient</a>
          <a href="../encoder/newp" class="btn btn-primary btn-sm mb-4"><i class="fas fa-plus"></i> New Patient</a>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="prepatients">
          <thead class="text-dark fs-3 bg-home">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Resident ID</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Name</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Date Added</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Registration Type</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Checkup Status</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Result</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold text-uppercase fs-2 text-light mb-0">Action</h6>
              </th>
            </tr>
          </thead>
          <tbody id="tbl_content">
            <?php foreach ($PreRegisterPatients as $perPRpatients) { ?>
              <tr id="tr">
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0"><?= $perPRpatients->prid ?></h6>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal"><?= $perPRpatients->firstname ?> <?= $perPRpatients->middlename ?> <?= $perPRpatients->lastname ?></p>
                </td>
                <td class="border-bottom-0">
                  <span class=""><?= date('M j, Y, g:i a', strtotime($perPRpatients->prdatetime)) ?></span>
                </td>
                <td class="border-bottom-0">
                  <?php if ($perPRpatients->registration_type_id == 1) { ?>
                    <span class="badge rounded-2 fs-2 fw-bold bg-secondary-subtle text-muted"><i class="fas fa-circle fs-1 text-success"></i> Online </span>
                  <?php } elseif ($perPRpatients->registration_type_id == 2) { ?>
                    <span class="badge rounded-2 fs-2 fw-bold bg-secondary-subtle text-muted"><i class="fas fa-circle fs-1 text-danger"></i> Walk-in </span>
                  <?php } ?>
                </td>
                <td class="border-bottom-0">
                  <?php
                  $status = $perPRpatients->checkUpStatus;
                  $spanClass = '';
                  $iconClass = '';
                  switch ($status) {
                    case 0:
                      $spanClass = 'text-secondary';
                      $iconClass = '';
                      $Text = 'For CheckUp';
                      break;
                    default:
                    case 1:
                      $spanClass = 'text-warning';
                      $iconClass = '';
                      $Text = 'Done CheckUp';
                      break;
                  }
                  ?>
                  <span class="badge bg-light-subtle rounded-2 fs-2 fw-bold <?php print $spanClass; ?>"><i class="fas fa-stop fs-1"></i> <?php print $Text ?></span>
                </td>
                <td class="border-bottom-0">
                  <?php
                  $status = $perPRpatients->prstatus;
                  $spanClass = '';
                  $iconClass = '';
                  switch ($status) {
                    case 1:
                      $spanClass = 'bg-primary-subtle text-primary';
                      $iconClass = '';
                      $Text = 'Pending';
                      break;
                    case 2:
                      $spanClass = 'bg-success-subtle text-success';
                      $iconClass = '';
                      $Text = 'Positive';
                      break;
                    case 3:
                      $spanClass = 'bg-danger-subtle text-danger';
                      $iconClass = '';
                      $Text = 'Negative';
                      break;
                    default:
                    case 4:
                      $spanClass = 'bg-dark-subtle text-dark';
                      $iconClass = '';
                      $Text = 'Uncheck-Up';
                      break;
                  }
                  ?>
                  <span class="badge rounded-2 fs-2 fw-bold <?php print $spanClass; ?>"><i class="fas fa-stop fs-1"></i> <?php print $Text ?> </span>
                </td>
                <td>
                  <div class="dropdown dropstart">
                    <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                      <i class="ti ti-dots fs-5"></i>
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                      <li>
                        <a class="dropdown-item d-flex align-items-center gap-3 text-secondary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#dynamicmodal" onclick="view(<?= $perPRpatients->prid ?>)"><i class="fs-4 ti ti-eye"></i>View</a>
                      </li>
                      <li>
                        <!-- <a class="dropdown-item d-flex align-items-center gap-3 text-success" href="javascript:void(0)"><i class="fs-4 ti ti-edit"></i>Edit</a> -->
                      </li>
                      <?php if($perPRpatients->prstatus == 3) { ?>
                      <li>
                        <a class="dropdown-item d-flex align-items-center gap-3 text-danger" href="javascript:void(0)" onclick="confirmArchive(<?= $perPRpatients->prid ?>)"><i class="fs-4 ti ti-archive"></i>Archive</a>
                      </li>
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

<div class="modal fade" id="dynamicmodal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-home">
        <h1 class="modal-title fs-4 text-light" id="exampleModalLabel">View Index Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">

      </div>
      <div class="modal-footer" >
        <!-- <button type="submit" id="btnSend" class="btn btn-success">Send <i class="fas fa-paper-plane"></i></button> -->
      </div>
    </div>
  </div>
</div>

<script>
  function view(id) {
    var pre_id = id;

    $.ajax({
      url: '../encoder/viewindex',
      method: 'POST',
      data: {
        pre_id: pre_id
      },
      success: function(response) {
        $('#modal-body').html(response);
        $('#dynamicmodal').modal('show');
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
</script>

<script>
    function confirmArchive(prid) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to archive this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, archive it!'
        }).then((result) => {
            if (result.isConfirmed) {
                archive(prid);
            }
        });
    }

    function archive(prid) {
        $.ajax({
            url: '../encoder/archive',
            method: 'POST',
            data: { prid: prid },
            success: function(response) {
                // Handle success response
                Swal.fire({
                    title: 'Archived!',
                    text: 'The record has been archived.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            },
            error: function(xhr, status, error) {
                Swal.fire('Error!', 'Failed to archive the record.', 'error');
            }
        });
    }
</script>

<script>
  $(document).ready(function() {
    $('#prepatients').DataTable();
  });
</script>

<script>
  $(document).ready(function() {
    var residentData = <?php print json_encode($residents); ?>;

    var residentDetails = {};
    var counter = 1;

    residentData.forEach(function(resident) {
      var fullName = `${resident.firstname} ${resident.middlename} ${resident.lastname}`;
      residentDetails[fullName] = resident;

      $('#residentList').append(`<option value="${fullName}">${resident.id}  ${fullName}</option>`);
    });

    $("#addResident").on("click", function() {
      var searchValue = $("#search").val().trim();

      if (searchValue !== "" && residentDetails[searchValue]) {
        if (!$(`.residentEntry[data-resident-id="${residentDetails[searchValue].id}"]`).length) {
          var residentEntry = `
          <div class='row residentEntry' data-resident-name='${searchValue}' data-resident-id='${residentDetails[searchValue].id}'>
              <div class='col-md-2'><b>${counter}.</b> ${searchValue}</div>
              <div class='col-md-2'><b>Number:</b> ${residentDetails[searchValue].mobileno}</div>
              <div class='col-md-2'><b>Birthday:</b> ${residentDetails[searchValue].birthdate}</div>
              <div class='col-md-5'><b>Address:</b> ${residentDetails[searchValue].street}, ${residentDetails[searchValue].bname}, ${residentDetails[searchValue].city}</div>
              <div class='col-md-1'>
                  <button class="removeResident btn btn-danger mb-2">
                    <i class="fas fa-minus-circle"></i>
                  </button>
              </div>
          </div>`;

          $("#addedResidents").append(residentEntry);
          counter++;
        } else {
          //alert("This Patient is already added.");
          Swal.fire({
            icon: 'warning',
            title: 'Already Added',
            text: 'Please add another resident.',
            timer: 3000,
            showConfirmButton: false,
          });
        }
        $("#search").val("");
      } else {
        //alert("Please enter a valid resident name.");
        Swal.fire({
          icon: 'error',
          title: 'Unknown Resident Info',
          text: 'Please enter a valid & registered resident.',
          timer: 3000,
          showConfirmButton: false,
        });
      }
    });

    $("#addedResidents").on("click", ".removeResident", function() {
      $(this).closest('.residentEntry').remove();
    });

    $("form").on("submit", function(event) {
      event.preventDefault();

      var residentIds = [];
      var sendTo = $("#spe").val();

      // get all added resident ID
      $(".residentEntry").each(function() {
        var residentId = $(this).data('resident-id');
        residentIds.push(residentId);
      });

      $.ajax({
        url: '../encoder/preRegister',
        type: 'POST',
        data: {
          residentIds: residentIds,
          sendTo: sendTo
        },
        dataType: 'json',
        success: function(response) {
          Swal.fire({
            icon: response.success ? 'error' : 'success',
            title: response.message,
            showConfirmButton: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload();
            }
          });

          if (response.success) {
            $('#dynamicmodalCreate').modal('hide');
          }
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
</script>