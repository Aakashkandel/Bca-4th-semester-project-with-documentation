<?php
include('php/connector.php');
if (!isset($_SESSION['email']) || !isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header('location:login.php');
}
$email = $_SESSION['email'];
$userid = $_SESSION['user_id'];
?>



<!DOCTYPE html>
<html lang="en" title="Coding design">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Responsive HTML Table With Pure CSS - Web Design/UI Design</title>
    <link rel="stylesheet" href="css/productdetails.css">
    <link rel="stylesheet" href="view/app/usermenu.css">
    <link rel="stylesheet" href="css/productlisting.css">
    <style>
        .pinfo {

            padding: 10px;
            margin: 40px;
            text-align: center;
        }

        .inner-container-pdetails {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15%;
            width: 90vw;
            margin: auto;
            background-color: #fff5;

            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            margin: 1% auto;
        }





        .ptitle {
            background-color: #fff5;

            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;


            padding: 5px 10px;
        }

        .pinfo1 {
            background-color: rgba(125, 17, 125, 0.649);
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            padding: 20px 2px;
        }

        .pinfo2 {
            background-color: rgba(17, 125, 35, 0.649);
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            padding: 20px 2px;

        }

        .pinfo3 {
            background-color: rgba(109, 125, 17, 0.649);
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            padding: 20px 2px;
        }

        .pinfo h2 {
            color: rgb(34, 34, 31)
        }

        .pinfo h3 {
            color: rgba(255, 255, 255, 0.792);
            margin: 10px;
        }

        .pbutton a {
            background-color: rgba(0, 0, 255, 0.517);
            font-size: 18px;
            padding: 5px 10px;
            border-radius: .8rem;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.825);
            cursor: pointer;
            margin-top: 10px;



        }

        .pbutton a:hover {
            background-color: rgba(0, 0, 255, 0.412);
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            transition: .25s;
            transform: scale(0.5);
        }

        .adminmain-container {
            display: flex;
            max-width: 100%;
        }

        .dashdiv {
            flex: 1;
            /* max-width: 100%; */
            margin-left: 65px;
        }

        .menudiv {
            position: fixed;
            z-index: 999;
            width: 200px;


        }

        .btndiv {
            display: flex;

            margin-top: auto;
            justify-content: center;
            align-items: center;

        }

        .pbtn_1 {
            text-decoration: none;
            border: none;
            background-color: red;
            padding: 5px 10px;
            font-size: 26px;
            border-radius: 10px;
            color: white;
            margin: 5px;

        }

        .pbtn_2 {
            text-decoration: none;
            border: none;
            background-color: blue;
            padding: 5px 10px;
            font-size: 26px;
            border-radius: 10px;
            color: white;
            margin: 5px;
        }

        .view {
            text-decoration: none;
            border: none;
            background-color: lightgreen;
            padding: 5px 10px;
            font-size: 30px;
            text-align: center;
            border-radius: 10px;
            color: white;
            margin: 5px;

        }

        .view:hover,
        .pbtn_1:hover,
        .pbtn_2:hover {

            transform: scale(1.1);
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            cursor: pointer;
        }



        /* css for popup */


        .mainedit-container {
            position: fixed;
            top: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(255, 255, 255, 0.16);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.4px);
            -webkit-backdrop-filter: blur(8.4px);
            display: none;
        }





        /* * delete css start from here */
        * {
            margin: 0px;
            padding: 0px;

            font-family: 'Barlow', sans-serif;
            font-family: 'Lato', sans-serif;
            font-family: 'Roboto', sans-serif;
            font-family: 'Ubuntu', sans-serif;

        }

        .main-body-delete {
            background: rgba(255, 255, 255, 0.16);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.4px);
            -webkit-backdrop-filter: blur(8.4px);
            height: 100vh;
            display: none;

            position: fixed;
            top: 0;
            width: 100vw;

        }

        .main-delete-container {


            display: flex;

            height: 100vh;
            display: flex;
            position: fixed;
            top: 0;
            width: 100vw;




        }

        .inner-delete-container {
            background-color: rgba(128, 128, 128, 0.208);
            text-align: center;
            width: 25%;
            border-radius: 16px;
            height: 15%;
            margin: auto;
            padding: 25px;

        }

        .inner-delete-container i {
            color: red;
            font-size: 44px;
        }

        .button {
            margin-top: 25px;
        }

        .button a {
            text-decoration: none;

            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 15px;
        }


        .cancel {
            background-color: rgba(43, 13, 240, 0.773);
            color: white;
        }

        .cancel:hover {
            background-color: rgba(43, 13, 240, 0.35);
        }

        .delete:hover {
            background-color: rgba(255, 0, 0, 0.38);
        }

        .delete {
            background-color: red;
            color: white;
        }
        .message {
            background-color: green;
            color: white;
            width: 20%;
            text-align: center;
            padding: 10px;
            border-radius: .8rem;
            float: right;
            margin: 10px 90px;


        }
    </style>
</head>

<body>

