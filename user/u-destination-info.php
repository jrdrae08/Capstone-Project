<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majayjay Destinations</title>
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

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3>(Destination Name)</h3>
                    </div>
                    <hr>
                </div>

                <div class="row justify-content-evenly">
                    <h3 class="text-center">Available Rooms</h3>
                    <div class="col-lg-6 col-sm-8">
                        <div class="card shadow mb-3">
                            <div class="row g-0">
                                <div class="col-md-4 col-sm- text-center">
                                    <img src="../img/general-img/majayjay-logo.webp" class="img-fluid rounded-start m-2" alt="...">
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title">(Room Name)</h5>
                                        <p class="card-text fw-bold">Features</p>

                                        <p class="card-text fw-bold">Facilities</p>

                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            BOOK NOW!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-8">
                        <div class="card shadow mb-3">
                            <div class="row g-0">
                                <div class="col-md-4 col-sm- text-center">
                                    <img src="../img/general-img/majayjay-logo.webp" class="img-fluid rounded-start m-2" alt="...">
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <div class="card-body">
                                        <h5 class="card-title">(Room Name)</h5>
                                        <p class="card-text fw-bold">Features</p>

                                        <p class="card-text fw-bold">Facilities</p>

                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            BOOK NOW!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Room name</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-8 justify-content-center">
                                        <div id="carouselExampleIndicators" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="../img/businessowner-img/dalitiwan resort.jpg" class="d-block w-100" alt="..." height="400">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="../img/businessowner-img/majayjay falls.JPG" class="d-block w-100" alt="..." height="400">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="..." class="d-block w-100" alt="..." height="400">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mt-4">
                                        <h4 class="text-center">Booking</h4>
                                        <div class="row-cols-auto justify-content-center align-items-center">
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control shadow" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Check In</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control shadow" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Check Out</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Total No. of Visitors</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Total No. of Male</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Total No. of Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-success px-5">BOOK</button>
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