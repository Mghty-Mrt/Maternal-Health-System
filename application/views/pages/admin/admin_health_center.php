<style>
    /* Style for suggestion box */
    .suggestions {
        display: none;
        position: absolute;
        background-color: #f8f9fa;
        border: 1px solid #f8f9fa;
        border-radius: 5px;
        max-height: 150px;
        overflow-y: auto;
        z-index: 1;
        width: 94%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .suggestion-item {
        padding: 10px;
        cursor: pointer;
    }

    .suggestion-item:hover {
        background-color: rgb(17, 82, 114, 1);
        color: white;
    }
</style>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mt-2"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Health Centers</span></h5>
                </div>
                <div class="col-md-6 mb-4">
                    <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5 rounded-2 shadow-none" id="text-srh" placeholder="Search Health Center...">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="col-md-2 d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dynamicmodalAddHC"><i class="fas fa-plus"></i> Add Health Center</button>
                </div>
            </div>

            <div class="row" id="hc">
                <?php foreach ($HealthCenters as $perhc) { ?>
                    <div class="col-md-4 mt-4">
                        <div class="card card-hover h-100">
                            <div class="card-body">
                                <?php if ($perhc->image == "") { ?>
                                    <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                                <?php } else { ?>
                                    <img src="/mhs_micro/facilities/<?php print $perhc->image ?>" class="rounded-3 border bg-light-subtle" style="height: 200px" width="100%">
                                <?php } ?>
                                <!-- <div class="d-flex justify-content-center"> -->
                                    <!-- <span class="badge bg-success rounded-1 mt-2 me-1 fs-3"><i class="fas fa-clock"></i> Open</span>
                                    <span class="badge bg-secondary rounded-1 mt-2 fs-3"><i class="fas fa-map-marked-alt"></i> Nearest <small class="fw-semibold">30km</small></span> -->
                                <!-- </div> -->

                                <h5 class="card-title mt-2 text-main"><?php print $perhc->name ?></h5>
                                <h6 class="card-subtitle text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                                    <?= $perhc->address ?>
                                </h6>
                                <!-- <p class="card-text pt-2">
                                </p> -->
                                <!-- <a href="#" class="card-link">Inquire</a>
                                    <a href="#" class="card-link">View profile</a> -->

                                <!-- <button type="button" class="btn btn-secondary btn-sm" id="viewHospital" data-bs-toggle="modal" data-bs-target="#dynamicmodalEdit" data-id="<?= $perbrgy->id ?>"><i class="fas fa-edit"></i> Edit</button> -->
                            </div>
                            <div class="d-flex justify-content-between card-footer">
                                <span data-bs-toggle="modal" data-bs-target="#dynamicmodalupload" data-id="<?= $perhc->id ?>"><i class="ti ti-upload fs-4 text-secondary bg-primary-subtle rounded-circle p-2"></i></span>
                                <a href="../admin/viewhcdetails?id=<?= $perhc->id ?>" class="btn btn-success btn-sm">View <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

<!-- Create Healthcenter Modal -->
<div class="modal fade" id="dynamicmodalAddHC" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="exampleModalLabel">Add New Health Center</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="hcname" class="fw-bold">Health Center Name</label>
                            <div class="form-group mb-3">
                                <input type="text" name="hcname" id="hcname" class="form-control shadow-none" autocomplete="off" required>
                                <div class="suggestions" id="hcsuggestions"></div>
                                <div id="invalidHc" class="invalid-feedback" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="hcdesc" class="fw-bold">Address</label>
                            <div class="input-group mb-3">
                                <textarea rows="5" name="hcadd" id="hcadd" class="form-control shadow-none" required></textarea>
                                <div id="invalidAddress" class="invalid-feedback" style="display: none;"></div>
                            </div>
                        </div>
                        <input type="hidden" name="hcdesc" id="hcdesc" value="Health Center Descriptions">

                        <div class="col-md-12">
                            <label for="bdesc">Set Profile Picture</label>
                            <input type="file" name="hcprofile" id="hcprofile" class="form-control shadow-none" accept="image/*">
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
                <button type="button" onclick="addhc()" class="btn btn-primary">Add</button>
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
        const searchBarangay = document.getElementById('text-srh');
        const hcContainer = document.getElementById('hc').children;

        searchBarangay.addEventListener('input', function() {
            const searchQuery = searchBarangay.value.toLowerCase().trim();

            for (let i = 0; i < hcContainer.length; i++) {
                const hcTitle = hcContainer[i].querySelector('.card-title').textContent.toLowerCase();
                const hcSubtitle = hcContainer[i].querySelector('.card-subtitle').textContent.toLowerCase();

                if (hcTitle.includes(searchQuery) || hcSubtitle.includes(searchQuery)) {
                    hcContainer[i].style.display = 'block';
                } else {
                    hcContainer[i].style.display = 'none';
                }
            }
        });
    });
</script>

