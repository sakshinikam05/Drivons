<?php
session_start();
include('dbcon.php');

if (!isset($_SESSION["reset_email"])) {
    header("Location: forgot_password.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if ($new_password == $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $email = $_SESSION["reset_email"];

        // Update the password in the database
        $query = "UPDATE tblusers SET password='$hashed_password' WHERE email='$email'";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Password Updated Successfully, Login Now!'); window.location.href = 'login.php';</script>";
            unset($_SESSION["reset_email"]);
            unset($_SESSION["reset_otp"]);
        } else {
            echo "<script>alert('Error Updating Password');</script>";
        }
    } else {
        echo "<script>alert('Passwords Do Not Match!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Drivons | Reset Password</title>
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
      
        .container {
            background-color: #000000ae;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 23%;
            overflow: hidden;
        }
        .container img {
            width: 62px;
            margin-bottom: 12px;
        }
        .container h1 {
            font-size: 26px;
            margin-bottom: 15px;
            color: #ffffff;
        }
        .container p {
            font-size: 16px;
            color: #d1d1d1;
            margin-bottom: 25px;
        }
        .password-label {
            text-align: left;
            font-size: 14px;
            margin-bottom: 8px;
            color: #e0e0e0;
        }
        .password-input {
            position: relative;
            margin-bottom: 20px;
        }
        .password-input input {
            border:none;
            width: calc(100% - 40px); /* Adjust width to account for padding and icon */
            padding: 12px;
            font-size: 14px;
            background-color: #333;
            border-radius: 5px;
            color: white;
            height: 12px;
            margin-left: 10px; /* Add margin to the left for better alignment */
        }
        .password-input input::placeholder {
            color: #c2c2c2;
            font-size: 13px;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 11px;
            cursor: pointer;
            color: #ffffff;
        }
        .reset-btn {
            background-color: #0f3cb7;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 15.5px;
            margin-top: 30px;
            transition: background-color 0.3s;
        }
        .reset-btn:hover {
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
    <img alt="Reset Password icon" src="images/resource/reset-password.png"/>
    <h1>
        Reset Password
    </h1>
    <form method="POST" action="">
    <p>
        Please enter your new password.
    </p>
    <div class="password-label">
        New Password
    </div>
    <div class="password-input">
        <input type="password" id="newPassword" placeholder="Enter new password" name="new_password" required/>
        <i class="fas fa-eye toggle-password" id="toggleNewPassword"></i>
    </div>
    <div class="password-label">
        Confirm Password
    </div>
    <div class="password-input">
        <input type="password" id="confirmPassword" placeholder="Confirm new password" name="confirm_password" required/>
        <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
    </div>
    <button type="submit" class="reset-btn">
        Reset Password </button>
    </form>
    <a class="back-link" href="login.php">
        <i class="fas fa-arrow-left"></i>
        Back To Login
    </a>
</div>

<script>
    const toggleNewPassword = document.getElementById('toggleNewPassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

    toggleNewPassword.addEventListener('click', () => {
        const newPasswordInput = document.getElementById('newPassword');
        const type = newPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        newPasswordInput.setAttribute('type', type);
        toggleNewPassword.classList.toggle('fa-eye-slash');
    });

    toggleConfirmPassword.addEventListener('click', () => {
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPasswordInput.setAttribute('type', type);
        toggleConfirmPassword.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
