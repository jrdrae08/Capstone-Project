<?php
include '../../includes/db.php';

function generateReferenceNumber()
{
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $reference = 'REF-';
  for ($i = 0; $i < 6; $i++) {
    $reference .= $characters[mt_rand(0, strlen($characters) - 1)];
  }
  return $reference;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $roomID = isset($_POST['roomID']) ? (int)$_POST['roomID'] : 1;
  $fullname = htmlspecialchars(trim($_POST['fullname']));
  $regadd = htmlspecialchars(trim($_POST['regadd']));
  $regemail = filter_var(trim($_POST['regemail']), FILTER_VALIDATE_EMAIL);
  $regnum = htmlspecialchars(trim($_POST['regnum']));
  $numadult = filter_var($_POST['numadult'], FILTER_VALIDATE_INT);
  $numchild = filter_var($_POST['numchild'], FILTER_VALIDATE_INT);
  $nummale = filter_var($_POST['nummale'], FILTER_VALIDATE_INT);
  $numfemale = filter_var($_POST['numfemale'], FILTER_VALIDATE_INT);
  $thiscity = !empty($_POST['thiscity']) ? filter_var($_POST['thiscity'], FILTER_VALIDATE_INT) : 0;
  $othercity = !empty($_POST['othercity']) ? filter_var($_POST['othercity'], FILTER_VALIDATE_INT) : 0;
  $otherprovince = !empty($_POST['otherprovince']) ? filter_var($_POST['otherprovince'], FILTER_VALIDATE_INT) : 0;
  $foreigncountry = !empty($_POST['foreigncountry']) ? filter_var($_POST['foreigncountry'], FILTER_VALIDATE_INT) : 0;
  $checkin = htmlspecialchars(trim($_POST['checkin']));
  $departure = htmlspecialchars(trim($_POST['departure']));
  $referenceNum = generateReferenceNumber();

  // Validation
  $errors = [];

  if (empty($fullname) || empty($regadd) || empty($regemail) || empty($regnum)) {
    $errors[] = "Full Name, Address, Email, and Contact Number are required.";
  }

  if ($numadult === false && $numchild === false) {
    $errors[] = "At least one of No. of Adults or No. of Children must have a valid integer value.";
  }

  if ($nummale === false && $numfemale === false) {
    $errors[] = "At least one of No. of Males or No. of Females must have a valid integer value.";
  }

  if (($numadult + $numchild) != ($nummale + $numfemale)) {
    $errors[] = "The total of No. of Adults and No. of Children must equal the total of No. of Males and No. of Females.";
  }

  if (($numadult + $numchild) != ($thiscity + $othercity + $otherprovince + $foreigncountry)) {
    $errors[] = "The total of This City, Other City, Other Province, and Foreign Country must equal the total of No. of Adults and No. of Children.";
  }

  try {
    // Validate if roomID exists in roominfotable and fetch room details
    $stmt = $pdo->prepare("SELECT roomID, adultMax, ChildrenMax FROM roominfotable WHERE roomID = :roomID");
    $stmt->execute(['roomID' => $roomID]);
    $room = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($room) {
      if ($numadult > $room['adultMax']) {
        $errors[] = "The number of adults exceeds the maximum allowed for this room.";
      }

      if ($numchild > $room['ChildrenMax']) {
        $errors[] = "The number of children exceeds the maximum allowed for this room.";
      }

      if (!empty($errors)) {
        $response = [
          'status' => 'error',
          'message' => implode(", ", $errors)
        ];
        echo json_encode($response);
        exit();
      } else {
        $stmt = $pdo->prepare("
                    INSERT INTO reservations (
                        roomID, fullname, regadd, regemail, regnum, numadult, numchild, nummale, numfemale, thiscity, othercity, otherprovince, foreigncountry, checkin, departure, referenceNum
                    ) VALUES (
                        :roomID, :fullname, :regadd, :regemail, :regnum, :numadult, :numchild, :nummale, :numfemale, :thiscity, :othercity, :otherprovince, :foreigncountry, :checkin, :departure, :referenceNum
                    )
                ");
        $stmt->execute([
          'roomID' => $roomID,
          'fullname' => $fullname,
          'regadd' => $regadd,
          'regemail' => $regemail,
          'regnum' => $regnum,
          'numadult' => $numadult,
          'numchild' => $numchild,
          'nummale' => $nummale,
          'numfemale' => $numfemale,
          'thiscity' => $thiscity,
          'othercity' => $othercity,
          'otherprovince' => $otherprovince,
          'foreigncountry' => $foreigncountry,
          'checkin' => $checkin,
          'departure' => $departure,
          'referenceNum' => $referenceNum
        ]);
        $response = [
          'status' => 'success',
          'referenceNum' => $referenceNum
        ];
        echo json_encode($response);
        exit();
      }
    } else {
      $response = [
        'status' => 'error',
        'message' => 'Invalid roomID.'
      ];
      echo json_encode($response);
      exit();
    }
  } catch (Exception $e) {
    error_log($e->getMessage());
    $response = [
      'status' => 'error',
      'message' => 'An error occurred. Please try again later.'
    ];
    echo json_encode($response);
    exit();
  }
}
