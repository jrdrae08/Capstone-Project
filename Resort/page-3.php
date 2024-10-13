 <?php
    // page-3.php
    include '../includes/db.php';

    // Get the roomID and businessInfoID from the URL, defaulting to 1 if not set
    $businessInfoID = isset($_GET['businessInfoID']) ? (int) $_GET['businessInfoID'] : 1;
    $roomID = isset($_GET['roomID']) ? (int) $_GET['roomID'] : 1;

    try {
        // Query to fetch room information based on roomID
        $stmt = $pdo->prepare("
        SELECT roomID, roomName, roomPrice, adultMax, ChildrenMax, RoomDescriptions, image1, image2, image3, image4, image5, image6, BusinessInfoID
        FROM roominfotable
        WHERE roomID = :roomID
    ");
        $stmt->execute(['roomID' => $roomID]);
        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        // Query to fetch business information based on BusinessInfoID
        $stmt = $pdo->prepare("
        SELECT BusinessName, BusinessAddress, BusinessEmail, BusinessContactNumber
        FROM businessinformationform
        WHERE BusinessInfoID = :businessInfoID
    ");
        $stmt->execute(['businessInfoID' => $room['BusinessInfoID']]);
        $businessInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        // Query to fetch rooms based on businessInfoID and filter out the room with the specific roomID
        $stmt = $pdo->prepare("
        SELECT roomID, roomName, roomPrice, RoomDescriptions, image1
        FROM roominfotable
        WHERE BusinessInfoID = :businessInfoID AND roomID != :roomID
    ");
        $stmt->execute(['businessInfoID' => $businessInfoID, 'roomID' => $roomID]);
        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Majayjay Website</title>
     <!-- External CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Poetsen+One&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
     <link rel="stylesheet" href="../../resort/new-resort-ui.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
     <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>
     <!-- External JS -->
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

     <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
     <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
     <link rel="stylesheet" href="../css/businessowner.css">
     <style>
         body {
             overflow-x: hidden;
             position: relative;
             /* width: 100%;
            height: 100vh; */
             background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.5)), url('../../businessowner/businessmediacategory/<?php echo htmlspecialchars($room['image1']); ?>');
             background-size: cover;
             background-position: center;
             background-attachment: fixed;
             background-repeat: no-repeat;
         }

         .booked {
             background-color: green !important;
             color: white !important;
         }
     </style>
 </head>

 <body>
     <main class="content">

         <section class="first-page" id="first-page">
             <div class="container-fluid">
                 <div class="row d-flex justify-content-around">
                     <div class="col-lg-4 py-3 ps-5 d-flex justify-content-start align-items-center">
                         <a href="../../resort/page-2.php?businessInfoID=<?php echo $businessInfoID; ?>">
                             <i class="bi bi-arrow-left-circle fw-bold text-light fs-1 text-shadow-light"></i>
                         </a>
                     </div>

                     <div class="col-lg-5 py-3 ms-auto">
                         <div class="row">
                             <div class="col text-center">
                                 <a href="../../resort/page-2.php" class="page-nav active mx-2 text-light rounded-0 cormorant-text fw-bold text-shadow-light">Accommodations</a>
                             </div>
                             <div class="col text-center">
                                 <a href="" class="page-nav mx-2 text-light rounded-0 cormorant-text fw-bold text-shadow-light">Events</a>
                             </div>
                             <div class="col text-center">
                                 <a href="../../resort/page-2.php" class="page-nav-book btn mx-2 mt-2  rounded-0 cormorant-text fw-bold text-shadow-light">BOOK NOW</a>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="page-title-container">
                     <h1 class="page-title text-light text-center cormorant-text fw-bold "><?php echo htmlspecialchars($room['roomName']); ?></h1>
                 </div>
             </div>
         </section>

         <section class="room-page-title bg-color-5" id="room-page-title">
             <div class="accommodation-nav bg-color-1 m-0 py-3">
                 <div class="d-flex justify-content-center">
                     <a href="" class="text-decoration-none">
                         <h3 class="nav text-nav text-light me-2 dm-sans-text">Home ></h3>
                     </a>
                     <a href="../../resort/page-2.php?businessInfoID=<?php echo $businessInfoID; ?>" class="text-decoration-none">
                         <h3 class="nav text-nav text-light me-2 dm-sans-text">Accommodations > </h3>
                     </a>
                     <a href="../../resort/page-3.php" class="text-decoration-none">
                         <h3 class="nav text-nav text-light dm-sans-text">Room</h3>
                     </a>
                 </div>
             </div>

             <div class="container-fluid">
                 <div class="row room-page-info d-flex justify-content-center">
                     <div class="col-xl-5 col-lg-6 col-md-8 my-3">
                         <div class="m-3">
                             <h5 class="text-dark dm-sans-text fw-bold">For only<span class="text-success"> &#8369 <?php echo number_format(htmlspecialchars($room['roomPrice']), 2, '.', ','); ?></span> /Night</h5>
                             <h1 class="text-color-1 cormorant-text fw-bold"><?php echo htmlspecialchars($room['roomName']); ?></h1>
                             <p class="text-secondary dm-sans-text" style="text-align: justify;"><?php echo htmlspecialchars($room['RoomDescriptions']); ?></p>
                         </div>
                         <div class="image-content d-flex justify-content-center">
                             <img src="<?php echo htmlspecialchars($room['image1']); ?>" class="img-fluid" alt="">
                         </div>
                         <div class="m-3 my-5">
                             <h1 class="text-color-1 cormorant-text fw-bold">Features</h1>
                             <h5>
                                 <ul class="text-dark mb-5">
                                     <li class="dm-sans-text">Wi-fi</li>
                                 </ul>
                             </h5>
                             <h1 class="text-color-1 cormorant-text fw-bold">Facilities</h1>
                             <h5>
                                 <ul class="text-dark">
                                     <li class="dm-sans-text">Kitchen</li>
                                     <li class="dm-sans-text">Comfort-room</li>
                                 </ul>
                             </h5>
                         </div>

                         <div class=" more-image mb-5">
                             <h1 class="text-color-1 cormorant-text px-3 fw-bold">More Images:</h1>
                             <div id="carouselExampleIndicators" class="carousel slide custom-carousel">
                                 <div class="carousel-indicators">
                                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                     <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                 </div>
                                 <div class="carousel-inner">
                                     <?php
                                        $images = [];
                                        for ($i = 1; $i <= 6; $i++) {
                                            if (!empty($room["image$i"])) {
                                                $images[] = $room["image$i"];
                                            }
                                        }

                                        // If there is only one image, duplicate it to ensure the carousel works
                                        if (count($images) == 1) {
                                            $images[] = $images[0];
                                        }

                                        foreach ($images as $index => $image) {
                                        ?>
                                         <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">
                                             <img src="<?php echo htmlspecialchars($image); ?>" class="img-fluid d-block w-100" alt="...">
                                         </div>
                                     <?php
                                        }
                                        ?>
                                 </div>
                                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                     <span class="visually-hidden">Previous</span>
                                 </button>
                                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                     <span class="visually-hidden">Next</span>
                                 </button>
                             </div>
                         </div>
                     </div>

                     <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 my-3">
                         <form id="reservationForm" action="../../backends/subadmin/process_reservation.php" method="POST">
                             <input type="hidden" name="roomID" value="<?php echo $roomID; ?>">
                             <div class="card bg-color-1 shadow">
                                 <div class="card-body">
                                     <div class="row m-1 d-flex justify-content-center">
                                         <h3 class="card-title cormorant-text fs-2 text-light my-3">Your Reservation</h3>

                                         <h5 class="card-title cormorant-text  text-light my-3">Personal Information</h5>
                                         <div class="col-lg-12">
                                             <div class="form-floating mb-3">
                                                 <input type="text" class="form-control shadow" name="fullname" placeholder=" " required>
                                                 <label for="" class="dm-sans-text">Full Name</label>
                                             </div>

                                             <div class="form-floating mb-3">
                                                 <input type="text" class="form-control shadow" name="regadd" placeholder=" " required>
                                                 <label for="" class="dm-sans-text">Address (Registrant Address)</label>
                                             </div>
                                         </div>

                                         <div class="col-lg-6 col-sm-6">
                                             <div class="form-floating mb-3">
                                                 <input type="email" class="form-control shadow" name="regemail" placeholder=" " required>
                                                 <label for="" class="dm-sans-text">Email Address</label>
                                             </div>
                                         </div>
                                         <div class="col-lg-6 col-sm-6">
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="regnum" placeholder=" " required>
                                                 <label for="" class="dm-sans-text">Contact Number</label>
                                             </div>
                                         </div>

                                         <h5 class="card-title cormorant-text  text-light mt-3">Companions' Information</h5>
                                         <div class="col-6">
                                             <p class="card-title cormorant-text text-light">Maximum of: <span class="cormorant-text text-light fs-4"><?php echo htmlspecialchars($room['adultMax']); ?></span></p>
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="numadult" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">No. of Adults</label>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <p class="card-title cormorant-text text-light">Maximum of: <span class="cormorant-text text-light fs-4"><?php echo htmlspecialchars($room['ChildrenMax']); ?></span></p>
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="numchild" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">No. of Children</label>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="nummale" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">No. of Males</label>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="numfemale" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">No. of Females</label>
                                             </div>
                                         </div>


                                         <h5 class="card-title cormorant-text  text-light mt-3">Companions' Addresses</h5>
                                         <p class="card-title cormorant-text text-light">Note: Type the number of citizen(including the registrant) reciding in this: </p>
                                         <div class="col-6">
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="thiscity" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">This City/Municipality</label>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="othercity" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">Other City/Municipality</label>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="otherprovince" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">Other Province</label>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div class="form-floating mb-3">
                                                 <input type="number" class="form-control shadow" name="foreigncountry" id="floatinginput" placeholder="">
                                                 <label for="floatingcout" class="dm-sans-text">Foreign Country</label>
                                             </div>
                                         </div>

                                         <h5 class="card-title cormorant-text  text-light mt-3">Booking Information</h5>
                                         <div class="col-lg-6 col-sm-6">
                                             <div class="form-floating mb-3">
                                                 <input type="text" class="form-control shadow" name="checkin" id="checkin" placeholder="" required>
                                                 <label for="checkin" class="fw-bold dm-sans-text">Check In</label>
                                             </div>
                                         </div>
                                         <div class="col-lg-6 col-sm-6">
                                             <div class="form-floating mb-3">
                                                 <input type="text" class="form-control shadow" name="departure" id="departure" placeholder="" required>
                                                 <label for="departure" class="fw-bold dm-sans-text">Departure</label>
                                             </div>
                                         </div>

                                         <div class="col-lg-12 d-grid my-4">
                                             <h5 class="text-light dm-sans-text fw-bold">Price:<span class="text-ligth"> &#8369 <?php echo number_format(htmlspecialchars($room['roomPrice']), 2, '.', ','); ?></span> /night</h5>
                                             <button type="button" class="btn btn-success shadow dm-sans-text fw-bold" data-bs-toggle="modal" data-bs-target="#reservationConfirmationModal">BOOK NOW!</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                         <div>
                             <div class="shadow p-3 text-dark">
                                 <div class="">
                                     <h5 class="card-title cormorant-text text-dark">Check Availabilities</h5>
                                     <div id="calendar"></div>
                                 </div>
                             </div>


                             <script>
                                 document.addEventListener('DOMContentLoaded', function() {
                                     var roomID = <?php echo $roomID; ?>;

                                     fetch('../../backends/subadmin/fetch_booked_dates.php', {
                                             method: 'POST',
                                             headers: {
                                                 'Content-Type': 'application/x-www-form-urlencoded'
                                             },
                                             body: new URLSearchParams({
                                                 roomID: roomID
                                             })
                                         })
                                         .then(response => response.json())
                                         .then(data => {
                                             var bookedDates = data.bookedDates;

                                             var calendarEl = document.getElementById('calendar');
                                             var calendar = new FullCalendar.Calendar(calendarEl, {
                                                 initialView: 'dayGridMonth',
                                                 datesSet: function(info) {
                                                     var events = [];
                                                     var today = new Date();
                                                     var currentMonth = today.getMonth();
                                                     var currentYear = today.getFullYear();

                                                     function isInCurrentMonth(date) {
                                                         var dateObj = new Date(date);
                                                         return dateObj.getMonth() === currentMonth && dateObj.getFullYear() === currentYear;
                                                     }

                                                     for (var d = new Date(info.start); d <= new Date(info.end); d.setDate(d.getDate() + 1)) {
                                                         var dateStr = d.toISOString().split('T')[0];
                                                         var dateObj = new Date(dateStr);

                                                         if (dateObj.getFullYear() >= 2025 ||
                                                             (dateObj.getFullYear() === currentYear && (dateObj.getMonth() >= 10 || dateObj.getMonth() <= 0))) {
                                                             // November, December, January 2025, and beyond
                                                             events.push({
                                                                 start: dateStr,
                                                                 end: dateStr,
                                                                 display: 'background',
                                                                 backgroundColor: '#28a745' // Green for specified months and years
                                                             });
                                                         } else if (isInCurrentMonth(dateStr)) {
                                                             if (dateObj < today) {
                                                                 events.push({
                                                                     start: dateStr,
                                                                     end: dateStr,
                                                                     display: 'background',
                                                                     backgroundColor: '#d3d3d3'
                                                                 });
                                                             } else if (bookedDates.includes(dateStr)) {
                                                                 events.push({
                                                                     start: dateStr,
                                                                     end: dateStr,
                                                                     display: 'background',
                                                                     backgroundColor: '#ff9f89'
                                                                 });
                                                             } else {
                                                                 events.push({
                                                                     start: dateStr,
                                                                     end: dateStr,
                                                                     display: 'background',
                                                                     backgroundColor: '#28a745'
                                                                 });
                                                             }
                                                         }
                                                     }
                                                     calendar.removeAllEvents();
                                                     calendar.addEventSource(events);
                                                 }
                                             });

                                             calendar.render();
                                         });
                                 });
                             </script>
                             <div class=" resort-quick-information mt-5">
                                 <h3 class="cormorant-text fw-bold text-color-1">Resort Information</h3>
                                 <div class="text-dark ms-5">
                                     <h5>Contact Number: <?php echo htmlspecialchars($businessInfo['BusinessContactNumber']); ?></h5>
                                     <h5>Location Address: <?php echo htmlspecialchars($businessInfo['BusinessAddress']); ?></h5>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="col-xxl-8 col-xl-10 col-lg-10 col-md-11 col-md-12 mx-3 mb-5">
                         <div class="d-flex justify-content-tstart">
                             <h1 class="text-dark cormorant-text display-3 fw-bold mt-5">Related Rooms</h1>
                         </div>
                         <div class="row">

                             <?php if (empty($rooms)): ?>
                                 <p class="text-muted">No available rooms</p>
                             <?php else: ?>
                                 <?php foreach ($rooms as $room): ?>
                                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-10 my-4 d-flex justify-content-center">
                                         <div class="card shadow custom-card-height rounded-0 overflow-hidden">
                                             <div class="img-container">
                                                 <img src="<?php echo htmlspecialchars($room['image1']); ?>" class="card-img-top rounded-0" alt="Room Image">
                                             </div>
                                             <div class="card-body">
                                                 <div class="price-overlay shadow bg-light rounded-5">
                                                     <h5 class="p-3 text-center dm-sans-text fw-bold text-secondary">Price: <span class="text-danger">&#8369 <?php echo htmlspecialchars($room['roomPrice']); ?></span>/Night</h5>
                                                 </div>
                                                 <h3 class="card-title text-color-1 fw-bold cormorant-text"><?php echo htmlspecialchars($room['roomName']); ?></h3>
                                                 <p class="card-text dm-sans-text text-secondary"><?php echo htmlspecialchars($room['RoomDescriptions']); ?></p>
                                                 <a href="../../resort/page-3.php?roomID=<?php echo $room['roomID']; ?>&businessInfoID=<?php echo $businessInfoID; ?>" class="btn btn-book fw-bold dm-sans-text rounded-0 py-3 px-4">BOOK NOW</a>
                                             </div>
                                         </div>
                                     </div>
                                 <?php endforeach; ?>
                             <?php endif; ?>

                         </div>
                     </div>
                 </div>
         </section>

         <section id="contact" class="contact-container">
             <div class="container-fluid p-5 bg-color-6">
                 <div class="row justify-content-evenly">
                     <div class="col-lg-4 col-sm-5 gx-5 mb-4">
                         <div class="col-12">
                             <h5 class="text-start text-success fw-bold">CONTACT US</h5>
                         </div>
                         <div class="col-12">
                             <h3 class="text-start text-dark">Get in touch with us</h3>
                         </div>
                         <div class="col-12 mb-3">
                             <label for="text" class="form-label text-start text-dark ms-2">Name</label>
                             <input type="text" class="form-control shadow" name="" placeholder="Juan Dela Cruz">
                         </div>
                         <div class="col-12 mb-3">
                             <label for="email" class="form-label text-start text-dark ms-2">Email address</label>
                             <input type="email" class="form-control shadow" name="" placeholder="name@example.com">
                         </div>
                         <div class="col-12 mb-3">
                             <label for="contact" class="form-label text-start text-dark ms-2">Phone number</label>
                             <input type="number" class="form-control shadow" name="" placeholder="09123456789">
                         </div>
                         <div class="col-12 mb-5">
                             <label for="message" class="form-label text-start text-dark ms-2">Message</label>
                             <textarea class="form-control shadow" name="" rows="3"></textarea>
                         </div>
                         <div class="col-12 mb-1 d-grid">
                             <button class="btn btn-success shadow">Submit</button>
                         </div>
                     </div>

                     <div class="col-lg-4 col-sm-5 gx-5 bg-light">
                         <div id="googleMap" style="width:100%;height:400px;"></div>
                         <script>
                             function myMap() {
                                 var mapProp = {
                                     center: new google.maps.LatLng(14.1591, 121.4709),
                                     zoom: 5,
                                 };
                                 var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                             }
                         </script>

                         <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
                         <!-- <img src="../homepage/majayjaymap.PNG" class="mt-4 w-100 h-50 shadow" alt="" style="object-fit: cover;"> -->
                         <div class="row">
                             <div class="col-12">
                                 <p class="text-start text-dark fw-bold mt-3">Contact us</p>
                                 <p><i class="bi bi-envelope-at text-dark me-2"></i><a href="" class="text-dark">majayjaylaguna@gmail.com</a></p>
                             </div>
                             <div class="col-12 ">
                                 <p class="text-start text-dark fw-bold mt-2">Location</p>
                                 <p><i class="bi bi-geo-alt text-dark me-2"></i><a href="" class="text-dark">Majayjay, Laguna, Philippines</a></p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>


         <section class="footer-container bg-color-1">
             <div class="container-fluid ">
                 <div class="row ">
                     <div class="col-6 text-start">
                         <p class="mb-0">
                             <a href="#" class="text-muted">
                                 <strong>HaKingz</strong>
                             </a>
                         </p>
                     </div>
                     <div class="col-6 text-end mt-2">
                         <ul class="list-inline">
                             <li class="list-inline-item">
                                 <a href="#" class="text-muted">Contact</a>
                             </li>
                             <li class="list-inline-item">
                                 <a href="#" class="text-muted">About Us</a>
                             </li>
                             <li class="list-inline-item">
                                 <a href="#" class="text-muted">Terms</a>
                             </li>
                             <li class="list-inline-item">
                                 <a href="#" class="text-muted">Booking</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </section>

     </main>
 </body>
 <!-- Reservation Confirmation Modal -->
 <div class="modal fade" id="reservationConfirmationModal" tabindex="-1" aria-labelledby="reservationConfirmationModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="reservationConfirmationModalLabel">Confirm Reservation</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 Are you sure you want to book this room?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-primary" id="confirmReservationButton">Confirm</button>
             </div>
         </div>
     </div>
 </div>


 <script>
     document.addEventListener('DOMContentLoaded', () => {
         const notyf = new Notyf({
             duration: 30000,
             position: {
                 x: 'right',
                 y: 'top'
             }
         });

         const form = document.getElementById('reservationForm');
         const confirmButton = document.getElementById('confirmReservationButton');

         confirmButton.addEventListener('click', async () => {
             const formData = new FormData(form);
             const response = await fetch(form.action, {
                 method: 'POST',
                 body: formData
             });

             const result = await response.json();

             if (result.status === 'success') {
                 notyf.success(`Reservation successful! Your reference number is: ${result.referenceNum}`);
                 setTimeout(() => {
                     location.reload();
                 }, 3000); // Reload the page after 3 seconds
             } else if (result.status === 'error') {
                 notyf.error(result.message);
             }

             // Close the modal
             const reservationConfirmationModal = bootstrap.Modal.getInstance(document.getElementById('reservationConfirmationModal'));
             reservationConfirmationModal.hide();
         });
     });
 </script>

 <script>
     $(document).ready(function() {
         const roomID = <?php echo $roomID; ?>;
         const notyf = new Notyf({
             duration: 3000,
             position: {
                 x: 'right',
                 y: 'top'
             }
         });

         function fetchBookedDates(roomID) {
             return $.ajax({
                 url: '../../backends/subadmin/fetch_booked_dates.php',
                 method: 'POST',
                 data: {
                     roomID: roomID
                 },
                 dataType: 'json'
             });
         }

         function disableBookedDates(bookedDates) {
             $("#checkin, #departure").datepicker({
                 dateFormat: 'yy-mm-dd',
                 beforeShowDay: function(date) {
                     const dateString = $.datepicker.formatDate('yy-mm-dd', date);
                     const today = new Date();
                     today.setHours(0, 0, 0, 0); // Set to the beginning of today

                     if (date < today || bookedDates.indexOf(dateString) !== -1) {
                         return [false, 'booked', 'Unavailable'];
                     }
                     return [true, ''];
                 },
                 onSelect: function(selectedDate) {
                     const option = this.id === "checkin" ? "minDate" : "maxDate";
                     const instance = $(this).data("datepicker");
                     const date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                     $("#checkin, #departure").not(this).datepicker("option", option, date);
                 }
             });
         }

         fetchBookedDates(roomID).done(function(response) {
             if (response.bookedDates) {
                 disableBookedDates(response.bookedDates);
             }
         });

         $("#reservationForm").on('submit', function(event) {
             event.preventDefault();
             const formData = $(this).serialize();
             $.ajax({
                 url: $(this).attr('action'),
                 method: 'POST',
                 data: formData,
                 dataType: 'json',
                 success: function(response) {
                     if (response.status === 'success') {
                         notyf.success(`Reservation successful! Your reference number is: ${response.referenceNum}`);
                         setTimeout(() => {
                             location.reload();
                         }, 3000); // Reload the page after 3 seconds
                     } else {
                         notyf.error(response.message);
                     }
                 },
                 error: function() {
                     notyf.error('An error occurred. Please try again later.');
                 }
             });
         });
     });
 </script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
 <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
 <script src="../homepage/homepage.js"></script>

 </html>