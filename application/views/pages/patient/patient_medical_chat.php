<div class="container-fluid">
    <div class="card overflow-hidden chat-application">
        <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
            <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
            </button>
            <form class="position-relative w-100">
                <input type="text" class="form-control shadow-none search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="d-flex">
            <div class="w-30 d-none d-lg-block border-end user-chat-box">
                <div class="px-4 pt-9 pb-6">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <div class="position-relative">
                                <?php if($user_info[0]->image == ""){ ?>
                                    <img src="../assets/images/profile/default.jpg" alt="user1" width="54" height="54" class="rounded-circle">
                                <?php } else { ?>
                                    <img src="/mhs_micro/profile/<?= $user_info[0]->image ?>" alt="user1" width="54" height="54" class="rounded-circle">
                                <?php } ?>
                                <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-semibold mb-2"><?= $user_info[0]->firstname ?> <?= $user_info[0]->middlename ?> <?= $user_info[0]->lastname ?> </h6>
                                <p class="mb-0 fs-2"><?= $user_info[0]->rname ?></p>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="text-dark fs-6 nav-icon-hover" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                        </div>
                    </div>
                    <form class="position-relative mb-4">
                        <input type="text" class="form-control shadow-none search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="app-chat">
                    <ul class="chat-users mb-0 mh-n100" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <?php foreach ($users as $u) { ?>
                                                <li>
                                                    <a href="javascript:void(0)" onclick="viewchat(<?= $u->acc_id ?>)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user bg-light-subtle" id="chat_user_1" data-user-id="1">
                                                        <div class="d-flex align-items-center">
                                                            <span class="position-relative">
                                                                <?php if (empty($u->image)) { ?>
                                                                    <img src="../assets/images/profile/default.jpg" alt="user1" width="48" height="48" class="rounded-circle">
                                                                <?php } else { ?>
                                                                    <img src="/mhs_micro/profile/<?= $u->image ?>?t=<?= time() ?>" alt="user1" width="48" height="48" class="rounded-circle">
                                                                <?php } ?>
                                                                <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                                                                    <span class="visually-hidden">New alerts</span>
                                                                </span>
                                                            </span>
                                                            <div class="ms-3 d-inline-block w-75">
                                                                <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                                                                    <?= $u->r_code ?>. <?= $u->firstname ?> <?= $u->lastname ?>
                                                                </h6>
                                                                <span class="fs-3 text-truncate text-body-color d-block">Doctor</span>
                                                            </div>
                                                        </div>
                                                        <!-- <p class="fs-2 mb-0 text-muted">15 mins</p> -->
                                                    </a>
                                                </li>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 345px; height: 560px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                        </div>
                    </ul>
                </div>
            </div>

            <div class="w-100 w-xs-100 chat-container" id="chat_content">
                <!-- content dynamically here  -->
                <div class="mt-5 pt-5 mb-5 pb-5">
                    <i class="ti ti-message-circle-off text-gray d-flex justify-content-center" style="font-size: 100px"></i>
                    <p class="text-center text-gray fw-bold fs-5">No chat selected</p>
                </div>

            </div>

            <div class="offcanvas offcanvas-start user-chat-box chat-offcanvas" tabindex="-1" id="chat-sidebar" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                        Chats
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="px-4 pt-9 pb-6">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="d-flex align-items-center">
                            <div class="position-relative">
                                <?php if($user_info[0]->image == ""){ ?>
                                    <img src="../assets/images/profile/default.jpg" alt="user1" width="54" height="54" class="rounded-circle">
                                <?php } else { ?>
                                    <img src="/mhs_micro/profile/<?= $user_info[0]->image ?>" alt="user1" width="54" height="54" class="rounded-circle">
                                <?php } ?>
                                <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                                    <span class="visually-hidden">New alerts</span>
                                </span>
                            </div>
                            <div class="ms-3">
                                <h6 class="fw-semibold mb-2"><?= $user_info[0]->firstname ?> <?= $user_info[0]->middlename ?> <?= $user_info[0]->lastname ?> </h6>
                                <p class="mb-0 fs-2"><?= $user_info[0]->rname ?></p>
                            </div>
                        </div>
                    </div>
                    <form class="position-relative mb-4">
                        <input type="text" class="form-control shadow-none search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="app-chat">
                    <ul class="chat-users mh-n100" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <?php foreach ($users as $u) { ?>
                                                <li>
                                                    <a href="javascript:void(0)" onclick="viewchat(<?= $u->acc_id ?>)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user bg-light-subtle" id="chat_user_1" data-user-id="1">
                                                        <div class="d-flex align-items-center">
                                                            <span class="position-relative">
                                                                <?php if (empty($u->image)) { ?>
                                                                    <img src="../assets/images/profile/default.jpg" alt="user1" width="48" height="48" class="rounded-circle">
                                                                <?php } else { ?>
                                                                    <img src="/mhs_micro/profile/<?= $u->image ?>?t=<?= time() ?>" alt="user1" width="48" height="48" class="rounded-circle">
                                                                <?php } ?>
                                                                <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                                                                    <span class="visually-hidden">New alerts</span>
                                                                </span>
                                                            </span>
                                                            <div class="ms-3 d-inline-block w-75">
                                                                <h6 class="mb-1 fw-semibold chat-title" data-username="James Anderson">
                                                                    <?= $u->r_code ?>. <?= $u->firstname ?> <?= $u->lastname ?>
                                                                </h6>
                                                                <span class="fs-3 text-truncate text-body-color d-block">Doctor</span>
                                                            </div>
                                                        </div>
                                                        <!-- <p class="fs-2 mb-0 text-muted">15 mins</p> -->
                                                    </a>
                                                </li>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 330px; height: 560px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="height: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
    </div>
</div>

<script>
    function viewchat(acid) {

        var acc_id = acid;
        // alert(acc_id);

        $.ajax({
            url: '../patient/viewmessage',
            method: 'POST',
            data: {
                'acc_id': acc_id
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('#chat_content').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            },
            complete: function() {
                $('#loadinggif').hide();
            }
        });
    }
</script>