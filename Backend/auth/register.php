<?php
require 'vendor/autoload.php';
session_start();
session_unset();  // Clear session variables
session_destroy(); // Destroy session
session_start();  // Start a fresh session

include('dbcon.php');

// --- debug-only: show exact DB error (remove in production) ---
$con = $con ?? mysqli_connect('localhost','root','','drivons') or die('DB Conn Error: '.mysqli_connect_error());
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
ini_set('display_errors', 1);
error_reporting(E_ALL);

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $con->prepare("INSERT INTO tblusers (username, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare failed: (" . $con->errno . ") " . $con->error);
    }
    $stmt->bind_param('sss', $username, $email, $hashed_password);
    $stmt->execute();
    echo "";
} catch (Exception $e) {
    // show mysqli errno/error and exception message
    $errno = $con->errno;
    $merr  = $con->error;
    echo "<pre>MySQL errno: {$errno}\nMySQL error: {$merr}\nException: {$e->getMessage()}</pre>";
}


// Check if user is already logged in, redirect to profile page
if (isset($_SESSION["logged-in"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'drivons');
    if (!$con) {
        echo "Failed to connect to the database";
        exit();
    }

    // Sanitize inputs
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['Password']);
    $repassword = mysqli_real_escape_string($con, $_POST['RePassword']);

    // Validate password
    if ($password != $repassword) {
        echo "<script>alert('Passwords Do Not Match')</script>";
    } elseif (strlen($password) < 8) {
        echo "<script>alert('Password Must be at least 8 characters long')</script>";
    } else {
        // Check if email or username already exists
        $query = "SELECT * FROM tblusers WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username Or Email Already Exists')</script>";
        } else {
            // Hash the password before inserting into the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $insert_query = "INSERT INTO tblusers (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if (mysqli_query($con, $insert_query)) {
                // Generate OTP
                $otp = rand(100000, 999999);
                $_SESSION["OTP"] = $otp;
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;

                // Send OTP email using PHPMailer
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);  // Fully qualify the class name
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'hersafarenquiry@gmail.com';  // Replace with your Gmail address
                    $mail->Password = 'kagy kqij yhva ujri';           // Your Gmail App Password
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Recipients
                    $mail->setFrom('hersafarenquiry@gmail.com', 'Drivons');
                    $mail->addAddress($email);

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
                                color:rgb(0, 36, 156);
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
                    $mail->send();
                    echo "<script>alert('An OTP has been sent to your Email for Verification.'); window.location.href = 'verify_otp.php';</script>";  // Show alert and redirect
                    exit();
                } catch (Exception $e) {
                    echo "Error: " . $mail->ErrorInfo;
                }
            } else {
                echo "<script>alert('Error while inserting user data')</script>";
            }
        }
    }
}
?>

<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>
    Drivons | Register
  </title>
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
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
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
            display: flex;
            width: 120%;
            max-width: 500px;
            height: 78%;
            max-height: 600px;
            background-color: #000000ae;
            border-radius: 10px;
            overflow: hidden;
            backdrop-filter: blur(2px);
            justify-content: center;
            align-items: center;
        }
        .right {
            flex: 1;
            padding: 40px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right h2 {
            color:rgb(22, 83, 249);
            font-weight: lighter;
            font-size: 24px;
            text-align: center;
            letter-spacing: 1px;
        }
        .right h3 {
            margin-bottom: 2px;
            margin-top: 0%;
            text-align: center;
            font-size: 28.5px;
            color: #dcdcdc;
            letter-spacing: 1.2px;
        }
        .right p {
            margin-bottom: 35px;
            text-align: center;
            font-size: 15px;
            color: #aaaaaa;
        }
        .input-group {
            margin-bottom: 10px;
            display: flex;
            align-items: center; /* Align items vertically */
        }

        .input-group input {
            width: calc(100% - 40px);
            padding: 10px;
            margin-left: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }

        .toggle-password1, .toggle-password2 {
            cursor: pointer;
            color: #ffffff;
            margin-left: -30px; /* Adjust this value as needed */
        }
        .input-group i {
            color: #ffffff;
        }
        .input-group input::placeholder {
            color: #aaa;
            margin-bottom: 10px;
        }
        .register-btn {
            background-color: #0f3cb7;
            left: 35%;
            color: #fff;
            text-align: center;
            padding: 8px 10px;
            position: relative;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 200;
            font-size: 17px;
            margin-top: 23px;
            margin-bottom: 15px;
            width: 135px
            
        }
        .register-btn:hover{
            background-color: #0c35a5;
        }
        .signin-link {
            text-align: center;
        }
        .signin-link a {
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
        }
        .line{
            text-align: center;
            margin-bottom: 15px;
            font-size: 13px;
            color: #aaa;
        }
        @media (max-width: 768px) {
    body, html {
        padding: 0;
        margin: 0;
        width: 100%;
        height: auto;
        display: block;   /* stack vertically on phone */
    }

    .container {
        flex-direction: column;
        width: 90% !important;    /* fit inside phone */
        max-width: 100% !important;
        height: auto !important;
        margin: 15px auto !important; /* spacing around */
        padding: 15px;  /* breathing room inside */
    }

    .right {
        padding: 15px !important;
    }

    .right h2 {
        font-size: 20px !important;
    }

    .right h3 {
        font-size: 22px !important;
    }

    .right p {
        font-size: 13px !important;
        margin-bottom: 20px !important;
    }

    .input-group {
        flex-direction: column;   /* stack input + icon */
        align-items: stretch;
    }

    .input-group input {
        width: 100% !important;
        margin-left: 0 !important;
        font-size: 14px;
        padding: 8px;
    }

    .toggle-password1, .toggle-password2 {
        margin-left: 0 !important;
        align-self: flex-end;
        margin-top: -30px; /* keep icon inside input */
        margin-right: 10px;
    }

    .register-btn {
        width: 100% !important;    /* full width button */
        font-size: 16px !important;
        padding: 10px !important;
        left: 0 !important;
    }

    .line {
        font-size: 12px !important;
    }
}



  </style>
 </head>
 <body>
 <form method="POST" action="register.php">
  <div class="container">
   <div class="right ">
        <h2>
        Drivons | Sign-up
        </h2>
        <h3>
        Welcome To Drivons
        </h3>
        <p>
        Thank You For Choosing Us! Get Ready To Enhance Your Car Renting Experience With Drivons
        </p>
        <div class="input-group">
            <i class="fas fa-user">
            </i>
            <input placeholder="Enter Name" type="text" name="username" required/>
        </div>
        <div class="input-group">
            <i class="fas fa-envelope">
            </i>
            <input placeholder="Enter Email" type="email" name="email" required/>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input id="create-password" placeholder="Create Password" type="password"name="Password" required/>
            <i class="fas fa-eye toggle-password1"></i>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input id="confirm-password" placeholder="Confirm Password" type="password"name="RePassword" required/>
            <i class="fas fa-eye toggle-password2"></i>
        </div>
        <button class="register-btn">
        Register
        </button>
    
    </form>
    <div class="line">_____________________________________________________________________</div>
    <div class="signin-link">
     <p>
      Already Have an Account?
      <a href="login.php">
       Login
      </a>
     </p>
    </div>
   </div>
  </div>
  <script>
    document.querySelectorAll('.toggle-password1').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const passwordInput = this.previousElementSibling;
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
  </script>
  <script>
    document.querySelectorAll('.toggle-password2').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const passwordInput = this.previousElementSibling;
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
  </script>
 </body>
</html>
