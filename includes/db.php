<?php
// db.php
$dsn = 'mysql:host=localhost;dbname=majayjaytourist';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Successfully connected to the database.';
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>