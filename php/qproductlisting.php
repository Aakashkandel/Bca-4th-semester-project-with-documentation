<?php
include('connector.php');

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
            if ($img_size > 5 * 1024 * 1024 * 1024) { 
                $_SESSION['error'] = "Sorry, your file is too large. Max 5 GB limit.";
                header("Location: ../userhomepage/homepage.php");
                exit();
            } else {
                $img_upload_path = 'databaseimage/' . $img_name;
                move_uploaded_file($tmp_name, '../' . $img_upload_path);

                $qry = "INSERT INTO productdetails (user_id, product_name, category_name, product_price, product_age, product_bio, product_image) VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($con, $qry);
                mysqli_stmt_bind_param($stmt, "issssss", $user, $product_name, $category_name, $product_price, $product_age, $product_bio, $img_upload_path);

                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['success'] = "Product details inserted successfully.";
                    header("Location: ../productdetails.php");
                    exit();
                } else {
                    echo "Failed to insert product details.";
                }
            }
        } else {
            $em = "Unknown error occurred!";
            $_SESSION['error'] = $em;
            header("Location: ../productlisting.php");
            exit();
        }
    } else {
        echo "Product image not found.";
    }
}
?>
