<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <!-- Index Encoder -->
            <div class="d-flex justify-content-center">
                    <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                    <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Index Form</small> <br> <small class="fs-3">( <span class="fs-3" id="currentYear"></span> - Present )</small> </h5>
                    <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                </div>
            <hr class="border-5 mb-4">

            <form id="indexForm">
            <div class="row">
                <input type="hidden" name="rid" id="rid">
                <div class="col-md-8">
                    <label for="cname" class="">Name</label>
                    <input list="residentsList" type="text" class="form-control shadow-none" id="cname" placeholder="Type name here..." autocomplete="off">
                    <datalist id="residentsList">
                        <!-- Resident options will be populated here -->
                    </datalist>
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
                <div class="input-group">
                    <input type="text" class="form-control shadow-none" id="address" placeholder="Address">
                </div>
                <div id="invalidAddress" class="invalid-feedback" style="display: none;"></div>
            </div>

            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="dateOfBirth" class="">Birthday</label>
                    <div class="input-group">
                    <input type="date" class="form-control shadow-none" id="dateOfBirth">
                    </div>     
                <div id="invalidBirthdate" class="invalid-feedback" style="display: none;"></div>
                </div>
                <div class="col-md-3">
                    <label for="age" class="">Age</label>
                    <input type="number" class="form-control shadow-none" id="age" placeholder="Age">
                </div>
                <div class="col-md-3">
                    <label for="contactNo" class="">Contact No.</label>
                    <input type="number" class="form-control shadow-none" id="contactNo" placeholder="Contact No.">
                </div>
                <div class="col-md-3">
                    <label for="cstatus" class="">Civil Status</label>
                    <input type="text" class="form-control shadow-none" id="cstatus" placeholder="Civil Status">
                </div>

                <div class="col-md-3 mt-3">
                    <label for="wt" class="">Weight</label>
                    <div class="input-group">
                        <input type="number" class="form-control shadow-none" name="wt" id="wt" placeholder="kg." >
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="ht" class="">Height</label>
                    <div class="input-group">
                        <input type="number" class="form-control shadow-none" name="ht" id="ht" placeholder="cm." >
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="temp" class="">Temperature</label>
                    <div class="input-group">
                        <input type="text" class="form-control shadow-none" name="temp" id="temp" >
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <label for="bp" class="">Blood Pressure</label>
                    <div class="input-group">
                        <input type="text" class="form-control shadow-none" name="bp" id="bp" >
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
        var residentData = <?php print json_encode($residents); ?>;
        var residentDetails = {};

        residentData.forEach(function(resident) {
            var fullName = `${resident.firstname} ${resident.middlename} ${resident.lastname}`;
            residentDetails[fullName] = resident;

            $('#residentsList').append(`<option value="${fullName}">${resident.id} ${fullName}</option>`);
        });

        // Add an input event listener to the 'cname' input field
        $('#cname').on('input', function() {
            var selectedName = $(this).val();

            if (residentDetails[selectedName]) {
                // Update other input fields with data from the selected resident
                $('#rid').val(residentDetails[selectedName].id);
                $('#address').val(`${residentDetails[selectedName].street}, ${residentDetails[selectedName].bname}, ${residentDetails[selectedName].city}`);
                $('#dateOfBirth').val(residentDetails[selectedName].birthdate);
                $('#age').val(residentDetails[selectedName].age);
                $('#contactNo').val(residentDetails[selectedName].mobileno);
                $('#cstatus').val(residentDetails[selectedName].civilStatus);
            } else {
                // Clear other input fields if the selected name is not found
                $('#rid').val('');
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
      var residentId = $("#rid").val();
      var weight = $("#wt").val();
      var height = $("#ht").val();
      var temp = $("#temp").val();
      var bp = $("#bp").val();

      //validations part--------------------------------------------------------
      var isValid = true;

      var address = $('#address').val();
        if (!address) {
            $('#invalidAddress').html('<i class="fas fa-exclamation-circle ms-2"></i> Required Address.');
            $('#invalidAddress').show();
            $('#address').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidAddress').hide();
            $('#address').removeClass('is-invalid');
        }

      if (!isValid) {
            return false; // Exit the function if form validation fails
       }
       //end of validqations----------------------------------------------------

      $.ajax({
        url: '../encoder/submitIndex',
        type: 'POST',
        data: {
            residentId: residentId,
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
                //   window.location.href = '../encoder/today';
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