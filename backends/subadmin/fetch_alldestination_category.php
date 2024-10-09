<?php
// Include the database connection
include '../includes/db.php';

// Get the businessInfoID from the URL, defaulting to 1 if not set
$businessInfoID = isset($_GET['businessInfoID']) ? (int) $_GET['businessInfoID'] : 1;

try {
  // Query to fetch all business media and related business information
  $stmt = $pdo->prepare("
        SELECT bm.Thumbnail, bm.Quotation, bif.BusinessName, bif.BusinessInfoID
        FROM business_media bm
        JOIN businessinformationform bif ON bm.BusinessInfoID = bif.BusinessInfoID
    ");
  $stmt->execute();
  $businesses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
