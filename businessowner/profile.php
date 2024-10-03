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
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Profile Informations</h4>
                    </div>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-header">
                                <h5 class="card-title">Business Photos</h5>
                            </div>
                            <h5 class="text-center mt-2">Business Logo</h5>
                            <div class="col-lg-12 text-center mb-3">
                                <input name="slogo1" type="file" id="logo-image-input-1" style="display: none;" accept="image/*" onchange="uploadImage('logo-image-input-1', 'logo-image-1')" value="">
                                <label for="logo-image-input-1" class="image-container">
                                    <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Image" id="logo-image-1" height="200" width="200">
                                </label>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <h5 class="text-center mt-2">Business Photos</h5>
                                    <div class="col-md-3 text-center mb-3">
                                        <input name="sub-image1" type="file" id="sub-image-input-1" style="display: none;" accept="image/*" onchange="uploadImage('sub-image-input-1', 'sub-image-1')" value="">
                                        <label for="sub-image-input-1" class="image-container">
                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Image" id="sub-image-1" height="200" width="200">
                                        </label>
                                    </div>
                                    <div class="col-md-3 text-center mb-3">
                                        <input name="sub-image2" type="file" id="sub-image-input-2" style="display: none;" accept="image/*" onchange="uploadImage('sub-image-input-2', 'sub-image-2')" value="">
                                        <label for="sub-image-input-2" class="image-container">
                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Image" id="sub-image-2" height="200" width="200">
                                        </label>
                                    </div>
                                    <div class="col-md-3 text-center mb-3">
                                        <input name="sub-image3" type="file" id="sub-image-input-3" style="display: none;" accept="image/*" onchange="uploadImage('sub-image-input-3', 'sub-image-3')" value="">
                                        <label for="sub-image-input-3" class="image-container">
                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Image" id="sub-image-3" height="200" width="200">
                                        </label>
                                    </div>
                                    <div class="col-md-3 text-center mb-3">
                                        <input name="sub-image4" type="file" id="sub-image-input-4" style="display: none;" accept="image/*" onchange="uploadImage('sub-image-input-4', 'sub-image-4')" value="">
                                        <label for="sub-image-input-4" class="image-container">
                                            <img src="../img/general-img/insert.png" class="rounded img-fluid shadow border" alt="Image" id="sub-image-4" height="200" width="200">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-header">
                                <h5 class="card-title">Business Details</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <span>Introduction <i>(Insert the details of your establishment)</i></span>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control shadow border-secondary" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Details</label>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="row">
                                        <span>Contact Numbers <i>(Input at least 1 contact number)</i></span>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" autocomplete="off" class="form-control shadow border-secondary" id="floatingaddress" placeholder="Yukos" required>
                                                <label for="floatingPassword">Mobile Number</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 mb-3">
                                            <div class="form-floating">
                                                <input type="text" autocomplete="off" class="form-control shadow border-secondary" id="floatingaddress" placeholder="Yukos" required>
                                                <label for="floatingPassword">Telephone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <span>Address <i>(Insert the exact address of your estabishment)</i></span>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" autocomplete="off" class="form-control shadow border-secondary" id="floatingaddress" placeholder="Yukos" required>
                                                <label for="floatingPassword">Barangay</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" autocomplete="off" class="form-control shadow border-secondary" id="floatingaddress" placeholder="Monserrat" required>
                                                <label for="floatingPassword">Street</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" autocomplete="off" class="form-control shadow border-secondary" id="floatingaddress" placeholder="Nagcarlan" required>
                                                <label for="floatingPassword">Municipality</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" autocomplete="off" class="form-control shadow border-secondary" id="floatingaddress" placeholder="Laguna" required>
                                                <label for="floatingPassword">Province</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-success px-4 m-2">Save Changes</button>
                                    <a href="/admin/index.php" class="btn btn-secondary px-4">Cancel</a>
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

<script>

</script>

</html>