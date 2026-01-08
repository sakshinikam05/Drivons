<?php
session_start();
include 'dbcon.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['status']) || !isset($_GET['car_id']) || !isset($_GET['amount'])) {
    header("Location: error.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$status = $_GET['status']; // success or failed
$car_id = $_GET['car_id'];
$amount = $_GET['amount'];
$payment_id = isset($_GET['payment_id']) ? $_GET['payment_id'] : 'N/A';

// Fetch user details
$userQuery = "SELECT username FROM tblusers WHERE id = $user_id";
$userResult = mysqli_query($con, $userQuery);
$user = mysqli_fetch_assoc($userResult);
$username = $user ? $user['username'] : "Unknown";


// Insert into `tblpayments`
$query = "INSERT INTO tblpayments (user_id, username, car_id, amount, payment_status, razorpay_payment_id) 
          VALUES ('$user_id','$username', '$car_id', '$amount', '$status', '$payment_id')";

if (mysqli_query($con, $query)) {
    if ($status == 'success') {
        $_SESSION['success'] = "Payment Successful!";
        header("Location: invoice_main.php");
    } else {
        $_SESSION['error'] = "Payment Failed!";
        echo "<script>
            alert('Payment Failed! Please try again.');
            window.location.href = 'cars.php';
        </script>";
        exit();
    }
} else {
    $_SESSION['error'] = "Payment recorded but database update failed.";
    header("Location: error.php");
}
exit();
?>
