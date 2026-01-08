<?php
include 'session.php';
include 'dbcon.php';
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $car_id = $_POST['car_id'];

    // Fetch car details from tblcars
    $query = "SELECT carname, dname, price FROM tblcars WHERE id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $car_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $car = $result->fetch_assoc();

    if (!$car) {
        die("❌ Error: No car found with ID " . htmlspecialchars($car_id));
    }

    $carname = $car['carname'];
    $dname = $car['dname'];
    $price = $car['price'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pinCode = $_POST['pinCode'];
    $hasLicense = isset($_POST['hasLicense']) ? 1 : 0;
    $licenseNumber = $hasLicense ? $_POST['licenseNumber'] : NULL;
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $departureDate = $_POST['departureDate'];
    $departureTime = $_POST['departureTime'];
    $arrivalDate = $_POST['arrivalDate'];
    $arrivalTime = $_POST['arrivalTime'];
    $userId = $_SESSION['user_id']; // Ensure session contains user ID

    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $licenseFrontImage = NULL;
    $licenseBackImage = NULL;

    if ($hasLicense) {
        if (isset($_FILES['licenseFrontImage']) && $_FILES['licenseFrontImage']['size'] > 0) {
            $licenseFrontImage = 'uploads/' . basename($_FILES['licenseFrontImage']['name']);
            move_uploaded_file($_FILES['licenseFrontImage']['tmp_name'], $licenseFrontImage);
        }

        if (isset($_FILES['licenseBackImage']) && $_FILES['licenseBackImage']['size'] > 0) {
            $licenseBackImage = 'uploads/' . basename($_FILES['licenseBackImage']['name']);
            move_uploaded_file($_FILES['licenseBackImage']['tmp_name'], $licenseBackImage);
        }
    }

    // Insert into database
    $query = "INSERT INTO tblform (user_id,name, email, phone, address, city, pinCode, hasLicense, licenseNumber, licenseFrontImage, licenseBackImage, source, destination, departureDate, departureTime, arrivalDate, arrivalTime,car_id, carname, dname, price) 
              VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
    $stmt = $con->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param(
        "issssssisssssssssisss",
        $userId,$name, $email, $phone, $address, $city, $pinCode,
        $hasLicense, $licenseNumber, $licenseFrontImage, $licenseBackImage,
        $source, $destination, $departureDate, $departureTime,
        $arrivalDate, $arrivalTime, $car_id, $carname, $dname, $price
    );

    if ($stmt->execute()) {
        $checkPremium = $con->prepare("SELECT * FROM tblsubscriptions WHERE user_id = ? AND plan = 'Premium' ORDER BY id DESC LIMIT 1");
        $checkPremium->bind_param("i", $userId);
        $checkPremium->execute();
        $result = $checkPremium->get_result();
    
         // Reset sessions properly
        $_SESSION['car_selected'] = true;
        
        if ($result->num_rows > 0) {
            header("Location: accessories.php");
        } else {
            header("Location: cars.php");
        }
        exit();
    } else {
        die("Error executing query: " . $stmt->error);
    }
    
}
?>
