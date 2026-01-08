<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Inventory</title>
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

<div class="drivons-wrapper">
    
<?php include 'header.php';?>
    
<!-- dealer-section -->
    <section class="dealer-ship-section layout-radius">
        <div class="drivons-container">
            <div class="drivons-title-three wow fadeInUp">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Inventory</span></li>
                </ul>
                <h2>Cars Inventory</h2>
            </div>
            <div class="row">
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="jalgaon.php"><img src="images/resource/shop12-3.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="jalgaon.php">Jalgaon Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="Jalgaon.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="pune.php"><img src="images/resource/shop12-1.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="pune.php">Pune Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="pune.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="naviMumbai.php"><img src="images/resource/shop12-11.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="naviMumbai.php">Navi Mumbai Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="naviMumbai.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="sambhajinagar.php"><img src="images/resource/shop12-4.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="sambhajinagar.php">Sambhaji Nagar Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="sambhajinagar.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="mumbai.php"><img src="images/resource/shop12-5.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="mumbai.php">Mumbai Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="mumbai.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="nashik.php"><img src="images/resource/shop12-9.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="nashik.php">Nashik Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="nashik.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="nagpur.php"><img src="images/resource/shop12-7.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="nagpur.php">Nagpur Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="nagpur.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealer-block -->
                <div class="dealer-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="thane.php"><img src="images/resource/shop12-8.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="thane.php">Thane Cars</a></h6>
                            <div class="text">Pick Up By Location</div>
                            <a href="thane.php" class="deal-btn">Browse Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_801_908)">
                                  <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"/>
                                </g>
                                <defs>
                                  <clipPath id="clip0_801_908">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"/>
                                  </clipPath>
                                </defs>
                              </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End dealer-section -->

    <?php include 'footer.php'; ?>

</div><!-- End Page Wrapper -->


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
       
</body>
</html>