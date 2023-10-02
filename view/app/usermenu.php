

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminpage</title>
    <link rel="stylesheet" href="view/app/usermenu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <div>

    <div class="main-container-mp"  onmouseover="this.style.width='360px'"
     onmouseout="this.style.width='60px'"
     onfocus="this.style.width='360px'"
     onblur="this.style.width='60px'">


            <div class="inner-container-mp">
                <div class="menubar">
                    <ion-icon name="menu-outline" class="toggle" onclick="togglemenu();"></ion-icon>
                </div>
                <h3 style="color:white;">User Menu</h3>
                <div class="navigation">
                    <nav>
                        <ul>
                            <li>
                                <a href="userafterlogin.php">
                                    <span class="icon-mp"><ion-icon name="home-outline"></ion-icon></span>
                                    <span class="title">Home</span>
                                </a>
                            </li>


                            <li>
                                <a href="profile.php">
                                    <span class="icon-mp"><ion-icon name="person-outline"></ion-icon></ion-icon></span>
                                    <span class="title">Profile</span>
                                </a>
                            </li>


                            <li>
                                <a href="productlisting.php">
                                    <span class="icon-mp"><ion-icon name="filter-outline"></ion-icon></ion-icon></span>
                                    <span class="title">Product Listing</span>
                                </a>
                            </li>


                            <li>
                                <a href="productdetails.php">
                                    <span class="icon-mp"><ion-icon name="list-outline"></ion-icon></span>
                                    <span class="title">Product Details</span>
                                </a>
                            </li>


                            <li>
                                <a href="orderlist.php">
                                    <span class="icon-mp"><ion-icon name="cube-outline"></ion-icon></ion-icon></span>
                                    <span class="title">Order List</span>
                                </a>
                            </li>

                            <li>
                                <a href="userpayment.php">
                                    <span class="icon-mp"><ion-icon name="cash-outline"></ion-icon></span>
                                    <span class="title">Payment Confirmation</span>
                                </a>
</li>



                            <li>
                                <a href="usersupport.php">
                                    <span class="icon-mp"><ion-icon name="notifications-outline"></ion-icon></span>
                                    <span class="title">Help center</span>
                                </a>
                            </li>


                            <li>
                                <a href="php/qlogout.php">
                                    <span class="icon-mp"><ion-icon name="log-out-outline"></ion-icon></span>
                                    <span class="title">Logout</span>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>







        </div>





        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script>
            function togglemenu() {
                let toggle = document.querySelector('.toggle');
                let innercontainer = document.querySelector('.inner-container-mp');
                let menubar = document.querySelector('.menubar');
                let maincontainer = document.querySelector('.main-container-mp');
                toggle.classList.toggle('active');
                innercontainer.classList.toggle('active');
                menubar.classList.toggle('active');
                maincontainer.classList.toggle('active');
            }
        </script>

    </div>
</body>

</html>