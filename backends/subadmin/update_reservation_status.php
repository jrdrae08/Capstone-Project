<?php
include '../../includes/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $revID = $data['revID'];
  $status = $data['status'];

  try {
    $stmt = $pdo->prepare("UPDATE reservations SET status = :status WHERE revID = :revID");
    $stmt->execute(['status' => $status, 'revID' => $revID]);

    echo json_encode(['status' => 'success', 'message' => 'Reservation status updated successfully.']);
  } catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'An error occurred while updating reservation status.']);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
