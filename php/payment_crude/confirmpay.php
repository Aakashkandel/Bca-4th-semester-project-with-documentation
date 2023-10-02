<?php 

include('../connector.php');

$order_id = $_GET['id'];
$qry = "UPDATE ordertable SET payment_status = 'Confirmed' WHERE order_id = $order_id";
$result = mysqli_query($con, $qry);

if ($result) {
    $qry2 = "SELECT * FROM ordertable where order_id=$order_id";
    $result2=mysqli_query($con,$qry2);
    $data2=mysqli_fetch_assoc($result2);
    $product_id=$data2['Product_id'];
    $qry3="UPDATE productdetails SET sell_status = 'Sell',display_home=0 WHERE Product_id = $product_id";
    mysqli_query($con,$qry3);
    $qry4="UPDATE paymenttable SET payment_status = 'Confirmed' WHERE order_id = $order_id";
    mysqli_query($con,$qry4);
    if (mysqli_query($con, $qry4)) {
        $qry5 = "UPDATE paymenttable SET payment_status = 'Rejected' WHERE order_id != $order_id AND product_id = $product_id AND payment_status != 'Confirmed'";
        mysqli_query($con,$qry5);
        $_SESSION['success'] = "Sucessfully Confirmed";
        header("Location: ../../userpayment.php");
        exit();
    } else {
        $em = "Unable to update product details";
        echo $em;
        exit();
    }
} else {
    $_SESSION['error'] = "Unable to confirm payment";
    header("Location: ../../userpayment.php");
    exit();
}
