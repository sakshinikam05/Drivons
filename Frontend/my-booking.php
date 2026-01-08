<?php
include 'session.php'; // Ensure session is started
include 'includes/config.php'; // Include PDO connection

$userId = $_SESSION['user_id']; // Get logged-in user's ID

$query = "SELECT 
            f.id, f.user_id, f.name, f.phone, f.source, f.destination, 
            f.departureDate, f.carname, f.dname, f.price, f.hasLicense,
            p.payment_status 
          FROM tblform f
          LEFT JOIN tblpayments p ON f.car_id = p.car_id AND f.user_id = p.user_id
          WHERE f.user_id = :user_id";

$stmt = $pdo->prepare($query); // Prepare query
$stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
$stmt->execute();
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch results
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Dashboard</title>
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

<body class="body">
<div class="drivons-wrapper v2">

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

<?php include 'header1.php'; ?>


        <!-- dashboard-widget -->
        <section class="dashboard-widget">
        <div class="right-box">
            <div class="side-bar">
                <ul class="nav-list">
               <li><a href="profile.php"><img src="images/icons/dash7.svg" alt="">My Profile</a></li>
                <li><a href="my-booking.php"><img src="images/icons/dash2.svg" alt="">My Booking</a></li>
                <li><a href="testimonial.php"><img src="images/icons/dash3.svg" alt="">Testimonial</a></li>
                <li><a href="message.php"><img src="images/icons/dash6.svg" alt="">Comments</a></li>
                <li><a href="logout.php"><img src="images/icons/dash8.svg" alt="">Logout</a></li>
                </ul>
            </div>
            <div class="content-column">
                <div class="inner-column">
                    <div class="list-title">
                        <h3 class="title">My Booking</h3>
                        <div class="text">See All Your Rented Cars.</div>
                    </div>
                    <div class="my-listing-table wrap-listing">
                        <div class="cart-table">
                            <style>
                                .cart-table table {
                                    width: 100%;
                                    border-collapse: collapse;
                                }
                                .cart-table th, .cart-table td {
                                    text-align: center; /* Center text */
                                    vertical-align: middle; /* Align vertically */
                                    padding: 10px;
                                }
                                .cart-table th:first-child {
                                    text-align: center !important;
                                    padding-left: 10px !important;
                                }
                                .cart-table td:first-child {
                                    text-align:  center!important;
                                    padding-left: 10px !important;
                                }
                            </style>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Car Name</th>
                                        <th>User</th>
                                        <th>Source</th>
                                        <th>Destination</th>
                                        <th>With Driver</th>
                                        <th>Payment Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bookings as $booking): ?>
                                        <tr>
                                            <td>
                                                <div class="car-info">
                                                    <strong><?= htmlspecialchars($booking['carname']) ?></strong>
                                                    <br>
                                                    <span class="price">₹<?= number_format($booking['price'], 2) ?></span>
                                                </div>
                                            </td>
                                            <td><?= htmlspecialchars($booking['name']) ?></td>
                                            <td><?= htmlspecialchars($booking['source']) ?></td>
                                            <td><?= htmlspecialchars($booking['destination']) ?></td>
                                            <td><?= ($booking['hasLicense'] == 1) ? "Yes" : "No" ?></td>
                                            <td>
                                                <?php 
                                                    $status = strtolower(trim($booking['payment_status']));
                                                    if ($status === "success"): ?>
                                                        <span style="color:green;">Success!</span>
                                                    <?php elseif ($status === "failed"): ?>
                                                        <span style="color:red;">Failed!</span>
                                                    <?php else: ?>
                                                        <span style="color:gray;">Pending</span>
                                                    <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End dashboard-widget -->

    <footer class="drivons-footer footer-style-one v2">
        <!--  Footer Bottom -->
        <div class="footer-bottom">
            <div class="inner-container">
                <div class="copyright-text wow fadeInUp">2025 Drivons.com. All rights reserved.</div>
                <ul class="footer-nav wow fadeInUp" data-wow-delay="200ms">
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Notice</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- End drivons-footer -->


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
        }, 500);     });
</script>
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>

</body>
</html>