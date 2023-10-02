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
<?php
    $userid = $_GET['id'];
    $sql = "SELECT * FROM productdetails where Product_id='$userid'";
    $result = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
    ?>
   
    <div class="dashdiv">
        <form action="php/qproductedit.php" method="POST" enctype="multipart/form-data">
            <h2 class="productlist-title">Edit Product</h2>
            <div class="main-container-pl">
                <div class="formdiv">

                    <div class="innercontainer-pl1">
                        <div class="productitem-pl">
                            <label for="">user ID: </label>
                            <input type="user"  style="color:darkblue;" name="user" value="<?php echo $data['user_id'] ?>" readonly />
                        </div>

                        <div class="productitem-pl">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" id="productname" value="<?php echo $data['product_name'] ?>" placeholder="Enter Product Name">
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
                            <input type="text" required name="product_price" value="<?php echo $data['product_price'] ?>" id="productname" placeholder="Enter Product Price">
                        </div>
                        <div class="productitem-pl">
                            <label for=""><ion-icon name="images-outline"></ion-icon></label>
                            <input type="file" required name="product_image" id="productimage">
                            <img style="width:200px;" src="<?= $data['product_image'] ?>" alt="">

                        </div>
                        

                        <div class="productitem-pl">
                            <label for="">Product Age</label>
                            <input type="text" required name="product_age" value="<?php echo $data['product_age'] ?>" id="productname" placeholder="ex:1 year used">
                        </div>

                        <div></div>
                    </div>


                    <div class="innercontainer-pl2">
                        <div class="productbio" style="overflow:scroll;">
                            <h2>Product bio</h2>
                            <input type="text" required placeholder="Product Description..." value="<?php echo $data['product_bio'] ?>" name="product_bio" id="productbio">
                        </div>
                    </div>


                </div>

                <div class="imagediv">
                    <img src="productlist.png" alt="productlist.png">
                </div>
            </div>

            <div class="listbtn" >
                <input type="submit" name="listsubmit" value="submit">
                <a name="cancel" href="./productmanage.php">Cancel</a>
                


            </div>
        </form>
    </div>
    <?php }?>
    </div>


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
            }, 5000); // 5 seconds timeout
        }
    </script>
    <style type="text/css">
        .success-message {
            background-color: green;
            color: #fff;
            padding: 20px;
            position: fixed;
            top: 10px;
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
            position: fixed;
            top: 10px;
            right: 10px;
            text-align: center;
            font-size: 24px;
            font-weight: bolder;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php if (isset($_SESSION['success'])) { ?>
        <script type="text/javascript">
            showMessage('<?php echo $_SESSION['success']; ?>', 'success-message');
            <?php unset($_SESSION['success']); ?>
        </script>
    <?php } ?>

    <?php if (isset($_SESSION['error'])) { ?>
        <script type="text/javascript">
            showMessage('<?php echo $_SESSION['error']; ?>', 'error-message');
            <?php unset($_SESSION['error']); ?>
        </script>
    <?php } ?>
</body>
</html>











</body>


</html>