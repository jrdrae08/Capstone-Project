<?php

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

// backends/admin/pending_businesses.php
include "../backends/admin/fetch_pending_businesses.php";
include "../backends/admin/fetch_approved_businesses.php";
include "../backends/admin/fetch_rejected_businesses.php";
include "../backends/admin/fetch_archived_businesses.php";
include "../backends/admin/fetch_total_accepted.php";
include "../backends/admin/fetch_total_archived.php";

$pendingBusinesses = getPendingBusinesses($pdo);
$approvedBusinesses = getApprovedBusinesses($pdo);
$rejectedBusinesses = getRejectedBusinesses($pdo);
$archivedBusinesses = getArchivedBusinesses($pdo);
$totalAccepted = getTotalAccepted($pdo);
$totalArchived = getTotalArchived($pdo);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <div class="wrapper">

        <!-- aside nav -->
        <?php include '../admin/includes/aside.php'; ?>

        <div class="main">

            <!-- navbar -->
            <?php include '../admin/includes/navbar.php'; ?>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Manage Business Registrations</h4>
                    </div>
                    <div class="row">
                        <h5 class="text-center">Management Summary</h5>
                        <div class="col-6 col-md-3 mb-2 d-flex">
                            <div class="card flex-fill border-0 illustration bg-light text-dark shadow">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-12">
                                            <div class="p-3 m-1">
                                                <h4 class="text-center text-dark">Status</h4>
                                                <ul>
                                                    <li>Active: 23</li>
                                                    <li>Inactive: 6</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3 mb-2 d-flex">
                            <div class="card flex-fill border-0 illustration bg-primary shadow">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-12">
                                            <div class="p-3 m-1 text-center">
                                                <h4>Total Pending</h4>
                                                <h2 class="mb-0" id="totalPending"><?php $totalPending; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <script>
                            function fetchTotalPending() {
                                fetch('../backends/admin/fetch_totalpending_businesses.php')
                                    .then(response => response.text())
                                    .then(data => {
                                        document.getElementById('totalPending').innerText = data;
                                    })
                                    .catch(error => console.error('Error fetching total pending:', error));
                            }

                            function fetchTotalAccepted() {
                                fetch('../backends/admin/fetch_total_accepted.php')
                                    .then(response => response.text())
                                    .then(data => {
                                        document.getElementById('totalAccepted').innerText = data;
                                    })
                                    .catch(error => console.error('Error fetching total accepted:', error));
                            }

                            window.onload = function() {
                                fetchTotalPending();
                                fetchTotalAccepted();
                                setInterval(fetchTotalPending, 3000); // Refresh total pending every 60 seconds
                                setInterval(fetchTotalAccepted, 3000); // Refresh total accepted every 60 seconds
                            };
                        </script>

                        <div class="col-6 col-md-3 mb-2 d-flex">
                            <div class="card flex-fill border-0 illustration bg-success shadow">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-12">
                                            <div class="p-3 m-1 text-center">
                                                <h4>Total Accepted</h4>
                                                <h2 class="mb-0" id="totalAccepted"><?php echo $totalAccepted; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function fetchTotalAccepted() {
                                fetch('../backends/admin/fetch_total_accepted.php')
                                    .then(response => response.text())
                                    .then(data => {
                                        document.getElementById('totalAccepted').innerText = data;
                                    })
                                    .catch(error => console.error('Error fetching total accepted:', error));
                            }
                            // Fetch total accepted applications when the page loads
                            window.onload = function() {
                                fetchTotalPending();
                                setInterval(fetchTotalPending, 3000); // Refresh total pending every 60 seconds
                            };
                        </script>

                        <div class="col-6 col-md-3 mb-2 d-flex">
                            <div class="card flex-fill border-0 illustration bg-danger shadow">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-12">
                                            <div class="p-3 m-1 text-center">
                                                <h4>Total Archived</h4>
                                                <h2 class="mb-0" id="totalArchived"><?php echo $totalArchived; ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table Element -->
                        <div class="col-lg-12 col-md-6 py-2">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 my-3 d-flex justify-content-center align-items-start">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link pills me-2 shadow" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">PENDING</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link pills me-2 shadow active" id="pills-accepted-tab" data-bs-toggle="pill" data-bs-target="#pills-accepted" type="button" role="tab" aria-controls="pills-home" aria-selected="true">ACCEPTED</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link pills me-2 shadow" id="pills-rejected-tab" data-bs-toggle="pill" data-bs-target="#pills-rejected" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">REJECTED</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link pills shadow" id="pills-archived-tab" data-bs-toggle="pill" data-bs-target="#pills-archived" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ARCHIVED</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!-- pending business -->
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade " id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab" tabindex="0">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date Registered</th>
                                                        <th scope="col">Type of Business</th>
                                                        <th scope="col">Business Name</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="pendingBusinessesTable">
                                                </tbody>
                                            </table>
                                            <!-- Pagination controls -->
                                            <nav>
                                                <ul class="pagination justify-content-center" id="pagination-pending">
                                                </ul>
                                            </nav>
                                            <!-- Confirmation Modal for Pending -->
                                            <div class="modal fade" id="confirmationModalPending" tabindex="-1" aria-labelledby="confirmationModalLabelPending" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmationModalLabelPending">Confirm Action</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p id="confirmationMessagePending">Are you sure you want to proceed?</p>
                                                            <div id="rejectReasons" style="display: none;">
                                                                <div>
                                                                    <input type="checkbox" id="checkbox1" name="checkbox1">
                                                                    <label for="checkbox1">Business Permit is Expired</label>
                                                                </div>

                                                                <div>
                                                                    <input type="checkbox" id="checkbox2" name="checkbox2">
                                                                    <label for="checkbox2">Your Image is Not clear</label>
                                                                </div>

                                                                <div>
                                                                    <input type="checkbox" id="checkbox3" name="checkbox3">
                                                                    <label for="checkbox3">Not a legit business</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary" id="confirmButtonPending">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    let actionType = '';
                                                    let applicationId = '';
                                                    const rowsPerPage = 10;
                                                    let currentPage = 1;

                                                    const pendingBusinesses = <?php echo json_encode($pendingBusinesses); ?>;

                                                    function displayPendingBusinesses(page) {
                                                        const table = document.getElementById('pendingBusinessesTable');
                                                        table.innerHTML = '';

                                                        const start = (page - 1) * rowsPerPage;
                                                        const end = start + rowsPerPage;
                                                        const paginatedBusinesses = pendingBusinesses.slice(start, end);

                                                        paginatedBusinesses.forEach(business => {
                                                            const row = document.createElement('tr');
                                                            row.innerHTML = `
                <td>${business['Date Registered']}</td>
                <td>${business['BusinessType']}</td>
                <td>${business['BusinessName']}</td>
                <td>
                    <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewbusinessinfo" data-business='${JSON.stringify(business)}'>
                        <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-success m-1" data-application-id="${business['ApplicationID']}"><i class="bi bi-check-lg"></i></button>
                    <button class="btn btn-danger m-1" data-application-id="${business['ApplicationID']}"><i class="bi bi-x-lg"></i></button>
                </td>
            `;
                                                            table.appendChild(row);
                                                        });

                                                        // Reattach event listeners for the new elements
                                                        attachEventListeners();
                                                    }

                                                    function setupPagination(pageCount, paginationId, pageFunction) {
                                                        const pagination = document.getElementById(paginationId);
                                                        pagination.innerHTML = '';

                                                        for (let i = 1; i <= pageCount; i++) {
                                                            const pageItem = document.createElement('li');
                                                            pageItem.classList.add('page-item');
                                                            if (i === currentPage) {
                                                                pageItem.classList.add('active');
                                                            }
                                                            pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                                                            pageItem.addEventListener('click', function(e) {
                                                                e.preventDefault();
                                                                currentPage = i;
                                                                pageFunction(currentPage);
                                                                setupPagination(pageCount, paginationId, pageFunction);
                                                            });
                                                            pagination.appendChild(pageItem);
                                                        }
                                                    }

                                                    function attachEventListeners() {
                                                        document.getElementById('pendingBusinessesTable').addEventListener('click', function(event) {
                                                            const button = event.target.closest('button');
                                                            if (!button) return;

                                                            applicationId = button.getAttribute('data-application-id');
                                                            if (button.classList.contains('btn-success')) {
                                                                actionType = 'approve';
                                                                confirmationMessagePending.innerText = 'Are you sure you want to approve this business?';
                                                                rejectReasonsDiv.style.display = 'none';
                                                                confirmButtonPending.disabled = false; // Enable confirm button for approval
                                                            } else if (button.classList.contains('btn-danger')) {
                                                                actionType = 'reject';
                                                                confirmationMessagePending.innerText = 'Are you sure you want to reject this business?';
                                                                rejectReasonsDiv.style.display = 'block';
                                                                confirmButtonPending.disabled = true; // Disable confirm button initially for rejection
                                                            }

                                                            confirmationModalPending.show();
                                                        });

                                                        // Add event listeners to checkboxes to update confirm button state
                                                        document.querySelectorAll('#rejectReasons input[type="checkbox"]').forEach(checkbox => {
                                                            checkbox.addEventListener('change', updateConfirmButtonState);
                                                        });
                                                    }

                                                    // Function to check if any checkbox is selected
                                                    function updateConfirmButtonState() {
                                                        const checkboxes = document.querySelectorAll('#rejectReasons input[type="checkbox"]');
                                                        const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                                                        confirmButtonPending.disabled = !anyChecked;
                                                    }

                                                    const pendingPageCount = Math.ceil(pendingBusinesses.length / rowsPerPage);

                                                    displayPendingBusinesses(currentPage);
                                                    setupPagination(pendingPageCount, 'pagination-pending', displayPendingBusinesses);

                                                    const confirmationModalPending = new bootstrap.Modal(document.getElementById('confirmationModalPending'));
                                                    const confirmButtonPending = document.getElementById('confirmButtonPending');
                                                    const confirmationMessagePending = document.getElementById('confirmationMessagePending');
                                                    const rejectReasonsDiv = document.getElementById('rejectReasons');

                                                    confirmButtonPending.addEventListener('click', function() {
                                                        if (actionType === 'approve' || actionType === 'reject') {
                                                            const checkboxes = document.querySelectorAll('#rejectReasons input[type="checkbox"]');
                                                            const rejectReasons = [];
                                                            checkboxes.forEach(checkbox => {
                                                                if (checkbox.checked) {
                                                                    rejectReasons.push(checkbox.nextElementSibling.textContent);
                                                                }
                                                            });

                                                            fetch('../backends/admin/update_status.php', {
                                                                    method: 'POST',
                                                                    headers: {
                                                                        'Content-Type': 'application/json'
                                                                    },
                                                                    body: JSON.stringify({
                                                                        ApplicationID: applicationId,
                                                                        Status: actionType === 'approve' ? 'Approved' : 'Rejected',
                                                                        IsReject: actionType === 'reject' ? 1 : 0,
                                                                        RejectReasons: rejectReasons
                                                                    })
                                                                })
                                                                .then(response => response.json())
                                                                .then(data => {
                                                                    if (data.success) {
                                                                        alert(`Status updated to ${actionType === 'approve' ? 'Approved' : 'Rejected'} successfully!`);
                                                                        location.reload();
                                                                    } else {
                                                                        alert('Failed to update status: ' + (data.error || 'Unknown error.'));
                                                                    }
                                                                    confirmationModalPending.hide();
                                                                })
                                                                .catch(error => {
                                                                    console.error('Error:', error);
                                                                    confirmationModalPending.hide();
                                                                });
                                                        }
                                                    });

                                                    document.getElementById('confirmationModalPending').addEventListener('hidden.bs.modal', function() {
                                                        const backdrops = document.querySelectorAll('.modal-backdrop');
                                                        backdrops.forEach(backdrop => {
                                                            backdrop.parentNode.removeChild(backdrop);
                                                        });
                                                    });
                                                });
                                            </script>

                                        </div>

                                        <!-- Accepted business -->
                                        <div class="tab-pane fade show active" id="pills-accepted" role="tabpanel" aria-labelledby="pills-accepted-tab" tabindex="0">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date Registered</th>
                                                        <th scope="col">Type of Business</th>
                                                        <th scope="col">Business Name</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="acceptedBusinessesTable">
                                                </tbody>
                                            </table>
                                            <!-- Pagination controls -->
                                            <nav>
                                                <ul class="pagination justify-content-center" id="pagination-accepted">
                                                </ul>
                                            </nav>
                                        </div>

                                        <!-- Confirmation Modal for Status Toggle -->
                                        <div class="modal fade" id="confirmationModalAccepted" tabindex="-1" aria-labelledby="confirmationModalLabelAccepted" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="confirmationModalLabelAccepted">Confirm Status Change</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p id="confirmationMessageAccepted">Are you sure you want to proceed?</p>
                                                        <input type="hidden" id="modalBusinessId">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" id="confirmButtonAccepted">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Archive Confirmation Modal -->
                                        <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="archiveModalLabel">Confirm Archive</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to archive this account?
                                                        <input type="hidden" id="archiveBusinessId">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger" id="confirmArchiveBtn">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                let actionType = '';
                                                let businessId = '';
                                                let status = '';
                                                const rowsPerPage = 10;
                                                let currentPage = 1;

                                                const approvedBusinesses = <?php echo json_encode($approvedBusinesses); ?>;

                                                function displayApprovedBusinesses(page) {
                                                    const table = document.getElementById('acceptedBusinessesTable');
                                                    table.innerHTML = '';

                                                    const start = (page - 1) * rowsPerPage;
                                                    const end = start + rowsPerPage;
                                                    const paginatedBusinesses = approvedBusinesses.slice(start, end);

                                                    paginatedBusinesses.forEach(business => {
                                                        const row = document.createElement('tr');
                                                        row.innerHTML = `
                <td>${business['Date Registered']}</td>
                <td>${business['BusinessType']}</td>
                <td>${business['BusinessName']}</td>
                <td>
                    <label class="switch">
                        <input class="switch-input" type="checkbox" ${business['BusinessStatus'] == 'Active' ? 'checked' : ''} data-business-id="${business['AccountID']}">
                        <div class="switch-button">
                            <span class="switch-button-left">Inactive</span>
                            <span class="switch-button-right">Active</span>
                        </div>
                    </label>
                </td>
                <td>
                    <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewbusinessinfo" data-business='${JSON.stringify(business)}'>
                        <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-danger m-1" data-business-id="${business['AccountID']}" ${business['BusinessStatus'] == 'Inactive' ? '' : 'disabled'}>
                        <i class="bi bi-x-lg"></i>
                    </button>
                </td>
            `;
                                                        table.appendChild(row);
                                                    });

                                                    // Reattach event listeners for the new elements
                                                    attachEventListeners();
                                                }

                                                function setupPagination(pageCount, paginationId, pageFunction) {
                                                    const pagination = document.getElementById(paginationId);
                                                    pagination.innerHTML = '';

                                                    for (let i = 1; i <= pageCount; i++) {
                                                        const pageItem = document.createElement('li');
                                                        pageItem.classList.add('page-item');
                                                        if (i === currentPage) {
                                                            pageItem.classList.add('active');
                                                        }
                                                        pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                                                        pageItem.addEventListener('click', function(e) {
                                                            e.preventDefault();
                                                            currentPage = i;
                                                            pageFunction(currentPage);
                                                            setupPagination(pageCount, paginationId, pageFunction);
                                                        });
                                                        pagination.appendChild(pageItem);
                                                    }
                                                }

                                                function attachEventListeners() {
                                                    document.querySelectorAll('.switch-input').forEach(function(toggle) {
                                                        toggle.addEventListener('change', function(event) {
                                                            businessId = this.dataset.businessId;
                                                            status = this.checked ? 'Active' : 'Inactive';
                                                            actionType = 'toggle';
                                                            confirmationMessageAccepted.innerText = `Are you sure you want to set this business to ${status}?`;
                                                            modalBusinessId.value = businessId;
                                                            confirmationModalAccepted.show();

                                                            // Store the current checkbox state
                                                            const originalCheckedState = this.checked;

                                                            // If the user cancels the confirmation, revert the checkbox state
                                                            document.querySelectorAll('#confirmationModalAccepted .btn-close, #confirmationModalAccepted .btn-secondary').forEach(button => {
                                                                button.addEventListener('click', function() {
                                                                    toggle.checked = !originalCheckedState;
                                                                }, {
                                                                    once: true
                                                                });
                                                            });
                                                        });
                                                    });

                                                    document.querySelectorAll('.btn-danger[data-business-id]').forEach(function(button) {
                                                        button.addEventListener('click', function(event) {
                                                            businessId = this.dataset.businessId;
                                                            archiveBusinessId.value = businessId;
                                                            archiveModal.show();
                                                        });
                                                    });
                                                }

                                                const approvedPageCount = Math.ceil(approvedBusinesses.length / rowsPerPage);

                                                displayApprovedBusinesses(currentPage);
                                                setupPagination(approvedPageCount, 'pagination-accepted', displayApprovedBusinesses);

                                                const confirmationModalAccepted = new bootstrap.Modal(document.getElementById('confirmationModalAccepted'));
                                                const confirmButtonAccepted = document.getElementById('confirmButtonAccepted');
                                                const confirmationMessageAccepted = document.getElementById('confirmationMessageAccepted');
                                                const modalBusinessId = document.getElementById('modalBusinessId');

                                                const archiveModal = new bootstrap.Modal(document.getElementById('archiveModal'));
                                                const confirmArchiveBtn = document.getElementById('confirmArchiveBtn');
                                                const archiveBusinessId = document.getElementById('archiveBusinessId');

                                                confirmButtonAccepted.addEventListener('click', function() {
                                                    const businessId = modalBusinessId.value;
                                                    if (actionType === 'toggle') {
                                                        fetch('../backends/admin/active_inactive.php', {
                                                                method: 'POST',
                                                                headers: {
                                                                    'Content-Type': 'application/json'
                                                                },
                                                                body: JSON.stringify({
                                                                    id: businessId,
                                                                    status: status
                                                                })
                                                            })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                if (!data.success) {
                                                                    alert('Failed to update status');
                                                                    document.querySelector(`.switch-input[data-business-id="${businessId}"]`).checked = status === 'Active' ? false : true;
                                                                } else {
                                                                    document.querySelector(`.btn-danger[data-business-id="${businessId}"]`).disabled = status === 'Inactive' ? false : true;
                                                                }
                                                                confirmationModalAccepted.hide();
                                                            })
                                                            .catch(error => {
                                                                console.error('Error:', error);
                                                                alert('Failed to update status');
                                                                document.querySelector(`.switch-input[data-business-id="${businessId}"]`).checked = status === 'Active' ? false : true;
                                                                confirmationModalAccepted.hide();
                                                            });
                                                    }
                                                });

                                                confirmArchiveBtn.addEventListener('click', function() {
                                                    const businessId = archiveBusinessId.value;
                                                    fetch('../backends/admin/archive_account.php', {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/x-www-form-urlencoded'
                                                            },
                                                            body: 'business_id=' + businessId
                                                        })
                                                        .then(response => response.text())
                                                        .then(data => {
                                                            alert('Account archived successfully');
                                                            location.reload();
                                                        })
                                                        .catch(error => {
                                                            console.error('Error:', error);
                                                            alert('Failed to archive account');
                                                        });
                                                    archiveModal.hide();
                                                });

                                                document.getElementById('confirmationModalAccepted').addEventListener('hidden.bs.modal', function() {
                                                    const backdrops = document.querySelectorAll('.modal-backdrop');
                                                    backdrops.forEach(backdrop => {
                                                        backdrop.parentNode.removeChild(backdrop);
                                                    });
                                                });

                                                document.getElementById('archiveModal').addEventListener('hidden.bs.modal', function() {
                                                    const backdrops = document.querySelectorAll('.modal-backdrop');
                                                    backdrops.forEach(backdrop => {
                                                        backdrop.parentNode.removeChild(backdrop);
                                                    });
                                                });
                                            });
                                        </script>


                                        <!-- REJECTED BUSINESS -->
                                        <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab" tabindex="0">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date Registered</th>
                                                        <th scope="col">Type of Business</th>
                                                        <th scope="col">Business Name</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="rejectedBusinessesTable">
                                                </tbody>
                                            </table>
                                            <!-- Pagination controls -->
                                            <nav>
                                                <ul class="pagination justify-content-center" id="pagination-rejected">
                                                </ul>
                                            </nav>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const rowsPerPage = 10;
                                                let currentPage = 1;

                                                const rejectedBusinesses = <?php echo json_encode($rejectedBusinesses); ?>;

                                                function displayRejectedBusinesses(page) {
                                                    const table = document.getElementById('rejectedBusinessesTable');
                                                    table.innerHTML = '';

                                                    const start = (page - 1) * rowsPerPage;
                                                    const end = start + rowsPerPage;
                                                    const paginatedBusinesses = rejectedBusinesses.slice(start, end);

                                                    paginatedBusinesses.forEach(business => {
                                                        const row = document.createElement('tr');
                                                        row.innerHTML = `
                                                            <td>${business['Date Registered']}</td>
                                                            <td>${business['BusinessType']}</td>
                                                            <td>${business['BusinessName']}</td>
                                                            <td>
                                                                <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewbusinessinfo" data-business='${JSON.stringify(business)}'>
                                                                    <i class="bi bi-eye"></i>
                                                                </button>
                                                            </td>
                                                        `;
                                                        table.appendChild(row);
                                                    });
                                                }

                                                function setupPagination(pageCount, paginationId, pageFunction) {
                                                    const pagination = document.getElementById(paginationId);
                                                    pagination.innerHTML = '';

                                                    for (let i = 1; i <= pageCount; i++) {
                                                        const pageItem = document.createElement('li');
                                                        pageItem.classList.add('page-item');
                                                        if (i === currentPage) {
                                                            pageItem.classList.add('active');
                                                        }
                                                        pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                                                        pageItem.addEventListener('click', function(e) {
                                                            e.preventDefault();
                                                            currentPage = i;
                                                            pageFunction(currentPage);
                                                            setupPagination(pageCount, paginationId, pageFunction);
                                                        });
                                                        pagination.appendChild(pageItem);
                                                    }
                                                }

                                                const rejectedPageCount = Math.ceil(rejectedBusinesses.length / rowsPerPage);

                                                displayRejectedBusinesses(currentPage);
                                                setupPagination(rejectedPageCount, 'pagination-rejected', displayRejectedBusinesses);
                                            });
                                        </script>



                                        <!-- Archive Confirmation Modal -->
                                        <div class="modal fade" id="archiveModal" tabindex="-1" aria-labelledby="archiveModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="archiveModalLabel">Confirm Archive</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to archive this account?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger" id="confirmArchiveBtn">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Return Confirmation Modal -->
                                        <div class="modal fade" id="returnConfirmationModal" tabindex="-1" aria-labelledby="returnConfirmationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="returnConfirmationModalLabel">Confirm Return</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to return this business to active status?
                                                        <input type="hidden" id="returnBusinessId">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-success" id="confirmReturnBtn">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- archived business -->
                                        <div class="tab-pane fade" id="pills-archived" role="tabpanel" aria-labelledby="pills-archived-tab" tabindex="0">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date Registered</th>
                                                        <th scope="col">Type of Business</th>
                                                        <th scope="col">Business Name</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="archivedBusinessesTable">
                                                </tbody>
                                            </table>
                                            <!-- Pagination controls -->
                                            <nav>
                                                <ul class="pagination justify-content-center" id="pagination-archived">
                                                </ul>
                                            </nav>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const rowsPerPage = 10;
                                                let currentPage = 1;

                                                const archivedBusinesses = <?php echo json_encode($archivedBusinesses); ?>;

                                                function displayArchivedBusinesses(page) {
                                                    const table = document.getElementById('archivedBusinessesTable');
                                                    table.innerHTML = '';

                                                    const start = (page - 1) * rowsPerPage;
                                                    const end = start + rowsPerPage;
                                                    const paginatedBusinesses = archivedBusinesses.slice(start, end);

                                                    paginatedBusinesses.forEach(business => {
                                                        const row = document.createElement('tr');
                                                        row.innerHTML = `
                <td>${business['Date Registered']}</td>
                <td>${business['BusinessType']}</td>
                <td>${business['BusinessName']}</td>
                <td>
                    <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewbusinessinfo" data-business='${JSON.stringify(business)}'>
                        <i class="bi bi-eye"></i>
                    </button>
                    <button class="btn btn-success m-1" data-business-id="${business['AccountID']}"><i class="bi bi-arrow-clockwise"></i></button>
                </td>
            `;
                                                        table.appendChild(row);
                                                    });

                                                    // Reattach event listeners for the new elements
                                                    attachEventListeners();
                                                }

                                                function setupPagination(pageCount, paginationId, pageFunction) {
                                                    const pagination = document.getElementById(paginationId);
                                                    pagination.innerHTML = '';

                                                    for (let i = 1; i <= pageCount; i++) {
                                                        const pageItem = document.createElement('li');
                                                        pageItem.classList.add('page-item');
                                                        if (i === currentPage) {
                                                            pageItem.classList.add('active');
                                                        }
                                                        pageItem.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                                                        pageItem.addEventListener('click', function(e) {
                                                            e.preventDefault();
                                                            currentPage = i;
                                                            pageFunction(currentPage);
                                                            setupPagination(pageCount, paginationId, pageFunction);
                                                        });
                                                        pagination.appendChild(pageItem);
                                                    }
                                                }

                                                function attachEventListeners() {
                                                    document.querySelectorAll('.btn-success[data-business-id]').forEach(function(button) {
                                                        button.addEventListener('click', function(event) {
                                                            const businessId = this.dataset.businessId;
                                                            returnBusinessId.value = businessId;
                                                            returnModal.show();
                                                        });
                                                    });
                                                }

                                                const archivedPageCount = Math.ceil(archivedBusinesses.length / rowsPerPage);

                                                displayArchivedBusinesses(currentPage);
                                                setupPagination(archivedPageCount, 'pagination-archived', displayArchivedBusinesses);

                                                const returnModal = new bootstrap.Modal(document.getElementById('returnConfirmationModal'));
                                                const confirmReturnBtn = document.getElementById('confirmReturnBtn');
                                                const returnBusinessId = document.getElementById('returnBusinessId');

                                                confirmReturnBtn.addEventListener('click', function() {
                                                    const businessId = returnBusinessId.value;
                                                    fetch('../backends/admin/return_business.php', {
                                                            method: 'POST',
                                                            headers: {
                                                                'Content-Type': 'application/x-www-form-urlencoded'
                                                            },
                                                            body: 'business_id=' + encodeURIComponent(businessId)
                                                        })
                                                        .then(response => response.json())
                                                        .then(data => {
                                                            if (data.success) {
                                                                alert('Business returned to active status successfully.');
                                                                location.reload(); // Refresh the page to update the status
                                                            } else {
                                                                alert('Failed to return business: ' + data.error);
                                                            }
                                                            returnModal.hide();
                                                        })
                                                        .catch(error => {
                                                            console.error('Error:', error);
                                                            alert('Failed to return business.');
                                                            returnModal.hide();
                                                        });
                                                });

                                                document.getElementById('returnConfirmationModal').addEventListener('hidden.bs.modal', function() {
                                                    const backdrops = document.querySelectorAll('.modal-backdrop');
                                                    backdrops.forEach(backdrop => {
                                                        backdrop.parentNode.removeChild(backdrop);
                                                    });
                                                });
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                </div> <!-- Close .card -->
        </div> <!-- Close .col-lg-12 -->
    </div> <!-- Close .row -->
    </div> <!-- Close .container-fluid -->
    </main>

    <!-- View modal -->
    <div class="modal fade" id="viewbusinessinfo" tabindex="-1" aria-labelledby="viewbusinessinfo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Business Registration</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mt-2 fs-6 fw-bold text-center">Business Information</p>
                    <ul>
                        <li id="businessName">Business Name: </li>
                        <li id="businessType">Type of Business: </li>
                        <li id="businessContact">Contact #: </li>
                        <li id="businessEmail">Email: </li>
                        <li id="businessAddress">Business Address: </li>
                        <li id="permitExpDate">Permit Expiration Date: </li>
                    </ul>
                    <div class="text-center">
                        <button id="viewImgBtn" class="btn btn-primary text-center">View Business Permit</button>
                    </div>
                    <p class="mt-4 fs-6 fw-bold text-center">Registrant Information</p>
                    <ul>
                        <li id="registrantName">Full Name: </li>
                        <li id="registrantEmail">Email: </li>
                        <li id="registrantContact">Contact #: </li>
                    </ul>
                    <div id="imageContainer" class="text-center mt-3" style="display: none;">
                        <img id="businessPermitImage" src="" alt="Business Permit" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Placeholder for business list -->
    <div id="businessList"></div>

    <script>
        $(document).ready(function() {
            // Fetch pending businesses on page load
            $.ajax({
                url: '../backends/admin/fetch_pending_businesses.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response); // Debugging line to log the response
                    var businesses = response;
                    businesses.forEach(function(business) {
                        var button = $('<button>')
                            .addClass('btn btn-primary')
                            .text('View ' + business.BusinessName)
                            .data('business', business)
                            .attr('data-bs-toggle', 'modal')
                            .attr('data-bs-target', '#viewbusinessinfo');

                        $('#businessList').append(button); // Assuming you have a div with id="businessList"
                    });
                }
            });

            // Show business info in the modal when the button is clicked
            $('#viewbusinessinfo').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var business = button.data('business');
                var modal = $(this);

                modal.find('#businessName').text('Business Name: ' + business.BusinessName);
                modal.find('#businessType').text('Type of Business: ' + business.BusinessType);
                modal.find('#businessContact').text('Contact #: ' + business.BusinessContactNumber);
                modal.find('#businessEmail').text('Email: ' + business.BusinessEmail);
                modal.find('#businessAddress').text('Business Address: ' + business.BusinessAddress);

                // Format the expiration date
                var permitExpDate = new Date(business.PermitExpDate);
                var formattedDate = permitExpDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                modal.find('#permitExpDate').text('Permit Expiration Date: ' + formattedDate);

                var registrantName = business.RegistrantFirstName + ' ' + business.RegistrantMiddleName + ' ' + business.RegistrantLastName;
                modal.find('#registrantName').text('Full Name: ' + registrantName);
                modal.find('#registrantEmail').text('Email: ' + business.RegistrantEmail);
                modal.find('#registrantContact').text('Contact #: ' + business.RegistrantContact);

                $('#viewImgBtn').off('click').on('click', function() {
                    $('#businessPermitImage').attr('src', '../../businessowner/uploadsapp/' + business.BusinessPermitImage);
                    $('#imageContainer').show();

                    // Initialize image viewer
                    var viewer = new ImageViewer($('#businessPermitImage')[0]);
                });
            });

            // Reset image container when the modal is hidden
            $('#viewbusinessinfo').on('hide.bs.modal', function() {
                $('#imageContainer').hide();
                $('#businessPermitImage').attr('src', '');
            });
        });
    </script>







    <a href="#" class="theme-toggle">
        <i class="fa-regular fa-sun"></i>
        <i class="fa-regular fa-moon"></i>
    </a>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin.js"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const button = document.getElementById('viewPdfBtn');

        button.addEventListener('click', () => {
            // Replace 'path/to/your.pdf' with the actual path to your PDF file
            const pdfPath = 'path/to/your.pdf';

            // Open the PDF file in a new tab
            window.open(pdfPath, '_blank');
        });
    });
</script>

</html>