<script>
    // Array of healthcenters with names and addresses
    const healthcenter = [
        <?php foreach ($hclist as $dlist) { ?> {
                name: '<?= $dlist->name ?>',
                address: '<?= $dlist->address ?>'
            },
        <?php } ?>
    ];

    // Get the input element and suggestion box
    const input = document.getElementById('hcname');
    const suggestionsContainer = document.getElementById('hcsuggestions');
    const addressInput = document.getElementById('hcadd');

    // Function to show suggestions based on input value
    function showSuggestions() {
        const value = input.value.toLowerCase(); // Get lowercase input value
        suggestionsContainer.innerHTML = ''; // Clear previous suggestions

        // Filter healthcenters based on input value
        const filteredHealthcenters = healthcenter.filter(healthcenter =>
            healthcenter.name.toLowerCase().includes(value)
        );

        // Create suggestion items and append to suggestion box
        filteredHealthcenters.forEach(healthcenter => {
            const suggestion = document.createElement('div');
            suggestion.textContent = healthcenter.name;
            suggestion.classList.add('suggestion-item');
            suggestion.addEventListener('click', () => {
                input.value = healthcenter.name; // Set input value to clicked suggestion
                addressInput.value = healthcenter.address; // Set address value based on healthcenter name
                suggestionsContainer.style.display = 'none'; // Hide suggestion box
            });
            suggestionsContainer.appendChild(suggestion);
        });

        // Show suggestion box if there are suggestions, otherwise hide it
        if (filteredHealthcenters.length > 0) {
            suggestionsContainer.style.display = 'block';
        } else {
            suggestionsContainer.style.display = 'none';
        }
    }

    // Listen for input events and call showSuggestions function
    input.addEventListener('input', showSuggestions);

    // Close suggestion box when clicking outside of it
    document.addEventListener('click', (event) => {
        if (!event.target.matches('#hcname')) {
            suggestionsContainer.style.display = 'none';
        }
    });
</script>

<script>
    function addhc() {
        var hcname = $('#hcname').val();
        var hcdesc = $('#hcdesc').val();
        var hcadd = $('#hcadd').val();
        var hcprofileInput = document.getElementById('hcprofile');
        var hcprofileFile = hcprofileInput.files[0];

        // Check if any of the fields are blank
        if (!hcname || !hcadd || !hcprofileFile) {
            if (!hcname) {
                $('#invalidHc').html('<i class="fas fa-exclamation-circle ms-2"></i> Health center name required.');
                $('#invalidHc').show();
                $('#hcname').addClass('is-invalid');
            } else {
                $('#invalidBarangay').hide();
                $('#hcname').removeClass('is-invalid');
            }

            if (!hcadd) {
                $('#invalidAddress').html('<i class="fas fa-exclamation-circle ms-2"></i> Address required.');
                $('#invalidAddress').show();
                $('#hcadd').addClass('is-invalid');
            } else {
                $('#invalidAddress').hide();
                $('#hcadd').removeClass('is-invalid');
            }

            if (!hcprofileFile) {
                $('#invalidProfile').html('<i class="fas fa-exclamation-circle ms-2"></i> Profile image required.');
                $('#invalidProfile').show();
                $('#hcprofile').addClass('is-invalid');
            } else {
                $('#invalidProfile').hide();
                $('#hcprofile').removeClass('is-invalid');
            }

            return;
        } else {
            $('#invalidHc').hide();
            $('#hcname').removeClass('is-invalid');
            $('#invalidAddress').hide();
            $('#hcadd').removeClass('is-invalid');
            $('#invalidProfile').hide();
            $('#hcprofile').removeClass('is-invalid');
        }

        function ishcAlreadyExists(name) {
            // Convert the list of barangays into an array of names
            const hcNames = <?php echo json_encode(array_column($HealthCenters, 'name'), JSON_HEX_TAG); ?>;
            return hcNames.some(hcNames => hcNames.toLowerCase() === name.toLowerCase());
        }

        // Check if the entered barangay already exists
        if (ishcAlreadyExists(hcname)) {
            $('#invalidHc').html('<i class="fas fa-exclamation-circle ms-2"></i> Health Center already exists!');
            $('#invalidHc').show();
            $('#hcname').addClass('is-invalid');
            return;
        } else {
            $('#invalidHc').hide();
            $('#hcname').removeClass('is-invalid');
        }

        // Check if the entered name is in the suggestion list
        const isValidName = healthcenter.some(healthcenter => healthcenter.name.toLowerCase() === hcname.toLowerCase());

        if (!isValidName) {
            $('#invalidHc').html('<i class="fas fa-exclamation-circle ms-2"></i> Invalid health center! Please select a health center from the suggestions.');
            $('#invalidHc').show();
            $('#hcname').addClass('is-invalid');
            return;
        } else {
            $('#invalidHc').hide();
        }

        // Create FormData object and append data
        var formData = new FormData();
        formData.append('hcname', hcname);
        formData.append('hcdesc', hcdesc);
        formData.append('hcadd', hcadd);
        formData.append('hcprofileFile', hcprofileFile);

        $.ajax({
            url: '../admin/createHealthCenter',
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
                    title: "Health Center added successfully"
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
    $(document).on('click', '#viewHC', function() {
        var hc_id = $(this).data('id');
        //alert(hc_id);

        $.ajax({
            url: '../admin/viewHealthCenter?=' + hc_id,
            method: 'GET',
            data: {
                hc_id: hc_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div> <b>Edit Health Center</b> </div>');
                $('#modalContent').html(data);
                $('#dynamicmodalLC').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get Barangay Details!');
            }
        });
    });
</script>