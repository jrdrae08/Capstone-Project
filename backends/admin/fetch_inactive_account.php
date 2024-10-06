<?php
include __DIR__ . '/../../includes/db.php';

function getTotalInactive($pdo)
{
  try {
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_inactive FROM account WHERE BusinessStatus = 'Inactive'");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total_inactive'];
  } catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
  }
}


