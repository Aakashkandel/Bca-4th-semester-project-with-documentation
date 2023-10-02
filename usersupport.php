<?php
include('php/connector.php');

if (!isset($_SESSION['email']) || !isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
	header('location:login.php');
	exit; 
}

$userid = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>

<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="css/usersupport.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<link rel="stylesheet" href="view/app/usermenu.css">
	<style>
		.adminmain-container {
			display: flex;
			max-width: 100%;
		}

		.dashdiv {
			flex: 1;
			margin-left: 65px;
		}

		.menudiv {
			position: fixed;
			z-index: 999;
			width: 200px;
		}
	</style>
</head>

<body>
	<div class="adminmain-container" style="max-width:100%;">
		<div class="menudiv"><?php include("view/app/usermenu.php") ?></div>
		<div class="dashdiv">
			<div class="container" style="margin-top:2%;">
				<form action="usersupport.php" method="POST">
					<div class="contact-box">
						<div class="left">
							<img style="width:90%; height:auto; margin-top:20px;" src="photo/csupport.png" alt="">
						</div>
						<div class="right">
							<h2>Contact Us</h2>
							<?php $qry = "SELECT * from userdetails where email='$email'";
							$result = mysqli_query($con, $qry);
							$data = mysqli_fetch_assoc($result);
							?>
							<input type="text" name="name" value="<?php echo $data['name']; ?>" class="field" placeholder="Your Name" required>
							<input type="text" name="email" value="<?php echo $data['email']; ?>" class="field" placeholder="Your Email" required>
							<input type="text" name="phone" value="<?php echo $data['phone']; ?>" class="field" placeholder="Phone" required>
							<textarea name="message" placeholder="Message" class="field" required></textarea>
							<button type="submit" name="submit" class="btn">Send</button>
						</div>
					</div>
				</form>
			</div>
			<p style="font-size:x-large; text-align:center;">You can directly contact us<br>Toll free no: 1660010001 Mobile no: 986744915</p>
		</div>
	</div>
</body>

<?php
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$to = 'Aakashkandel9777@gmail.com'; 
	$subject = 'New message from website';
	$headers = "From: $email\r\n";
	$headers .= "Reply-To: $email\r\n";
	$messageBody = "Name: $name\r\n";
	$messageBody .= "Email: $email\r\n";
	$messageBody .= "Phone: $phone\r\n";
	$messageBody .= "Message: $message\r\n";

	if (mail($to, $subject, $messageBody, $headers)) {
		$successMessage = 'Message sent successfully.';
	} else {
		$errorMessage = 'Failed to send message.';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function showMessage(message, className) {
			var messageElement = document.createElement('div');
			messageElement.className = className;
			messageElement.innerText = message;
			document.body.appendChild(messageElement);
			setTimeout(function() {
				messageElement.remove();
			}, 5000); 
		}
	</script>
	<style type="text/css">
		.success-message {
			background-color: green;
			color: #fff;
			padding: 20px;
			position: absolute;
			margin: auto;
			top: 10px;
			right: 10px;
			text-align: center;
			font-size: 24px;
			font-weight: bolder;
			border-radius: 10px;
		}

		.error-message {
			background-color: red;
			color: white;
			padding: 20px;
			margin-bottom: 150px;
			text-align: center;
			font-size: 24px;
			font-weight: bolder;
		}
	</style>
</head>
<body>
	<?php if (isset($successMessage)) { ?>
		<script type="text/javascript">
			showMessage('<?php echo $successMessage; ?>', 'success-message');
			
			setTimeout(function() {
				window.location.href = 'usersupport.php';
			}, 5000); 
		</script>
	<?php } elseif (isset($errorMessage)) { ?>
		<script type="text/javascript">
			showMessage('<?php echo $errorMessage; ?>', 'error-message');
		</script>
	<?php } ?>
</body>
</html>
