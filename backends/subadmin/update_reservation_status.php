<?php
// update_reservation_status.php
include '../../includes/db.php';
session_start();

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

define('PHPMAILER_PATH', 'E:/HACKINGZ/phpmailer/src/');
require PHPMAILER_PATH . 'Exception.php';
require PHPMAILER_PATH . 'PHPMailer.php';
require PHPMAILER_PATH . 'SMTP.php';

header('Content-Type: application/json'); // Ensure the response is JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $revID = $data['revID'];
  $status = $data['status'];

  try {
    $pdo->beginTransaction();

    // Update the reservation status
    $stmt = $pdo->prepare("UPDATE reservations SET status = :status WHERE revID = :revID");
    $stmt->execute(['status' => $status, 'revID' => $revID]);

    // Fetch the reservation details
    // Assuming your roominfotable table has roomID as the primary key and roomName as a column
    $stmt = $pdo->prepare("
SELECT r.roomName, res.checkin, res.departure, res.fullname, res.regemail, res.referenceNum
FROM reservations AS res
JOIN roominfotable AS r ON res.roomID = r.roomID
WHERE res.revID = :revID
");

    $stmt->execute(['revID' => $revID]);
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($reservation) {
      sendEmailNotification($reservation, $status);
      $pdo->commit();
      echo json_encode(['status' => 'success', 'message' => 'Reservation status updated and email sent successfully.']);
    } else {
      $pdo->rollBack();
      echo json_encode(['status' => 'error', 'message' => 'Reservation not found.']);
    }
  } catch (Exception $e) {
    $pdo->rollBack();
    error_log($e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'An error occurred while updating reservation status.', 'error' => $e->getMessage()]);
  }
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

function initializeMailer()
{
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'majayjaytourist4005@gmail.com';
  $mail->Password = 'ilnppweayuuzknzi'; // Use environment variables in production
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;
  $mail->setFrom('majayjaytourist4005@gmail.com', 'Majayjay Tourist');
  return $mail;
}

function sendEmailNotification($reservation, $status)
{
  $mail = initializeMailer();
  $mail->addAddress($reservation['regemail']);
  $mail->isHTML(true);
  $mail->Subject = 'Reservation Status Updated';
  $mail->Body = "
        <html>
        <head>
            <title>Reservation Status Updated</title>
        </head>
        <body>
            <p>Dear {$reservation['fullname']},</p>
            <p>We are pleased to inform you that your reservation for the room <strong>{$reservation['roomName']}</strong> has been <strong>{$status}</strong>.</p>
            <p>Here are the details of your reservation:</p>
            <ul>
                <li><strong>Reference Number:</strong> {$reservation['referenceNum']}</li>
                <li><strong>Check-in Date:</strong> {$reservation['checkin']}</li>
                <li><strong>Check-out Date:</strong> {$reservation['departure']}</li>
            </ul>
            <p>Please ensure that you check in on time. If you have any questions or need further assistance, feel free to contact us.</p>
            <p>Thank you for choosing our service.</p>
            <p>Best regards,</p>
            <p>Majayjay Tourist</p>
        </body>
        </html>
    ";
  $mail->send();
}
