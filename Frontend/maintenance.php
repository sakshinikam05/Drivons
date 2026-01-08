<?php include 'session.php';
    include 'dbcon.php';

    if (!isset($_SESSION['car_selected'])) {
        unset($_SESSION['selectedItemsPage2']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drivons | Maintenance</title>
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

    <!-- cars-section-fourteen -->
    <section class="cars-section-fourteen layout-radius">
        
    <!-- for the pop-up msg at bottom -->
    <div id="toast" style="
        position: fixed; 
        bottom: 20px; 
        left: 50%; 
        transform: translateX(-50%);
        background: black; 
        color: white; 
        padding: 10px 20px; 
        border-radius: 5px; 
        display: none;
        font-size: 16px;
        z-index: 1000;">
    </div>

    <!-- Proceed Button -->
    <button id="proceedButton">
        <a href="cars.php" style="
        position: fixed; 
        bottom: 20px; 
        left: 20px; 
        background: #405FF2; 
        color: white; 
        padding: 10px 18px; 
        border: none; 
        border-radius: 10px; 
        cursor: pointer;
        font-size: 15px;
        z-index: 1000;">
        Proceed Further
        </a></button>
        
        <div class="drivons-container">
            <div class="drivons-title-three">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Maintenance</span></li>
                </ul>
                <h2>Shop List</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="side-bar">
                        <div class="categories-box">
                            <h6 class="title">Categories</h6>
                            <div class="radio">
                                <label class="contain">Accessories (6)
                                    <input type="radio" name="categories-box" value="accessories" >
                                    <span class="checkmark"></span>
                                </label>
                                <label class="contain">Maintenance & Spare Parts (6)
                                    <input type="radio" name="categories-box" value="maintenance-spare-parts" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <button type="button" onclick="redirectPage()" 
                                  style="border: none; background: none; padding: 0;">
                             <span class="btn-title1" >Search </span>
                             <style>
                                /* Button Span Styling */
                                .btn-title1 {
                                width: 90px;
                                height: 24px;
                                text-align: center;
                                font-size: 14px;
                                font-weight: 500;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                background-color: #007bff; /* Default background color */
                                color: white; /* Default text color */
                                border-radius: 6px; /* Slightly rounded corners */
                                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* Soft shadow for depth */
                                cursor: pointer;
                                transition: all 0.3s ease-in-out; /* Smooth transition */
                               }
                
                              /* Hover Effect */
                             .btn-title:hover {
                             background-color: #0056b3; /* Darker background on hover */
                             color: white; /* Keep text color white */
                            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3); /* Enhance shadow for hover effect */
                            }
                
                           /* Active Effect (When Clicked) */
                          .btn-title:active {
                           transform: scale(0.98); /* Slight press effect */
                            box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2); /* Reduce shadow when clicked */
                            }
                
                              </style>
                            </button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            
                        
                <script>
                            function redirectPage() {
                                // Get all radio buttons with the name "categories-box"
                                const radios = document.getElementsByName('categories-box');
                                let selectedValue;
                        
                                // Loop through the radio buttons to find the selected one
                                for (const radio of radios) {
                                    if (radio.checked) {
                                        selectedValue = radio.value;
                                        break;
                                    }
                                }
                        
                                // Redirect based on the selected value
                                if (selectedValue === 'accessories') {
                                    window.location.href = 'accessories.php'; // Update with the actual URL of the accessories page
                                } else if (selectedValue === 'maintenance-spare-parts') {
                                    window.location.href = 'maintenance.php'; // Update with the actual URL of the maintenance page
                                }
                            }
                        </script>
                        
                <div class="content-column col-lg-9 col-md-12 col-sm-12">
                    <div class="inner-column">
                       
                        </div>
                        <div class="row">
                            <!-- car-block-fourteen -->
                            <div class="car-block-fourteen col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="m1.php"><img src="images/resource/emegency tool kit.png" alt=""></a></figure>
                                    </div>
                                    <div class="content-box">
                                        <div class="star-rating">
                                            <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <!-- Unfilled Stars -->
                                            <span class="unfilled">&#9734;</span>
                                        </div>
                                          
                                          <style>
                                            .star-rating {
                                             font-size: 23px;  /* Adjust size of stars */
                                             color: gold; 
                                             margin-bottom: 10px;     /* Color for filled stars */
                                            }
                                            .star-rating .unfilled
                                             {
                                              color: gold;  
                                              margin-bottom: 10px;     /* Color for unfilled stars */
                                             }
                                          </style>
                                        <div class="text"><a href="m1.php" title="">Emergency Tool Kit</a></div>
                                        
                                        <a href="#" class="shoping-btn" id="item7">
                                            <i class="fa-solid fa-cart-shopping"></i> Add To Package
                                        </a>                                    
                                    </div>
                                </div>
                            </div>
                            <!-- car-block-fourteen -->
                            <div class="car-block-fourteen col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="m2.php"><img src="images/resource/car cleaning kit.jpg" alt=""></a></figure>
                                    </div>
                                    <div class="content-box">
                                        <div class="star-rating">
                                            <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                        </div>
                                          
                                          <style>
                                            .star-rating {
                                             font-size: 23px;  /* Adjust size of stars */
                                            color: gold;      /* Color for filled stars */
                                            }
                                            .star-rating .unfilled
                                             {
                                              color: gold;      /* Color for unfilled stars */
                                             }
                                          </style>
                                        <div class="text"><a href="m2.php" title="">Car Cleaning Kit</a></div>
                                        
                                        <a href="#" class="shoping-btn" id="item8">
                                            <i class="fa-solid fa-cart-shopping"></i> Add To Package
                                        </a>                                    </div>
                                </div>
                            </div>
                            <!-- car-block-fourteen -->
                            <div class="car-block-fourteen col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="m3.php"><img src="images/resource/jump stater kit.jpg" alt=""></a></figure>
                                    </div>
                                    <div class="content-box">
                                        <div class="star-rating">
                                            <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <!-- Unfilled Stars -->
                                            <span class="unfilled">&#9734;</span>
                                        </div>
                                          
                                          <style>
                                            .star-rating {
                                             font-size: 23px;  /* Adjust size of stars */
                                            color: gold;      /* Color for filled stars */
                                            }
                                            .star-rating .unfilled
                                             {
                                              color: gold;      /* Color for unfilled stars */
                                             }
                                          </style>
                                        <div class="text"><a href="m3.php" title="">Jump Starter Kit</a></div>
                                        
                                        <a href="#" class="shoping-btn" id="item9">
                                            <i class="fa-solid fa-cart-shopping"></i> Add To Package
                                        </a>                                    
                                    </div>
                                </div>
                            </div>
                            <!-- car-block-fourteen -->
                            <div class="car-block-fourteen col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="m4.php"><img src="images/resource/tire inflator.jpg" alt=""></a></figure>
                                    </div>
                                    <div class="content-box">
                                        <div class="star-rating">
                                            <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <!-- Unfilled Stars -->
                                            <span class="unfilled">&#9734;</span>
                                        </div>
                                          
                                          <style>
                                            .star-rating {
                                             font-size: 23px;  /* Adjust size of stars */
                                            color: gold;      /* Color for filled stars */
                                            }
                                            .star-rating .unfilled
                                             {
                                              color: gold;      /* Color for unfilled stars */
                                             }
                                          </style>
                                        <div class="text"><a href="m4.php" title="">Tire Inflator</a></div>
                                        
                                        <a href="#" class="shoping-btn" id="item10">
                                            <i class="fa-solid fa-cart-shopping"></i> Add To Package
                                        </a>                                    
                                    </div>
                                </div>
                            </div>
                            <!-- car-block-fourteen -->
                            <div class="car-block-fourteen col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="m5.php"><img src="images/resource/Portable Car Vacuum Cleaner.png" alt=""></a></figure>
                                    </div>
                                    <div class="content-box">
                                        <div class="star-rating">
                                            <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             
                                            
                                           
                                        </div>
                                          
                                          <style>
                                            .star-rating {
                                             font-size: 23px;  /* Adjust size of stars */
                                            color: gold;      /* Color for filled stars */
                                            }
                                            .star-rating .unfilled
                                             {
                                              color: gold;      /* Color for unfilled stars */
                                             }
                                          </style>
                                        <div class="text"><a href="m5.php" title="">Portable Car Vacuum Cleaner</a></div>
                                        
                                        <a href="#" class="shoping-btn" id="item11">
                                            <i class="fa-solid fa-cart-shopping"></i> Add To Package
                                        </a>                                    </div>
                                </div>
                            </div>
                            <!-- car-block-fourteen -->
                            <div class="car-block-fourteen col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="m6.php"><img src="images/resource/Car Air Purifier.jpg" alt=""></a></figure>
                                    </div>
                                    <div class="content-box">
                                        <div class="star-rating">
                                            <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <span>&#9733;</span>
                                             <!-- Unfilled Stars -->
                                            <span class="unfilled">&#9734;</span>
                                        </div>
                                          
                                          <style>
                                            .star-rating {
                                             font-size: 23px;  /* Adjust size of stars */
                                            color: gold;      /* Color for filled stars */
                                            }
                                            .star-rating .unfilled
                                             {
                                              color: gold;      /* Color for unfilled stars */
                                             }
                                          </style> 
                                        <div class="text"><a href="m6.php" title="">Car Air Purifier</a></div>
                                        
                                        <a href="#" class="shoping-btn" id="item12">
                                            <i class="fa-solid fa-cart-shopping"></i> Add To Package
                                        </a>                                    </div>
                                </div>
                            </div>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- End cars-section-fourteen -->

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
<script src="https://code.tidio.co/3hfvpmdgitbrenj9gkyoz8p2mj118rhj.js" async></script>

