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

    if (isset($_FILES['product_image'])) {
        $img_name = $_FILES['product_image']['name'];
        $img_size = $_FILES['product_image']['size'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $error = $_FILES['product_image']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
                $_SESSION['error'] = "Sorry, your image file is too large.";
                header("Location: ../productmanage.php");
                exit();
            }

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_upload_path = 'databaseimage/' . $img_name;
            move_uploaded_file($tmp_name, '../' . $img_upload_path);

            $qry = "UPDATE productdetails SET product_name = '$product_name', category_name = '$category_name', product_price = '$product_price', product_age = '$product_age', product_bio = '$product_bio', product_image = '$img_upload_path' WHERE user_id = $user";


            $result = mysqli_query($con, $qry);

            if ($result) {
                $pid = mysqli_insert_id($con);
                $_SESSION['success'] = "Product updated successfully";
                header("Location: ../productmanage.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to insert product details.";
                header("Location: ../productmanage.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Unknown error occurred!";
            header("Location: ./addproductmanage.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Product image not found.";
        header("Location: ./productmanageedit.php");
        exit();
    }
}