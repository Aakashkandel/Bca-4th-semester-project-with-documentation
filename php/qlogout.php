<?php include('connector.php') ;
if(isset($_SESSION['email']))
{
    session_unset();
    session_destroy();
    header('location:../userhomepage/homepage.php');
}




?>

