<?php
session_start();
include('connector.php');

$delete_id = $_GET['id'];
$qry1 = "SELECT * FROM productdetails WHERE Product_id = $delete_id";
$result1 = mysqli_query($con, $qry1);


if ($data = mysqli_fetch_assoc($result1)) {
    $delete_id = $_GET['id'];
    $sql = "DELETE FROM productdetails WHERE product_id = '$delete_id'";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        $_SESSION['success'] = 'Product deleted successfully';
        header("Location: ../productmanage.php");
        exit();
    }
} else {
    $_SESSION['error'] = 'Sorry, Unable to delete';
    header("Location: ../productmanage.php");
    exit();
}
?>
