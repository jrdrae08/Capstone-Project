<?php
include __DIR__ . '/../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $businessId = $_POST['business_id'];

  if ($businessId) {
    try {
      $stmt = $pdo->prepare("UPDATE account SET BusinessArchive = 0 WHERE AccountID = :business_id");
      $stmt->bindParam(':business_id', $businessId, PDO::PARAM_INT);
      if ($stmt->execute()) {
        echo json_encode(['success' => true]);
      } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update record']);
      }
    } catch (PDOException $e) {
      echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
  } else {
    echo json_encode(['success' => false, 'error' => 'Invalid business ID']);
  }
}
