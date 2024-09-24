<div class="card border">
    <div class="card-body">
        <?php foreach($LyUsProfile as $prof) { ?>
        <div class="d-flex justify-content-center">
            <?php if($prof->image == "") { ?>
                <img src="../assets/images/profile/default.jpg"  width="150" height="150" class="rounded-3" alt="">
            <?php } else { ?>
                <img src="/mhs_micro/profile/<?= $prof->image ?>"  width="150" height="150" class="rounded-3" alt="">
            <?php } ?>
        </div>

        <h4 class="fw-semibold mb-2 mt-2 text-center"> <?= $prof->lastname ?>, <?= $prof->firstname ?> <?= $prof->middlename ?> </h4>

        <ul class="list-unstyled mb-0">
            <li class="d-flex align-items-center gap-6 flex-wrap mb-4 mt-2">
                <i class="ti ti-briefcase text-dark fs-6"></i>
                <h6 class="fs-4 fw-semibold mb-0"><?= $prof->rname ?></h6>
            </li>
            <li class="d-flex align-items-center gap-6 flex-wrap mb-4">
                <i class="ti ti-mail text-dark fs-6"></i>
                <h6 class="fs-4 fw-semibold mb-0"><?= $prof->email ?></h6>
            </li>
            <li class="d-flex align-items-center gap-6 flex-wrap mb-4">
                <i class="ti ti-phone text-dark fs-6"></i>
                <h6 class="fs-4 fw-semibold mb-0"><?= $prof->mobileno ?></h6>
            </li>
            <li class="d-flex align-items-center gap-6 flex-wrap mb-2">
                <i class="ti ti-map-pin text-dark fs-6"></i>
                <h6 class="fs-4 fw-semibold mb-0"><?= $prof->fname ?></h6>
            </li>
        </ul>
        <?php } ?>
    </div>
</div>