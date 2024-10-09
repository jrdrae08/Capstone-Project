<?php
include '../backends/subadmin/fetch_alldestination_category.php';

// Check if businessInfoID is set in the URL
if (isset($_GET['businessInfoID'])) {
    // Unset the businessInfoID parameter
    $url = strtok($_SERVER["REQUEST_URI"], '?'); // Get the URL without query parameters
    header("Location: $url"); // Redirect to the URL without businessInfoID
    exit(); // Ensure the script stops executing after the redirect
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majayjay Website</title>
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
    <link rel="stylesheet" href="../../Resort/new-resort-ui.css">
    <style>
        .custom-img img {
            height: 400px;
            object-fit: cover;
        }

        .card .img-fit {
            aspect-ratio: 16 / 9;
            object-fit: cover;
        }

        @media screen {}
    </style>
</head>

<body>
    <main class="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid my-1">
                <a class="navbar-brand ms-5 text-light" href="#">
                    <img src="../../resort/majayjay-logo.webp" alt="Majayjay Logo" height="50">
                    <span>Majayjay,Laguna</span>
                </a>
                <button class="navbar-toggler shadow" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-light btn btn-nav btn-success shadow" href="#">HOME</a>
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
                    </ul>
                </div>
            </div>
        </nav>

        <section class="first-page" id="first-page">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <!-- <div class="col-lg-4 py-3 ps-5 d-flex justify-content-start align-items-center">
                        <a href="../page-1.php"><i class="bi bi-arrow-left-circle fw-bold text-light fs-1 text-shadow-light"></i></a>
                    </div>

                    <div class="col-lg-5 py-3 ms-auto">
                        <div class="row">
                            <div class="col text-center">
                                <a href="../page-2.php" class="page-nav active mx-2 text-light rounded-0 cormorant-text fw-bold text-shadow-light">Accommodations</a>
                            </div>
                            <div class="col text-center">
                                <a href="" class="page-nav mx-2 text-light rounded-0 cormorant-text fw-bold text-shadow-light">Events</a>
                            </div>
                            <div class="col text-center">
                                <a href="../page-2.php" class="page-nav-book btn mx-2 mt-2  rounded-0 cormorant-text fw-bold text-shadow-light">BOOK NOW</a>

                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="page-0-title-container">
                    <h1 class="page-title text-light text-center cormorant-text fw-bold ">Discover Majayjay</h1>
                </div>
            </div>
        </section>

        <section>
            <div class="accommodation-nav bg-color-1 m-0 py-1">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-pills d-flex justify-content-center align-items-center py-2" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link dm-sans-text active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link dm-sans-text" id="pills-falls-tab" data-bs-toggle="pill" data-bs-target="#pills-falls" type="button" role="tab" aria-controls="pills-falls" aria-selected="false">Falls</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link dm-sans-text" id="pills-farms-tab" data-bs-toggle="pill" data-bs-target="#pills-farms" type="button" role="tab" aria-controls="pills-farms" aria-selected="false">Farms</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link dm-sans-text" id="pills-resort-tab" data-bs-toggle="pill" data-bs-target="#pills-resort" type="button" role="tab" aria-controls="pills-resort" aria-selected="false">Resort</button>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="destination-page bg-color-5 shadow">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                        <div class="row destination-lists mx-2">
                            <?php foreach ($businesses as $business): ?>
                                <div class="col-md-6 col-12">
                                    <a href="page-1.php?businessInfoID=<?php echo urlencode($business['BusinessInfoID']); ?>" class="text-decoration-none">
                                        <div class="card mb-3 shadow d-flex justify-content-center">
                                            <div class="row g-0 h-100 w-100">
                                                <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                    <img src="../../businessowner/businessmediacategory/<?php echo htmlspecialchars($business['Thumbnail']); ?>" class="img-fluid rounded-start" alt="Business Image" style="object-fit: cover; height: 290px; width: 100%;">
                                                </div>
                                                <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                    <div class="card-body">
                                                        <h5 class="card-title card-title-1 cormorant-text text-color-1"><?php echo htmlspecialchars($business['BusinessName']); ?></h5>
                                                        <p class="card-text-1 dm-sans-text"><?php echo htmlspecialchars($business['Quotation']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>

                            <!-- <div class="col-md-6 col-12">
                                <a href="../../resort/page-1.php" class="text-decoration-none">
                                    <div class="card mb-3 shadow d-flex justify-content-center">
                                        <div class="row g-0 h-100 w-100">
                                            <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                <img src="../../resort/Falls.jpg" class="img-fluid rounded-start" alt="Hilarion's Farm and Resort" style="object-fit: cover; height: 290px; width: 100%;">
                                            </div>
                                            <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                <div class="card-body">
                                                    <h5 class="card-title card-title-1  cormorant-text text-color-1">Taytay Falls</h5>
                                                    <p class="card-text-1 dm-sans-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <p class="card-text dm-sans-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> -->



                            <div class="tab-pane fade" id="pills-farms" role="tabpanel" aria-labelledby="pills-farms-tab" tabindex="0">
                                <div class="row destination-lists mx-2">
                                    <div class="col-md-6 col-12">
                                        <a href="../../resort/page-1.php" class="text-decoration-none">
                                            <div class="card mb-3 shadow d-flex justify-content-center">
                                                <div class="row g-0 h-100 w-100">
                                                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                        <img src="../../resort/hilarion2.jpg" class="img-fluid rounded-start" alt="Hilarion's Farm and Resort" style="object-fit: cover; height: 290px; width: 100%;">
                                                    </div>
                                                    <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                        <div class="card-body">
                                                            <h5 class="card-title card-title-1  cormorant-text text-color-1">Hilarion's Farm and Resort</h5>
                                                            <p class="card-text-1 dm-sans-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                            <p class="card-text dm-sans-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <a href="../../resort/page-1.php" class="text-decoration-none">
                                            <div class="card mb-3 shadow d-flex justify-content-center">
                                                <div class="row g-0 h-100 w-100">
                                                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                        <img src="../../resort/hilarion2.jpg" class="img-fluid rounded-start" alt="Hilarion's Farm and Resort" style="object-fit: cover; height: 290px; width: 100%;">
                                                    </div>
                                                    <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                        <div class="card-body">
                                                            <h5 class="card-title card-title-1  cormorant-text text-color-1">Hilarion's Farm and Resort</h5>
                                                            <p class="card-text-1 dm-sans-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                            <p class="card-text dm-sans-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <a href="../../resort/page-1.php" class="text-decoration-none">
                                            <div class="card mb-3 shadow d-flex justify-content-center">
                                                <div class="row g-0 h-100 w-100">
                                                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                        <img src="../../resort/hilarion2.jpg" class="img-fluid rounded-start" alt="Hilarion's Farm and Resort" style="object-fit: cover; height: 290px; width: 100%;">
                                                    </div>
                                                    <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                        <div class="card-body">
                                                            <h5 class="card-title card-title-1  cormorant-text text-color-1">Hilarion's Farm and Resort</h5>
                                                            <p class="card-text-1 dm-sans-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                            <p class="card-text dm-sans-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-resort" role="tabpanel" aria-labelledby="pills-resort-tab" tabindex="0">
                                <div class="row destination-lists mx-2">
                                    <div class="col-md-6 col-12">
                                        <a href="../../resort/page-1.php" class="text-decoration-none">
                                            <div class="card mb-3 shadow d-flex justify-content-center">
                                                <div class="row g-0 h-100 w-100">
                                                    <div class="col-xl-7 col-lg-12 col-md-12 col-12">
                                                        <img src="../../resort/hilarion2.jpg" class="img-fluid rounded-start" alt="Hilarion's Farm and Resort" style="object-fit: cover; height: 290px; width: 100%;">
                                                    </div>
                                                    <div class="col-xl-5 col-lg-12 col-md-12 col-12">
                                                        <div class="card-body">
                                                            <h5 class="card-title card-title-1  cormorant-text text-color-1">Hilarion's Farm and Resort</h5>
                                                            <p class="card-text-1 dm-sans-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                            <p class="card-text dm-sans-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
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
        </section>


        <section id="contact" class="contact-container shadow">
            <div class="container-fluid p-5 bg-color-6">
                <div class="row justify-content-evenly">
                    <div class="col-lg-4 col-sm-5 gx-5 mb-4">
                        <div class="col-12">
                            <h5 class="text-start text-success fw-bold dm-sans-text">CONTACT US</h5>
                        </div>
                        <div class="col-12">
                            <h3 class="text-start text-dark cormorant-text">Get in touch with us</h3>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="text" class="form-label text-start text-dark dm-sans-text ms-2">Name</label>
                            <input type="text" class="form-control shadow" name="" placeholder="Juan Dela Cruz">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label text-start text-dark dm-sans-text ms-2">Email address</label>
                            <input type="email" class="form-control shadow" name="" placeholder="name@example.com">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="contact" class="form-label text-start text-dark dm-sans-text ms-2">Phone number</label>
                            <input type="number" class="form-control shadow" name="" placeholder="09123456789">
                        </div>
                        <div class="col-12 mb-5">
                            <label for="message" class="form-label text-start text-dark dm-sans-text ms-2">Message</label>
                            <textarea class="form-control shadow" name="" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-1 d-grid">
                            <button class="btn btn-success shadow dm-sans-text">Submit</button>
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
                                <p class="text-start text-dark fw-bold mt-3 dm-sans-text">Contact us</p>
                                <p><i class="bi bi-envelope-at text-dark me-2"></i><a href="" class="text-dark dm-sans-text">majayjaylaguna@gmail.com</a></p>
                            </div>
                            <div class="col-12 ">
                                <p class="text-start text-dark fw-bold mt-2 dm-sans-text">Location</p>
                                <p><i class="bi bi-geo-alt text-dark me-2"></i><a href="" class="text-dark dm-sans-text">Majayjay, Laguna, Philippines</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer-container bg-color-1">
            <div class="container-fluid ">
                <div class="row ">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>


<script src="../homepage/homepage.js"></script>

<script>
    function truncateText(selector, wordLimit) {
        const element = document.querySelector(selector);
        let text = element.innerText;
        let words = text.split(' ');

        if (words.length > wordLimit) {
            let truncated = words.slice(0, wordLimit).join(' ') + '...';
            element.innerText = truncated;
        }
    }

    truncateText('#truncated-text', 25);
</script>

</html>