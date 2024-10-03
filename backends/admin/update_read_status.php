<?php
// backends/admin/update_read_status.php
include __DIR__ . '/../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $applicationID = $_POST['applicationID'];
  try {
    $stmt = $pdo->prepare("UPDATE businessapplicationform SET IsRead = TRUE WHERE ApplicationID = ?");
    $stmt->execute([$applicationID]);
    echo json_encode(['success' => true]);
  } catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
