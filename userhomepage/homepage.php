<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



</head>

<body>
    <?php $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'myfinalproject';

    $con = mysqli_connect($server, $username, $password, $database);
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    ?>







    <div class="supermain-container">
        <div class="innernav-bg">
            <div class="inner-container">
                <div>
                    <h3>LOGO</h3>
                </div>

                <div>
                    <div class="search">
                        <input style="font-size:15px; padding:5px;" type="search" placeholder="search here" name="search" id="live_search">


                    </div>

                </div>




                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var delayTimer;

                        $("#live_search").keyup(function() {
                            clearTimeout(delayTimer);
                            var input = $(this).val();
                            if (input != "") {
                                delayTimer = setTimeout(function() {
                                    searchItems(input);
                                }, 500);
                            } else {
                                $("#searchresult").slideUp();
                            }
                        });

                        function searchItems(input) {
                            $.ajax({
                                url: "../php/livesearch.php",
                                method: "POST",
                                data: {
                                    input: input
                                },
                                success: function(data) {
                                    $("#searchresult").html(data);

                                    $("#searchresult .product_image").css({
                                        "width": "200px",
                                        "height": "150px"
                                    });

                                    $("#searchresult").slideDown();

                                    $("#searchresult tbody tr").hover(function() {
                                        $(this).addClass("highlighted-row");
                                    }, function() {
                                        $(this).removeClass("highlighted-row");
                                    }).click(function() {

                                    });
                                },
                                error: function() {
                                    $("#searchresult").html("Error fetching data from the server.");
                                }
                            });
                        }
                    });
                </script>
                <style>
                    .highlighted-row {
                        background-color: lightcyan;
                    }
                </style>




                <div class="innercontainer-inner">

                    <div class="image">
                        <img src="">
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="authbutton">
                        <a class="btn1" onclick="showPopup();">Sign up</button>
                            <a href="../login.php " class="btn2">Login</a>
                            <script>
                                function showPopup() {
                                    var popup = document.getElementById("popupContainer");
                                    popup.style.display = "block";
                                }
                            </script>

                    </div>
                </div>
            </div>

        </div>
        <div class="authmainbtn-extra">
            <div class="authbuttonextra">
                <button class="btn1extra" onclick="showPopup();">Sign in</button>
                <a href="../login.php " class="btn2extra">Login</a>
                <script>
                    function showPopup() {
                        var popup = document.getElementById("popupContainer");
                        popup.style.display = "block";
                    }
                </script>

            </div>
        </div>



        <div class="mainslider-container">
            <div class="info-container">
                <h2>Welcome to our second-hand product marketplace</h2>
                <div>
                    <p>"Our second-hand marketplace offers an easy way to buy and sell quality used items, from
                        electronics to furniture. Join our community today and save money while reducing waste."</p>
                </div>

                <div class="infobutton">
                    <a href="../login.php" class="infobtn1">Buy Product</a>
                    <a href="../login.php" class="infobtn2">+ Listing Product</a>
                </div>




            </div>

            <div class="slide-container">
                <div class="slider">
                    <div class="slide slide1"><img src="img1.png"></div>
                    <div class="slide slide2"><img src="img2.png"></div>
                    <div class="slide slide3"><img src="img3.png"></div>
                    <!-- <button class="prevBtn">&lt;</button>
                <button class="nextBtn">&gt;</button> -->
                </div>
            </div>
        </div>
        <div class="recentlyadd">
            <h3>Recently Added product</h3>
        </div>
        <div class="main-container">
            <?php

            $sql = "SELECT * FROM productdetails where display_home=1 ORDER BY Product_id DESC LIMIT 3";
            $r = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_assoc($r)) {
                $productid = $data['Product_id'];

            ?>
                <div class="product-slide  ">
                    <div class="product-image">
                        <img src="../<?php echo $data['product_image']; ?>" alt="Product 1">
                    </div>
                    <div class="product-content">
                        <h2><?php echo $data['product_name']  ?></h2>
                        <p><?php echo $data['product_bio']  ?></p>
                        <a href="../login.php">Buy now</a>
                    </div>
                </div>
            <?php } ?>


        </div>
        <div>
            <img style=" width:25%; z-index:10; position:absolute; right:0 ; bottom:0;" src="../photo/girlimg.png" alt="">
        </div>








        <div class="bigcontainerpopup" id="popupContainer">
            <div class="container-signup">
                <div class="box">
                    <a href="homepage.php"><i class="ri-close-line closeicon"></i></a>
                    <h1>Sign Up</h1>
                    <form method="POST" action="../php/qsignup.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div>
                            <i class="ri-user-3-fill"></i>
                            <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
                            <span id="nameError" class="error"></span>
                        </div>
                        <div>
                            <i class="ri-mail-open-fill"></i>
                            <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                            <span id="emailError" class="error"></span>
                        </div>
                        <div>
                            <i class="ri-git-repository-private-fill"></i>
                            <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                            <span id="passwordError" class="error"></span>
                        </div>
                        <div>
                            <i class="ri-map-pin-fill"></i>
                            <input type="address" id="address" name="address" placeholder="Enter Your Address" required>
                            <span id="addressError" class="error"></span>
                        </div>
                        <div>

                            <input type="text" id="address" name="phone" placeholder="Enter Your phone no" required>
                            <span id="addressError" class="error"></span>
                        </div>
                        <div>
                            <i class="ri-image-fill"></i>
                            <input type="file" id="uimage" name="uimage" required>
                            <span id="imageError" class="error"></span>
                        </div>
                        <div>
                            <label>Gender</label>
                            <input type="radio" id="male" name="gender" value="male" required><label for="male">male</label>
                            <input type="radio" id="female" name="gender" value="female" required><label for="female">female</label>
                            <input type="radio" id="others" name="gender" value="others" required><label for="others">others</label>
                            <span id="genderError" class="error"></span>
                        </div>
                        <input type="submit" name="submit" value="signup">
                    </form>
                    <span>
                        Already have an account?
                        <a href="login.php">Login</a>
                    </span>

                </div>
            </div>

        </div>











    </div>



    <div style="background-color:white;position:absolute; width:100%;top:0; text-align:center; margin-top:3%; " id="searchresult"></div>



    <div class="title2block">
    <div>
        <h2>What are you looking for?</h2>
    </div>
    <div>
        <img src="searching.png" alt="searchimg">
        <img src="imgblock2.png" alt="searchimg">
    </div>
    <div class="search-filter">
    <div class="filter-group">
        <label for="category_filter">Category:</label>
        <select id="category_filter">
            <option value="">All Categories</option>
            <option value="Electronics">electronics</option>
            <option value="books">books</option>
            <option value="vehicle">vehicle</option>
           
        </select>
    </div>
        <div class="filter-group">
            <label for="min_price">Min Price:</label>
            <input type="number" id="min_price" placeholder="Min Price">
        </div>
        <div class="filter-group">
            <label for="max_price">Max Price:</label>
            <input type="number" id="max_price" placeholder="Max Price">
        </div>
        <button class="apply-button" onclick="applyFilters()">Apply Filters</button>
    </div>
