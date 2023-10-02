<?php
include('connector.php');
$productid = $_GET['productid'];

// Fetch product details based on productid
$product_query = "SELECT * FROM productdetails WHERE Product_id = $productid";
$product_result = mysqli_query($con, $product_query);

if ($product_data = mysqli_fetch_assoc($product_result)) {
    $product_name = $product_data['product_name'];
  
    $product_price = $product_data['product_price'];

    if (isset($_POST['submit'])) {
        $owneremail = $_POST['email'];
        $name = $_POST['name'];
        $message = $_POST['message'];
        $messagesender = $_SESSION['email'];
       

        $subject = "Message from $name regarding your product: $product_name";

        $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Message from $name</title>
        </head>
        <body>
            <div style='font-family: Arial, sans-serif;'>
                <p>Hello,</p>
                <p>You have received a message from $name regarding your product:</p>
                <p><strong>Product Name:</strong> $product_name</p>
                <p><strong>Product Price:</strong> $product_price</p>
                <p><strong>Sender's Email:</strong> $messagesender</p>
                <p><strong>Message:</strong></p>
                <p>$message</p>
                <p>Please respond to this message as soon as possible.</p>
                <p>Best regards,<br>Second-handbuying and selling goods</p>
            </div>
        </body>
        </html>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: $messagesender\r\n";

        if (mail($owneremail, $subject, $message, $headers)) {
        $_SESSION['success']="Email sent successfully!";
            header("Location: ../productcard_afterlogin.php?productid=$productid ");

        } else {
            $_SESSION['error']= "Email could not be sent.";
            header("Location: ../productcard_afterlogin.php?productid=$productid ");

        }
    }
} else {
    echo "Product not found.";
}
?>