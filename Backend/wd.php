
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivons | Form</title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial';
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            color: #102a43;
        }
    
        h1 {
            text-align: center;
            color: #0f0f0f;
            font-size: 2.75rem;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: -0.05em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
    
        .container {
            max-width: 1300px;
            margin: 40px auto;
            padding: 40px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    
        .form-section {
            margin-bottom: 30px;
            padding: 30px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #f9fafb;
            transition: all 0.3s ease;
        }
    
        .form-section h2 {
            margin-top: 0;
            color: #060606;
            border-bottom: 2px solid #2b6cb0;
            padding-bottom: 10px;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.03em;
        }
    
        .form-group {
            margin-bottom: 20px;
        }
    
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #4a5568;
        }
    
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background-color: #ffffff;
            font-size: 16px;
            color: #4a5568;
            transition: all 0.3s ease;
        }
    
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 8px rgba(66, 153, 225, 0.3);
        }
    
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
    
        .btn {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 30px auto;
            font-size: 16px;
            font-weight: 600;
            padding: 12px;
            background: linear-gradient(135deg, #4299e1, #3182ce);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
        }
    
        .btn:hover {
            background: linear-gradient(135deg, #3182ce, #2b6cb0);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
    
        .file-upload-section {
            display: flex;
            gap: 20px;
        }
    
        .file-upload {
            flex: 1;
        }
    
        .file-upload input[type="file"] {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            font-size: 16px;
            background-color: #ffffff;
        }
    
        .file-upload label {
            display: block;
            font-weight: 500;
            color: #4a5568;
            margin-bottom: 8px;
        }
    
        .source-destination-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
    
        .source-container,
        .destination-container {
            width: 48%;
        }
    
        .key-points {
            margin: 20px 0;
            padding: 20px;
            background: #edf2f7;
            border-radius: 8px;
        }
    
        .key-points h3 {
            margin: 0 0 10px;
            color: #000000;
            font-weight: 600;
        }
    
        .key-points ul {
            margin: 0;
            padding-left: 20px;
        }
    
        .key-points ul li {
            margin-bottom: 10px;
            color: #4a5568;
        }
    
        .checkbox-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
    
        .checkbox-section {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 48%;
        }
    
        .checkbox-section h3 {
            margin-top: 0;
            color: #2b6cb0;
            border-bottom: 2px solid #2b6cb0;
            padding-bottom: 5px;
            font-weight: 600;
        }
    
        .checkbox-group label {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            background: #ffffff;
            transition: all 0.3s ease;
        }
    
        .checkbox-group input {
            margin-right: 10px;
            transform: scale(1.5);
        }
    
        .checkbox-group label:hover {
            background: #4299e1;
            color: #fff;
            cursor: pointer;
        }
    
        .checkbox-group input:checked + span {
            color: #4299e1;
        }
    
        .additional-note {
            padding: 20px;
            background-color: #fffaf0;
            border-radius: 8px;
            border: 1px solid #fed7aa;
            margin-top: 20px;
        }
    
        .additional-note h3 {
            color: #dd6b20;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 600;
        }
    
        .additional-note p {
            color: #dd6b20;
            font-size: 16px;
            margin-bottom: 0;
        }
    
        input::placeholder {
            font-size: 14px;
            color: #a0aec0;
        }
    
        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }
    
            .source-destination-container {
                flex-direction: column;
            }
    
            .file-upload-section {
                flex-direction: column;
            }
    
            .file-upload {
                width: 100%;
            }
    
            .checkbox-container {
                flex-direction: column;
            }
    
            .checkbox-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Drivons Form</h1>

        <form id="rentalForm" action="submit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="car_id" value="<?php echo $_GET['car_id']; ?>">
    
            <!-- Customer Details Section -->
            <section class="form-section">
                <h2>Customer Information</h2>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your registered phone number" required 
                        pattern="[0-9]{10}" maxlength="10" title="Enter a 10-digit phone number">
                </div>
            </section>

            <!-- Address Section -->
            <section class="form-section">
                <h2>Address</h2>
                <div class="form-group">
                    <label for="address">Full Address:</label>
                    <textarea id="address" name="address" placeholder="Enter your Address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" placeholder="Enter your City" required>
                </div>
                <div class="form-group">
                    <label for="pinCode">Pin Code:</label>
                    <input type="text" id="pinCode" name="pinCode" placeholder="Enter PinCode" required>
                </div>
            </section>

            <!-- Add this checkbox before the Driving License section -->
            <section class="form-section">
                <h2>Do you want the car without a driver?</h2>
                <div class="form-group">
                    <label for="hasLicense">
                        <input type="checkbox" id="hasLicense" name="hasLicense" style="width: auto; margin: 0;"> Yes, I want the car without a driver
                    </label>
                </div>
            </section>

            <!-- Driving License Section (Initially Hidden) -->
            <section class="form-section" id="drivingLicenseSection" style="display: none;">
                <h2>Driving License</h2>
                <div class="form-group">
                    <label for="licenseNumber">License Number:</label>
                    <input type="text" id="licenseNumber" name="licenseNumber" >
                </div>
                <div class="file-upload-section">
                    <div class="file-upload">
                        <label for="licenseFrontImage">Upload License Front Image:</label>
                        <input type="file" id="licenseFrontImage" name="licenseFrontImage" accept="image/*" >
                    </div>
                    <div class="file-upload">
                        <label for="licenseBackImage">Upload License Back Image:</label>
                        <input type="file" id="licenseBackImage" name="licenseBackImage" accept="image/*">
                    </div>
                </div>
            </section>

            <script>
                document.getElementById("hasLicense").addEventListener("change", function() {
                    const licenseSection = document.getElementById("drivingLicenseSection");
                    licenseSection.style.display = this.checked ? "block" : "none";
                });
            </script>

            <!-- Source and Destination Section -->
            <section class="form-section">
                <h2>Source and Destination</h2>
                <div class="form-group">
                    <div class="source-destination-container">
                        <div class="source-container">
                            <label for="source">Source:</label>
                            <input type="text" id="source" name="source" required>
                        </div>
                        <div class="destination-container">
                            <label for="destination">Destination:</label>
                            <input type="text" id="destination" name="destination" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="departureDate">Departure Date:</label>
                    <input type="date" id="departureDate" name="departureDate" required>
                </div>
                <div class="form-group">
                    <label for="departureTime">Departure Time:</label>
                    <input type="time" id="departureTime" name="departureTime" required>
                </div>
                <div class="form-group">
                    <label for="arrivalDate">Arrival Date:</label>
                    <input type="date" id="arrivalDate" name="arrivalDate" required>
                </div>
                <div class="form-group">
                    <label for="arrivalTime">Arrival Time:</label>
                    <input type="time" id="arrivalTime" name="arrivalTime" required>
                </div>
            </section>

            <!-- Additional Notes Section -->
            <section class="form-section additional-note">
                <h3>Important Notes</h3>
                <p>Note: If you cause any damage to the vehicle during the rental period, you will be responsible for 
                   the additional costs of repairs. Additionally, if the car is taken outside the agreed destination area, 
                   extra charges may apply for fuel and distance. Please ensure you follow the terms for a smooth experience.</p>
            </section>

            <button class="btn" type="submit" name="submit" value="submit">Submit</button>
        </form>
    </div>
    <script>
        document.getElementById("rentalForm").addEventListener("submit", function(event) {
            alert("Details Submitted Successfully, Now Proceeding Further!");
        });
    </script>

<script>
    document.getElementById("hasLicense").addEventListener("change", function() {
        const licenseSection = document.getElementById("drivingLicenseSection");
        licenseSection.style.display = this.checked ? "block" : "none";
    });

    document.getElementById("rentalForm").addEventListener("submit", function(event) {
        const hasLicenseCheckbox = document.getElementById("hasLicense");
        const licenseFields = document.querySelectorAll("#drivingLicenseSection input");

        // If checkbox is checked, ensure license fields are filled
        if (hasLicenseCheckbox.checked) {
            for (let field of licenseFields) {
                if (field.value.trim() === "") {
                    alert("Please fill in all license details.");
                    event.preventDefault(); // Stop form submission
                    return;
                }
            }
        }
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let today = new Date();
    
    // Format date as YYYY-MM-DD
    let formattedDate = today.toISOString().split('T')[0];

    // Format time as HH:MM (24-hour format)
    let formattedTime = today.toTimeString().split(' ')[0].slice(0,5);

    // Set default values
    document.getElementById("departureDate").value = formattedDate;
    document.getElementById("arrivalDate").value = formattedDate;
    document.getElementById("departureTime").value = formattedTime;
    document.getElementById("arrivalTime").value = formattedTime;
});
</script>
</body>
</html>
