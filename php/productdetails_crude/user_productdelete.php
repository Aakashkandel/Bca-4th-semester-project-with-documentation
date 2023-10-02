<?php
include('../connector.php');
session_start(); 

$delete_id = $_GET['id'];
$qry1 = "DELETE FROM productdetails  WHERE Product_id='$delete_id' ";
$result = mysqli_query($con, $qry1);

if ($result) {
    $em = 'Delete Successfully';
    $_SESSION['success'] = $em; 
    header("location: ../../productdetails.php");
} else {
    $em = 'Sorry, Unable to delete';
    $_SESSION['error'] = $em; 
    header("location: ../../productdetails.php");
}
?>
