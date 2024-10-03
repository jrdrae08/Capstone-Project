<?php
include __DIR__ . '/../../includes/db.php';

function getTotalArchived($pdo)
{
  try {
    $stmt = $pdo->prepare("
            SELECT COUNT(*) as total_archived
            FROM account
            WHERE BusinessArchive = 1
        ");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['total_archived'];
  } catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
  }
}

// Fetch total archived applications and output as plain text
// echo getTotalArchived($pdo);
