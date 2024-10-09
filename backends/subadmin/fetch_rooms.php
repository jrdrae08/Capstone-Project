<?php
// Include the database connection
include '../includes/db.php';

// Get the businessInfoID and roomID from the URL
$businessInfoID = isset($_GET['businessInfoID']) ? (int) $_GET['businessInfoID'] : 1;
$roomID = isset($_GET['roomID']) ? (int) $_GET['roomID'] : 1;

try {
  // Query to fetch room information based on businessInfoID and roomID
  $stmt = $pdo->prepare("
        SELECT roomName, roomPrice, RoomDescriptions, image1
        FROM roominfotable
        WHERE BusinessInfoID = :businessInfoID AND roomID = :roomID
    ");
  $stmt->execute(['businessInfoID' => $businessInfoID, 'roomID' => $roomID]);
  $room = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
