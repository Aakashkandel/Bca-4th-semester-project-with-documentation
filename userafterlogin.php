<?php


include('php/connector.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/homepageafterlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/userafterlogin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="adminmain-container" style="max-width:100%;">
        <?php
        if (!isset($_SESSION['email']) && !isset($_SESSION['role'])) {
            header('location:login.php');
        }
        $semail = $_SESSION['email'];
        ?>
        <div class="menudiv"><?php include("view/app/usermenu.php") ?></div>








        <div class="supermain-container">
            <div class="innernav-bg">
                <div class="inner-container">
                    <div>
                        <h3>LOGO</h3>
                    </div>
                    <div class="search">
                        <input type="search" style="padding:5px; font-size:15px;" placeholder="search here" name="search" id="live_search">

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
                                    url: "php/livesearch1.php",
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

                    <?php

                    $sql = "SELECT * FROM userdetails WHERE email='$semail'";
                    $r = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_assoc($r)) {

                    ?>

                        <div class="innercontainer-inner">

                            <div class="image">
                                <img style="width:8%;background-color:white; border-radius:100%;" src="<?php echo $data['image']; ?>">

                            </div>





                            <div class="welcomeuser">
                                <h2>Welcome,</h2><span> <?php echo $data['name']; ?></span>

                            </div>
                        <?php } ?>




                        </div>

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
                        <a href="productlisting.php" class="infobtn2">+ Listing Product</a>
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

            <div class="main-container-pr">

                <?php

                $sql = "SELECT * FROM productdetails where display_home=1 ORDER BY Product_id DESC LIMIT 3";
                $r = mysqli_query($con, $sql);
                while ($data = mysqli_fetch_assoc($r)) {
                    $productid = $data['Product_id'];

                ?>
                    <div class="product-slide  ">
                        <div class="product-image">
                            <img src="<?php echo $data['product_image']; ?>" alt="Product 1">
                        </div>
                        <div class="product-content">
                            <h2><?php echo $data['product_name']  ?></h2>
                            <p><?php echo $data['product_bio']  ?></p>
                            <a href="productcard_afterlogin.php?productid=<?php echo $productid ?>">Buy now</a>
                        </div>
                    </div>
                <?php } ?>





            </div>
            <div>
                <img style=" width:25%; z-index:1000; position:absolute; right:0 ; bottom:0;" src="photo/girlimg.png" alt="">
            </div>







            <div class="bigcontainerpopup" id="popupContainer">

                <div class="createbox">
                    <div class="createmain-container">
                        <div class="createmain-container-inner">
                            <h3>Fill User Details</h3>
                            <form method="POST" action="php/qaddusermanage.php" enctype="multipart/form-data">

                                <div class="formdiv">
                                    <label class="sellicon"><ion-icon name="person-outline"></ion-icon></label>
                                    <input type="text" id="sname" required name="uname" Placeholder="Enter user name">
                                </div>

                                <div class="formdiv">
                                    <label class="sellicon"><ion-icon name="mail-outline"></ion-icon></label>
                                    <input type="email" id="uemail" required name="uemail" Placeholder="Enter email">
                                </div>
                                <div class="formdiv">
                                    <label class="sellicon"><ion-icon name="location-outline"></ion-icon></label>
                                    <input type="text" id="ulocation" required name="ulocation" Placeholder="Enter address">
                                </div>
                                <div class="formdiv">
                                    <label class="sellicon"><ion-icon name="call-outline"></ion-icon></label>
                                    <input type="text" id="phone" name="uphone" required Placeholder="Enter phone number">
                                </div>
                                <div class="formdiv">
                                    <label class="sellicon"><ion-icon name="lock-closed-outline"></ion-icon></label>
                                    <input type="password" id="pass" required name="password" Placeholder="Enter password">
                                </div>
                                <div class="formdiv">

                                    <input required type="radio" id="mgender" value="male" name="ugender">
                                    <label for="mgender">Male</label>
                                    <input required type="radio" id="fgender" value="female" name="ugender">
                                    <label for="fgender">Female</label>
                                    <input required type="radio" id="ogender" value="others" name="ugender">
                                    <label for="ogender">Others</label>
                                </div>

                                <div class="formdiv">
                                    <label class="sellicon"><ion-icon name="sync-circle-outline"></ion-icon></label>
                                    <select required name="urole">
                                        <option value="user" name="urole">user</option>
                                        <option value="admin" name="urole ">admin</option>
                                    </select>
                                </div>
                                <div class="formdiv">
                                    <label required class="sellicon"><ion-icon name="images-outline"></ion-icon></label>
                                    <input type="file" id="image" name="uimage">
                                </div>
                                <div></div>
                                <div class="sellercreatebtn">
                                    <input type="submit" name="submit" value="Sign Up">
                                    <a href="usermanage.php">Exit</a>
                                </div>

                            </form>
                        </div>





                        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                    </div>
                    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
                </div>
            </div>

        </div>
        <script>

        </script>
        <div style="background-color:white;position:absolute; margin-left:3.5em; width:97%;top:0; text-align:center; margin-top:3%; " id="searchresult"></div>



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

                    <div style=" width:100%;height:65% "><img src="<?= $data['product_image'] ?>" alt="databaseimage" class="productlist-img"></div>
                    <div style="margin-top:10px;">
                        <h3 class="product-title"><?php echo $data['product_name'] ?></h3>
                        <p class="product-price">Rs <?php echo $data['product_price'] ?></p>
                        <?php $productid = $data['Product_id'] ?>
                        <a href="productcard_afterlogin.php?productid=<?php echo $productid ?>">Buy now</a>
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
        <!-- Add more product items here -->


        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4> buying and selling goods</h4>
                        
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

    </div>

    </div>



</body>

</html>