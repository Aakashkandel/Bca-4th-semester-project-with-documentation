<?php include('php/connector.php');?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/passcreate.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+Devanagari:wght@400;600;700;900&family=Poppins&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/beb421fb67.js" crossorigin="anonymous"></script>
</head>

<body>


    <form action="./createpass.php" method="POST">
        <div class="maincontainer">
            <div   class="img1">
                <div class="img1-text">
                    <h2> <span style="color:rgb(4, 220, 235); font-size: 32px;">Welcome,</span> <br>Create Your Own Password</h2>
                    <p>Provid valid email address for reset your password and you can reset your password by click link on your mail</p>
                </div>
                <img src="photo/createpass1.png">

            </div>
            <div class="content">
                <label for="" class="close-btn fas fa-times"></label>
                <h2> Set Your Password</h2>
                <img src="photo/createpass2.png" class="contentimg">
                <div class="ltext">
                    <p>Enter Password must be valid according to the below specification</p>
                </div>
              

                <div class="epp">
                    <div><input required type="password" class="cpass1" name="newpass" placeholder=" New Password"></div>
                    <div><input required type="password" class="cpass2" name="cnewpass" placeholder="Confirm Password"></div>
                    
                    
                    <input type=submit class="submit" value="Set Password" name="submit">
                </div>
                
            </div>
        </div>
    </form>



   

<?php 
$token=$_GET['token'];
$email=$_GET['email'];
if(isset($_POST['submit'])){
    $newpass=$_POST['newpass'];
    $cpass=$_POST['cnewpass'];

    
    if($newpass===$cpass)
    {
        $sql = "UPDATE userdetails SET password='$cpass' WHERE email='$email' AND token='$token'";
        if (mysqli_query($con, $sql)) {
            if (mysqli_affected_rows($con) > 0) {
                echo 'created successfully';
            } else {
                echo 'No rows updated';
            }
        } else {
            echo 'Error: ' . mysqli_error($con);
        }


    }
    else
    {
        echo'password must be same';
    }

}
?>


</body>

</html>