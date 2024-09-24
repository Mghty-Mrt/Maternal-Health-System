<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title mb-4 fs-4">Dashboard / Bed Slot</h5>
                </div>
                <div class="col-md-2 d-flex justify-content-end">
                    <form action="../hospital/addslot" method="post">
                        <input type="number" name="slot" id="slot" class="form-control shadow-none" required>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                    <button type="submit" class="btn btn-secondary  mb-4" id=""> Add Slot </button>
                    </form>
                </div>

                <div class="row">
                    <?php foreach ($hslots as $slot) { ?>
                        <div class="col-md-2">
                            <?php if ($slot->slot_status == 1) { ?>
                                <div class="card text-white bg-success rounded shadow-none card-hover">
                                    <div class="card-body p-4">
                                        <span>
                                            <i class="ti ti-bed fs-8"></i>
                                        </span>
                                        <h3 class="card-title mt-1 mb-0 text-white"> Bed <?php echo $slot->slots ?></h3>
                                        <p class="card-text text-white-50 fs-3 fw-normal">
                                            available
                                        </p>
                                    </div>
                                </div>

                            <?php } elseif ($slot->slot_status == 2) {  ?>

                                <div class="card text-white bg-warning rounded shadow-none card-hover ">
                                    <div class="card-body p-4">
                                        <span>
                                            <i class="ti ti-bed fs-8"></i>
                                        </span>
                                        <h3 class="card-title mt-1 mb-0 text-white"> Bed <?php echo $slot->slots ?></h3>
                                        <p class="card-text text-white-50 fs-3 fw-normal">
                                            Occupied
                                        </p>
                                    </div>
                                </div>


                            <?php } elseif ($slot->slot_status == 0) {  ?>

                                <div class="card text-white bg-danger rounded shadow-none card-hover ">
                                    <div class="card-body p-4">
                                        <span>
                                            <i class="ti ti-bed fs-8"></i>
                                        </span>
                                        <h3 class="card-title mt-1 mb-0 text-white"> Bed <?php echo $slot->slots ?></h3>
                                        <p class="card-text text-white-50 fs-3 fw-normal">
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