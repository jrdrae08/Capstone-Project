<?php
include __DIR__ . '/../../includes/db.php';

try {
  $sql = "SELECT * FROM frontpagecontent ORDER BY frontpageid DESC LIMIT 1"; // Adjust the query as needed
  $stmt = $pdo->query($sql);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);

  echo json_encode($data);
} catch (Exception $e) {
  echo json_encode(['error' => $e->getMessage()]);
}
