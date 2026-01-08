<?php 
include 'session.php';
include 'dbcon.php'; 
// Fetch only message and posting date from tbltestimonial
$query = "SELECT Testimonial, PostingDate FROM tbltestimonial ORDER BY PostingDate DESC";
$result = mysqli_query($con, $query);
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
<div class="drivons-wrapper-v2">

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
/* Remove extra spacing in drop-menu */
.drop-menu {
    margin-top: 3px !important; /* Reduce space above testimonials */
    padding: 0 !important;
}

/* Ensure text area doesn't add extra space */
textarea {
    width: 100%;
    height: auto;
    margin-bottom: 5px; /* Reduce space below text area */
}

/* Testimonial box styling */
.testimonial-box {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px; /* Reduce space between testimonials */
    border-radius: 5px;
    background-color: #f9f9f9;
}
</style>
  

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
                        <h3 class="title">Show Testimonial</h3>
                        <div class="text">Posted Testimonial.</div>
                    </div>
                        <div class="form-box">

                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <form class="row">  
                                        <div class="form-column col-lg-12">
                                            <div class="form_boxes v2">
                                                <label>Your Posted Testimonial</label>
                                                <div class="drop-menu">
                                                    <?php 
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo '<div class="testimonial-box">';
                                                            echo '<p class="date"><strong>Posted on:</strong> ' . $row['PostingDate'] . '</p>';
                                                            echo '<p>' . $row['Testimonial'] . '</p>';
                                                            echo '</div>';
                                                        }
                                                    } else {
                                                        echo '<p>No testimonials posted yet.</p>';
                                                    }
                                                   ?>
                                                </div>
                                            </div>   
                                        </div>
                                    </form>
                                </div>
                        </div>
                    
                <div class="chat-widget">
                  
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
                    <li><a href="terms.php" title="">Terms & Conditions</a></li>
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