<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title mb-4 fs-4">Dashboard / Bed Slot</h5>
                </div>
                <div class="col-md-2 d-flex justify-content-end">
                    <form action="../hospital/addSlot" method="post" id="slotForm">
                        <input type="number" name="slot" id="slot" class="form-control shadow-none" placeholder="0" required>
                </div>

                <div class="col-md-2 d-flex justify-content-center">
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-secondary mb-4" id="addSlotBtn">Add Slot</button>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-12">
                <div class="card card-hover border" style="height: 85px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-5">
                            <?php $counted = count($total_avai) ?>
                            <p><span class="badge bg-success me-2"> </span>Available : [<?= $counted ?>]</p>
                            <?php $counted_occu = count($total_occu) ?>
                            <p><span class="badge bg-warning me-2"> </span>Occupied : [<?= $counted_occu ?>]</p>
                            <?php $counted_not_avai = count($total_not_avai) ?>
                            <p><span class="badge bg-danger me-2"> </span>Not available : [<?= $counted_not_avai ?>]</p>
                        </div>
                    </div>
                </div>
                </div>
                </div>

                <div class="row">
                
                    <?php foreach ($slots as $slot) { ?>
                        <div class="col-md-2">
                            <?php if ($slot->slot_status == 1) { ?>
                                <div class="card text-success rounded card-hover shadow">
                                    <div class="card-header bg-success">
                                        <!-- <small class="text-light">00:00:00</small> -->
                                    </div>
                                    <div class="card-body p-4">
                                        <span>
                                            <i class="ti ti-bed fs-8"></i>
                                        </span>
                                        <h3 class="card-title mt-1 mb-0 text-success"> Bed <?php echo $slot->slots ?></h3>
                                        <p class="card-text text-muted fs-3 fw-normal">
                                            available
                                        </p>
                                    </div>
                                </div>

                            <?php } elseif ($slot->slot_status == 2) {  ?>

                                <div class="card shadow rounded card-hover ">
                                    <div class="card-header bg-warning">
                                    <!-- <small class="text-light">April 02, 2024</small> -->
                                    </div>
                                    <div class="card-body p-4">
                                        <span>
                                            <i class="ti ti-bed fs-8 text-warning"></i>
                                        </span>
                                        <h3 class="card-title mt-1 mb-0 text-warning"> Bed <?php echo $slot->slots ?></h3>
                                        <p class="card-text text-muted-50 fs-3 fw-normal">
                                            Occupied
                                        </p>
                                    </div>
                                </div>


                            <?php } elseif ($slot->slot_status == 0) {  ?>

                                <div class="card rounded card-hover ">
                                <div class="card-header bg-danger">
                                    </div>
                                    <div class="card-body p-4">
                                        <span>
                                            <i class="ti ti-bed fs-8 text-danger"></i>
                                        </span>
                                        <h3 class="card-title mt-1 mb-0 text-danger"> Bed <?php echo $slot->slots ?></h3>
                                        <p class="card-text text-muted-50 fs-3 fw-normal">
                                            Not available
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    <?php } ?>



                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to add this slot?
                </div>
                <div class="modal-footer">
                    <!-- Button to submit form -->
                    <button type="submit" class="btn btn-success" id="confirmAddSlotBtn">Confirm</button>
                    <button type="button" class="btn btn-danger btncancel" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to check if the slot input is empty
        function isSlotInputEmpty() {
            var slotValue = $('#slot').val().trim();
            return slotValue === '';
        }

        // Show modal when Add Slot button is clicked
        $('#addSlotBtn').click(function() {
            if (!isSlotInputEmpty()) {
                $('#confirmationModal').modal('show');
            } else {
                // If input is empty, you can show an alert or handle it as you prefer
                alert('Please enter a slot number.');
            }
        });

        // Submit form when Confirm button in modal is clicked
        $('#confirmAddSlotBtn').click(function() {
            $('#slotForm').submit();
        });

        
        // $('#btncancel').modal('hide');
        
    });
</script>
