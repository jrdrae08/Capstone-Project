<?php
include "../includes/db.php";
session_start();

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Password validation regex
    $password_pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/';

    if (empty($new_password) || empty($confirm_password)) {
        $_SESSION['message'] = 'All fields are required.';
        $_SESSION['message_type'] = 'danger';
        header("Location: changepass.php");
        exit;
    }

    if ($new_password !== $confirm_password) {
        $_SESSION['message'] = 'Passwords do not match.';
        $_SESSION['message_type'] = 'danger';
        header("Location: changepass.php");
        exit;
    }

    if (!preg_match($password_pattern, $new_password)) {
        $_SESSION['message'] = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
        $_SESSION['message_type'] = 'danger';
        header("Location: changepass.php");
        exit;
    }

    if (!empty($new_password) && !empty($confirm_password) && $new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("UPDATE account SET PasswordHash = ?, FirstLoginRequired = 0 WHERE AccountID = ?");
        $stmt->execute([$hashed_password, $_SESSION['user_id']]);

        $_SESSION['message'] = 'Password changed successfully!';
        $_SESSION['message_type'] = 'success';
        header("Location: changepass.php?message=success");
        exit;
    }
}

if (isset($_GET['message']) && $_GET['message'] == 'success') {
    $message = 'Password changed successfully!';
    $message_type = 'success';
} elseif (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    $message_type = $_SESSION['message_type'];
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/login.css">
    <title>Change Password</title>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'success') : ?>
        <script>
            setTimeout(function() {
                window.location.href = '../login.php';
            }, 3000); // 3 seconds delay
        </script>
    <?php endif; ?>
    <style>
        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-out;
        }
    </style>
</head>

<body>

    <main>
        <div class="container d-flex justify-content-lg-center align-items-center" style="height: 100vh;">
            <div class="card text-center shadow" style="width: 700px;">
                <div class="card-body mx-2">
                    <div class="row">
                        <div class="col-lg-6 justify-content-center">
                            <img src="/image/majayjay-logo.webp" class="mt-4" alt="" height="250" width="250">
                        </div>
                        <div class="col-lg-6">
                            <h4 class="my-3">Reset your password</h4>
                            <?php if (!empty($message)) : ?>
                                <div class="alert alert-<?= htmlspecialchars($message_type) ?> alert-dismissible fade show" role="alert">
                                    <?= htmlspecialchars($message) ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <form action="changepass.php" method="POST">
                                Password Should be at least 8 characters long and must contain at least one uppercase letter, one lowercase letter, one number, and one special character.
                                <div class="form-floating mt-4">
                                    <input type="password" class="form-control shadow border-secondary" id="floatingPassword" name="new_password" placeholder="Password" autocomplete="off" required>
                                    <label for="floatingPassword">New Password</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="password" class="form-control shadow border-secondary" id="floatingConfirmPassword" name="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
                                    <label for="floatingConfirmPassword">Confirm Password</label>
                                </div>
                                <div class="d-grid gap-1 my-4">
                                    <button type="submit" class="btn btn-success">Confirm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.classList.add('fade-out');
                    setTimeout(() => {
                        alertBox.style.display = 'none';
                    }, 1000); // Match the CSS transition duration
                }, 5000); // Wait 5 seconds before starting the fade out
            }
        });
    </script>
</body>

</html>