<?php
// re-regfunction.php
include '../../includes/db.php';

// Set the content type to JSON
header('Content-Type: application/json');

function respond($status, $message)
{
  echo json_encode(['status' => $status, 'message' => $message]);
  exit;
}

try {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $applicationID = $_POST['applicationID'] ?? null;
    $refNum = $_POST['refNum'] ?? null;
    $updatedData = json_decode($_POST['updatedData'] ?? '', true);

    if ($applicationID && $updatedData) {
      // Validate expiration date
      $currentDate = new DateTime();
      $expirationDate = DateTime::createFromFormat('Y-m-d', $updatedData['bexdate']);

      if ($expirationDate < $currentDate) {
        respond('error', 'Business Permit Expiration Date cannot be in the past.');
      }

      // Handle JSON data update
      $stmt = $pdo->prepare("UPDATE businessapplicationform SET PermitExpDate = STR_TO_DATE(:permitExpDate, '%Y-%m-%d'), Status = 'Pending', IsReject = 0 WHERE ApplicationID = :applicationID");
      $stmt->execute([
        ':permitExpDate' => $updatedData['bexdate'],
        ':applicationID' => $applicationID
      ]);

      // Handle file upload
      if (isset($_FILES['businessPermitImage']) && $_FILES['businessPermitImage']['error'] == 0) {
        $target_dir = "../../businessowner/uploadsapp/";
        $image_name = uniqid() . '-' . basename($_FILES["businessPermitImage"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["businessPermitImage"]["tmp_name"]);
        if ($check !== false && $_FILES["businessPermitImage"]["size"] <= 5000000 && in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
          if (move_uploaded_file($_FILES["businessPermitImage"]["tmp_name"], $target_file)) {
            $stmt = $pdo->prepare("UPDATE businessapplicationform SET BusinessPermitImage = :businessPermitImage WHERE ApplicationID = :applicationID");
            $stmt->execute([
              ':businessPermitImage' => $image_name,
              ':applicationID' => $applicationID
            ]);
          } else {
            respond('error', 'Failed to move uploaded file.');
          }
        } else {
          respond('error', 'Invalid file. Only JPG, JPEG, PNG, and GIF files are allowed.');
        }
      }

      respond('success', 'Data updated successfully');
    } elseif ($refNum) {
      // Handle the fetch request
      $stmt = $pdo->prepare("SELECT * FROM businessapplicationform WHERE RefNum = :refNum");
      $stmt->bindParam(':refNum', $refNum, PDO::PARAM_STR);
      $stmt->execute();
      $applicationData = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($stmt->errorCode() != '00000') {
        respond('error', 'Query error: ' . implode(", ", $stmt->errorInfo()));
      }

      if ($applicationData) {
        if ($applicationData['IsReject'] == 0) {
          respond('error', 'Your account is not rejected.');
        }

        $stmt = $pdo->prepare("SELECT bi.*, bt.TypeName AS BusinessType FROM businessinformationform bi JOIN businesstype bt ON bi.BusinessTypeID = bt.BusinessTypeID WHERE bi.ApplicationID = :applicationID");
        $stmt->bindParam(':applicationID', $applicationData['ApplicationID'], PDO::PARAM_INT);
        $stmt->execute();
        $businessData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->errorCode() != '00000') {
          respond('error', 'Query error: ' . implode(", ", $stmt->errorInfo()));
        }

        $data = array_merge($applicationData, $businessData);

        echo json_encode([
          'status' => 'success',
          'message' => 'Record has been found. Please wait...',
          'data' => $data,
          'applicationID' => $applicationData['ApplicationID'],
          'redirect' => '../../businessowner/business-re-registration.php'
        ]);
      } else {
        respond('error', 'No record found for the given business permit number.');
      }
    } else {
      respond('error', 'Invalid input data.');
    }
  } else {
    respond('error', 'Invalid request method.');
  }
} catch (PDOException $e) {
  error_log('PDOException: ' . $e->getMessage());
  respond('error', 'Query failed: ' . $e->getMessage());
} catch (Exception $e) {
  error_log('Exception: ' . $e->getMessage());
  respond('error', 'An unexpected error occurred: ' . $e->getMessage());
}
