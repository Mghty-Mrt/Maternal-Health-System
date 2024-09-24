<form action="../admin/updateBarangay" method="POST">
    <?php foreach ($ViewBarangay as $vbrgy) { ?>
    <div class="row">
        <input type="hidden" name="brgy_id" id="brgy_id" value="<?= $vbrgy->id ?>">
        <div class="col-md-12">
            <label for="bname">Barangay Name</label>
            <div class="input-group mb-3">
                <input type="text" name="bname" id="bname" value="<?= $vbrgy->name ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <label for="bdesc">Description</label>
            <div class="input-group mb-3">
                <textarea rows="5" name="bdesc" id="bdesc" class="form-control"><?= $vbrgy->description ?></textarea>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>