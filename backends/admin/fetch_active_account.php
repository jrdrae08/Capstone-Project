<?php
include __DIR__ . '/../../includes/db.php';

function getTotalActive($pdo)
{
  try {
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_active FROM account WHERE BusinessStatus = 'Active'");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total_active'];
  } catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
  }
}

