<form action="../admin/submitHC" method="POST" onsubmit="return validateForm()">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="lname">Last Name</label>
            <div class="input-group">
                <input type="text" name="lname" id="lname" class="form-control shadow-none">
            </div>
            <div id="invalidLname" class="invalid-feedback" style="display: none;"></div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="fname">First Name</label>
            <div class="input-group">
                <input type="text" name="fname" id="fname" class="form-control shadow-none">
            </div>
            <div id="invalidFname" class="invalid-feedback" style="display: none;"></div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="mname">Middle Name</label>
            <div class="input-group">
                <input type="text" name="mname" id="mname" class="form-control shadow-none">
            </div>
            <div id="invalidMname" class="invalid-feedback" style="display: none;"></div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="mnum">Mobile Number</label>
            <div class="input-group">
                <input type="number" name="mnum" id="mnum" class="form-control shadow-none" oninput="limitNumberLength()">
            </div>
            <div id="invalidNoname" class="invalid-feedback" style="display: none;"></div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="position">Position (Role)</label>
            <div class="input-group">
                <select class="form-select mr-sm-2" name="position" id="position">
                    <?php foreach ($Roles as $perpos) { ?>
                        <option value="<?= $perpos->id ?> "> <?= $perpos->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="invalidPosition" class="invalid-feedback" style="display: none;"></div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="facility">Health Center</label>
            <div class="input-group">
                <select class="form-select mr-sm-2" name="facility" id="facility">
                    <?php foreach ($facilities as $perf) { ?>
                        <option value="<?= $perf->id ?>"><?= $perf->name ?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="invalidHC" class="invalid-feedback" style="display: none;"></div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="email">Email Address <small class="text-danger fs-2">NOTE: Make sure that the email account is valid and active.</small></label>
            <div class="input-group">
                <input type="email" name="email" id="email" class="form-control shadow-none">
            </div>
            <div id="invalidEmail" class="invalid-feedback" style="display: none;"></div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary"> Add</button>
    </div>
</form>

<script>
    function validateForm() {
        var isValid = true;

        var lname = $('#lname').val();
        if (!lname) {
            $('#invalidLname').html('<i class="fas fa-exclamation-circle ms-2"></i> Last name is required.');
            $('#invalidLname').show();
            $('#lname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidLname').hide();
            $('#lname').removeClass('is-invalid');
        }

        var fname = $('#fname').val();
        if (!fname) {
            $('#invalidFname').html('<i class="fas fa-exclamation-circle ms-2"></i> First name is required.');
            $('#invalidFname').show();
            $('#fname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidFname').hide();
            $('#fname').removeClass('is-invalid');
        }

        var mname = $('#mname').val();
        if (!mname) {
            $('#invalidMname').html('<i class="fas fa-exclamation-circle ms-2"></i> Middle name is required.');
            $('#invalidMname').show();
            $('#mname').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidMname').hide();
            $('#mname').removeClass('is-invalid');
        }

        var mnum = $('#mnum').val();
        if (!mnum || mnum.length !== 11) {
            $('#invalidNoname').html('<i class="fas fa-exclamation-circle ms-2"></i> Mobile No. is required and must be 11 digits.');
            $('#invalidNoname').show();
            $('#mnum').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidNoname').hide();
            $('#mnum').removeClass('is-invalid');
        }

        var position = $('#position').val();
        if (!position) {
            $('#invalidPosition').html('<i class="fas fa-exclamation-circle ms-2"></i> Position is required.');
            $('#invalidPosition').show();
            $('#position').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidPosition').hide();
            $('#position').removeClass('is-invalid');
        }

        var facility = $('#facility').val();
        if (!facility) {
            $('#invalidHC').html('<i class="fas fa-exclamation-circle ms-2"></i> Health Center is required.');
            $('#invalidHC').show();
            $('#facility').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidHC').hide();
            $('#facility').removeClass('is-invalid');
        }

        // Email
        var email = $('#email').val();
        if (!email || !validateEmail(email)) {
            $('#invalidEmail').html('<i class="fas fa-exclamation-circle ms-2"></i> Email is required and must be valid.');
            $('#invalidEmail').show();
            $('#email').addClass('is-invalid');
            isValid = false;
        } else {
            $('#invalidEmail').hide();
            $('#email').removeClass('is-invalid');
        }

        return isValid;
    }

    // Email validation function
    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function limitNumberLength() {
        var input = document.getElementById('mnum');
        var maxLength = 11; // Set your desired maximum length

        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }
</script>