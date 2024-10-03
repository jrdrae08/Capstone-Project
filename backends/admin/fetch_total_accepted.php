<?php
include __DIR__ . '/../../includes/db.php';

function getTotalAccepted($pdo)
{
  try {
    $stmt = $pdo->prepare("
      SELECT COUNT(*) as total_accepted
      FROM businessapplicationform b
      JOIN account a ON b.ApplicationID = a.ApplicationID
      WHERE b.Status = 'Approved' AND a.BusinessArchive = 0
    ");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total_accepted'];
  } catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
  }
}

// Fetch total accepted applications and output as plain text
// echo getTotalAccepted($pdo);
