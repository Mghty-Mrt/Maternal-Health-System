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
                <div class="col-md-3">
                    <h5 class="card-title fw-bold text-uppercase fs-3 mt-2"> <i class="ti ti-layout-dashboard fs-3"></i> Dashboard / <span class="text-muted">Barangays</span></h5>
                </div>
                <div class="col-md-7 mb-4">
                    <form class="position-relative">
                        <input type="text" class="form-control search-chat py-2 ps-5 rounded-2 shadow-none" id="text-srh" placeholder="Search Barangay...">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="col-md-2 d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#dynamicmodalAddHC"><i class="fas fa-plus"></i> Add Barangay</button>
                </div>
            </div>

            <div class="row" id="brgys">
                <?php foreach ($Barangays as $perbrgy) { ?>
                    <div class="col-md-4 mt-4">
                        <div class="card card-hover h-100">
                            <div class="card-body">
                                <?php if($perbrgy->image == ""){ ?>
                                    <span class="rounded-3 img-fluid d-flex justify-content-center bg-light-subtle"><i class="far fa-image text-dark-subtle" style="height: 200px; font-size: 150px" width="100%"></i></span>
                                <?php } else { ?>
                                    <img src="/mhs_micro/facilities/<?php print $perbrgy->image ?>?t=<?= time(); ?>" class="rounded-3 border bg-light-subtle img-fluid" style="height: 200px" width="100%">
                                <?php } ?>
                                <div class="d-flex justify-content-center">
                                    <!-- <span class="badge bg-success rounded-1 mt-2 me-1 fs-3"><i class="fas fa-clock"></i> Open</span>
                                    <span class="badge bg-secondary rounded-1 mt-2 fs-3"><i class="fas fa-map-marked-alt"></i> Nearest <small class="fw-semibold">30km</small></span> -->
                                </div>

                                <h5 class="card-title mt-2 text-main"><?php print $perbrgy->name ?></h5>
                                <h6 class="card-subtitle text-muted d-flex align-items-center"><i class="ti ti-map-pin me-1 fs-5 text-danger"></i>
                                    <?= $perbrgy->address ?>
                                </h6>
                                <!-- <p class="card-text pt-2">
                                    <?= $perbrgy->description ?>
                                </p> -->
                                <!-- <a href="#" class="card-link">Inquire</a>
                                    <a href="#" class="card-link">View profile</a> -->

                                <!-- <button type="button" class="btn btn-secondary btn-sm" id="viewHospital" data-bs-toggle="modal" data-bs-target="#dynamicmodalEdit" data-id="<?= $perbrgy->id ?>"><i class="fas fa-edit"></i> Edit</button> -->
                            </div>
                            <div class="d-flex justify-content-between card-footer">
                                <span data-bs-toggle="modal" data-bs-target="#dynamicmodalupload" data-id="<?= $perbrgy->id ?>"><i class="ti ti-upload fs-4 text-secondary bg-primary-subtle rounded-circle p-2"></i></span>
                                <a href="../admin/viewbarangaydetails?id=<?= $perbrgy->id ?>" class="btn btn-success btn-sm">View <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

<!-- Add Barangay Modal -->
<div class="modal fade" id="dynamicmodalAddHC" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-home">
                <h1 class="modal-title fs-4 text-light" id="exampleModalLabel">Add Barangay</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="bname" class="fw-bold">Barangay Name</label>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control shadow-none" id="bname" name="bname" autocomplete="off">
                                <div class="suggestions" id="suggestions"></div>
                                <div id="invalidBarangay" class="invalid-feedback" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="bdesc">Address</label>
                            <div class="input-group">
                                <textarea rows="5" name="badd" id="badd" class="form-control shadow-none"></textarea>
                            </div>
                            <div id="invalidAddress" class="invalid-feedback" style="display: none;"></div>
                        </div>
                        <input type="hidden" name="bdesc" id="bdesc" class="form-control shadow-none" value="Brgy Descriptions">

                        <div class="col-md-12">
                            <label for="bdesc">Set Profile Picture</label>
                            <input type="file" name="bprofile" id="bprofile" class="form-control shadow-none" accept="image/*">
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
                <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                <button type="button" onclick="addbrgy()" class="btn btn-primary">Add</button>
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
        const brgysContainer = document.getElementById('brgys').children;

        searchBarangay.addEventListener('input', function() {
            const searchQuery = searchBarangay.value.toLowerCase().trim();

            for (let i = 0; i < brgysContainer.length; i++) {
                const brgyName = brgysContainer[i].querySelector('.card-title').textContent.toLowerCase();

                if (brgyName.includes(searchQuery)) {
                    brgysContainer[i].style.display = 'block';
                } else {
                    brgysContainer[i].style.display = 'none';
                }
            }
        });
    });
</script>


