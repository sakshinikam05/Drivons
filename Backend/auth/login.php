<?php
require 'vendor/autoload.php'; // Include PHPMailer
session_start();
session_unset();  // Clear session variables
session_destroy(); // Destroy session
session_start();  // Start a fresh session

include('dbcon.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION["logged-in"])) {
    // If already logged in, redirect to profile or home page
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to check if the email exists 
    $query = "SELECT * FROM tblusers WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // User found
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password (assuming passwords are hashed using password_hash())
        if (password_verify($password, $row['password'])) {
            // Successful login
            $_SESSION["logged-in"] = true;
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["email"] = $row['email'];

            // Send Thank You email
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'hersafarenquiry@gmail.com'; // Replace with your Gmail address
                $mail->Password = 'esrv asnp fkin ibdb'; // Replace with your Gmail App Password
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('hersafarenquiry@gmail.com', 'Drivons'); // Replace with your email and website name
                $mail->addAddress($email);

                 // Email content
                 $username = $_SESSION["username"];
                 $mail->isHTML(true);
                 $mail->Subject = 'Welcome to Drivons - Your Premium Car Rental Experience Awaits!';
                 $mail->Body = "
                 <div style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
                     <div style='padding: 20px; border: 1px solid #eaeaea; border-radius: 10px; background-color: #f9f9f9;'>
                         <h2 style='text-align: center; color: #1346d3;'>Welcome to Drivons, $username!</h2>
                         <p style='text-align: center; font-size: 16px;'>
                             <em>Your journey with us begins now.</em>
                         </p>
                         <p style='font-size: 14px;'>
                             Thank you for choosing <strong>Drivons</strong> as your trusted car rental partner. We're delighted to have you join our community of happy travelers.
                         </p>
                         <p style='font-size: 14px;'>
                             If you have any questions, feel free to reach out to us. Our team is always here to assist you.
                         </p>
                         <p style='font-size: 14px;'>
                             <strong>Enquiry Email:</strong> <a href='mailto:hersafarenquiry@gmail.com'>hersafarenquiry@gmail.com</a><br>
                             <strong>Phone:</strong> +91 55555 55555
                         </p>
                         <p style='font-size: 14px;'>Happy driving!</p>
                         <p style='text-align: right; font-size: 14px;'>
                             <strong>Best Regards,</strong><br>
                             The Drivons Team 🚗
                         </p>
                     </div>
                 </div>f
             ";
             


                // Send email
                $mail->send();
            } catch (Exception $e) {
                echo "<script>alert('Email could not be sent. Error: " . $mail->ErrorInfo . "')</script>";
            }

            header("Location: success.php");  // Redirect to home or profile page
            exit();
        } else {
            // Invalid password
            echo "<script>alert('Invalid Password. Please Try Again.')</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User Not found. Please Check Your Email, And Try Again.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login To Drivons</title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(images/resource/sign.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 100%;
            height: 100%;
            max-height: 600px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #000000ae;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(2px);
            
        }
        .right {
            flex: 1;
            padding: 35px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right h2 {
            color:rgb(22, 83, 249);
            font-weight: lighter;
            font-size: 22px;
            text-align: center;
            letter-spacing: 1px;
        }
        .right h3 {
            margin-bottom: 2px;
            margin-top: 0%;
            text-align: center;
            font-size: 30px;
            letter-spacing: 1px;
            color: #dcdcdc;
        }
        .right p {
            margin-bottom: 25px;
            text-align: center;
            font-size: 16px;
            color: #aaaaaa;
        }
        .input-group {
            display: flex; /* Use flexbox for alignment */
            align-items: center; /* Center items vertically */
            position: relative; /* Keep this for absolute positioning of the toggle button */
            margin-top: 12px;
        }

        .input-group i {
            color: #ffffff;
            margin-right: 10px; /* Add some space between the icon and the input */
        }

        .input-group input {
            width: 100%; /* Use full width */
            padding: 10px; /* Adjust padding */
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            margin-left: 10px; /* Optional: space between icon and input */
        }
        .input-group input::placeholder {
            color: #aaa;
        }
        .toggle-password {
            position: absolute; /* Position the toggle button absolutely */
            right: 0px; /* Align it to the right */
            top: 52%; /* Center it vertically */
            transform: translateY(-50%); /* Adjust for vertical centering */
            cursor: pointer;
            color: #ffffff; /* Ensure the color matches the icon color */
        }
        .forgot-password {
            text-align: right;
            font-size: 13px;
            margin-bottom: 30px;
            margin-top: 7px;
            text-decoration: underline;
        }
        .forgot-password a {
            color: #ffffff;
            text-decoration: none;
        }
        .sign-in-btn {
            background-color: #0f3cb7;
            color: #fff;
            padding: 8px 10px;
            position: relative;
            margin: auto;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 200;
            font-size: 20px;
            margin-bottom: 18px;
            width: 115px
            
        }
        .sign-in-btn:hover{
            background-color: #0c35a5;
        }
        .or {
            text-align: center;
            margin-bottom: 8px;
            font-size: 13px;
        }
        .line{
            text-align: center;
            margin-bottom: 20px;
            font-size: 13px;
            color: #aaa;
        }
        .connect{
            text-align: center;
            margin-bottom: 17px;
            font-size: 15px;
        }
        .social-icons {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .social-icons a {
            color: #fff;
            font-size: 24px;
            margin: 0 10px;
            text-decoration: none;
        }
        .create-account {
            text-align: center;
        }
        .create-account a {
            color: rgb(43, 22, 202);
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }
            .left, .right {
                width: 100%;
                height: 50%;
            }
            .right {
                padding: 20px;
            }
            .right .input-group .toggle-password {
                right: 10px; /* Adjust for mobile view */
            }
        }
    </style>
</head>
<body>
<form method="POST" action="">
    <div class="container">
        <div class="right">
            <h2>Login To Drivons</h2>
            <h3>Welcome Back</h3>
            <p>Thank You For Connecting With Us! Have A Great Day.</p>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input placeholder="Enter Email" name="email" type="email"required/>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input placeholder="Enter Password" name="password" type="password" required/>
                <i class="fas fa-eye toggle-password"></i>
            </div>
            <div class="forgot-password">
                <a href="forgot_password.php">Forgot Password?</a>
            </div>
            <button class="sign-in-btn">Login</button>
            <div class="or">OR</div>
            <div class="create-account">
                <p>New User? <a href="register.php">Create Account</a></p>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function (toggle) {
            toggle.addEventListener('click', function () {
                const passwordInput = this.previousElementSibling;
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
    </form>
</body>
</html>
