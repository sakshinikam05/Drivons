<?php
session_start();
require 'vendor/autoload.php'; // Assuming PHPMailer is set up
include('dbcon.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    // Check if the email exists in the database
    $query = "SELECT * FROM tblusers WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, generate OTP
        $otp = rand(100000, 999999);
        $_SESSION["reset_email"] = $email;
        $_SESSION["reset_otp"] = $otp;

        // Send OTP using PHPMailer
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hersafarenquiry@gmail.com';  // Replace with your email
            $mail->Password = 'kagy kqij yhva ujri';  // Replace with your email app password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('hersafarenquiry@gmail.com', 'Drivons');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'OTP To Reset Password';
            $mail->Body    = "
                <h3>Dear User,</h3>
                <p>We Received a request to reset your password for your account. Please use the following One-Time Password (OTP) to complete the process:</p>
                <h2 style='color: #0f3cb7;'>$otp</h2>
                <p>This OTP is valid for 01 minute. If you did not request a password reset, please ignore this email or contact our support team.</p>
                <p>Best regards,<br>Drivons Team</p>
                <p><strong>Contact Us:</strong><br>If you have any questions, feel free to contact us at <a href='mailto:hersafarenquiry@gmail.com'>support@drivons.com</a>.</p>
            ";
            

            $mail->send();
            echo "<script>alert('OTP Has Been Sent To Your Email To Reset Password'); window.location.href = 'verify_pass_otp.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Error sending OTP: " . $mail->ErrorInfo . "');</script>";
        }
    } else {
        echo "<script>alert('Email Not Registered!');</script>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
        Drivons | Forget Password
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
            width: 85%;
            max-width: 350px;
            overflow: hidden;
        }
        .container img {
            width: 55px;
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
        .email-label {
            text-align: left;
            font-size: 15px;
            margin-bottom: 10px; /* Added margin to create space */
            color: #e0e0e0;
        }
        .email-input {
            margin-bottom: 20px; /* Added margin to create space */
        }
        .email-input input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            color:white;
            background-color:#333;
            border-radius: 5px;
            border:none;
            height: 35px; /* Increased height */
        }
        .email-input input::placeholder{
            color: #aaa;
            font-size: 13.5px;
        }
        .send-btn {
            background-color: #0f3cb7;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 35px;
        }
        .send-btn:hover {
            background-color: #0d3299;
        }
        .back-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #1a4dd9;
            text-decoration: none;
        }
        .back-link i {
            margin-right: 5px;
        }
        .back-link:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <img alt="Email icon" src="images/resource/mobile-password-forgot.png"/>
    <h1>
        Forgot Password?
    </h1>
    <form method="POST" action="">
    <p>
        No worries! Just Enter Your Registered Email.
    </p>
    <div class="email-label">
        Enter Email
    </div>
    <div class="email-input">
        <input type="email" id="email" placeholder="Enter your email" name="email" required/>
    </div>
    <button class="send-btn">
        Send OTP
    </button>
    <a class="back-link" href="login.php">
        <i class="fas fa-arrow-left"></i>
        Back To Login
    </a>
</div>

<script>
    const emailInput = document.getElementById('email');

    emailInput.addEventListener('input', (e) => {
        // Additional validation can be added here if needed
    });
</script>
</form>
</body>
</html>