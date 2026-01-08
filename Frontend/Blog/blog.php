<?php include 'session.php'; ?>

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

    <!-- blog section -->
    <section class="blog-section v1 layout-radius">
        <div class="drivons-container">
            <div class="drivons-title wow fadeInUp">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Blog</span></li>
                </ul>
                <h2>Blog List</h2>
            </div>
            <nav class="wow fadeInUp" data-wow-delay="100ms">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Auto Detailing</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Car News</button>
                   </div>
            </nav>
            <div class="tab-content wow fadeInUp" data-wow-delay="200ms" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                        <!-- blog-block -->
                        <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/fuel.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Chirag Jain</li>
                                        <li>December 05, 2024</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-chirag.php">How To Save On Car Fuel Costs</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/coat.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Atharva Sonar</li>
                                        <li>January 7, 2023</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-atharva.php">Protecting Your Car’s Paint with Ceramic Coatings</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/paint.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Krishna Jala</li>
                                        <li>August 29, 2024</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-krishna.php">Top Car Detailing Mistakes to Avoid</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/detail.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Nandini Patil</li>
                                        <li>March 01, 2022</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-nandini.php">How Often Should You Detail Your Car?</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/int.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Sukhada Joshi</li>
                                        <li>February 13, 2024</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-sukhada.php">Detailing Your Car’s Interior: Tips and Tricks</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/ext.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Neha Patil</li>
                                        <li>November 25, 2024</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-neha.php">Exterior Detailing: How to Clean Wheels and Tires</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <!-- blog-block -->
                        <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn19.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Sudhir Patni</li>
                                        <li>December 25, 2022</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-sudhir.php" title="">Electric Cars: The Future of Transportation</a></h6>
                                </div>
                            </div>
                        </div>
                        <!-- blog-block -->
                        <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="100ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn20.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Piyush Patil</li>
                                        <li>June 14, 2023</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-piyush.php" title="">Top New Car Models Launching in 2025</a></h6>
                                </div>
                            </div>
                        </div>
                        <!-- blog-block -->
                        <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn21.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Rohan Nanda</li>
                                        <li>April 18, 2023</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-rohan.php" title="">How Autonomous Vehicles Will Change the Car Industry</a></h6>
                                </div>
                            </div>
                        </div>
                        <!-- blog-block -->
                        <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn22.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Varun Sood</li>
                                        <li>May 05, 2024</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-varun.php"title="">The Rise of Hybrid Cars in 2025</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn23.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Priti Gupta</li>
                                        <li>July 10, 2024</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-priti.php"title="">Car Industry’s Response to Rising Fuel Prices</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/blog4-3.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Ajinkya Salunkhe</li>
                                        <li>August 23, 2022</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-ajinkya.php"title="">The Best Car Brands to Watch in 2025</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn24.png" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Shravani Patil</li>
                                        <li>September 24, 2024</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-shravani.php"title="">Government Policies Affecting the Car Industry in 2025</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn25.png" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Sangita Shirsath</li>
                                        <li>March 04, 2023</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-sangita.php"title="">How 5G Technology Will Affect Car Communication</a></h6>
                                </div>
                            </div>
                        </div>
                         <!-- blog-block -->
                         <div class="blog-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInUp" data-wow-delay="200ms">
                                <div class="image-box">
                                    <figure class="image"><img src="images/resource/cn26.jpg" alt=""></a></figure>
                                    <span class="date">news</span>
                                </div>
                                <div class="content-box">
                                    <ul class="post-info">
                                        <li>Shruti Patil</li>
                                        <li>October 01, 2022</li>
                                    </ul>
                                    <h6 class="title"><a href="blog-shruti.php"title="">How Car Manufacturers Are Adapting to Sustainability</a></h6>
                                         </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- End blog-section -->

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