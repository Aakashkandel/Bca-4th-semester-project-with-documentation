<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'myfinalproject';

    $con = mysqli_connect($server, $username, $password, $database);
    if ($con->connect_error)
    {
        die("Connection failed: " . $con->connect_error);
    }
  
?>

<?php

if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$semail = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>


    <div class="dashmaindiv">
        <div class="dash-title">
            <h2>Dashboard</h2>
        </div>
        <div class="main-boxnotice">
            <div class="boxnotice">
                <h3>Product Sold</h3>
                <div class="boxnotice-inner">
                    <?php
                    $qry1 = "SELECT COUNT(*) AS total_product FROM productdetails WHERE sell_status = 'sell'";
                    $result1 = mysqli_query($con, $qry1);
                    if ($data1 = mysqli_fetch_assoc($result1)) {



                    ?>

                        <div class="boxnotice-info">
                            <h2><span class="pnum"><?php echo $data1['total_product']; ?></span></h2>
                            <p class="date">Total Product Sold<span></span></p>
                        </div>
                        <div class="boxnotice-icon">
                            <span><ion-icon name="cart-outline"></ion-icon></span>

                        </div>

                </div>
            <?php } ?>
            </div>

            <?php
            $qry2 = "SELECT COUNT(*) as total_payment FROM paymenttable";
            $result2 = mysqli_query($con, $qry2);
            if ($data2 = mysqli_fetch_assoc($result2)) {



            ?>



                <div class="boxnotice2">
                    <h3>Payment Transaction</h3>
                    <div class="boxnotice2-inner">

                        <div class="boxnotice2-info">
                            <h2><span class="pnum2"><?php echo $data2['total_payment'] ?></span></h2>
                            <p class="date2">Total Payment Transaction<span></span></p>
                        </div>
                        <div class="boxnotice2-icon">
                            <span><ion-icon name="cash-outline"></ion-icon></span>

                        </div>

                    </div>
                </div>
            <?php } ?>


            <?php
            $qry3 = "SELECT COUNT(*) as total_user FROM userdetails";
            $result3 = mysqli_query($con, $qry3);
            if ($data3 = mysqli_fetch_assoc($result3)) {



            ?>



                <div class="boxnotice3">
                    <h3>User</h3>
                    <div class="boxnotice3-inner">

                        <div class="boxnotice3-info">
                            <h2><span class="pnum3"><?php echo $data3['total_user'] ?></span></h2>
                            <p class="date3">Total User<span></span></p>
                        </div>
                        <div class="boxnotice3-icon">
                            <span><ion-icon name="people-outline"></ion-icon></span>

                        </div>

                    </div>
                </div>
            <?php } ?>



            <?php
            $qry4 = "SELECT COUNT(*) as total_product FROM productdetails";
            $result4 = mysqli_query($con, $qry4);
            if ($data4 = mysqli_fetch_assoc($result4)) {



            ?>



                <div class="boxnotice4">
                    <h3>Product</h3>
                    <div class="boxnotice4-inner">

                        <div class="boxnotice4-info">
                            <h2><span class="pnum"><?php echo $data4['total_product']; ?></span></h2>
                            <p class="date">Total Product<span></span></p>
                        </div>
                        <div class="boxnotice4-icon">
                            <span><ion-icon name="person-outline"></ion-icon></span>

                        </div>

                    </div>
                </div>
            <?php } ?>




        </div>




        <div class="dash-container-2">
            <div class="dash-chart" id="chart">

            </div>
        </div>
        <div class="dash-container-3">
            <div class="recentseller">
                <h3>Recent Listed User</h3>
                <div class="recentseller-inner">
                    <?php
                    $sql = "SELECT * FROM userdetails ORDER BY user_id DESC LIMIT 10";
                    $rs = mysqli_query($con, $sql);
                    while ($d = mysqli_fetch_assoc($rs)) {

                    ?>
                        <div class="csdiv">
                            <div><img src="<?php echo $d['image'] ?>"></div>
                            <div><span><?php echo $d['name']; ?></span></div>
                        </div>
                    <?php } ?>

                   
                </div>

            </div>




            <div class="recentcustomer">
                <div class="recentcustomer">
                    <h3>Recent Listed Product</h3>
                    <div class="recentcustomer-inner">
                    <?php
                    $sql = "SELECT * FROM productdetails ORDER BY Product_id DESC LIMIT 10";
                    $rs = mysqli_query($con, $sql);
                    while ($d = mysqli_fetch_assoc($rs)) {

                    ?>

                        <div class="csdiv">
                            <div><img src="<?php echo $d['product_image']; ?>"></div>
                            <div><span><?php echo $d['product_name'] ?></span></div>
                        </div>
                        <?php } ?>


                        
                    </div>

                </div>
            </div>
        </div>






        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <script>
            var options = {
                series: [{
                        name: 'Product Sold',
                        data: [31, 40, 28, 51, 42, 109, 100]
                    }, {
                        name: 'New Seller',
                        data: [11, 32, 45, 32, 34, 80, 41]
                    },
                    {
                        name: 'New customer',
                        data: [11, 32, 50, 32, 72, 52, 41]
                    },
                    {
                        name: 'Net Profit',
                        data: [11, 32, 45, 86, 34, 4, 41]
                    }
                ],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime',
                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    </div>

</body>

</html>