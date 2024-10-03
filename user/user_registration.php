<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/registration.css">
</head>

<body>
    <main>
        <div class="background"></div>
        <form method="POST">
            <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="card shadow" style="width: 900px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-item-center">
                            <a href="../homepage/homepage.php"><i class="bi bi-x-lg text-success btn-close"></i></a>
                        </div>
                        <div class="row mx-3">
                        <div class="col-lg-5 d-flex justify-content-center align-items-center">
                                <img src="../img/general-img/majayjay-logo.webp" alt="" height="250" width="250">
                            </div>
                            <div class="col-lg-7 text-center">
                                <h4 class=" text-center mb-3">SIGN UP</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="u_fname" class="form-control shadow" placeholder="" required>
                                            <label for="">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="u_lname" class="form-control shadow" placeholder="" required>
                                            <label for="">Last name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" name="u_email" class="form-control shadow" placeholder="" required>
                                            <label for="">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" name="u-contact" class="form-control shadow" placeholder="" required>
                                            <label for="">Contact Number</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="u-address" class="form-control shadow" placeholder="" required>
                                            <label for="">Address</label>
                                            <span class="badge text-secondary">Ex.(Street, Barangay,Municipality/City, Province)</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="u-address" class="form-control shadow" placeholder="" required>
                                            <label for="">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-4">
                                            <input type="text" name="u-address" class="form-control shadow" placeholder="" required>
                                            <label for="">Confirm Password</label>
                                        </div>
                                    </div>
                                    <div class="d-grid ">
                                        <button type="submit" class="btn btn-success">SIGN UP</button>
                                        <hr>
                                        <p>Already have an account? <a href="../user/user_login.php" class=" btn btn-primary">LOG IN</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <script src="../sweetalert2/jquery-3.7.1.min.js"></script>
    <script src="../sweetalert2/sweetalert2.all.min.js"></script>
</body>

</html>