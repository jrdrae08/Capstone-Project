<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'barangay') {
  header('Location: ../login.php');
  exit;
}
?>
<!-- Barangay dashboard content goes here -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Falls</title>
</head>

<body>
  Welcome to barangay Falls! We are committed to providing safe and welcoming environments for all residents.
</body>

</html>