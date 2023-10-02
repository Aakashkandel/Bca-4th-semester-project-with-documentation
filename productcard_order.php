<?php
include('php/connector.php');
if (!isset($_SESSION['email']) || !isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
    header('location:login.php');
}
$order_id = $_GET['orderid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            font-family: 'Barlow', sans-serif;
            font-family: 'Lato', sans-serif;
            font-family: 'Roboto', sans-serif;
            font-family: 'Ubuntu', sans-serif;
            background-color: rgba(128, 128, 128, 0.273);
        }

        .card_img1 {
            background-color: rgba(189, 190, 191, 0.277);


            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;
            width: 100%;
        }

        .main-container-card {
            background-color: rgba(196, 225, 255, 0.852);


            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            border-radius: .8rem;

            width: 80%;
            padding: 2%;
            margin: auto;
            margin-top: 20px;
        }

        .inner-container-card {
            display: flex;
            align-items: center;


        }

        .card_sep {

            width: 70%;
            margin-left: 40px;
            padding: 10px;

            display: grid;
            grid-template-columns: repeat(2, 1fr);



        }

        .card_sep h3 {
            margin-right: 20px;
        }

        .product_bio {


            height: 10vh;
            font-size: 18px;

            padding-top: 30px;

            width: 100%;


            max-height: 150px;
            overflow-y: auto;

            padding: 10px;
        }

        .card_img2 {
            width: 20%;
        }

        .note {

            width: 50%;
            margin: auto;
            font-size: 20px;
            margin-top: 20px;
        }

        .card_but a {
            text-decoration: none;

            color: #fff;
            padding: 10px 20px;
            border-radius: .8rem;
            font-size: 15px;

        }

        .backbtn {
            background-color: rgba(128, 128, 128, 0.809);
            margin: 10px;
        }

        .buybtn {
            background-color: green;
        }

        .card_but {

            text-align: center;
            margin-top: 10px;
            transition: .25s;
        }

        .card_but button {
            background-color: blue;
            border: none;
            padding: 10px 20px;
            border-radius: .8rem;
            margin: 10px;
            color: white;
            font-size: 15px;
            transition: .25s;

        }

        .card_but button:hover {

            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            cursor: pointer;
        }

        .card_but a:hover {
            transform: scale(1.1);
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            cursor: pointer;

        }

        .backbtn {
            background-color: gray;
        }

        .main-container-card h2 {
            text-align: center;
            border-bottom: 3px solid rgba(128, 128, 128, 0.534);
        }

        /* css for buy option */

        .master-maindiv {
            background: rgba(255, 255, 255, 0.06);
            display: none;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.5px);
            -webkit-backdrop-filter: blur(8.5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            height: 100vh;
            position: fixed;
            top: 0;
            width: 100vw;


        }

        .main-container-qr {



            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.5px);
            -webkit-backdrop-filter: blur(8.5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .inner-container-qr {
            background-color: lightseagreen;
            border-radius: .8rem;
            width: 50%;
            height: 75%;
            text-align: center;
        }

        .info-qr p {
            padding: 10px 110px;
            font-size: 20px;
        }

        .btn-qr {
            width: 60%;
            margin: auto;

            padding: 10px 20px;
            color: white;
            font-size: 20px;

            border-radius: .8rem;

        }


        .btn-qr1 {
            background-color: rgba(128, 128, 128, 0.725);
        }

        .btn-qr2 {
            color: white;
            font-weight: bold;
            padding: 10px 250px;
            background-color: rgba(0, 0, 255, 0.676);
            text-decoration: none;
            border-radius: .8rem;

        }

        .btn-qr2:hover,
        .btn-qr1:hover {
            backdrop-filter: blur(7px);
            box-shadow: 0 .4rem .8rem #0005;
            cursor: pointer;
        }

        .img1-qr {
            width: 50%;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php $dqry = "SELECT * FROM productdetails p JOIN ordertable od ON p.Product_id=od.Product_id JOIN userdetails u ON u.user_id=p.user_id WHERE od.order_id=$order_id";
    $result = mysqli_query($con, $dqry);
    if ($data = mysqli_fetch_assoc($result)) {



    ?>
        <div class="main-container-card">
            <h2>Product Card</h2>
            <div class="inner-container-card">
                <div><img class="card_img1" src="<?php echo $data['product_image'] ?>" alt=""></div>
                <div class="card_sep">
                    <div>
                        <h3>Order ID:</h3><?php echo $data['order_id'] ?></p>
                    </div>
                    <div>
                        <h3>Product ID:</h3><?php echo $data['Product_id'] ?></p>
                    </div>
                    <div>
                        <h3>Product Name:</h3><?php echo $data['product_name'] ?></p>
                    </div>
                    <div>
                        <h3>Category:</h3>
                        <p><?php echo $data['category_name'] ?></p>
                    </div>

                    <div>
                        <h3>Owner contact no.:</h3>
                        <p><?php echo $data['phone'] ?></p>
                    </div>
                    <div>
                        <h3>Owner email:</h3>
                        <p><?php echo $data['email'] ?></p>
                    </div>
                    <div>
                        <h3>Location:</h3>
                        <p><?php echo $data['address'] ?></p>
                    </div>

                    <div>
                        <h3>Used:</h3>
                        <p> <?php echo $data['product_age'] ?> </p>
                    </div>
                    <div class="product_bio" sytle="overflow:scroll;">
                        <?php echo $data['product_bio'] ?>

                    </div>
                </div>
                <img src="product_card.png" class="card_img2" alt="product_card.png">

            </div>


            <div class="card_but">
                <a href="orderlist.php" class="backbtn">Back</a>

                
            </div>
        <?php } ?>

        </div>
        <div class="note"> Note:If you want to know more details about this product,You can directly contact to the owner. </div>
        <div class="master-maindiv" id="maindiv-qr">
            <div class="main-container-qr " onclick="hidden();">
                <div class="inner-container-qr">
                    <h2>Cash on Delivery</h2>
                    <div class="img1-qr">
                        <img src="photo/cod.png" alt="cod.png">
                    </div>
                    <div class="info-qr">

                        <p>This system operates in a manner where, upon the owner's acceptance of the payment, a duplicate copy of the bill is automatically sent to the designated email address.</p>
                    </div>
                    <div class="btn-qr">
                        <a class="btn-qr2" id="done">Done</a>
                    </div>
                    <p><span style="font-weight: bold;">Note:</span>Please,click done button for your Orderlist</p>
                </div>
            </div>
        </div>
        <script>
            function show(x, y) {
                var maindivqr = document.getElementById('maindiv-qr');
                maindivqr.style.display = "block";
                document.getElementById('done').href = "php/qorderlist.php?pid=" + x + "&userid=" + y;



            }

            function hidden() {

                var maindivqr2 = document.getElementById('maindiv-qr');
                maindivqr2.style.display = "none";


            }
        </script>
</body>

</html>