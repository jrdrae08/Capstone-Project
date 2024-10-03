<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'businessowner') {
  header('Location: ../login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sub-admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Notyf connection -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
  <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>
  <link rel="stylesheet" href="../css/businessowner.css">
  <link rel="stylesheet" href="../css/businessowner.css">
</head>

<body>
  <div class="wrapper">

    <?php include '../businessowner/includes/aside.php'; ?>

    <div class="main">

      <?php include '../businessowner/includes/navbar.php'; ?>

      <main class="content px-3 py-2">
        <!-- <div class="container-fluid">
          <div class="mb-3">
          </div>
          <div class="row justify-content-center align-items-center g-2">
            <div class="wrapper">
              <div class="container mt-5">

                <div class="card mb-4">
                  <div class="card-body">
                    <h3 class="card-title">Add Room Facilities</h3>
                    <div class="form-group mb-3">
                      <div class="row g-2">
                        <div class="col-12 col-md-8">
                          <input type="text" class="form-control" placeholder="Enter facility name" id="facilityName">
                        </div>
                        <div class="col-6 col-md-2">
                          <button id="addFacilityButton" class="btn btn-primary w-100" type="button" onclick="showConfirmationModal()">Add</button>
                        </div>
                        <div class="col-6 col-md-2">
                          <button class="btn btn-danger w-100" type="button" onclick="deleteFacility()">Delete</button>
                        </div>

                        <div class="modal fade" id="confirmAddFacilityModal" tabindex="-1" aria-labelledby="confirmAddFacilityModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="confirmAddFacilityModalLabel">Confirm Add Facility</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p>Are you sure you want to add the facility "<span id="facilityNameToAdd"></span>"?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="confirmAddFacilityButton" onclick="addFacility()">Confirm</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <select class="form-select" id="facilityDropdown">
                        <option selected>Select Room</option>
                      </select>
                    </div>
                  </div>
                </div>


                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Facilities List</h3>
                    <div id="facilitiesContainer" class="mb-4">

                    </div>
                    <div class="d-flex justify-content-end">
                      <button class="btn btn-success me-2" type="button" onclick="saveFacilities()">Save</button>
                      <button class="btn btn-secondary" type="button" onclick="cancelChanges()">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->



        <div class="container-fluid">
          <h3>Add Facilities and Features</h3>
          <div class="row mt-4 justify-content-center">
            <div class="col-lg-5">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-bold"> Room Facilities</h4>
                  <div class="form-group mt-3 d-flex justify-content-center align-items-center">
                    <div class="row g-3 mx-0">
                      <div class="col-lg-8 col-md-6">
                        <input type="text" class="form-control shadow" placeholder="Enter facility name" id="facilityName">
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <button id="addFacilityButton" class="btn btn-primary " type="button" onclick="addFacility()"><i class="bi bi-plus"></i> Add</button>
                      </div>
                    </div>
                  </div>

                  <div class="card shadow mx-2 mt-5">
                    <div class="card-body">
                      <h4 class="card-title fw-bold">Facility Lists</h4>
                      <div id="facilitiesContainer" class="mb-4">
                        <!-- Dynamically added facilities will be displayed here -->

                        <div class="facility-lists">
                          <div class="facility-items">
                            <table class="table align-items-center">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Facility Names</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Sofa</td>
                                  <td> <button class="btn btn-danger" type="button" onclick="deleteFacility()"><i class="bi bi-x"></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-5">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-bold">Room Features</h4>
                  <div class="form-group mt-3 d-flex justify-content-center align-items-center">
                    <div class="row g-3 mx-0">
                      <div class="col-lg-8 col-md-6">
                        <input type="text" class="form-control shadow" placeholder="Enter facility name" id="facilityName">
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <button id="addFacilityButton" class="btn btn-primary " type="button" onclick="addFacility()"><i class="bi bi-plus"></i> Add</button>
                      </div>
                    </div>
                  </div>

                  <div class="card shadow mx-2 mt-5">
                    <div class="card-body">
                      <h4 class="card-title fw-bold">Feature Lists</h4>
                      <div id="facilitiesContainer" class="mb-4">
                        <!-- Dynamically added facilities will be displayed here -->

                        <div class="facility-lists">
                          <div class="facility-items">
                            <table class="table ">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Feature Names</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td></td>
                                  <td> <button class="btn btn-danger" type="button" onclick="deleteFacility()"><i class="bi bi-x"></i></button></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- MODAL -->
      <!-- Archive rooms -->
      <div class="modal fade" id="archiveroom" tabindex="-1" aria-labelledby="archiveroom" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered ">
          <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Time Archived</th>
                    <th scope="col">Room name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>11:20PM 01/05/24</td>
                    <td>Room 7</td>
                    <td>2,300</td>
                    <td>
                      <button class="btn btn-primary me-2"><i class="bi bi-eye"></i></i></button>
                      <button class="btn btn-success me-2"><i class="bi bi-arrow-counterclockwise"></i></button>
                      <button class="btn btn-danger me-2"><i class="bi bi-trash3"></i></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>


      <a href="#" class="theme-toggle">
        <i class="fa-regular fa-sun"></i>
        <i class="fa-regular fa-moon"></i>
      </a>
      <footer class="footer">
        <?php include '../businessowner/includes/footer.php'; ?>
      </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/businessowner.js"></script>
</body>


<!-- Fetch rooms on dropdown -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    fetchRooms();

    function fetchRooms() {
      // Send AJAX request to fetch rooms
      fetch('../../backends/subadmin/fetch_rooms.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          }
        })
        .then(response => response.json())
        .then(data => {
          const dropdown = document.getElementById('facilityDropdown');
          dropdown.innerHTML = '<option selected>Select Room</option>'; // Reset dropdown

          // Check if there's an error
          if (data.error) {
            console.error(data.error);
            return;
          }

          // Populate the dropdown with room names
          data.forEach(room => {
            const option = document.createElement('option');
            option.value = room.roomID;
            option.textContent = room.roomName;
            dropdown.appendChild(option);
          });
        })
        .catch(error => console.error('Error fetching rooms:', error));
    }
  });
