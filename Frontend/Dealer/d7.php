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
            echo "<script>alert('Reply saved successfully!'); window.location.href='d7.php';</script>";
        } else {
            echo "<script>alert('Error saving reply.'); window.location.href='d7.php';</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Database error: " . $e->getMessage() . "'); window.location.href='d7.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Dealer</title>
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


    <!-- dealership-section -->
    <section class="dealer-ship-section-two layout-radius">
        <div class="barnd-box">
            <div class="drivons-container">
                <div class="drivons-title-three">
                    <ul class="breadcrumb">
                      <li><a href="dealer.php">Back</a></li>
                        <li><span>Thane Dealer</span></li>
                    </ul>
                    <h2>Dealer Details</Details></h2>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="brand-box">
                                <div class="image-box">
                                    <img src="images/resource/deal8.1.jpg">
                                </div>
                                <div class="content-box">
                                    <h3 class="title"> Thane Dealer</h3>
                                    <ul class="contact-list">
                                        <li>
                                            <!-- <i class="fa-solid fa-location-dot"></i> -->
                                            <span class="icon">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9997 4.0625C8.67846 4.0625 5.14551 7.64734 5.14551 12.1068C5.14551 14.3555 6.04492 16.8458 7.51665 18.7689C8.99219 20.697 10.9451 21.9375 12.9997 21.9375C15.0542 21.9375 17.0071 20.697 18.4827 18.7689C19.9545 16.8458 20.8538 14.3555 20.8538 12.1068C20.8538 7.64734 17.3209 4.0625 12.9997 4.0625ZM3.52051 12.1068C3.52051 6.78329 7.74795 2.4375 12.9997 2.4375C18.2514 2.4375 22.4788 6.78329 22.4788 12.1068C22.4788 14.7496 21.4382 17.5809 19.7732 19.7564C18.112 21.9271 15.7316 23.5625 12.9997 23.5625C10.2677 23.5625 7.88736 21.9271 6.22618 19.7564C4.56119 17.5809 3.52051 14.7496 3.52051 12.1068Z" fill="#050B20"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.47852 11.375C9.47852 9.43051 11.0549 7.85419 12.9993 7.85419C14.9438 7.85419 16.5202 9.43051 16.5202 11.375C16.5202 13.3195 14.9438 14.8959 12.9993 14.8959C11.0549 14.8959 9.47852 13.3195 9.47852 11.375ZM12.9993 9.47919C11.9523 9.47919 11.1035 10.328 11.1035 11.375C11.1035 12.4221 11.9523 13.2709 12.9993 13.2709C14.0464 13.2709 14.8952 12.4221 14.8952 11.375C14.8952 10.328 14.0464 9.47919 12.9993 9.47919Z" fill="#E1E1E1"/>
                                                </svg>        
                                            </span>
                                            SwiftRide Drives</li>
                                        <li>
                                            <!-- <i class="fa-solid fa-envelope"></i> -->
                                            <span class="icon">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.7584 14.5869C12.0336 14.5869 11.3111 14.3474 10.7065 13.8686L5.84779 9.95128C5.49787 9.66962 5.44371 9.1572 5.72429 8.80837C6.00704 8.46062 6.51837 8.40537 6.86721 8.68595L11.7216 12.5989C12.3316 13.0821 13.1906 13.0821 13.8049 12.5946L18.6106 8.68812C18.9594 8.4032 19.4707 8.45737 19.7546 8.8062C20.0373 9.15395 19.9842 9.66528 19.6365 9.94912L14.8221 13.8621C14.2133 14.3453 13.4853 14.5869 12.7584 14.5869Z" fill="#E1E1E1"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0469 21.6667C18.0491 21.6645 18.0578 21.6667 18.0643 21.6667C19.3003 21.6667 20.3967 21.2247 21.2373 20.3851C22.2134 19.4134 22.7497 18.0169 22.7497 16.4537V9.01335C22.7497 5.9876 20.7715 3.79169 18.0469 3.79169H7.41076C4.68617 3.79169 2.70801 5.9876 2.70801 9.01335V16.4537C2.70801 18.0169 3.24534 19.4134 4.22034 20.3851C5.06101 21.2247 6.15842 21.6667 7.39342 21.6667H18.0469ZM7.39017 23.2917C5.71859 23.2917 4.22576 22.685 3.07309 21.5367C1.78934 20.2562 1.08301 18.4514 1.08301 16.4537V9.01335C1.08301 5.1101 3.80326 2.16669 7.41076 2.16669H18.0469C21.6544 2.16669 24.3747 5.1101 24.3747 9.01335V16.4537C24.3747 18.4514 23.6683 20.2562 22.3846 21.5367C21.233 22.6839 19.7391 23.2917 18.0643 23.2917H7.39017Z" fill="#050B20"/>
                                                </svg>
                                                    
                                            </span>
                                            contact@swiftriderentals.com</li>
                                        <li>
                                            <!-- <i class="fa-solid fa-phone"></i> -->
                                            <span class="icon">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M23.5121 10.9886C23.1037 10.9886 22.7527 10.6821 22.7061 10.2671C22.2944 6.6098 19.4528 3.77147 15.7955 3.36522C15.3502 3.31538 15.0285 2.91455 15.0783 2.46822C15.1271 2.02297 15.5268 1.69038 15.9753 1.75105C20.3921 2.24072 23.8241 5.66838 24.3202 10.0851C24.3712 10.5315 24.0494 10.9333 23.6042 10.9832C23.5738 10.9864 23.5424 10.9886 23.5121 10.9886Z" fill="#E1E1E1"/>
                                                    <path d="M19.6762 11.0003C19.2949 11.0003 18.9558 10.7316 18.88 10.3438C18.568 8.74044 17.3319 7.50435 15.7307 7.19344C15.2898 7.10785 15.0027 6.6821 15.0883 6.24119C15.1739 5.80027 15.6105 5.51319 16.0406 5.59877C18.295 6.03644 20.0359 7.77627 20.4747 10.0318C20.5602 10.4738 20.2732 10.8995 19.8333 10.9851C19.7803 10.9949 19.7283 11.0003 19.6762 11.0003Z" fill="#E1E1E1"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.1053 17.8102C13.2111 22.917 16.6106 24.256 18.7578 24.256C19.8173 24.256 20.5734 23.9299 21.0772 23.5681C21.0999 23.5551 23.4313 22.1294 23.8397 19.9714C24.0325 18.9585 23.7509 17.9564 23.0272 17.0724C20.0459 13.453 18.527 13.791 16.85 14.6068C15.8198 15.1116 15.0062 15.5038 12.7084 13.2082C10.412 10.9108 10.8081 10.0971 11.3096 9.067C12.1265 7.39 12.4625 5.8708 8.84197 2.8873C7.96013 2.16689 6.96455 1.88522 5.95272 2.0748C3.82613 2.47239 2.39397 4.7658 2.39397 4.7658C1.2543 6.36589 0.480802 10.1868 8.1053 17.8102ZM6.28422 3.66514C6.37955 3.64997 6.4738 3.6413 6.56697 3.6413C6.99163 3.6413 7.40113 3.80705 7.80955 4.14289C10.7291 6.54786 10.3597 7.30621 9.84839 8.35595C9.08031 9.93437 8.67838 11.4749 11.559 14.3576C14.4429 17.2404 15.9844 16.8384 17.5607 16.0682L17.5633 16.0669C18.6117 15.5573 19.3697 15.1888 21.7716 18.1049C22.1822 18.6054 22.3393 19.1059 22.2504 19.6334C22.0457 20.8468 20.6352 21.9334 20.2084 22.1977C18.6798 23.2875 14.9997 22.4068 9.25363 16.6619C3.5098 10.9169 2.62797 7.23689 3.7568 5.6498C3.98213 5.28255 5.07305 3.86989 6.28422 3.66514Z" fill="#050B20"/>
                                                </svg>
                                                    
                                            </span>
                                            +91 98123 45678</li>
                                        </ul>
                                    <div class="text">Fast and hassle-free rentals for urgent travel needs.
                                         Ideal for time-sensitive bookings.
                                    </div>
                                    <a href="thane.php" class="brand-btn">View All Cars<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewbox="0 0 15 14" fill="none">
                                        <g clip-path="url(#clip0_881_15233)">
                                          <path d="M14.1111 0H5.55558C5.34062 0 5.16668 0.173943 5.16668 0.388901C5.16668 0.603859 5.34062 0.777802 5.55558 0.777802H13.1723L0.613941 13.3362C0.46202 13.4881 0.46202 13.7342 0.613941 13.8861C0.689884 13.962 0.789415 14 0.88891 14C0.988405 14 1.0879 13.962 1.16388 13.8861L13.7222 1.3277V8.94447C13.7222 9.15943 13.8962 9.33337 14.1111 9.33337C14.3261 9.33337 14.5 9.15943 14.5 8.94447V0.388901C14.5 0.173943 14.3261 0 14.1111 0Z" fill="#405FF2"></path>
                                        </g>
                                        <defs>
                                          <clippath id="clip0_881_15233">
                                            <rect width="14" height="14" fill="white" transform="translate(0.5)"></rect>
                                          </clippath>
                                        </defs>
                                      </svg>
                                    </a>
                                </div>
                            </div>
                               
                            <body>
                                <table width="100%" height="100%">
                                    <tr>
                                        <td halign="Right" valign="top" width="80%">
                                            <div style="padding: 10px;">
                                                <div class="right-section"> 
                                                <div class="side-bar">
                                                    <a href="#sendmsg" class="message">Send Message</a>
                                                    <div class="schedule-sec">
                                                        <h6 class="title">Opening hours</h6>
                                                        <ul class="schedule-list">
                                                            <li>Sunday<span>---- Close ----</span></li>
                                                            <li>Monday<span>09:00 - 20:00</span></li>
                                                            <li>Tuesday<span>09:00 - 20:00</span></li>
                                                            <li>Wednesday<span>09:00 - 20:00</span></li>
                                                            <li>Thursday<span>09:00 - 20:00</span></li>
                                                            <li>Friday<span>09:00 - 20:00</span></li>
                                                            <li>Saturday<span>09:00 - 20:00</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                            
                            <div class="description-sec">
                                <h4 class="title">Description</h4>
                                <div class="text two">SwiftRide Rentals specializes in providing quick and efficient car rental solutions for customers 
                                    with last-minute travel plans. Their streamlined booking process allows customers to secure a vehicle within minutes.
                                    
                                    
                                </div>
                                <div class="text">The fleet includes compact cars, sedans, and SUVs, ensuring a match for various needs. Known for their
                                     punctual service, SwiftRide Rentals offers convenient pickup and drop-off locations across the city. With affordable 
                                     pricing and no hidden charges, they are a trusted choice for customers looking for reliable transportation on short notice. 
                                     Their 24/7 customer support ensures assistance is just a call away, no matter the hour.
                                </div>
                            </div>
                            <div class="service-box">
                                <h4 class="title">Our services</h4>
                                <div class="list-sec">
                                    <div class="service-list two">
                                        <h6 class="inner-title">Business</h6>
                                        <div class="list-box">
                                            <ul class="list two">
                                                <li>Flexible Rentals</li>
                                                <li>Budget-Friendly</li>
                                                <li>Reliable Options</li>
                                                <li>Easy Processes</li>
                                            </ul>
                                            <ul class="list">
                                                <li>Affordable Rates</li>
                                                <li>Quick Services</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="service-list">
                                        <h6 class="inner-title">Onsite Facilities</h6>
                                        <div class="list-box">
                                            <ul class="list two">
                                                <li>Local Advice</li>
                                                <li>Well-Cleaned Cars</li>
                                                <li>Luggage Space</li>
                                                <li>Parking Assistance</li>
                                            </ul>
                                            <ul class="list">
                                                <li>Well-Equipped Cars</li>
                                                <li>Navigation Support</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="location-box">
                                <h4 class="title">Location</h4>
                                <div class="text">Swami Vivekanand Road ,Bandra West, Thane, B72 5BS
                                  <li>Open today 09am - 08pm</li> 
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
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60291.57132101132!2d72.87958564863281!3d19.185450900000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b90290ffb70f%3A0x9935f31c89e9f94b!2sLBS%20RD%20MULUND%20Jakat%20Naka%20Thane!5e0!3m2!1sen!2sin!4v1739525444897!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>

                            <div class="review-sec">
                                <h4 class="title">Customer Reviews</h4>
                                <div class="review-box">
                                    <div class="rating-box">
                                        <div class="content-box">
                                            <span>Overall Rating</span>
                                            <h3 class="title">4.0</h3>
                                            <small>Out Of 5</small>
                                        </div>
                                    </div>
                                    <ul class="review-list two">
                                        <li>
                                            <div class="review-title">
                                                <span>Professionalism</span>
                                                <small>Good</small>
                                            </div>
                                            <sub><i class="fa fa-star"></i>4.1</sub>
                                        </li>
                                        <li>
                                            <div class="review-title">
                                                <span>Honesty & Transparency</span>
                                                <small>Average</small>
                                            </div>
                                            <sub><i class="fa fa-star"></i>3.9</sub>
                                        </li>
                                        <li>
                                            <div class="review-title">
                                                <span>Problem Resolution</span>
                                                <small>Good</small>
                                            </div>
                                            <sub><i class="fa fa-star"></i>4.0</sub>
                                        </li>
                                    </ul>
                                    <ul class="review-list">
                                        <li>
                                            <div class="review-title">
                                                <span>Negotiation Flexibility</span>
                                                <small>Good</small>
                                            </div>
                                            <sub><i class="fa fa-star"></i>4.1</sub>
                                        </li>
                                        <li>
                                            <div class="review-title">
                                                <span>Responsiveness</span>
                                                <small>Average</small>
                                            </div>
                                            <sub><i class="fa fa-star"></i>3.9</sub>
                                        </li>
                                        <li>
                                            <div class="review-title">
                                                <span>Patience & Friendliness</span>
                                                <small>Good</small>
                                            </div>
                                            <sub><i class="fa fa-star"></i>4.0</sub>
                                        </li>
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
                            <div class="Reply-sec" id="sendmsg">
                                <h6 class="title">Leave a Message</h6>
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
                                        <label>Message</label>
                                        <textarea name="message" placeholder="Please Leave A Message" required=""></textarea>
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
            <!-- End shop section two -->
        </div>
    </section>
    <!-- End dealership-section -->

<?php include 'footer.php'; ?>

</div><!-- End Page Wrapper -->

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