<?php include 'session.php';

include 'dbcon.php'; // Include your DB connection file

// Fetch user's subscription plan
$userEmail = $_SESSION['email']; // Assuming user email is stored in session
$planQuery = "SELECT plan FROM tblsubscriptions WHERE email = '$userEmail' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $planQuery);
$row = mysqli_fetch_assoc($result);
$userPlan = $row['plan'] ?? ''; // If no plan exists, set it to an empty string
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Subscriptions</title>
<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link href="css/mmenu.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
<link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>
<div class="drivons-wrapper">

    <div id="loader">
        <img src="images/resource/car.gif"/>
    </div>

    <div id="custom-cursor"></div>
    
    <style>
        #custom-cursor {
            position: fixed; /* Ensures it stays on screen */
            width: 15px;
            height: 15px;
            background-color: #0096ffb3;
            border-radius: 50%;
            pointer-events: none; /* Doesn't interfere with clicks */
            transform: translate(-50%, -50%);
            z-index: 9999;
            opacity: 0.8;
            transition: width 0.15s ease, height 0.15s ease, background-color 0.3s ease;
        }
    </style>

    <script>
        const cursor = document.getElementById('custom-cursor');

        let mouseX = 0, mouseY = 0; // Real-time mouse position
        let cursorX = 0, cursorY = 0; // Delayed cursor position
        let delay = 0.08; // Adjust for slower delay effect (lower = more lag)

        document.addEventListener('mousemove', (event) => {
            mouseX = event.clientX;
            mouseY = event.clientY;
        });

        function animateCursor() {
            cursorX += (mouseX - cursorX) * delay;
            cursorY += (mouseY - cursorY) * delay;

            cursor.style.left = `${cursorX}px`;
            cursor.style.top = `${cursorY}px`;

            requestAnimationFrame(animateCursor);
        }

        animateCursor();
    </script>

    <style>
        .pricing-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>

    <?php include 'header.php'; ?>


    <!-- drivons-pricing-section-eight -->
    <section class="drivons-pricing-section-seven layout-radius">
        <div class="drivons-container">
            <div class="drivons-title text-center">
                <h2>Membership Plans</h2>
            </div>
            <div class="row">
                <!-- Basic Plan -->
                <div class="pricing-block-seven col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <h6 class="title">₹500<span>/ monthly</span></h6>
                        <span class="plan">Basic Plan</span>
                        <div class="text">Affordable option with limited mileage and basic insurance coverage</div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-check"></i>Access to limited section of cars only</li>
                            <li><i class="fa-solid fa-check"></i>Daily rental discounts up to 5%</li>
                            <li><i class="fa-solid fa-check"></i>Standard booking priority</li>
                            <li><i class="fa-solid fa-check"></i>Basic Insurance coverage provided</li>
                            <li><i class="fa-solid fa-check"></i>Customer support during business hours</li>
                            <li><i class="fa-solid fa-check"></i>No access to the shop section</li>
                        </ul>
                        <form action="checkout.php" method="POST">
                            <input type="hidden" name="plan" value="Basic">
                            <input type="hidden" name="amount" value="500">
                            <button type="submit" class="pricing-btn" 
                                <?php echo ($userPlan == 'Basic' || $userPlan == 'Standard' || $userPlan == 'Premium') ? 'disabled' : ''; ?>>
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Standard Plan -->
                <div class="pricing-block-seven col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <h6 class="title">₹1500<span>/ monthly</span></h6>
                        <span class="plan">Standard Plan</span>
                        <div class="text">Balanced choice offering additional features and standard insurance</div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-check"></i>Access to wider section of cars</li>
                            <li><i class="fa-solid fa-check"></i>Daily rental discounts up to 10%</li>
                            <li><i class="fa-solid fa-check"></i>Priority booking with early access offers</li>
                            <li><i class="fa-solid fa-check"></i>Enhanced insurance coverage</li>
                            <li><i class="fa-solid fa-check"></i>Customer support available 12/7</li>
                            <li><i class="fa-solid fa-check"></i>No access to the shop section</li>
                        </ul>
                        <form action="checkout.php" method="POST">
                            <input type="hidden" name="plan" value="Standard">
                            <input type="hidden" name="amount" value="1500">
                            <button type="submit" class="pricing-btn" 
                                <?php echo ($userPlan == 'Standard' || $userPlan == 'Premium') ? 'disabled' : ''; ?>>
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="pricing-block-seven col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <h6 class="title">₹3000<span>/ monthly</span></h6>
                        <span class="plan">Premium Plan</span>
                        <div class="text">Exclusive package with luxury vehicles and comprehensive insurance</div>
                        <ul class="pricing-list">
                            <li><i class="fa-solid fa-check"></i>Access to the full fleet</li>
                            <li><i class="fa-solid fa-check"></i>Daily rental discounts up to 15%</li>
                            <li><i class="fa-solid fa-check"></i>Top booking priority</li>
                            <li><i class="fa-solid fa-check"></i>Full insurance coverage</li>
                            <li><i class="fa-solid fa-check"></i>24/7 on-road assistance</li>
                            <li><i class="fa-solid fa-check"></i>Access to the shop section</li>
                        </ul>
                        <form action="checkout.php" method="POST">
                            <input type="hidden" name="plan" value="Premium">
                            <input type="hidden" name="amount" value="3000">
                            <button type="submit" class="pricing-btn" 
                                <?php echo ($userPlan == 'Premium') ? 'disabled' : ''; ?>>
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End drivons-pricing-section-eight -->

<?php include 'footer.php'; ?>

</div><!-- End Page Wrapper -->


<!-- Scripts -->
<script src="js/jquery.js"></script> 
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/slick-animation.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/knob.js"></script>
<script src="js/mmenu.js"></script>
<script src="js/main.js"></script>
<script>
    // Show the pre-loader when the page starts loading
    window.addEventListener('load', function() {
        var loader = document.getElementById('loader');
        loader.style.visibility = 'visible'; // Show the loader

                setTimeout(function() {
            loader.style.visibility = 'hidden';
        }, 1000);     });
</script>
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>

</body>
</html>