<?php
include "../../includes/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = json_decode(file_get_contents('php://input'), true);
  $featureID = $input['featureID'];
  $isActive = $input['isActive']; // Should be 1 for checked, 0 for unchecked

  try {
    $stmt = $pdo->prepare('UPDATE features SET IsActive = :isActive WHERE FeatureID = :featureID');
    $stmt->execute(['isActive' => $isActive, 'featureID' => $featureID]);

    echo json_encode(['status' => 'success', 'message' => 'Feature status updated successfully.']);
  } catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update feature status: ' . $e->getMessage()]);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
