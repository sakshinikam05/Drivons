<?php
session_start();
include 'dbcon.php';
require 'vendor/autoload.php';
use Razorpay\Api\Api;

$api = new Api('rzp_test_cQAe9X6ZXFbIYK', 'XFy7oXnTKKAmWEHvEmqVMCLi');

$plan = $_POST['plan'];
$amount = $_POST['amount'] * 100;

$orderData = [
    'receipt'         => uniqid(),
    'amount'          => $amount,
    'currency'        => 'INR',
    'payment_capture' => 1
];

$order = $api->order->create($orderData);
$_SESSION['order_id'] = $order['id'];
$_SESSION['plan'] = $plan;
$_SESSION['amount'] = $_POST['amount'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout | Drivons</title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8f9fa;
            margin: 0;
            color: #333;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.26);
            text-align: left;
            width: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 80%; /* Ensures vertical centering */
        }

        h2 {
            color: #222;
            font-weight: 600;
            text-align: center;
        }

        .plan-details {
            font-size: 16px;
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            font-weight: 500;
            border-left: 5px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .plan-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 6px;
            background: #f1f1f1;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 8px;
        }

        .plan-item .icon {
            font-size: 18px;
            color: #007bff;
        }

        .agreement-box {
            font-size: 14px;
            padding: 15px;
            border-radius: 6px;
            background: #fff;
            border: 1px solid #ddd;
            max-height: 180px;
            overflow-y: auto;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .agreement-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            margin-top: 15px;
        }

        .checkbox-container input {
            transform: scale(1.2);
            cursor: pointer;
        }

        .pay-btn {
            background:rgb(1, 118, 244);
            color: white;
            border: none;
            padding: 12px;
            cursor: pointer;
            font-size: 17px;
            border-radius: 8px;
            width: 40%;
            font-weight: 400;
            transition: 0.3s;
            margin-top: 40px; /* Pushes button downward */
            align-self: center; /* Centers the button horizontally */
        }

        .pay-btn:hover {
            background: #0056b3;
        }

        .pay-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Subscription Payment</h2>

    <div class="plan-details">
        <h3>Subscription Summary</h3>
        <div class="plan-item">
            <span class="icon"></span>
            <span><b>Plan:</b> <?= $plan ?></span>
        </div>
        <div class="plan-item">
            <span class="icon"></span>
            <span><b>Amount:</b> ₹<?= $_POST['amount'] ?></span>
        </div>
    </div>

    <div class="agreement-box">
    <div class="agreement-title">Terms & Conditions</div>
    <p>By proceeding with this payment, you acknowledge that you have read, understood, and agreed to the following terms:</p>
    <ol>
        <li><strong>Non-Refundable Payment:</strong> All subscription payments are final and non-refundable. No cancellations or refunds will be processed once the payment is made.</li>

        <li><strong>Subscription Duration & Access:</strong> Your subscription grants access to premium services for the selected duration. The service will be valid until the expiration date, after which it must be renewed.</li>

        <li><strong>Auto-Renewal Policy:</strong> Some subscription plans may have auto-renewal enabled. If applicable, the amount will be deducted automatically from the provided payment method at the end of the current subscription period unless manually canceled.</li>

        <li><strong>Usage Rights & Limitations:</strong> The subscription provides limited access to Drivons' premium services, subject to fair usage policies. Any misuse or violation of our terms may result in suspension or termination of your account.</li>

        <li><strong>Pricing & Changes:</strong> Drivons reserves the right to change the pricing, features, or availability of subscription plans at any time. Any changes will be communicated in advance.</li>

        <li><strong>Service Availability & Limitations:</strong> While we strive to provide uninterrupted services, we do not guarantee 100% uptime. Technical issues, scheduled maintenance, or unforeseen circumstances may temporarily impact service availability.</li>

        <li><strong>Privacy & Data Security:</strong> Your personal and payment details are securely processed following industry standards. We do not store credit/debit card details. Refer to our <a href="#">Privacy Policy</a> for more details.</li>

        <li><strong>Dispute Resolution:</strong> Any disputes arising from this transaction will be subject to resolution as per company policy. Legal jurisdiction will be within India.</li>

        <li><strong>Liability & Indemnification:</strong> Drivons will not be held liable for indirect, incidental, or consequential damages resulting from service usage. Users agree to indemnify Drivons against any claims arising from violations of these terms.</li>

        <li><strong>Termination & Account Suspension:</strong> We reserve the right to terminate any subscription or user account found violating our policies, engaging in fraudulent activities, or misusing our platform.</li>

        <li><strong>Agreement Updates:</strong> These terms are subject to change. Users will be notified of significant updates, and continued use of the service implies acceptance of the modified terms.</li>
    </ol>
</div>


    <div class="checkbox-container">
        <input type="checkbox" id="agree-checkbox">
        <label for="agree-checkbox">I agree to the Terms & Conditions</label>
    </div>

    <button id="pay-now" class="pay-btn" disabled>Proceed to Payment</button>
</div>

<script>
document.getElementById("agree-checkbox").addEventListener("change", function () {
    document.getElementById("pay-now").disabled = !this.checked;
});

document.getElementById("pay-now").addEventListener("click", function () {
    var options = {
        "key": "rzp_test_cQAe9X6ZXFbIYK",
        "amount": "<?= $amount ?>",
        "currency": "INR",
        "order_id": "<?= $order['id'] ?>",
        "name": "Drivons",
        "description": "Subscription Payment",
        "prefill": {
            "name": "<?= $_SESSION['username'] ?>",
            "email": "<?= $_SESSION['email'] ?>"
        },
        "theme": {
            "color": "#405FF2"
        },
        "handler": function (response) {
            fetch("verify_payment.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "payment_id=" + encodeURIComponent(response.razorpay_payment_id) +
                      "&order_id=" + encodeURIComponent("<?= $order['id'] ?>") +
                      "&plan=" + encodeURIComponent("<?= $plan ?>") +
                      "&amount=" + encodeURIComponent("<?= $_POST['amount'] ?>")
            })
            .then(response => response.text())
            .then(data => {
                console.log("Payment Verification Response:", data);
                if (data.includes("success")) {
                    window.location.href = "invoice.php";
                } else {
                    alert("Payment Verification Failed!");
                }
            })
            .catch(error => {
                console.error("Error in verification:", error);
                alert("Payment verification failed. Please try again.");
            });
        },
        "modal": {
            "ondismiss": function () {
                // Handle payment decline case
                fetch("update_payment_status.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: "status=failed&order_id=<?= $order['id'] ?>"
                }).then(() => {
                    alert("Payment Declined! Redirecting to Subscription page.");
                    window.location.href = "subscription.php";
                });
            }
        }
    };
    
    var rzp1 = new Razorpay(options);
    rzp1.open();
});
</script>

</body>
</html>