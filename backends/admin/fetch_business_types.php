<?php
include __DIR__ . '/../../includes/db.php';

try {
  $stmt = $pdo->prepare("SELECT BusinessTypeID, TypeName FROM businesstype");
  $stmt->execute();
  $businessTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
