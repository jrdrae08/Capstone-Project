<?php
// fetch_reservations.php
include '../../includes/db.php';
session_start();

if (!isset($_SESSION['business_info_id'])) {
  echo json_encode(['status' => 'error', 'message' => 'BusinessInfoID not set in session.']);
  exit;
}

$businessInfoID = $_SESSION['business_info_id'];
error_log('BusinessID: ' . $businessInfoID);

try {
  $stmt = $pdo->prepare("
        SELECT r.revID, r.datetime, r.fullname, r.numadult, r.numchild, ri.roomName
        FROM reservations r
        JOIN roominfotable ri ON r.roomID = ri.roomID
        WHERE ri.BusinessInfoID = :businessInfoID AND r.status = 'Accepted'
        ORDER BY r.datetime DESC
    ");
  $stmt->execute(['businessInfoID' => $businessInfoID]);
  $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (empty($reservations)) {
    echo json_encode(['status' => 'error', 'message' => 'No reservations found.']);
  } else {
    echo json_encode(['status' => 'success', 'data' => $reservations]);
  }
} catch (Exception $e) {
  error_log($e->getMessage());
  echo json_encode(['status' => 'error', 'message' => 'An error occurred while fetching reservations.']);
}
