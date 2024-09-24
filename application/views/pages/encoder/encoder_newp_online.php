<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <!-- Index Encoder -->
            <div class="d-flex justify-content-center">
                    <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                    <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Index Form (Online Patinet)</small> <br> <small class="fs-3">( <span class="fs-3" id="currentYear"></span> - Present )</small> </h5>
                    <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                </div>
            <hr class="border-5 mb-4">

            <form id="indexForm">
            <div class="row">
                <!-- <input type="hidden" name="rid" id="rid"> -->
                <input type="hidden" name="oregid" id="oregid">
                <div class="col-md-2">
                    <label for="code" class="">Code</label>
                    <input list="residentsList" type="number" class="form-control shadow-none" id="code" placeholder="Enter code" autocomplete="off">
                    <datalist id="residentsList">
                        <!-- Resident options will be populated here -->
                    </datalist>
                </div>

                <div class="col-md-6">
                    <label for="cname" class="">Name</label>
                    <input type="text" class="form-control shadow-none" id="cname" placeholder="Complete Name">
                </div>

                <div class="col-md-4">
                    <label for="spe" class="">Send To</label>
                    <select class="form-select shadow-none" name="spe" id="spe">
                        <?php foreach ($speData as $perSpe) { ?>
                            <option value="<?= $perSpe->id ?>"><?= $perSpe->rcode ?>. <?= $perSpe->firstname ?> <?= $perSpe->middlename ?> <?= $perSpe->lastname ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <label for="address" class="">Address</label>
                <input type="text" class="form-control shadow-none" id="address" placeholder="Address">
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="dateOfBirth" class="">Birthday</label>
                    <input type="date" class="form-control shadow-none" id="dateOfBirth">
                </div>
                <div class="col-md-3">
                    <label for="age" class="">Age</label>
                    <input type="number" class="form-control shadow-none" id="age" placeholder="Age">
                </div>
                <div class="col-md-3">
                    <label for="contactNo" class="">Contact Number</label>
                    <input type="number" class="form-control shadow-none" id="contactNo" placeholder="Contact No.">
                </div>
                <div class="col-md-3">
                    <label for="cstatus" class="">Civil Status</label>
                    <input type="text" class="form-control shadow-none" id="cstatus" placeholder="Civil Status">
                </div>

                <div class="col-md-3 mt-3">
                    <label for="wt" class="">Weight</label>
                    <div class="input-group">
                        <input type="number" class="form-control shadow-none" name="wt" id="wt" placeholder="kg." required>
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="ht" class="">Height</label>
                    <div class="input-group">
                        <input type="number" class="form-control shadow-none" name="ht" id="ht" placeholder="cm." required>
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="temp" class="">Temperature</label>
                    <div class="input-group">
                        <input type="text" class="form-control shadow-none" name="temp" id="temp" required>
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="bp" class="">Blood Pressure</label>
                    <div class="input-group">
                        <input type="text" class="form-control shadow-none" name="bp" id="bp" required>
                    </div>
                </div>

                <hr class="border-5 mb-3 mt-4">

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Send <i class="fas fa-send"></i></button>
                </div>

            </div>
            </form>

        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        var residentData = <?php print json_encode($appointment); ?>;
        var residentDetails = {};

        residentData.forEach(function(resident) {
            var code = `${resident.confirmation_code}`;
            residentDetails[code] = resident;

            $('#residentsList').append(`<option value="${code}">${resident.confirmation_code}</option>`);
        });

        // Add an input event listener to the 'cname' input field
        $('#code').on('input', function() {
            var selectedName = $(this).val();

            if (residentDetails[selectedName]) {
                // Update other input fields with data from the selected resident
                // $('#rid').val(residentDetails[selectedName].rid);
                $('#oregid').val(residentDetails[selectedName].oregid);
                $('#cname').val(`${residentDetails[selectedName].firstname} ${residentDetails[selectedName].middlename} ${residentDetails[selectedName].lastname}`);
                $('#address').val(`${residentDetails[selectedName].street}, ${residentDetails[selectedName].bname}, Quezon City`);
                $('#dateOfBirth').val(residentDetails[selectedName].birthdate);
                $('#age').val(residentDetails[selectedName].age);
                $('#contactNo').val(residentDetails[selectedName].mobileno);
                $('#cstatus').val(residentDetails[selectedName].civilStatus);
            } else {
                // Clear other input fields if the selected name is not found
                // $('#rid').val('');
                $('#oregid').val('');
                $('#cname').val('');
                $('#address').val('');
                $('#dateOfBirth').val('');
                $('#age').val('');
                $('#contactNo').val('');
                $('#cstatus').val('');
            }
        });
    });

    $("form").on("submit", function(event) {
      event.preventDefault();

      var sendTo = $("#spe").val();
      var oregid = $("#oregid").val();
      var weight = $("#wt").val();
      var height = $("#ht").val();
      var temp = $("#temp").val();
      var bp = $("#bp").val();

      $.ajax({
        url: '../encoder/submitonlineIndex',
        type: 'POST',
        data: {
            oregid: oregid,
            sendTo: sendTo,
            weight: weight,
            height: height,
            temp:temp,
            bp: bp
        },
        dataType: 'json',
        success: function(response) {
          Swal.fire({
            icon: response.success ? 'error' : 'success',
            text: response.message,
            showConfirmButton: 'OK'
            }).then((result) => {
              if (result.isConfirmed) {
                //   location.reload();
              }
          });

    //   if (response.success) {
    //     $('#dynamicmodalCreate').modal('hide');
    //   }
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });
});
</script>

<script>
  var currentYear = new Date().getFullYear();
  document.getElementById('currentYear').innerText = currentYear;
</script>