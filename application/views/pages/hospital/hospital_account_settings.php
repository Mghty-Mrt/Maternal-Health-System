<style>
    .custom_pro {
        color: transparent;
    }

    .custom_pro::-webkit-file-upload-button {
        visibility: hidden;
    }

    .custom_pro::before {
        content: 'Change Profile';
        color: white;
        display: inline-block;
        background: rgb(17, 82, 114, 1);
        border: 1px solid rgb(17, 82, 114, 1);
        border-radius: 3px;
        padding: 8px 10px;
        outline: none;
        border-radius: 8px;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        font-size: 10pt;
        margin-left: 105px;
        font-weight: normal;
    }

    .custom_pro:hover::before {
        border-color: darkcyan;
        background-color: darkcyan;
    }

    .custom_pro:active {
        outline: 0;
    }

    .custom_pro:active::before {
        background: limegreen;
        border: 1px solid limegreen;
    }
</style>

<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Account Settings</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="../hospital/ddashboard">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Account Settings</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <!-- <img src="../assets/images/profile/default.jpg" alt="" class="img-fluid rounded-circle" width="50"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($user_info as $info) { ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <form id="profileForm" action="../hospital/saveprofile" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="suid" id="suid" value="<?= $info->suid ?>">
                                    <h5 class="card-title fw-semibold">Change Profile</h5>
                                    <p class="card-subtitle mb-4">Change your profile picture here.</p>
                                    <div class="text-center">

                                        <?php if ($info->image == "") { ?>
                                            <img src="../assets/images/profile/default.jpg" alt="default profile" id="previewImage" class="rounded-circle" width="200px" height="200px">
                                        <?php } else { ?>
                                            <img src="/mhs_micro/profile/<?php print $info->image ?>" alt="profile" id="previewImage" class="rounded-circle" width="200px" height="200px">
                                        <?php } ?>

                                        <p class="text-muted mb-0 mt-1 preview-note mt-1" style="display: none"><b class="text-danger">NOTE:</b> Click "<b class="text-success">Save</b>" to apply changes.</p>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <input type="file" name="profile" id="profile" class="custom_pro" accept="image/*" required>
                                            </div>
                                            <div class="col-md-8">
                                                <button type="submit" onclick="showLoading()" class="btn bg-success-subtle text-success me-5">Save <i class="fas fa-save"></i></button>
                                            </div>
                                        </div>
                                        <p class="mt-3 text-danger"><small>Allowed file PNG, JPG or JPEG. Max size of 3MB</small></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold">Change Account</h5>
                                <p class="card-subtitle mb-4">To change your account please input here</p>
                                <form>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Email Address</label>
                                        <input type="email" class="form-control shadow-none" id="exampleInputPassword1" value="<?= $info->email ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword2" class="form-label fw-semibold">Current Password</label>
                                        <input type="password" class="form-control shadow-none" id="exampleInputPassword2" value="<?= $info->password ?>">
                                    </div>
                                    <div class="">
                                        <label for="exampleInputPassword3" class="form-label fw-semibold">New Password</label>
                                        <input type="password" class="form-control shadow-none" id="exampleInputPassword3">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                            <button class="btn btn-primary">Update</button>
                                            <button class="btn bg-danger-subtle text-danger">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div id="loadinggif" class="modal1">
    <div class="modal-content1">
        <img src="../assets/images/loading/toogle2.gif" style="width: 50%; height: 50%" alt="Loading...">
    </div>
</div>

<?php if ($this->session->flashdata('success')) : ?>
    <script>
        const Toast1 = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast1) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
            didClose: () => {
                // window.location.href = "../encoder/account";
            }
        });
        Toast1.fire({
            icon: "success",
            title: "<?= $this->session->flashdata("success") ?>"
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')) : ?>
    <script>
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
                // window.location.href = "../encoder/account";
            }
        });
        Toast.fire({
            icon: "error",
            title: "<?= $this->session->flashdata("error") ?>"
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $('#profile').on('change', function() {
            var fileInput = $(this)[0];
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);

                    $('.preview-note').show();
                };
                reader.readAsDataURL(file);
            } else {
                $('.preview-note').hide();
            }
        });
    });

    function showLoading() {
        // Show loading gif
        $('#loadinggif').show();

        // Submit the form
        $('#profileForm').submit();
    }
</script>