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

 <!-- Main Header-->
	<header class="drivons-header header-style-v1 style-two inner-header cus-style-1">
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
                                echo '<a href="profile.php" class="header-btn-eight" style="display: flex; align-items: center; gap: 8px; padding: 10px 20px;">
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
                                echo '<a href="login.php" class="header-btn-eight" style="display: flex; align-items: center; gap: 8px; padding: 10px 20px;">
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
        <div id="nav-mobile"></div>
	</header>
    <!-- End header-section -->