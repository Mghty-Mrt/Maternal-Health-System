<div class="container-fluid">
  <h5 class="pb-2 text-main"><b>Dashboards </b> / Events & Programs</h5>

  <div class="row">
    <?php foreach ($events as $e) { ?>
      <div class="col-md-3">
        <div class="card w-100 card-hover shadow">
          <!-- <div class="card-header"> -->
          <img src="../assets/images/logos/midwife.png" class="card-img" alt="">
          <!-- </div> -->
          <div class="card-body">
            <h4 class="mb-0 text-main card-title"> <i class="fas fa-award text-danger"></i> <?= $e->st_name ?> </h4> <small><?= date('M d, Y', strtotime($e->date)) ?></small>
            <br>
            <small><b>START:</b> <?= date('h:i A', strtotime($e->time)) ?></small>
            <br>
            <small><b>END:</b> <?= date('h:i A', strtotime($e->end_time)) ?></small>
            <p class="card-text mt-2 text-main fw-bold">
              - <?= $e->event ?>
              <br>
              <small><?= $e->fname ?></small>
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

</div>