<style>
    .signature {
        border: 0;
        border-radius: 0%;
        border-bottom: 1px solid lightgray;
    }
</style>

<div class="container-fluid" id="message">

    <div class="card overflow-hidden chat-application" style="height: 670px;">
        <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
            <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                <i class="ti ti-menu-2 fs-5"></i>
            </button>
            <form class="position-relative w-100">
                <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact">
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>
        </div>
        <div class="d-flex w-100">
            <div class="left-part border-end w-20 flex-shrink-0 d-none d-lg-block h-auto">
                <div class="px-9 pt-4 pb-3">
                    <button class="btn btn-secondary rounded-4 fw-semibold py-8 w-100" data-bs-toggle="modal" data-bs-target="#create_message_modal"> <i class="fas fa-plus-circle"></i> Create</button>
                </div>
                <ul class="list-group mh-n100" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-inbox fs-5 text-primary"></i>Inbox</a>
                                        </li>   
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-archive fs-5 text-danger"></i>Archived</a>
                                        </li>
                                        <!-- <li class="border-bottom my-3"></li>
                                        <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">IMPORTANT</li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-star fs-5 text-warning"></i>Important</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-speakerphone fs-5 text-secondary"></i>Announcement</a>
                                        </li> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 230px; height: 559px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                    </div>
                </ul>
            </div>

            <div class="d-flex w-100">
                <!-- chat users starst -->
                <div class="min-width-340">
                    <div class="border-end user-chat-box h-100">
                        <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                            <form class="position-relative">
                                <input type="text" class="form-control search-chat shadow-none py-2 ps-5" id="text-srh" placeholder="Search">
                                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                            </form>
                        </div>

                        <!-- users -->
                        <div class="app-chat">
                            <ul class="chat-users mh-n100 simplebar-scrollable-y" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>

                                    <!-- ito pala -->
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 598px; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <?php foreach ($usermsg as $mgs) { ?>
                                                        <li>
                                                            <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light-subtle" onclick="viewchat(<?= $mgs->mcid ?>)" data-user-id="1">
                                                                <span class="position-relative">
                                                                    <img src="../assets/images/profile/default.jpg" alt="user-1" width="40" height="40" class="rounded-circle">
                                                                </span>
                                                                <div class="position-relative w-100 ms-2">
                                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                                        <h6 class="fw-semibold mb-0">
                                                                            <?= $mgs->firstname ?>
                                                                            <?php

                                                                            if (!empty($mgs->middlename)) {
                                                                                print $mgs->middlename[0] . '. ';
                                                                            }
                                                                            ?>
                                                                            <?= $mgs->lastname ?>
                                                                        </h6>

                                                                        <?php if ($mgs->mcstat == 1) { ?>
                                                                            <span class="badge text-bg-warning fs-2 rounded-2 py-1 px-2"> <i class="fas fa-clipboard-list"></i> Task</span>
                                                                        <?php } elseif ($mgs->mcstat == 2) { ?>
                                                                            <span class="badge text-bg-success fs-2 rounded-2 py-1 px-2"> <i class="fas fa-check-circle"></i> Done</span>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <h6 class="fw-semibold text-dark"><?= strlen($mgs->title) > 27 ? substr($mgs->title, 0, 24) . '...' : $mgs->title ?></h6>
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <!-- <span><i class="ti ti-star fs-4 me-2 text-dark"></i></span> -->
                                                                            <span class="d-block"><i class="ti ti-archive text-muted"></i></span>
                                                                        </div>
                                                                        <p class="mb-0 fs-2 text-muted"><?= date('M d, Y \a\t h:i a', strtotime($mgs->mcdate)) ?></p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ito pala end  -->

                                    <div class="simplebar-placeholder" style="width: 339px; height: 846px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                    <div class="simplebar-scrollbar" style="height: 579px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                                </div>
                            </ul>
                        </div>
                        <!-- users -->
                    </div>
                </div>
                <!-- end of chat users -->

                <div class="w-100">
                    <div class="chat-container h-100 w-100">
                        <div class="chat-box-inner-part h-100">
                            <div class="chatting-box app-email-chatting-box">

                                <!-- head start -->
                                <div class="p-9 py-3 border-bottom chat-meta-user d-flex justify-content-between">
                                    <h5 class="text-main">Inbox Message</h5>
                                    <ul class="list-unstyled mb-0 d-flex align-items-center">
                                        <li class="d-lg-none d-block">
                                            <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                <i class="ti ti-arrow-left"></i>
                                            </a>
                                        </li>
                                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Star">
                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                <!-- <i class="ti ti-star text-warning"></i> -->
                                            </a>
                                        </li>
                                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                <i class="ti ti-archive text-danger"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- head end -->

                                <div class="position-relative overflow-hidden">
                                    <div class="position-relative">

                                        <!-- message content here  -->
                                        <div class="chat-box email-box mh-n100 p-9" data-simplebar="init" id="viewchat">

                                            <div class="mt-5 pt-5">
                                                <i class="ti ti-message-circle-off text-gray d-flex justify-content-center" style="font-size: 100px"></i>
                                                <p class="text-center text-gray fw-bold fs-5">No message selected</p>
                                            </div>

                                        </div>
                                        <!-- end of message content  -->

                                        <!-- <div class="px-9 py-3 border-top chat-send-message-footer"  style="height:70px;">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <textarea name="reply" id="reply" cols="30" rows="1" class="form-control shadow-none rounded-5 bg-secondary-subtle" placeholder="write your feedback here..."></textarea>
                                                <button type="button" class="btn btn-secondary ms-3 rounded-5"><i class="ti ti-send fs-4"></i></button>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="offcanvas offcanvas-start user-chat-box" tabindex="-1" id="chat-sidebar" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"> Message </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="px-9 pt-4 pb-3">
                    <button class="btn btn-primary fw-semibold py-8 w-100">Create</button>
                </div>
                <ul class="list-group h-n150" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-inbox fs-5 text-primary"></i>Inbox</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-archive fs-5 text-danger"></i>Archived</a>
                                        </li>
                                        <!-- <li class="border-bottom my-3"></li>
                                        <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">IMPORTANT</li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-star fs-5 text-warning"></i>Important</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-speakerphone fs-5 text-secondary"></i>Announcement</a>
                                        </li> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 330px; height: 559px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Create Message Modal -->
<div class="modal fade" id="create_message_modal" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content rounded-2">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="modalTitle"> <i class="fas fa-plus-circle"></i> Create Message</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

                <div class="row">
                    <div class="col-md-7 d-flex justify-content-between">
                        <label for="to" class="mt-2 fw-semibold text-main">To</label>
                        <input type="text" class="form-control shadow-none signature" name="to" id="to" placeholder="">
                    </div>

                    <div class="col-md-5 d-flex justify-content-between">
                        <label for="to" class=" mt-2 fw-semibold text-main">Subject</label>
                        <select name="subject" id="subject" class="form-select shadow-none signature">
                            <option value=""></option>
                            <option value="">Absent</option>
                        </select>
                    </div>

                    <div class="col-md-12 d-flex justify-content-between mt-3">
                        <label for="to" class=" mt-2 fw-semibold text-main">Title</label>
                        <input type="text" class="form-control shadow-none signature" name="title" id="title" placeholder="">
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="content" class="fw-semibold text-main">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control shadow-none"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abort</button> -->
                <button type="submit" class="btn btn-secondary">Send <i class="ti ti-send"></i> </button>
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
    function viewchat(mcid) {

        var mc_id = mcid;
        // alert(mc_id);

        $.ajax({
            url: '../chw/viewmessage',
            method: 'POST',
            data: {
                'mc_id': mc_id
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('#viewchat').html(response);
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