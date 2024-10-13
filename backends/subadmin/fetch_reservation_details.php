<?php
// fetch_reservation_details.php
include '../../includes/db.php';
session_start();

if (!isset($_SESSION['business_info_id'])) {
  echo json_encode(['status' => 'error', 'message' => 'BusinessInfoID not set in session.']);
  exit;
}

$businessInfoID = $_SESSION['business_info_id'];
$revID = isset($_GET['revID']) ? (int)$_GET['revID'] : 0;

if ($revID === 0) {
  echo json_encode(['status' => 'error', 'message' => 'Reservation ID not set.']);
  exit;
}

try {
  $stmt = $pdo->prepare("
        SELECT r.*, ri.roomName
        FROM reservations r
        JOIN roominfotable ri ON r.roomID = ri.roomID
        WHERE r.revID = :revID AND ri.BusinessInfoID = :businessInfoID
    ");
  $stmt->execute(['revID' => $revID, 'businessInfoID' => $businessInfoID]);
  $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($reservation) {
    echo json_encode(['status' => 'success', 'data' => $reservation]);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Reservation not found.']);
  }
} catch (Exception $e) {
  error_log($e->getMessage());
  echo json_encode(['status' => 'error', 'message' => 'An error occurred while fetching reservation details.']);
}
