<?php
session_start();
include('dbcon.php');
require 'vendor/autoload.php';  // Make sure PHPMailer is included

// Ensure OTP exists in session, otherwise redirect to register page
if (!isset($_SESSION["OTP"])) {
    header("Location: register.php");
    exit();
}

// Handle OTP verification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['verify_otp'])) {
        $user_otp = $_POST['otp'];

        // Check if the entered OTP matches the one stored in the session
        if ($user_otp == $_SESSION["OTP"]) {
            // OTP is correct, show success message and redirect to home page
            unset($_SESSION["OTP"]);
            echo "<script>
                    alert('OTP Verified Successfully,Your Account Is Created, Now You Can Login!');
                    window.location.replace('login.php');  // Redirect to home page
                  </script>";
        } else {
            // OTP is incorrect, show error message
            echo "<script>alert('Invalid OTP')</script>";
        }
    }

    // Handle Resend OTP
    if (isset($_POST['resend_otp'])) {
        $otp = rand(100000, 999999);  // Generate a new OTP
        $_SESSION["OTP"] = $otp;  // Store it in session

        // Resend the OTP via email (using PHPMailer)
        $from = "support@libraryatcoer.tk";
        $to = $_SESSION["email"];
        $subject = "verify-account-otp";
        $message = strval($otp);

        // PHPMailer setup
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        
        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hersafarenquiry@gmail.com';  // Your Gmail address
            $mail->Password = 'kagy kqij yhva ujri';  // Your Gmail app password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipient details
            $mail->setFrom('hersafarenquiry@gmail.com', 'Drivons');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
                $mail->Subject = "Account Creation - Verify Your OTP";
                $mail->Body    = "
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f9f9f9;
                                color: #333;
                            }
                            .container {
                                width: 100%;
                                max-width: 600px;
                                margin: 0 auto;
                                padding: 20px;
                                background-color: #ffffff;
                                border-radius: 8px;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            }
                            .header {
                                text-align: center;
                                color: #007BFF;
                                font-size: 24px;
                                margin-bottom: 20px;
                            }
                            .otp {
                                font-size: 32px;
                                font-weight: bold;
                                color:rgb(18, 42, 99);
                                text-align: center;
                                margin: 20px 0;
                            }
                            .message {
                                font-size: 16px;
                                color: #555;
                                text-align: center;
                                margin: 10px 0;
                            }
                            .footer {
                                font-size: 14px;
                                color: #666;
                                text-align: center;
                                margin-top: 20px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <p>Welcome To Drivons!</p>
                                <p>You're just one step away from completing your account creation.</p>
                            </div>
                            <div class='message'>
                                <p>To verify your account, please use the OTP (One-Time Password) below:</p>
                            </div>
                            <div class='otp'>
                                Your OTP: <strong>$otp</strong>
                            </div>
                            <div class='message'>
                                <p>This OTP is valid for 01 minute. If you did not request this, please ignore this email.</p>
                                <p>If you need help, feel free to reach out to our support team.</p>
                            </div>
                            <div class='footer'>
                                <p>Thank you for registering at Drivons.</p>
                                <p>&copy; Drivons - All Rights Reserved</p>
                            </div>
                        </div>
                    </body>
                    </html>
                ";

            // Send email
            if ($mail->send()) {
                echo "<script>alert('A New OTP has been sent to your Email.');</script>";
            } else {
                echo "<script>alert('Failed to resend OTP. Please try again.');</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Failed to send OTP. Error: {$mail->ErrorInfo}');</script>";
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>
        Drivons | Verify-OTP
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
            backdrop-filter: blur(1.5px);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 90%;
            max-width: 375px;
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
        .resend {
            border:none;
            outline:none;
            font-size: 9px;
            text-align: right;
            margin-bottom: 40px; /* Adjusted margin */
            text-decoration: underline;
        }

        /* Change color after the button is enabled */
        #resendButton:enabled {
            border:none;
            padding:10px,10px;
            background-color:rgba(255, 255, 255, 0.82); /* Blue background */
            color:black; /* White text color */
            cursor: pointer;
            padding: 5px, 10px;
        }

        .otp-input {
            margin-bottom: 10px; /* Added margin to create space */
        }
        .otp-input input {
            border:none;
            width: 100%;
            padding: 10px;
            font-size: 14px;
            background-color:rgba(0, 0, 0, 0.77)!important;
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
    <script>
        let countdown;
        function startTimer() {
            const resendButton = document.getElementById('resendButton');
            resendButton.disabled = true; 
            let timeLeft = 60; 
            countdown = setInterval(function() {
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    resendButton.disabled = false;
                    document.getElementById('timer').innerHTML = 'You can resend OTP now.';
                } else {
                    document.getElementById('timer').innerHTML ='00:' +timeLeft;
                }
                timeLeft -= 1;
            }, 1000);  
        }

        window.onload = function() {
            startTimer();
        };
    </script>
</head>
<body>
<div class="container">
    <img alt="Email icon" src="images/resource/envelope.png"/>
    <h1>
        Verify OTP 
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
            <input maxlength="6" type="text" name="otp" placeholder="Enter OTP"/>
        </div>
        <div class="resend">
            <button type="submit" name="resend_otp" id="resendButton" >Resend OTP</button>
        </div>
                <button type="submit" class="verify-btn" name="verify_otp">Verify OTP</button>

    <a class="back-link" href="login.php">
        <i class="fas fa-arrow-left"></i>
        Back To Registration
    </a>
</div>
<script>
    const otpInput = document.getElementById('otp');

    otpInput.addEventListener('input', (e) => {
        if (otpInput.value.length > 6) {
            otpInput.value = otpInput.value.slice(0, 6); // Limit to 4 characters
        }
    });
</script>
</form>
</body>
</html>
