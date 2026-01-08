<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Mumbai-Cars</title>
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

    <!-- cars-section-three -->
    <section class="cars-section-four v1 layout-radius">
        <div class="drivons-container">
            <div class="drivons-title-three wow fadeInUp">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Mumbai</span></li>
                </ul>
                <h2>Your Ride, Just A Click Away!</h2>
            </div>
            <div class="text-box">
                <div class="text">Showing 1 to 6 of 6 vehicles</div>
            </div>
            <div class="row wow fadeInUp">
                <!-- car-block-four -->
                <div class="car-block-four col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/carsin/scorpio1.jpg" alt=""></a></figure>
                            <a class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_601_1274)">
                                    <path d="M9.39062 12C9.15156 12 8.91671 11.9312 8.71128 11.8009L6.11794 10.1543C6.04701 10.1091 5.95296 10.1096 5.88256 10.1543L3.28869 11.8009C2.8048 12.1082 2.13755 12.0368 1.72722 11.6454C1.47556 11.4047 1.33685 11.079 1.33685 10.728V1.2704C1.33738 0.570053 1.90743 0 2.60778 0H9.39272C10.0931 0 10.6631 0.570053 10.6631 1.2704V10.728C10.6631 11.4294 10.0925 12 9.39062 12ZM6.00025 9.06935C6.24193 9.06935 6.47783 9.13765 6.68169 9.26743L9.27503 10.9135C9.31233 10.9371 9.35069 10.9487 9.39114 10.9487C9.48046 10.9487 9.61286 10.8788 9.61286 10.728V1.2704C9.61233 1.14956 9.51356 1.05079 9.39272 1.05079H2.60778C2.48642 1.05079 2.38817 1.14956 2.38817 1.2704V10.728C2.38817 10.7911 2.41023 10.8436 2.45384 10.8851C2.52582 10.9539 2.63563 10.9708 2.72599 10.9135L5.31934 9.2669C5.52267 9.13765 5.75857 9.06935 6.00025 9.06935Z" fill="black"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_1274">
                                    <rect width="12" height="12" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="m-scorpio.php">Mahindra Scorpio N-SUV</a></h6>
                            <div class="text">2.0L Turbo Petrol, Z8, 6-speed Manual SUV</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>41,500 miles</li>
                                <li><i class="flaticon-speedometer"></i>Petrol</li>
                                <li><i class="flaticon-gearbox"></i>Manual</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;3,400/day</span>
                                <small>&#8377;2,700/day</small>
                                <a href="m-scorpio.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_4346)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="#405FF2"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_4346">
                                    <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- car-block-four -->
                <div class="car-block-four col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="inner-box">
                        <div class="image-box">
                            <span>Low Mileage</span>
                            <figure class="image"><a href="#"><img src="images/carsin/kiger1.jpg" alt=""></a></figure>
                            <a class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_601_1274)">
                                    <path d="M9.39062 12C9.15156 12 8.91671 11.9312 8.71128 11.8009L6.11794 10.1543C6.04701 10.1091 5.95296 10.1096 5.88256 10.1543L3.28869 11.8009C2.8048 12.1082 2.13755 12.0368 1.72722 11.6454C1.47556 11.4047 1.33685 11.079 1.33685 10.728V1.2704C1.33738 0.570053 1.90743 0 2.60778 0H9.39272C10.0931 0 10.6631 0.570053 10.6631 1.2704V10.728C10.6631 11.4294 10.0925 12 9.39062 12ZM6.00025 9.06935C6.24193 9.06935 6.47783 9.13765 6.68169 9.26743L9.27503 10.9135C9.31233 10.9371 9.35069 10.9487 9.39114 10.9487C9.48046 10.9487 9.61286 10.8788 9.61286 10.728V1.2704C9.61233 1.14956 9.51356 1.05079 9.39272 1.05079H2.60778C2.48642 1.05079 2.38817 1.14956 2.38817 1.2704V10.728C2.38817 10.7911 2.41023 10.8436 2.45384 10.8851C2.52582 10.9539 2.63563 10.9708 2.72599 10.9135L5.31934 9.2669C5.52267 9.13765 5.75857 9.06935 6.00025 9.06935Z" fill="black"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_1274">
                                    <rect width="12" height="12" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="m-kiger.php">Renault Kiger-SUV</a></h6>
                            <div class="text">1.0L Turbo Petrol, RXZ, 5-speed Manual...</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>18,350 miles</li>
                                <li><i class="flaticon-speedometer"></i>Petrol</li>
                                <li><i class="flaticon-gearbox"></i>Manual</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;2,600/day</span>
                                <small>&#8377;2,000/day</small>
                                <a href="m-kiger.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_4346)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="#405FF2"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_4346">
                                    <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- car-block-four -->
                <div class="car-block-four col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/carsin/dzire1.jpg" alt=""></a></figure>
                            <a class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_601_1274)">
                                    <path d="M9.39062 12C9.15156 12 8.91671 11.9312 8.71128 11.8009L6.11794 10.1543C6.04701 10.1091 5.95296 10.1096 5.88256 10.1543L3.28869 11.8009C2.8048 12.1082 2.13755 12.0368 1.72722 11.6454C1.47556 11.4047 1.33685 11.079 1.33685 10.728V1.2704C1.33738 0.570053 1.90743 0 2.60778 0H9.39272C10.0931 0 10.6631 0.570053 10.6631 1.2704V10.728C10.6631 11.4294 10.0925 12 9.39062 12ZM6.00025 9.06935C6.24193 9.06935 6.47783 9.13765 6.68169 9.26743L9.27503 10.9135C9.31233 10.9371 9.35069 10.9487 9.39114 10.9487C9.48046 10.9487 9.61286 10.8788 9.61286 10.728V1.2704C9.61233 1.14956 9.51356 1.05079 9.39272 1.05079H2.60778C2.48642 1.05079 2.38817 1.14956 2.38817 1.2704V10.728C2.38817 10.7911 2.41023 10.8436 2.45384 10.8851C2.52582 10.9539 2.63563 10.9708 2.72599 10.9135L5.31934 9.2669C5.52267 9.13765 5.75857 9.06935 6.00025 9.06935Z" fill="black"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_1274">
                                    <rect width="12" height="12" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="m-dzire.php">Maruti Suzuki Dzire-Sedan</a></h6>
                            <div class="text">1.2L Petrol, ZXI+, 5-speed Manual Sedan</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>42,800 miles</li>
                                <li><i class="flaticon-speedometer"></i>Petrol</li>
                                <li><i class="flaticon-gearbox"></i>Manual</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;2,400/day</span>
                                <small>&#8377;1,900/day</small>
                                <a href="m-dzire.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_4346)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="#405FF2"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_4346">
                                    <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- car-block-four -->
                <div class="car-block-four col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/carsin/tiago1.jpg" alt=""></a></figure>
                            <a class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_601_1274)">
                                    <path d="M9.39062 12C9.15156 12 8.91671 11.9312 8.71128 11.8009L6.11794 10.1543C6.04701 10.1091 5.95296 10.1096 5.88256 10.1543L3.28869 11.8009C2.8048 12.1082 2.13755 12.0368 1.72722 11.6454C1.47556 11.4047 1.33685 11.079 1.33685 10.728V1.2704C1.33738 0.570053 1.90743 0 2.60778 0H9.39272C10.0931 0 10.6631 0.570053 10.6631 1.2704V10.728C10.6631 11.4294 10.0925 12 9.39062 12ZM6.00025 9.06935C6.24193 9.06935 6.47783 9.13765 6.68169 9.26743L9.27503 10.9135C9.31233 10.9371 9.35069 10.9487 9.39114 10.9487C9.48046 10.9487 9.61286 10.8788 9.61286 10.728V1.2704C9.61233 1.14956 9.51356 1.05079 9.39272 1.05079H2.60778C2.48642 1.05079 2.38817 1.14956 2.38817 1.2704V10.728C2.38817 10.7911 2.41023 10.8436 2.45384 10.8851C2.52582 10.9539 2.63563 10.9708 2.72599 10.9135L5.31934 9.2669C5.52267 9.13765 5.75857 9.06935 6.00025 9.06935Z" fill="black"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_1274">
                                    <rect width="12" height="12" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="m-tiago.php">Tata Tiago Ti-Hatchback</a></h6>
                            <div class="text">1.2L Petrol, XT, 5-speed Manual Hatchback</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>27,800 miles</li>
                                <li><i class="flaticon-speedometer"></i>Petrol</li>
                                <li><i class="flaticon-gearbox"></i>Manual</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;2,500/day</span>
                                <small>&#8377;2,000/day</small>
                                <a href="m-tiago.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_4346)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="#405FF2"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_4346">
                                    <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- car-block-four -->
                <div class="car-block-four col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="inner-box">
                        <div class="image-box two">
                            <span>Great Price</span>
                            <figure class="image"><a href="#"><img src="images/carsin/creta2.jpg" alt=""></a></figure>
                            <a class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_601_1274)">
                                    <path d="M9.39062 12C9.15156 12 8.91671 11.9312 8.71128 11.8009L6.11794 10.1543C6.04701 10.1091 5.95296 10.1096 5.88256 10.1543L3.28869 11.8009C2.8048 12.1082 2.13755 12.0368 1.72722 11.6454C1.47556 11.4047 1.33685 11.079 1.33685 10.728V1.2704C1.33738 0.570053 1.90743 0 2.60778 0H9.39272C10.0931 0 10.6631 0.570053 10.6631 1.2704V10.728C10.6631 11.4294 10.0925 12 9.39062 12ZM6.00025 9.06935C6.24193 9.06935 6.47783 9.13765 6.68169 9.26743L9.27503 10.9135C9.31233 10.9371 9.35069 10.9487 9.39114 10.9487C9.48046 10.9487 9.61286 10.8788 9.61286 10.728V1.2704C9.61233 1.14956 9.51356 1.05079 9.39272 1.05079H2.60778C2.48642 1.05079 2.38817 1.14956 2.38817 1.2704V10.728C2.38817 10.7911 2.41023 10.8436 2.45384 10.8851C2.52582 10.9539 2.63563 10.9708 2.72599 10.9135L5.31934 9.2669C5.52267 9.13765 5.75857 9.06935 6.00025 9.06935Z" fill="black"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_1274">
                                    <rect width="12" height="12" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="m-creta-ev.php">Hyundai Creta-EV</a></h6>
                            <div class="text">Single-Speed Automatic Electric</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>9,200 miles</li>
                                <li><i class="flaticon-electric-car-1"></i>Electric</li>
                                <li><i class="flaticon-gearbox"></i>Automatic</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;3,700/day</span>
                                <small>&#8377;2,800/day</small>
                                <a href="m-creta-ev.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_4346)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="#405FF2"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_4346">
                                    <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- car-block-four -->
                <div class="car-block-four col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/carsin/civic3.jpg" alt=""></a></figure>
                            <a class="icon-box">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <g clip-path="url(#clip0_601_1274)">
                                    <path d="M9.39062 12C9.15156 12 8.91671 11.9312 8.71128 11.8009L6.11794 10.1543C6.04701 10.1091 5.95296 10.1096 5.88256 10.1543L3.28869 11.8009C2.8048 12.1082 2.13755 12.0368 1.72722 11.6454C1.47556 11.4047 1.33685 11.079 1.33685 10.728V1.2704C1.33738 0.570053 1.90743 0 2.60778 0H9.39272C10.0931 0 10.6631 0.570053 10.6631 1.2704V10.728C10.6631 11.4294 10.0925 12 9.39062 12ZM6.00025 9.06935C6.24193 9.06935 6.47783 9.13765 6.68169 9.26743L9.27503 10.9135C9.31233 10.9371 9.35069 10.9487 9.39114 10.9487C9.48046 10.9487 9.61286 10.8788 9.61286 10.728V1.2704C9.61233 1.14956 9.51356 1.05079 9.39272 1.05079H2.60778C2.48642 1.05079 2.38817 1.14956 2.38817 1.2704V10.728C2.38817 10.7911 2.41023 10.8436 2.45384 10.8851C2.52582 10.9539 2.63563 10.9708 2.72599 10.9135L5.31934 9.2669C5.52267 9.13765 5.75857 9.06935 6.00025 9.06935Z" fill="black"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_1274">
                                    <rect width="12" height="12" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                        <div class="content-box">
                            <h6 class="title"><a href="m-civic.php">Honda Civic-Hybrid</a></h6>
                            <div class="text">1.8L Petrol, V, 6-speed Manual Hybrid...</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>62,112 miles</li>
                                <li><i class="flaticon-eco-car"></i>Hybrid</li>
                                <li><i class="flaticon-gearbox"></i>Manual</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;3,600/day</span>
                                <small>&#8377;2,800/day</small>
                                <a href="m-civic.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_4346)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="#405FF2"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_4346">
                                    <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
               

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