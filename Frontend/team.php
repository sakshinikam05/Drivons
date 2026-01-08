<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Team</title>
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

<?php include 'header.php'; ?>


    <!-- drivons-team-section -->
    <section class="drivons-team-section v1 layout-radius">
        <div class="drivons-container">
            <div class="drivons-title">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Drivons Team</span></li>
                </ul>
                <h2>Team List</h2>
            </div>
            <div class="row">
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-1.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">aarav.mehta@drivons.com</a></span>
                                <small><a href="#">+91 98765 43210</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Aarav Mehta</a></h4>
                            <span>Finance & Accounts Manager</span>
                        </div>
                    </div>
                </div>
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp" data-wow-delay="100ms">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-2.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">priya.nair@drivons.com</a></span>
                                <small><a href="#">+91 99887 66554</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Priya Nair</a></h4>
                            <span>Compliance & Legal Officer</span>
                        </div>
                    </div>
                </div>
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-3.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">sneha.verma@drivons.com</a></span>
                                <small><a href="#">+91 90909 80808</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Sneha Verma</a></h4>
                            <span>Logistics Coordinator </span>
                        </div>
                    </div>
                </div>
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-4.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">vikram.iyer@drivons.com</a></span>
                                <small><a href="#">+91 98760 54321</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Vikram Iyer</a></h4>
                            <span>Sales & Partnership Manager </span>
                        </div>
                    </div>
                </div>
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-5.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">amit.kapoor@drivonss.com</a></span>
                                <small><a href="#"> +91 95678 12345</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Amit Kapoor</a></h4>
                            <span>Operations Manager </span>
                        </div>
                    </div>
                </div>
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp" data-wow-delay="100ms">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-6.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">ananya.khare@drivons.com</a></span>
                                <small><a href="#">+91 94567 89012</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Ananya Khare</a></h4>
                            <span>Fleet Manager</span>
                        </div>
                    </div>
                </div>
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-7.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">neha.bansal@drivons.com</a></span>
                                <small><a href="#">+91 91234 67890</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Neha Bansal</a></h4>
                            <span>Customer Support Executive</span>
                        </div>
                    </div>
                </div>
                <!-- team-block -->
                <div class="team-block col-lg-3 col-md-6 col-sm-6">
                    <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/team1-8.jpg" alt=""></a></figure>
                            <div class="contact-info">
                                <span><a href="#">rajesh.shaha@drivons.com</a></span>
                                <small><a href="#">+91 93456 78901</a></small>
                            </div>
                        </div>
                        <div class="content-box">
                            <h4 class="title"><a href="#">Rajesh shaha</a></h4>
                            <span>Technical Lead</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End drivons-team-section -->

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