<script>
    // Array of barangays with names and addresses
    const barangays = [
        <?php foreach ($list as $dlist) { ?> {
                name: '<?= $dlist->name ?>',
                address: '<?= $dlist->address ?>'
            },
        <?php } ?>
    ];

    // Get the input element and suggestion box
    const input = document.getElementById('bname');
    const suggestionsContainer = document.getElementById('suggestions');
    const addressInput = document.getElementById('badd');

    // Function to show suggestions based on input value
    function showSuggestions() {
        const value = input.value.toLowerCase(); // Get lowercase input value
        suggestionsContainer.innerHTML = ''; // Clear previous suggestions

        // Filter barangays based on input value
        const filteredBarangays = barangays.filter(barangay =>
            barangay.name.toLowerCase().includes(value)
        );

        // Create suggestion items and append to suggestion box
        filteredBarangays.forEach(barangay => {
            const suggestion = document.createElement('div');
            suggestion.textContent = barangay.name;
            suggestion.classList.add('suggestion-item');
            suggestion.addEventListener('click', () => {
                input.value = barangay.name; // Set input value to clicked suggestion
                addressInput.value = barangay.address; // Set address value based on barangay name
                suggestionsContainer.style.display = 'none'; // Hide suggestion box
            });
            suggestionsContainer.appendChild(suggestion);
        });

        // Show suggestion box if there are suggestions, otherwise hide it
        if (filteredBarangays.length > 0) {
            suggestionsContainer.style.display = 'block';
        } else {
            suggestionsContainer.style.display = 'none';
        }
    }

    // Listen for input events and call showSuggestions function
    input.addEventListener('input', showSuggestions);

    // Close suggestion box when clicking outside of it
    document.addEventListener('click', (event) => {
        if (!event.target.matches('#bname')) {
            suggestionsContainer.style.display = 'none';
        }
    });
</script>

<script>
    function addbrgy() {
        var bname = $('#bname').val();
        var bdesc = $('#bdesc').val();
        var badd = $('#badd').val();
        var bprofileInput = document.getElementById('bprofile');
        var bprofileFile = bprofileInput.files[0];

        // Check if any of the fields are blank
        if (!bname || !badd || !bprofileFile) {
            if (!bname) {
                $('#invalidBarangay').html('<i class="fas fa-exclamation-circle ms-2"></i> Barangay name cannot be blank.');
                $('#invalidBarangay').show();
                $('#bname').addClass('is-invalid');
            } else {
                $('#invalidBarangay').hide();
                $('#bname').removeClass('is-invalid');
            }

            if (!badd) {
                $('#invalidAddress').html('<i class="fas fa-exclamation-circle ms-2"></i> Address cannot be blank.');
                $('#invalidAddress').show();
                $('#badd').addClass('is-invalid');
            } else {
                $('#invalidAddress').hide();
                $('#badd').removeClass('is-invalid');
            }

            if (!bprofileFile) {
                $('#invalidProfile').html('<i class="fas fa-exclamation-circle ms-2"></i> Profile image cannot be blank.');
                $('#invalidProfile').show();
                $('#bprofile').addClass('is-invalid');
            } else {
                $('#invalidProfile').hide();
                $('#bprofile').removeClass('is-invalid');
            }

            return;
        } else {
            $('#invalidBarangay').hide();
            $('#bname').removeClass('is-invalid');
            $('#invalidAddress').hide();
            $('#badd').removeClass('is-invalid');
            $('#invalidProfile').hide();
            $('#bprofile').removeClass('is-invalid');
        }

        function isBarangayAlreadyExists(name) {
            // Convert the list of barangays into an array of names
            const barangayNames = <?php echo json_encode(array_column($Barangays, 'name'), JSON_HEX_TAG); ?>;
            return barangayNames.some(barangayName => barangayName.toLowerCase() === name.toLowerCase());
        }

        // Check if the entered barangay already exists
        if (isBarangayAlreadyExists(bname)) {
            $('#invalidBarangay').html('<i class="fas fa-exclamation-circle ms-2"></i> Barangay already exists!');
            $('#invalidBarangay').show();
            $('#bname').addClass('is-invalid');
            return;
        } else {
            $('#invalidBarangay').hide();
            $('#bname').removeClass('is-invalid');
        }

        // Check if the entered name is in the suggestion list
        const isValidName = barangays.some(barangay => barangay.name.toLowerCase() === bname.toLowerCase());

        if (!isValidName) {
            $('#invalidBarangay').html('<i class="fas fa-exclamation-circle ms-2"></i> Invalid barangay! Please select a barangay from the suggestions.');
            $('#invalidBarangay').show();
            $('#bname').addClass('is-invalid');
            return;
        } else {
            $('#invalidBarangay').hide();
        }

        // Create FormData object and append data
        var formData = new FormData();
        formData.append('bname', bname);
        formData.append('bdesc', bdesc);
        formData.append('badd', badd);
        formData.append('bprofileFile', bprofileFile);

        $.ajax({
            url: '../admin/createBarangay',
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
                    timer: 2000,
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
                    title: "Barangay added successfully"
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
    $(document).on('click', '#viewBrgy', function() {
        var brgy_id = $(this).data('id');
        //alert(brgy_id);

        $.ajax({
            url: '../admin/viewBarangay?=' + brgy_id,
            method: 'GET',
            data: {
                brgy_id: brgy_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div> <b>Edit Barangay</b> </div>');
                $('#modalContent').html(data);
                $('#dynamicmodalLC').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get Barangay Details!');
            }
        });
    });
</script>
