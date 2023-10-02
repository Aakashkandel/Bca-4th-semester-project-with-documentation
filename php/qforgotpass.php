<?php include('connector.php') ?>
<?php 
if(isset($_POST['submitemail']))
{
    $email=$_POST['femail'];

    $sql="SELECT * FROM userdetails WHERE email='$email' ";
    $result=mysqli_query($con,$sql);
    if ($result->num_rows > 0)
    {
        header("location: qmail.php");
        $_SESSION['femail']=$email;
       
    }
    else
    {
        echo'not found';
    }
    

    
}
?>