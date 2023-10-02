<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }

    .product-image-cell img {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

</style>
<?php
include('../php/connector.php');

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM productdetails WHERE product_name LIKE '{$input}%' OR category_name LIKE '{$input}%'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>


            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                   
                    <tr>
                   
                        <td class="product-image-cell"><img src="<?php echo $row['product_image']; ?>"></td>  
                        <td class="product-name"><?php echo $row['product_name']; ?></td>
                        <td class="category-name"><?php echo $row['category_name']; ?></td>
                        <td class="product-price"><?php echo $row['product_price']; ?></td>
                        <td class="product-price">  <a href="productcard_afterlogin.php?productid=<?php echo $row['Product_id']?>"> buy</a></td>
                    </tr>
                    
                <?php } ?>
            </tbody>



        </table> 
<?php } else {
        echo "<h6>No data Found</h6>";
    }
}
?>

<script>
    function show(x) {


document.getElementById("delete").href = "../productcard_afterlogin.php?id=" + x;





}
</script>