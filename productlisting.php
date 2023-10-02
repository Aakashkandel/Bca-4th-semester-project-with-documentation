<?php
include('php/connector.php');
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$email = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/productlisting.css">
    <link rel="stylesheet" href="css/userafterlogin.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Product listing</title>
</head>

<body>
    <div class="adminmain-container" style="max-width:100%;">
        <div class="menudiv"><?php include("view/app/usermenu.php") ?></div>

    </div>
    <div class="dashdiv">
        <form action="php/qproductlisting.php" method="POST" enctype="multipart/form-data">
            <h2 class="productlist-title">Product Listing</h2>
            <div class="main-container-pl">
                <div class="formdiv">

                    <div class="innercontainer-pl1">
                        <?php

                        $userqry = "SELECT * from userdetails where email='$email'";
                        $result = mysqli_query($con, $userqry);
                        $data1 = mysqli_fetch_assoc($result);
                        ?>

                        <input type="hidden" name="user" value="<?php echo $data1['user_id'] ?>">
                        <input type="hidden" name="status" value="pending">
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
                        <div  style= "padding:3%;" class="productbio">
                            <h2>Product bio</h2>
                            <input  type="text" required placeholder="Product Description..." name="product_bio" id="productbio">
                        </div>
                    </div>


                </div>

                <div class="imagediv">
                    <img src="productlist.png" alt="productlist.png">
                </div>
            </div>

            <div class="listbtn">
                <input type="submit" name="listsubmit" value="submit">
                <a name="cancel" href="./userafterlogin.php">Cancel</a>


            </div>
        </form>
    </div>
    </div>











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
      top: 10px;
      right: 10px;
      text-align: center;
      font-size: 24px;
      font-weight: bolder;
      border-radius: 10px;
    }

    .error-message {
      background-color:red;
      color: white;
      padding: 20px;
      margin-bottom: 150px;
      text-align: center;
      font-size: 24px;
      font-weight: bolder;
      position: absolute;
      border-radius:10px;
      margin: auto;
      top: 50px;
      right: 20px;
    }
  </style>
</head>

<body>
<?php if (isset($_SESSION['success'])) { ?>
        <script type="text/javascript">
            showMessage('<?php echo $_SESSION['success']; ?>', 'success-message');
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