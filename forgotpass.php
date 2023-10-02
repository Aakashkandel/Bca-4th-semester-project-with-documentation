<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/forgotpass.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Devanagari:wght@400;600;700;900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/beb421fb67.js" crossorigin="anonymous"></script>

</head>


<body>

    <form method="POST" action="php/qforgotpass.php">
        <div class="maincontainer">
            <div class="img1">
                <div class="img1-text">
                    <h2>Forgot Password?</h2>
                    <p>Provid valid email address for reset your password and you can reset your password by click link on your mail</p>
                </div>
                <img src="photo/forgot.png">

            </div>
            <div class="content">
                <a href="homepage.php" class="close-btn fas fa-times"></a>
                <h2>Rest Your Password</h2>
                <img src="photo/forgot2.png" class="contentimg">
                <div class="ltext">
                    <p>Please enter your email address.We will send you an email to reset your password</p>
                </div>



                <div class="epp">

                    <div><input required type="email" class="email" name="femail" placeholder="Enter valid Email"></div>


                    <input type="submit" name="submitemail" class="sendemail" value="Send Email">

                </div>
               


            </div>
        </div>
    </form>

</body>

</html>