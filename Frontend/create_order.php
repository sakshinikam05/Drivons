<?php
session_start();
include 'dbcon.php';
include 'includes/config.php'; // Razorpay API Keys
require 'vendor/autoload.php';

use Razorpay\Api\Api;

header('Content-Type: application/json'); // Ensure JSON response

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);
if (!isset($data['car_id'])) {
    echo json_encode(['error' => 'Car ID is missing']);
    exit();
}

$user_id = $_SESSION['user_id'];
$car_id = intval($data['car_id']);

// Fetch car details
$carQuery = "SELECT id, carname, price FROM tblcars WHERE id = $car_id";
$result = mysqli_query($con, $carQuery);
$car = mysqli_fetch_assoc($result);

if (!$car) {
    echo json_encode(['error' => 'Car not found']);
    exit();
}

$amount = $car['price'] * 100; // Convert to paise

try {
    $api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);
    
    // Debug API Keys
    if (empty(RAZORPAY_KEY_ID) || empty(RAZORPAY_KEY_SECRET)) {
        echo json_encode(['error' => 'Razorpay API keys missing']);
        exit();
    }

    $order = $api->order->create([
        'amount' => $amount,
        'currency' => 'INR',
        'payment_capture' => 1
    ]);

    echo json_encode([
        'order_id' => $order['id'],
        'amount' => $amount,
        'car_name' => $car['carname']
    ]);
} catch (Exception $e) {
    echo json_encode(['error' => 'Razorpay error: ' . $e->getMessage()]);
}
?>
