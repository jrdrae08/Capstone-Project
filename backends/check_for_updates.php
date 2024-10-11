<?php
// check_for_updates.php
include '../includes/db.php';

// Query to get the last update time for all tables in the database
$query = $pdo->query("
    SELECT MAX(update_time) as last_update
    FROM information_schema.tables
    WHERE table_schema = 'majayjaytourist'
");
$result = $query->fetch(PDO::FETCH_ASSOC);
$lastUpdateTime = $result['last_update'];

// Read the last known update time from a file
$lastKnownUpdateTime;

// Compare the times
if ($lastUpdateTime > $lastKnownUpdateTime) {
  echo 'true'; // Changes detected
} else {
  echo 'false'; // No changes
}
