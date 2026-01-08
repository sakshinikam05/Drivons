<?php include 'session.php'; ?>
<?php
error_reporting(E_ALL); // Enable error reporting
ini_set('display_errors', 1);

// Include the database configuration file
include 'includes/config.php';

// Debug: Check if the database connection is established
if (!isset($dbh)) {
    die("Database connection is not established.");
}

if (isset($_POST['send'])) {

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $message = $_POST['message'];

    // Validate and sanitize inputs
    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $title = htmlspecialchars($title);
    $message = htmlspecialchars($message);

    // Correct SQL statement with placeholders
    $sql = "INSERT INTO tblreply (name, email, title, message, created_at) 
            VALUES (:name, :email, :title, :message, NOW())";

    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);

    try {
        if ($query->execute()) {
            echo "<script>alert('Reply saved successfully!'); window.location.href='p-kiger.php';</script>";
        } else {
            echo "<script>alert('Error saving reply.'); window.location.href='p-kiger.php';</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Database error: " . $e->getMessage() . "'); window.location.href='p-kiger.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Pune-Cars</title>
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

    <!-- inventory-section -->
    <section class="inventory-section pb-0 layout-radius">
        <div class="drivons-container">
            <div class="drivons-title-three">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Pune Cars</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="inspection-column v2 col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="gallery-sec">
                            <div class="image-column wrap-gallery-box">
                                <div class="inner-column inventry-slider-two">
                                    <div class="image-box">
                                        <figure class="image"><a data-fancybox="gallery"><img src="images/carsin/kiger1.jpg" alt=""></a></figure>
                                        
                                    </div>
                                    <div class="image-box">
                                        <figure class="image"><a data-fancybox="gallery"><img src="images/carsin/kiger2.jpg" alt=""></a></figure>
                                       
                                    </div>
                                    <div class="image-box">
                                        <figure class="image"><a data-fancybox="gallery"><img src="images/carsin/kiger3.jpg" alt=""></a></figure>
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      <!-- Description Section -->
<div class="description-sec">
    <h4 class="title">Description</h4>
    <div class="text two">The Renault Kiger is a stylish and feature-packed SUV designed for modern-day urban and highway driving. Known for its bold design and advanced technology, it is a top choice for families and adventure enthusiasts. With a powerful yet fuel-efficient engine, it offers a smooth and dynamic driving experience.</div>
    <div class="text">The Creta features a sleek exterior, premium interiors, and a host of smart features. Equipped with cutting-edge safety and convenience technologies, it ensures a comfortable and secure ride. Whether navigating city roads or exploring long highways, the Kiger provides an exceptional driving experience.</div>
    <ul class="des-list">
        <li><a><img src="images/resource/book1-1.svg">Great Mileage</a></li>
        <li class="two"><a><img src="images/resource/book1-2.svg">Good Performance</a></li>
    </ul>
</div>

<!-- Features Section -->
<div class="features-sec v2">
    <h4 class="title">Features</h4>
    <div class="row">
        <!-- Interior Features -->
        <div class="list-column col-lg-4 col-md-6 col-sm-12">
            <div class="inner-column">
                <h6 class="title">Interior</h6>
                <ul class="feature-list">
                    <li><i class="fa-solid fa-check"></i>Leather Upholstery</li>
                    <li><i class="fa-solid fa-check"></i>Digital Instrument Cluster</li>
                    <li><i class="fa-solid fa-check"></i>Automatic Climate Control</li>
                    <li><i class="fa-solid fa-check"></i>Electric Sunroof</li>
                    <li><i class="fa-solid fa-check"></i>Ventilated Front Seats</li>
                </ul>
            </div>
        </div>
        <!-- Exterior Features -->
        <div class="list-column col-lg-4 col-md-6 col-sm-12">
            <div class="inner-column">
                <h6 class="title">Exterior</h6>
                <ul class="feature-list">
                    <li><i class="fa-solid fa-check"></i>LED Headlamps</li>
                    <li><i class="fa-solid fa-check"></i>Diamond-Cut Alloy Wheels</li>
                    <li><i class="fa-solid fa-check"></i>Shark Fin Antenna</li>
                    <li><i class="fa-solid fa-check"></i>Roof Rails</li>
                </ul>
            </div>
        </div>
        <!-- Safety Features -->
        <div class="list-column col-lg-4 col-md-6 col-sm-12">
            <div class="inner-column">
                <h6 class="title">Safety</h6>
                <ul class="feature-list">
                    <li><i class="fa-solid fa-check"></i>6 Airbags</li>
                    <li><i class="fa-solid fa-check"></i>Electronic Stability Control</li>
                    <li><i class="fa-solid fa-check"></i>Hill Assist Control</li>
                    <li><i class="fa-solid fa-check"></i>360-degree Camera</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="faqs-section pt-0">
    <div class="inner-container">
        <h4 class="title">Specifications</h4>
        <div class="faq-column wow fadeInUp" data-wow-delay="400ms">
            <div class="inner-column">
                <ul class="widget-accordion wow fadeInUp">
                    <!-- Engine and Transmission -->
                    <li class="accordion block active-block">
                        <div class="acc-btn active">Engine and Transmission<div class="icon fa fa-angle-down"></div></div>
                        <div class="acc-content current">
                            <div class="content">
                                <div class="row">
                                    <div class="list-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-column">
                                            <ul class="spects-list">
                                                <li><span>Engine Type</span>1.5L Petrol/Diesel</li>
                                                <li><span>Max Power</span>115 bhp @ 6300 rpm</li>
                                                <li><span>Max Torque</span>144 Nm @ 4500 rpm</li>
                                                <li><span>Transmission</span>6-Speed Manual / CVT / Automatic</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="list-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-column">
                                            <ul class="spects-list">
                                                <li><span>Fuel Type</span>Petrol/Diesel</li>
                                                <li><span>Mileage</span>17-21 km/l</li>
                                                <li><span>Emission Norm</span>BS6</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Dimensions & Capacity -->
                    <li class="accordion block">
                        <div class="acc-btn">Dimensions & Capacity<div class="icon fa fa-angle-down"></div></div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="row">
                                    <div class="list-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-column">
                                            <ul class="spects-list">
                                                <li><span>Length</span>4300 mm</li>
                                                <li><span>Width</span>1790 mm</li>
                                                <li><span>Height</span>1635 mm</li>
                                                <li><span>Wheelbase</span>2610 mm</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="list-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-column">
                                            <ul class="spects-list">
                                                <li><span>Ground Clearance</span>190 mm</li>
                                                <li><span>Seating Capacity</span>5 Seater</li>
                                                <li><span>Fuel Tank Capacity</span>50 Litres</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Miscellaneous -->
                    <li class="accordion block v2">
                        <div class="acc-btn">Miscellaneous<div class="icon fa fa-angle-down"></div></div>
                        <div class="acc-content">
                            <div class="content">
                                <div class="row">
                                    <div class="list-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-column">
                                            <ul class="spects-list">
                                                <li><span>Kerb Weight</span>1250 kg</li>
                                                <li><span>No. of Doors</span>5</li>
                                                <li><span>Boot Space</span>433 Litres</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="list-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner-column">
                                            <ul class="spects-list">
                                                <li><span>Turning Radius</span>5.2 m</li>
                                                <li><span>Spare Wheel</span>Steel</li>
                                            </ul>
                                        </div>
                                    </div>
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
                        <div class="location-box">
                            <h4 class="title">Location</h4>
                            <div class="text">Maharaj Road, Shivaji Nagar, Pune B80 6BS
                                Open today 09am - 05pm
                            </div>
                            <a href="#" class="brand-btn">Get Directions<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewbox="0 0 15 14" fill="none">
                                <g clip-path="url(#clip0_881_14440)">
                                  <path d="M14.1111 0H5.55558C5.34062 0 5.16668 0.173943 5.16668 0.388901C5.16668 0.603859 5.34062 0.777802 5.55558 0.777802H13.1723L0.613941 13.3362C0.46202 13.4881 0.46202 13.7342 0.613941 13.8861C0.689884 13.962 0.789415 14 0.88891 14C0.988405 14 1.0879 13.962 1.16388 13.8861L13.7222 1.3277V8.94447C13.7222 9.15943 13.8962 9.33337 14.1111 9.33337C14.3261 9.33337 14.5 9.15943 14.5 8.94447V0.388901C14.5 0.173943 14.3261 0 14.1111 0Z" fill="#405FF2"></path>
                                </g>
                                <defs>
                                  <clippath id="clip0_881_14440">
                                    <rect width="14" height="14" fill="white" transform="translate(0.5)"></rect>
                                  </clippath>
                                </defs>
                              </svg>
                            </a>
                            <div class="goole-iframe">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60502.999433671735!2d73.63927765091563!3d18.599383224586177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bbc048041bef%3A0xd0c9eb5ac3c3dee5!2sHinjawadi%2C%20Pune%2C%20Pimpri-Chinchwad%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1739524847120!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="contact-box-three">
                            <div class="icon-box">
                                <img src="images/resource/deal2.jpg">
                            </div>
                            <div class="content-box">
                                <div class="inner-box">
                                    <h6 class="title">Pune Dealers </h6>
                                    <div class="text">Hinjawadi</div>
                                    <ul class="contact-list">
                                        <li><a href="#"><div class="image-box"><img src="images/resource/phone1-1.svg"></div>Get Directions</a></li>
                                        <li><a href="#"><div class="image-box"><img src="images/resource/phone1-2.svg"></div>+91 956 039 967</a></li>
                                    </ul>
                                </div>
                                <div class="btn-box">
                                    <a href="d0.php" class="side-btn">Message Dealer<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                        <g clip-path="url(#clip0_881_7563)">
                                          <path d="M13.6111 0H5.05558C4.84062 0 4.66668 0.173943 4.66668 0.388901C4.66668 0.603859 4.84062 0.777802 5.05558 0.777802H12.6723L0.113941 13.3362C-0.0379805 13.4881 -0.0379805 13.7342 0.113941 13.8861C0.189884 13.962 0.289415 14 0.38891 14C0.488405 14 0.5879 13.962 0.663879 13.8861L13.2222 1.3277V8.94447C13.2222 9.15943 13.3962 9.33337 13.6111 9.33337C13.8261 9.33337 14 9.15943 14 8.94447V0.388901C14 0.173943 13.8261 0 13.6111 0Z" fill="white"></path>
                                        </g>
                                        <defs>
                                          <clippath id="clip0_881_7563">
                                            <rect width="14" height="14" fill="white"></rect>
                                          </clippath>
                                        </defs>
                                      </svg>
                                    </a>
                                    
                                    <a href="pune.php" class="side-btn-three">View all stock at this dealer<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                        <g clip-path="url(#clip0_881_10193)">
                                          <path d="M13.6111 0H5.05558C4.84062 0 4.66668 0.173943 4.66668 0.388901C4.66668 0.603859 4.84062 0.777802 5.05558 0.777802H12.6723L0.113941 13.3362C-0.0379805 13.4881 -0.0379805 13.7342 0.113941 13.8861C0.189884 13.962 0.289415 14 0.38891 14C0.488405 14 0.5879 13.962 0.663879 13.8861L13.2222 1.3277V8.94447C13.2222 9.15943 13.3962 9.33337 13.6111 9.33337C13.8261 9.33337 14 9.15943 14 8.94447V0.388901C14 0.173943 13.8261 0 13.6111 0Z" fill="#050B20"></path>
                                        </g>
                                        <defs>
                                          <clippath id="clip0_881_10193">
                                            <rect width="14" height="14" fill="white"></rect>
                                          </clippath>
                                        </defs>
                                      </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                      
                        <div class="reviews">
                            <div class="content-box">
                                <div class="auther-name">
                                    <span>M.K</span>
                                    <h6 class="name">Meera Kelkar</h6>
                                    <small>24 Jan 2025</small>
                                </div>
                                <div class="rating-list">
                                    <ul class="list">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <span>Perfect for Long Drives!</span>
                                </div>
                                <div class="text">"We rented an SUV for a family road trip, and it was the best decision ever! 
                                    The car was spacious, comfortable, and fuel-efficient. 
                                    The entire process, from booking to returning the car, was seamless. 
                                    We’ll definitely use this service again for our next adventure!"
                                </div>
                                <div class="image-box">
                                    <img src="images/resource/REV1.jpg">
                                    <img src="images/resource/rev2.jpg">
                                    <img src="images/resource/rev3.jpg">
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="like-btn"><i class="fa-solid fa-thumbs-up"></i>Helpful</a>
                                    <a href="#" class="like-btn"><i class="fa-solid fa-thumbs-down"></i>Not helpful</a>
                                </div>
                            </div>
                            <div class="content-box two">
                                <div class="auther-name">
                                    <span>R.N</span>
                                    <h6 class="name">Rohan Nanda</h6>
                                    <small>17 Sep 2024</small>
                                </div>
                                <div class="rating-list">
                                    <ul class="list">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Best Car Rental Experience Ever!</span>
                                </div>
                                <div class="text">"I have rented from many websites before, but this one stands out. 
                                    The entire process was so smooth, and the staff went above and beyond to ensure I 
                                    had a great experience. Will definitely be back!"
                                </div>
                                <div class="btn-box">
                                    <a href="#" class="like-btn"><i class="fa-solid fa-thumbs-up"></i>Helpful</a>
                                    <a href="#" class="like-btn"><i class="fa-solid fa-thumbs-down"></i>Not helpful</a>
                                </div>
                                <a href="#" class="review">See more reviews<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewbox="0 0 15 14" fill="none">
                                    <g clip-path="url(#clip0_881_13248)">
                                      <path d="M14.1106 0H5.55509C5.34013 0 5.16619 0.173943 5.16619 0.388901C5.16619 0.603859 5.34013 0.777802 5.55509 0.777802H13.1719L0.613453 13.3362C0.461531 13.4881 0.461531 13.7342 0.613453 13.8861C0.689396 13.962 0.788927 14 0.888422 14C0.987917 14 1.08741 13.962 1.16339 13.8861L13.7218 1.3277V8.94447C13.7218 9.15943 13.8957 9.33337 14.1107 9.33337C14.3256 9.33337 14.4996 9.15943 14.4996 8.94447V0.388901C14.4995 0.173943 14.3256 0 14.1106 0Z" fill="#405FF2"></path>
                                    </g>
                                    <defs>
                                      <clippath id="clip0_881_13248">
                                        <rect width="14" height="14" fill="white" transform="translate(0.5)"></rect>
                                      </clippath>
                                    </defs>
                                  </svg>
                                </a>
                            </div>
                            
                        </div>
                        <div class="Reply-sec">
                            <h6 class="title">Leave a Reply</h6>
                        </div>
                        <form class="row" method="post" action="">
                            <div class="col-lg-6">
                                <div class="form_boxes">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_boxes">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Enter Your Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_boxes">
                                    <label>Title</label>
                                    <input type="text" name="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_boxes v2">
                                    <label>Comment</label>
                                    <textarea name="message" placeholder="Please Leave A Comment" required=""></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-send">
                                    <button type="submit" name="send" class="theme-btn">Post Comment <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                        <g clip-path="url(#clip0_711_3214)">
                                        <path d="M13.6106 0H5.05509C4.84013 0 4.66619 0.173943 4.66619 0.388901C4.66619 0.603859 4.84013 0.777802 5.05509 0.777802H12.6719L0.113453 13.3362C-0.0384687 13.4881 -0.0384687 13.7342 0.113453 13.8861C0.189396 13.962 0.288927 14 0.388422 14C0.487917 14 0.587411 13.962 0.663391 13.8861L13.2218 1.3277V8.94447C13.2218 9.15943 13.3957 9.33337 13.6107 9.33337C13.8256 9.33337 13.9996 9.15943 13.9996 8.94447V0.388901C13.9995 0.173943 13.8256 0 13.6106 0Z" fill="white"></path>
                                        </g>
                                        <defs>
                                        <clippath id="clip0_711_3214">
                                        <rect width="14" height="14" fill="white"></rect>
                                        </clippath>
                                        </defs>
                                        </svg>
                                    </button>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
                <div class="side-bar-column v2 v3 col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="contact-box-two">
                            <div class="content-box">
                                <h2>Renault Kiger</h2>
                                <div class="text">1.5L BS6 5 Seater</div>
                                <ul class="list">
                                    <li>30,000 kms</li>
                                    <li>Petrol</li>
                                    <li>Automatic</li>
                                </ul>
                            </div>
                            <span>Our Price</span>
                            <h3 class="title">₹2,600/day</h3>
                            <small>Instant Saving : ₹2,000/day</small>
                            <div class="btn-box">
                                 
                                <a href="wd.php?car_id=10" class="side-btn two"><img src="images/resource/tag1-1.svg">Book A Car</a>
                            </div>
                        </div>
                           <!-- overview-sec -->
                                            <div class="overview-box">
                                                <h4 class="title">Car Overview</h4>
                                                <ul class="list">
                                                    <li><span><img src="images/resource/insep1-1.svg">Body</span>SUV</li>
                                                    <li><span><img src="images/resource/insep1-2.svg">Mileage</span>40,000 miles</li>
                                                    <li><span><img src="images/resource/insep1-3.svg">Fuel Type</span>Petrol</li>
                                                    <li><span><img src="images/resource/insep1-4.svg">Year</span>2022</li>
                                                    <li><span><img src="images/resource/insep1-5.svg">Transmission</span>Automatic</li>
                                                    <li><span><img src="images/resource/insep1-6.svg">Drive Type</span>Front Wheel Drive</li>
                                                    <li><span><img src="images/resource/insep1-7.svg">Condition</span>New</li>
                                                    <li><span><img src="images/resource/insep1-8.svg">Engine Size</span>1.5L</li>
                                                    <li><span><img src="images/resource/insep1-9.svg">Doors</span>5-door</li>
                                                    <li><span><img src="images/resource/insep1-10.svg">Cylinders</span>4</li>
                                                    <li><span><img src="images/resource/insep1-11.svg">Color</span>Black</li>
                                                    <li><span><img src="images/resource/insep1-12.svg">VIN</span>MH12AB1234CRETA</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    
        
    </section>
    <!-- End inventory-section -->
    
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
        }, 300);     });
</script>
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>

</body>
</html>