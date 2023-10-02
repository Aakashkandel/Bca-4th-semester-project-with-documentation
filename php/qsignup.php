<?php
include('../php/connector.php');
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $registerdate = date('Y-m-d H:i:s');
    $role = "user";

    $img_name = $_FILES['uimage']['name'];
    $img_size = $_FILES['uimage']['size'];
    $tmp_name = $_FILES['uimage']['tmp_name'];
    $error = $_FILES['uimage']['error'];

    $emailExistsQuery = "SELECT email FROM userdetails WHERE email = '$email'";
    $emailExistsResult = mysqli_query($con, $emailExistsQuery);
    if (mysqli_num_rows($emailExistsResult) > 0) {
        $_SESSION['error'] = "User Already Exists.";
        header("Location: ../userhomepage/homepage.php");
        exit();
    }

     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email address.";
        header("Location: ../userhomepage/homepage.php");
        exit();
    } else if (!preg_match('/^\d{10}$/', $phone)) {
        $_SESSION['error'] = "Phone number should be 10 digits and in numeric form.";
        header("Location: ../userhomepage/homepage.php");
        exit();
    } if (strlen($password) < 8 || strlen($password) > 15 || !ctype_upper($password[0]) || !preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)) {
        $_SESSION['error'] ="Password: 8-15 chars, 1 capital, 1 number, 1st letter upper";
        header("Location: ../userhomepage/homepage.php");
        exit();
    }
    
    
    

    if ($error === 0) {
        if ($img_size > 550000) {
            $_SESSION['error'] = "Sorry, your file is too large. Max 550KB limit.";
            header("Location: ../userhomepage/homepage.php");
            exit();
        } else {
           
            $img_upload_path = 'profilepic/' . $img_name;
            move_uploaded_file($tmp_name, '../' . $img_upload_path);

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO userdetails (name, email, address, phone, gender, password, registration_date, image, role) VALUES ('$name', '$email', '$address', '$phone', '$gender', '$hashedPassword', '$registerdate', '$img_upload_path', '$role')";

            if (mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con) > 0) {
                    $_SESSION['success'] = "Successfully Signed Up.";
                    header("Location: ../userhomepage/homepage.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Unable to Signup";
                    header("Location: ../userhomepage/homepage.php");
                    exit();
                }
            } else {
                $_SESSION['error'] = 'Error: ' . mysqli_error($con);
                header("Location: ../userhomepage/homepage.php");
                exit();
            }
        }
    }
}
?>
