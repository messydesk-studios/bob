<?php
    
    include('../../db.php');
    $id = $_GET['id'];
    
    try {

        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = [];

        if ($stmt->rowCount() > 0) {

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        
        echo "Error: " . $e->getMessage();
    
    }

    $conn = null;

 ?>

<?php

    include('../../db.php');

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    $categories = [];

    if ($result->rowCount() > 0) {
        // output data of each row
        while($row2 = $result->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row2;
        }
    } else {
        echo "0 results";
    }

    $conn = null;



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product - Bob's Marketplace</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <style></style>
</head>

<body>
<div id="container">
    <?php include "../../nav.html"; ?>
        <h2>Update Product</h2>
        <a href="../../index.php">Back to Product List</a>
        <br><br>

        <?php if (count($row) > 0) : ?>
            <form action="../../config/update/product.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="product_name">Product Name:</label>
                <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" required><br>
                <label for="product_name">Description:</label>
                <input type="text" name="descriptions" value="<?php echo $row['descriptions']; ?>" required><br>
                <label for="images">Image:</label>
                <input type="text" name="images" value="<?php echo $row['images']; ?>" required><br>
                
                <label for="category">Category:</label>
                <select name="category" required>
                    <option value="">-- Select Category --</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?=  $cat['id'] ?>"
                            <? ($cat['id'] == $row['category']) ? 'selected' : '' ?>>
                            <?=  htmlspecialchars($cat['category_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>
                <label for="price">Price:</label>
                <input type="text" name="price" value="<?php echo $row['price']; ?>" required><br>
                <label for="stock">Stock:</label>
                <input type="text" name="stock" value="<?php echo $row['stock']; ?>" required><br>
                
                <input type="submit" value="Update Product">
            </form>
        <?php else : ?>
            <p>Data not found</p>
        <?php endif ?>
    </body>
</html>