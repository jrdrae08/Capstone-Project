<?php
// save_room_info.php - Save room information to the database
include '../../includes/db.php';

// Start the session at the beginning
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve and sanitize form data
  $roomName = htmlspecialchars(trim($_POST['roomname']));
  $roomPrice = htmlspecialchars(trim($_POST['roomprice']));
  $adultMax = htmlspecialchars(trim($_POST['adultmax']));
  $childrenMax = htmlspecialchars(trim($_POST['childrenmax']));
  $roomDesc = htmlspecialchars(trim($_POST['roomdesc']));
  $businessInfoID = $_SESSION['business_info_id'];

  // Initialize an array to store errors
  $errors = [];

  // Validate form data
  if (empty($roomName)) {
    $errors[] = ['field' => 'roomname', 'message' => 'Room name is required.'];
  }

  if ($roomPrice <= 0) {
    $errors[] = ['field' => 'roomprice', 'message' => 'Price should be greater than 0.'];
  }

  if ($adultMax <= 0) {
    $errors[] = ['field' => 'adultmax', 'message' => 'AdultMax should be greater than 0.'];
  }

  if ($childrenMax <= 0) {
    $errors[] = ['field' => 'childrenMax', 'message' => 'ChildrenMax should be greater than 0.'];
  }

  if (str_word_count($roomDesc) < 50) {
    $errors[] = ['field' => 'roomdesc', 'message' => 'Room description should be at least 50 words.'];
  }

  // Check if the room name is unique
  $uniqueRoomQuery = "SELECT COUNT(*) FROM roomInfoTable WHERE BusinessInfoID = :businessInfoID AND roomName = :roomName";
  $stmt = $pdo->prepare($uniqueRoomQuery);
  $stmt->execute([
    ':businessInfoID' => $businessInfoID,
    ':roomName' => $roomName
  ]);
  $roomCount = $stmt->fetchColumn();

  if ($roomCount > 0) {
    $errors[] = ['field' => 'roomname', 'message' => 'Room name must be unique for the given business.'];
  }

  // Handle image uploads and resize
  $images = $_SESSION['temp_images'] ?? [];
  $tempDir = "../../businessowner/tempImages/";
  if (!file_exists($tempDir)) {
    mkdir($tempDir, 0777, true);
  }

  for ($i = 1; $i <= 6; $i++) {
    $imageKey = "image$i";
    if (isset($_FILES[$imageKey]) && $_FILES[$imageKey]['error'] == 0) {
      // Sanitize file input
      $imageFileType = strtolower(pathinfo($_FILES[$imageKey]['name'], PATHINFO_EXTENSION));
      $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
      if (!in_array($imageFileType, $allowedTypes)) {
        $errors[] = ['field' => $imageKey, 'message' => "Invalid file type: " . $_FILES[$imageKey]['name']];
        continue;
      }

      // Validate file size (e.g., limit to 5MB)
      if ($_FILES[$imageKey]['size'] > 5 * 1024 * 1024) {
        $errors[] = ['field' => $imageKey, 'message' => "File size exceeds the limit of 5MB: " . $_FILES[$imageKey]['name']];
        continue;
      }

      // Generate a unique name for the file
      $uniqueNumber = uniqid();
      $imageName = pathinfo($_FILES[$imageKey]['name'], PATHINFO_FILENAME) . "_" . $uniqueNumber . "." . $imageFileType;
      $tempFilePath = $tempDir . $imageName;

      // Resize image
      $resizedImagePath = resizeImage($_FILES[$imageKey]['tmp_name'], $tempFilePath, 1920, 1080);

      if ($resizedImagePath) {
        $images[$imageKey] = $resizedImagePath;
      } else {
        $errors[] = ['field' => $imageKey, 'message' => "Failed to resize or move uploaded file: " . $_FILES[$imageKey]['name']];
      }
    }
  }

  // Check if at least one image is uploaded
  if (empty($images)) {
    $errors[] = ['field' => 'images', 'message' => 'Please upload at least one image.'];
  }

  // Check for errors before proceeding
  if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
    $_SESSION['temp_images'] = $images;
    header('Location: ../../businessowner/add-rooms.php');
    exit();
  }

  // Get the business name from the database using the session's businessInfoID
  $businessNameQuery = "SELECT BusinessName FROM businessinformationform WHERE BusinessInfoID = :businessInfoID";
  $stmt = $pdo->prepare($businessNameQuery);
  $stmt->execute([':businessInfoID' => $businessInfoID]);
  $businessNameResult = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($businessNameResult) {
    $businessName = htmlspecialchars(trim($businessNameResult['BusinessName']));

    // Define target directory based on business name and room name
    $targetDir = "../../businessowner/roomImages/$businessName/$roomName/";

    // Ensure the directory exists; if not, create it
    if (!file_exists($targetDir)) {
      if (!mkdir($targetDir, 0777, true)) {
        $_SESSION['errors'][] = ['field' => 'directory', 'message' => 'Failed to create directories.'];
        $_SESSION['form_data'] = $_POST;
        header('Location: ../../businessowner/add-rooms.php');
        exit();
      }
    }

    // Move images from temp directory to target directory
    foreach ($images as $key => $tempPath) {
      if ($tempPath) {
        $imageName = basename($tempPath);
        $targetFilePath = $targetDir . $imageName;
        rename($tempPath, $targetFilePath);
        $images[$key] = $targetFilePath;
      }
    }

    // Insert data into the database
    $sql = "INSERT INTO roomInfoTable 
                        (BusinessInfoID, roomName, roomPrice, adultMax, ChildrenMax, RoomDescriptions, image1, image2, image3, image4, image5, image6) 
                    VALUES 
                        (:BusinessInfoID, :roomName, :roomPrice, :adultMax, :ChildrenMax, :RoomDescriptions, :image1, :image2, :image3, :image4, :image5, :image6)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':BusinessInfoID' => $businessInfoID,
      ':roomName' => $roomName,
      ':roomPrice' => $roomPrice,
      ':adultMax' => $adultMax,
      ':ChildrenMax' => $childrenMax,
      ':RoomDescriptions' => $roomDesc,
      ':image1' => $images['image1'] ?? null,
      ':image2' => $images['image2'] ?? null,
      ':image3' => $images['image3'] ?? null,
      ':image4' => $images['image4'] ?? null,
      ':image5' => $images['image5'] ?? null,
      ':image6' => $images['image6'] ?? null
    ]);
    $_SESSION['success'] = 'Room information has been saved successfully.';
    unset($_SESSION['temp_images']); // Unset the temporary images from the session

    // Redirect after successful insert
    header('Location: ../../businessowner/add-rooms.php');
    exit();
  } else {
    $_SESSION['errors'][] = ['field' => 'businessinfo', 'message' => 'Failed to retrieve business name.'];
    $_SESSION['form_data'] = $_POST;
    header('Location: ../../businessowner/add-rooms.php');
    exit();
  }
}

