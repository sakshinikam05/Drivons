<?php
session_start();
if (!isset($_SESSION["logged-in"])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivons | Login</title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            width: 80%;
            max-width: 300px;
            height: 80%;
            max-height:300px;
            overflow: hidden;
            background-color: #000000ae;
            backdrop-filter: blur(2px);
            width: 100%;
        }
        .container img {
            width: 75px;
            margin-bottom: 10px;
        }
        .container h1 {
            font-size: 26px;
            margin-top:10px;
            margin-bottom: 16px;
            color: rgb(233, 233, 233);
        }
        .container p {
            font-size: 14px;
            margin-top:5px;
            color: rgb(197, 195, 195);
            margin-bottom: 15px;
        }
        .btn {
            background-color: #0f3cb7;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            margin-top:15px;
            margin-bottom: 25px;
        }
        .btn:hover {
            background-color:#0d3299;
        }
        .back-link {
            color: #1a4dd9;
            text-decoration: none;
            font-size: 14px;
        }
        .back-link i {
            margin-right: 5px;
        }
        .back-link:hover {
            color:#ffffff;
        }
  </style>
 </head>
 <body>
  <div class="container">
   <img alt="Company logo" src="images/resource/social-media.png"/>
   <h1>
    Login Successful!
   </h1>
    <p>Welcome <?php echo htmlspecialchars($_SESSION["username"]);?></p>
   <p>We've sent an email with important information
    <br/>
    Continue managing your account
   </p>
   <button class="btn" onclick="window.location.href='index.php'">
    Continue
   </button>
   <br/>
  </div>
 </body>
</html>