<?php
include __DIR__ . '/../../includes/db.php';

function validate_input($data)
{
  return htmlspecialchars(stripslashes(trim($data)));
}

function validate_image($file)
{
  if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
    return false; // No file uploaded, skip validation
  }

  $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  $maxFileSize = 2 * 1024 * 1024; // 2MB

  $fileMimeType = mime_content_type($file['tmp_name']);
  $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
  $fileSize = $file['size'];

  if (!in_array($fileMimeType, $allowedMimeTypes)) {
    throw new Exception('Invalid image type.');
  }

  if (!in_array($fileExtension, $allowedExtensions)) {
    throw new Exception('Invalid image extension.');
  }

  if ($fileSize > $maxFileSize) {
    throw new Exception('File size exceeds the limit of 2MB.');
  }

  return true;
}

function validate_content_length($content, $requiredWords, $context)
{
  $wordCount = str_word_count($content);
  if ($wordCount < $requiredWords) {
    if ($context == "Description") {
      throw new Exception("Description content must be at least $requiredWords words.");
    } else {
      throw new Exception("$context must be at least $requiredWords words.");
    }
  }
  if ($wordCount > $requiredWords) {
    throw new Exception("$context must not exceed $requiredWords words.");
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  try {
    $frontpageid = validate_input($_POST['frontpageid']);
    $description = validate_input($_POST['description']);
    $sliderTitle1 = validate_input($_POST['slider_title_1']);
    $sliderContent1 = validate_input($_POST['slider_content_1']);
    $sliderTitle2 = validate_input($_POST['slider_title_2']);
    $sliderContent2 = validate_input($_POST['slider_content_2']);
    $sliderTitle3 = validate_input($_POST['slider_title_3']);
    $sliderContent3 = validate_input($_POST['slider_content_3']);

    validate_content_length($description, 50, "Description");
    validate_content_length($sliderContent1, 25, "Content in Slider 1");
    validate_content_length($sliderContent2, 25, "Content in Slider 2");
    validate_content_length($sliderContent3, 25, "Content in Slider 3");

    $sliderImage1 = $_FILES['sliderimage1']['name'] ?? null;
    $sliderImage2 = $_FILES['sliderimage2']['name'] ?? null;
    $sliderImage3 = $_FILES['sliderimage3']['name'] ?? null;

    if ($sliderImage1) {
      validate_image($_FILES['sliderimage1']);
      $targetFile1 = "../../admin/uploadannounce/" . basename($sliderImage1);
      move_uploaded_file($_FILES['sliderimage1']['tmp_name'], $targetFile1);
    }
    if ($sliderImage2) {
      validate_image($_FILES['sliderimage2']);
      $targetFile2 = "../../admin/uploadannounce/" . basename($sliderImage2);
      move_uploaded_file($_FILES['sliderimage2']['tmp_name'], $targetFile2);
    }
    if ($sliderImage3) {
      validate_image($_FILES['sliderimage3']);
      $targetFile3 = "../../admin/uploadannounce/" . basename($sliderImage3);
      move_uploaded_file($_FILES['sliderimage3']['tmp_name'], $targetFile3);
    }

    $sql = "UPDATE frontpagecontent SET description = :description, slider_title_1 = :slider_title_1, slider_content_1 = :slider_content_1, 
            slider_title_2 = :slider_title_2, slider_content_2 = :slider_content_2, slider_title_3 = :slider_title_3, slider_content_3 = :slider_content_3";

    if ($sliderImage1) $sql .= ", slider_image_1 = :slider_image_1";
    if ($sliderImage2) $sql .= ", slider_image_2 = :slider_image_2";
    if ($sliderImage3) $sql .= ", slider_image_3 = :slider_image_3";

    $sql .= " WHERE frontpageid = :frontpageid";

    $stmt = $pdo->prepare($sql);
    $params = [
      ':description' => $description,
      ':slider_title_1' => $sliderTitle1,
      ':slider_content_1' => $sliderContent1,
      ':slider_title_2' => $sliderTitle2,
      ':slider_content_2' => $sliderContent2,
      ':slider_title_3' => $sliderTitle3,
      ':slider_content_3' => $sliderContent3,
      ':frontpageid' => $frontpageid
    ];
    if ($sliderImage1) $params[':slider_image_1'] = basename($sliderImage1);
    if ($sliderImage2) $params[':slider_image_2'] = basename($sliderImage2);
    if ($sliderImage3) $params[':slider_image_3'] = basename($sliderImage3);

    $stmt->execute($params);

    $response = [
      'success' => 'Content updated successfully!',
      'frontpageid' => $frontpageid,
      'description' => $description,
      'slider_title_1' => $sliderTitle1,
      'slider_content_1' => $sliderContent1,
      'slider_title_2' => $sliderTitle2,
      'slider_content_2' => $sliderContent2,
      'slider_title_3' => $sliderTitle3,
      'slider_content_3' => $sliderContent3,
      'slider_image_1' => $sliderImage1 ? basename($sliderImage1) : null,
      'slider_image_2' => $sliderImage2 ? basename($sliderImage2) : null,
      'slider_image_3' => $sliderImage3 ? basename($sliderImage3) : null
    ];

    echo json_encode($response);
  } catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
  }
} else {
  echo json_encode(['error' => 'Invalid request method.']);
}
