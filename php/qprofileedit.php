<?php include('connector.php') ?>

<?php
session_start(); 

if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $name = $_POST['uname'];
    $address = $_POST['ulocation'];
    $email = $_POST['uemail'];
    $phone = $_POST['uphone'];
    $gender = $_POST['ugender'];
    $role ="user";

    $img_name = $_FILES['uimage']['name'];
    $img_size = $_FILES['uimage']['size'];
    $tmp_name = $_FILES['uimage']['tmp_name'];
    $error = $_FILES['uimage']['error'];

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            $_SESSION['error'] = $em; 
            header("Location: ../profile.php");
            exit(); 
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_upload_path = 'profilepic/' . $img_name;
            move_uploaded_file($tmp_name, '../' . $img_upload_path);

            $sql = "UPDATE userdetails SET name='$name', email='$email', address='$address', phone='$phone', gender='$gender', image='$img_upload_path', role='$role' WHERE user_id=$uid";

            if (mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con) > 0) {
                    $_SESSION['success'] = 'Update successful';
                    header("Location: ../profile.php");
                    exit(); 
                } else {
                    $_SESSION['error'] = 'No Update'; 
                }
            } else {
                $_SESSION['error'] = 'Error: ' . mysqli_error($con); 
            }
        }
    }
}

header("Location: ../profile.php"); 
exit(); 