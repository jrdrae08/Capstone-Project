<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'businessowner') {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Reservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/businessowner.css">
</head>

<body>
    <div class="wrapper">
        <?php include '../businessowner/includes/aside.php'; ?>

        <div class="main">
            <?php include '../businessowner/includes/navbar.php'; ?>

            <!-- Manage Reservation -->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <h3>Manage Customer Reservations</h3>
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <div class="row ">
                                        <div class="col-lg-8 col-sm-12 mb-2 d-flex justify-content-center align-items-center">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link pills btn me-2 active" id="pills-upcoming-tab" data-bs-toggle="pill" data-bs-target="#pills-upcoming" type="button" role="tab" aria-controls="pills-home" aria-selected="true">NEW</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link pills btn" id="pills-ongoing-tab" data-bs-toggle="pill" data-bs-target="#pills-ongoing" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ONGOING</button>
                                                </li>

                                                <div class="vertical-line"></div>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link bg-danger text-light btn " id="pills-archive-tab" data-bs-toggle="pill" data-bs-target="#pills-archive" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">ARCHIVE</button>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <form class="d-flex" role="search">
                                                <input class="form-control shadow me-2" type="search" placeholder="Search" aria-label="Search">
                                                <button class="btn btn-outline-success" type="submit">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Upcoming -->
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab" tabindex="0">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Time Booked</th>
                                                        <th scope="col">Room Name</th>
                                                        <th scope="col">Customer Name</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="upcoming-reservations">
                                                    <!-- Data will be populated here by JavaScript -->
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- view modal -->
                                        <div class="modal fade" id="viewroom" tabindex="-1" aria-labelledby="viewroomLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewroomLabel">Reservation Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Reservation details will be populated here by JavaScript -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                fetchReservations();
                                            });

                                            function fetchReservations() {
                                                fetch('../../backends/subadmin/fetch_reservations.php')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        if (data.status === 'success') {
                                                            const reservations = data.data;
                                                            const tbody = document.getElementById('upcoming-reservations');
                                                            tbody.innerHTML = '';

                                                            reservations.forEach(reservation => {
                                                                const tr = document.createElement('tr');
                                                                tr.innerHTML = `
                        <td>${formatDateTime(reservation.datetime)}</td>
                        <td>${reservation.roomName}</td>
                        <td>${reservation.fullname}</td>
                        <th>
                            <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewroom" onclick="fetchReservationDetails(${reservation.revID})"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-success m-1"><i class="bi bi-check-lg"></i></button>
                            <button class="btn btn-danger m-1"><i class="bi bi-x-lg"></i></button>
                        </th>
                    `;
                                                                tbody.appendChild(tr);
                                                            });
                                                        } else {
                                                            console.error(data.message);
                                                        }
                                                    })
                                                    .catch(error => console.error('Error fetching reservations:', error));
                                            }

                                            function fetchReservationDetails(revID) {
                                                console.log(`Fetching details for reservation ID: ${revID}`);
                                                fetch(`../../backends/subadmin/fetch_reservation_details.php?revID=${revID}`)
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        console.log(data); // Log the response data
                                                        if (data.status === 'success') {
                                                            const reservation = data.data;
                                                            document.querySelector('#viewroom .modal-body').innerHTML = `
                    <p class="mt-2 fs-6 fw-bold text-center">Customer Profile</p>
                    <ul>
                        <li>Customer Name: ${reservation.fullname}</li>
                        <li>Contact Number: ${reservation.regnum}</li>
                        <li>Email: ${reservation.regemail}</li>
                        <li>Address: ${reservation.regadd}</li>
                    </ul>
                    <p class="mt-2 fs-6 fw-bold text-center">Reservation Information</p>
                    <ul>
                        <li>Room name: ${reservation.roomName}</li>
                        <li>Check In: ${reservation.checkin}</li>
                        <li>Check Out: ${reservation.departure}</li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12 mb-2 text-center">
                            <p>Total visitors: ${reservation.numadult + reservation.numchild}</p>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6 mb-2">
                                <p>Males: ${reservation.nummale}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p>Females: ${reservation.numfemale}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p>Adults: ${reservation.numadult}</p>
                            </div>
                            <div class="col-md-6 mb-2">
                                <p>Children: ${reservation.numchild}</p>
                            </div>
                        </div>
                    </div>
                `;
                                                        } else {
                                                            console.error(data.message);
                                                        }
                                                    })
                                                    .catch(error => console.error('Error fetching reservation details:', error));
                                            }

                                            function formatDateTime(datetime) {
                                                const date = new Date(datetime);
                                                const options = {
                                                    hour: '2-digit',
                                                    minute: '2-digit',
                                                    hour12: true
                                                };
                                                const time = date.toLocaleTimeString('en-US', options);
                                                const formattedDate = `${time} ${date.getMonth() + 1}/${date.getDate()}/${date.getFullYear().toString().slice(-2)}`;
                                                return formattedDate;
                                            }
                                        </script>
                                        <!-- Ongoing -->
                                        <div class="tab-pane fade" id="pills-ongoing" role="tabpanel" aria-labelledby="pills-ongoing-tab" tabindex="0">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Room Name</th>
                                                        <th scope="col">Time In</th>
                                                        <th scope="col">Time Out</th>
                                                        <th scope="col">Customer Name</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Room 5</td>
                                                        <td>01:00PM 11/26/24</td>
                                                        <td>01:00PM 11/28/24</td>
                                                        <td>John Angel Manalo</td>
                                                        <th>

                                                            <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewroom"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-success m-1"><i class="bi bi-check-lg"></i></button>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- archive -->
                                        <div class="tab-pane fade" id="pills-archive" role="tabpanel" aria-labelledby="pills-archive-tab" tabindex="0">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Time Booked</th>
                                                        <th scope="col">Room Name</th>
                                                        <th scope="col">Customer Name</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>11:23AM 11/23/24</td>
                                                        <td>Room 5</td>
                                                        <td>John Angel Manalo</td>
                                                        <th>
                                                            <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewroom"><i class="bi bi-eye"></i></button>
                                                            <button class="btn btn-danger m-1"><i class="bi bi-x-lg"></i></button>
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-sun"></i>
                <i class="fa-regular fa-moon"></i>
            </a>
            <footer class="footer">
                <?php include '../businessowner/includes/footer.php'; ?>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/businessowner.js"></script>
</body>

</html>