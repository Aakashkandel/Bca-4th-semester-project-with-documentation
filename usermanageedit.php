<?php include('php/connector.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/usermanageedit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&family=Lato:ital,wght@0,100;0,300;1,100&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>


    <?php
    $userid = $_GET['id'];
    $sql = "SELECT * FROM userdetails where user_id='$userid'";
    $result = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
    ?>

        <div class="createbox">
            <div class="createmain-container">
                <div class="createmain-container-inner">
                    <h3>Fill User Details</h3>
                    <form method="POST" action="php/qusermanageedit.php" enctype="multipart/form-data">
                        <div class="formdiv">
                            <label class="sellicon"><ion-icon name="information-circle-outline"></ion-icon></label>
                            <input type="number" value="<?php echo $data['user_id'] ?>" id="sid" readonly name="uid" Placeholder="Enter user id ">
                        </div>

                        <div class="formdiv">
                            <label class="sellicon"><ion-icon name="person-outline"></ion-icon></label>
                            <input type="text" id="sname" value="<?php echo $data['name'] ?>" required name="uname" Placeholder="Enter user name">
                        </div>

                        <div class="formdiv">
                            <label class="sellicon"><ion-icon name="mail-outline"></ion-icon></label>
                            <input type="email" id="uemail" value="<?php echo $data['email'] ?>" required name="uemail" Placeholder="Enter email">
                        </div>
                        <div class="formdiv">
                            <label class="sellicon"><ion-icon name="location-outline"></ion-icon></label>
                            <input type="text" id="ulocation" value="<?php echo $data['address'] ?>" required name="ulocation" Placeholder="Enter address">
                        </div>
                        <div class="formdiv">
                            <label class="sellicon"><ion-icon name="call-outline"></ion-icon></label>
                            <input type="text" id="phone" value="<?php echo $data['phone'] ?>" name="uphone" required Placeholder="Enter phone number">
                        </div>
                       
                        <div class="formdiv">

                            <input required type="radio" id="mgender" value="male" name="ugender">
                            <label for="mgender">Male</label>
                            <input required type="radio" id="fgender" value="female" name="ugender">
                            <label for="fgender">Female</label>
                            <input required type="radio" id="ogender" value="others" name="ugender">
                            <label for="ogender">Others</label>
                        </div>

                        <div class="formdiv">
                            <label class="sellicon"><ion-icon name="sync-circle-outline"></ion-icon></label>
                            <select required name="urole">
                                <option value="user" name="urole">user</option>
                                <option value="admin" name="urole ">admin</option>
                            </select>
                        </div>
                        <div class="formdiv">
                            <label required class="sellicon"><ion-icon name="images-outline"></ion-icon></label>
                            <input type="file" value="" id="image" name="uimage">

                            <img style="width:15%;" src="<?= $data['image'] ?>" alt="">

                        </div>
                        <div></div>
                        <div></div>
                        <div class="sellercreatebtn">
                            <input type="submit" name="submit" value="Save">
                            <a href="usermanage.php">Exit</a>
                        </div>


                    </form>









                </div>


            <?php } ?>





            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            </div>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        </div>
</body>

</html>