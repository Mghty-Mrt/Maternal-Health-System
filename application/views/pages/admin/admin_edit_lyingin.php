<form action="../admin/updateHealthCenter" method="POST">
    <?php foreach ($ViewLY as $vly) { ?>
    <div class="row">
        <input type="hidden" name="hc_id" id="hc_id" value="<?= $vly->id ?>">
        <div class="col-md-12">
            <label for="hcname">Health Center name</label>
            <div class="input-group mb-3">
                <input type="text" name="hcname" id="hcname" value="<?= $vly->name ?>" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <label for="hcdesc">Description</label>
            <div class="input-group mb-3">
                <textarea rows="5" name="hcdesc" id="hcdesc" class="form-control"><?= $vly->description ?></textarea>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>