<?php
// fetch_rooms.php
session_start();
require_once '../../includes/db.php'; // Include your database connection file

// Check if the session for BusinessInfoID is set
if (isset($_SESSION['business_info_id'])) {
  $businessInfoID = $_SESSION['business_info_id'];

  // Prepare and execute the query to fetch rooms for the logged-in business
  $stmt = $pdo->prepare('SELECT roomID, roomName FROM roominfotable WHERE BusinessInfoID = :businessInfoID');
  $stmt->execute(['businessInfoID' => $businessInfoID]);

  // Fetch all room data as an associative array
  $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return the rooms as a JSON response
  echo json_encode($rooms);
} else {
  // Return an error response if BusinessInfoID is not set in the session
  echo json_encode(['error' => 'No BusinessInfoID found in session']);
}
