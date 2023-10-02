<?php
include('../php/connector.php'); // Include your database connection

$category = $_POST['category'];
$minPrice = $_POST['minPrice'];
$maxPrice = $_POST['maxPrice'];

$query = "SELECT * FROM productdetails WHERE display_home = 1";

if (!empty($category)) {
    $query .= " AND category_name = '$category'";
}

if (!empty($minPrice) && is_numeric($minPrice)) {
    $query .= " AND product_price >= $minPrice";
}

if (!empty($maxPrice) && is_numeric($maxPrice)) {
    $query .= " AND product_price <= $maxPrice";
}

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
       
        ?>
        <div class="product-item">
            <div style="width:100%; height:65%"><img src="<?= $data['product_image'] ?>" alt="databaseimage" class="productlist-img"></div>
            <div style="margin-top:10px;">
                <h3 class="product-title"><?php echo $data['product_name'] ?></h3>
                <p class="product-price">Rs <?php echo $data['product_price'] ?></p>
                <?php $productid = $data['Product_id'] ?>
                <a href="productcard_afterlogin.php?productid=<?php echo $productid ?>">Buy now</a>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No products found with the selected filters.</p>";
}
?>
