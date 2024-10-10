<?php
//fetch_resortdestination_category.php
include '../includes/db.php';

// Get the businessInfoID from the URL, defaulting to 1 if not set
$businessInfoID = isset($_GET['businessInfoID']) ? (int) $_GET['businessInfoID'] : 1;

try {
  // Fetch businesses with BusinessType 'Resort', 'Farm', and 'Falls'
  $stmt = $pdo->prepare("
      SELECT bm.Thumbnail, bm.Quotation, bif.BusinessName, bif.BusinessInfoID, bt.TypeName
      FROM business_media bm
      JOIN businessinformationform bif ON bm.BusinessInfoID = bif.BusinessInfoID
      JOIN businesstype bt ON bif.BusinessTypeID = bt.BusinessTypeID
      WHERE bt.TypeName IN ('Resort', 'Farm', 'Falls')
  ");
  $stmt->execute();
  $businesses = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Separate businesses by type
  $resortBusinesses = [];
  $farmBusinesses = [];
  $fallsBusinesses = [];

  foreach ($businesses as $business) {
    switch ($business['TypeName']) {
      case 'Resort':
        $resortBusinesses[] = $business;
        break;
      case 'Farm':
        $farmBusinesses[] = $business;
        break;
      case 'Falls':
        $fallsBusinesses[] = $business;
        break;
    }
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
