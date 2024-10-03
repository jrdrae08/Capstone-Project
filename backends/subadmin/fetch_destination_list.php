<?php
session_start();
include "../includes/db.php";

// Get the businessInfoID from the URL, defaulting to 1 if not set
$businessInfoID = isset($_GET['businessInfoID']) ? (int) $_GET['businessInfoID'] : 1;

// Fetch business name, thumbnail, images, and quotation based on the dynamic businessInfoID
$businessStmt = $pdo->prepare("
    SELECT bi.BusinessName, bm.Thumbnail, bm.Image1, bm.Image2, bm.Image3, bm.Image4, bm.Quotation
    FROM businessinformationform bi
    JOIN business_media bm ON bi.BusinessInfoID = bm.BusinessInfoID
    WHERE bi.BusinessInfoID = :businessInfoID
");
$businessStmt->execute(['businessInfoID' => $businessInfoID]);
$business = $businessStmt->fetch(PDO::FETCH_ASSOC);
