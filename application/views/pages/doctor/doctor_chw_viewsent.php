<?php foreach ($usermsg as $viewmsg) { ?>
    <div class="chat-list chat active-chat " data-user-id="1">
        <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
            <div class="d-flex align-items-center gap-2">
                <img src="../assets/images/profile/default.jpg" alt="user8" width="48" height="48" class="rounded-circle">
                <div>
                    <h6 class="fw-semibold mb-0"><?= $viewmsg->firstname ?> <?= $viewmsg->middlename ?> <?= $viewmsg->lastname ?> </h6>
                    <p class="mb-0"><?= $viewmsg->email ?></p>
                </div>
            </div>
            <span class="badge text-bg-secondary fs-2 rounded-1 py-1 px-2"> <i class="ti ti-user"></i> <?= $viewmsg->rname ?></span>
        </div>
        <div class="pt-2" style="height: 400px; overflow: hidden scroll;">
            <div class="card shadow-none card-hover bg-secondary-subtle me-5 rounded-5">
                <div class="card-body">
                    <h5 class="fw-bold text-main mb-3"><?= $viewmsg->title ?></h5>
                    <p class="mb-3 text-dark"><?= $viewmsg->content ?></p>
                    <p class="mb-0 fs-2 text-muted d-flex justify-content-end fw-bold"><?= date('M d, Y \a\t h:i a', strtotime($viewmsg->mcdate)) ?></p>
                </div>
            </div>
        <?php } ?>

        <div id="feedback">
            <?php foreach($reply as $rep){ ?>
            <div class="card shadow-none card-hover ms-5 rounded-5" style="background-color: rgba(168, 233, 255, 0.8);">
                <div class="card-body">
                    <h5 class="fw-bold text-main mb-3"><?= $rep->mftitle ?> To: <small class="fs-3 fw-normal"> (<?= $rep->title ?>)<i clas="fas fa-user-check fs-2"></i> </small> </h5>
                    <p class="mb-3 text-dark"><?= $rep->feedback ?></p>
                    <p class="mb-0 fs-2 text-muted d-flex justify-content-end fw-bold"><?= date('M d, Y \a\t h:i a', strtotime($rep->mfdate)) ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>

    </div>

    <div class="px-9 py-3 border-top chat-send-message-footer" style="height:70px;">
        <div class="d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-start me-3">
                <img src="../assets/images/profile/default.jpg" alt="user8" width="40" height="40" class="rounded-5">
            </div>

            <textarea name="reply" id="reply" cols="30" rows="1" class="form-control shadow-none rounded-5 bg-secondary-subtle" placeholder="write your feedback here..."></textarea>
            <button type="button" class="btn btn-secondary ms-3 rounded-5" onclick="reply(<?= $viewmsg->mcid ?>)"><i class="ti ti-send fs-4"></i></button>
        </div>
    </div>

    <script>
        function reply(mcid) {

            var mc_id = mcid;
            var reply = $('#reply').val();
            // alert(reply);

            $.ajax({
                url: '../chw/sendreply',
                method: 'POST',
                data: {
                    'mc_id': mc_id,
                    'reply': reply
                },
                beforeSend: function() {
                    $('#loadinggif').show();
                },
                success: function(response) {
                    // $('#viewchat').html(response);
                    // playNotificationSound();
                    $('button[type="button"]').prop('disabled', true);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        },
                        didClose: () => {
                            $('#reply').val('');
                            $('button[type="button"]').prop('disabled', false);

                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Feedback sent successfully"
                    });
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