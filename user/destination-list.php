<?php
include "../backends/subadmin/fetch_destination_list.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destination Lists</title>
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
    <link rel="stylesheet" href="../user/user.css">

    <style>
        .image-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* Maintain aspect ratio */
            overflow: hidden;
        }

        .image-thumbnail {
            position: relative;
            width: 100%;
            padding-bottom: 30%;
            /* Maintain aspect ratio */
            overflow: hidden;
        }

        .image-thumbnail img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <main class="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">
                    <img src="../img/general-img/majayjay-logo.webp" alt="Majayjay Logo" height="50">
                </a>
                <button class="navbar-toggler shadow" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-light  btn btn-nav btn-success shadow" href="../homepage/homepage.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light btn btn-nav btn-success shadow" href="#service">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light btn btn-nav btn-success shadow" href="#about">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light btn btn-nav btn-success shadow" href="#contact">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a href="../user/user_login.php" class="btn btn-login btn-success shadow">
                                <i class="bi bi-person-circle me-1"></i>
                                SIGN IN
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="home" class="destination-container">
            <div class="container-fluid mt-5">
                <div class="row mx-3 d-flex justify-content-center align-items-center">
                    <div class="col-lg-8 col-sm-10">
                        <div class="card rounded-3 shadow">
                            <div class="card-body m-0 p-0">
                                <div class="image-thumbnail">
                                    <img src="../../businessowner/businessmediacategory/<?php echo htmlspecialchars($business['Thumbnail']); ?>" alt="Thumbnail" class="rounded shadow">
                                </div>
                                <div class="card-img-overlay align-items-end">
                                    <h1 class="text-center text-dark bg-light rounded-3 shadow"><?php echo htmlspecialchars($business['BusinessName']); ?></h1>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-8 mb-5">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="image-container">
                                    <img src="../../businessowner/businessmediacategory/<?php echo htmlspecialchars($business['Image1']); ?>" alt="Image 1" class="rounded shadow">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="image-container">
                                    <img src="../../businessowner/businessmediacategory/<?php echo htmlspecialchars($business['Image2']); ?>" alt="Image 2" class="rounded shadow">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="image-container">
                                    <img src="../../businessowner/businessmediacategory/<?php echo htmlspecialchars($business['Image3']); ?>" alt="Image 3" class="rounded shadow">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="image-container">
                                    <img src="../../businessowner/businessmediacategory/<?php echo htmlspecialchars($business['Image4']); ?>" alt="Image 4" class="rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 d-flex justify-content-center mb-5">
                        <p class="text-muted"><?php echo htmlspecialchars($business['Quotation']); ?></p>
                    </div>

                    <div class="col-lg-12 mb-5">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <h3 class="text-success fw-bold mb-5">AVAILABLE ROOMS</h3>
                        </div>
                        <div class="col-lg-12 d-flex align-items-center justify-content-evenly">
                            <div class="row d-flex">
                                <div class="col-lg-3 col-md-6 col-sm-8 d-flex justify-content-center">
                                    <div class="card shadow" style="width: 18rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success d-block">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-8 d-flex justify-content-center">
                                    <div class="card shadow" style="width: 18rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success d-block">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-8 d-flex justify-content-center">
                                    <div class="card shadow" style="width: 18rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success d-block">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-8 d-flex justify-content-center">
                                    <div class="card shadow" style="width: 18rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success d-block">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer-container bg-success">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 text-start mt-2">
                        <p class="mb-0">
                            <a href="#" class="text-muted">
                                <strong>HaKingz</strong>
                            </a>
                        </p>
                    </div>
                    <div class="col-6 text-end mt-2">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">About Us</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Terms</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-muted">Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script src="../homepage/homepage.js"></script>

</html>