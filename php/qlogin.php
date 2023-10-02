<?php
include('connector.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM userdetails WHERE email = '$email'";
    $result = mysqli_query($con, $qry);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $hashedPassword = $user['password'];

        if (password_verify($password, $hashedPassword)) {
            $role = $user['role'];
            if ($role === 'admin') {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                header("location: ../adminpage.php");
                exit;
            } elseif ($role === 'user') {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['sucess']="Sucessfully login";
                header("location: ../userafterlogin.php");
                exit;
            }
        } else {
            $_SESSION['error']="Invalid Password";
            header("location: ../login.php");

        }
    } else {
        $_SESSION['error']="User Not Found";
        
        header("location: ../login.php");
    }
}
