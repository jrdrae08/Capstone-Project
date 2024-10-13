<?php
// fetch_booked_dates.php
include '../../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $roomID = isset($_POST['roomID']) ? (int)$_POST['roomID'] : 0;

  if ($roomID > 0) {
    $stmt = $pdo->prepare("
            SELECT checkin, departure 
            FROM reservations 
            WHERE roomID = :roomID
        ");
    $stmt->execute(['roomID' => $roomID]);
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $bookedDates = [];
    foreach ($reservations as $reservation) {
      $checkin = new DateTime($reservation['checkin']);
      $departure = new DateTime($reservation['departure']);

      $period = new DatePeriod(
        $checkin,
        new DateInterval('P1D'),
        $departure->modify('+1 day')
      );

      foreach ($period as $date) {
        $bookedDates[] = $date->format('Y-m-d');
      }
    }

    echo json_encode(['bookedDates' => $bookedDates]);
  } else {
    echo json_encode(['bookedDates' => []]);
  }
  exit();
}
