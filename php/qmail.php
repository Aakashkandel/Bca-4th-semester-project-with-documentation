<?php
session_start();
$server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'myfinalproject';

    $con = mysqli_connect($server, $username, $password, $database);
    if ($con->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
   $id=$_SESSION['femail'];

 
    $registerdate = date('Y-m-d H:i:s');
    function generateToken($registerdate)
    {
        $token = md5($registerdate . uniqid() . microtime());

        return $token;
    }



    $token = generateToken($registerdate);

    $sql = "UPDATE userdetails SET token='$token' WHERE email='$id'";

    if (mysqli_query($con, $sql)) {
        if (mysqli_affected_rows($con) > 0) {
            echo 'Token created successfully';
        } else {
            echo 'No rows updated';
        }
    } else {
        echo 'Error: ' . mysqli_error($con);
    }

  
   ?>

<?php
// Customer's email address
$to = "$id";
$mytoken = "$token";
$url = "localhost/myfinalproject/createpass.php?email=$to && token=$token";
// Email subject
$subject = 'Password Reset';

// Email content
$message = '
<html>
<head>
  <title>Password Reset</title>
</head>
<body>
  <h1>Password Reset</h1>
  <p>Hello,</p>
  <p>We have received a request to reset your password. Click the link below to reset your password:</p>
  <a href="'.$url.'">Reset Password</a>
  <p>If you did not request a password reset, please ignore this email.</p>
  <p>Regards,<br>Your Website Team</p>
</body>
</html>
';

// Email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: your_email@example.com" . "\r\n";

// Send the email
if (mail($to, $subject, $message, $headers)) {
    $esucess='Email sent successfully.';
    header("location: ../forgotpass.php");
} else {
    $enotsend='Failed to send email.';
    header("location: ../forgotpass.php");
}
?>
