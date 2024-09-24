<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <?php foreach ($PatientInfo as $perinfo) { ?>
                <div class="d-flex justify-content-center">
                    <img src="../assets/images/logos/quezoncity.png" class="me-1 mb-2 mt-2" width="90px" height="78px" alt="">
                    <h5 class="card-title text-center fs-4 text-main fs-5 mt-3">Quezon City Health Department <br> <small>Prenatal Record</small> <br> (Follow-Up Checkup) </h5>
                    <img src="../assets/images/logos/healthdepartment.png" class="ms-2 mb-2" width="95px" alt="">
                </div>

                <hr class="border-5 shadow-none mb-4">

                <div id="positiveSection">
                    <form action="../midwife/submitFollowUpCheckUp" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $perinfo->prid ?>">
                        <input type="hidden" name="pid" id="pid" value="<?= $perinfo->pid ?>">
                        <input type="hidden" name="acid" id="acid" value="<?= $perinfo->access_code_id ?>">
                        <div class="row">

                            <div class="col-md-4">
                                <label for="pstatus">Patient's Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->firstname ?> <?= $perinfo->middlename ?> <?= $perinfo->lastname ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="findings">Age</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" value="<?= $perinfo->age ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Occupation</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->occupation ?>" readonly>
                                </div>
                            </div>

                            <?php $husbandData = json_decode($husband[0]->husband_data, true); ?>
                            <div class="col-md-4">
                                <label for="pstatus">Husband's Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $husbandData['hname'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="findings">Age</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control shadow-none" value="<?= $husbandData['hage'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Occupation</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $husbandData['hoccu'] ?? '' ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="pstatus">Contact Number</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->mobileno ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="findings">Address</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->street ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="pstatus">Barangay</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control shadow-none" value="<?= $perinfo->bname ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Notes</label>
                                <textarea name="cnotes" id="cnotes" cols="30" rows="10" class="form-control shadow-none"></textarea>
                            </div>

                            <div class="col-md-4">
                                <label for="visit">Visit <small class="text-secondary fw-bold">NOTE: Last vist (<?= $perinfo->visits ?>)</small></label>
                                <div class="input-group mb-3">
                                    <input list="visits" type="text" name="visit" id="visit" class="form-control shadow-none" autocomplete="off" required>
                                </div>
                                <datalist id="visits">
                                        <option value="3rd Visit">3rd Visit</option>
                                        <option value="4th Visit">4th Visit</option>
                                        <option value="5th Visit">5th Visit</option>
                                        <option value="6th Visit">6th Visit</option>
                                        <option value="7th Visit">7th Visit</option>
                                        <option value="8th Visit">8th Visit</option>
                                        <option value="9th Visit">9th Visit</option>
                                        <option value="10th Visit">10th Visit</option>
                                        <option value="11th Visit">11th Visit</option>
                                        <option value="12th Visit">12th Visit</option>
                                        <option value="13th Visit">13th Visit</option>
                                        <option value="14th Visit">14th Visit</option>
                                        <option value="15th Visit">15th Visit</option>
                                    </datalist>
                            </div>

                            <div class="col-md-4">
                                <label for="followUp">Follow-Up Checkup</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="followUp" id="followUp" class="form-control shadow-none" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="time">Time</label>
                                <div class="input-group mb-3">
                                    <input type="time" name="time" id="time" class="form-control shadow-none" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mt-2">Submit <i class="ti ti-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>