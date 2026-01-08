<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Terms</title>
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
            pointer-events: none;
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


    <!-- tabs-section -->
    <section class="tabs-section layout-radius">
        <div class="drivons-container">
            <div class="drivons-title-three">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Terms</span></li>
                </ul>
                <h2>Terms and Conditions</h2>
            </div>
            
            <div class="row">
                <div class="tabs-column col-lg-3 col-md-4 col-sm-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="Account-Payments-tab" data-bs-toggle="tab" data-bs-target="#Account-Payments" type="button" role="tab" aria-controls="Account&Payments" aria-selected="true">Account & Payments</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="ManageOrders-tab" data-bs-toggle="tab" data-bs-target="#ManageOrders" type="button" role="tab" aria-controls="ManageOrders" aria-selected="false">Manage Orders</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="Returns-Refunds-tab" data-bs-toggle="tab" data-bs-target="#Returns-Refunds" type="button" role="tab" aria-controls="Returns&Refunds" aria-selected="false">Returns & Refunds</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="COVID-19-tab" data-bs-toggle="tab" data-bs-target="#COVID-19" type="button" role="tab" aria-controls="COVID-19" aria-selected="false">COVID-19</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Other-tab" data-bs-toggle="tab" data-bs-target="#Other" type="button" role="tab" aria-controls="Other" aria-selected="false">Other</button>
                        </li>
                      </ul>
                </div>
                
                <div class="content-column col-lg-9 col-md-8 col-sm-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Account-Payments" role="tabpanel" aria-labelledby="Account-Payments-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Account Creation</h6>
                                    <div class="text v2">To access our services, you must create an account by providing accurate and verifiable information.
                                         You are responsible for safeguarding your account credentials and must notify us immediately of any unauthorized access 
                                         or breaches. Multiple accounts created for fraudulent purposes are strictly prohibited.
                                    </div>
                                    <div class="text"> All payments must be made in full at the time of booking unless otherwise specified. We accept major credit cards,
                                         debit cards, and other payment methods specified on our website. The total cost, including taxes, insurance, and any additional fees, 
                                         will be displayed during the booking process. Partial payments or deposits may be accepted in some cases, subject to specific terms. 
                                         You are required to ensure that your payment method has sufficient funds to complete the transaction.
                                    </div>
                                </div>
                        
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. Payment Security</h6>
                                    <div class="text v2">We employ advanced encryption technologies and secure payment gateways to protect your financial information. However,
                                         users are advised to ensure secure transactions by using trusted devices and networks. In the event of a security breach,  Our Site will
                                          not be liable for user negligence. Regularly monitor your account for unauthorized transactions and report issues promptly. Additionally, 
                                          our system continuously monitors for potential fraud or suspicious activity. Any flagged transactions may be temporarily held for verification 
                                          to ensure the safety of all users. Customers may be asked to provide supplementary documentation for confirmation.
                                    </div>
                                    <div class="text">By using our secure payment system, you agree to cooperate in any security-related inquiries and verification processes. Your data 
                                        is stored in compliance with data protection regulations, ensuring privacy and security at every step. We are committed to maintaining the highest
                                         standards of financial security to safeguard user trust.
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. Payment Issues</h6>
                                    <div class="text v2">In cases of payment failure or disputes, Drivonsite reserves the right to cancel the reservation until the issue is resolved.
                                         Customers are encouraged to contact their financial institutions for further assistance if needed. Payment disputes should be communicated to
                                          Drivonsite within 14 days of the transaction.
                                    </div>
                                    <div class="text">In the event of a double charge or incorrect billing, customers should immediately notify Our Site with supporting evidence such as transaction
                                         IDs or bank statements. We will prioritize resolving such issues promptly to ensure customer satisfaction. Repeated payment failures due to insufficient funds 
                                         or expired payment methods may lead to account suspension until valid payment information is provided.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ManageOrders" role="tabpanel" aria-labelledby="ManageOrders-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Booking Modifications</h6>
                                    <div class="text v2">Changes to your booking, such as adjusting rental dates, pick-up locations, or vehicle types, must be requested at least 24 hours before the scheduled rental
                                         start time. Approval of changes is subject to availability, and additional charges may apply. Late requests may not be accommodated. Customers should review their booking details
                                          carefully to minimize the need for modifications.Modifications made closer to the rental start time may result in limited vehicle options or additional fees. We encourage customers 
                                          to plan their trips well in advance to avoid unexpected challenges or delays in securing their preferred options.
                                    </div>
                                    <div class="text">In cases where modifications cannot be accommodated, customers may opt to cancel and rebook, subject to the cancellation policy. Our support team is available to guide you
                                         through this process and suggest alternative solutions if necessary.
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. Cancellations</h6>
                                    <div class="text v2">You may cancel your booking through your account dashboard. Cancellation policies, including potential fees, are outlined during the booking process and in your confirmation email.
                                         Late cancellations may be subject to forfeiture of partial or full payment. Drivonsite aims to offer flexible cancellation policies to accommodate unforeseen circumstances, but exceptions are subject to review.
                                    </div>
                                    <div class="text">Refund requests for cancellations are processed based on the policy agreed upon at the time of booking. Customers should ensure they understand these terms to avoid misunderstandings. Exceptional cases,
                                         such as medical emergencies or natural disasters, may qualify for special consideration upon review.Advance notice of cancellations allows us to optimize vehicle availability for other customers. Late cancellations
                                          without valid reasons may result in restrictions on future bookings or additional penalties.
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. Customer Support</h6>
                                    <div class="text v2">For urgent modifications or issues with your booking, please contact our customer support team, available 24/7. Our team is dedicated to resolving your concerns promptly and effectively. Provide clear and 
                                        detailed information when contacting support to expedite the resolution process.
                                    </div>
                                    <div class="text">Our support team is trained to handle a wide range of queries, from general questions to complex issues involving billing or vehicle performance. Feedback provided during support interactions 
                                        is valued and used to improve our services.In addition to live support, customers can access self-help resources, including FAQs and video tutorials, available on our website. These resources are designed
                                         to provide quick and comprehensive answers to common questions.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Returns-Refunds" role="tabpanel" aria-labelledby="Returns-Refunds-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Vehicle Return</h6>
                                    <div class="text v2">Vehicles must be returned at the designated time and location specified in your booking. Late returns may incur additional charges based on our hourly or daily rates. Significant delays without prior notice may result in additional penalties.
                                        prior notice may result in additional penalties. Customers are advised to plan accordingly to avoid unexpected fees. Returning vehicles to unauthorized locations may result in recovery fees.
                                    </div>
                                    <div class="text">For customers facing unavoidable delays, we recommend notifying our support team immediately to explore potential solutions and minimize additional charges. Clear communication ensures a smoother resolution and maintains a positive relationship.Inspection of returned vehicles will be conducted in your presence when possible. 
                                        This allows for transparency and mutual agreement on any identified damages or discrepancies, reducing the likelihood of disputes.
                                </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. Condition of Vehicle</h6>
                                    <div class="text v2">Upon return, vehicles will be inspected for cleanliness, damages, and fuel level. Customers are responsible for returning the vehicle in the same condition as received. Cleaning fees or repair costs may be charged for violations. Pre-existing damages should be documented and reported at the time 
                                        of vehicle pick-up. Keep copies of inspection reports for reference.
                                    </div>
                                    <div class="text">Customers are encouraged to perform a final check of the vehicle before returning it to ensure all personal belongings have been removed and the vehicle is in proper condition.
                                         Additional charges for overlooked items, such as excessive dirt or minor damages, can often be avoided with simple precaution.
                                        In cases where disputes arise regarding the condition of the vehicle, customers may request a detailed
                                    </div>  
                                        
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. Refund Process</h6>
                                    <div class="text v2">All vehicles must be returned in the same condition as they were rented, excluding normal wear and tear. Any damage, excessive dirt, or missing accessories will result in additional charges. Customers are encouraged to document the vehicle's condition with photos at the time of pick-up and 
                                        return for reference in case of disputes.
                                    </div>
                                    <div class="text"> Our Site provides customers with a checklist during pick-up to verify the vehicle's condition. Ensuring all pre-existing damages are noted can protect you from unwarranted charges upon return. Regular maintenance issues arising during the rental period should be reported immediately for guidance.
                                        For damages not caused by the customer but incurred during the rental period, such as accidents with third parties, customers must provide a detailed report and cooperate with Drivonsite in any insurance claims or investigations.Refund requests are processed based on the policies outlined during booking. For 
                                        eligible refunds, the processing time may vary depending on the payment method. Customers will receive


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="COVID-19" role="tabpanel" aria-labelledby="COVID-19-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Health and Safety Measures</h6>
                                    <div class="text v2">We prioritize the health and safety of both our customers and staff by implementing enhanced cleaning protocols for all vehicles,
                                         especially focusing on high-touch areas like door handles and steering wheels. Additionally, we encourage customers and staff to follow safety guidelines,
                                          including wearing masks and maintaining social distancing during vehicle pick-up and drop-off. Contactless check-in and check-out options are available to 
                                          minimize physical interaction.
                                    </div>
                                    <div class="text">We also regularly monitor and follow the latest guidance from health authorities to ensure our practices remain up-to-date with the evolving COVID-19 situation.
                                         As part of our commitment to safety, all vehicles are thoroughly disinfected between rentals, and we provide sanitization supplies, such as hand sanitizers, in our rental locations
                                          when available. Our goal is to provide a safe and comfortable experience for everyone while minimizing the risk of exposure to COVID-19.
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2.  Flexible Cancellations and Customer Responsibility</h6>
                                    <div class="text v2">In light of the ongoing pandemic, we offer flexible cancellation and rescheduling policies for rentals impacted by COVID-19. Customers are required to confirm that they 
                                        are not exhibiting COVID-19 symptoms and have not been in close contact with anyone diagnosed with the virus in the past 14 days. If government restrictions or travel bans affect your plans,
                                         please contact us for assistance with modifications or refunds.
                                    </div>
                                    <div class="text">To further support our customers during these uncertain times, we are offering flexible rental terms in case of unexpected travel restrictions or health-related issues. 
                                        If you are unable to pick up or return the vehicle due to quarantine measures or government-imposed lockdowns, please reach out to us immediately to discuss rescheduling or arranging a
                                         full refund. We understand that plans may change, and we are committed to accommodating your needs as much as possible during the COVID-19 pandemic.
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. Updates and Compliance with Local Regulations</h6>
                                    <div class="text v2">Our policies may be adjusted as the COVID-19 situation evolves. We reserve the right to update rental terms to comply with local health guidelines and travel restrictions.
                                         Customers are responsible for adhering to any regulations in the areas where they travel, and we will provide timely updates regarding any changes to our services.
                                    </div>
                                    <div class="text">We are committed to keeping our customers informed about any changes to our policies or services. As local, national, and international regulations evolve, we will regularly
                                         update our terms and conditions to reflect the latest requirements. Customers will be notified promptly of any important changes that could affect their rental experience, including restrictions 
                                         on travel or vehicle availability. We encourage customers to check our website or contact us directly for the most up-to-date information on COVID-19 policies.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Other" role="tabpanel" aria-labelledby="Other-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Rental Agreement</h6>
                                    <div class="text v2">Eligibility: Customers must meet the minimum age requirement (typically 21 years) and possess a valid driver’s license. Some rental companies may require an
                                         international driving permit.
                                    </div>
                                    <div class="text">Vehicle Use: Rentals are provided for personal use only. The vehicle may not be used for commercial purposes, racing, or any illegal activities. 
                                    </div>
                        
                                    <div class="text">Driving Areas: Specify the areas where the vehicle is allowed to be driven (e.g., specific regions). Any off-road driving or 
                                        taking the vehicle outside certain areas without prior approval may result in additional fees or voiding of insurance. 
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. Insurance and Liability</h6>
                                    <div class="text v2">Insurance Coverage: Basic insurance, including collision damage waiver (CDW) and theft protection, is included with the rental. Optional coverage upgrades are
                                         available for additional protection. Please review the coverage details at the time of booking.
                                    </div>
                                    <div class="text">Customer Responsibility: The customer is responsible for any damages not covered by insurance, such as lost keys, tire damage, or fines. It is the customer’s 
                                        responsibility to report any accidents immediately.
                                    </div>
                                    <div class="text">Third-Party Insurance: If customers’ personal insurance or credit card provides coverage for rental cars, they must provide documentation and may be able to
                                         waive certain coverage options provided by us.
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. Maintenance and Breakdown</h6>
                                    <div class="text v2">Vehicle Maintenance: Customers are responsible for maintaining the vehicle during the rental period, including ensuring proper tire pressure and fluid levels.
                                    </div>
                                    <div class="text">Breakdown Assistance: In case of a breakdown or accident, customers should contact our emergency assistance team immediately. Customers may be required to provide proof of the incident.
                                        Repair Authorization: Customers should not attempt repairs to the vehicle without prior authorization from us, except in the case of an emergency.
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End tabs-section -->

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