<?php
// Include the backend file that fetches the data
include '../backends/subadmin/fetch_alldestination_category.php';
include '../backends/subadmin/fetch_features_category.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourist Destinations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            overflow-x: hidden;
            height: 100vh;
            width: 100%;
            background: url('../img/general-img/majayjay-church.jpg') center center/cover;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .desc-text {
            font-size: 14px;
        }

        .times-new-roman {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .btn-nav {
            margin: 0 20px;
            width: 135px;
            border-radius: 50px;
            text-align: center;
            font-size: 20px;
            background-color: #198754;
        }

        .btn-login {
            margin-left: 100px;
            width: 135px;
            text-align: center;
            font-size: 20px;
            border-radius: 50px 0px 0px 50px;
        }

        .header-text {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .category-header {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 350px;
            /* adjust height as needed */
        }

        /*
    ============================================================
                            tab-pane-pills
    ============================================================
    */
        .nav-link.active {
            background-color: #198754 !important;
            border-color: #198754 !important;
        }

        .nav-link:not(.active) {
            color: var(--bs-dark);
        }

        .tab-content .tab-pane .col .card {
            transition: transform 0.2s ease;
            background: none;
        }

        .tab-content .tab-pane .col .card:hover {
            transform: scale(1.05);
        }

        /*
    ============================================================
                            Resposive Screen
    ============================================================
    */
        @media (max-width: 767px) {

            .navbar-brand {
                margin-left: 0 !important;
            }

            .fixed-top {
                position: fixed;
                background-color: rgba(255, 255, 255, 0.009);
                /* Semi-transparent background color */
                backdrop-filter: blur(10px);
                /* Blur effect */
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                display: block;
                width: 100%;
                margin-bottom: 10px;
                color: #198754;
            }

            .navbar-nav .nav-link {
                display: block;
                width: 100%;
                margin: 0 !important;
                background: none !important;
                border: none !important;
                box-shadow: none !important;
            }

            .navbar-nav .btn-login {
                display: block;
                width: 100%;
                margin-left: 0 !important;
                background: none !important;
                border: none !important;
                box-shadow: none !important;
            }
        }
    </style>
</head>

<body>
    <main>
        <section class="top-container">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand ms-3 text-light" href="#">
                                <img src="../img/general-img/majayjay-logo.webp" alt="Majayjay Logo" height="50">
                                <span>Majayjay,Laguna</span>
                            </a>
                            <button class="navbar-toggler shadow" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link text-light btn btn-nav btn-success shadow fs-6" href="#">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light btn btn-nav btn-success shadow fs-6" href="#service">SERVICES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light btn btn-nav btn-success shadow fs-6" href="#about">ABOUT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light btn btn-nav btn-success shadow fs-6" href="#contact">CONTACT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../user/user_login.php" class="btn btn-login btn-success shadow fs-6">
                                            <i class="bi bi-person-circle me-1"></i>
                                            SIGN IN
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="col-lg-12">
                        <div class="category-header">
                            <div class="header-text text-center">
                                <h1 class="text-center text-light">Tourist Destinations</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="navigation-text text-center bg-success-subtle py-3">
            <a href="../homepage/homepage.php" class="text-decoration-none text-dark times-new-roman fs-4 fw-bold">Home</a>
            <span class="text-dark times-new-roman fw-bold fs-4">></span>
            <a href="#" class="text-decoration-none text-dark times-new-roman fs-4">Destination Categories</a>
        </div>

        <section class="content">
            <div class="container-fluid bg-light-subtle">
                <div class="row justify-content-center">
                    <div class="col-lg-9 tab-buttons p-5">
                        <ul class="nav nav-pills d-flex justify-content-center border border-success border-2 rounded rounded-5 shadow py-2 mb-5 bg-success-subtle" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active m-2" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link m-2" id="pills-falls-tab" data-bs-toggle="pill" data-bs-target="#pills-falls" type="button" role="tab" aria-controls="pills-falls" aria-selected="false">Falls</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link  m-2" id="pills-farms-tab" data-bs-toggle="pill" data-bs-target="#pills-farms" type="button" role="tab" aria-controls="pills-farms" aria-selected="false">Farms</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                                <div class="row gy-3 d-flex justify-content-evenly align-items-center">
                                    <?php foreach ($businesses as $business): ?>
                                        <div class="col d-flex justify-content-center">
                                            <a href="destination-list.php?businessInfoID=<?php echo urlencode($business['BusinessInfoID']); ?>" class="text-decoration-none">
                                                <div class="card rounded border shadow" style="width: 18rem;">
                                                    <img src="../../businessowner/businessmediacategory/<?php echo htmlspecialchars($business['Thumbnail']); ?>" class="card-img-top rounded-top" alt="Business Image" style="object-fit: cover;">
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center fs-6 fw-bold"><?php echo htmlspecialchars($business['BusinessName']); ?></h5>
                                                        <p class="desc-text"><?php echo htmlspecialchars($business['Quotation']); ?></p>
                                                        <div class="row d-flex justify-content-evenly align-items-center">
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>

                        



                                    <div class="tab-pane fade" id="pills-farms" role="tabpanel" aria-labelledby="pills-farms-tab" tabindex="0">
                                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                                            <div class="row d-flex gy-3  justify-content-evenly align-items-center">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="destination-list.php" class="text-decoration-none">
                                                        <div class="card rounded border mb-3 shadow" style="width: 18rem;">
                                                            <img src="../img/general-img/majayjay-church.jpg" class="card-img-top rounded-top" alt="..." style="object-fit: cover;">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-center fs-6 fw-bold">Business Name 2</h5>
                                                                <p class="desc-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, pariatur!</p>
                                                                <div class="row d-flex justify-content-evenly align-items-center">
                                                                    <div class="col d-flex justify-content-evenly align-items-center">
                                                                        <h5 class="desc-text fw-bold">feat1</h5>
                                                                    </div>
                                                                    <div class="col d-flex justify-content-evenly align-items-center">
                                                                        <h5 class="desc-text fw-bold">feat2</h5>
                                                                    </div>
                                                                    <div class="col d-flex justify-content-evenly align-items-center">
                                                                        <h5 class="desc-text fw-bold">feat3</h5>
                                                                    </div>
                                                                    <div class="col d-flex justify-content-evenly align-items-center">
                                                                        <h5 class="desc-text fw-bold">feat4</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>

        <section id="contact" class="contact-container">
            <div class="container-fluid p-5 bg-success-subtle">
                <div class="row justify-content-evenly">
                    <div class="col-lg-4 col-sm-5 gx-5 mb-4">
                        <div class="col-12">
                            <h5 class="text-start text-success fw-bold">CONTACT US</h5>
                        </div>
                        <div class="col-12">
                            <h3 class="text-start text-dark">Get in touch with us</h3>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="text" class="form-label text-start text-dark ms-2">Name</label>
                            <input type="text" class="form-control shadow" name="" placeholder="Juan Dela Cruz">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label text-start text-dark ms-2">Email address</label>
                            <input type="email" class="form-control shadow" name="" placeholder="name@example.com">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="contact" class="form-label text-start text-dark ms-2">Phone number</label>
                            <input type="number" class="form-control shadow" name="" placeholder="09123456789">
                        </div>
                        <div class="col-12 mb-5">
                            <label for="message" class="form-label text-start text-dark ms-2">Message</label>
                            <textarea class="form-control shadow" name="" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-1 d-grid">
                            <button class="btn btn-success shadow">Submit</button>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-5 gx-5 bg-light">
                        <div id="googleMap" style="width:100%;height:400px;"></div>
                        <script>
                            function myMap() {
                                var mapProp = {
                                    center: new google.maps.LatLng(14.1591, 121.4709),
                                    zoom: 5,
                                };
                                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                            }
                        </script>

                        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
                        <!-- <img src="../homepage/majayjaymap.PNG" class="mt-4 w-100 h-50 shadow" alt="" style="object-fit: cover;"> -->
                        <div class="row">
                            <div class="col-12">
                                <p class="text-start text-dark fw-bold mt-3">Contact us</p>
                                <p><i class="bi bi-envelope-at text-dark me-2"></i><a href="" class="text-dark">majayjaylaguna@gmail.com</a></p>
                            </div>
                            <div class="col-12 ">
                                <p class="text-start text-dark fw-bold mt-2">Location</p>
                                <p><i class="bi bi-geo-alt text-dark me-2"></i><a href="" class="text-dark">Majayjay, Laguna, Philippines</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer-container bg-success">
            <div class="container-fluid ">
                <div class="row ">
                    <div class="col-6 text-start mt-2">
                        <p class="mb-0">
                            <a href="#" class="text-decoration-none text-dark">
                                <strong>HaKingz</strong>
                            </a>
                        </p>
                    </div>
                    <div class="col-6 text-end mt-2">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none text-dark">Contact</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none text-dark">About Us</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none text-dark">Terms</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none text-dark">Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>