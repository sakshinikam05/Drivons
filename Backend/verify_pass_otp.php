<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form was submitted and email is set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Validate the email format
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email'] = $email;  // Store the email in session
        header('Location: verify_pass_otp.php');  // Redirect to OTP verification page
        exit();
    }
}

// Include PHPMailer files
require 'vendor/autoload.php';

// Check if the reset OTP is set, otherwise redirect to resend OTP page
if (!isset($_SESSION["reset_otp"])) {
    header("Location: resend_otp_pass.php"); // Redirect to the page where the user can request OTP
    exit();
}

// **Only Process Resend OTP Logic When the Resend OTP Button is Clicked**
if (isset($_POST['resend_otp'])) {
    // Generate a new OTP
    $otp = rand(100000, 999999);  // Generate a 6-digit OTP
    $_SESSION["reset_otp"] = $otp; // Store OTP in session for verification

    // Get the email from session
    $email = $_SESSION['email'];

    // Set up PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Use Gmail SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'hersafarenquiry@gmail.com'; // Your Gmail address
        $mail->Password = 'kagy kqij yhva ujri'; // Your Gmail app password (use App Passwords if 2FA is enabled)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('hersafarenquiry@gmail.com', 'Drivons');
        $mail->addAddress($email);  // Recipient's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New OTP To Reset Password';
        $mail->Body    = "
            <h3>Dear User,</h3>
            <p>We Received another request to reset your password for your account. Please use the following One-Time Password (OTP) to complete the process:</p>
            <h2 style='color: #0f3cb7;'>$otp</h2>
            <p>This OTP is valid for 01 minute. If you did not request a password reset, please ignore this email or contact our support team.</p>
            <p>Best regards,<br>Drivons Team</p>
            <p><strong>Contact Us:</strong><br>If you have any questions, feel free to contact us at <a href='mailto:hersafarenquiry@gmail.com'>support@drivons.com</a>.</p>
        ";

        // Send email
        $mail->send();

        // Set a flag to indicate that OTP was resent successfully
        $_SESSION['otp_resend'] = true;  // Flag to show confirmation message
        header("Location: verify_pass_otp.php"); // Redirect back to the verify page
        exit();

    } catch (Exception $e) {
        // Show error if email sending fails
        echo "<script>alert('Failed To Send OTP. Please try again later.');</script>";
        exit();
    }
}

// OTP verification logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_otp'])) {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION["reset_otp"]) {
        // OTP verified successfully
        $_SESSION['otp_verified'] = true;  // Set session flag for successful verification
    } else {
        echo "<script>alert('Invalid OTP. Please try again.');</script>";
    }
}
?>


<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
       Drivons | Verify OTP
    </title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Roboto', sans-serif;
            background-image: url(images/resource/sign.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        body:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #050B20;
            opacity: 0.2;
        }
        .container {
            background-color: #000000ae;
            backdrop-filter: blur(1.2px);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 90%;
            max-width: 375px;
            overflow: hidden;
        }
        .container img {
            width: 50px;
            margin-bottom: 12px;
        }
        .container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: rgb(233, 233, 233);
        }
        .container p {
            font-size: 14px;
            color: rgb(197, 195, 195);
            margin-bottom: 30px;
        }

        .otp-container {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Vertically center align */
            gap:0;
        }

        .otp-label {
            font-size: 15px;
            color: #e0e0e0;
        }

        .timer {
            font-size: 10px;
            height:10px;
            color: #ccc;
            text-decoration: underline;
            text-align: right;
            transition:none;
        }

        .otp-input {
            margin-bottom: 10px; /* Added margin to create space */
        }
        .otp-input input {
            border:none;
            width: 100%;
            padding: 10px;
            font-size: 14px;
            background-color: #333;
            border-radius: 5px;
            color: white;
            height: 35px; /* Increased height */
        }
        .otp-input input::placeholder{
            color: #aaa;
            font-size: 13.5px;
        }
        .verify-btn {
            background-color: #0f3cb7;
            color: white;
            padding: 9px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 15px;
            margin-bottom:20px;
            margin-top: 25px;
        }
        .verify-btn:hover {
            background-color: #0d3299;
        }
        .back-link {
            display: block;
            margin-top: -4px;
            font-size: 14px;
            color: #1a4dd9;
            text-decoration: none;
        }
        .back-link i {
            margin-right: 5px;
            margin-bottom:18px;
        }
        .back-link:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <img alt="Email icon" src="images/resource/password_3176384.png"/>
    <h1>
        Drivons | Verify OTP 
    </h1>
    <p>
        OTP Has Been Sent To Your Registered Email!
    </p>
    <!-- Only one form here -->
    <form method="POST" action="">
        <div class="otp-container">
            <div class="otp-label">
                Enter OTP
            </div>
            <p class="timer" id="timer"></p>
        </div>
        <div class="otp-input">
            <input maxlength="6" type="text" name="otp" placeholder="Enter OTP" required/>
        </div>
                <button type="submit" class="verify-btn" name="verify_otp">Verify OTP</button>

    <a class="back-link" href="login.php">
        <i class="fas fa-arrow-left"></i>
        Back To Registration
    </a>
</div>
<?php if (isset($_SESSION['otp_resend']) && $_SESSION['otp_resend'] == true): ?>
    <script>alert('A New OTP has been sent to your email for password reset.');</script>
    <?php unset($_SESSION['otp_resend']); ?>  <!-- Unset the flag after displaying the message -->
<?php endif; ?>

<!-- Display success message if OTP is verified -->
<?php if (isset($_SESSION['otp_verified']) && $_SESSION['otp_verified'] == true): ?>
<script>
    alert('Verification successful. Now you can reset your password.');
    window.location.href = 'reset_password.php'; // Redirect after showing the alert
</script>
<?php unset($_SESSION['otp_verified']); ?>  <!-- Unset the flag after displaying the message -->
<?php endif; ?>

    <script>
    const otpInput = document.getElementById('otp');

    otpInput.addEventListener('input', (e) => {
        if (otpInput.value.length > 6) {
            otpInput.value = otpInput.value.slice(0, 6); // Limit to 4 characters
        }
    });
    </script>
    <script>
    
    document.getElementById('resendButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission when clicking the resend button

    const form = document.createElement('form');
    form.method = 'POST'; // Set form method to POST
    form.action = ''; // Current page, same as the action attribute in your form

    // Add a hidden input to trigger the resend OTP logic
    const resendOtpInput = document.createElement('input');
    resendOtpInput.type = 'hidden';
    resendOtpInput.name = 'resend_otp';
    resendOtpInput.value = '1'; // Trigger the resend OTP logic

    form.appendChild(resendOtpInput);
    document.body.appendChild(form);
    form.submit(); // Submit the form programmatically
});

</script>
<script>
    const otpInput = document.getElementById('otp');

    otpInput.addEventListener('input', (e) => {
        if (otpInput.value.length > 6) {
            otpInput.value = otpInput.value.slice(0, 6); // Limit to 4 characters
        }
    });
</script>

<script>
    document.getElementById('resendButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission when clicking the resend button

        const form = document.createElement('form');
        form.method = 'POST'; // Set form method to POST
        form.action = ''; // Current page, same as the action attribute in your form

        // Add a hidden input...

</form>
</body>
</html>
