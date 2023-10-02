<?php
include('connector.php');

$productid = $_GET['pid'];
$userid = $_GET['userid'];
$currentDate = date("Y-m-d");
$myuserid = $_SESSION['user_id'];

$checkQuery = "SELECT * FROM ordertable WHERE user_id = $userid AND product_id = $productid";
$checkResult = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    $em="Already Ordered";
    $_SESSION['error']=$em;

    header("Location: ../orderlist.php");
    exit();
} else {
    $insertQuery = "INSERT INTO ordertable (order_date, user_id, product_id, customer_id) VALUES ('$currentDate', $userid, $productid, $myuserid)";
    if (mysqli_query($con, $insertQuery)) {

        $orderid = mysqli_insert_id($con);
        $qryy = "SELECT * FROM userdetails WHERE user_id = $userid";
        $result_ = mysqli_query($con, $qryy);
        if ($data_ = mysqli_fetch_assoc($result_)) {
            $user_email = $data_['email'];
            $user_name = $data_['name'];
            $productId = $productid;
            $buyer = $_SESSION['email'];
            $buyer_name = $_SESSION['name'];

            $to = $user_email;
            $subject = "Urgent Payment Verification Request - Customer Order";

            $message = "
            <html>
            <head>
            <title>Urgent Payment Verification Request</title>
            </head>
            <body>
            <p>Dear [$user_name],</p>
            <p>We hope this message finds you well. We are writing to inform you that Mr. $buyer_name, one of our valued customers, has recently made a purchase of your product. We kindly request your prompt attention to verify the payment for the order.</p>
            <p><strong>Order Details:</strong></p>
            <ul>
                <li>Customer Name: Mr. $buyer_name</li>
                <li>Customer Email: $buyer</li>
                <li>Product Id: $productId</li>
            </ul>
            <p>Mr. $buyer_name is eagerly awaiting the verification of the payment to proceed with the order and receive updates regarding the shipment. As the owner of the product, your timely verification is crucial to ensuring customer satisfaction and delivering a seamless experience.</p>
            <p>To complete the necessary steps, we kindly request you to:</p>
            <ol>
                <li>Verify Payment: Please review the payment made by Mr. $buyer_name for the specified order. Once verified, update the payment status in our system accordingly. This will allow us to proceed with the order processing.</li>
                <li>Confirmation Update: Once the payment verification is completed, please notify our team immediately. We will promptly inform Mr. $buyer_name about the successful verification and provide them with the relevant updates on the order status.</li>
            </ol>
            <p>We understand the importance of your time, and we greatly appreciate your swift action in this matter. Your verification will not only facilitate the smooth processing of the order but also contribute to a positive customer experience.</p>
            <p>If you have any questions or require further clarification, please do not hesitate to reach out to our customer support team at [provide contact information]. We are here to assist you in any way we can.</p>
            <p>Thank you for your attention and cooperation. We look forward to receiving the payment verification soon and providing Mr. $buyer_name with the excellent service we strive to deliver.</p>
            <p>Best regards,</p>
            -<p>[Second-hand buying and selling goods]<br>[07-56436675]</p>
            </body>
            </html>
            ";

            
            $headers = "From: [Second-hand buying and selling goods] <[Aakashkandel9777@gmail.com]>\r\n";
            $headers .= "Reply-To: [unable to reply]\r\n";
            $headers .= "Content-type: text/html\r\n";

          
            $mailSent = mail($to, $subject, $message, $headers);
           

            header("Location: payment_crude/qpayment.php?orderid=" . $orderid);
            exit();
        }
    } else {
        header("Location: ../orderlist.php?error=insert");
        exit();
    }
}
?>
