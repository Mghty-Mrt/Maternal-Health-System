<style>
    .signature {
        border: 0;
        border-radius: 0%;
        border-bottom: 1px solid lightgray;
    }
</style>

<div class="container-fluid">

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
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1 bg-light-subtle" href="../doctor/viewinbox"><i class="ti ti-inbox fs-5 text-primary"></i>Inbox</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="../doctor/viewmessage"><i class="ti ti-brand-telegram fs-5 text-success"></i>Sent</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-archive fs-5 text-danger"></i>Archived</a>
                                        </li>
                                        <!-- <li class="border-bottom my-3"></li>
                                        <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">IMPORTANT</li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-star fs-5 text-warning"></i>Starred</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-badge fs-5 text-secondary    "></i>Important</a>
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

            <!-- message area start here  -->
            <div class="d-flex w-100" id="messagearea">
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
                                                    <li>
                                                        <a href="javascript:void(0)" class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light-subtle" id="chat_user_1" data-user-id="1">
                                                            <span class="position-relative">
                                                                <img src="../assets/images/profile/default.jpg" alt="user-1" width="40" height="40" class="rounded-4">
                                                            </span>
                                                            <div class="position-relative w-100 ms-2">
                                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                                    <h6 class="mb-0">James Smith</h6>
                                                                    <!-- <span class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span> -->
                                                                </div>
                                                                <h6 class="fw-semibold text-dark">Kindly check this latest updated</h6>
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <span><i class="ti ti-star fs-4 me-2 text-dark"></i></span>
                                                                        <span class="d-block"><i class="ti ti-archive text-muted"></i></span>
                                                                    </div>
                                                                    <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>

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
                                    <h5 class="text-main"> Inbox Message</h5>
                                    <ul class="list-unstyled mb-0 d-flex align-items-center">
                                        <li class="d-lg-none d-block">
                                            <a class="text-dark back-btn px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                <i class="ti ti-arrow-left"></i>
                                            </a>
                                        </li>
                                        <li class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Star">
                                            <a class="text-dark px-2 fs-5 bg-hover-primary nav-icon-hover position-relative z-index-5" href="javascript:void(0)">
                                                <i class="ti ti-star text-warning"></i>
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
                                        <div class="chat-box email-box mh-n100 p-9" style="height: 540px; overflow: hidden scroll;" data-simplebar="init">

                                            <div class="chat-list chat active-chat " data-user-id="1">
                                                <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between flex-wrap gap-6">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <img src="../assets/images/profile/default.jpg" alt="user8" width="48" height="48" class="rounded-4">
                                                        <div>
                                                            <h6 class="fw-semibold mb-0">Alexandra Flintoff</h6>
                                                            <p class="mb-0">hello@loremipsum.com</p>
                                                        </div>
                                                    </div>
                                                    <span class="badge text-bg-primary fs-2 rounded-4 py-1 px-2">Promotional</span>
                                                </div>
                                                <div class="border-bottom pb-7 mb-7">
                                                    <h4 class="fw-semibold text-dark mb-3">Kindly check this latest updated</h4>
                                                    <p class="mb-3 text-dark">Hello Andrew,</p>
                                                    <p class="mb-3 text-dark">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque bibendum
                                                        hendrerit lobortis. Nullam ut lacus eros. Sed at luctus urna, eu fermentum
                                                        diam.
                                                        In et tristique mauris.
                                                    </p>
                                                    <p class="mb-3 text-dark">Ut id ornare metus, sed auctor enim. Pellentesque
                                                        nisi
                                                        magna, laoreet a augue eget, tempor volutpat diam.</p>
                                                    <p class="mb-0 text-dark">Regards,</p>
                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">Alexandra Flintoff</h6>
                                                </div>
                                                <div class="mb-3">
                                                    <h6 class="fw-semibold mb-0 text-dark mb-3">Attachments</h6>
                                                    <div class="d-block d-sm-flex align-items-center gap-4">
                                                        <a href="javascript:void(0)" class="hstack gap-3 mb-2 mb-sm-0">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="rounded-1 text-bg-light p-6">
                                                                    <img src="../assets/images/logos/departmentOfhealth.png" alt="" width="24" height="24">
                                                                </div>
                                                                <div>
                                                                    <h6 class="fw-semibold">service-task.pdf</h6>
                                                                    <div class="d-flex align-items-center gap-3 fs-2 text-muted"><span>2
                                                                            MB</span><span>2 Dec 2023</span></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="javascript:void(0)" class="hstack gap-3 file-chat-hover">
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="rounded-1 text-bg-light p-6">
                                                                    <img src="../assets/images/logos/quezoncity.png" alt="" width="24" height="24">
                                                                </div>
                                                                <div>
                                                                    <h6 class="fw-semibold">work-project.zip</h6>
                                                                    <div class="d-flex align-items-center gap-3 fs-2 text-muted"><span>2
                                                                            MB</span><span>2 Dec 2023</span></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="px-9 py-3 border-top chat-send-message-footer">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <ul class="list-unstyled mb-0 d-flex align-items-center gap-7">
                                                    <li>
                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1" href="javascript:void(0)">
                                                            <i class="ti ti-arrow-back-up fs-5"></i>
                                                            Reply
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1" href="javascript:void(0)">
                                                            <i class="ti ti-arrow-forward-up fs-5"></i>
                                                            Forward
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
                </div>
            </div>
            <!-- message area end here  -->


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
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-brand-telegram fs-5 text-success"></i>Sent</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-archive fs-5 text-danger"></i>Archived</a>
                                        </li>
                                        <!-- <li class="border-bottom my-3"></li>
                                        <li class="fw-semibold text-dark text-uppercase mx-9 my-2 px-3 fs-2">IMPORTANT</li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-star fs-5 text-warning"></i>Starred</a>
                                        </li>
                                        <li class="list-group-item border-0 p-0 mx-9">
                                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1" href="javascript:void(0)"><i class="ti ti-badge fs-5 text-secondary    "></i>Important</a>
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
                        <!-- <label for="to" class="mt-2 fw-semibold text-main">To</label> -->
                        <input list="emailList" type="text" class="form-control shadow-none signature" name="to" id="to" autocomplete="off" placeholder="To">
                        <input type="hidden" name="emmail_id" id="emmail_id">
                        <datalist id="emailList">
                            <?php foreach ($hcusers as $user) { ?>
                                <option value="<?= $user->email ?>" data-accid="<?= $user->accid ?>">
                                <?php } ?>
                        </datalist>
                    </div>

                    <div class="col-md-5 d-flex justify-content-between">
                        <!-- <label for="to" class=" mt-2 fw-semibold text-main">Subject</label> -->
                        <select name="subject" id="subject" class="form-select shadow-none signature" onchange="toggleTextarea()">
                            <option value="" disabled selected>Subject</option>
                            <?php foreach ($subjects as $sub) { ?>
                                <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-12 d-flex justify-content-between mt-3">
                        <!-- <label for="to" class=" mt-2 fw-semibold text-main">Title</label> -->
                        <input type="text" class="form-control shadow-none signature" name="title" id="title" placeholder="Title">
                    </div>

                    <div class="col-md-12 mt-3" id="absent" style="display: none">
                        <!-- <label for="content" class="fw-semibold text-main">Content</label> -->
                        <!-- <textarea name="content" id="content" cols="30" rows="10" class="form-control shadow-none border-0" placeholder="Content..."></textarea> -->
                        <input type="hidden" name="quillContent" id="quillContent" class="form-control shadow-none border-0">
                        <div class="content">
                            <div id="editor" class=""> List of Absent Patients: <br>
                                <?php
                                if (!empty($uncheckpatientst)) {
                                    foreach ($uncheckpatientst as $absent) {
                                        $dateTime = new DateTime($absent->followUp_checkUp . ' ' . $absent->time);
                                        $formattedDate = $dateTime->format('M d, Y \a\t g:ia');
                                        print ' ' . $absent->pid . '.';
                                        print ' ' . $absent->firstname;
                                        print ' ' . $absent->middlename;
                                        print ' ' . $absent->lastname;
                                        print ' ' . '<b>Address:</b>';
                                        print ' ' . $absent->street;
                                        print ' ' . $absent->fname;
                                        print ' ' . $absent->city;
                                        print ' ' . '<b>Schedule:</b>';
                                        print ' ' . $formattedDate . '<br>';
                                    }
                                } else {
                                    print 'No Absent Patients today';
                                }
                                ?>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3" id="main">
                        <!-- <label for="content" class="fw-semibold text-main">Content</label> -->
                        <!-- <textarea name="content" id="content" cols="30" rows="10" class="form-control shadow-none border-0" placeholder="Content..."></textarea> -->
                        <input type="hidden" name="quillContent2" id="quillContent2" class="form-control shadow-none border-0">
                        <div class="content2">
                            <div id="editor2"><br><br><br><br><br><br><br><br></div>
                        </div>
                    </div>
                </div>

                <div id="loadinggif" class="modal1">
                    <div class="modal-content1">
                        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Abort</button> -->
                <button type="button" onclick="sendmessage()" class="btn btn-secondary">Send <i class="ti ti-send"></i> </button>
            </div>
        </div>
    </div>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" alt="Loading...">
    </div>
</div>

<script>
    document.getElementById('to').addEventListener('input', function() {
        var selectedOption = document.querySelector('#emailList option[value="' + this.value + '"]');
        if (selectedOption) {
            var emmail_id = selectedOption.getAttribute('data-accid');
            document.getElementById('emmail_id').value = emmail_id;
        } else {
            document.getElementById('emmail_id').value = '';
        }
    });

    function toggleTextarea() {
        var selectedValue = $("#subject").val();

        // Show/hide textarea based on the selected value
        if (selectedValue === "1") {
            $("#main").hide();
            $("#absent").show();
        } else {
            $("#main").show();
            $("#absent").hide();
        }
    }

    function sendmessage() {
        var emmail_id = $('#emmail_id').val();
        var subject = $('#subject').val();
        var title = $('#title').val();

        var content;
        if ($("#subject").val() === "1") {
            content = $('#editor .ql-editor').html();
        } else {
            content = $('#editor2 .ql-editor').html();
        }

        // alert(content);

        var selectedEmail = $('#to').val();
        var selectedAccid = $('#emailList option[value="' + selectedEmail + '"]').data('accid');

        if (!selectedEmail || !selectedAccid) {
            $('#to').addClass('is-invalid');

            alert('Email doesn\'t exist. Please type or select an email from the list.');
            return;
        }

        $.ajax({
            url: '../doctor/sendmessage',
            method: 'POST',
            data: {
                'emmail_id': emmail_id,
                'subject': subject,
                'title': title,
                'content': content
            },
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                playNotificationSound();
                $('button[type="button"]').prop('disabled', true);
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    didClose: () => {
                        $('#create_message_modal').modal('hide');
                        location.reload();
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Message sent successfully"
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

    function playNotificationSound() {
        var audio = new Audio('../assets/notif/success.mp3');
        audio.play();
    }
</script>

<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],

        [{
            'header': 1
        }, {
            'header': 2
        }],
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }],
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }],
        [{
            'direction': 'rtl'
        }],

        [{
            'size': ['small', false, 'large', 'huge']
        }],
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],

        [{
            'color': []
        }, {
            'background': []
        }],
        [{
            'font': []
        }],
        [{
            'align': []
        }],
        ['image'],
        ['clean']
    ];

    var quill = new Quill('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });


    var toolbarOptions2 = [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],

        [{
            'header': 1
        }, {
            'header': 2
        }],
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }],
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }],
        [{
            'direction': 'rtl'
        }],

        [{
            'size': ['small', false, 'large', 'huge']
        }],
        [{
            'header': [1, 2, 3, 4, 5, 6, false]
        }],

        [{
            'color': []
        }, {
            'background': []
        }],
        [{
            'font': []
        }],
        [{
            'align': []
        }],
        ['image'],
        ['clean']
    ];

    var quill = new Quill('#editor2', {
        modules: {
            toolbar: toolbarOptions2
        },
        theme: 'snow'
    });
</script>