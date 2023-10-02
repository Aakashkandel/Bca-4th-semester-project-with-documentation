<?php include('connector.php');?>

<?php 
$userToDelete = $_GET['id'];

$qry = "DELETE FROM userdetails WHERE user_id = $userToDelete";
$result = mysqli_query($con, $qry);

if ($result === TRUE) {
    $_SESSION['success'] ='Data deleted successfully';
    header("Location: ../usermanage.php");
} else {
    $_SESSION['error']='unable to delete';
}
?>
