 <?php foreach($ResidentData as $resi) { ?>
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Last Name</h5>
                <p><?=$resi->lastname?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">First Name</h5>
                <p><?=$resi->firstname?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Middle Name</h5>
                <p><?=$resi->middlename?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Birthdate</h5>
                <p><?=$resi->birthdate?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Age</h5>
                <p><?=$resi->age?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Contact Number</h5>
                <p><?=$resi->mobileno?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Email Address</h5>
                <p><?=$resi->email?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Civil Status</h5>
                <p><?=$resi->civilStatus?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Occupation</h5>
                <p><?=$resi->occupation?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Street</h5>
                <p><?=$resi->street?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">Barangay</h5>
                <p><?=$resi->bname?></p>
            </div>
            <div class="col-md-4">
                <h5 class="fs-4 text-main">City</h5>
                <p><?=$resi->city?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12 text-center border-start border-2">
                <img src="../assets/images/profile/default.jpg" class="img rounded-circle" height="150" alt="">
                <h5 class="mt-2 text-main"><?=$resi->firstname?> <?=$resi->middlename?> <?=$resi->lastname?></h5>
                <p>Phone: <?=$resi->mobileno?> <br><span>Email: <?=$resi->email?></span></p>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- 
<div class="modal-footer ">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary"> Print</button>
    </div> -->