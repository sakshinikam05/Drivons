<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | FAQ</title>
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


    <!-- faq-inner-section -->
    <section class="faq-inner-section layout-radius">
        <!-- faq-section -->
        <div class="faqs-section pt-0">
            <div class="inner-container">
                <!-- FAQ Column -->
                <div class="faq-column wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-column">
                        <div class="drivons-title text-center">
                            <h2 class="title">General</h2>
                        </div>
                        <ul class="widget-accordion wow fadeInUp">
                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active">Do you offer delivery and pick-up services?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text">Yes, we offer delivery and pick-up services for your convenience. You can have the rental 
                                            car delivered to your preferred location, such as your home, office, or hotel, and arrange for pick-up 
                                            when your rental period ends. This service may be subject to availability and additional charges depending 
                                            on the distance from our rental location and your subscription. Simply select the delivery and pick-up option 
                                            during the booking  process or contact us to arrange it. We aim to make your car rental experience as seamless 
                                            as possible!
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What are the requirements to rent a car?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">To rent a car, you must have a valid driver’s license and meet the minimum age requirement, which
                                            is typically 21 years or older, though this may vary by location. A credit card in your name is generally required 
                                            to cover the security deposit and any additional charges. Some rental agencies may also ask for a second form of identification, 
                                            such as a  proof of address, especially for first-time renters. Renters under 25 may be subject to a young driver surcharge. 
                                            Additionally, you may be asked to provide proof of insurance or purchase coverage from the rental agency. Always review the 
                                            specific requirements and terms for your selected rental location to ensure a smooth process.
 
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How do I make a reservation?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">To make a reservation, visit our website and select your preferred pick-up location, rental dates, and car type.
                                             You can also make a booking by calling our customer service team or sending us an email. Once you choose a vehicle, follow the 
                                             prompts to provide your details and payment information. After completing the process, you will receive a confirmation email with
                                              your booking details. If you need help, our support team is always available to assist you.
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What do I do if I get into an accident?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">If you get into an accident, first ensure everyone's safety and contact emergency services if needed. Notify the local
                                             authorities and file a police report, as it may be required for insurance claims. Then, contact our customer service team immediately 
                                             to report the accident and receive guidance on the next steps. Provide details of the incident, including photos if possible. Do not 
                                             admit fault or sign any third-party documents without consulting us. We’ll assist you with the necessary procedures and insurance claims. 
                                        </div>
                                    </div>
                                </div>
                            </li>

                            
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Can I add an additional driver to my rental?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Yes, you can add an additional driver to your rental. The additional driver must meet the same age and licensing requirements
                                             as the primary renter. There is usually a fee for each additional driver, which varies by location. All additional drivers must be present 
                                             at the time of pickup to show their driver’s license and sign the rental agreement. Adding an authorized driver ensures they are covered under 
                                             the rental’s insurance policies.
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
        <!-- faq-section -->
        <div class="faqs-section">
            <div class="inner-container">
                <!-- FAQ Column -->
                <div class="faq-column wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-column">
                        <div class="drivons-title text-center">
                            <h2 class="title">Booking Process</h2>
                        </div>
                        <ul class="widget-accordion wow fadeInUp">
                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active">How do I book a rental car?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text">To book a rental car, simply visit our website and select your pick-up location,
                                             rental dates, and car type. Browse through the available options and choose the vehicle that 
                                             best fits your needs. Enter your personal details, including a valid driver’s license and payment 
                                             information. Confirm your reservation and receive an email with your booking details. You can also 
                                             book by calling our customer service team or via email if you prefer assistance. 
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What documents do I need to provide when booking a car?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">When booking a car, you’ll need to provide a valid driver’s license, a credit card in your name 
                                            for payment and security purposes, and sometimes a second form of identification  to confirm your identity.
                                            Ensure that all documents are current and meet the rental requirements for your chosen location. Make sure 
                                            your driver’s license is valid for the entire rental period, and that it matches the name on the reservation. 
                                            In some cases, you may be asked to provide a current address or contact information. Always ensure you meet the 
                                            minimum age requirement for the rental location.
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How do I know if my booking is confirmed?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Once your booking is confirmed, you will receive a confirmation email with all the details of your 
                                            reservation, including the car type, pick-up location, dates, and any additional services you selected. You will 
                                            also receive a booking reference number. If you do not receive a confirmation email within a few minutes of booking,
                                             please check your spam folder or contact our customer service team to verify your reservation. Additionally, you can 
                                             log into your account on our website to view your booking status.
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Are there any additional fees I should be aware of?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Yes, there may be additional fees beyond the base rental price. These can include taxes, location surcharges,
                                             insurance options, and fees for additional services like GPS, car seats, or extra drivers. If you return the car late or with 
                                             less fuel than when you picked it up, additional charges may apply. It's always a good idea to review your rental agreement for
                                              any potential fees before confirming your reservation.
                                        </div>
                                    </div>
                                </div>
                            </li>

                            
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What should I do if I have trouble completing my booking?<div class="icon fa fa-plus"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">If you're having trouble completing your booking, first ensure that all required fields are filled out correctly, including 
                                            your personal information and payment details. If the issue persists, try refreshing the page or using a different browser. If you're still
                                             unable to complete the booking, please contact our customer support team via phone or email. We're happy to assist you with any technical 
                                             difficulties or questions you may have.
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
    <!-- End faq-inner-section -->

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