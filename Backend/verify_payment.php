<?php
session_start();
require('dbcon.php');
require 'vendor/autoload.php';
use Razorpay\Api\Api;

if (!isset($_POST['payment_id'])) {
    die("Error: Payment ID not received.");
}

$payment_id = $_POST['payment_id'];
$order_id = $_POST['order_id'] ?? 'N/A';
$plan = $_POST['plan'] ?? 'N/A';
$amount = isset($_POST['amount']) ? $_POST['amount'] * 1 : 0;

$api = new Api('rzp_test_cQAe9X6ZXFbIYK', 'XFy7oXnTKKAmWEHvEmqVMCLi');


file_put_contents('payment_log.txt', print_r($_POST, true), FILE_APPEND);


if (empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_SESSION['user_email'])) {
    $stmt = $con->prepare("SELECT id, username, email FROM tblusers WHERE email = ?");
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_email'] = $user['email'];
    } else {
        die("Error: User details not found in the database.");
    }
}

try {
    $payment = $api->payment->fetch($payment_id);

    if ($payment->status == 'captured') {
        $stmt = $con->prepare("INSERT INTO tblsubscriptions (user_id, username, email, plan, amount, transaction_id, payment_status) VALUES (?, ?, ?, ?, ?, ?, 'Success')");
        $stmt->bind_param("isssds", $_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_email'], $plan, $amount, $payment_id);
        $stmt->execute();

        $_SESSION['invoice_data'] = [
            'username' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email'],
            'plan' => $plan,
            'amount' => $amount,
            'transaction_id' => $payment_id
        ];

        echo "success"; 
        exit();
    } else {
        die("Error: Payment not captured.");
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
