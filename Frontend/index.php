<?php include 'session.php'; ?>
<?php 
include 'dbcon.php';
// Check if the user is logged in
$is_logged_in = isset($_SESSION['user_id']);
$subscription_plan = 'none'; // Default value

if ($is_logged_in) {
    $user_id = $_SESSION['user_id'];

    // Fetch subscription plan from database
    $query = "SELECT plan FROM tblsubscriptions WHERE user_id = ? ORDER BY id DESC LIMIT 1";
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($subscription_plan);
        $stmt->fetch();
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link href="css/mmenu.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/run.css" rel="stylesheet">
<link rel="stylesheet" href="css/flaticon.css">

<link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
<link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body>
<?php
// Check if user is logged in
    $logged_in = isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true;
?>

<?php if (!$logged_in): ?> 
<!-- Modal Overlay -->
<div class="modal-overlay" id="loginModal">
    <div class="modal-box">
        <h4>Login Required</h4>
        <p>You must log in to continue exploring our website.</p>
        <button class="modal-button" onclick="redirectToLogin()">Login In Now</button>
    </div>
</div>

<!-- JavaScript to Show moxel box -->
<script>
    setTimeout(function () {
    let modal = document.getElementById("loginModal");
    modal.classList.add("show");

    // Disable scrolling when modal appears
    document.body.style.overflow = "hidden";
}, 30000); // 

function redirectToLogin() {
    window.location.href = "login.php";
}

// Prevent clicking outside modal
        document.addEventListener("click", function(event) {
        let modal = document.getElementById("loginModal");
        if (modal.classList.contains("show") && !event.target.classList.contains("modal-button")) {
        event.stopPropagation();
     event.preventDefault();
 }
}, true);
</script>
<?php endif; ?>


<style>
/* Modal Box */
.modal-overlay {
    backdrop-filter: blur(2px);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.61);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999; 
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease-in-out, visibility 0.3s;
}

/* Modal Box */
.modal-box {
    background: rgba(0, 0, 0, 0.52);
    backdrop-filter: blur(5px);
    padding: 30px;
    width: 450px;
    height: 200px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0px 10px 25px rgba(255, 255, 255, 0.05);
    transform: scale(0.8);
    opacity: 0;
    transition: transform 0.3s ease-in-out, opacity 0.3s;
    font-family: 'Poppins', sans-serif;
}

.modal-overlay .modal-box h4{
    font-weight: bold;
    color: white;
}

.modal-overlay .modal-box p{  
    color: white;
}
/* Show Modal Effect */
.modal-overlay.show {
    visibility: visible;
    opacity: 1;
}

.modal-overlay.show .modal-box {
    transform: scale(1);
    opacity: 1;
}

/* Login Button */
.modal-button {
    background: #007bff;
    color: white;
    border: none;
    padding: 8px 18px;
    border-radius: 8px;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s;
    font-family: 'Poppins', sans-serif;
}

.modal-button:hover {
    background:rgb(1, 64, 132);
}

