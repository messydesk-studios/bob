<?php

    include('../../db.php');

    $categories = [];
    try {
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);

        if ($result && $result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = $row;
            }
        }
    } catch (PDOException $e) {
        echo "Query Error: " . $e->getMessage();
    }

    $conn = null;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product - Bob's Marketplace</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
    <style></style>
</head>

<body>
<div id="container">
    <?php include "../../nav.html"; ?>
        <h2>Create Product</h2>
        <a href="../../index.php">Back to Product List</a>
        <br><br>
        <form action="../../config/create/product.php" method="post">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required><br>
            <label for="descriptions">Description:</label>
            <input type="text" name="descriptions" required><br>
            <label for="images">Image:</label>
            <input type="text" name="images" required><br>
            <label for="category">Category:</label>
                <select name="category" required>
                    <option value="">-- Select Category --</option>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $cat) : ?>
                            <option value="<?php echo $cat['id']; ?>"?>
                                <?php echo htmlspecialchars($cat['category_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No categories found</option>
                    <?php endif; ?>
                        
                </select><br>
            <label for="price">Price:</label>
            <input type="text" name="price" required><br>
            <label for="stock">Stock:</label>
            <input type="text" name="stock" required><br>
            <input type="submit" value="Add Product">
        </form>
</div>
    </body>
</html>