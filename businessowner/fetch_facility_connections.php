<?php
// fetch_facility_connections.php

header('Content-Type: application/json');
require_once '../../includes/db.php';

$roomID = $_GET['roomID'] ?? null;

if (!$roomID) {
  echo json_encode(['status' => 'error', 'message' => 'Room ID is required.']);
  exit;
}

try {
  $stmt = $pdo->prepare("SELECT FacilityID FROM room_facility_connections WHERE roomID = :roomID");
  $stmt->bindParam(':roomID', $roomID, PDO::PARAM_INT);
  $stmt->execute();
  $facilityIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);

  echo json_encode(['status' => 'success', 'facilities' => $facilityIDs]);
} catch (PDOException $e) {
  echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
