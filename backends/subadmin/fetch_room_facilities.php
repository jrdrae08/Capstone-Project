<?php
session_start();
include '../../includes/db.php';

header('Content-Type: application/json'); // Ensure the response is in JSON format

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['business_info_id'])) {
  $businessInfoID = $_SESSION['business_info_id'];

  // Validate BusinessInfoID
  $stmt = $pdo->prepare('SELECT BusinessInfoID FROM businessinformationform WHERE BusinessInfoID = :businessInfoID');
  $stmt->execute(['businessInfoID' => $businessInfoID]);

  if ($stmt->rowCount() === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid BusinessInfoID']);
    exit;
  }

  // Fetch the facilities for this BusinessInfoID
  $stmt = $pdo->prepare('SELECT FacilityID, FacilityName FROM room_facilities WHERE BusinessInfoID = :businessInfoID');
  $stmt->execute(['businessInfoID' => $businessInfoID]);
  $facilities = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return the facilities as JSON
  echo json_encode(['status' => 'success', 'facilities' => $facilities]);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
