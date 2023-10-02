<?php include('../connector.php');?>
<?php 
$order_id=$_GET['orderid'];
$sql="SELECT * FROM ordertable where order_id=$order_id ";
$result=mysqli_query($con,$sql);
if($data=mysqli_fetch_assoc($result))

{
    $product_id=$data['Product_id'];
    $paymentqry="INSERT INTO paymenttable (Product_id,order_id)values($product_id,$order_id)  ";
    $pay_result=mysqli_query($con,$paymentqry);
    if($pay_result){
     
        $em="Order has been placed successfully";
            $_SESSION['success']=$em;

        header("Location: ../../orderlist.php");

    }

}

?>