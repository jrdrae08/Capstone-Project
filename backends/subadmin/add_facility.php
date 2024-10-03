<?php
session_start();
include '../../includes/db.php';

header('Content-Type: application/json'); // Ensure the response is in JSON format

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['business_info_id'])) {
  $data = json_decode(file_get_contents('php://input'), true);
  $facilityName = trim($data['facilityName']);
  $businessInfoID = $_SESSION['business_info_id'];

  // Convert the facility name to Sentence Case
  $facilityName = ucfirst(strtolower($facilityName));

  // Validate Facility Name
  if (empty($facilityName)) {
    echo json_encode(['status' => 'error', 'message' => 'Facility name cannot be empty']);
    exit;
  }

  if (strlen($facilityName) > 255) {
    echo json_encode(['status' => 'error', 'message' => 'Facility name cannot exceed 255 characters']);
    exit;
  }

  // Validate BusinessInfoID
  $stmt = $pdo->prepare('SELECT BusinessInfoID FROM businessinformationform WHERE BusinessInfoID = :businessInfoID');
  $stmt->execute(['businessInfoID' => $businessInfoID]);

  if ($stmt->rowCount() === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid BusinessInfoID']);
    exit;
  }

  // Check if the facility already exists
  $stmt = $pdo->prepare('SELECT FacilityID FROM room_facilities WHERE FacilityName = :name AND BusinessInfoID = :businessInfoID');
  $stmt->execute(['name' => $facilityName, 'businessInfoID' => $businessInfoID]);

  if ($stmt->rowCount() > 0) {
    echo json_encode(['status' => 'error', 'message' => 'Facility already exists']);
    exit;
  }

  // Insert the facility into the database
  try {
    $stmt = $pdo->prepare('INSERT INTO room_facilities (BusinessInfoID, FacilityName) VALUES (:businessInfoID, :facilityName)');
    $stmt->execute(['businessInfoID' => $businessInfoID, 'facilityName' => $facilityName]);
    $facilityID = $pdo->lastInsertId();

    echo json_encode([
      'status' => 'success',
      'message' => 'Facility added successfully',
      'facilityID' => $facilityID
    ]);
  } catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'An error occurred while adding the facility']);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
