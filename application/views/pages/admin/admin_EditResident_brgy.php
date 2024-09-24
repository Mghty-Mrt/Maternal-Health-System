<form action="../admin/updateResident" method="POST" id="CreateForm">
    <?php foreach($ResidentData as $perresi) { ?>
        <input type="hidden" id="resident_id" name="resident_id" value="<?= $perresi->rsdid ?>">
        <input type="hidden" id="address_id" name="address_id" value="<?= $perresi->ardid ?>">
        <input type="hidden" id="facility_id" name="facility_id" value="<?= $perresi->fid ?>">
    <div class="row">
        <div class="col-md-4">
            <label for="lname">Last Name</label>
            <div class="input-group mb-3">
                <input type="text" name="lname" id="lname" value="<?= $perresi->lastname ?>" class="form-control shadow-none">
            </div>
        </div>
        <div class="col-md-4">
            <label for="fname">First Name</label>
            <div class="input-group mb-3">
                <input type="text" name="fname" id="fname" value="<?= $perresi->firstname ?>" class="form-control shadow-none">
            </div>
        </div>
        <div class="col-md-4">
            <label for="mname">Middle Name</label>
            <div class="input-group mb-3">
                <input type="text" name="mname" id="mname" value="<?= $perresi->middlename ?>" class="form-control shadow-none">
            </div>
        </div>

        <div class="col-md-4">
            <label for="bdate">Birth Date</label>
            <div class="input-group mb-3">
                <input type="date" name="bdate" id="bdate" value="<?= $perresi->birthdate ?>" class="form-control shadow-none">
            </div>
        </div>

        <div class="col-md-4">
            <label for="age">Age</label>
            <div class="input-group mb-3">
                <input type="number" name="age" id="age" value="<?= $perresi->age ?>" class="form-control shadow-none">
            </div>
        </div>

        <div class="col-md-4">
            <label for="cstatus">Civil Status</label>
            <div class="input-group mb-3">
                <select class="form-select mr-sm-2" name="cstatus" id="cstatus">
                    <option value="Single" <?= ($perresi->civilStatus === 'Single') ? 'selected' : '' ?>>Single</option>
                    <option value="Married" <?= ($perresi->civilStatus === 'Married') ? 'selected' : '' ?>>Married</option>
                    <option value="Divorced" <?= ($perresi->civilStatus === 'Divorced') ? 'selected' : '' ?>>Divorced</option>
                    <option value="Separated" <?= ($perresi->civilStatus === 'Separated') ? 'selected' : '' ?>>Separated</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label for="occu">Occupation</label>
            <div class="input-group mb-3">
                <input type="text" name="occu" id="occu" value="<?= $perresi->occupation ?>" class="form-control shadow-none">
            </div>
        </div>

        <div class="col-md-4">
            <label for="mnum">Mobile Number</label>
            <div class="input-group mb-3">
                <input type="number" name="mnum" id="mnum" value="<?= $perresi->mobileno ?>" class="form-control shadow-none">
            </div>
        </div>

        <div class="col-md-4">
            <label for="email">Email Address</label>
            <small class="text-danger fs-1">*if none put N/A</small>
            <div class="input-group mb-3">
                <input type="email" name="email" id="email" value="<?= $perresi->email ?>" class="form-control shadow-none">
            </div>
        </div>

        <div class="col-md-4">
            <label for="street">Street</label>
            <div class="input-group mb-3">
                <input type="text" name="street" id="street" value="<?= $perresi->street ?>" class="form-control shadow-none">
            </div>
        </div>

        <div class="col-md-4">
            <label for="brgy">Barangay</label>
            <div class="input-group mb-3">
                <select class="form-select mr-sm-2" name="brgy" id="brgy">
                    <?php foreach ($barangay as $perbrgy) { ?>
                        <option value="<?= $perbrgy->id ?>" <?= ($perbrgy->id == $perresi->fid) ? 'selected' : '' ?>><?= $perbrgy->name ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <label for="city">City</label>
            <div class="input-group mb-3">
                <select class="form-select mr-sm-2" name="city" id="city">
                    <option value="Quezon City" <?= ($perresi->city === 'Separated') ? 'selected' : '' ?>>Quezon City</option>
                </select>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-success"> Update</button>
    </div> -->
</form>