<?php
if (isset($_SESSION['success_edit'])) {
   
    $success=$_SESSION['success_edit'];
    if ($success) {
        echo '<script>';
        echo '$(document).ready(function() {';
        echo '  // Display success message';
        echo '  $("#success-message").show();';

        echo '  // Hide the success message after 5 seconds';
        echo '  setTimeout(function() {';
        echo '    $("#success-message").hide();';
        echo '  }, 5000);';
        echo '});';
        echo '</script>';
    }

    unset($_SESSION['success_edit']); 
}
?>

    <div class="adminmain-container" style="max-width:100%;">
        <div class="menudiv"><?php include("view/app/usermenu.php") ?></div>
        <div class="dashdiv">
        <h3 id="success-message" style="display:none" class="message">Order-listed Sucessfully</h3>



            <main class="table" style="margin-top:3%;">
                <section class="table__header">
                    <h1>Product Details</h1>

                    <div class="input-group">
                        <input type="search" placeholder="Search Data...">
                        <img src="images/search.png" alt="">
                    </div>

                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <?php $sn=1; ?>
                        <tr>
                                    <th> S.N</th>
                                    <th> Product_id</th>
                                    <th>Product_image</th>
                                    
                                    <th>Product_name</th>

                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Product_price</th>
                                   

                                    <th>Product_age</th>
                                    <th>Product_bio</th>

                                    <th>Action</th>
                                    <th>more</th>


                                </tr>
                           
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM productdetails where user_id=$userid ";
                            $r = mysqli_query($con, $sql);
                            while ($data = mysqli_fetch_assoc($r)) {
                            ?>

                                <tr>
                                    <td> <?php echo $sn ?> </td>
                                    <td> <?php echo $data['Product_id'] ?> </td>
                                    <td> <img src="<?php echo $data['product_image'] ?>" alt=""></td>
                                    <td> <?php echo $data['product_name'] ?></td>
                                    <td> <?php echo $data['category_name'] ?> </td>
                                    <td>
                                        <?php echo $data['sell_status'] ?> </td>
                                    </td>

                                    <td> <strong> Rs<?php echo $data['product_price'] ?> </strong></td>
                                    <td> <strong> <?php echo $data['product_age'] ?> </strong></td>
                                    <td> <strong> <?php echo $data['product_bio'] ?> </strong></td>
                                    <td class="pbtn" style="height:100%;">
                                        <div class="btndiv">
                                            <a href="#" onclick="show(<?php echo $data['Product_id'] ?>)" class="pbtn_1 "><ion-icon name="trash-outline"></ion-icon></a>
                                            <a href="#" onclick="showedit(<?php echo $data['Product_id'] ?>)" class="pbtn_2 "><ion-icon name="create-outline"></ion-icon></a>
                                        </div>
                                    </td>
                                    <?php $product_id=$data['Product_id'] ;?>
                                    <td>
                                    <a class="view" href="productcard_productdetails.php?product_id=<?php echo $product_id; ?>"><ion-icon name="eye-outline"></ion-icon></a>

                                    </td>
                                </tr>
                            <?php $sn++; ?>

                            <?php } ?>

                        </tbody>
                    </table>
                </section>
            </main>


        </div>

    </div>
    <div class="main-body-delete" id="maindiv">
        <div class="main-delete-container">
            <div class="inner-delete-container">
                <h2>Are You Want to Delete account?</h2>
                <i class="ri-emotion-sad-line"></i>
                <div class="button">
                    <a href="" id="cancel" onclick="hidden()" class="cancel">Cancel</a>
                    <a id="delete" class="delete">Delete</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        function hidden() {
            var maindiv2 = document.getElementById("maindiv");
            maindiv2.style.display = "none";
        }


        function show(x) {

            document.getElementById("maindiv").style.display = "block";
            document.getElementById("delete").href = "php/productdetails_crude/user_productdelete.php?id=" + x;





        }
    </script>


    <div class="mainedit-container" id="maindivedit">
    <?php
    
    $sql = "SELECT * FROM productdetails where user_id='$userid'";
    $result = mysqli_query($con, $sql);
    if($data = mysqli_fetch_assoc($result)) {
        $productid=$data['Product_id'];
    ?>

        

        <div class="dashdiv">
        



        <form id="action" action="php/productdetails_crude/userproductdetails.php ?productid= <?php echo $productid; ?>" method="POST" enctype="multipart/form-data">
                <h2 class="productlist-title">Product Listing</h2>
                <div class="main-container-pl">
                    <div class="formdiv">

                        <div class="innercontainer-pl1">
                            <div class="productitem-pl">
                                <label for="">Email: </label>
                                <input type="email" style="color:darkblue;" name="email" value="<?php echo $data['user_id'] ?>" readonly />
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

                
                
                <div class="listbtn">
                    <input type="submit" name="listsubmit" value="submit">
                    <a name="cancel" href="#" onclick="hiddenedit();">Cancel</a>



                </div>
            </form>
        </div>

    </div>
    </div>
    
    <?php }?>



    <script>
        function hiddenedit() {
            var maindivedit = document.getElementById("maindivedit");
            maindivedit.style.display = "none";
        }


        function showedit(x) {

            document.getElementById("maindivedit").style.display = "block";
           





        }
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