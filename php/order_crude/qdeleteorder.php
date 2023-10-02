<?php include('../connector.php'); ?>
<?php
$delete_id = $_GET['id'];
$product_id = $_GET['product_id'];
$sql = "DELETE FROM ordertable WHERE order_id = $delete_id";
$result = mysqli_query($con, $sql);
if ($result) {
    $em="Delete Sucessfully";
    $_SESSION['success']=$em;
    header("location:../../orderlist.php");
} else {
    $em="Unable to delete";
    $_SESSION['error']=$em;
    header("location:../../orderlist.php");
}

?>