<script>
    // Show the pre-loader when the page starts loading
    window.addEventListener('load', function() {
        var loader = document.getElementById('loader');
        loader.style.visibility = 'visible'; // Show the loader

                setTimeout(function() {
            loader.style.visibility = 'hidden';
        }, 1000);     });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const maxSelection = 3;

    // Store item names instead of generic IDs
    const items = {
        "item1": "USB Car Charger",
        "item2": "Dashboard Camera",
        "item3": "Tire Pressure Monitor",
        "item4": "Fragrance Dispenser",
        "item5": "Car Phone Holder",
        "item6": "Travel Neck Pillow & Blanket Set",
        "item7": "Emergency Tool Kit",
        "item8": "Car Cleaning Kit",
        "item9": "Jump Starter Kit",
        "item10": "Tire Inflator",
        "item11": "Portable Car Vacuum Cleaner",
        "item12": "Car Air Purifier"
    };

    // Retrieve stored selections across both pages
    let selectedItems = JSON.parse(sessionStorage.getItem("selectedItems")) || [];

    // Function to update button states
    function updateButtons() {
        Object.keys(items).forEach(id => {
            let button = document.getElementById(id);
            if (button) {
                if (selectedItems.includes(items[id])) {
                    button.classList.add("selected");
                } else {
                    button.classList.remove("selected");
                }

                // Disable other buttons if max selections reached
                if (selectedItems.length >= maxSelection && !selectedItems.includes(items[id])) {
                    button.style.pointerEvents = "none";
                    button.style.opacity = "0.5";
                } else {
                    button.style.pointerEvents = "auto";
                    button.style.opacity = "1";
                }
            }
        });
    }

    // Function to show toast messages
    function updateMessage() {
        let message = selectedItems.length === 0 
            ? "Please select three products as your requirements!" 
            : `${selectedItems.length} out of ${maxSelection} selected`;

        let toast = document.getElementById("toast");
        toast.textContent = message;
        toast.style.display = "block";

        setTimeout(() => {
            toast.style.display = "none";
        }, 3500);
    }

    // Button click event listeners
    Object.keys(items).forEach(id => {
        let button = document.getElementById(id);
        if (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                if (selectedItems.includes(items[id])) {
                    // Remove item if already selected
                    selectedItems = selectedItems.filter(item => item !== items[id]);
                } else if (selectedItems.length < maxSelection) {
                    // Add item if space is available
                    selectedItems.push(items[id]);
                }

                // Update sessionStorage globally
                sessionStorage.setItem("selectedItems", JSON.stringify(selectedItems));

                // Save to server
                saveToServer();
                updateButtons();
                updateMessage();
            });
        }
    });

    function saveToServer() {
        fetch("save_selected_items.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ selectedItems })
        });
    }

    // Clear selections when a new car is selected
    let carDropdown = document.getElementById("carSelect"); // Change this ID based on your actual dropdown
    if (carDropdown) {
        carDropdown.addEventListener("change", function () {
            sessionStorage.removeItem("selectedItems");
            selectedItems = [];
            updateButtons();
            updateMessage();
            saveToServer();
        });
    }

    // Initial UI update
    updateButtons();
    updateMessage();

    // Save selected items when the page loads
    if (selectedItems.length > 0) {
        saveToServer();
    }
});

</script>
<script>
document.getElementById("proceedButton").addEventListener("click", function () {
    // Call reset_session.php before redirecting
    fetch("reset_session.php", { method: "POST" })
        .then(response => response.json())
        .then(data => {
            // Proceed to cars.php only after session is reset
            if (data.success) {
                window.location.href = "cars.php";
            } else {
                alert("Error resetting session. Try again.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
});
</script>

</body>
</html>