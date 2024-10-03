<?php
// Include database connection file
include_once '../../includes/db.php';

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

$roomID = isset($data['roomID']) ? intval($data['roomID']) : 0;
$facilities = isset($data['facilities']) ? array_map('intval', $data['facilities']) : array();

$response = array();

if ($roomID <= 0) {
  $response['status'] = 'error';
  $response['message'] = 'Please select a room.';
} elseif (empty($facilities)) {
  $response['status'] = 'error';
  $response['message'] = 'Please select at least one facility.';
} else {
  try {
    // Check if the roomID exists in the roominfotable
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM roominfotable WHERE roomID = ?");
    $stmt->execute([$roomID]);
    $roomExists = $stmt->fetchColumn();

    if ($roomExists == 0) {
      $response['status'] = 'error';
      $response['message'] = 'The selected room does not exist. Please select a valid room.';
    } else {
      // Begin transaction
      $pdo->beginTransaction();

      $existingConnections = [];
      $newFacilities = [];

      // Check existing connections and determine which facilities need to be added
      foreach ($facilities as $facilityID) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM room_facility_connections WHERE roomID = ? AND FacilityID = ?");
        $stmt->execute([$roomID, $facilityID]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
          $existingConnections[] = $facilityID;
        } else {
          $newFacilities[] = $facilityID;
        }
      }

      // Insert new connections
      foreach ($newFacilities as $facilityID) {
        $stmt = $pdo->prepare("INSERT INTO room_facility_connections (roomID, FacilityID) VALUES (?, ?)");
        $stmt->execute([$roomID, $facilityID]);
      }

      // Commit transaction
      $pdo->commit();

      if (!empty($existingConnections)) {
        // If the room was already connected to some of the selected facilities
        if (count($existingConnections) === count($facilities)) {
          // All selected facilities were already connected
          $response['status'] = 'info';
          $response['message'] = 'The room is already connected to all selected facilities.';
        } else {
          // Some selected facilities were already connected
          $response['status'] = 'info';
          $response['message'] = 'The room is connected to the following facilities: ' . implode(', ', $existingConnections) . '.';
        }
      } elseif (empty($newFacilities)) {
        // No new facilities were added
        $response['status'] = 'info';
        $response['message'] = 'All selected facilities are already connected to the room.';
      } else {
        $response['status'] = 'success';
        $response['message'] = 'Facilities connected to room successfully.';
      }
    }
  } catch (PDOException $e) {
    // Rollback transaction on error
    $pdo->rollBack();

    // Handle specific error codes
    if ($e->getCode() == '23000') {
      // Use regex to check for duplicate entry error
      if (preg_match('/1062 Duplicate entry/', $e->getMessage())) {
        $response['status'] = 'info';
        $response['message'] = 'This facility is already connected to the selected room. Please check the connection list.';
      } else {
        $response['status'] = 'error';
        $response['message'] = 'A database error occurred: ' . $e->getMessage();
      }
    } else {
      $response['status'] = 'error';
      $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
    }
  }
}

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);
