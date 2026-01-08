<?php
session_start();
include 'dbcon.php';

$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['go_home'])) {
    $_SESSION['car_selected'] = false;
    header("Location: index.php");
    exit();
}

$premiumCheckQuery = "SELECT * FROM tblsubscriptions WHERE user_id = ?";
$stmt = $con->prepare($premiumCheckQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$premiumResult = $stmt->get_result();
$isPremium = $premiumResult->num_rows > 0;

// Fetch transaction ID
$paymentQuery = "SELECT razorpay_payment_id FROM tblpayments WHERE user_id = ? ORDER BY id DESC LIMIT 1";
$stmt = $con->prepare($paymentQuery);
$stmt->bind_param("i", $userId);
$stmt->execute();
$paymentResult = $stmt->get_result();
$payment = $paymentResult->fetch_assoc();
$transactionId = $payment['razorpay_payment_id'] ?? 'N/A';

$query = "SELECT name, email, phone, address, city, pinCode, carname, dname, price, departureDate, departureTime, arrivalDate, arrivalTime, source, destination, hasLicense
          FROM tblform WHERE user_id = ? ORDER BY id DESC LIMIT 1";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$invoice = $result->fetch_assoc();

if (!$invoice) {
    die("❌ Error: No booking found for this user.");
}

$name = $invoice['name'];
$email = $invoice['email'];
$contact_no = $invoice['phone'];
$address = $invoice['address'];
$city = $invoice['city'];
$pinCode = $invoice['pinCode'];
$carname = $invoice['carname'];
$dname = $invoice['dname'];
$location = $dname;
$price = $invoice['price'];
$departure_date = $invoice['departureDate'];
$departure_time = $invoice['departureTime'];
$arrival_date = $invoice['arrivalDate'];
$arrival_time = $invoice['arrivalTime'];
$source = $invoice['source'];
$destination = $invoice['destination'];
$driverPreference = ($invoice['hasLicense'] == 0) ? "With Driver" : "Without Driver";

$selectedItems = [];

if ($isPremium && !empty($_SESSION['selectedItems']) && is_array($_SESSION['selectedItems'])) {
    $selectedItems = $_SESSION['selectedItems'];
}
$date_time = date("d-m-Y H:i:s");
$invoice_number = 'INV-' . strtoupper(substr(md5(uniqid()), 0, 8));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivons | Invoice</title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    
    <style>
        body { font-family: 'Inter', sans-serif; margin: 40px; padding: 0; background-color: #f9f9f9; }
        .container { max-width: 900px; background: #fff; padding: 40px; margin: auto; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); min-height: 800px; }
        .header { display: flex; justify-content: space-between; align-items: center; font-size: 18px; }
        h2 { font-size: 24px; font-weight: bold; }
        .invoice-details, .supplier-customer { margin-top: 50px; }
        .supplier-customer { display: flex; justify-content: space-between; }
        .invoice-table { width: 100%; border-collapse: collapse; margin-top: 50px; }
        .invoice-table th, .invoice-table td { border: 1px solid #ddd; padding: 15px; text-align: left; font-size: 16px; }
        .invoice-table th { background-color: #eef5ff; font-size: 18px; }
        .total { text-align: right; font-size: 20px; font-weight: bold; margin-top: 30px; }
        .button { display: inline-block; padding: 12px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; }
        .button:hover { background: #0056b3; }
        .outer-button-container { display: flex; justify-content: space-between; max-width: 900px; margin: 30px auto 0; }
        .invoice-number { font-size: 18px; color: #333; }
        .print-button { position: absolute; top: 38px; right: 100px; }
        .footer { text-align: center; font-size: 14px; color: #555; margin-top: 40px; border-top: 1px solid #ddd; padding-top: 10px; }
        @media print { .outer-button-container { display: none; } }
    </style>
</head>
<body>
<a href="#" class="button print-button" onclick="window.print()">Print Invoice</a>
<div class="container">
    <div>
        <div class="header">
            <h2>DRIVONS</h2>
            <div>
                <p class="invoice-number"><strong>Invoice #</strong> <?= htmlspecialchars($invoice_number) ?></p>
                <p class="invoice-number"><strong>Transaction ID:</strong> <?= htmlspecialchars($transactionId) ?></p>
            </div>
        </div>
        <div class="invoice-details">
            <p><strong>Invoice Date:</strong> <?= date("d/m/Y") ?></p>
        </div>
        <div class="supplier-customer">
            <div>
                <h3>Dealer</h3>
                <p>Drivons Car Rental</p>
                <p><?= htmlspecialchars($dname) ?> Dealer</p>
                <p><?= htmlspecialchars($location) ?></p>
            </div>
            <div>
                <h3>Customer</h3>
                <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
                <p><strong>Contact No:</strong> <?= htmlspecialchars($contact_no) ?></p>
                <p><strong>Address:</strong> <?= htmlspecialchars($address) ?></p>
                <p><strong>City:</strong> <?= htmlspecialchars($city) ?></p>
                <p><strong>Pincode:</strong> <?= htmlspecialchars($pinCode) ?></p>
            </div>
        </div>
        <table class="invoice-table">
            <tr>
                <th>Car Name</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Driver</th>
                <th>Price</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($carname) ?></td>
                <td><?= htmlspecialchars($departure_date) ?> <?= htmlspecialchars($departure_time) ?></td>
                <td><?= htmlspecialchars($arrival_date) ?> <?= htmlspecialchars($arrival_time) ?></td>
                <td><?= htmlspecialchars($driverPreference) ?></td>
                <td>₹<?= number_format($price, 2) ?></td>
            </tr>
        </table>

        <table class="invoice-table">
            <tr>
                <th style="width: 50%;">Source</th>
                <th style="width: 50%;">Destination</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($source) ?></td>
                <td><?= htmlspecialchars($destination) ?></td>
            </tr>
        </table>

        <?php if ($isPremium && !empty($selectedItems)) { ?>
        <table class="invoice-table">
            <tr>
                <th>Products</th>
            </tr>
            <?php foreach ($selectedItems as $product) { ?>
            <tr>
                <td><?= htmlspecialchars($product) ?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </div>
    <div class="footer">
        <p><a href="https://www.Drivons.com" target="_blank" style="color: #007bff; text-decoration: none;">www.Drivons.com</a> | hersafarenquiry@gmail.com | +91 99999 99999</p>
    </div>
</div>
<div class="outer-button-container">
    <a href="index.php" class="button">Go to Home</a>
</div>
</body>
</html>
