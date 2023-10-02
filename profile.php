<?php
include('php/connector.php');

if (!isset($_SESSION['email']) || !isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
	header('location:login.php');
	exit; 
}

$userid = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/userafterlogin.css">
  <title>Document</title>





</head>

<div class="adminmain-container" style="max-width:100%;">
  <div class="menudiv"><?php include("view/app/usermenu.php") ?></div>
  <?php
  $semail = $_SESSION['email'];
  $sql = "SELECT * FROM userdetails Where email='$semail' ";
  $result = mysqli_query($con, $sql);
  while ($data = mysqli_fetch_assoc($result)) {


  ?>


    <div class="dashdiv">
      <div class="profile-title">
        <h2>Profile</h2>
      </div>

      <div class="profileimage">
        <img src="<?= $data['image'] ?>" alt="">

      </div>


      <div class="main-container-profile">

        <div class="profileinfo">


          <div class="inner-profileinfo">
            <label>user_id: <span> <?php echo $data['user_id']; ?></span></label>
          </div>


          <div class="inner-profileinfo">
            <label>Name: <span><?php echo $data['name']; ?></span></label>
          </div>

          <div class="inner-profileinfo">
            <label>Email: <span><?php echo $data['email']; ?></span></label>
          </div>

          <div class="inner-profileinfo">
            <label>Address: <span><?php echo $data['address']; ?></span></label>
          </div>

          <div class="inner-profileinfo">
            <label>phone no: <span><?php echo $data['phone']; ?></span></label>
          </div>

          <div class="inner-profileinfo">
            <label>Gender: <span><?php echo $data['gender']; ?></span></label>
          </div>


        </div>

        <div style=" width:50%; height:100%; display:flex; justify-content:center;" class="bankdetails">


          <img style="width:32%; height:auto;" src="photo/profile.png" alt="">


        </div>

      </div>
    <?php } ?>






    <div class="changepass-profile">
      <h2>Change Password</h2>
      <form action="profile.php" method="POST">
        <div class="passdiv">
          <label>Old Password</label>
          <input type="password" name="oldpass" required placeholder="Enter old Password">
        </div>

        <div class="passdiv">
          <label> New Password</label>
          <input type="password" name="newpass1" required placeholder="Enter new Password">
        </div>

        <div class="passdiv">
          <label>Confirm Password</label>
          <input type="password" name="newpass2" required placeholder="Confirm Password">
        </div>

        <div class="passdiv-button">
          <input type="submit" value="Change Password" name="changepass">
        </div>

      </form>
    </div>
    <div class="editbtn">
      <a href="profileedit.php?id=<?php echo $userid ?>">Edit Profile</a>
    </div>

    </div>
</div>








<?php


if (isset($_POST['changepass'])) {
  $oldpass = $_POST['oldpass'];
  $newpass1 = $_POST['newpass1'];
  $newpass2 = $_POST['newpass2'];

  $check = "SELECT * FROM userdetails WHERE email = '$email'";
  $res = mysqli_query($con, $check);

  if ($data = mysqli_fetch_assoc($res)) {
    $haspassword = $data['password'];

    if (password_verify($oldpass, $haspassword)) {
      if ($newpass1 === $newpass2) {
        $hashedPassword = password_hash($newpass1, PASSWORD_BCRYPT);

        $sql = "UPDATE userdetails SET password = '$hashedPassword' WHERE email = '$email' AND user_id = $userid";

        if (mysqli_query($con, $sql)) {
          $_SESSION['success'] = 'Password changed successfully.'; 
          
        
        } else {
          $_SESSION['error'] = 'Unable to change password.'; 
        }
      } else {
        $_SESSION['error'] = 'Passwords do not match.'; 
      }
    } else {
      $_SESSION['error'] = 'Incorrect old password.'; 
    }
  } else {
    $_SESSION['error'] = 'User not found.'; 
  }
}
?>





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