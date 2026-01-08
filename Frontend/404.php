<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | 404</title>
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

    <!-- error-section -->
    <div class="error-section layout-radius">
        <div class="drivons-container">
            <div class="right-box">
                <div class="image-box">
                    <img src="images/resource/error.png">
                    <div class="content-box">
                        <h2>Oops! It looks like you're lost.</h2>
                        <div class="text">The page you're looking for isn't available. Try to search again or 
                            use the go to.
                        </div>
                        <a href="index.php" class="error-btn">Go Back To Home<svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                            <g clip-path="url(#clip0_858_848)">
                              <path d="M13.6111 0.891113H5.05558C4.84062 0.891113 4.66668 1.06506 4.66668 1.28001C4.66668 1.49497 4.84062 1.66892 5.05558 1.66892H12.6723L0.113941 14.2273C-0.0379805 14.3792 -0.0379805 14.6253 0.113941 14.7772C0.189884 14.8531 0.289415 14.8911 0.38891 14.8911C0.488405 14.8911 0.5879 14.8531 0.663879 14.7772L13.2222 2.21882V9.83558C13.2222 10.0505 13.3962 10.2245 13.6111 10.2245C13.8261 10.2245 14 10.0505 14 9.83558V1.28001C14 1.06506 13.8261 0.891113 13.6111 0.891113Z" fill="#405FF2"/>
                            </g>
                            <defs>
                              <clipPath id="clip0_858_848">
                                <rect width="14" height="14" fill="white" transform="translate(0 0.891113)"/>
                              </clipPath>
                            </defs>
                          </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End error-section -->

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
        }, 1500);     });
</script>
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>

</body>
</html>