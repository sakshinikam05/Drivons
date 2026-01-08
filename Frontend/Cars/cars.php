<?php
session_start();
include 'dbcon.php';
include 'includes/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch latest booking details from `tblform`
$formQuery = "SELECT * FROM tblform WHERE user_id = $user_id ORDER BY id DESC LIMIT 1";
$formResult = mysqli_query($con, $formQuery);
$formData = mysqli_fetch_assoc($formResult);

// Check if data exists
$hasLicense = isset($formData['hasLicense']) ? $formData['hasLicense'] : 0;

if (!$formData) {
    die("Error: No booking found. Please select a car first.");
}

$car_id = intval($formData['car_id']);

// Fetch car details
$carQuery = "SELECT id, carname, price FROM tblcars WHERE id = $car_id";
$result = mysqli_query($con, $carQuery);
$car = mysqli_fetch_assoc($result);

if (!$car) {
    die("Error: Car not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drivons | Payment</title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8f9fa;
            padding: 20px;
        }

        .container {
            background: #fff;
            width: 480px;
            height: 490px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.08);
            text-align: left;
            border-top: 4px solid #007bff;
        }

        .logo {
            font-size: 18px;
            font-weight: 600;
            color: #007bff;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        h2 {
            font-size: 17px;
            font-weight: 400;
            color: #212529;
            text-align: center;
            margin-bottom: 10px;
        }

        h3 {
            font-size: 25px;
            font-weight: 700;
            color: #212529;
            text-align: center;
            margin-bottom: 25px;
        }

        .plan-details {
            font-size: 16px;
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            font-weight: 400;
            border-left: 5px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .info {
            font-size: 15px;
            margin: 8px 0;
            color: #333;
            font-weight: 500;
        }

        .info span {
            font-weight: 600;
            color: #007bff;
        }

        .checkbox-container {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .pay-btn {
            width: 100%;
            background:rgb(0, 114, 235);
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            disabled: true;
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
    <div class="logo">Drivons</div>
    <h2>Payment for: </h2>
    <h3><?php echo htmlspecialchars($car['carname']); ?></h3>

    <div class="plan-details">
        <p class="info">Price: <span>₹<?php echo number_format($car['price'], 2); ?></span></p>
        <p class="info">From: <span><?php echo htmlspecialchars($formData['source']); ?></span></p>
        <p class="info">To: <span><?php echo htmlspecialchars($formData['destination']); ?></span></p>
        <p class="info">Departure: <span><?php echo $formData['departureDate'] . ' ' . $formData['departureTime']; ?></span></p>
        <p class="info">Arrival: <span><?php echo $formData['arrivalDate'] . ' ' . $formData['arrivalTime']; ?></span></p>
    </div>

    <!-- Checkbox -->
    <div class="checkbox-container">
        <input type="checkbox" id="refund-policy" />
        <label for="refund-policy" id="refund-policy-label"></label>
    </div>

    <button type="button" id="pay-btn" class="pay-btn" disabled>Proceed to Payment</button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let hasLicense = <?php echo $hasLicense; ?>;
        let checkboxLabel = document.getElementById("refund-policy-label");

        if (hasLicense === 1) {
            checkboxLabel.innerHTML =
                'I accept the <b>Refund Policy</b> (If the uploaded license is invalid, the booking will be canceled, and payment will be refunded, but charges will be applied.)';
        } else {
            checkboxLabel.innerHTML =
                'I accept the <b>No Refund Policy</b>';
        }
    });
</script>

<script>
document.getElementById("refund-policy").addEventListener("change", function() {
    document.getElementById("pay-btn").disabled = !this.checked;
});

document.getElementById("pay-btn").addEventListener("click", function() {
    fetch('create_order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ car_id: <?php echo $car_id; ?> })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
            return;
        }

        let options = {
            "key": "<?php echo RAZORPAY_KEY_ID; ?>",
            "amount": data.amount,
            "currency": "INR",
            "name": "Drivons Car Rental",
            "description": "Payment for " + data.car_name,
            "order_id": data.order_id,
            "handler": function (response) {
                window.location.href = "payment_success.php?status=success&payment_id=" + response.razorpay_payment_id + "&car_id=<?php echo $car_id; ?>&amount=<?php echo $car['price']; ?>";
            },
            "prefill": {
                "name": data.username
            },
            "theme": {
                "color": "#007bff"
            },
            "modal": {
                "ondismiss": function(){
                    window.location.href = "payment_success.php?status=failed&car_id=<?php echo $car_id; ?>&amount=<?php echo $car['price']; ?>";
                }
            }
        };

        let rzp = new Razorpay(options);
        rzp.open();
    })
    .catch(error => console.error('Error:', error));
});
</script>

</body>
</html>
