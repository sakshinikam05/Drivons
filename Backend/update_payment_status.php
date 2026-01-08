<?php
session_start();
require('dbcon.php');

if ($_POST['status'] == 'failed') {
    $order_id = $_POST['order_id'];
    $user_id = $_SESSION['user_id'] ?? null;
    $username = $_SESSION['username'] ?? 'Guest';
    $email = $_SESSION['email'] ?? 'Unknown';
    $plan = $_SESSION['plan'];
    $amount = $_SESSION['amount'];
    
    $stmt = $con->prepare("INSERT INTO tblsubscriptions (user_id, username, email, plan, amount, transaction_id, payment_status) VALUES (?, ?, ?, ?, ?, ?, 'Failed')");
    $stmt->bind_param("isssis", $user_id, $username, $email, $plan, $amount, $order_id);
    $stmt->execute();
}
?>
