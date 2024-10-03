<?php
session_start();
include '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['business_info_id'])) {
  $data = json_decode(file_get_contents('php://input'), true);
  $featureID = isset($data['featureID']) ? (int)$data['featureID'] : 0;
  $businessInfoID = $_SESSION['business_info_id'];

  // Validate FeatureID: Check if it exists in the features table
  $stmt = $pdo->prepare('SELECT FeatureID FROM features WHERE FeatureID = :featureID');
  $stmt->execute(['featureID' => $featureID]);
  if ($stmt->rowCount() === 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid FeatureID']);
    exit;
  }

  // Validate BusinessInfoID and FeatureID association
  $stmt = $pdo->prepare('SELECT BusinessFeatureID FROM business_features WHERE BusinessInfoID = :businessInfoID AND FeatureID = :featureID');
  $stmt->execute(['businessInfoID' => $businessInfoID, 'featureID' => $featureID]);
  if ($stmt->rowCount() === 0) {
    echo json_encode(['status' => 'error', 'message' => 'No such feature associated with this business']);
    exit;
  }

  // Delete the feature association with the BusinessInfoID
  $stmt = $pdo->prepare('DELETE FROM business_features WHERE BusinessInfoID = :businessInfoID AND FeatureID = :featureID');
  $stmt->execute(['businessInfoID' => $businessInfoID, 'featureID' => $featureID]);

  echo json_encode(['status' => 'success', 'message' => 'Feature deleted successfully']);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
