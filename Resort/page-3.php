<?php
// Include the database connection
include '../includes/db.php';

// Get the roomID from the URL, defaulting to 1 if not set
$businessInfoID = isset($_GET['businessInfoID']) ? (int) $_GET['businessInfoID'] : 1;
$roomID = isset($_GET['roomID']) ? (int) $_GET['roomID'] : 1;

try {
    // Query to fetch room information based on roomID
    $stmt = $pdo->prepare("
        SELECT roomID, roomName, roomPrice, RoomDescriptions, image1, image2, image3, image4, image5, image6, BusinessInfoID
        FROM roominfotable
        WHERE roomID = :roomID
    ");
    $stmt->execute(['roomID' => $roomID]);
    $room = $stmt->fetch(PDO::FETCH_ASSOC);

    // Query to fetch business information based on BusinessInfoID
    $stmt = $pdo->prepare("
        SELECT BusinessName, BusinessAddress, BusinessEmail, BusinessContactNumber
        FROM businessinformationform
        WHERE BusinessInfoID = :businessInfoID
    ");
    $stmt->execute(['businessInfoID' => $room['BusinessInfoID']]);
    $businessInfo = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
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
    <link rel="stylesheet" href="../../resort/new-resort-ui.css">
    <style>

    </style>
</head>

<body>
    <main class="content">
        <!-- <nav class="navbar navbar-expand-lg">
            <div class="container-fluid my-1">
                <a class="navbar-brand ms-5 text-light" href="#">
                    <img src="../majayjay-logo.webp" alt="Majayjay Logo" height="50">
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
        </nav> -->

        <section class="first-page" id="first-page">
            <div class="container-fluid">
                <div class="row d-flex justify-content-around">
                    <div class="col-lg-4 py-3 ps-5 d-flex justify-content-start align-items-center">
                        <a href="../../resort/page-2.php?businessInfoID=<?php echo $businessInfoID; ?>">
                            <i class="bi bi-arrow-left-circle fw-bold text-light fs-1 text-shadow-light"></i>
                        </a>
                    </div>

                    <div class="col-lg-5 py-3 ms-auto">
                        <div class="row">
                            <div class="col text-center">
                                <a href="../../resort/page-2.php" class="page-nav active mx-2 text-light rounded-0 cormorant-text fw-bold text-shadow-light">Accommodations</a>
                            </div>
                            <div class="col text-center">
                                <a href="" class="page-nav mx-2 text-light rounded-0 cormorant-text fw-bold text-shadow-light">Events</a>
                            </div>
                            <div class="col text-center">
                                <a href="../../resort/page-2.php" class="page-nav-book btn mx-2 mt-2  rounded-0 cormorant-text fw-bold text-shadow-light">BOOK NOW</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-title-container">
                    <h1 class="page-title text-light text-center cormorant-text fw-bold "><?php echo htmlspecialchars($room['roomName']); ?></h1>
                </div>
            </div>
        </section>

        <section class="room-page-title bg-color-5" id="room-page-title">
            <div class="accommodation-nav bg-color-1 m-0 py-3">
                <div class="d-flex justify-content-center">
                    <a href="" class="text-decoration-none">
                        <h3 class="nav text-nav text-light me-2 dm-sans-text">Home ></h3>
                    </a>
                    <a href="../../resort/page-2.php" class="text-decoration-none">
                        <h3 class="nav text-nav text-light me-2 dm-sans-text">Accommodations > </h3>
                    </a>
                    <a href="../../resort/page-3.php" class="text-decoration-none">
                        <h3 class="nav text-nav text-light dm-sans-text">Room</h3>
                    </a>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row room-page-info d-flex justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 my-3">
                        <div class="m-3">
                            <h5 class="text-dark dm-sans-text fw-bold">For only<span class="text-danger "> &#8369 <?php echo htmlspecialchars($room['roomPrice']); ?></span> /Night</h5>
                            <h1 class="text-color-1 cormorant-text fw-bold"><?php echo htmlspecialchars($room['roomName']); ?></h1>
                            <p class="text-secondary dm-sans-text"><?php echo htmlspecialchars($room['RoomDescriptions']); ?></p>
                        </div>
                        <div class="image-content d-flex justify-content-center">
                            <img src="<?php echo htmlspecialchars($room['image1']); ?>" class="img-fluid" alt="">
                        </div>
                        <div class="m-3 my-5">
                            <h1 class="text-color-1 cormorant-text fw-bold">Amenities</h1>
                            <h5>
                                <ul class="text-dark mb-5">
                                    <li class="dm-sans-text">Wi-fi</li>
                                </ul>
                            </h5>
                            <h1 class="text-color-1 cormorant-text fw-bold">Facilities</h1>
                            <h5>
                                <ul class="text-dark">
                                    <li class="dm-sans-text">Kitchen</li>
                                    <li class="dm-sans-text">Comfort-room</li>
                                </ul>
                            </h5>
                        </div>

                        <div class=" more-image mb-5">
                            <h1 class="text-color-1 cormorant-text px-3 fw-bold">More Images:</h1>
                            <div id="carouselExampleIndicators" class="carousel slide custom-carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                </div>
                                <div class="carousel-inner">
                                    <?php for ($i = 2; $i <= 6; $i++): ?>
                                        <?php if (!empty($room["image$i"])): ?>
                                            <div class="carousel-item <?php echo $i == 2 ? 'active' : ''; ?>">
                                                <img src="<?php echo htmlspecialchars($room["image$i"]); ?>" class="img-fluid d-block w-100" alt="...">
                                            </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>
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
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-8 my-3">
                        <div class="card bg-color-1 shadow">
                            <div class="card-body">
                                <div class="row m-1 d-flex justify-content-center">
                                    <h5 class="card-title cormorant-text fs-2 text-light my-3">Your Reservation</h5>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control shadow" id="floatingInput" placeholder="" required>
                                            <label for="floatingcin" class="fw-bold dm-sans-text">Check In</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control shadow" id="floatinginput" placeholder="" required>
                                            <label for="floatingcout" class="fw-bold dm-sans-text">Check Out</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control shadow" name="" placeholder=" " required>
                                            <label for="" class="dm-sans-text">Email Address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control shadow" name="" placeholder=" " required>
                                            <label for="" class="dm-sans-text">Contact Number</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control shadow" id="floatinginput" placeholder="" required>
                                            <label for="floatingcout" class="dm-sans-text">Total No. of Visitors</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                            <label for="floatingcout" class="dm-sans-text">No. of Adults</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                            <label for="floatingcout" class="dm-sans-text">No. of Children</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                            <label for="floatingcout" class="dm-sans-text">No. of Males</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                            <label for="floatingcout" class="dm-sans-text">No. of Females</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <select class="form-select shadow" id="floatingSelect" name="" aria-label="Floating label select example">
                                                <option selected class="dm-sans-text">Select your Address</option>
                                                <option value="1" class="dm-sans-text">This City/Municipality</option>
                                                <option value="2" class="dm-sans-text">Other City/Municipality</option>
                                                <option value="2" class="dm-sans-text">Other Province</option>
                                                <option value="3" class="dm-sans-text">Foreign Country</option>
                                            </select>
                                            <label for="floatingSelect" class="dm-sans-text">Select your Address Location</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control shadow" name="" placeholder=" " required>
                                            <label for="" class="dm-sans-text">Exact Address</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 d-grid my-4">
                                        <h5 class="text-light dm-sans-text fw-bold">Price:<span class="text-danger"> &#8369 <?php echo htmlspecialchars($room['roomPrice']); ?></span> /night</h5>
                                        <button class="btn btn-success shadow dm-sans-text fw-bold">BOOK NOW!</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="resort-quick-information mt-5">
                            <h3 class="cormorant-text fw-bold text-color-1">Resort Information</h3>
                            <div class="text-dark ms-5">
                                <h5>Email: <?php echo htmlspecialchars($businessInfo['BusinessEmail']); ?></h5>
                                <h5>Contact Number: <?php echo htmlspecialchars($businessInfo['BusinessContactNumber']); ?></h5>
                                <h5>Location Address: <?php echo htmlspecialchars($businessInfo['BusinessAddress']); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-8 col-xl-10 col-lg-10 col-md-11 col-md-12 mx-3 mb-5">
                        <div class="d-flex justify-content-tstart">
                            <h1 class="text-dark cormorant-text display-3 fw-bold mt-5">Related Rooms</h1>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
                                <div class="card shadow custom-card-height rounded-0 overflow-hidden">
                                    <div class="img-container">
                                        <img src="../../resort/wallpaper2.jpg" class="card-img-top rounded-0" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <div class="price-overlay shadow bg-light rounded-5">
                                            <h5 class="p-3 text-center text-secondary">Price: <span class="text-danger">&#8369 2500</span>/Night</h5>
                                        </div>
                                        <h3 class="card-title text-color-1 fw-bold cormorant-text">Kubo ni John Angel</h3>
                                        <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="../../resort/page-3.php" class="btn btn-book fw-bold rounded-0 py-3 px-4">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
                                <div class="card shadow custom-card-height rounded-0">
                                    <img src="../../resort/cabin.webp" class="card-img-top rounded-0" alt="...">
                                    <div class="card-body">
                                        <div class="price-overlay shadow bg-light rounded-5">
                                            <h5 class="p-3 text-center text-secondary">Price: <span class="text-danger">&#8369 2500</span>/Night</h5>
                                        </div>
                                        <h3 class="card-title text-color-1 fw-bold cormorant-text">Card title</h3>
                                        <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="../../resort/page-3.php" class="btn btn-book fw-bold rounded-0 py-3 px-4">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
                                <div class="card shadow custom-card-height rounded-0">
                                    <img src="../../resort/resort-sea-2.jpg" class="card-img-top rounded-0" alt="...">
                                    <div class="card-body">
                                        <div class="price-overlay shadow bg-light rounded-5">
                                            <h5 class="p-3 text-center text-secondary">Price: <span class="text-danger">&#8369 2500</span>/Night</h5>
                                        </div>
                                        <h3 class="card-title text-color-1 fw-bold cormorant-text">Card title</h3>
                                        <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="../../resort/page-3.php" class="btn btn-book fw-bold rounded-0 py-3 px-4">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
                                <div class="card shadow custom-card-height rounded-0">
                                    <img src="../../resort/resort-sea-2.jpg" class="card-img-top rounded-0" alt="...">
                                    <div class="card-body">
                                        <div class="price-overlay shadow bg-light rounded-5">
                                            <h5 class="p-3 text-center text-secondary">Price: <span class="text-danger">&#8369 2500</span>/Night</h5>
                                        </div>
                                        <h3 class="card-title text-color-1 fw-bold cormorant-text">Card title</h3>
                                        <p class="card-text text-secondary">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="../../resort/page-3.php" class="btn btn-book fw-bold rounded-0 py-3 px-4">BOOK NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact-container">
            <div class="container-fluid p-5 bg-color-6">
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


        <section class="footer-container bg-color-1">
            <div class="container-fluid ">
                <div class="row ">
                    <div class="col-6 text-start">
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