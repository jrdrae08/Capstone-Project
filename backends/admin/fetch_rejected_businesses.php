<?php
include __DIR__ . '/../../includes/db.php';

function getRejectedBusinesses($pdo)
{
  try {
    $stmt = $pdo->prepare("SELECT b.ApplicationID, DATE_FORMAT(b.CreatedAt, '%Y-%m-%d') AS 'Date Registered', 
                                  t.TypeName AS BusinessType, i.BusinessName, i.BusinessAddress, 
                                  i.BusinessEmail AS BusinessEmail, i.BusinessContactNumber AS BusinessContactNumber,
                                  b.RegistrantFirstName, b.RegistrantMiddleName, b.RegistrantLastName, 
                                  b.ContactNumber AS RegistrantContact, b.Email AS RegistrantEmail, 
                                  b.BusinessPermitImage, 
                                  DATE_FORMAT(b.PermitExpDate, '%Y-%m-%d') AS PermitExpDate,
                                  a.AccountID, a.BusinessStatus
                            FROM businessapplicationform b
                            JOIN businessinformationform i ON b.ApplicationID = i.ApplicationID
                            JOIN businesstype t ON i.BusinessTypeID = t.BusinessTypeID
                            LEFT JOIN account a ON b.ApplicationID = a.ApplicationID
                            WHERE b.Status = 'Rejected' AND b.IsReject = 1
                            ORDER BY b.CreatedAt DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
  }
}
