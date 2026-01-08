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
            echo "<script>alert('Reply saved successfully!'); window.location.href='blog-sukhada.php';</script>";
        } else {
            echo "<script>alert('Error saving reply.'); window.location.href='blog-sukhada.php';</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Database error: " . $e->getMessage() . "'); window.location.href='blog-sukhada.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Blog</title>
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


    <!-- blog section five -->
    <section class="blog-section-five layout-radius">
        <div class="drivons-container">
            <div class="drivons-title wow fadeInUp">
                <ul class="breadcrumb">
                    <li><a href="blog.php">Home</a></li>
                    <li><span>Blog</span></li>
                </ul>
                <h2>Detailing Your Car’s Interior: Tips and Tricks</h2>
                <ul class="post-info">
                    <li><img src="images/resource/pfp.jpg"></li>
                    <li><a href="#" title="">Sukhada Joshi</a></li>
                    <li><a href="#" title="">News</a></li>
                    <li>February 13, 2024</li>
                </ul>
            </div>
        </div>
        <div class="right-box">
            <div class="large-container">
                <div class="content-box">
                    <figure class="outer-image"><img src="images/resource/intt.jpg" alt=""></figure>
                    <div class="right-box-two">
                        <h4 class="title">Comfort: Creating a Clean and Inviting Car Interior</h4>
                        <div class="text">
                            The first step to detailing your car’s interior is to thoroughly vacuum the carpets, seats, and floor mats. Use a high-powered vacuum with specialized attachments, such as a crevice tool, to get into tight spots and remove dirt from hard-to-reach areas. For cloth upholstery, use a fabric cleaner or upholstery shampoo to lift stains and odors, scrubbing with a soft-bristled brush. If your car has leather seats, apply a leather cleaner and conditioner to keep the material soft and supple. Be sure to address all areas of the interior, including under the seats, between the cushions, and in the glove box. Regular vacuuming and upholstery cleaning help prevent dirt buildup and keep your car smelling fresh.
                        <div class="text two">
                            After vacuuming and cleaning the upholstery, it’s time to focus on the dashboard, door panels, and windows. Use a microfiber cloth with an interior cleaner to wipe down surfaces, avoiding harsh chemicals that could damage the materials. For leather or vinyl dashboards, apply a protectant to guard against UV rays, which can cause fading and cracking. When cleaning windows, use a streak-free glass cleaner and a microfiber towel for a spotless finish. Pay attention to the little details, such as cleaning air vents and cup holders, which often accumulate dust and grime. To complete the job, ensure the interior has a pleasant scent by using an air freshener or odor eliminator.
                        </div>
                        <div class="auther-box">
                            <div class="text">
                                "Clean Inside and Out – Transform Your Ride with Perfect Interior Detailing!"
                            </div>
                            <span class="name">Sukhada Joshi</span>
                        </div>
                        <div class="list-sec">
                            <h6 class="title">What you'll learn</h6>
                            <div class="inner-column">
                                <ul class="list">
                                    <li><i class="fa-solid fa-check"></i>The best vacuuming techniques for a deep clean of your car’s interior</li>
                                    <li><i class="fa-solid fa-check"></i>How to properly clean upholstery without damaging the fabric.</li>
                                    <li><i class="fa-solid fa-check"></i>The right way to clean and condition leather seats to keep them looking fresh</li>
                                    <li><i class="fa-solid fa-check"></i>The importance of using the right products for different interior materials.</li>
                                    <li><i class="fa-solid fa-check"></i>How to clean and protect your dashboard and door panels from UV damage.</li>
                                </ul>
                                <ul class="list">
                                    <li><i class="fa-solid fa-check"></i>The best methods for cleaning hard-to-reach areas, like vents and cup holders.</li>
                                    <li><i class="fa-solid fa-check"></i>How to keep your windows streak-free and crystal clear.</li>
                                    <li><i class="fa-solid fa-check"></i>The importance of maintaining your car’s interior for a clean, comfortable ride.</li>
                                    <li><i class="fa-solid fa-check"></i>How to remove stubborn stains from upholstery and carpets.</li>
                                    <li><i class="fa-solid fa-check"></i>How to use air fresheners and odor eliminators to maintain a pleasant interior environment.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="image-sec">
                            <div class="image-box">
                                <figure class="inner-image"><img src="images/resource/inttt.jpg" alt=""></figure>
                            </div>
                        </div>
                        <div class="social-section">
                            <div class="inner-column">
                                <ul class="social-icons">
                                    <li>Share this post</li>
                                    <li><a href="https://www.facebook.com"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://x.com"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="https://in.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                </ul>
                                <ul class="quality-list">
                                    <li><a href="#">Cleanliness</a></li>
                                    <li><a href="#">Protection</a></li>
                                    <li><a href="#">Comfort</a></li>
                                </ul>
                            </div>
                        </div>   
                        <div class="reviews">
                            <div class="content-box">
                                <div class="auther-name">
                                    <span>P.S</span>
                                    <h6 class="name">Prasad Sonawane</h6>
                                    <small>12 Oct 2024</small>
                                </div>
                                <div class="rating-list">
                                    <ul class="list">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fas fa-star-half-alt"></i></li>
                                    </ul>
                                    <span>Excellent Service!</span>
                                </div>
                                <div class="text">"I had a seamless experience renting a car from this company. 
                                    The booking process was easy, the car was clean and well-maintained, and the customer service was fantastic. Highly recommend!"
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
            </div>
        </div>
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
    </section>
    <!-- End blog section five -->

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
        }, 500);     });
</script>
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>

</body>
</html>