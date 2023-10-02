
<?php include('php/connector.php')?>

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
    <title>adminpage</title>
    <link rel="stylesheet" href="view/app/adminmenu.css">
    <link rel="stylesheet" href="css/adminpage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <style>

    </style>
</head>

<body>

    <div class="adminmain-container" style="max-width:100%;">
        <div class="menudiv"><?php include("view/app/adminmenu.php") ?></div>
        <div class="dashdiv">
             <?php include("view/dashboard.php") ?> 
            
        </div>

    </div>


</body>

</html>