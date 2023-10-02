<?php 
if (isset($_POST['submit']) && isset($_FILES['product_image'])) {
	include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['product_image']);
	echo "</pre>";

	$img_name = $_FILES['product_image']['name'];
	$img_size = $_FILES['product_image']['size'];
	$tmp_name = $_FILES['product_image']['tmp_name'];
	$error = $_FILES['product_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location:./productlisting.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO images(image_url) 
				        VALUES('$new_img_name')";
				mysqli_query($conn, $sql);
				header("Location: view.php");
			}else {
				$em = "You can't upload files of this type";
		        header("Location: ./productlisting.php?error=$em");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: ./productlisting.php?error=$em");
	}

}else {
	header("Location:./productlisting.php");
}
?>