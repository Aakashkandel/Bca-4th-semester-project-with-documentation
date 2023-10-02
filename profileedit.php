<?php include('php/connector.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
    *{
    margin:0px;
    padding:0px;
    
 font-family: 'Barlow', sans-serif;
font-family: 'Lato', sans-serif;
font-family: 'Roboto', sans-serif;
font-family: 'Ubuntu', sans-serif;

}
body{
    background-color: rgb(3, 20, 35);
    
}
.createmain-container{
    
background: rgba(255, 255, 255, 0.22);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.2px);
-webkit-backdrop-filter: blur(7.2px);
border: 1px solid rgba(255, 255, 255, 0.16);
    width:120vh;
    height:60vh;
    padding:0px 15px;
    
    

}
.createmain-container form{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    

}
.formdiv{
    margin-top:12px;
    background: rgba(255, 255, 255, 0.37);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(5.9px);
    -webkit-backdrop-filter: blur(5.9px);
    border-radius:15px;
    margin-right: 10px;
    padding:15px;
    align-items: center;
}
.sellicon{
    font-size:20px;
    text-align: center;
    padding-top:10px;
    
}
.createmain-container form input{
font-size:18px;
padding:2px 2px 2px 10px; 
border:none;
margin-left:10px;
border-radius:15px;

}
.createmain-container-inner h3{
    text-align: center;
    background-color: blue;
    width:300px;
    margin: 20px auto;
    color:white;
    border-radius: 15px;
    padding:5px;
}
.sellercreatebtn{
    
    margin :12px;
    text-align: center;
    padding:7px;

}
.sellercreatebtn a{
    text-decoration: none;
    background-color: white;
    padding:5px 10px;
    color:black;
    border-radius:15px;
    margin:0px 10px;
}

.sellercreatebtn input{
    background-color:blue;
    color:white;
    padding:5px 10px;
    text-align: center;
    cursor: pointer;
    font-weight: lighter;
}
.createbox{
    display: flex;
    justify-content: center;
    align-items: center;
    height:100vh;
}



.adminmain-container{
    display:flex;
    max-width: 100%;
}
.dashdiv{
    flex:1;
    /* max-width: 100%; */
    margin-left: 65px;
}
.menudiv{
   position:fixed;
     z-index: 999; 
    width: 200px;


}
 </style>
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
                    <form method="POST" action="php/qprofileedit.php" enctype="multipart/form-data">
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
                            <label required class="sellicon"><ion-icon name="images-outline"></ion-icon></label>
                            <input type="file" required value="<?php echo $data['image']?>" id="image" name="uimage">

                            <img style="width:20%;" src="<?= $data['image'] ?>" alt="">

                        </div>
                        <div></div>
                        <div></div>
                        <div class="sellercreatebtn">
                            <input type="submit" name="submit" value="Save">
                            <a href="profile.php">Exit</a>
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