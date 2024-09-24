<form action="../admin/updateHospital" method="POST">
    <?php foreach ($ViewHospital as $vhospital) { ?>
    <div class="row">
        <input type="hidden" name="hospital_id" id="hospital_id" value="<?= $vhospital->id ?>">
        <div class="col-md-12">
            <label for="hname">Barangay Name</label>
            <div class="input-group mb-3">
                <input type="text" name="hname" id="hname" value="<?= $vhospital->name ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <label for="hdesc">Description</label>
            <div class="input-group mb-3">
                <textarea rows="5" name="hdesc" id="hdesc" class="form-control"><?= $vhospital->description ?></textarea>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>