<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | About Us</title>
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

    <!-- about-inner-one -->
    <section class="about-inner-one layout-radius">
        <div class="upper-box">
            <div class="drivons-container">
                <div class="row wow fadeInUp">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="drivons-title">
                            <ul class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Drivons About-Us</span></li>
                            </ul>
                            <h2>About Us</h2>
                            <div class="text">We Value Our Clients 
                            And Want Them To Have 
                            A Nice Experience</div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="content-box">
                            <div class="text">At DRIVONS, our clients are our top priority, and we’re dedicated to delivering
                                an experience that’s as smooth and enjoyable as the ride itself. Renting a car should be hassle-free,
                                reliable, and tailored to your unique needs. 
                            </div>
                            <div class="text">That’s why we go the extra mile to provide a diverse fleet of meticulously maintained
                                vehicles, competitive pricing, and customer support that’s always ready to assist. Whether you’re
                                planning a family road trip, a business journey, or a spontaneous getaway, we aim to make your travel
                                effortless and memorable.
                                We take pride in building lasting relationships with our clients, fostering trust and confidence every
                                step of the way. From the ease of booking online to picking up your chosen vehicle, we focus on convenience
                                and quality to ensure your journey is worry-free.
                            </div>
                            <div class="text">Your comfort, safety, and satisfaction are our driving forces, and we continuously strive t
                                 enhance our services to meet and exceed your expectations.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- gallery-sec -->
        <div class="galler-section">
            <div class="drivons-container">
                <div class="row">
                    <div class="exp-block col-md-2 col-sm-12">
                        <div class="inner-box">
                            <div class="exp-box">
                                <h2 class="title">05</h2>
                                <div class="text">Years in
                                Business</div>
                            </div>
                            <div class="image-box">
                                <figure class="image"><img src="images/resource/about-inner1-1.jpg" alt=""></figure>
                            </div>
                        </div>
                    </div>
                    <div class="image-block style-center col-md-5 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/d1.jpeg" alt=""></figure>
                        </div>
                    </div>
                    <div class="image-block col-md-5 col-sm-12">
                        <div class="image-box two">
                            <figure class="image"><img src="images/resource/about-inner1-3.jpg" alt=""></figure>
                        </div>
                        <div class="row box-double-img">
                            <div class="image-block col-lg-5 col-5">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/about-inner1-4.jpg" alt=""></figure>
                                </div>
                            </div>
                            <div class="image-block col-lg-7 col-7">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/about-inner1-5.jpg" alt=""></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End gallery sec -->

        <!-- why choose us section -->
        <div class="why-choose-us-section">
            <div class="drivons-container">
                <div class="drivons-title wow fadeInUp">
                    <h2 class="title">Why Choose Us?</h2>
                </div>
                <div class="row">
                    <!-- choose-us-block -->
                    <div class="choose-us-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp">
                            <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="51" height="60" viewbox="0 0 51 60" fill="none">
                                <g clip-path="url(#clip0_24_628)">
                                    <path d="M22.9688 52.9676C22.9688 52.732 22.827 52.5195 22.6096 52.4289C20.0682 51.3695 18.2812 48.8627 18.2812 45.9375V23.4375C18.2812 20.5123 20.0682 18.0054 22.6096 16.9461C22.827 16.8555 22.9688 16.6429 22.9688 16.4074V16.4062H18.2812C14.398 16.4062 11.25 19.5543 11.25 23.4375V45.9375C11.25 49.8207 14.398 52.9688 18.2812 52.9688H22.9688V52.9676Z" fill="#EEF1FB"></path>
                                    <path d="M23.3708 41.3167L36.6292 28.0583" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M30 21.0938L44.0625 2.34375" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.9375 2.34375L25.3895 12.9483" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M48.75 30V23.4375C48.75 19.5543 45.602 16.4062 41.7188 16.4062H38.0747C36.4508 13.6159 33.4612 11.7188 30 11.7188C26.5388 11.7188 23.5493 13.6159 21.9253 16.4062H18.2812C14.398 16.4062 11.25 19.5543 11.25 23.4375V45.9375C11.25 49.8207 14.398 52.9688 18.2812 52.9688H21.9253C23.5492 55.7591 26.5388 57.6562 30 57.6562C33.4612 57.6562 36.4507 55.7591 38.0747 52.9688H41.7188C45.602 52.9688 48.75 49.8207 48.75 45.9375V39.375" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                    <clippath id="clip0_24_628">
                                    <rect width="51" height="60" fill="white"></rect>
                                    </clippath>
                                </defs>
                                </svg>
                            </div>
                            <div class="content-box">
                                <h6 class="title">Special Financing Offers</h6>
                                <div class="text">"Explore a range of exclusive financing options designed to make owning your dream car easy and affordable."</div>
                            </div>
                        </div>
                    </div>
                    <!-- choose-us-block -->
                    <div class="choose-us-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="100ms">
                            <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewbox="0 0 60 60" fill="none">
                                <path d="M30 2.34375V7.03125" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M48.75 2.34375L44.0625 7.03125" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15.4738 36.6607C14.3072 35.4056 13.5938 33.7236 13.5938 31.875C13.5938 30.7464 13.8596 29.68 14.3323 28.7347L19.0198 19.3597C20.1732 17.0529 22.5579 15.4688 25.3125 15.4688H18.2812C15.5266 15.4688 13.142 17.0529 11.9885 19.3597L7.30102 28.7347C6.8284 29.68 6.5625 30.7464 6.5625 31.875C6.5625 33.7236 7.27594 35.4056 8.44254 36.6607L26.5658 56.1592C27.4218 57.0802 28.6436 57.6562 30 57.6562C31.3564 57.6562 32.5782 57.0802 33.4342 56.1593L33.5156 56.0716L15.4738 36.6607Z" fill="#EEF1FB"></path>
                                <path d="M48.0115 19.3597L52.699 28.7347C53.1716 29.6798 53.4375 30.7464 53.4375 31.875C53.4375 33.7236 52.7241 35.4057 51.5575 36.6608L33.4342 56.1593C32.5782 57.0802 31.3564 57.6562 30 57.6562C28.6436 57.6562 27.4218 57.0802 26.5658 56.1593L8.44254 36.6608C7.27594 35.4057 6.5625 33.7236 6.5625 31.875C6.5625 30.7464 6.8284 29.6798 7.30102 28.7347L11.9885 19.3597C13.142 17.0528 15.5266 15.4688 18.2812 15.4688H41.7188C44.4734 15.4688 46.858 17.0528 48.0115 19.3597Z" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M11.25 2.34375L15.9375 7.03125" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M17.3849 29.5312H42.6151" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M25.3125 24.8438L30 29.5312L34.6875 24.8438" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M30 43.5938V29.7306" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="content-box">
                                <h6 class="title">Trusted Car Dealership</h6>
                                <div class="text">"With a proven track record of satisfied customers, we are dedicated to offering reliable vehicles and a seamless buying experience you can trust."</div>
                            </div>
                        </div>
                    </div>
                    <!-- choose-us-block -->
                    <div class="choose-us-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                            <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewbox="0 0 60 60" fill="none">
                                <g clip-path="url(#clip0_24_681)">
                                <path d="M8.75576 36.7478L35.3054 10.198C37.136 8.36741 40.104 8.36741 41.9346 10.198L36.8955 5.15894C35.0649 3.32837 32.097 3.32837 30.2664 5.15894L3.71671 31.7087C1.88613 33.5393 1.88613 36.5073 3.71671 38.3378L8.75576 43.3768C6.92518 41.5462 6.92518 38.5783 8.75576 36.7478Z" fill="#EEF1FB"></path>
                                <path d="M50.1537 18.4171C51.9843 20.2477 51.9843 23.2157 50.1537 25.0463L23.6039 51.5959C21.7734 53.4265 18.8054 53.4265 16.9748 51.5959L3.71671 38.3378C1.88613 36.5072 1.88613 33.5392 3.71671 31.7086L30.2664 5.15894C32.097 3.32836 35.0649 3.32836 36.8955 5.15894L43.5247 11.7881L52.9689 2.34387" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M18.9633 31.0458C18.7631 32.4554 19.2051 33.9388 20.2894 35.0231C22.12 36.8537 25.088 36.8537 26.9186 35.0231C28.7492 33.1926 28.7492 30.2246 26.9186 28.394C25.088 26.5634 25.088 23.5954 26.9186 21.7648C28.7492 19.9342 31.7172 19.9342 33.5478 21.7648C34.6321 22.8491 35.0741 24.3325 34.8739 25.7421" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16.9749 38.3378L20.2894 35.0232" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M33.5476 21.765L36.8621 18.4504" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M43.5938 57.6562L57.6563 43.5937" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                                <defs>
                                <clippath id="clip0_24_681">
                                <rect width="60" height="60" fill="white"></rect>
                                </clippath>
                                </defs>
                                </svg>
                            </div>
                            <div class="content-box">
                                <h6 class="title">Transparent Pricing</h6>
                                <div class="text">"We believe in honesty and clarity, offering detailed, upfront pricing with no hidden costs to ensure peace of mind."</div>
                            </div>
                        </div>
                    </div>
                    <!-- choose-us-block -->
                    <div class="choose-us-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                            <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewbox="0 0 60 60" fill="none">
                                <path d="M23.5465 4.45312C19.8452 4.45312 16.4904 6.63082 14.9836 10.0114L8.88656 23.6906C5.23148 23.9418 2.34375 26.9843 2.34375 30.7031V36.0938C2.34375 39.3298 4.96711 41.9531 8.20312 41.9531H9.80918C9.81785 41.5022 9.82934 41.0514 9.84375 40.6005C9.4623 39.823 9.24727 38.949 9.24727 38.0245L9.14062 33.8672C9.14062 30.7927 9.76617 29.6094 12.0483 29.1497C13.1331 28.9311 14.0413 28.192 14.4858 27.1786L22.0148 10.0114C23.5215 6.63082 26.8764 4.45312 30.5777 4.45312H23.5465Z" fill="#EEF1FB"></path>
                                <path d="M8.20312 41.9531C4.96711 41.9531 2.34375 39.3298 2.34375 36.0938V30.7031C2.34375 26.9843 5.23148 23.9418 8.88656 23.6906L14.9836 10.0114C16.4903 6.63082 19.8451 4.45312 23.5465 4.45312H34.2217C37.7441 4.45312 40.9692 6.4275 42.5711 9.56461L45.5859 15.4688M57.6562 30.7031C57.6562 26.8199 54.5082 23.6719 50.625 23.6719H18.6328M28.2422 15.4688V4.57031M32.4609 41.9531H27.1873M20.742 37.2656C18.1532 37.2656 16.0545 39.3643 16.0545 41.9531C16.0545 44.5419 18.1532 46.6406 20.742 46.6406C23.3307 46.6406 25.4295 44.5419 25.4295 41.9531C25.4295 39.3643 23.3309 37.2656 20.742 37.2656Z" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M57.6562 41.6016C57.6562 46.0997 54.0098 49.8047 49.5117 49.8047C45.0136 49.8047 41.3672 46.1583 41.3672 41.6602C41.3672 37.162 45.0722 33.5156 49.5703 33.5156M43.5352 48.1055L36.0938 55.5469" stroke="#FF5CF3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <div class="content-box">
                                <h6 class="title">Expert Car Service</h6>
                                <div class="text">"Our skilled technicians use the latest tools and genuine parts to deliver exceptional care and ensure your vehicle performs at its best."</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End why choose us section -->
 
        <!-- pricing section -->
        <div class="drivons-pricing-section pb-0 pt-0">
            <div class="large-container">
                <div class="row g-0">
                    <!-- image-column -->
                    <div class="image-column col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-column">
                            <div class="image-box">
                                <figure class="image"><img src="images/resource/pricing2-1.jpg" alt=""></a></figure>
                                <a href="https://youtu.be/ZOZOqbK86t0?si=-hqXOcWYjRM8e--G" class="play-now" target="_blank"><i class="fa fa-play" aria-hidden="true"></i><span class="ripple"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="content-column col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-column">
                        <div class="drivons-title wow fadeInUp">
                                <h2>Get A Fair Price For Your Traveling Buddy</h2>
                                <div class="text">We are committed to providing our customers with exceptional service, 
                                competitive pricing, and a wide range of:</div>
                        </div>
                        <ul class="list-style-one wow fadeInUp" data-wow-delay="100ms">
                                <li><i class="fa-solid fa-check"></i>We are the Maharashtra’s largest provider, with more patrols in more places</li>
                                <li><i class="fa-solid fa-check"></i>You get 24/7 roadside assistance</li>
                                <li><i class="fa-solid fa-check"></i>We fix 4 out of 5 cars at the roadside</li>
                                <li><i class="fa-solid fa-check"></i>No hidden fees—what you see is what you get.</li>
                                <li><i class="fa-solid fa-check"></i>Our team handles all the paperwork, saving you time and effort.</li>
                        </ul>
                        <a href="subscription.php" class="read-more wow fadeInUp" data-wow-delay="200ms">get started<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                <g clip-path="url(#clip0_634_2156)">
                                <path d="M13.6106 0H5.05509C4.84013 0 4.66619 0.173943 4.66619 0.388901C4.66619 0.603859 4.84013 0.777802 5.05509 0.777802H12.6719L0.113453 13.3362C-0.0384687 13.4881 -0.0384687 13.7342 0.113453 13.8861C0.189396 13.962 0.288927 14 0.388422 14C0.487917 14 0.587411 13.962 0.663391 13.8861L13.2218 1.3277V8.94447C13.2218 9.15943 13.3957 9.33337 13.6107 9.33337C13.8256 9.33337 13.9996 9.15943 13.9996 8.94447V0.388901C13.9995 0.173943 13.8256 0 13.6106 0Z" fill="white"></path>
                                </g>
                                <defs>
                                <clippath id="clip0_634_2156">
                                    <rect width="14" height="14" fill="white"></rect>
                                </clippath>
                                </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End pricing section -->

        
        


        <!-- faq-section -->
        <div class="faqs-section pt-0">
            <div class="inner-container">
                <!-- FAQ Column -->
                <div class="faq-column wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-column">
                        <div class="drivons-title text-center">
                            <h2 class="title">See Frequently Asked Questions</h2>
                        </div>
                        <ul class="widget-accordion wow fadeInUp">
                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active">What types of vehicles do you offer for rent?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text">We offer a wide range of vehicles including economy cars, SUVs, Seden, Jeep, and more to suit your needs and preferences.
                                            Whether you’re planning a weekend getaway, a business trip, or need a spacious vehicle for a family vacation, we have something to suit every requirement.
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How can I book a car rental?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Booking your rental is easy and convenient. Simply visit our website, choose your preferred car model, pick up and drop-off locations, and specify your rental dates. Once you've made your selection, you can proceed with a secure payment. 
                                            Alternatively, you can book by calling our customer service team, who can assist you with the process.                
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What documents do I need to rent a car?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">To rent a car, you will need the following documents:<br>
                                            1. A valid driver’s license (held for at least 1-2 years, depending on location)<br>
                                            2. A credit card in your name for the deposit and <br>
                                            3. Proof of identity (e.g., passport or national ID for international customers)<br>
                                    </div>
                                </div>
                            </li>
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What happens if I return the car late?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">If you return the car later than the agreed time, you may incur late fees, typically charged on an hourly or daily basis,
                                            depending on the length of the delay. We recommend notifying us in advance if you're going to be late to avoid additional charges.
                                            Late returns may also affect the availability of cars for other customers, so it's important to stick to your return time.
                                        </div>
                                    </div>
                                </div>
                            </li>

                            
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Can I cancel or modify my booking? <div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Yes, you can cancel or modify your booking. Cancellations are free if made within a specified time frame, usually 24 to 48 hours before the rental period starts.
                                            Changes to the booking, such as altering dates or vehicle types, may incur an additional charge.
                                            Please refer to your rental agreement for cancellation and modification policies, as they can vary depending on the rental location and the terms of your booking.
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End faqs-section -->
    </section>
    <!-- End about-inner-one -->


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