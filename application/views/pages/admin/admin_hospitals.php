<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mt-2"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Hospitals</span></h5>
                </div>
                <div class="col-md-7 mb-4">
                    <form class="position-relative">
                        <input type="text" class="form-control shadow-none search-chat py-2 ps-5 rounded-2 shadow-none" id="text-srh" placeholder="Search hospital...">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="col-md-2 d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dynamicmodalAddHC"><i class="fas fa-plus"></i> Add Hospital</button>
                </div>
            </div>

            <div class="row" id="hospital">
                <?php foreach ($Hospitals as $perhospital) { ?>
                    <div class="col-md-4 mt-4">
                        <div class="card card-hover h-100">
                            <div class="card-body">
                            <?php if($perhospital->image == ""){ ?>
                                    <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                                <?php } else { ?>
                                    <img src="/mhs_micro/facilities/<?php print $perhospital->image ?>" class="rounded-3 border bg-light-subtle img-fluid" style="height: 200px" width="100%">
                                <?php } ?>
                                <!-- <div class="d-flex justify-content-center">
                                    <span class="badge bg-success rounded-1 mt-2 me-1 fs-3"><i class="fas fa-clock"></i> Open</span>
                                    <span class="badge bg-secondary rounded-1 mt-2 fs-3"><i class="fas fa-map-marked-alt"></i> Nearest <small class="fw-semibold">30km</small></span>
                                </div> -->

                                <h5 class="card-title mt-2"><?php print $perhospital->name ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                                    <?= $perhospital->address ?>
                                </h6>
                                <!-- <p class="card-text pt-2">
                                    <?= $perhospital->description ?>
                                </p> -->
                                <!-- <a href="#" class="card-link">Inquire</a>
                                    <a href="#" class="card-link">View profile</a> -->

                                <!-- <button type="button" class="btn btn-secondary btn-sm" id="viewHospital" data-bs-toggle="modal" data-bs-target="#dynamicmodalEdit" data-id="<?= $perhospital->id ?>"><i class="fas fa-edit"></i> Edit</button> -->
                            </div>
                            <div class="d-flex justify-content-between card-footer">
                                <span data-bs-toggle="modal" data-bs-target="#dynamicmodalupload" data-id="<?= $perhospital->id ?>"><i class="ti ti-upload fs-4 text-secondary bg-primary-subtle rounded-circle p-2"></i></span>
                                <a href="../admin/viewhospitaldetails?id=<?= $perhospital->id ?>" class="btn btn-success btn-sm">View <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <!-- Create Healthcenter Modal -->
    <div class="modal fade" id="dynamicmodalAddHC" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-home">
                    <h1 class="modal-title fs-4 text-light" id="exampleModalLabel">Add Hospital</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="hname" class="fw-bold">Hospital Name</label>
                                <div class="input-group">
                                    <input type="text" name="hname" id="hname" class="form-control shadow-none">
                                </div>
                                <div id="invalidHospital" class="invalid-feedback" style="display: none;"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="hdesc" class="fw-bold">Address</label>
                                <div class="input-group">
                                    <textarea rows="5" name="hadd" id="hadd" class="form-control shadow-none"></textarea>
                                </div>
                                <div id="invalidAddress" class="invalid-feedback" style="display: none;"></div>
                            </div>

                            <input type="hidden" name="hdesc" id="hdesc" class="form-control shadow-none" value="This is Hospital">

                            <div class="col-md-12">
                                <label for="hdesc" class="fw-bold">Set Profile Picture</label>
                                <input type="file" name="hprofile" id="hprofile" class="form-control shadow-none" accept="image/*">
                                <div id="invalidProfile" class="invalid-feedback" style="display: none;"></div>
                            </div>

                        </div>
                        <div id="loadinggif" class="modal1">
                        <div class="modal-content1">
                            <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="addhospital()">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Barangay Modal -->
    <div class="modal fade" id="dynamicmodalEdit" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitle">Loading Modal...</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalContent">

                </div>
                <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Upload Image Barangay Modal -->
<div class="modal fade" id="dynamicmodalupload" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Upload Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

                <label for="image">Upload Barangay Image</label>
                <input type="hidden" name="brgy_id" id="brgy_id">
                <div class="input-group">
                    <input type="file" class="form-control shadow-none" name="brgy_profile" id="brgy_profile" accept="image/*">
                </div>

                <div id="loadinggif" class="modal1">
                        <div class="modal-content1">
                            <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" onclick="upload(document.getElementById('brgy_id').value)"><i class="ti ti-upload"></i> Upload</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Listen for the modal's "show.bs.modal" event
        $('#dynamicmodalupload').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var ppreId = button.data('id'); 
            var modal = $(this);
            modal.find('.modal-body #brgy_id').val(ppreId);
        });
    });
</script>