</script>


<!-- Add Facilities -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const notyf = new Notyf({
      duration: 3000, // Adjust the duration as needed
      position: {
        x: 'right',
        y: 'top'
      }
    });

    function showConfirmationModal() {
      const facilityNameInput = document.getElementById('facilityName');
      const facilityName = facilityNameInput.value.trim();

      // Validate the facility name before showing the modal
      if (!facilityName) {
        notyf.error('Facility name cannot be empty');
        return;
      }

      // Set the facility name in the modal text
      document.getElementById('facilityNameToAdd').textContent = facilityName;

      // Show the confirmation modal
      const confirmModal = new bootstrap.Modal(document.getElementById('confirmAddFacilityModal'));
      confirmModal.show();
    }

    function addFacility() {
      const facilityNameInput = document.getElementById('facilityName');
      const facilityName = facilityNameInput.value.trim();

      fetch('../../backends/subadmin/add_facility.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            facilityName: facilityName
          })
        })
        .then(response => response.json())
        .then(data => {
          // Hide the modal before showing the notification
          const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmAddFacilityModal'));
          confirmModal.hide();

          if (data.status === 'success') {
            notyf.success('Facility added successfully');
            facilityNameInput.value = ''; // Clear the input field
          } else {
            notyf.error(data.message);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          // Hide the modal before showing the error notification
          const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmAddFacilityModal'));
          confirmModal.hide();
          notyf.error('An error occurred while adding the facility');
        });
    }

    // Attach the functions to global scope or buttons
    window.showConfirmationModal = showConfirmationModal;
    window.addFacility = addFacility;
  });
</script>


<!-- Fetch Facilities with check -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const facilitiesContainer = document.getElementById('facilitiesContainer');

    // Fetch facilities from the backend
    fetch('../../backends/subadmin/fetch_room_facilities.php')
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          // Clear the container first
          facilitiesContainer.innerHTML = '';

          // Loop through each facility and create a checkbox with only the facility name
          data.facilities.forEach(facility => {
            const facilityDiv = document.createElement('div');
            facilityDiv.className = 'form-check';

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.className = 'form-check-input';
            checkbox.name = 'facilities[]'; // Add this to handle multiple selections
            checkbox.value = facility.FacilityName;

            const label = document.createElement('label');
            label.className = 'form-check-label';
            label.textContent = facility.FacilityName;

            facilityDiv.appendChild(checkbox);
            facilityDiv.appendChild(label);

            facilitiesContainer.appendChild(facilityDiv);
          });
        } else {
          console.error('Error fetching facilities:', data.message);
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
</script>



<script>
  function uploadImage(inputId, imageId) {
    const input = document.getElementById(inputId);
    const image = document.getElementById(imageId);

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        image.src = e.target.result;
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

</html>