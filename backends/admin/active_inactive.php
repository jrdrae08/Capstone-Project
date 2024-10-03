<?php
require __DIR__ . '/../../includes/db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id']) && isset($data['status'])) {
  $id = $data['id'];
  $status = $data['status'];

  try {
    $stmt = $pdo->prepare('UPDATE account SET BusinessStatus = :status WHERE AccountID = :id');
    $stmt->execute(['status' => $status, 'id' => $id]);
    echo json_encode(['success' => true]);
  } catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
  }
} else {
  echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
