<?php include 'session.php';
include 'dbcon.php'; // Ensure database connection is included

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details to display in the form
$query = "SELECT * FROM tblusers WHERE id='$user_id'";
$result = mysqli_query($con, $query);
$userData = mysqli_fetch_assoc($result);

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $contactNo = mysqli_real_escape_string($con, $_POST['mobile_no']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $country = mysqli_real_escape_string($con, $_POST['country']); // Use lowercase
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $updationDate = date("Y-m-d H:i:s");

    // Ensure column names match database
    $updateQuery = "UPDATE tblusers SET 
        username='$username', 
        email='$email', 
        dob='$dob', 
        ContactNo='$contactNo', 
        City='$city', 
        Country='$country', 
        Address='$address', 
        UpdationDate='$updationDate' 
        WHERE id='$user_id'";

    // Execute the query
    if (mysqli_query($con, $updateQuery)) {
        $_SESSION['updated'] = "Profile updated successfully.";
    } else {
        $_SESSION['noupdate'] = "Error updating profile: " . mysqli_error($con);
    }

    // Redirect back to profile page to avoid URL parameters
    header("Location: profile.php");
    exit();
}
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
</head>

<body class="body">

<div class="drivons-wrapper v2">

    <div id="loader">
        <img src="images/resource/car.gif"/>
    </div>

    <div id="custom-cursor"></div>
    

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

<?php include 'header1.php'; ?>
    <!-- dashboard-widget -->
    <section class="dashboard-widget-two">
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
                        <h3 class="title">Profile</h3>
                        <div class="text">Manage Your Profile & Prereferences.</div>
                        <?php if (isset($_SESSION['updated'])): ?>
                            <div class="alert alert-success" style="margin-top: 20px;">
                                <?php echo $_SESSION['updated']; unset($_SESSION['updated']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['noupdate'])): ?>
                            <div class="alert alert-danger" style="margin-top: 20px;">
                                <?php echo $_SESSION['noupdate']; unset($_SESSION['noupdate']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="gallery-sec">
                       
                        <div class="form-sec">
                        <form class="row" method="POST" action="">
                                <div class="col-lg-4">
                                    <div class="form_boxes">
                                        <label>User Name</label>
                                        <input name="name" type="text" value="<?php echo htmlspecialchars($userData['username'] ?? ''); ?>" required>                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_boxes">
                                        <label>Email</label>
                                        <input name="email" type="email" value="<?php echo htmlspecialchars($userData['email'] ?? ''); ?>" required>                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_boxes">
                                        <label>DOB</label>
                                        <input name="dob" type="date" value="<?php echo htmlspecialchars($userData['dob'] ?? ''); ?>" required>                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_boxes">
                                        <label>Phone</label>
                                        <input name="mobile_no" type="text" value="<?php echo htmlspecialchars($userData['ContactNo'] ?? ''); ?>" 
                                            required maxlength="10" pattern="[0-9]{10}" title="Enter a 10-digit phone number">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form_boxes">
                                        <label>City</label>
                                        <input name="city" type="text" value="<?php echo htmlspecialchars($userData['City'] ?? ''); ?>" required>                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_boxes">
                                        <label>Country</label>
                                        <input name="country" type="text" value="<?php echo htmlspecialchars($userData['Country'] ?? ''); ?>" required>                                    </div>
                                </div>
                                <div class="col-lg-12">
                                        <div class="form_boxes">
                                            <label>Address</label>
                                            <textarea name="address" required><?php echo htmlspecialchars($userData['Address'] ?? ''); ?></textarea>                                        </div>
                                    </div>
                                        <div class="form-submit">
                                            <button type="submit" class="theme-btn">Save Profile<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewbox="0 0 14 14" fill="none">
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
                                    
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End dashboard-widget -->

     <!-- main footer -->
     <footer class="drivons-footer footer-style-one v2">
        <!--  Footer Bottom -->
        <div class="footer-bottom">
            <div class="inner-container">
                <div class="copyright-text wow fadeInUp">© <a href="404.php">2025 Drivons.com. All rights reserved.</a></div>

                <ul class="footer-nav wow fadeInUp" data-wow-delay="200ms">
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="404.php">Privacy Notice</a></li>
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
        }, 1000);     });
</script>
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>
</body>
</html>