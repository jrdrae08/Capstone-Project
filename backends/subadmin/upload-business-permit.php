<?php
// upload-business-permit.php
include '../../includes/db.php';
header('Content-Type: application/json');

function respond($status, $message)
{
  echo json_encode(['status' => $status, 'message' => $message]);
  exit;
}

try {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['applicationID']) && isset($_FILES['businessPermitImage'])) {
      $applicationID = $_POST['applicationID'];

      // Handle file upload
      if ($_FILES['businessPermitImage']['error'] == 0) {
        $target_dir = "../../businessowner/uploadsapp/";
        $image_name = uniqid() . '-' . basename($_FILES["businessPermitImage"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["businessPermitImage"]["tmp_name"]);
        if ($check !== false) {
          // Check file size (limit to 5MB)
          if ($_FILES["businessPermitImage"]["size"] <= 5000000) {
            // Allow certain file formats
            if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
              if (move_uploaded_file($_FILES["businessPermitImage"]["tmp_name"], $target_file)) {
                // Update the database with the new image path
                $stmt = $pdo->prepare("UPDATE businessapplicationform SET BusinessPermitImage = :businessPermitImage WHERE ApplicationID = :applicationID");
                $stmt->bindParam(':businessPermitImage', $image_name);
                $stmt->bindParam(':applicationID', $applicationID);
                $stmt->execute();

                // respond('success', 'File uploaded successfully');
              } else {
                respond('error', 'Failed to move uploaded file.');
              }
            } else {
              respond('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            }
          } else {
            respond('error', 'Sorry, your file is too large.');
          }
        } else {
          respond('error', 'File is not an image.');
        }
      } else {
        respond('error', 'File upload error.');
      }
    } else {
      respond('error', 'Invalid request');
    }
  } else {
    respond('error', 'Invalid request method.');
  }
} catch (PDOException $e) {
  respond('error', 'Update failed: ' . $e->getMessage());
} catch (Exception $e) {
  respond('error', 'An unexpected error occurred: ' . $e->getMessage());
}