/**
 * Resize image to the specified width and height
 *
 * @param string $sourcePath Path to the source image
 * @param string $targetPath Path to save the resized image
 * @param int $width Desired width
 * @param int $height Desired height
 * @return string|false The path to the resized image on success, or false on failure
 */
function resizeImage($sourcePath, $targetPath, $width, $height)
{
  list($originalWidth, $originalHeight, $imageType) = getimagesize($sourcePath);

  if (!$originalWidth || !$originalHeight) {
    return false;
  }

  $srcImage = null;
  switch ($imageType) {
    case IMAGETYPE_JPEG:
      $srcImage = imagecreatefromjpeg($sourcePath);
      break;
    case IMAGETYPE_PNG:
      $srcImage = imagecreatefrompng($sourcePath);
      break;
    case IMAGETYPE_GIF:
      $srcImage = imagecreatefromgif($sourcePath);
      break;
    default:
      return false;
  }

  if (!$srcImage) {
    return false;
  }

  $dstImage = imagecreatetruecolor($width, $height);
  $white = imagecolorallocate($dstImage, 255, 255, 255);
  imagefill($dstImage, 0, 0, $white);

  imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

  $saved = false;
  switch ($imageType) {
    case IMAGETYPE_JPEG:
      $saved = imagejpeg($dstImage, $targetPath);
      break;
    case IMAGETYPE_PNG:
      $saved = imagepng($dstImage, $targetPath);
      break;
    case IMAGETYPE_GIF:
      $saved = imagegif($dstImage, $targetPath);
      break;
  }

  imagedestroy($srcImage);
  imagedestroy($dstImage);

  return $saved ? $targetPath : false;
}
