<?php
// Include the database connection
include '../includes/db.php';

try {
  // Query to fetch all business media and related business information
  $stmt = $pdo->prepare("
        SELECT bm.Thumbnail, bm.Quotation, bif.BusinessName 
        FROM business_media bm
        JOIN businessinformationform bif ON bm.BusinessInfoID = bif.BusinessInfoID
    ");
  $stmt->execute();
  $businesses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
