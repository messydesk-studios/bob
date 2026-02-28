<?php

    include('db.php');
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $products = [];

    if ($result->rowCount() > 0) {
        // output data of each row
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }
    } else {
        echo "0 results";
    }





      $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    $categories = [];

    if ($result->rowCount() > 0) {
        // output data of each row
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row;
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
    <title>Bob's Marketplace for Bobs</title>
    <link href="/style.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="container">
    <?php include "nav.html"; ?>
    <div style="display: flex;">
    <h2>Product List</h2>
    <a href="view/products/create.php" style="margin-left: auto; margin: 20px 0px 10px auto;">Add Product</a>
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Category id</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
        <!-- Show data with php and html -->
        <?php if (count($products) > 0) : ?>
        
            <?php $counter = 1 ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $counter ?></td>
                    <td style="text-align: center;"><?php echo "<img src=\"".$product["images"]."\" width=100>"; ?></td>
                    <td><?php echo $product["product_name"] ?></td>
                    <td><?php echo $product["category_id"] ?></td>
                    <td><?php echo $product["price"] ?></td>
                    <td><?php echo $product["stock"] ?></td>
                    <td>
                    <a href="view/products/view.php?id=<?php echo $product["id"] ?>">View</a> |
                    <a href="view/products/update.php?id=<?php echo $product["id"] ?>">Update</a> |
                    <a href="view/products/delete.php?id=<?php echo $product["id"] ?>">Delete</a>
                    </td>
                </tr>
                <?php $counter++ ?>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="6">0 result</td>
            </tr>
        <?php endif ?>

    </table>


    <div style="display: flex;">
    <h2>Category List</h2>
    <a href="view/categories/create.php" style="margin-left: auto; margin: 20px 0px 10px auto;">Add Category</a>
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        <!-- Show data with php and html -->
        <?php if (count($categories) > 0) : ?>
        
            <?php $counter = 1 ?>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?php echo $category["id"] ?></td>
                    <td><?php echo $category["category_name"] ?></td>
                    <td>
                    <a href="view/categories/view.php?id=<?php echo $category["id"] ?>">View</a> |
                    <a href="view/categories/update.php?id=<?php echo $category["id"] ?>">Update</a> |
                    <a href="view/categories/delete.php?id=<?php echo $category["id"] ?>">Delete</a>
                    </td>
                </tr>
                <?php $counter++ ?>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="3">0 result</td>
            </tr>
        <?php endif ?>

    </table>
</div>
    </body>
</html>