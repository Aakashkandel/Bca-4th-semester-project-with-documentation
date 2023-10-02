<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Devanagari:wght@400;600;700;900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/beb421fb67.js" crossorigin="anonymous"></script>
</head>

<body>
    <form method="POST" action="php/qlogin.php">
        <div class="maincontainer">
            <div class="img1">
                <div class="img1-text">
                    <h2>Hello,Welcome Back :)</h2>
                    <p>To keep connected with us please login with your personal information by email address and password</p>
                </div>
                <img src="photo/login.png">

            </div>
            <div class="content">
                <a href="userhomepage/homepage.php" for="" class="close-btn fas fa-times"></a>
                <h2>LOG IN</h2>
                <div class="text2">Do you have an account?<span class="login">Sign Up</span></div>
                <div class="epp">
                    <div><input required type="email" class="email" name="email" placeholder="Log In with Email"></div>
                    <div> <input required type="password" class="password" name="pass" placeholder="Choose a Password"></div>
                    <div class="forgotpass">
                        <a href="forgotpass.php">Forgot Password?</a>
                    </div>
                    <button type="submit" name="submit">Log In</button>
                </div>
                <p class="ltext">By signing up you accept our privacy policy, Terms &<br> Licensing Agreement
                </p>
                
            </div>
        </div>
    </form>
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
   
      
      text-align: center;
      font-size: 24px;
      font-weight: bolder;
      border-radius: 10px;
    }

    .error-message {
     
      color: red;
      padding: 20px;
      margin-bottom: 150px;
      text-align: center;
      font-size: 18px;
      font-weight: bolder;
      align-items: center;
      position: absolute;
      top:23%;
      left:60%;
      border-radius:10px;
      margin: auto;
   
     
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