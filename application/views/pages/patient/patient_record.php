<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="text-center">Patient's Medical Record</h5>
                <a href="../patient/record_list" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up"></i> Back</a>
            </div>
            <hr>
            <form action="#" method="POST">
            <div id="negativeSection" style="display: block;">
            <div class="row">
                <div class="col-md-6">
                    <label for="nstatus">Pregnancy Status</label>
                    <div class="input-group mb-3">
                        <select class="form-select mr-sm-2" name="nstatus" id="nstatus">
                            <option value="3">Negative</option>
                            <option value="2">Positive</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="findings">Findings</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="">Other Reasons/Findings <small class="text-danger fs-1">*Optional Only</small></label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" name="other" id="other" rows="4"></textarea>
                    </div>
                </div>
            </div>

            </div>
        </form> 
        <div class="positiveSection">
            <form action="#" method ="POST">
                <input type="hidden" name="id" id="id" value="" re  >
                <div class="row">
                    <div class="col-md-12">
                        <label for="pstatus">Pregnancy Status</label>
                        <div class="input-group mb-3">
                            <select class ="form-select mr-sm-2" name="pstatus" id="pstatus">
                                <option value="3">Postivie</option>
                                <option value="2"></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                    <label for="pstatus">Patient's Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="findings">Age</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" value="" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="pstatus">Occupation</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="" readonly>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="pstatus">Husband's Name</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="findings">Age</label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="pstatus">Occupation</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label for="pstatus">Contact Number</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="findings">Address</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="pstatus">Barangay</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="followUp">Follow-Up Checkup</label>
                    <div class="input-group mb-3">
                        <input type="date" name="followUp" id="followUp" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="time">Time</label>
                    <div class="input-group mb-3">
                        <input type="time" name="time" id="time" class="form-control" required>
                    </div>
                </div>
        </div>        
        </div>
    </div>
</div>