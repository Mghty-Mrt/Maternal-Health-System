<style>
    .logo-img1 {
        position: absolute;
        float: left;
        margin-left: 50px;
        margin-top: 10px;
    }

    .logo-img2 {
        position: absolute;
        float: right;
        margin-right: 50px;
        margin-top: 10px;
    }

    .card-title {
        margin: 0;
        text-align: center;
        font-weight: normal;
    }

    p {
        font-weight: bold;
        color: rgb(17, 82, 114, 1);
    }
</style>

<div class="d-flex-center">
    <img src="assets/images/logos/quezoncity.png" width="50px" class="logo-img1" height="48px" alt="">
    <img src="assets/images/logos/healthdepartment.png" width="55px" class="logo-img2" alt="">
    <h4 class="card-title">Quezon City Health Department <br> Laboratory Request </h4>
</div>

<!-- <hr> -->

<div class="row" style="margin-top: 20px">
    <div class="col-md-6">
        <label for="cname"><b>Name:</b> <?php print $lab_rqst[0]->firstname ?> <?php print $lab_rqst[0]->middlename ?> <?php print $lab_rqst[0]->lastname ?></label>
    </div>
    <div class="col-md-6">
        <label for="impre"><b>Impression:</b> <?php print $lab_rqst[0]->impression ?></label>
    </div>
    <div class="col-md-12">
        <label for="reffby"><b>Referred By:</b> <?php print $lab_rqst[0]->reffered_by ?></label>
    </div>
</div>

<p>LABORATORY</p>
<ul style="list-style-type:square; font-weight: normal;">
    <?php $labRequestData = json_decode($lab_rqst[0]->lab_request, true); ?>
    <?php foreach ($labRequestData as $key => $value) { ?>
        <li><?= "$value" ?></li>
    <?php } ?>
</ul>

<!-- 
<p>X-RAY</p>
<ul style="list-style-type:square; font-weight: normal   ">
    <li>Jill</li>
    <li>Eve</li>
    <li>Adam</li>
</ul>

<p>ULTRASOUNDS</p>

<ul style="list-style-type:square; font-weight: normal   ">
    <li>Jill</li>
    <li>Eve</li>
    <li>Adam</li>
</ul> -->