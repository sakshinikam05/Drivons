<?php
require 'dbcon.php';
if (isset($_POST['emailsubscibe'])) {
    require_once 'dbcon.php'; // Ensure your database connection file is included

    $subscriberemail = filter_var($_POST['subscriberemail'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($subscriberemail, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.');</script>";
    } else {
        // Use `?` instead of `:subscriberemail` for `mysqli`
        $sql = "SELECT 1 FROM tblsubscribers WHERE SubscriberEmail = ?";
        $query = $con->prepare($sql);
        $query->bind_param("s", $subscriberemail);
        $query->execute();
        $query->store_result(); // Store result to count rows

        if ($query->num_rows > 0) {
            echo "<script>alert('Already Subscribed.');</script>";
        } else {
            $sql = "INSERT INTO tblsubscribers (SubscriberEmail) VALUES (?)";
            $query = $con->prepare($sql);
            $query->bind_param("s", $subscriberemail);

            if ($query->execute()) {
                echo "<script>alert('Subscribed successfully.');</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        }
    }
}
?>
<!-- main footer -->   
<footer class="drivons-footer footer-style-one v1 cus-st-1">
    <div class="footer-top">
        <div class="drivons-container">
            <div class="right-box">
                <div class="top-left wow fadeInUp">
                    <h6 class="title">Join Drivons</h6>
                    <div class="text">Drive Your Freedom, Rent Your Adventure!</div>
                </div>
                <div class="subscribe-form wow fadeInUp" data-wow-delay="100ms">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <input type="email" name="subscriberemail" class="email" placeholder="Enter your E-mail address" required>
        <button type="submit" name="emailsubscibe" class="theme-btn btn-style-one hover-light">
            <span class="btn-title">Subscribe</span>
        </button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
    <div class="widgets-section">
        <div class="drivons-container">
            <div class="row">
                <!-- Footer COlumn -->
                <div class="footer-column-two col-lg-9 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget wow fadeInUp">
                                <h4 class="widget-title">Useful Links</h4>
                                <div class="widget-content">
                                    <ul class="user-links style-two">
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="blog.php">Blog</a></li>
                                        <li><a href="faq.php">FAQs</a></li>
                                        <li><a href="terms.php">Terms and Conditions</a></li>
                                    </ul>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget wow fadeInUp" data-wow-delay="100ms">
                                <h4 class="widget-title">Quick Links</h4>
                                <div class="widget-content">
                                    <ul class="user-links style-two">
                                        <li><a href="dealer.php">Dealers</a></li>
                                        <li><a href="inventory.php">Inventory</a></li>
                                        <li><a href="subscription.php">Membership Plans</a></li>
                                        <li><a href="index.php">Live Chats</a></li>
                                        <li><a href="contact.php">Help Center</a></li>
                                    </ul>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget wow fadeInUp" data-wow-delay="200ms">
                                <h4 class="widget-title">Our Dealers</h4>
                                <div class="widget-content">
                                    <ul class="user-links style-two">
                                        <li><a href="d1.php">Jalgaon</a></li>
                                        <li><a href="d0.php">Pune</a></li>
                                        <li><a href="d2.php">Navi Mumbai</a></li>
                                        <li><a href="d3.php">Sambhaji Nagar</a></li>
                                        <li><a href="d4.php">Mumbai</a></li>
                                        <li><a href="d5.php">Nashik</a></li>
                                        <li><a href="d6.php">Nagpur</a></li>
                                        <li><a href="d7.php">Thane</a></li>
                                    </ul>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget wow fadeInUp" data-wow-delay="300ms">
                                <h4 class="widget-title">Vehicles Type</h4>
                                <div class="widget-content">
                                    <ul class="user-links style-two">
                                        <li><a href="">SUVs</a></li>
                                        <li><a href="">Coupe</a></li>
                                        <li><a href="">Hatchback</a></li>
                                        <li><a href="">Sedan</a></li>
                                        <li><a href="">Hybrid</a></li>
                                        <li><a href="">Electric</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer column -->
                <div class="footer-column col-lg-3 col-md-6 col-sm-12 find-us-on">
                    <div class="footer-widget social-widget wow fadeInUp" data-wow-delay="400ms">
                        <div class="widget-content">
                            <h4 class="widget-title">Find Us On</h4>
                            <a href="https://www.apple.com/lae/app-store" class="store">
                                <img src="images/resource/apple.png">
                                <span>Download on the</span>
                                <h6 class="title">Apple Store</h6>
                            </a>
                            <a href="https://play.google.com" class="store two">
                                <img src="images/resource/play.png">
                                <span>Get in on</span>
                                <h6 class="title">Google Play</h6>
                            </a>
                            <div class="social-icons">
                                <h8 class="title">Connect With Us</h8>
                                <ul>
                                    <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://x.com"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://in.linkedin.com"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Footer Bottom -->
    <div class="footer-bottom">
        <div class="drivons-container">
            <div class="inner-container">
                <div class="copyright-text wow fadeInUp">© <a href="404.php">2025 Drivons.com. All rights reserved.</div>

                <ul class="footer-nav wow fadeInUp" data-wow-delay="100ms">
                    <li><a href="term.php">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Notice</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- End drivons-footer -->