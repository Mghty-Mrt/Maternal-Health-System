<?php foreach ($reply as $rep) { ?>
    <div class="card shadow-none card-hover ms-5 rounded-5" style="background-color: rgba(168, 233, 255, 0.8);">
        <div class="card-body">
            <h5 class="fw-bold text-main mb-3"><?= $rep->mftitle ?> <small class="fs-3 fw-normal"> (<?= $rep->title ?>)<i clas="fas fa-user-check fs-2"></i> </small> </h5>
            <p class="mb-3 text-dark"><?= $rep->feedback ?></p>
            <p class="mb-0 fs-2 text-muted d-flex justify-content-end fw-bold"><?= date('M d, Y \a\t h:i a', strtotime($rep->mfdate)) ?></p>
        </div>
    </div>
<?php } ?>