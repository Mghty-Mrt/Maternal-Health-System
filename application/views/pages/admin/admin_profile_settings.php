<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Profile Settings</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="../admin/dashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Profile Settings</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <?php foreach($user_info as $info) { ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <?php if($info->image == "") { ?>
                    <img src="../assets/images/profile/default.jpg" class="img rounded-5" alt="profile" height="150px">
                    <?php } else { ?>
                    <img src="/mhs_micro/profile/<?= $info->image ?>?t=<?= time() ?>" class="img rounded-5" alt="profile" height="150px">
                    <?php } ?>
                </div>
                <div class="col-md-10 mt-2">
                    <h5 class=""><?php print $info->lastname ?>, <?php print $info->firstname ?> <?php print $info->middlename ?></h5>
                    <p>IT - Head <br> (<?php print $info->rname ?>)</p>
                    <p>Naniniwala ako sa kasabisang Thank You and I. Naniniwala ako sa kasabisang Thank You and I.
                        Naniniwala ako sa kasabisang Thank You and I. Naniniwala ako sa kasabisang Thank You and I.
                    </p>
                </div>
            </div>
            <hr>
            <p class="fw-semibold">Personal Information</p>
            <div class="row">
                <div class="col-md-4">
                    <p>Lastname <br> <?php print $info->lastname ?></p>
                </div>
                <div class="col-md-4">
                    <p>Firstname <br> <?php print $info->firstname ?></p>
                </div>
                <div class="col-md-4">
                    <p>Middlename <br> <?php print $info->middlename ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Email <br> <?php print $info->email ?></p>
                </div>
                <div class="col-md-4">
                    <p>ContactNo <br> <?php print $info->mobileno ?></p>
                </div>
                <div class="col-md-4">
                    <p>Address <br> Quezon City, Philippines</p>
                </div>
            </div>
            <hr>
            <p class="fw-semibold">Employee Information</p>
            <div class="row">
                <div class="col-md-4">
                    <p>Employee ID <br> EID0<?php print $info->id ?></p>
                </div>
                <div class="col-md-4">
                    <p>Department <br> IT Health Department</p>
                </div>
                <div class="col-md-4">
                    <p>Position <br> IT-Head (<?php print $info->rname ?>)</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Company Email <br> <?php print $info->email ?></p>
                </div>
                <div class="col-md-4">
                    <p>OfficeNo <br> 09326475823</p>
                </div>
                <div class="col-md-4">
                    <p>Address <br> Quezon City Hall, Philippines</p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>