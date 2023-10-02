<?php 
include('php/connector.php');
if (!isset($_SESSION['email'])) {
    header('location:login.php');
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/productlisting.css">
    <link rel="stylesheet" href="css/userafterlogin.css">
    <link rel="stylesheet" href="view/app/adminmenu.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Product listing</title>
</head>

<body>
    <div class="adminmain-container" style="max-width:100%;">
        <div class="menudiv"><?php include("view/app/adminmenu.php") ?></div>

    </div>
    <div class="dashdiv">
        <form action="php/qproductadd.php" method="POST" enctype="multipart/form-data">
            <h2 class="productlist-title">Product Listing</h2>
            <div class="main-container-pl">
                <div class="formdiv">

                    <div class="innercontainer-pl1">
                        <div class="productitem-pl">
                            <label for="">userID: </label>
                            <input type="text"  placeholder="Enter user id" name="user"  >
                        </div>

                        <div class="productitem-pl">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" id="productname" placeholder="Enter Product Name">
                        </div>

                        <div class="productitem-pl">
                            <label for="">Select Category</label>
                            <select name="category_name">
                                <option>Vehicle</option>
                                <option>Clothing</option>
                                <option selected>Select Category</option>
                                <option>Electronics</option>
                                <option>Home Goods</option>
                                <option>books</option>
                                <option>others</option>

                            </select>
                        </div>


                        <div class="productitem-pl">
                            <label for="">Product Price</label>
                            <input type="text" required name="product_price" id="productname" placeholder="Enter Product Price">
                        </div>
                        <div class="productitem-pl">
                            <label for=""><ion-icon name="images-outline"></ion-icon></label>
                            <input type="file" required name="product_image" id="productimage">

                        </div>
                        
                        <div class="productitem-pl">
                            <label for="">Product Age</label>
                            <input type="text" required name="product_age" id="productname" placeholder="ex:1 year used">
                        </div>

                        <div></div>
                    </div>


                    <div class="innercontainer-pl2">
                        <div class="productbio">
                            <h2>Product bio</h2>
                            <input type="text" required placeholder="Product Description..." name="product_bio" id="productbio">
                        </div>
                    </div>


                </div>

                <div class="imagediv">
                    <img src="productlist.png" alt="productlist.png">
                </div>
            </div>

            <div class="listbtn">
                <input type="submit" name="listsubmit" value="submit">
                <a name="cancel" href="./addproductmanage.php">Cancel</a>


            </div>
        </form>
    </div>
    </div>
</body>


</html>