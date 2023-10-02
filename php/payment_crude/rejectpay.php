<?php include ('../connector.php') ?>
<?php 
$order_id=$_GET['id'];
$qry="UPDATE ordertable SET payment_status = 'Rejected' WHERE order_id = $order_id ";
$qry3 = "UPDATE paymenttable AS pt
         JOIN ordertable AS ot ON pt.order_id = ot.order_id
         SET pt.payment_status = 'Rejected', ot.payment_status = 'Rejected'
         WHERE pt.order_id = $order_id";
mysqli_query($con, $qry3);


$result=mysqli_query($con,$qry);
if($result)
{
 $qry2=  "UPDATE productdetails pd JOIN ordertable ot SET pd.display_home = 1 WHERE order_id = $order_id ";
 if(mysqli_query($con,$qry2))
 {
    $_SESSION['succes']="Rejected";
    header("Location: ../../userpayment.php");
 }
 else{
   
   $_SESSION['error']="unable to reject";
   header("Location: ../../userpayment.php");
 }
 

}
else
{
     
   $_SESSION['error']="error occured!";
   header("Location: ../../userpayment.php");
}



?>