/* Disable Scrolling When Modal is Active */
.modal-overlay.show ~ * {
    pointer-events: none;
}
</style>

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

    <!-- Main Header-->
	<header class="drivons-header header-style-v1 header-default">
        <div class="header-inner">
            <div class="inner-container">
                <!-- Main box -->
                <div class="c-box">
                    <div class="logo-inner">
                        <div class="logo"><a href="index.php"><img src="images/logo/DRIVONS.png" alt="" title="Drivons"></a></div>

                        
                        <div class="layout-search">
                            <div class="search-box">
                                <svg class="icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.29301 1.2876C3.9872 1.2876 1.29431 3.98048 1.29431 7.28631C1.29431 10.5921 3.9872 13.2902 7.29301 13.2902C8.70502 13.2902 10.0036 12.7954 11.03 11.9738L13.5287 14.4712C13.6548 14.5921 13.8232 14.6588 13.9979 14.657C14.1725 14.6552 14.3395 14.5851 14.4631 14.4617C14.5867 14.3382 14.6571 14.1713 14.6591 13.9967C14.6611 13.822 14.5947 13.6535 14.474 13.5272L11.9753 11.0285C12.7976 10.0006 13.293 8.69995 13.293 7.28631C13.293 3.98048 10.5988 1.2876 7.29301 1.2876ZM7.29301 2.62095C9.87824 2.62095 11.9584 4.70108 11.9584 7.28631C11.9584 9.87153 9.87824 11.9569 7.29301 11.9569C4.70778 11.9569 2.62764 9.87153 2.62764 7.28631C2.62764 4.70108 4.70778 2.62095 7.29301 2.62095Z" fill="white"/>
                                </svg>  
                                <input type="search" id="searchInput" placeholder="Find Your Perfect Ride - Search By Location" class="show-search" name="name" tabindex="2" value="" aria-required="true" required="">
                            </div>
                            <div class="box-content-search" id="box-content-search">
                                <ul class="box-car-search" id="dealerList">
                                    <!-- Dealer items will be dynamically populated here -->
                                </ul>
                            </div>
                        </div>
                        
                        <script>
                            // List of dealers and cars
                            const dealers = [
                                "Pune Dealer",
                                "Jalgaon Dealer",
                                "Navi Mumbai Dealer",
                                "Sambhajinagar Dealer",
                                "Nashik Dealer",
                                "Thane Dealer",
                                "Nagpur Dealer",
                                "Mumbai Dealer"
                            ];
                            
                            const cars = [
                                "Pune Cars",
                                "Jalgaon Cars",
                                "Navi Mumbai Cars",
                                "Sambhajinagar Cars",
                                "Nashik Cars",
                                "Thane Cars",
                                "Nagpur Cars",
                                "Mumbai Cars"
                            ];
                        
                            // Get references to the input and list elements
                            const searchInput = document.getElementById('searchInput');
                            const dealerList = document.getElementById('dealerList');
                        
                            // Function to filter and display dealers and cars
                            function filterResults() {
                                const searchText = searchInput.value.trim().toLowerCase();
                                const filteredDealers = dealers.filter(dealer => dealer.toLowerCase().includes(searchText));
                                const filteredCars = cars.filter(car => car.toLowerCase().includes(searchText));
                        
                                // Clear the current list
                                dealerList.innerHTML = '';
                        
                                if (filteredDealers.length > 0 || filteredCars.length > 0) {
                                    if (filteredDealers.length > 0) {
                                        filteredDealers.forEach(dealer => {
                                            const li = document.createElement('li');
                                            li.innerHTML = `
                                                <div class="car-search-item" style="display: flex; justify-content: space-between; align-items: center;">
                                                    <div class="box-img" style="width: 50px; height: 50px;">
                                                        <img src="images/resource/about-inner1-1.jpg" alt="Dealer" style="width: 100%; height: 100%;">
                                                    </div>
                                                    <div class="info" style="flex-grow: 1;">
                                                        <p class="name">${dealer}</p>
                                                    </div>
                                                    <a href="dealer.php" class="btn-view-search" style="margin-left: 10px;">View Details</a>
                                                </div>
                                            `;
                                            dealerList.appendChild(li);
                                        });
                                    }
                                    
                                    if (filteredCars.length > 0) {
                                        filteredCars.forEach(car => {
                                            const li = document.createElement('li');
                                            li.innerHTML = `
                                                <div class="car-search-item" style="display: flex; justify-content: space-between; align-items: center;">
                                                    <div class="box-img" style="width: 50px; height: 50px;">
                                                        <img src="images/resource/add-car1.jpg" alt="Car" style="width: 100%; height: 100%;">
                                                    </div>
                                                    <div class="info" style="flex-grow: 1;">
                                                        <p class="name">${car}</p>
                                                    </div>
                                                    <a href="inventory.php" class="btn-view-search" style="margin-left: 10px;">View Details</a>
                                                </div>
                                            `;
                                            dealerList.appendChild(li);
                                        });
                                    }
                                } else {
                                    // Show "Search not found" message with better UI
                                    const li = document.createElement('li');
                                    li.innerHTML = `
                                        <div style="text-align: center; padding: 10px; color: red; font-weight: bold;">
                                            <p>No results found</p>
                                        </div>
                                    `;
                                    dealerList.appendChild(li);
                                }
                            }
                        
                            // Add event listener to the search input
                            searchInput.addEventListener('input', filterResults);
                        
                            // Initialize the list with all dealers and cars on page load
                            filterResults();
                        </script>
                    </div>


                    <!--Nav Box-->
                    <div class="nav-out-bar">    
                        <nav class="nav main-menu">
                            <ul class="navigation" id="navbar">
                                <li class="current-dropdown"><a href="index.php">Home</a></li>
                                <li class="current-dropdown"><a href="inventory.php">Browse Cars</a></li>
                                <li class="current-dropdown"><a href="about.php">About Us</a></li>
                                <li class="current-dropdown"><a href="blog.php">Blog</a></li>

                                <li class="current-dropdown right-one">
                                    <a href="#">Support</a>
                                    <ul class="dropdown">
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="faq.php">FAQs</a></li>
                                        <li><a href="terms.php">Terms and Conditions</a></li>
                                        <li><a href="dealer.php">Dealer Enquiry</a></li>
                                    </ul>
                                </li>

                                <!-- Subscription Logic -->
                                <?php if ($is_logged_in): ?>
                                    <?php if ($subscription_plan === 'Basic' || $subscription_plan === 'Standard'): ?>
                                            <li class="current-dropdown"><a href="subscription.php">Upgrade</a></li>
                                        <?php elseif ($subscription_plan === 'Premium'): ?>
                                            <li class="current-dropdown"><a href="accessories.php">Shop</a></li>
                                        <?php else: ?>
                                            <li class="current-dropdown"><a href="subscription.php">Subscription</a></li>
                                        <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- Main Menu End-->


                    <div class="right-box">
                        <div class="btn">                         
                            <?php
                            if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == 1) {
                                // User is logged in, show "Profile" button
                                echo '<a href="profile.php" class="header-btn-two btn-anim" style="display: flex; align-items: center; gap: 8px; padding: 10px 20px;">
                                        <div class="icon" style="display: flex; align-items: center;">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_147_6490)">
                                                    <path d="M7.99998 9.01221C3.19258 9.01221 0.544983 11.2865 0.544983 15.4161C0.544983 15.7386 0.806389 16.0001 1.12892 16.0001H14.871C15.1935 16.0001 15.455 15.7386 15.455 15.4161C15.455 11.2867 12.8074 9.01221 7.99998 9.01221ZM1.73411 14.8322C1.9638 11.7445 4.06889 10.1801 7.99998 10.1801C11.9311 10.1801 14.0362 11.7445 14.2661 14.8322H1.73411Z" fill="white"/>
                                                    <path d="M7.99999 0C5.79171 0 4.12653 1.69869 4.12653 3.95116C4.12653 6.26959 5.86415 8.15553 7.99999 8.15553C10.1358 8.15553 11.8735 6.26959 11.8735 3.95134C11.8735 1.69869 10.2083 0 7.99999 0ZM7.99999 6.98784C6.50803 6.98784 5.2944 5.62569 5.2944 3.95134C5.2944 2.3385 6.43231 1.16788 7.99999 1.16788C9.54259 1.16788 10.7056 2.36438 10.7056 3.95134C10.7056 5.62569 9.49196 6.98784 7.99999 6.98784Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_147_6490">
                                                        <rect width="16" height="16" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <span style="white-space: nowrap;">Profile</span>
                                    </a>';
                            } else {
                                // User is not logged in, show "Sign In" button
                                echo '<a href="login.php" class="header-btn-two btn-anim" style="display: flex; align-items: center; gap: 8px; padding: 10px 20px;">
                                        <div class="icon" style="display: flex; align-items: center;">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_147_6490)">
                                                    <path d="M7.99998 9.01221C3.19258 9.01221 0.544983 11.2865 0.544983 15.4161C0.544983 15.7386 0.806389 16.0001 1.12892 16.0001H14.871C15.1935 16.0001 15.455 15.7386 15.455 15.4161C15.455 11.2867 12.8074 9.01221 7.99998 9.01221ZM1.73411 14.8322C1.9638 11.7445 4.06889 10.1801 7.99998 10.1801C11.9311 10.1801 14.0362 11.7445 14.2661 14.8322H1.73411Z" fill="white"/>
                                                    <path d="M7.99999 0C5.79171 0 4.12653 1.69869 4.12653 3.95116C4.12653 6.26959 5.86415 8.15553 7.99999 8.15553C10.1358 8.15553 11.8735 6.26959 11.8735 3.95134C11.8735 1.69869 10.2083 0 7.99999 0ZM7.99999 6.98784C6.50803 6.98784 5.2944 5.62569 5.2944 3.95134C5.2944 2.3385 6.43231 1.16788 7.99999 1.16788C9.54259 1.16788 10.7056 2.36438 10.7056 3.95134C10.7056 5.62569 9.49196 6.98784 7.99999 6.98784Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_147_6490">
                                                        <rect width="16" height="16" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <span style="white-space: nowrap;">Sign in</span>
                                    </a>';
                            }
                            ?>
                        </div>
                        <div class="mobile-navigation">
                            <a href="#nav-mobile" title="">
                                <svg width="22" height="11" viewBox="0 0 22 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="22" height="2" fill="white"/>
                                    <rect y="9" width="22" height="2" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
                    
        <div id="nav-mobile"></div>
        
	</header>
    <!-- End header-section -->

    <!-- BANNER SECTION -->

    <section class="drivons-banner-section-v1 banner-style-three">
        <div class="banner-content-three">
            <div class="drivons-container">
                <div class="banner-content">
                    <span class="wow fadeInUp"  data-wow-delay="2200ms">Feel free to explore and rent the perfect ride for every journey</span>
                    <h2 class="wow fadeInUp" data-wow-delay="2200ms">Find Your Perfect Car</h2>
                    <div class="form-tabs">
                        <div class="form-tab-content wow fadeInUp" data-wow-delay="2200ms">
                            <div class="form-tab-content">
                                <div class="form-tab-pane current" id="tab-1">
                                    <form>
                                        <div class="form_boxes line-r">
                                            <input type="text" name="pickup_location" placeholder=" Enter Pick-up Location" required>
                                        </div>
                                        <div class="form_boxes line-r">
                                            <input type="datetime-local" id="pickup_datetime" name="pickup_datetime" required>
                                            <span class="custom-icon" onclick="openDateTimePicker1()"></span>
                                        </div>
                                        <div class="form_boxes line-r">
                                            <input type="text" name="dropoff_location" placeholder="Enter Drop-off Location" required>
                                        </div>
                                        <div class="form_boxes line-r">
                                            <input type="datetime-local" id="pickup_datetime2" name="dropoff_datetime" required>
                                            <span class="custom-icon2" onclick="openDateTimePicker2()"></span>
                                        </div>
                                        <div class="form-submit">
                                            <button type="submit" class="theme-btn"><i class="flaticon-search"></i>Search</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <span class="cartype wow fadeInUp" data-wow-delay="2500ms">Choose a wide range of cars from Drivons </span>
                                <ul class="model-links wow fadeInUp" data-wow-delay="2500ms">
                                    <li>
                                        <a href="#" title="">
                                            <i class="flaticon-car"></i>
                                            SUV
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="flaticon-car-1"></i>
                                            Sedan
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="flaticon-van"></i>
                                            Hatchback
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="flaticon-convertible-car"></i>
                                            Coupe
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="flaticon-electric-car-1"></i>
                                            Hybrid
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="">
                                            <i class="flaticon-electric-car-2"></i>
                                            EV
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BANNER SECTION END -->

    <!-- Run Start -->
    <section class="run">
        <div class="marquee">
            <div class="marquee-content">
                <span>SUV</span>
                <span class="spacer">—</span>
                <span>Sedan</span>
                <span class="spacer">—</span>
                <span>Hatchback</span>
                <span class="spacer">—</span>
                <span>Coupe</span>
                <span class="spacer">—</span>
                <span>Hybrid</span>
                <span class="spacer">—</span>
                <span>EV</span>
                <span class="spacer">—</span>
                <!-- Duplicate content for smooth looping -->
                <span>SUV</span>
                <span class="spacer">—</span>
                <span>Sedan</span>
                <span class="spacer">—</span>
                <span>Hatchback</span>
                <span class="spacer">—</span>
                <span>Coupe</span>
                <span class="spacer">—</span>
                <span>Hybrid</span>
                <span class="spacer">—</span>
                <span>EV</span>
                <span class="spacer">—</span>
                <!-- Duplicate content for smooth looping -->
                <span>SUV</span>
                <span class="spacer">—</span>
                <span>Sedan</span>
                <span class="spacer">—</span>
                <span>Hatchback</span>
                <span class="spacer">—</span>
                <span>Coupe</span>
                <span class="spacer">—</span>
                <span>Hybrid</span>
                <span class="spacer">—</span>
                <span>EV</span>
            </div>
        </div>
    </section>
    <!-- Run End -->

    <!-- why choose us section -->
    <section class="why-choose-us-section-four">
        <div class="drivons-container">
            <div class="drivons-title text-center wow fadeInUp">
                <h2 class="title">Why Choose Us?</h2>
            </div>
            <div class="row wow fadeInUp">
                <!-- choose-us-block -->
                <div class="choose-us-block-four col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                        <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="51" height="60" viewBox="0 0 51 60" fill="none">
                            <g clip-path="url(#clip0_24_628)">
                                <path d="M22.9688 52.9676C22.9688 52.732 22.827 52.5195 22.6096 52.4289C20.0682 51.3695 18.2812 48.8627 18.2812 45.9375V23.4375C18.2812 20.5123 20.0682 18.0054 22.6096 16.9461C22.827 16.8555 22.9688 16.6429 22.9688 16.4074V16.4062H18.2812C14.398 16.4062 11.25 19.5543 11.25 23.4375V45.9375C11.25 49.8207 14.398 52.9688 18.2812 52.9688H22.9688V52.9676Z" fill="#EEF1FB"/>
                                <path d="M23.3708 41.3167L36.6292 28.0583" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M30 21.0938L44.0625 2.34375" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.9375 2.34375L25.3895 12.9483" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M48.75 30V23.4375C48.75 19.5543 45.602 16.4062 41.7188 16.4062H38.0747C36.4508 13.6159 33.4612 11.7188 30 11.7188C26.5388 11.7188 23.5493 13.6159 21.9253 16.4062H18.2812C14.398 16.4062 11.25 19.5543 11.25 23.4375V45.9375C11.25 49.8207 14.398 52.9688 18.2812 52.9688H21.9253C23.5492 55.7591 26.5388 57.6562 30 57.6562C33.4612 57.6562 36.4507 55.7591 38.0747 52.9688H41.7188C45.602 52.9688 48.75 49.8207 48.75 45.9375V39.375" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_24_628">
                                <rect width="51" height="60" fill="white"/>
                                </clipPath>
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
                <div class="choose-us-block-four col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="100ms">
                        <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <path d="M30 2.34375V7.03125" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M48.75 2.34375L44.0625 7.03125" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15.4738 36.6607C14.3072 35.4056 13.5938 33.7236 13.5938 31.875C13.5938 30.7464 13.8596 29.68 14.3323 28.7347L19.0198 19.3597C20.1732 17.0529 22.5579 15.4688 25.3125 15.4688H18.2812C15.5266 15.4688 13.142 17.0529 11.9885 19.3597L7.30102 28.7347C6.8284 29.68 6.5625 30.7464 6.5625 31.875C6.5625 33.7236 7.27594 35.4056 8.44254 36.6607L26.5658 56.1592C27.4218 57.0802 28.6436 57.6562 30 57.6562C31.3564 57.6562 32.5782 57.0802 33.4342 56.1593L33.5156 56.0716L15.4738 36.6607Z" fill="#EEF1FB"/>
                            <path d="M48.0115 19.3597L52.699 28.7347C53.1716 29.6798 53.4375 30.7464 53.4375 31.875C53.4375 33.7236 52.7241 35.4057 51.5575 36.6608L33.4342 56.1593C32.5782 57.0802 31.3564 57.6562 30 57.6562C28.6436 57.6562 27.4218 57.0802 26.5658 56.1593L8.44254 36.6608C7.27594 35.4057 6.5625 33.7236 6.5625 31.875C6.5625 30.7464 6.8284 29.6798 7.30102 28.7347L11.9885 19.3597C13.142 17.0528 15.5266 15.4688 18.2812 15.4688H41.7188C44.4734 15.4688 46.858 17.0528 48.0115 19.3597Z" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.25 2.34375L15.9375 7.03125" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17.3849 29.5312H42.6151" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.3125 24.8438L30 29.5312L34.6875 24.8438" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M30 43.5938V29.7306" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="content-box">
                            <h6 class="title">Trusted Car Dealership</h6>
                            <div class="text">"With a history of happy customers, we offer reliable vehicles and a seamless and trustworthy buying experience."</div>
                        </div>
                    </div>
                </div>
                <!-- choose-us-block -->
                <div class="choose-us-block-four col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <g clip-path="url(#clip0_24_681)">
                            <path d="M8.75576 36.7478L35.3054 10.198C37.136 8.36741 40.104 8.36741 41.9346 10.198L36.8955 5.15894C35.0649 3.32837 32.097 3.32837 30.2664 5.15894L3.71671 31.7087C1.88613 33.5393 1.88613 36.5073 3.71671 38.3378L8.75576 43.3768C6.92518 41.5462 6.92518 38.5783 8.75576 36.7478Z" fill="#EEF1FB"/>
                            <path d="M50.1537 18.4171C51.9843 20.2477 51.9843 23.2157 50.1537 25.0463L23.6039 51.5959C21.7734 53.4265 18.8054 53.4265 16.9748 51.5959L3.71671 38.3378C1.88613 36.5072 1.88613 33.5392 3.71671 31.7086L30.2664 5.15894C32.097 3.32836 35.0649 3.32836 36.8955 5.15894L43.5247 11.7881L52.9689 2.34387" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.9633 31.0458C18.7631 32.4554 19.2051 33.9388 20.2894 35.0231C22.12 36.8537 25.088 36.8537 26.9186 35.0231C28.7492 33.1926 28.7492 30.2246 26.9186 28.394C25.088 26.5634 25.088 23.5954 26.9186 21.7648C28.7492 19.9342 31.7172 19.9342 33.5478 21.7648C34.6321 22.8491 35.0741 24.3325 34.8739 25.7421" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.9749 38.3378L20.2894 35.0232" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M33.5476 21.765L36.8621 18.4504" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M43.5938 57.6562L57.6563 43.5937" stroke="#FF5CF4" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_24_681">
                            <rect width="60" height="60" fill="white"/>
                            </clipPath>
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
                <div class="choose-us-block-four col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                        <div class="icon-box"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                            <path d="M23.5465 4.45312C19.8452 4.45312 16.4904 6.63082 14.9836 10.0114L8.88656 23.6906C5.23148 23.9418 2.34375 26.9843 2.34375 30.7031V36.0938C2.34375 39.3298 4.96711 41.9531 8.20312 41.9531H9.80918C9.81785 41.5022 9.82934 41.0514 9.84375 40.6005C9.4623 39.823 9.24727 38.949 9.24727 38.0245L9.14062 33.8672C9.14062 30.7927 9.76617 29.6094 12.0483 29.1497C13.1331 28.9311 14.0413 28.192 14.4858 27.1786L22.0148 10.0114C23.5215 6.63082 26.8764 4.45312 30.5777 4.45312H23.5465Z" fill="#EEF1FB"/>
                            <path d="M8.20312 41.9531C4.96711 41.9531 2.34375 39.3298 2.34375 36.0938V30.7031C2.34375 26.9843 5.23148 23.9418 8.88656 23.6906L14.9836 10.0114C16.4903 6.63082 19.8451 4.45312 23.5465 4.45312H34.2217C37.7441 4.45312 40.9692 6.4275 42.5711 9.56461L45.5859 15.4688M57.6562 30.7031C57.6562 26.8199 54.5082 23.6719 50.625 23.6719H18.6328M28.2422 15.4688V4.57031M32.4609 41.9531H27.1873M20.742 37.2656C18.1532 37.2656 16.0545 39.3643 16.0545 41.9531C16.0545 44.5419 18.1532 46.6406 20.742 46.6406C23.3307 46.6406 25.4295 44.5419 25.4295 41.9531C25.4295 39.3643 23.3309 37.2656 20.742 37.2656Z" stroke="#405FF2" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M57.6562 41.6016C57.6562 46.0997 54.0098 49.8047 49.5117 49.8047C45.0136 49.8047 41.3672 46.1583 41.3672 41.6602C41.3672 37.162 45.0722 33.5156 49.5703 33.5156M43.5352 48.1055L36.0938 55.5469" stroke="#FF5CF3" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
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
    </section>
    <!-- End why choose us section -->

    <!-- brand-drivons-banner-section -->
    <section class="brand-drivons-banner-section">
        <div class="drivons-container">
            <div class="row">
                <div class="content-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp" data-wow-delay="200ms">
                        <h2 class="title">Easy Access – Go Straight to Our Inventory</h2>
                        <a href="inventory.php" class="btn">Find Out More<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                            <g clip-path="url(#clip0_634_2178)">
                              <path d="M14.1109 0H5.55533C5.34037 0 5.16643 0.173943 5.16643 0.388901C5.16643 0.603859 5.34037 0.777802 5.55533 0.777802H13.1721L0.613697 13.3362C0.461775 13.4881 0.461775 13.7342 0.613697 13.8861C0.68964 13.962 0.789171 14 0.888666 14C0.988161 14 1.08766 13.962 1.16363 13.8861L13.722 1.3277V8.94447C13.722 9.15943 13.8959 9.33337 14.1109 9.33337C14.3259 9.33337 14.4998 9.15943 14.4998 8.94447V0.388901C14.4998 0.173943 14.3258 0 14.1109 0Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_634_2178">
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
    <!-- End brand banner section -->

    <!-- dealership-section -->
    <section class="dealership-section pt-0">
        <div class="drivons-container wow fadeInUp">
            <div class="drivons-title">
                <h2>Drivons Dealership</h2>
            </div>
            <div class="row">
                <!-- dealership-block -->
                <div class="dealership-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/dealer1-1.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box wow fadeInUp" data-wow-delay="300ms">
                            <h6 class="title "><a href="inventory.php">Browse Inventory</a></h6>
                            <div class="text">Explore our wide range of rental cars to find the perfect ride for your journey.</div>
                            <a href="inventory.php" class="read-more">View<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                <g clip-path="url(#clip0_669_4430)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"></path>
                                    </g>
                                    <defs>
                                    <clippath id="clip0_669_4430">
                                        <rect width="14" height="14" fill="white"></rect>
                                    </clippath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                 <!-- dealership-block -->
                 <div class="dealership-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms"">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/dealer1-2.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box wow fadeInUp" data-wow-delay="300ms">
                            <h6 class="title"><a href="#">Services</a></h6>
                            <div class="text">Enjoy top-notch maintenance and support for a smooth and hassle-free rental experience.</div>
                            <a href="contact.php" class="read-more">View<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                <g clip-path="url(#clip0_669_4430)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"></path>
                                    </g>
                                    <defs>
                                    <clippath id="clip0_669_4430">
                                        <rect width="14" height="14" fill="white"></rect>
                                    </clippath>
                                    </defs>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dealership-block -->
                <div class="dealership-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms"">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/resource/dealer1-3.jpg" alt=""></a></figure>
                        </div>
                        <div class="content-box wow fadeInUp" data-wow-delay="300ms">
                            <h6 class="title"><a href="#">Financing</a></h6>
                            <div class="text">Flexible payment options to make your car rental more affordable and convenient.</div>
                            <a href="contact.php" class="read-more">View<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                <g clip-path="url(#clip0_669_4430)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"></path>
                                    </g>
                                    <defs>
                                    <clippath id="clip0_669_4430">
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
    </section>
    <!-- End dealership-section -->



    <!-- pricing section two -->
    <section class="drivons-pricing-section-two pt-0 pb-0">
        <div class="drivons-container">
            <div class="row">
                <!-- content-column -->
                <div class="content-column  wow fadeInUp col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-column wow fadeInUp" data-wow-delay="200ms">
                        <div class="drivons-title">
                                <h2>About Us - Anytime, Anywhere</h2>
                                <div class="text">Discover who we are and why we’re the trusted name in car rentals <br>
                                    and sales. With a focus on customer satisfaction, we offer a seamless <br>
                                    experience online and in-person. <br><br>Browse our extensive inventory from multiple brands, and choose the <br>
                                    perfect vehicle with ease. Whether you prefer the convenience of<br>
                                    buying online through Click & Drive or visiting one of our dealerships, <br>
                                    we're here to serve you every step of the way.</div>
                        </div>
                        <a href="about.php" class="read-more">Know More<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <g clip-path="url(#clip0_669_4430)">
                                <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_669_4430">
                                    <rect width="14" height="14" fill="white"/>
                                </clipPath>
                            </defs>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- image-column -->
                <div class="image-column col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-column wow fadeInUp">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/about1.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End pricing section -->

    <!-- drivons-brand-section-three -->
    <section class="drivons-brand-section-four">
        <div class="drivons-container  wow fadeInUp">
            <div class="drivons-title text-center">
                <h2>Cars We Provide</h2>
            </div>
            <div class="right-box">
                <!-- brand-block-four -->
                <div class="brand-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <i class="flaticon-car"></i>
                        </div>
                        <h6 class="title"><a href="#">SUV</a></h6>
                    </div>
                </div>
                <!-- brand-block-four -->
                <div class="brand-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <i class="flaticon-car-1"></i>
                        </div>
                        <h6 class="title"><a href="#">Sedan</a></h6>
                    </div>
                </div>
                <!-- brand-block-four -->
                <div class="brand-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <i class="flaticon-van"></i>
                        </div>
                        <h6 class="title"><a href="#">Hatchback</a></h6>
                    </div>
                </div>
                <!-- brand-block-four -->
                <div class="brand-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <i class="flaticon-convertible-car"></i>
                        </div>
                        <h6 class="title"><a href="#">Coupe</a></h6>
                    </div>
                </div>
                <!-- brand-block-four -->
                <div class="brand-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <i class="flaticon-electric-car-1"></i>
                        </div>
                        <h6 class="title"><a href="#">Hybrid</a></h6>
                    </div>
                </div>
                <!-- brand-block-four -->
                <div class="brand-block-four">
                    <div class="inner-box">
                        <div class="icon-box">
                            <i class="flaticon-electric-car-2"></i>
                        </div>
                        <h6 class="title"><a href="#">Electric</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End drivons-brand-section-three -->



    <!-- drivons-banner-section-two -->
    <section class="drivons-banner-section-seven">
        <div class="banner-slider-v7 wow fadeInUp">
            <div class="inner-box">
                <div class="large-container">
                    <div class="banner-slide">
                        <img src="images/resource/img1.jpg" alt="">
                        <div class="right-box">
                            <div class="drivons-container">
                                <div class="content-box">
                                    <span class="sub-title" data-animation-in="fadeInDown">Unlock the Road to Freedom.</span>
                                    <h1 data-animation-in="fadeInUp" data-delay-in="0.2">Tailored Car Rentals for<br>Your Perfect Trip.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-box">
                <div class="large-container">
                    <div class="banner-slide">
                        <img src="images/resource/index1.jpg" alt="">
                        <div class="right-box">
                            <div class="drivons-container">
                                <div class="content-box">
                                    <span class="sub-title" data-animation-in="fadeInDown">Book fast, drive easy</span>
                                    <h1 data-animation-in="fadeInUp" data-delay-in="0.2">Find the Perfect Ride for<br>Every Journey</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-box">
                <div class="large-container">
                    <div class="banner-slide">
                        <img src="images/resource/index3.jpg" alt="">
                        <div class="right-box">
                            <div class="drivons-container">
                                <div class="content-box">
                                    <span class="sub-title" data-animation-in="fadeInDown">Your perfect ride awaits.</span>
                                    <h1 data-animation-in="fadeInUp" data-delay-in="0.2">Luxury, Comfort, and Convenience<br>on Wheels</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-box">
                <div class="large-container">
                    <div class="banner-slide">
                        <img src="images/resource/index4.jpg" alt="">
                        <div class="right-box">
                            <div class="drivons-container">
                                <div class="content-box">
                                    <span class="sub-title" data-animation-in="fadeInDown">Drive with confidence.</span>
                                    <h1 data-animation-in="fadeInUp" data-delay-in="0.2">Seamless Car Rentals for<br>Every Destination</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-box">
                <div class="large-container">
                    <div class="banner-slide">
                        <img src="images/resource/index7.jpg" alt="">
                        <div class="right-box">
                            <div class="drivons-container">
                                <div class="content-box">
                                    <span class="sub-title" data-animation-in="fadeInDown">Adventure Awaits.</span>
                                    <h1 data-animation-in="fadeInUp" data-delay-in="0.2">Choose Your Ride, and<br>Go Beyond.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End drivons-banner-section -->

    <!-- blog section -->
    <div class="blog-section">
        <div class="drivons-container">
            <div class="drivons-title wow fadeInUp">
                <h2>Latest Blog Posts</h2>
            </div>
            <div class="row">
                <!-- blog-block -->
                <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/auto.1.jpg" alt=""></a></figure>
                            <span class="date">news</span>
                        </div>
                        <div class="content-box">
                            <ul class="post-info">
                                <li>Sakshi Nikam</li>
                                <li>April 16, 2024</li>
                            </ul>
                            <h6 class="title"><a href="blog-sakshi.php" title="">Why Regular Auto Detailing is Important</a></h6>
                        </div>
                    </div>
                </div>
                <!-- blog-block -->
                <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="100ms">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/det1.jpg" alt=""></a></figure>
                            <span class="date">news</span>
                        </div>
                        <div class="content-box">
                            <ul class="post-info">
                                <li>Jigisha Bharambe</li>
                                <li>June 14, 2023</li>
                            </ul>
                            <h6 class="title"><a href="blog-jigisha.php" title="">The Best Car Detailing Products for 2025</a></h6>
                        </div>
                    </div>
                </div>
                <!-- blog-block -->
                <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/blog4-4.jpg" alt=""></a></figure>
                            <span class="date">news</span>
                        </div>
                        <div class="content-box">
                            <ul class="post-info">
                                <li>Sayali Kelkar</li>
                                <li>September 22, 2022</li>
                            </ul>
                            <h6 class="title"><a href="blog-sayali.php" title="">How to Detail Your Car Like a Professional</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End blog-section -->

    <!-- tesla -->
    <section class="fun-section">
        <div class="fun-container">
            <div class="fun-content">
                <h1 class="fun-heading">We’ve got an exciting Fun for you!</h1>
                <button class="fun-button" onclick="window.location.href='tesla.html'">Start Now</button>
            </div>
        </div>
    </section>
    <!-- tesla end -->
 
    <!-- brand section-three -->
    <section class="drivons-brand-section-three">
        <div class="large-container">
            <div class="right-box">
                <div class="row ">
                    <div class="content-column col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-column">
                            <div  class="drivons-title wow fadeInUp" data-wow-delay="300ms">
                                <h2>Explore Top Car Dealers</h2>
                                <div class="text">
                                    Discover reliable dealerships with unbeatable selections, exclusive deals, and top-quality service.
                                </div>
                                <a href="dealer.php" class="brand-btn">Show All  Dealers<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_771_3204)">
                                    <path d="M13.6106 0H5.05509C4.84013 0 4.66619 0.173943 4.66619 0.388901C4.66619 0.603859 4.84013 0.777802 5.05509 0.777802H12.6719L0.113453 13.3362C-0.0384687 13.4881 -0.0384687 13.7342 0.113453 13.8861C0.189396 13.962 0.288927 14 0.388422 14C0.487917 14 0.587411 13.962 0.663391 13.8861L13.2218 1.3277V8.94447C13.2218 9.15943 13.3957 9.33337 13.6107 9.33337C13.8256 9.33337 13.9996 9.15943 13.9996 8.94447V0.388901C13.9995 0.173943 13.8256 0 13.6106 0Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_771_3204">
                                        <rect width="14" height="14" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="image-column wow fadeInUp col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-column">
                            <div class="image-box">
                                <figure class="image"><a href="#"><img src="images/resource/brandf.png" alt=""></a></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End brand section-three -->


    <!-- two-cars section  -->
    <section class="blog-section-three">
        <div class="drivons-container">
            <div class="row">
                <!-- blog-blockt-three -->
                <div class="blog-blockt-three home9 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-in="300ms">
                        <div class="hover-img">
                            <figure class="image"><a href="#"><img src="images/resource/index_left.jpg" alt=""></a></figure>
                            <div class="content-box">
                                <h3 class="title">Have Questions<br>About Our Services?</h3>
                                <div class="text">We're dedicated to providing clear, helpful answers to ensure you have the best experience with us.</div>
                                <a href="faq.php" class="read-more">Get Answers
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_692)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"></path>
                                    </g>
                                    <defs>
                                    <clippath id="clip0_601_692">
                                    <rect width="14" height="14" fill="white"></rect>
                                    </clippath>
                                    </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- blog-blockt-three -->
                <div class="blog-blockt-three home9 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box two wow fadeInUp" data-wow-delay="300ms">
                        <div class="hover-img">
                            <figure class="image"><a href="#"><img src="images/resource/index_right.jpg" alt=""></a></figure>
                            <div class="content-box">
                                <h3 class="title">Want to Know Our <br>Terms and Conditions?</h3>
                                <div class="text">We are committed to transparency and ensuring a smooth experience with clear guidelines and policies.
                                </div>
                                <a href="terms.php" class="read-more">Check Terms
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <g clip-path="url(#clip0_601_692)">
                                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0_601_692">
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
    <!-- two-cars section end -->


    <!-- cars_listing -->
    <section class="cars-section-three pt-0">
        <div class="drivons-container">
            <div class="drivons-title wow fadeInUp">
                <h2>Cars Listing</h2>
                <a href="inventory.php" class="btn-title">View All<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <g clip-path="url(#clip0_601_243)">
                    <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="#050B20"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_601_243">
                    <rect width="14" height="14" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                </a>
            </div>
            <div class="row car-slider-three wow fadeInUp" data-wow-delay="200ms" data-preview="4">
                <!-- car-block-three -->
                <div class="car-block-three col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box two">
                            <figure class="image"><a href="#"><img src="images/carsin/city1.jpg" alt=""></a></figure>
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
                            <h6 class="title"><a href="p-city.php">Honda City-Sedan</a></h6>
                            <div class="text">1.5L Petrol, VX, 6-speed Manual Sedan</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>60,000 miles</li>
                                <li><i class="flaticon-speedometer"></i>Petrol</li>
                                <li><i class="flaticon-gearbox"></i>Manual</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;3,000/day</span>
                                <small>&#8377;2,400/day</small>
                                <a href="p-city.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
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
                <!-- car-block-three -->
                <div class="car-block-three col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="m-scorpio.php"><img src="images/carsin/scorpio1.jpg" alt=""></a></figure>
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
                <!-- car-block-three -->
                <div class="car-block-three col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="inner-box">
                            <div class="image-box">
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
                                <h6 class="title"><a href="p-kiger.php">Renault Kiger-SUV</a></h6>
                                <div class="text">1.0L Turbo Petrol, RXZ, 5-speed Manual...</div>
                                <ul>
                                    <li><i class="flaticon-gasoline-pump"></i>18,350 miles</li>
                                    <li><i class="flaticon-speedometer"></i>Petrol</li>
                                    <li><i class="flaticon-gearbox"></i>Manual</li>
                                </ul>
                                <div class="btn-box">
                                    <span style="text-decoration: line-through;">&#8377;2,600/day</span>
                                    <small>&#8377;2,000/day</small>
                                    <a href="p-kiger.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
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
                <!-- car-block-three -->
                <div class="car-block-three col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="inner-box">
                            <div class="image-box two">
                                <figure class="image"><a href="#"><img src="images/carsin/brz1.jpg" alt=""></a></figure>
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
                                <h6 class="title"><a href="p-brz.php">Subaru BRZ-Coupe</a></h6>
                                <div class="text">2.4L Petrol, Premium, 6-speed Manual S...</div>
                                <ul>
                                    <li><i class="flaticon-gasoline-pump"></i>14,500 miles</li>
                                    <li><i class="flaticon-speedometer"></i>Petrol</li>
                                    <li><i class="flaticon-gearbox"></i>Manual</li>
                                </ul>
                                <div class="btn-box">
                                    <span style="text-decoration: line-through;">&#8377;5,200/day</span>
                                    <small>&#8377;3,700/day</small>
                                    <a href="p-brz.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
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
                <!-- car-block-three -->
                <div class="car-block-three col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="inner-box">
                            <div class="image-box two">
                                <figure class="image"><a href="#"><img src="images/carsin/kwid1.jpg" alt=""></a></figure>
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
                                <h6 class="title"><a href="na-kwid.php">Renault Kwid-Hatchback</a></h6>
                                <div class="text">0.8L Petrol, RXE, 5-speed Manual...</div>
                                <ul>
                                    <li><i class="flaticon-gasoline-pump"></i>34,600 miles</li>
                                    <li><i class="flaticon-speedometer"></i>Petrol</li>
                                    <li><i class="flaticon-gearbox"></i>Manual</li>
                                </ul>
                                <div class="btn-box">
                                    <span style="text-decoration: line-through;">&#8377;2,400/day</span>
                                    <small>&#8377;1,800/day</small>
                                    <a href="na-kwid.php" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
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
                <!-- car-block-three -->
                <div class="car-block-three col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="images/carsin/ciaz1.jpg" alt=""></a></figure>
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
                            <h6 class="title"><a href="#">Maruti Suzuki Ciaz-Sedan</a></h6>
                            <div class="text">1.5L Petrol, ZXI+, 5-speed Manual Sedan</div>
                            <ul>
                                <li><i class="flaticon-gasoline-pump"></i>48,254 miles</li>
                                <li><i class="flaticon-speedometer"></i>Petrol</li>
                                <li><i class="flaticon-gearbox"></i>Manual</li>
                            </ul>
                            <div class="btn-box">
                                <span style="text-decoration: line-through;">&#8377;2,900/day</span>
                                <small>&#8377;2,400/day</small>
                                <a href="#" class="details">View Details<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
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
    <!-- End cars_listing section two -->

    <!-- pricing section -->
    <section class="drivons-pricing-section pb-0 pt-0">
        <div class="large-container">
            <div class="row g-0">
                <!-- image-column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box wow fadeInUp">
                            <figure class="image"><a href="#"><img src="images/resource/about.jpg" alt=""></a></figure>
                        </div>
                    </div>
                </div>
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                    <div class="drivons-title wow fadeInUp">
                            <h2>Subscribe Now for the Best Convenience</h2>
                            <div class="text">Get access to exclusive offers, priority bookings, and round-the-clock support tailored to your needs.</div>
                    </div>
                    <ul class="list-style-one wow fadeInUp" data-wow-delay="100ms">
                            <li><i class="fa-solid fa-check"></i>Competitive pricing with flexible plans</li>
                            <li><i class="fa-solid fa-check"></i>24/7 roadside assistance for your peace of mind</li>
                            <li><i class="fa-solid fa-check"></i>Comprehensive insurance coverage included</li>
                            <li><i class="fa-solid fa-check"></i>Access to exclusive deals and benefits</li>
                            <li><i class="fa-solid fa-check"></i>Fast and reliable service whenever you need it</li>
                    </ul>
                    <a href="subscription.php" class="read-more wow fadeInUp" data-wow-delay="200ms">get premium<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
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
    </section>
    <!-- End pricing section -->

    <!-- blog-section-two -->
    <section class="blog-section-two pt-0">
        <div class="drivons-container">
            <div class="row">
                <!-- blog-blockt-two -->
                <div class="blog-blockt-two col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="300ms">
                        <h3 class="title">Discover our range <br>of Hybrid Cars !</h3>
                        <div class="text">Explore our collection, including Hybrid Cars for a smarter drive.</div>
                        <a href="inventory.php" class="read-more">Explore Cars
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                            <g clip-path="url(#clip0_601_692)">
                            <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"></path>
                            </g>
                            <defs>
                            <clippath id="clip0_601_692">
                            <rect width="14" height="14" fill="white"></rect>
                            </clippath>
                            </defs>
                            </svg>
                        </a>
                        <div class="hover-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" viewbox="0 0 110 110" fill="none">
                                <path d="M43.1686 14.8242C36.3829 14.8242 30.2324 18.8167 27.4699 25.0145L16.292 50.093C9.59105 50.5534 4.29688 56.1314 4.29688 62.9492V75.8398C4.29688 81.7725 9.10637 86.582 15.0391 86.582H17.9835C17.9994 85.7553 18.0204 84.9288 18.0469 84.1023C17.3476 82.6768 16.9533 81.0745 16.9533 79.3796L16.7578 71.7578C16.7578 66.1212 17.9046 60.9441 22.0885 60.1012C24.0773 59.7006 25.7424 58.3456 26.5573 56.4876L40.3605 25.0145C43.1228 18.8167 49.2733 14.8242 56.0592 14.8242H43.1686Z" fill="#CEE1F2"></path>
                                <path d="M94.9609 86.582C100.894 86.582 105.703 81.7725 105.703 75.8398V62.9492C105.703 55.8299 99.9318 50.0586 92.8125 50.0586L79.5736 24.2505C76.6474 18.4688 70.7184 14.8242 64.2383 14.8242H43.1686C36.3829 14.8242 30.2324 18.8167 27.4699 25.0145L16.292 50.093C9.59105 50.5534 4.29688 56.1314 4.29688 62.9492V75.8398C4.29688 81.7725 9.10637 86.582 15.0391 86.582" stroke="#405FF2" stroke-width="5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M38.0269 95.1758C42.7731 95.1758 46.6207 91.3282 46.6207 86.582C46.6207 81.8358 42.7731 77.9883 38.0269 77.9883C33.2807 77.9883 29.4332 81.8358 29.4332 86.582C29.4332 91.3282 33.2807 95.1758 38.0269 95.1758Z" stroke="#405FF2" stroke-width="5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M63.1641 86.582H49.8433" stroke="#405FF2" stroke-width="5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M71.9727 95.1758C76.7189 95.1758 80.5664 91.3282 80.5664 86.582C80.5664 81.8358 76.7189 77.9883 71.9727 77.9883C67.2265 77.9883 63.3789 81.8358 63.3789 86.582C63.3789 91.3282 67.2265 95.1758 71.9727 95.1758Z" stroke="#405FF2" stroke-width="5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M51.5608 66.8164L63.5304 55.2099C65.9362 52.8587 64.2729 48.7712 60.9101 48.7712H49.9475C46.5786 48.7712 44.9182 44.6705 47.3367 42.3234L59.7328 30.293" stroke="#FF5CF3" stroke-width="5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- blog-blockt-two -->
                <div class="blog-blockt-two col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box two wow fadeInUp" data-wow-delay="300ms">
                        <h3 class="title">Looking for the Best <br>Car Rental Deals?</h3>
                        <div class="text">We provide the best price range for your rental needs, offering great value and affordable options.</div>
                        <a href="inventory.php" class="read-more">Explore Cars
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
                            <g clip-path="url(#clip0_601_692)">
                            <path d="M13.6109 0H5.05533C4.84037 0 4.66643 0.173943 4.66643 0.388901C4.66643 0.603859 4.84037 0.777802 5.05533 0.777802H12.6721L0.113697 13.3362C-0.0382246 13.4881 -0.0382246 13.7342 0.113697 13.8861C0.18964 13.962 0.289171 14 0.388666 14C0.488161 14 0.587656 13.962 0.663635 13.8861L13.222 1.3277V8.94447C13.222 9.15943 13.3959 9.33337 13.6109 9.33337C13.8259 9.33337 13.9998 9.15943 13.9998 8.94447V0.388901C13.9998 0.173943 13.8258 0 13.6109 0Z" fill="white"></path>
                            </g>
                            <defs>
                            <clippath id="clip0_601_692">
                            <rect width="14" height="14" fill="white"></rect>
                            </clippath>
                            </defs>
                            </svg>
                        </a>
                        <div class="hover-img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" viewbox="0 0 110 110" fill="none">
                                <path d="M17.1875 84.2276V25.7724C17.1875 13.9118 26.779 4.29688 38.6109 4.29688H25.5664C13.7008 4.29688 4.08203 13.9156 4.08203 25.7812V84.2188C4.08203 96.0841 13.7008 105.703 25.5664 105.703H38.6109C26.779 105.703 17.1875 96.0882 17.1875 84.2276Z" fill="#CEE1F2"></path>
                                <path d="M72.4023 104.506C70.1826 105.281 67.7967 105.703 65.3125 105.703H25.7812C13.9156 105.703 4.29688 96.0841 4.29688 84.2188V25.7812C4.29688 13.9156 13.9156 4.29688 25.7812 4.29688H65.3125C77.1779 4.29688 86.7969 13.9156 86.7969 25.7812V48.3398M54.7852 82.2852H71.1133M21.4844 82.0703L25.4341 86.1614C27.1343 87.8681 29.8912 87.8681 31.5915 86.1614L39.7461 77.7734" stroke="#405FF2" stroke-width="5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M105.047 70.0629C100.32 68.2247 97.1951 67.9622 94.8535 67.9622C90.5029 67.9622 87.0117 71.489 87.0117 75.8398C87.0117 80.1906 90.9148 83.7175 96.6917 83.7175C101.681 83.7175 105.703 87.2444 105.703 91.5952C105.703 95.9458 101.961 99.4729 97.6106 99.4729C95.5763 99.4729 91.0458 98.8124 86.582 97.038M96.6797 67.9622V61.0156M96.6797 99.4727V105.703M57.793 57.793V59.5117M34.1602 57.793V59.5117" stroke="#FF5CF4" stroke-width="5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M68.5352 36.7383H68.1835C68.1734 36.7146 68.1661 36.6902 68.1557 36.6667L64.3038 28.1203C64.3002 28.1123 64.2967 28.1046 64.2931 28.0966C62.5023 24.1867 58.9291 21.3217 54.734 20.4329C52.2427 19.9053 49.1996 19.5508 45.8829 19.5508C42.6308 19.5508 39.6816 19.8928 37.2649 20.402C33.0507 21.2902 29.4639 24.1577 27.6706 28.0728C27.6669 28.0807 27.6635 28.0887 27.6598 28.0966L23.7974 36.6665C23.7869 36.6899 23.7798 36.7144 23.7697 36.7381H23.418C21.0448 36.7381 19.1211 38.6618 19.1211 41.0349C19.1211 43.4081 21.0448 45.3318 23.418 45.3318V49.303C23.418 54.8137 27.8339 59.2969 33.2617 59.2969H58.6912C64.1193 59.2969 68.5352 54.8137 68.5352 49.3032V45.332C70.9083 45.332 72.832 43.4083 72.832 41.0352C72.832 38.662 70.9083 36.7383 68.5352 36.7383ZM35.4885 31.6415C36.1541 30.1969 37.4799 29.1393 39.0369 28.8112C40.6093 28.4799 42.9015 28.1445 45.8831 28.1445C48.9326 28.1445 51.3212 28.4945 52.953 28.8402C54.4951 29.167 55.811 30.2227 56.4755 31.6654L58.7617 36.7383H33.1914L35.4885 31.6415ZM35.0195 53.0664C32.1718 53.0664 29.8633 50.7579 29.8633 47.9102C29.8633 45.0624 32.1718 42.7539 35.0195 42.7539C37.8673 42.7539 40.1758 45.0624 40.1758 47.9102C40.1758 50.7579 37.8673 53.0664 35.0195 53.0664ZM56.9336 53.0664C54.0858 53.0664 51.7773 50.7579 51.7773 47.9102C51.7773 45.0624 54.0858 42.7539 56.9336 42.7539C59.7813 42.7539 62.0898 45.0624 62.0898 47.9102C62.0898 50.7579 59.7813 53.0664 56.9336 53.0664Z" fill="#FF5CF4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-section-two -->

    <!-- drivons-service-section -->
    <section class="drivons-service-section pt-0">
        <div class="large-container">
            <div class="right-box">
                <div class="row">
                    <!-- content-column -->
                    <div class="content-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column wow fadeInUp" data-wow-delay="300ms">
                            <h2 class="title">"Get Ready: Our Mobile App is Launching Soon!"</h2>
                            <div class="text">
                                Experience the full power of our website on your mobile device. 
                                We’re working on an app that brings all our services right to your 
                                fingertips—coming soon for the ultimate on-the-go experience!
                            </div>
                            <div class="btn-box">
                                <a href="https://www.apple.com/app-store/" class="store">
                                    <img src="images/resource/apple.png">
                                    <span>Download on the</span>
                                    <h6 class="title">Apple Store</h6>
                                </a>
                                <a href="https://play.google.com/store/games?device=windows" class="store two">
                                    <img src="images/resource/play-2.png">
                                    <span>Get in on</span>
                                    <h6 class="title">Google Play</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- End service section -->



    <!-- drivons-testimonial-section-four -->
    <div class="drivons-testimonial-section-four v1 pt-0">
        <div class="large-container">
            <div class="right-box">
                <div class="drivons-title wow fadeInUp ">
                    <h2>What our customers say</h2>
                    <div class="text"> Showing our Clients Feedback</div>
                </div>
                <div class="row stories-slider wow fadeInUp" data-wow-delay="200ms">
                    <!-- testimonial-block-four -->
                    <div class="testimonial-block-four col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="icon"><a href="#"><img src="images/resource/comas.png" alt=""></a></figure>
                            <h6 class="title">Great Service</h6>
                            <div class="text"> “I rented a car for a family trip, and the experience was fantastic. The car was clean, well-maintained, and delivered on time. The support team was very responsive. Will definitely use again!”</div>
                            <div class="auther-info">
                                <figure class="image"><a href="#"><img src="images/resource/test-auther-1.jpg" alt=""></a></figure>
                                <h6 class="name">Priya Sharma</h6>
                                <span>Mumbai, India</span>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial-block-four -->
                    <div class="testimonial-block-four col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="icon"><a href="#"><img src="images/resource/comas.png" alt=""></a></figure>
                            <h6 class="title">Reliable and Affordable</h6>
                            <div class="text"> “I’ve used this service multiple times for both personal and business trips. The cars are always reliable, and the prices are very competitive. Excellent customer service!”</div>
                            <div class="auther-info">
                                <figure class="image"><a href="#"><img src="images/resource/test-auther-2.jpg" alt=""></a></figure>
                                <h6 class="name">Arjun Singh</h6>
                                <span>Nashik, India</span>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial-block-four -->
                    <div class="testimonial-block-four col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="icon"><a href="#"><img src="images/resource/comas.png" alt=""></a></figure>
                            <h6 class="title">Perfect for Long Trips</h6>
                            <div class="text"> “We rented a car for a long road trip, and it was a great decision. The car was comfortable, fuel-efficient, and had no issues throughout the journey. Highly satisfied!”</div>
                            <div class="auther-info">
                                <figure class="image"><a href="#"><img src="images/resource/test-auther-3.jpg" alt=""></a></figure>
                                <h6 class="name">Anjali Patel</h6>
                                <span>Pune, India</span>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial-block-four -->
                    <div class="testimonial-block-four col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="icon"><a href="#"><img src="images/resource/comas.png" alt=""></a></figure>
                            <h6 class="title">Great Service</h6>
                            <div class="text"> “I rented a car for a family trip, and the experience was fantastic. The car was clean, well-maintained, and delivered on time. The support team was very responsive. Will definitely use again!”</div>
                            <div class="auther-info">
                                <figure class="image"><a href="#"><img src="images/resource/test-auther-1.jpg" alt=""></a></figure>
                                <h6 class="name">Priya Sharma</h6>
                                <span>Mumbai, India</span>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial-block-four -->
                    <div class="testimonial-block-four col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="icon"><a href="#"><img src="images/resource/comas.png" alt=""></a></figure>
                            <h6 class="title">Reliable and Affordable</h6>
                            <div class="text"> “I’ve used this service multiple times for both personal and business trips. The cars are always reliable, and the prices are very competitive. Excellent customer service!”</div>
                            <div class="auther-info">
                                <figure class="image"><a href="#"><img src="images/resource/test-auther-2.jpg" alt=""></a></figure>
                                <h6 class="name">Arjun Singh</h6>
                                <span>Nashik, India</span>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial-block-four -->
                    <div class="testimonial-block-four col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="icon"><a href="#"><img src="images/resource/comas.png" alt=""></a></figure>
                            <h6 class="title">Perfect for Long Trips</h6>
                            <div class="text"> “We rented a car for a long road trip, and it was a great decision. The car was comfortable, fuel-efficient, and had no issues throughout the journey. Highly satisfied!”</div>
                            <div class="auther-info">
                                <figure class="image"><a href="#"><img src="images/resource/test-auther-3.jpg" alt=""></a></figure>
                                <h6 class="name">Anjali Patel</h6>
                                <span>Pune, India</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End drivons-testimonial-section-four -->

    <!-- game -->
                <div class="thrill-container">
                    <div class="thrill-content">
                        <h1 class="thrill-heading">Looking for Some Thrill?</h1>
                        <p class="thrill-subtext">Experience the ultimate ride! Are you ready for the game?</p>
                        <a href="traffic.html" class="start-game-btn">Start Game</a>
                    </div>
                </div>  
    <!-- game end -->



    <!-- drivons-testimonial-section-three -->
    <section class="drivons-testimonial-section-three pt-0 section-radius-bottom bg-white">
        <div class="large-container">
            <div class="right-box">
                <div class="row wow fadeInUp">
                    <!-- content-column -->
                    <div class="content-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="drivons-title light">
                                <h2>Who is Drivons ?</h2>
                                <div class="text">We are your trusted car rental service, offering the best price range with convenience.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- testimonial-block -->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="row">
                            <!-- testimonial-block-three -->
                            <div class="testimonial-block-three col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box">
                                    <div class="content-box">
                                        <span>Great</span>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <small>Based on 5,801 reviews</small>
                                        <figure class="image"><a href="#"><img src="images/resource/testi3-1.png" alt=""></a></figure>
                                    </div>
                                </div>
                            </div>
                             <!-- testimonial-block-three -->
                             <div class="testimonial-block-three col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box v2">
                                    <div class="content-box">
                                        <span>Great</span>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <small>Based on 5,482 reviews</small>
                                        <figure class="image"><a href="#"><img src="images/resource/testi3-2.png" alt=""></a></figure>
                                    </div>
                                </div>
                            </div>
                             <!-- testimonial-block-three -->
                             <div class="testimonial-block-three col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box v3">
                                    <div class="content-box">
                                        <span>Great</span>
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <small>Based on 6,012 reviews</small>
                                        <figure class="image"><a href="#"><img src="images/resource/testi3-3.png" alt=""></a></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End drivons-testimonial-section-three -->

    <?php include 'footer.php' ; ?>
    
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    // Show the pre-loader when the page starts loading
    window.addEventListener('load', function() {
        var loader = document.getElementById('loader');
        loader.style.visibility = 'visible'; // Show the loader

                setTimeout(function() {
            loader.style.visibility = 'hidden';
        }, 2000);     });
</script>
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>
<script src="js/datepicker.js"></script>
<script src="js/game.js"></script>
<script src="js/gameanim.js"></script>
<script src="js/tesla.js"></script>
<script src="js/thrill.js"></script>

</body>
</html>