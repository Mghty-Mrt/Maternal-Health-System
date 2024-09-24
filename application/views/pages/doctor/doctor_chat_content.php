<div class="chat-box-inner-part h-100">
    <div class="chat-not-selected h-100 d-none">
        <div class="d-flex align-items-center justify-content-center h-100 p-5">
            <div class="text-center">
                <span class="text-primary">
                    <i class="ti ti-message-dots fs-10"></i>
                </span>
                <h6 class="mt-2">Open chat from the list</h6>
            </div>
        </div>
    </div>
    <div class="chatting-box d-block">
        <?php foreach ($user as $u) { ?>
            <div class="p-9 border-bottom chat-meta-user d-flex align-items-center justify-content-between">
                <div class="hstack gap-3 current-chat-user-name">
                    <div class="position-relative">
                        <?php if (empty($u->image)) { ?>
                            <img src="../assets/images/profile/default.jpg" alt="user1" width="48" height="48" class="rounded-circle">
                        <?php } else { ?>
                            <img src="/mhs_micro/profile/<?= $u->image ?>?t=<?= time() ?>" alt="user1" width="48" height="48" class="rounded-circle">
                        <?php } ?>
                        <span class="position-absolute bottom-0 end-0 p-1 badge rounded-pill bg-success">
                            <span class="visually-hidden">New alerts</span>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-1 name fw-semibold"><?= $u->r_code ?>. <?= $u->firstname ?> <?= $u->middlename ?> <?= $u->lastname ?></h6>
                        <p class="mb-0"><?= $u->r_name ?></p>
                    </div>
                </div>
                <ul class="list-unstyled mb-0 d-flex align-items-center">
                    <li>
                        <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                            <!-- <i class="ti ti-phone"></i> -->
                        </a>
                    </li>
                    <li>
                        <a class="text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                            <!-- <i class="ti ti-video"></i> -->
                        </a>
                    </li>
                    <li>
                        <a class="chat-menu text-dark px-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                            <i class="ti ti-bell"></i>
                        </a>
                    </li>
                </ul>
            </div>
        <?php } ?>
        
        <div class="d-flex parent-chat-box">
            <div class="chat-box w-100 w-xs-100">
                <div class="chat-box-inner p-9" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: -20px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>

                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;" id="chat_reply_latest">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: scroll;" id="chat_body">
                                    <div class="simplebar-content" style="padding: 20px;">

                                        <?php
                                        // Merge chat and reply arrays
                                        $messages = array_merge($chat, $reply);

                                        // Sort messages by creation date
                                        usort($messages, function ($a, $b) {
                                            return strtotime($a->c_date) - strtotime($b->c_date);
                                        });
                                        ?>

                                        <div class="chat-list chat active-chat" data-user-id="1">

                                            <?php foreach ($messages as $message) { ?>
                                                <?php if ($message->chat_from != $this->session->userdata('id')) { ?>
                                                    <div class="hstack gap-3 align-items-start mb-7 justify-content-starthome">
                                                        <?php if (empty($message->image)) { ?>
                                                            <img src="../assets/images/profile/default.jpg" alt="user1" width="40" height="40" class="rounded-circle">
                                                        <?php } else { ?>
                                                            <img src="/mhs_micro/profile/<?= $message->image ?>?t=<?= time() ?>" alt="user1" width="40" height="40" class="rounded-circle">
                                                        <?php } ?>
                                                        <div>
                                                            <h6 class="fs-1 text-muted">
                                                                <?= date('M j, Y, g:i a', strtotime($message->c_date)) ?>
                                                            </h6>
                                                            <div class="p-2 text-bg-light rounded-2 d-inline-block text-dark fs-3">
                                                                <?= $message->content ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                        <div class="text-end">
                                                            <h6 class="fs-1 text-muted"><?= date('M j, Y, g:i a', strtotime($message->c_date)) ?></h6>
                                                            <div class="p-2 bg-info-subtle text-dark rounded-2 d-inline-block fs-3">
                                                                <?= $message->content ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="simplebar-placeholder" style="width: 506px; height: 577px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                </div>
                <div class="px-9 py-6 border-top chat-send-message-footer">
                    <div class="row align-items-center justify-content-between">
                        <div class="col d-flex align-items-center">
                            <a class="position-relative nav-icon-hover z-index-5" href="javascript:void(0)">
                                <!-- <i class="ti ti-camera text-dark bg-hover-primary fs-5"></i> -->
                            </a>
                            <input type="text" name="chat_reply" id="chat_reply" class="form-control shadow-none ms-2 w-100" placeholder="Type a Message..." autocomplete="off">
                        </div>
                        <div class="col-auto">
                            <ul class="list-unstyled mb-0 d-flex align-items-center">
                                <li>
                                    <a onclick="send(<?= $acc_id ?>)" class="text-dark me-2 fs-7 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                        <i class="ti ti-send fs-5"></i>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>
</div>

<script>
    function send(id) {
        var acc_id = id;
        var reply = $('#chat_reply').val();
        // alert(acc_id);

        $.ajax({
            url: '../doctor/send',
            method: 'POST',
            data: {
                'reply': reply,
                'acc_id': acc_id
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('#chat_reply_latest').html(response);
                $('#chat_reply').val("");
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

<script>
    // Function to scroll to the bottom of the chat container
    function scrollToBottom() {
        var element = document.getElementById("chat_body");
        element.scrollTop = element.scrollHeight;
    }

    // Call the function to scroll to the bottom when the page loads
    window.onload = function() {
        scrollToBottom();
    };

    // Call the function to scroll to the bottom when new content is added
    $(document).ready(function() {
        scrollToBottom();
    });
</script>