</div>

        <style>



            
            .search-filter {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                align-items: center;
                background-color: #f7f7f7;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .filter-group {
                display: flex;
                align-items: center;
            }

            .filter-group label {
                font-weight: bold;
                margin-right: 10px;
            }

            .filter-group select,
            .filter-group input {
                padding: 8px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 4px;
                width: 150px;
            }

            .filter-group select {
                flex-grow: 1;
            }


            .apply-button {
                margin-top: 10px;
            }


            optgroup {
                font-weight: bold;
            }


            optgroup option,
            option {
                padding: 10px;
            }


            #category_filter option:hover {
                background-color: #f2f2f2;
            }
        </style>












        <div class="product-grid" style="margin-left:90px;">
            <?php
            $sql = "SELECT * FROM productdetails Where display_home=1";
            $r = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_assoc($r)) {
            ?>


                <div class="product-item">

                    <div style=" width:100%;height:65% "><img src="../<?= $data['product_image'] ?>" alt="databaseimage" class="productlist-img"></div>
                    <div style="margin-top:10px;">
                        <h3 class="product-title"><?php echo $data['product_name'] ?></h3>
                        <p class="product-price">Rs <?php echo $data['product_price'] ?></p>
                        <?php $productid = $data['Product_id'] ?>
                        <a href="../login.php">Buy now</a>
                    </div>


                </div>
            <?php } ?>


        </div>



        <script>
    function applyFilters() {
        var category = document.getElementById("category_filter").value;
        var minPrice = document.getElementById("min_price").value;
        var maxPrice = document.getElementById("max_price").value;

        
        $.ajax({
            url: "php/filter_products.php", 
            method: "POST",
            data: {
                category: category,
                minPrice: minPrice,
                maxPrice: maxPrice
            },
            success: function(data) {
                
                $(".product-grid").html(data);
            },
            error: function() {
                console.log("Error fetching filtered products.");
            }
        });
    }
