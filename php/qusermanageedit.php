<?php include('connector.php') ?>


<?php
if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $name = $_POST['uname'];
    $address = $_POST['ulocation'];
    $email = $_POST['uemail'];
    $phone = $_POST['uphone'];
    $gender = $_POST['ugender'];
    $role = $_POST['urole'];
    $password = $_POST['password'];

    

    $img_name = $_FILES['uimage']['name'];
    $img_size = $_FILES['uimage']['size'];
    $tmp_name = $_FILES['uimage']['tmp_name'];
    $error = $_FILES['uimage']['error'];


    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your image file is too large.";
            $_SESSION['error']=$em;
            header("Location:../usermanage.php");
            exit();
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

 
            $img_upload_path = 'profilepic/' . $img_name;
            move_uploaded_file($tmp_name, '../' . $img_upload_path);



            $sql = "UPDATE  userdetails SET name='$name', email='$email', address='$address', phone='$phone', gender='$gender', password='$password',image='$img_upload_path',role='$role'WHERE user_id=$uid";

            if (mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con)>0) {
                    $_SESSION['success']="Sucessfully updated";

                    header("Location:../usermanage.php");
                } else {
                    $_SESSION['error']="unable to update";
                }
            } else {
                echo 'Error: ' . mysqli_error($con);
            }
        }
    }
}


?>