<?php
include '../../includes/db.php';
session_start();

$businessInfoID = $_SESSION['business_info_id'];

$stmt = $pdo->prepare("SELECT * FROM business_media WHERE BusinessInfoID = ?");
$stmt->execute([$businessInfoID]);
$mediaData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($mediaData) {
  echo json_encode($mediaData);
} else {
  echo json_encode(['error' => 'No media found for this business.']);
}
