<?php foreach ($user_info as $info) { ?>
    <?php $current_pass = $info->password; ?>
<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
    $(document).ready(function() {
        $('#verify-btn').click(function() {
            var currentPass = "<?php print $current_pass; ?>";
            var enteredPass = $('#vpass').val();
            var hashEnteredPass = CryptoJS.MD5(enteredPass).toString();

            // alert(hashEnteredPass);

            if (!enteredPass) {
                $('#invalidPassword').html('<i class="fas fa-exclamation-circle ms-2"></i> Password required.');
                $('#invalidPassword').show();
                $('#vpass').addClass('is-invalid');
                return;
            } else {
                $('#invalidPassword').hide();
                $('#vpass').removeClass('is-invalid');
            }

            if (currentPass === hashEnteredPass) {
                $('#verify_area').hide();
                $('#update_form').show();
            } else {
                // alert('Incorrect password! Please try again.');
                $('#invalidPassword').html('<i class="fas fa-exclamation-circle ms-2"></i> Incorrect password. Please try again.');
                $('#invalidPassword').show();
                $('#vpass').addClass('is-invalid');
            }
        });
    });
</script>

<div class="row" id="verify_area">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <center><label for="vpass" class="fw-bold fs-4 mb-3">Verify Password</label></center>
                <input type="password" name="vpass" id="vpass" class="form-control shadow-none" placeholder="Enter you password..">
                <div id="invalidPassword" class="invalid-feedback" style="display: none;"></div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button type="button" class="btn btn-success" id="verify-btn">Verify <i class="ti ti-refresh"></i></button>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>

<form action="../admin/updateHC" method="POST" style="display: none;" id="update_form">
    <?php foreach ($hcUserData as $perHUuser) { ?>
        <div class="row">
            <input type="hidden" id="hc_user_id" name="hc_user_id" value="<?= $perHUuser->suid ?>">
            <input type="hidden" id="hc_acc_id" name="hc_acc_id" value="<?= $perHUuser->accid ?>">
            <div class="col-md-6">
                <label for="lname">Last name</label>
                <div class="input-group mb-3">
                    <input type="text" name="lname" id="lname" value="<?= $perHUuser->lastname ?>" class="form-control shadow-none">
                </div>
            </div>
            <div class="col-md-6">
                <label for="fname">First Name</label>
                <div class="input-group mb-3">
                    <input type="text" name="fname" id="fname" value="<?= $perHUuser->firstname ?>" class="form-control shadow-none">
                </div>
            </div>
            <div class="col-md-6">
                <label for="mname">Middle Name</label>
                <div class="input-group mb-3">
                    <input type="text" name="mname" id="mname" value="<?= $perHUuser->middlename ?>" class="form-control shadow-none">
                </div>
            </div>
            <div class="col-md-6">
                <label for="mnum">Mobile Number</label>
                <div class="input-group mb-3">
                    <input type="number" name="mnum" id="mnum" value="<?= $perHUuser->mobileno ?>" class="form-control shadow-none">
                </div>
            </div>
            <div class="col-md-6">
                <label for="position">Position (Role)</label>
                <div class="input-group mb-3">
                    <select class="form-select mr-sm-2" name="position" id="position">
                        <?php foreach ($Roles as $perpos) { ?>
                            <option value="<?= $perpos->id ?>" <?= ($perpos->id == $perHUuser->rid) ? 'selected' : '' ?>> <?= $perpos->name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="facility">Health Center</label>
                <div class="input-group mb-3">
                    <select class="form-select mr-sm-2" name="facility" id="facility">
                        <?php foreach ($facilities as $perf) { ?>
                            <option value="<?= $perf->id ?>" <?= ($perf->id == $perHUuser->fid) ? 'selected' : '' ?>> <?= $perf->name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="email">Email Address</label>
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" value="<?= $perHUuser->email ?>" class="form-control shadow-none">
                </div>
            </div>
            <div class="col-md-6">
                <label for="password">Password</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" value="<?= $perHUuser->password ?>" class="form-control shadow-none">
                </div>
            </div>
        </div>

    <?php } ?>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-success"> Update</button>
    </div>
</form>