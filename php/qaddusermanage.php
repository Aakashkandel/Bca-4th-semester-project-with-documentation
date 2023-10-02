<?php
session_start();
include('connector.php');

if (isset($_POST['submit'])) {
    $name = $_POST['uname'];
    $address = $_POST['ulocation'];
    $email = $_POST['uemail'];
    $phone = $_POST['uphone'];
    $gender = $_POST['ugender'];
    $role = $_POST['urole'];
    $password = $_POST['password'];

    $img_name = $_FILES['uimage']['name'];
    $img_size = $_FILES['uimage']['size'];
    $tmp_name = $_FILES['uimage']['tmp_name'];
    $error = $_FILES['uimage']['error'];


    $emailExistsQuery = "SELECT email FROM userdetails WHERE email = '$email'";
    $emailExistsResult = mysqli_query($con, $emailExistsQuery);
    if (mysqli_num_rows($emailExistsResult) > 0) {
        $em = "Email already exists.";
        $_SESSION['error'] = $em;
        header("Location:../addusermanage.php");
        exit();
    }

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            $_SESSION['error'] = $em;
            header("Location:../addusermanage.php");
            exit();
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_upload_path = 'profilepic/' . $img_name;
            move_uploaded_file($tmp_name, '../' . $img_upload_path);

            
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO userdetails (name, email, address, phone, gender, password, registration_date, image, role) VALUES ('$name', '$email', '$address', '$phone', '$gender', '$hashedPassword', '$registerdate', '$img_upload_path', '$role')";

            if (mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con) > 0) {
                    $em = "User added successfully.";
                    $_SESSION['success'] = $em;
                    header("Location:../usermanage.php");
                    exit();
                } else {
                    $em = "Unable to add user.";
                    $_SESSION['error'] = $em;
                    header("Location:../addusermanage.php");
                    exit();
                }
            } else {
                echo 'Error: ' . mysqli_error($con);
            }
        }
    }
}
?>
