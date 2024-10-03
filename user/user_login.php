<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>
    <main>
        <div class="background"></div>
        <form method="POST">
            <div class="container d-flex justify-content-lg-center align-items-center" style="height: 100vh;">
                <div class="card text-center shadow" style="width: 700px; ">
                    <div class="card-body">
                    <div class="d-flex justify-content-end ">
                                <a href="../homepage/homepage.php"><i class="bi bi-x-lg text-success btn-close"></i></a>
                            </div>
                        <div class="row mx-2">
                            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                <img src="../img/general-img/majayjay-logo.webp" alt="" height="250" width="250">
                            </div>
                            <div class="col-lg-6">
                                <h4 class="my-3">SIGN IN</h4>
                                <div class="form-floating mt-4">
                                    <input type="text" class="form-control shadow " name="username" id="floatingEmail" placeholder="name@example.com" autocomplete="off" required>
                                    <label for="floatingEmail">Username</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="password" class="form-control shadow " name="password" id="floatingPassword" placeholder="Password" autocomplete="off" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <div class="d-grid gap-1">
                                    <a href=""><u>forgot password?</u></a>
                                    <button type="submit" class="btn btn-success">LOG IN</button>
                                    <hr>
                                    <a href="../user/user_registration.php" class="btn btn-primary mb-3">SIGN UP</a>
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