<?php include('connector.php');?>

<?php 
$token=$_GET['token'];
$email=$_GET['email'];
if(isset($_POST['submit'])){
    $newpass=$_POST['newpass'];
    $cpass=$_POST['cnewpass'];

    
    if($newpass===$cpass)
    {
        $sql = "UPDATE userdetails SET password='$cpass' WHERE email='$email' AND token='$token'";
        if (mysqli_query($con, $sql)) {
            if (mysqli_affected_rows($con) > 0) {
                echo 'created successfully';
            } else {
                echo 'No rows updated';
            }
        } else {
            echo 'Error: ' . mysqli_error($con);
        }


    }
    else
    {
        echo'password must be same';
    }

}
?>