<script>
    function upload(id){             
        var brgy_id = id;
        var brgy_profile = document.getElementById('brgy_profile');
        var brgy_profileFile = brgy_profile.files[0];

        var formData = new FormData();
        formData.append('brgy_id', brgy_id);
        formData.append('brgy_profileFile', brgy_profileFile);

        $.ajax({
            url: '../admin/uploadBarangayPro',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[type="button"]').prop('disabled', true);
                $('#dynamicmodalupload').modal('hide');
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
                        location.reload();
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Image upoaded successfully"
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchBarHospital = document.getElementById('text-srh');
            const hospitalContainer = document.getElementById('hospital').children;

            searchBarHospital.addEventListener('input', function() {
                const searchQuery = searchBarHospital.value.toLowerCase().trim();

                for (let i = 0; i < hospitalContainer.length; i++) {
                    const hospitalTitle = hospitalContainer[i].querySelector('.card-title').textContent.toLowerCase();
                    const hospitalSubtitle = hospitalContainer[i].querySelector('.card-subtitle').textContent.toLowerCase();

                    if (hospitalTitle.includes(searchQuery) || hospitalSubtitle.includes(searchQuery)) {
                        hospitalContainer[i].style.display = 'block';
                    } else {
                        hospitalContainer[i].style.display = 'none';
                    }
                }
            });
        });
    </script>

<script>
    function addhospital() {
        var hname = $('#hname').val();
        var hdesc = $('#hdesc').val();
        var hadd = $('#hadd').val();
        var hprofileInput = document.getElementById('hprofile');
        var hprofileFile = hprofileInput.files[0];

        // Check if any of the fields are blank
        if (!hname || !hadd || !hprofileFile) {
            if (!hname) {
                $('#invalidHospital').html('<i class="fas fa-exclamation-circle ms-2"></i> Hospital name is required.');
                $('#invalidHospital').show();
                $('#hname').addClass('is-invalid');
            } else {
                $('#invalidHospital').hide();
                $('#hname').removeClass('is-invalid');
            }

            if (!hadd) {
                $('#invalidAddress').html('<i class="fas fa-exclamation-circle ms-2"></i> Address is required.');
                $('#invalidAddress').show();
                $('#hadd').addClass('is-invalid');
            } else {
                $('#invalidAddress').hide();
                $('#hadd').removeClass('is-invalid');
            }

            if (!hprofileFile) {
                $('#invalidProfile').html('<i class="fas fa-exclamation-circle ms-2"></i> Profile image is required.');
                $('#invalidProfile').show();
                $('#bprofile').addClass('is-invalid');
            } else {
                $('#invalidProfile').hide();
                $('#bprofile').removeClass('is-invalid');
            }

            return;
        } else {
            $('#invalidHospital').hide();
            $('#hname').removeClass('is-invalid');
            $('#invalidAddress').hide();
            $('#hadd').removeClass('is-invalid');
            $('#invalidProfile').hide();
            $('#bprofile').removeClass('is-invalid');
        }

        function isBarangayAlreadyExists(name) {
            // Convert the list of barangays into an array of names
            const hospitalNames = <?php echo json_encode(array_column($Hospitals, 'name'), JSON_HEX_TAG); ?>;
            return hospitalNames.some(hospitalName => hospitalName.toLowerCase() === name.toLowerCase());
        }

        // Check if the entered barangay already exists
        if (isBarangayAlreadyExists(hname)) {
            $('#invalidHospital').html('<i class="fas fa-exclamation-circle ms-2"></i> Hospital already exists!');
            $('#invalidHospital').show();
            $('#hname').addClass('is-invalid');
            return;
        } else {
            $('#invalidHospital').hide();
            $('#hname').removeClass('is-invalid');
        }

        // Create FormData object and append data
        var formData = new FormData();
        formData.append('hname', hname);
        formData.append('hdesc', hdesc);
        formData.append('hadd', hadd);
        formData.append('hprofileFile', hprofileFile);

        $.ajax({
            url: '../admin/createHospital',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loadinggif').show();
            },
            success: function(response) {
                $('button[type="button"]').prop('disabled', true);
                $('#dynamicmodalAddHC').modal('hide');
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                    didClose: () => {
                        location.reload();
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Hospital added successfully"
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

    <script>
        $(document).on('click', '#viewHospital', function() {
            var hospital_id = $(this).data('id');
            //alert(hospital_id);

            $.ajax({
                url: '../admin/viewHospital?=' + hospital_id,
                method: 'GET',
                data: {
                    hospital_id: hospital_id,
                },
                success: function(data) {
                    $('#modalTitle').html('<div> <b>Edit Hospital</b> </div>');
                    $('#modalContent').html(data);
                    $('#dynamicmodalLC').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('Failed to Get Barangay Details!');
                }
            });
        });
    </script>