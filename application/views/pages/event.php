<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maternal Health System</title>

    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/fav.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="../assets/css/custom.css" />
    <link rel="stylesheet" href="../assets/css/fontawesome.css" />
    <script src="../assets/libs/jquery/dist/jquery-3.6.0.min.js"></script>

    <!-- alerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4 mt-3">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-main">Helth Centers Programs and Events</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="../home">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Events</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../assets/images/logos/pregy.png" alt="modernize-img" class="img-fluid mb-n5">
                        <img src="../assets/images/logos/pregy.png" alt="modernize-img" class="img-fluid mb-n3">
                        <img src="../assets/images/logos/pregy.png" alt="modernize-img" class="img-fluid mb-n1">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-3">
        <div class="">
            <div class="row">
                <?php foreach($all_events as $all){ ?>
                <div class="col-md-4">
                    <div id="note-full-container" class="note-has-grid row">
                        <div class="card card-body card-hover border-3 border-start border-success me-3 bg-light-subtle">
                        <span class="side-stick"></span>
                            <h6 class="note-title text-truncate w-75 mb-0 fs-4" data-noteheading="Book a Ticket for Movie"> 
                                <?= $all->st_name ?>
                            </h6>
                            <p class="note-date fs-2 mt-1 border-top border-1 pt-1">
                                <b>Start:</b> <?= date('M d, Y', strtotime($all->date)) ?> - <b>Time:</b> <?= date('h:i A', strtotime($all->time)) ?>
                                <br>
                                <b>End:</b> <?= date('M d, Y', strtotime($all->date)) ?> - <b>Time:</b> <?= date('h:i A', strtotime($all->end_time)) ?>
                            </p>
                            <div class="note-content">
                                <p class="note-inner-content" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">
                                    <?= $all->event ?> 
                                </p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="javascript:void(0)" class="link me-1">
                                    <i class="ti ti-calendar fs-5 text-warning"></i>
                                </a>
                                <a href="javascript:void(0)" class="link text-danger ms-2">
                                    <i class="ti ti-speakerphone fs-5 text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
