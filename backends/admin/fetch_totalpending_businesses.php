<?php
include __DIR__ . '/../../includes/db.php';
function getTotalPending($pdo)
{
  try {
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_pending FROM businessapplicationform WHERE Status = 'Pending'");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total_pending'];
  } catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
  }
}

// Fetch total pending applications and output as plain text
echo getTotalPending($pdo);