</script>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Second Handbuying and selling goods</h4>
                    
                </div>
                
                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">vhicles</a></li>
                        <li><a href="#">clothing</a></li>
                        <li><a href="#">electronics</a></li>
                        <li><a href="#">mobiles</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">others</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            </BR>
            <div class="row">
                All rights reserved || Designed By: Aakash kandel
            </div>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <!-- slide-container javascript  -->

    <script>
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.querySelector('.prevBtn');
        const nextBtn = document.querySelector('.nextBtn');

        let currentSlide = 0;
        let slideInterval = setInterval(nextSlide, 3000);

        function nextSlide() {
            slides[currentSlide].style.opacity = 0;
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].style.opacity = 1;
        }

        function prevSlide() {
            slides[currentSlide].style.opacity = 0;
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            slides[currentSlide].style.opacity = 1;
        }

        nextBtn.addEventListener('click', () => {
            clearInterval(slideInterval);
            nextSlide();
            slideInterval = setInterval(nextSlide, 3000);
        });

        prevBtn.addEventListener('click', () => {
            clearInterval(slideInterval);
            prevSlide();
            slideInterval = setInterval(nextSlide, 3000);
        });

        // product slide animation javascript
    </script>

    <script>
        const productSlides = document.querySelectorAll('.product-slide');
        let currentProductSlideIndex = 0;

        function nextProductSlide() {
            productSlides[currentProductSlideIndex].classList.remove('active');
            currentProductSlideIndex = (currentProductSlideIndex + 1) % productSlides.length;
            productSlides[currentProductSlideIndex].classList.add('active');
        }


        nextProductSlide();

        setInterval(nextProductSlide, 3000);
    </script>










    <!DOCTYPE html>
    <html>

    <head>
        <script type="text/javascript">
            function showMessage(message, className) {
                var messageElement = document.createElement('div');
                messageElement.className = className;
                messageElement.innerText = message;
                document.body.appendChild(messageElement);
                setTimeout(function() {
                    messageElement.remove();
                }, 5000);
            }
        </script>
        <style type="text/css">
            .success-message {
                background-color: green;
                color: #fff;
                padding: 20px;
                position: absolute;
                margin: auto;
                top: 80px;
                right: 10px;
                text-align: center;
                font-size: 24px;
                font-weight: bolder;
                border-radius: 10px;
            }

            .error-message {
                background-color: red;
                color: white;
                padding: 20px;
                margin-bottom: 150px;
                text-align: center;
                font-size: 24px;
                font-weight: bolder;
                position: absolute;
                border-radius: 10px;
                margin: auto;
                top: 80px;
                right: 20px;
            }
        </style>
    </head>

    <body>
        <?php if (isset($_SESSION['success'])) { ?>
            <script type="text/javascript">
                showMessage('<?php echo $_SESSION['success']; ?>', 'success-message');
                setTimeout(function() {
                    window.location.href = '../login.php';
                }, 2000);
                <?php unset($_SESSION['success']);
                ?>
            </script>
        <?php } ?>

        <?php if (isset($_SESSION['error'])) { ?>
            <script type="text/javascript">
                showMessage('<?php echo $_SESSION['error']; ?>', 'error-message');
                <?php unset($_SESSION['error']);
                ?>
            </script>
        <?php } ?>
    </body>

    </html>





</body>

</html>