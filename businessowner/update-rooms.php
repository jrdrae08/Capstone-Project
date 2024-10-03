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
    <title>Sub-admin Dashboard</title>
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

            <main class="content px-3 py-2">
                <div class="mb-3">
                    <h3>Manage Accommodation</h3>
                </div>
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10">
                            <div class="card border-0 shadow">
                                <div class="card-header">
                                    <h4>Add Room</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row m-1">
                                            <h5 class="fw-bold mb-4">Room Information</h5>
                                            <div class="col-lg-5 col-sm-12 ">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control shadow" placeholder="" required>
                                                            <label>Room name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control shadow" placeholder="" required>
                                                            <label>Price</label>
                                                            <span class="badge text-secondary"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control shadow" placeholder="" required>
                                                            <label>Adult (Max.)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control shadow" placeholder="" required>
                                                            <label>Children (Max.)</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10 mb-3">
                                                        <div class="form-floating">
                                                            <textarea class="form-control shadow" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                            <label for="floatingTextarea2">Room Descriptions</label>
                                                        </div>
                                                    </div>

                                                    <h5 class="fw-bold mt-4">Facilities</h5>
                                                    <div class="col-lg-10 mb-4">

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities1" value="Bedroom">
                                                            <label class="form-check-label">Bedroom</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities2" value="Balcony">
                                                            <label class="form-check-label">Balcony</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities3" value="Comfort Room">
                                                            <label class="form-check-label">Comfort Room</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities4" value="Kitchen">
                                                            <label class="form-check-label">Kitchen</label>
                                                        </div>
                                                    </div>

                                                    <h5 class="fw-bold">Features</h5>
                                                    <div class="col-lg-10 mb-5">

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="features1" value="Aircon">
                                                            <label class="form-check-label">Aircon</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="features2" value="Wi-Fi">
                                                            <label class="form-check-label">Wi-Fi</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="features3" value="Television">
                                                            <label class="form-check-label">TV</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="features4" value="Shower">
                                                            <label class="form-check-label">Shower</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-7 col-sm-12 d-flex justify-content-evenly align-items-center">
                                                <div class="row">
                                                    <h4 class="text-center fw-bold">Room Images</h4>
                                                    <div class="col-lg-4 col-md-6 mb-3 text-center">
                                                        <p>Image 1</p>
                                                        <input name="image1" type="file" id="room-image-input-1" style="display: none;" accept="image/*" onchange="uploadImage('room-image-input-1', 'room-image-1')" value="">
                                                        <label for="room-image-input-1" class="image-container">
                                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Room Image" id="room-image-1">
                                                        </label>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 mb-3 text-center">
                                                        <p>Image 2</p>
                                                        <input name="image2" type="file" id="room-image-input-2" style="display: none;" accept="image/*" onchange="uploadImage('room-image-input-2', 'room-image-2')" value="">
                                                        <label for="room-image-input-2" class="image-container">
                                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Room Image" id="room-image-2">
                                                        </label>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 col-md-6 mb-3 text-center">
                                                        <p>Image 3</p>
                                                        <input name="image3" type="file" id="room-image-input-3" style="display: none;" accept="image/*" onchange="uploadImage('room-image-input-3', 'room-image-3')" value="">
                                                        <label for="room-image-input-3" class="image-container">
                                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Room Image" id="room-image-3">
                                                        </label>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 mb-3 text-center">
                                                        <p>Image 4</p>
                                                        <input name="image4" type="file" id="room-image-input-4" style="display: none;" accept="image/*" onchange="uploadImage('room-image-input-4', 'room-image-4')" value="">
                                                        <label for="room-image-input-4" class="image-container">
                                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Room Image" id="room-image-4">
                                                        </label>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 mb-3 text-center">
                                                        <p>Image 5</p>
                                                        <input name="image5" type="file" id="room-image-input-5" style="display: none;" accept="image/*" onchange="uploadImage('room-image-input-5', 'room-image-5')" value="">
                                                        <label for="room-image-input-5" class="image-container">
                                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Room Image" id="room-image-5">
                                                        </label>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 mb-3 text-center">
                                                        <p>Image 6</p>
                                                        <input name="image6" type="file" id="room-image-input-6" style="display: none;" accept="image/*" onchange="uploadImage('room-image-input-6', 'room-image-6')" value="">
                                                        <label for="room-image-input-6" class="image-container">
                                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Room Image" id="room-image-6">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-success px-4 me-2">SAVE</button>
                                            <a href="../businessowner/manage-rooms.php" class="btn btn-secondary">CANCEL</a>
                                        </div>
                                    </form>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/businessowner.js"></script>
</body>


</html>