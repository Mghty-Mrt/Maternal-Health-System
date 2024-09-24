<li class="nav-item dropdown">
    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="true">
        <i class="ti ti-bell-ringing"></i>
        <div class="notification bg-danger rounded-circle"></div>
        <?php if ($notif_count == 0) { ?>
            <div class="notification bg-success rounded-circle"></div>
        <?php } else { ?>
            <div class="notification bg-danger rounded-circle"></div>
        <?php } ?>
    </a>

    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2" data-bs-popper="static">
        <div class="d-flex align-items-center justify-content-between py-2 px-7 border-bottom">
            <h5 class="mb-0 fs-5 fw-semibold text-main">Notifications</h5>
            <?php if ($notif_count == 0) { ?>
                <span class="badge text-bg-success rounded-3 px-3 py-1 lh-sm"> <i class="ti ti-bell-ringing"></i> <?php print $notif_count ?> </span>
            <?php } else { ?>
                <span class="badge text-bg-danger rounded-3 px-3 py-1 lh-sm"> <i class="ti ti-bell-ringing"></i> <?php print $notif_count ?> </span>
            <?php } ?>
        </div>
        <div class="message-body simplebar-scrollable-y" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;">
                            <div class="simplebar-content bg-light" style="padding: 0px; overflow:hidden scroll">

                                <?php foreach ($notif as $no) { ?>
                                    <a <?php if ($no->notification_type_id  == 2) { ?> href="../lyingin/referlist" onclick="readnotif(<?= $no->notification_type_id ?>)" <?php } elseif ($no->notification_type_id  == 2) { ?> href="#" <?php } ?> class="py-6 px-7 d-flex align-items-center dropdown-item">
                                        <span class="me-3">
                                            <?php if ($no->image == "") { ?>
                                                <img src="../assets/images/profile/default.jpg" alt="user" class="rounded-circle" width="48" height="48">
                                            <?php } else { ?>
                                                <img src="/mhs_micro/profile/<?= $no->image ?>?t=<?= time() ?>" alt="user" class="rounded-circle" width="48" height="48">
                                            <?php } ?>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle">
                                            <h6 class="mb-1 fw-semibold lh-base"><?= $no->firstname ?> <?= $no->middlename ?> <?= $no->lastname ?></h6>
                                            <span class="fs-2 d-block text-body-secondary"><?= $no->content ?></span>
                                        </div>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="simplebar-placeholder" style="width: 360px; height: 432px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar" style="height: 300px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
            </div>
        </div>
        <div class="py-6 px-7 mb-1 border-top">
            <!-- <button class="btn btn-outline-secondary w-100">See All Notifications</button> -->
        </div>

    </div>
</li>