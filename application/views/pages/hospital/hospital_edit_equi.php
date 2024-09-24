<div class="row">
<input type="hidden" name="eq_id" id="eq_id" value="<?= $equipments[0]->id ?>">
    <div class="col-md-12">
        <label for="name">Name</label>
        <div class="input-group mb-3">
            <input type="text" id="name" name="name" class="form-control shadow-none" value="<?= $equipments[0]->name ?>">
        </div>
    </div>
    <div class="col-md-12">
        <label for="desc">Description</label>
        <div class="input-group mb-3">
            <textarea name="desc" id="desc" cols="30" rows="4" class="form-control shadow-none"><?= $equipments[0]->descriptions ?></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <label for="eqtyp">Equipment Type</label>
        <div class="input-group mb-3">
            <select name="eqtyp" id="eqtyp" class="form-select">
                <?php foreach ($EquipmentType as $et) { ?>
                    <option value="<?= $et->id ?>" <?= ($et->id == $equipments[0]->equipment_type_id) ? 'selected' : '' ?>>
                        <?= $et->name ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <label for="tqty">Total Quantity</label>
        <div class="input-group mb-3">
            <input type="number" name="tqty" id="tqty" class="form-control shadow-none" value="<?= $equipments[0]->total_qty ?>">
        </div>
    </div>
</div>

<div class="modal-footer mb-0">
    <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
    <button type="button" onclick="update()" class="btn btn-success">Save</button> -->
</div>

<script>
    function update() {
        var eq_id = $('#eq_id').val();
        var name = $('#name').val();
        var desc = $('#desc').val();
        var eqtyp = $('#eqtyp').val();
        var tqty = $('#tqty').val();

        $.ajax({
            url: '../hospital/updateequi',
            method: 'POST',
            data: {
                eq_id: eq_id,
                name: name,
                desc: desc,
                eqtyp: eqtyp,
                tqty: tqty
            },
            success: function(response) {
                // $('#dynamicmodaledit').modal('hide');
                // Optionally, you can perform any action after successful update.
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
                // Optionally, handle errors here.
            }
        });
    }
</script>
