<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Notyf connection -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/registration.css">

    <style>
        .progress-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .progress-step {
            width: 20px;
            height: 20px;
            background-color: #d3d3d3;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            color: #fff;
        }

        .progress-step-active {
            background-color: #28a745;
        }

        .progress {
            width: 100%;
            height: 5px;
            background-color: #d3d3d3;
            position: relative;
        }

        .progress-bar {
            height: 5px;
            background-color: #28a745;
            width: 0;
            transition: width 0.3s;
        }

        .btn[disabled] {
            pointer-events: none;
            opacity: 0.6;
        }

        .note-text {
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <main>
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center">
                <div class=" col-lg-4 col-md-8 col-sm-11">
                    <div class="container">
                        <div class="card shadow" style="margin-top:70px;">
                            <div class="card-body">
                                <div class="d-flex justify-content-end my-2">
                                    <div>
                                        <a href="../businessowner/enter-code.php"><i class="bi bi-x-lg text-success btn-close"></i></a>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <img src="../img/general-img/majayjay-logo.webp" alt="" height="50" width="50">
                                    <h4 class="text-center">Business Registration</h4>
                                </div>

                                <!-- Notification Message -->
                                <?php session_start(); ?>
                                <?php if (isset($_SESSION['message'])) : ?>
                                    <div class="alert alert-<?php echo htmlspecialchars($_SESSION['type']); ?> alert-dismissible fade show" role="alert">
                                        <?php echo htmlspecialchars($_SESSION['message']); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['message']); ?>
                                    <?php unset($_SESSION['type']); ?>
                                <?php endif; ?>

                                <!-- Progress bar -->
                                <div class="progress-container mx-5">
                                    <div class="progress-step progress-step-active" data-step="1">1</div>
                                    <div class="progress">
                                        <div class="progress-bar" id="progress-bar"></div>
                                    </div>
                                    <div class="progress-step" data-step="2">2</div>
                                </div>

                                <div id="section1" class="section active">
                                    <div class="row mx-3">
                                        <div class="col-lg-12">
                                            <h5 class="text-center">Step 1: Registrant Information</h5>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating my-2">
                                                <input type="text" class="form-control shadow" name="fname" id="fname" placeholder="" autocomplete="off" required>
                                                <label>First Name</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating my-2">
                                                <input type="text" class="form-control shadow" name="lname" id="lname" placeholder="" autocomplete="off" required>
                                                <label>Last Name</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-floating my-2">
                                                <input type="text" class="form-control shadow" name="mname" id="mname" placeholder="" autocomplete="off">
                                                <label>Middle Name (Optional)</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-floating my-2">
                                                <input type="text" class="form-control shadow" name="contact" id="contactNumber" placeholder="" autocomplete="off" required>
                                                <label>Contact Number</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-floating mt-2">
                                                <input type="email" class="form-control shadow" name="email" id="email" placeholder="" autocomplete="off" required>
                                                <label>Email Address</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-2">
                                            <div class="form-floating">
                                                <input type="file" class="form-control shadow" name="businessPermitImage" id="businessPermitImage" accept="image/jpeg, image/jpg, image/png, image/gif" required>
                                                <label for="businessPermitImage">Business Permit Image</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-2">
                                            <div class="form-floating">
                                                <input type="date" class="form-control shadow" name="bexdate" id="exdate" required>
                                                <label for="exdate">Business Permit Expiration Date</label>
                                            </div>
                                        </div>

                                        <p class="note-text text-secondary m-0">Please make sure the date is the same as the date on business permit</p>

                                        <div class="col-lg-12 d-flex justify-content-end my-3">
                                            <div class="d-grid col-6">
                                                <button type="button" class="btn btn-success" id="nextButton" onclick="nextSection(2)">NEXT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="section2" class="section">
                                    <div class="row mx-3">
                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                                <h5 class="text-center">Step 2: Business Information</h5>
                                                <div class="col-lg-12">
                                                    <div class="form-floating my-3">
                                                        <input type="text" class="form-control shadow" id="floatingSelectGrid" name="btype" value="<?php echo isset($data['BusinessType']) ? htmlspecialchars($data['BusinessType']) : ''; ?>" readonly>
                                                        <label for="floatingSelectGrid">Type of business</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-floating my-3">
                                                        <input type="text" class="form-control shadow" name="bname" id="bname" placeholder="" autocomplete="off" value="<?php echo isset($data['BusinessName']) ? htmlspecialchars($data['BusinessName']) : ''; ?>" required>
                                                        <label>Business Name</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 ">
                                                    <div class="form-floating mt-3">
                                                        <input type="text" class="form-control shadow" name="badd" id="badd" placeholder="" autocomplete="off" value="<?php echo isset($data['BusinessAddress']) ? htmlspecialchars($data['BusinessAddress']) : ''; ?>" required>
                                                        <label>Business Address</label>
                                                        <p class="note-text text-secondary m-0">(Ex. Street, Baranggay, Municipality/City, Province)</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-floating my-3">
                                                        <input type="email" class="form-control shadow" name="bemail" id="bemail" placeholder="" autocomplete="off" value="<?php echo isset($data['BusinessEmail']) ? htmlspecialchars($data['BusinessEmail']) : ''; ?>">
                                                        <label>Business Email Address(Optional)</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-floating my-3">
                                                        <input type="text" class="form-control shadow" id="bc" placeholder="" autocomplete="off" value="<?php echo isset($data['BusinessContactNumber']) ? htmlspecialchars($data['BusinessContactNumber']) : ''; ?>">
                                                        <label>Business Contact Number</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-floating my-2">
                                                        <textarea class="form-control shadow" name="bdesc" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px" required><?php echo isset($data['BusinessDescription']) ? htmlspecialchars($data['BusinessDescription']) : ''; ?></textarea>
                                                        <label for="floatingTextarea">Business Descriptions</label>
                                                        <p class="note-text text-secondary m-0">(Maximum of 50 words)</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 d-flex mb-3">
                                                    <div class="d-grid col-6 mx-auto">
                                                        <button type="button" class="btn btn-secondary me-2" onclick="previousSection(1)">BACK</button>
                                                    </div>

                                                    <div class="d-grid col-6 mx-auto">
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmUpdateModal">UPDATE</button>
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
        </form>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const notyf = new Notyf({
                    duration: 3000, // Adjust the duration as needed
                    position: {
                        x: 'right',
                        y: 'top'
                    }
                });

                const formData = JSON.parse(sessionStorage.getItem('formData'));
                const applicationID = sessionStorage.getItem('applicationID');

                if (formData) {
                    document.getElementById('fname').value = formData.RegistrantFirstName;
                    document.getElementById('lname').value = formData.RegistrantLastName;
                    document.getElementById('mname').value = formData.RegistrantMiddleName || '';
                    document.getElementById('contactNumber').value = formData.ContactNumber;
                    document.getElementById('email').value = formData.Email;

                    const permitExpDate = new Date(formData.PermitExpDate);
                    if (!isNaN(permitExpDate)) {
                        const formattedDate = permitExpDate.toISOString().split('T')[0];
                        document.getElementById('exdate').value = formattedDate;
                    } else {
                        console.error('Invalid date format:', formData.PermitExpDate);
                    }

                    if (formData.BusinessName) {
                        document.getElementById('floatingSelectGrid').value = formData.BusinessType || '';
                        document.getElementById('bname').value = formData.BusinessName;
                        document.getElementById('badd').value = formData.BusinessAddress;
                        document.getElementById('bemail').value = formData.BusinessEmail;
                        document.getElementById('bc').value = formData.BusinessContactNumber || '';
                        document.getElementById('floatingTextarea').value = formData.BusinessDescription;
                    }

                    const fieldsToDisable = ['fname', 'lname', 'mname', 'contactNumber', 'email', 'floatingSelectGrid', 'bname', 'badd', 'bemail', 'bc', 'floatingTextarea'];
                    fieldsToDisable.forEach(fieldId => {
                        document.getElementById(fieldId).disabled = true;
                    });

                    // Clear session storage after using the data
                    sessionStorage.removeItem('formData');
                    sessionStorage.removeItem('applicationID');
                    sessionStorage.removeItem('refNum');
                }

                const confirmationModal = new bootstrap.Modal(document.getElementById('confirmUpdateModal'));

                document.querySelector('[data-bs-target="#confirmUpdateModal"]').addEventListener('click', (event) => {
                    event.preventDefault();
                    confirmationModal.show();
                });

                document.getElementById('confirmUpdateButton').addEventListener('click', async () => {
                    const fileInput = document.getElementById('businessPermitImage');

                    // Check if a file is attached
                    if (fileInput.files.length === 0) {
                        notyf.error('Please attach a business permit image.');
                        return;
                    }

                    confirmationModal.hide();

                    const updatedData = {
                        update: true,
                        applicationID: applicationID,
                        bexdate: document.getElementById('exdate').value,
                    };

                    const fileData = new FormData();
                    fileData.append('applicationID', applicationID);
                    fileData.append('updatedData', JSON.stringify(updatedData));

                    const file = fileInput.files[0];
                    const allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];

                    // Validate file size (limit to 5MB)
                    if (file.size > 5000000) {
                        notyf.error('Sorry, your file is too large. Maximum allowed size is 5MB.');
                        return;
                    }

                    // Validate file type
                    if (!allowedFileTypes.includes(file.type)) {
                        notyf.error('Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.');
                        return;
                    }

                    fileData.append('businessPermitImage', file);

                    // Validate expiration date
                    const currentDate = new Date();
                    const expirationDate = new Date(document.getElementById('exdate').value);

                    if (expirationDate < currentDate) {
                        notyf.error('Business Permit Expiration Date cannot be in the past.');
                        return;
                    }

                    try {
                        const response = await fetch('../../backends/subadmin/re-regfunction.php', {
                            method: 'POST',
                            body: fileData
                        });

                        const result = await response.json();

                        if (result.status === 'success') {
                            notyf.success('Data updated successfully');
                            setTimeout(() => {
                                window.location.href = '../../businessowner/success.php';
                            }, 3000);
                        } else {
                            notyf.error(result.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        notyf.error('An error occurred while updating the data.');
                    }
                });
            });
        </script>


    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../js/businessowner.js"></script>

    <script>
        function nextSection(section) {
            document.querySelectorAll('.section').forEach(function(el) {
                el.classList.remove('active');
            });
            document.getElementById('section' + section).classList.add('active');
            updateProgressBar(section);
        }

        function previousSection(section) {
            document.querySelectorAll('.section').forEach(function(el) {
                el.classList.remove('active');
            });
            document.getElementById('section' + section).classList.add('active');
            updateProgressBar(section);
        }

        function updateProgressBar(section) {
            const progressBar = document.getElementById('progress-bar');
            const steps = document.querySelectorAll('.progress-step');
            steps.forEach((step, index) => {
                if (index < section) {
                    step.classList.add('progress-step-active');
                } else {
                    step.classList.remove('progress-step-active');
                }
            });
            progressBar.style.width = ((section - 1) / (steps.length - 1)) * 100 + '%';
        }
        document.addEventListener('DOMContentLoaded', validateFields);
    </script>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmUpdateModal" tabindex="-1" aria-labelledby="confirmUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmUpdateModalLabel">Confirm Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to update this information?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="confirmUpdateButton">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>