<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Information</title>
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
            width: 22%;
            /* Adjust as needed to fit within the container */
            padding-bottom: 12.375%;
            /* 16:9 aspect ratio */
            overflow: hidden;
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
                <a class="navbar-brand ms-5 text-light" href="#">
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
            <div class="container-fluid mt-3">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8 mb-4">
                        <div class="col-lg-12 card shadow mt-5">
                            <h1 class=" text-center my-4 text-dark">(Resort Name)</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="col-lg-12">
                                    <div class="card shadow">
                                        <div class="row g-0">
                                            <div class="col-md-5">
                                                <img src="../img/general-img/majayjay-church.jpg" class="img-fluid rounded-start card-thumbnail-img shadow" alt="...">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4 d-flex justify-content-between">
                                    <div class="col-4 image-container">
                                        <img src="../img/general-img/majayjay-church.jpg" alt="Image 1" class="rounded shadow">
                                    </div>
                                    <div class="image-container">
                                        <img src="../img/general-img/majayjay-church.jpg" alt="Image 2" class="rounded shadow">
                                    </div>
                                    <div class="image-container">
                                        <img src="../img/general-img/majayjay-church.jpg" alt="Image 3" class="rounded shadow">
                                    </div>
                                    <div class="image-container">
                                        <img src="../img/general-img/majayjay-church.jpg" alt="Image 4" class="rounded shadow">
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex justify-content-center mb-5">
                                    <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi id molestias at ipsa iusto corporis recusandae similique expedita blanditiis, qui quisquam ipsum debitis libero beatae consequuntur obcaecati veritatis culpa cupiditate! Maiores ea sint dolore atque incidunt, fugit, officia eum corporis minus explicabo quo quidem aspernatur unde. Laudantium animi labore nemo ad officiis! Dignissimos ut quis maxime, sit harum doloremque nobis, nam pariatur, odit quia corporis alias beatae. Hic veritatis quam sequi doloremque ducimus nostrum, excepturi, sint in, reiciendis obcaecati a? Explicabo recusandae amet, nulla repudiandae voluptate, error dolorem harum fugiat nemo distinctio doloribus inventore ab dicta minima placeat beatae doloremque?</p>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card bg-success-subtle shadow">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Book now!</h5>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control shadow" id="floatingInput" placeholder="" required>
                                                    <label for="floatingcin" class="fw-bold">Check In</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control shadow" id="floatinginput" placeholder="" required>
                                                    <label for="floatingcout" class="fw-bold">Check Out</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control shadow" name="" placeholder=" " required>
                                                    <label for="">Email Address</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" name="" placeholder=" " required>
                                                    <label for="">Contact Number</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" id="floatinginput" placeholder="" required>
                                                    <label for="floatingcout">Total No. of Visitors</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                                    <label for="floatingcout">No. of Adults</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                                    <label for="floatingcout">No. of Children</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                                    <label for="floatingcout">No. of Males</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control shadow" name="" id="floatinginput" placeholder="" required>
                                                    <label for="floatingcout">No. of Females</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select shadow" id="floatingSelect" name="" aria-label="Floating label select example">
                                                        <option selected>Select your Address</option>
                                                        <option value="1">This City/Municipality</option>
                                                        <option value="2">Other City/Municipality</option>
                                                        <option value="2">Other Province</option>
                                                        <option value="3">Foreign Country</option>
                                                    </select>
                                                    <label for="floatingSelect">Select your Address Location</label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control shadow" name="" placeholder=" " required>
                                                    <label for="">Exact Address</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 d-grid">
                                                <button class="btn btn-primary shadow">BOOK NOW!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-5">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <h3 class="text-success fw-bold mb-5">AVAILABLE ROOMS</h3>
                        </div>
                        <div class="col-lg-12 d-flex align-items-center justify-content-evenly">
                            <div class="row ">
                                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="card shadow" style="width: 15rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success px-5">VIEW</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="card shadow" style="width: 15rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success px-5">VIEW</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="card shadow" style="width: 15rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success px-5">VIEW</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                                    <div class="card shadow" style="width: 15rem;">
                                        <img src="../img/general-img/majayjay-church.jpg" class="card-img" alt="...">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success fw-bold">Card title</h5>
                                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <a href="../user/room-info.php" class="btn btn-success px-5">VIEW</a>
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
<script src="../homepage/homepage.js"></script>

</html>