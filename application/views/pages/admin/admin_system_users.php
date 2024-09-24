<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title fw-bold text-uppercase fs-4 mb-4"> <i class="ti ti-layout-dashboard fs-3"></i> </i> Dashboard / <span class="text-muted">System Users</span></h5>
                <!-- <a href="../admin/systemusers" class="btn btn-danger btn-sm"><i class="ti ti-arrow-back-up fw-semibold"></i> Back</a> -->
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#home5" role="tab" aria-controls="home5" aria-expanded="true" aria-selected="false" tabindex="-1">
                        <span><i class="fas fa-hospital"></i> Health Center Users</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile5" role="tab" aria-controls="profile" aria-selected="true">
                        <span><i class="fas fa-hospital-alt"></i> Hospital Users</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="lying-tab" data-bs-toggle="tab" href="#lying" role="tab" aria-controls="lying" aria-selected="true">
                        <span><i class="fas fa-hospital-alt"></i> Lying-in Users</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="brgy-tab" data-bs-toggle="tab" href="#brgy" role="tab" aria-controls="brgy" aria-selected="true">
                        <span><i class="fas fa-building"></i> Barangay Users</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="arc-tab" data-bs-toggle="tab" href="#arc" role="tab" aria-controls="arc" aria-selected="true">
                        <span><i class="ti ti-archive"></i> Archived Users</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content tabcontent-border p-3" id="myTabContent">
                <div role="tabpanel" class="tab-pane fade" id="home5" aria-labelledby="home-tab">
                    <p>
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-main fs-3 mb-4">System User / <span class="text-muted">Health Center Users</span></h5>
                        <button type="button" class="btn btn-primary btn-sm mb-4" id="btnCreateHC" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate"><i class="fas fa-plus"></i> Add User</button>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                            <strong><i class="fas fa-check-circle"></i> Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="failedAlert">
                            <strong><i class="fas fa-times-circle"></i> Failed!</strong> <?php echo $this->session->flashdata('failed'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="systemuser" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">User ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Health Center</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Date Created</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <?php foreach ($systemUsers as $persu) { ?>
                                    <tr id="tr">
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?php print $persu->suid ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><?php print $persu->firstname ?> <?php print $persu->middlename ?> <?php print $persu->lastname ?> </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $persu->rname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $persu->fname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print date('F j, Y / g:i a', strtotime($persu->sudate)) ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="badge rounded-4 fs-2 fw-bold bg-primary-subtle text-primary">Active</span>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                    <i class="ti ti-dots fs-5"></i>
                                                </span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-secondary" id="btnView" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $persu->suid ?>"><i class="fs-4 ti ti-eye"></i>View</button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-success" id="btnEdit" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $persu->suid ?>"><i class="fs-4 ti ti-edit"></i>Edit </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-danger btnArchive" data-bs-toggle="modal" data-bs-target="#dynamicmodalArchive" data-id="<?= $persu->suid ?>"><i class="fs-4 ti ti-archive"></i>Archive</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </p>
                </div>

                <div class="tab-pane fade" id="profile5" role="tabpanel" aria-labelledby="profile-tab">
                    <p>
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-main fs-3 mb-4">System User / <span class="text-muted">Hospital Users</span></h5>
                        <button type="button" class="btn btn-primary btn-sm mb-4" id="btnCreateH" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate"><i class="fas fa-plus"></i> Add User</button>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                            <strong><i class="fas fa-check-circle"></i> Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="failedAlert">
                            <strong><i class="fas fa-times-circle"></i> Failed!</strong> <?php echo $this->session->flashdata('failed'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="hospitalsystemuser" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">User ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Hospital</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Date Created</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="hospital_tbl_content">
                                <?php foreach ($hospitalSystemUsers as $perh) { ?>
                                    <tr id="tr">
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?php print $perh->suid ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><?php print $perh->firstname ?> <?php print $perh->middlename ?> <?php print $perh->lastname ?> </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perh->rname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perh->fname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print date('M j, Y / g:i a', strtotime($perh->sudate)) ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="badge rounded-4 fs-2 fw-bold bg-primary-subtle text-primary">Active</span>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                    <i class="ti ti-dots fs-5"></i>
                                                </span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-secondary" id="btnViewH" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $perh->suid ?>"><i class="fs-4 ti ti-eye"></i>View</button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-success" id="btnEditH" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $perh->suid ?>"><i class="fs-4 ti ti-edit"></i>Edit </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-danger btnArchiveH" data-bs-toggle="modal" data-bs-target="#dynamicmodalArchive" data-id="<?= $perh->suid ?>"><i class="fs-4 ti ti-archive"></i>Archive</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </p>
                </div>

                <div class="tab-pane fade" id="lying" role="tabpanel" aria-labelledby="lying-tab">
                    <p>
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-main fs-3 mb-4">System User / <span class="text-muted">Lying-in Users</span></h5>
                        <button type="button" class="btn btn-primary btn-sm mb-4" id="btnCreateLy" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate"><i class="fas fa-plus"></i> Add User</button>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                            <strong><i class="fas fa-check-circle"></i> Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="failedAlert">
                            <strong><i class="fas fa-times-circle"></i> Failed!</strong> <?php echo $this->session->flashdata('failed'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="lying-in" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">User ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Lying-in</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Date Created</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="hospital_tbl_content">
                                <?php foreach ($Lying_inSystemUsers as $perh) { ?>
                                    <tr id="tr">
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?php print $perh->suid ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><?php print $perh->firstname ?> <?php print $perh->middlename ?> <?php print $perh->lastname ?> </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perh->rname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perh->fname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print date('M j, Y / g:i a', strtotime($perh->sudate)) ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="badge rounded-4 fs-2 fw-bold bg-primary-subtle text-primary">Active</span>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                    <i class="ti ti-dots fs-5"></i>
                                                </span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-secondary" id="btnViewLy" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $perh->suid ?>"><i class="fs-4 ti ti-eye"></i>View</button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-success" id="btnEditLy" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $perh->suid ?>"><i class="fs-4 ti ti-edit"></i>Edit </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-danger btnArchiveLy" data-bs-toggle="modal" data-bs-target="#dynamicmodalArchive" data-id="<?= $perh->suid ?>"><i class="fs-4 ti ti-archive"></i>Archive</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </p>
                </div>

                <div class="tab-pane fade" id="brgy" role="tabpanel" aria-labelledby="brgy-tab">
                    <p>
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-main fs-3 mb-4">System User / <span class="text-muted">Barangay Users</span></h5>
                        <button type="button" class="btn btn-primary btn-sm mb-4" id="btnCreateBrgy" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate"><i class="fas fa-plus"></i> Add User</button>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                            <strong><i class="fas fa-check-circle"></i> Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="failedAlert">
                            <strong><i class="fas fa-times-circle"></i> Failed!</strong> <?php echo $this->session->flashdata('failed'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="brgystemuser" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">User ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Barangay</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Date Created</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <?php foreach ($barangaySystemUsers as $perbrgy) { ?>
                                    <tr id="tr">
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?php print $perbrgy->suid ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><?php print $perbrgy->firstname ?> <?php print $perbrgy->middlename ?> <?php print $perbrgy->lastname ?> </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perbrgy->rname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perbrgy->fname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print date('F j, Y / g:i a', strtotime($perbrgy->sudate)) ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="badge rounded-4 fs-2 fw-bold bg-primary-subtle text-primary">Active</span>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                    <i class="ti ti-dots fs-5"></i>
                                                </span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-secondary" id="btnViewBrgy" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $perbrgy->suid ?>"><i class="fs-4 ti ti-eye"></i>View</button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-success" id="btnEditBrgy" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate" data-id="<?= $perbrgy->suid ?>"><i class="fs-4 ti ti-edit"></i>Edit </button>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-danger btnArchiveBrgy" data-bs-toggle="modal" data-bs-target="#dynamicmodalArchive" data-id="<?= $perbrgy->suid ?>"><i class="fs-4 ti ti-archive"></i>Archive</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </p>
                </div>

                <div class="tab-pane fade" id="arc" role="tabpanel" aria-labelledby="arc-tab">
                    <p>
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title text-main fs-3 mb-4">System User / <span class="text-muted">Archived Users</span></h5>
                        <button type="button" class="btn btn-success btn-sm mb-4" id="btnCreateBrgy" data-bs-toggle="modal" data-bs-target="#dynamicmodalCreate"><i class="ti ti-download"></i> Excel</button>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                            <strong><i class="fas fa-check-circle"></i> Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif ($this->session->flashdata('failed')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="failedAlert">
                            <strong><i class="fas fa-times-circle"></i> Failed!</strong> <?php echo $this->session->flashdata('failed'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap mb-2 align-middle text-center" id="arcsystemuser" data-order='[[0,"desc"]]'>
                            <thead class="text-dark fs-3 bg-home">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">User ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Name</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Role</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Facility</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Date Archived</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold text-light mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <?php foreach ($archivedUsers as $perarcUser) { ?>
                                    <tr id="tr">
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0"><?php print $perarcUser->suid ?></h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal"><?php print $perarcUser->firstname ?> <?php print $perarcUser->middlename ?> <?php print $perarcUser->lastname ?> </p>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perarcUser->rname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print $perarcUser->fname ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class=""><?php print date('F j, Y / g:i a', strtotime($perbrgy->sudate)) ?></span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <span class="badge rounded-4 fs-2 fw-bold bg-danger-subtle text-danger">Inactive</span>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <span class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                                    <i class="ti ti-dots fs-5"></i>
                                                </span>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="left-start">
                                                    <li>
                                                        <button class="dropdown-item d-flex align-items-center gap-3 text-warning btnRestore" data-bs-toggle="modal" data-bs-target="#dynamicmodalArchive" data-id="<?= $perarcUser->suid ?>"> <i class="fs-4 ti ti-refresh"></i>Restore</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="dynamicmodalCreate" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">Loading Modal...</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContent">

                <div id="loadinggif" class="modal1">
                    <div class="modal-content1">
                        <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
                    </div>
                </div>

            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
            </div> -->
        </div>
    </div>
</div>

<!-- archive modal -->
<div class="modal fade" id="dynamicmodalArchive" tabindex="-1" aria-labelledby="dynamicmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content bg-home" id="modalContentArc">
            <div class="modal-header">
            </div>
            <div class="modal-body" id="modalContentArc">

                <div id="loadinggif" class="modal1">
                    <div class="modal-content1">
                        <img src="../assets/images/loading/toogle2.gif" style="height: 50%; width: 50%" alt="Loading...">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Check if there's a stored active tab
        var activeTab = sessionStorage.getItem('activeTab');

        // If there's an activeTab stored, set it as the active tab
        if (activeTab) {
            $('#myTab a[href="#' + activeTab + '"]').tab('show');
        }

        // Store the active tab when a new tab is shown
        $('#myTab a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            var activeTabId = $(e.target).attr('href').substr(1); // Get the tab's ID
            sessionStorage.setItem('activeTab', activeTabId); // Store the active tab ID
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Find and hide the alerts after 2 seconds
        setTimeout(function() {
            $('#successAlert, #failedAlert').fadeOut('slow');
        }, 2000);
    });
</script>

<script>
    $(document).ready(function() {
        $('#systemuser').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#hospitalsystemuser').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#lying-in').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#brgystemuser').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#arcsystemuser').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#btnCreateHC').click(function() {
            $.ajax({
                url: '../admin/createhcuser',
                method: 'POST',
                beforeSend: function() {
                    $('#loadinggif').show();
                },
                success: function(data) {
                    $('#modalTitle').html('<div><i class="fas fa-hospital"></i> Add New Health Center User</div>');
                    $('#modalContent').html(data);
                    // $('#dynamicmodalCreate').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading create form:', status, error);
                    $('#modalContent').html('<div class="text-danger">Error loading data!</div>');
                },
                complete: function() {
                    $('#loadinggif').hide();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#btnCreateH').click(function() {
            $.ajax({
                url: '../admin/createhuser',
                method: 'POST',
                success: function(data) {
                    $('#modalTitle').html('<div><i class="fas fa-hospital-alt"></i> Add New Hospital User</div>');
                    $('#modalContent').html(data);
                    // $('#dynamicmodalCreate').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading create form:', status, error);
                    $('#modalContent').html('<div class="text-danger">Error loading data!</div>');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#btnCreateLy').click(function() {
            $.ajax({
                url: '../admin/createlyuser',
                method: 'POST',
                success: function(data) {
                    $('#modalTitle').html('<div><i class="fas fa-hospital-alt"></i> Add New Lying-in User</div>');
                    $('#modalContent').html(data);
                    // $('#dynamicmodalCreate').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading create form:', status, error);
                    $('#modalContent').html('<div class="text-danger">Error loading data!</div>');
                }
            });
        });
    });
</script>

<script>
    $(document).on('click', '#btnViewLy', function() {
        var h_user_id = $(this).data('id');
        //alert(hc_user_id);

        $.ajax({
            url: '../admin/viewLyuser?=' + h_user_id,
            method: 'GET',
            data: {
                h_user_id: h_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div class=""> <i class="fas fa-info-circle fs-6"></i> Lying-in User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).on('click', '#btnEditLy', function() {
        var h_user_id = $(this).data('id');
        //alert(h_user_id);

        $.ajax({
            url: '../admin/editLyuser?=' + h_user_id,
            method: 'GET',
            data: {
                h_user_id: h_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div> <i class="fas fa-edit"></i> Edit Lying-in User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var archive_id = null;

        $('.btnArchiveLy').click(function(e) {
            archive_id = $(this).data('id');
            //alert(archive_id);

            $('#modalContentArc').html('<span class="d-flex justify-content-center mb-2 pt-5"><i class="fas fa-exclamation-triangle text-warning" style="font-size: 55px;"></i></span>' +
                '<p class="text-center text-light fs-5"><strong class="text-warning">Warning!</strong> Are you sure you want to <br> Archive this User?</p>' +
                '<div class="modal-footer d-flex justify-content-center mb-3">' +
                '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> No</button>' +
                '<button type="button" class="btn btn-danger" id="confirmArchiveBtn"><i class="fas fa-check"></i> Yes</button>' +
                '</div>');
            $('#dynamicmodalArchive').modal('show');
        });

        $(document).on('click', '#confirmArchiveBtn', function() {

            $.ajax({
                type: 'POST',
                url: '../admin/archivehLy',
                data: {
                    id: archive_id
                },
                success: function(response) {
                    console.log('Archive success:', response);
                    window.location.href = '../admin/systemusers';
                    // $('#tr').html(response);
                    //$('#dynamicmodalArchive').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('Archive error:', error);

                }
            });

            $('#dynamicmodalArchive').modal('hide');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#btnCreateBrgy').click(function() {
            $.ajax({
                url: '../admin/createBrgyuser',
                method: 'POST',
                success: function(data) {
                    $('#modalTitle').html('<div><i class="fas fa-building"></i> Add New Barangay User</div>');
                    $('#modalContent').html(data);
                    // $('#dynamicmodalCreate').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading create form:', status, error);
                    $('#modalContent').html('<div class="text-danger">Error loading data!</div>');
                }
            });
        });
    });
</script>

<script>
    $(document).on('click', '#btnView', function() {
        var hc_user_id = $(this).data('id');
        //alert(hc_user_id);

        $.ajax({
            url: '../admin/viewhcuser?=' + hc_user_id,
            method: 'GET',
            data: {
                hc_user_id: hc_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div class=""> <i class="fas fa-info-circle fs-6"></i> Health Center User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).on('click', '#btnEdit', function() {
        var hc_user_id = $(this).data('id');
        //alert(hc_user_id);

        $.ajax({
            url: '../admin/edithcuser?=' + hc_user_id,
            method: 'GET',
            data: {
                hc_user_id: hc_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div> <i class="fas fa-edit"></i> Edit Health Center User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var archive_id = null;

        $('.btnArchive').click(function(e) {
            archive_id = $(this).data('id');
            //alert(archive_id);

            $('#modalContentArc').html('<span class="d-flex justify-content-center mb-2 pt-5"><i class="fas fa-exclamation-triangle text-warning" style="font-size: 55px;"></i></span>' +
                '<p class="text-center text-light fs-5"><strong class="text-warning">Warning!</strong> Are you sure you want to <br> Archive this User?</p>' +
                '<div class="modal-footer d-flex justify-content-center mb-3">' +
                '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> No</button>' +
                '<button type="button" class="btn btn-danger" id="confirmArchiveBtn"><i class="fas fa-check"></i> Yes</button>' +
                '</div>');
            $('#dynamicmodalArchive').modal('show');
        });

        $(document).on('click', '#confirmArchiveBtn', function() {

            $.ajax({
                type: 'POST',
                url: '../admin/archivehcsu',
                data: {
                    id: archive_id
                },
                success: function(response) {
                    console.log('Archive success:', response);
                    window.location.href = '../admin/systemusers';
                    // $('#tr').html(response);
                    //$('#dynamicmodalArchive').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('Archive error:', error);

                }
            });

            $('#dynamicmodalArchive').modal('hide');
        });
    });
</script>

<!-- hospital part -->
<script>
    $(document).on('click', '#btnViewH', function() {
        var h_user_id = $(this).data('id');
        //alert(hc_user_id);

        $.ajax({
            url: '../admin/viewhuser?=' + h_user_id,
            method: 'GET',
            data: {
                h_user_id: h_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div class=""> <i class="fas fa-info-circle fs-6"></i> Hospital User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).on('click', '#btnEditH', function() {
        var h_user_id = $(this).data('id');
        //alert(h_user_id);

        $.ajax({
            url: '../admin/edithuser?=' + h_user_id,
            method: 'GET',
            data: {
                h_user_id: h_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div> <i class="fas fa-edit"></i> Edit Hospital User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var archive_id = null;

        $('.btnArchiveH').click(function(e) {
            archive_id = $(this).data('id');
            //alert(archive_id);

            $('#modalContentArc').html('<span class="d-flex justify-content-center mb-2 pt-5"><i class="fas fa-exclamation-triangle text-warning" style="font-size: 55px;"></i></span>' +
                '<p class="text-center text-light fs-5"><strong class="text-warning">Warning!</strong> Are you sure you want to <br> Archive this User?</p>' +
                '<div class="modal-footer d-flex justify-content-center mb-3">' +
                '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> No</button>' +
                '<button type="button" class="btn btn-danger" id="confirmArchiveBtn"><i class="fas fa-check"></i> Yes</button>' +
                '</div>');
            $('#dynamicmodalArchive').modal('show');
        });

        $(document).on('click', '#confirmArchiveBtn', function() {

            $.ajax({
                type: 'POST',
                url: '../admin/archivehsu',
                data: {
                    id: archive_id
                },
                success: function(response) {
                    console.log('Archive success:', response);
                    window.location.href = '../admin/systemusers';
                    // $('#tr').html(response);
                    //$('#dynamicmodalArchive').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('Archive error:', error);

                }
            });

            $('#dynamicmodalArchive').modal('hide');
        });
    });
</script>

<!-- Barangay users script -->
<script>
    $(document).on('click', '#btnViewBrgy', function() {
        var brgy_user_id = $(this).data('id');
        //alert(brgy_user_id);

        $.ajax({
            url: '../admin/viewBrgyuser?=' + brgy_user_id,
            method: 'GET',
            data: {
                brgy_user_id: brgy_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div class=""> <i class="fas fa-info-circle fs-6"></i> Barangay User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).on('click', '#btnEditBrgy', function() {
        var brgy_user_id = $(this).data('id');
        //alert(brgy_user_id);

        $.ajax({
            url: '../admin/editbrgyuser?=' + brgy_user_id,
            method: 'GET',
            data: {
                brgy_user_id: brgy_user_id,
            },
            success: function(data) {
                $('#modalTitle').html('<div> <i class="fas fa-edit"></i> Edit Barangay User </div>');
                $('#modalContent').html(data);
                // $('#dynamicmodalView').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Failed to Get User Details!');
                //$('#modalContent').html('<div class="text-danger">Error loading data!</div>');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var archive_id = null;

        $('.btnArchiveBrgy').click(function(e) {
            archive_id = $(this).data('id');
            //alert(archive_id);

            $('#modalContentArc').html('<span class="d-flex justify-content-center mb-2 pt-5"><i class="fas fa-exclamation-triangle text-warning" style="font-size: 55px;"></i></span>' +
                '<p class="text-center text-light fs-5"><strong class="text-warning">Warning!</strong> Are you sure you want to <br> Archive this User?</p>' +
                '<div class="modal-footer d-flex justify-content-center mb-3">' +
                '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> No</button>' +
                '<button type="button" class="btn btn-danger" id="confirmArchiveBtn"><i class="fas fa-check"></i> Yes</button>' +
                '</div>');
            // $('#dynamicmodalArchive').modal('show');
        });

        $(document).on('click', '#confirmArchiveBtn', function() {

            $.ajax({
                type: 'POST',
                url: '../admin/archivebrgysu',
                data: {
                    id: archive_id
                },
                success: function(response) {
                    console.log('Archive success:', response);
                    window.location.href = '../admin/systemusers';
                    // $('#tr').html(response);
                    //$('#dynamicmodalArchive').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('Archive error:', error);

                }
            });

            $('#dynamicmodalArchive').modal('hide');
        });
    });
</script>

<script>
    $(document).ready(function() {
        var archive_id = null;

        $('.btnRestore').click(function(e) {
            restore_id = $(this).data('id');
            //alert(archive_id);

            $('#modalContentArc').html('<span class="d-flex justify-content-center mb-2 pt-5"> <i class="fas fa-info-circle text-secondary" style="font-size: 60px;"></i></span>' +
                '<p class="text-center text-light fs-4"><strong class="text-secondary fs-5">Information</strong> <br> When you restore this user it will <br> return to the active user list. <br> Are you sure you want to Restore <br> this User?</p>' +
                '<div class="modal-footer d-flex justify-content-center mb-3">' +
                '<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i> No</button>' +
                '<button type="button" class="btn btn-secondary" id="confirmRestoreBtn"><i class="fas fa-check"></i> Yes</button>' +
                '</div>');
            $('#dynamicmodalArchive').modal('show');
        });

        $(document).on('click', '#confirmRestoreBtn', function() {

            $.ajax({
                type: 'POST',
                url: '../admin/restoresu',
                data: {
                    id: restore_id
                },
                success: function(response) {
                    console.log('Restore success:', response);
                    window.location.href = '../admin/systemusers';
                    // $('#tr').html(response);
                    //$('#dynamicmodalArchive').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('Restore error:', error);

                }
            });

            $('#dynamicmodalArchive').modal('hide');
        });
    });
</script>