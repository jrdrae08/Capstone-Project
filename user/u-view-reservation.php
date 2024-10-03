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
    <link rel="stylesheet" href="../user/user.css">
</head>

<body>
    <div class="wrapper">
        <?php include '../user/include/aside.php'; ?>

        <div class="main">
            <?php include '../user/include/navbar.php'; ?>

            <!-- Manage Reservation -->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <h5>Manage Customer Reservations</h5>
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <h5>Your Reservations</h5>
                        </div>
                        <div class="card-body">
                            <!-- Upcoming -->
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab" tabindex="0">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Destination Name</th>
                                                <th scope="col">Room Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>eneme Farm</td>
                                                <td>Room 1</td>
                                                <td>Pending</td>
                                                <th>
                                                    <button class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#viewroom"><i class="bi bi-eye"></i></button>
                                                    <button class="btn btn-danger m-1"><i class="bi bi-x-lg"></i></button>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- view modal -->
                                <div class="modal fade" id="viewroom" tabindex="-1" aria-labelledby="viewroom" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5" id="exampleModalLabel">Booking Information</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <ul>
                                                    <li>Room name: </li>
                                                    <li>Check In: </li>
                                                    <li>Check Out: </li>
                                                </ul>
                                                <div class="row">
                                                    <div class="col-md-12 mb-2 text-center">
                                                        <p>Total visitors: </p>
                                                    </div>
                                                    <div class="row text-center">
                                                        <div class="col-md-6 mb-2">
                                                            <p>Males: </p>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <p>Females: </p>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <p>Adults: </p>
                                                        </div>
                                                        <div class="col-md-6 mb-2">
                                                            <p>Children: </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                    <?php include '../user/include/footer.php'; ?>
                </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../user/user.js"></script>
</body>

</html>