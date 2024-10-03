<?php
include __DIR__ . '/../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $businessId = $_POST['business_id'];

  try {
    $stmt = $pdo->prepare("UPDATE account SET BusinessArchive = 1 WHERE AccountID = ?");
    $stmt->execute([$businessId]);
    echo "Success";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
