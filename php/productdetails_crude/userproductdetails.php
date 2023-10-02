<?php
include('../connector.php');




if (isset($_POST['listsubmit'])) {
    $product_name = $_POST['product_name'];
    $category_name = $_POST['category_name'];
    $product_price = $_POST['product_price'];
   
    $product_id = $_GET['productid'];
   
    $product_age = $_POST['product_age'];
    $product_bio = $_POST['product_bio'];

    if (isset($_FILES['product_image'])) {
        $img_name = $_FILES['product_image']['name'];
        $img_size = $_FILES['product_image']['size'];
        $tmp_name = $_FILES['product_image']['tmp_name'];
        $error = $_FILES['product_image']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
                $em = "Sorry, your image file is too large.";
                $_SESSION['error'] = $em; 
                header("Location: ../../productdetails.php");
                exit();
            }

            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_upload_path = 'databaseimage/' . $img_name;
            move_uploaded_file($tmp_name, '../' . $img_upload_path);

            $qry = "UPDATE productdetails SET  product_name = '$product_name', category_name = '$category_name', product_price = '$product_price', product_age = '$product_age', product_bio = '$product_bio', Product_image = '$img_upload_path' WHERE Product_id = $product_id";

            $result = mysqli_query($con, $qry);

            if ($result) {
                $pid = mysqli_insert_id($con);
                $_SESSION['success'] = "Sucessfully Update";
                header("Location: ../../productdetails.php");
                exit();
            } else {
                $_SESSION['error']="Failed to update product details.";
                header("Location: ../../productdetails.php");
                exit();
            }
        } else {
            $em = "Unknown error occurred!";
            $_SESSION['error'] = $em; 
            header("Location: ../../productdetails.php");
                exit();
        }
    } else {
        echo "Product image not found.";
    }
}
?>
