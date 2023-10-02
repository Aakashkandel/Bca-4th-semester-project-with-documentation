<?php
include('connector.php');

session_start();

if (isset($_POST['listsubmit'])) {
    $product_name = $_POST['product_name'];
    $category_name = $_POST['category_name'];
    $product_price = $_POST['product_price'];
    $user = $_POST['user'];
    $status = $_POST['status'];
    $product_age = $_POST['product_age'];
    $product_bio = $_POST['product_bio'];

    $checkUserQuery = "SELECT email FROM userdetails WHERE user_id = $user";
    $checkUserResult = mysqli_query($con, $checkUserQuery);

    if (mysqli_num_rows($checkUserResult) > 0) {
       
        $userData = mysqli_fetch_assoc($checkUserResult);
        $email = $userData['email'];

    if (isset($_FILES['product_image'])) {
        $img_name = $_FILES['product_image']['name'];
        $img_size = $_FILES['product_image']['size'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $error = $_FILES['product_image']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
                $_SESSION['error'] = "Sorry, your file is too large.";
                header("Location: ./addproductmanage.php.php");
                exit();
            }

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_upload_path = 'databaseimage/' . $img_name;
            move_uploaded_file($tmp_name, '../' . $img_upload_path);

            $qry = "INSERT INTO productdetails (user_id, product_name, category_name, product_price, product_age, product_bio, product_image) VALUES ($user, '$product_name', '$category_name', '$product_price',  '$product_age', '$product_bio', '$img_upload_path')";

            $result = mysqli_query($con, $qry);

            if ($result) {
                $pid = mysqli_insert_id($con);
                $_SESSION['success'] = "Product added successfully";
                header("Location: ../productmanage.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to insert product details.";
            }
        } else {
            $_SESSION['error'] = "Unknown error occurred!";
            header("Location: ./addproductmanage.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Product image not found.";
    }
}
else{
    $_SESSION['error'] = "UserID doesnot exits";
    header("Location: ../productmanage.php");
    exit();
}
}
?>
