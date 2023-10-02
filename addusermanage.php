<?php include('php/connector.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/addusermanage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="createbox">
        <div class="createmain-container">
            <div class="createmain-container-inner">
                <h3>Fill User Details</h3>
                <form method="POST" action="php/qaddusermanage.php" enctype="multipart/form-data">
                    
                    <div class="formdiv">
                        <label class="sellicon"><ion-icon name="person-outline"></ion-icon></label>
                        <input type="text" id="sname" required  name="uname" Placeholder="Enter user name">
                    </div>

                    <div class="formdiv">
                        <label class="sellicon"><ion-icon name="mail-outline"></ion-icon></label>
                        <input type="email" id="uemail" required  name="uemail" Placeholder="Enter email">
                    </div>
                    <div class="formdiv">
                        <label class="sellicon"><ion-icon name="location-outline"></ion-icon></label>
                        <input type="text" id="ulocation" required  name="ulocation" Placeholder="Enter address">
                    </div>
                    <div class="formdiv">
                        <label class="sellicon"><ion-icon name="call-outline"></ion-icon></label>
                        <input type="text" id="phone" name="uphone" required  Placeholder="Enter phone number">
                    </div>
                    <div class="formdiv">
                        <label class="sellicon"><ion-icon name="lock-closed-outline"></ion-icon></label>
                        <input type="password" id="pass"  required name="password" Placeholder="Enter password">
                    </div>
                    <div class="formdiv">

                        <input  required type="radio" id="mgender"  value="male" name="ugender">
                        <label for="mgender">Male</label>
                        <input  required type="radio" id="fgender" value="female" name="ugender">
                        <label for="fgender">Female</label>
                        <input  required type="radio" id="ogender" value="others" name="ugender">
                        <label for="ogender">Others</label>
                    </div>

                    <div class="formdiv">
                        <label class="sellicon"><ion-icon name="sync-circle-outline"></ion-icon></label>
                        <select required  name="urole">
                            <option value="user"name="urole">user</option>
                            <option  value="admin"name="urole ">admin</option>
                        </select>
                    </div>
                    <div class="formdiv">
                        <label  required class="sellicon"><ion-icon name="images-outline"></ion-icon></label>
                        <input type="file" id="image" name="uimage">
                    </div>
                    <div></div>
                    <div class="sellercreatebtn">
                        <input type="submit"name="submit" value="Save">
                        <a href="usermanage.php">Exit</a>
                    </div>

                </form>
            </div>





            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        </div>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>


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
	</style>
</head>
<body>
<?php if (isset($_SESSION['success'])) { ?>
        <script type="text/javascript">
            showMessage('<?php echo $_SESSION['success']; ?>', 'success-message');
            <?php unset($_SESSION['success']);
          ?>
        </script>
    <?php } ?>

    <?php if (isset($_SESSION['error'])) { ?>
        <script type="text/javascript">
            showMessage('<?php echo $_SESSION['error']; ?>', 'error-message');
            <?php unset($_SESSION['error']);
         ?>
        </script>
    <?php } ?> 
</body>
</html>









</body>

</html>