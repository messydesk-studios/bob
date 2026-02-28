<?php

    include('db.php');
    $sql = "SELECT * FROM products ORDER BY id DESC";
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
<div id="title"><b>Items</b></div>
        <!-- Show data with php and html -->
        <?php if (count($products) > 0) : ?>
        
            <?php $counter = count($products) ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td style="width: 3%;"><?php echo $counter ?></td>
                    <td style="text-align: center; width: 10%;"><?php echo "<img src=\"".$product["images"]."\" width=100>"; ?></td>
                    <td>

                    <div style="font-size: 20px;" >
                    <b><a href="view/products/view.php?id=<?php echo $product["id"] ?>"><?php echo $product["product_name"] ?></a></b><br>
                    </div>

                <i>Category: <?php echo $product["category"] ?></i><br>
                <div style="margin-top: 7px;"><?php echo $product["descriptions"] ?></div>
                    <td style="width: 10%; background: #f8f8f8ff; border-left: 1px solid;">
                    <a href="view/products/update.php?id=<?php echo $product["id"] ?>">Update</a> |
                    <a href="view/products/delete.php?id=<?php echo $product["id"] ?>">Delete</a>
                    <div style="font-size: 30px; margin-top: 5px;">₱<?php echo $product["price"] ?></div>
                    Stock: <?php echo $product["stock"] ?></td>
                    </td>
                </tr>
                <?php $counter-- ?>
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
            <th style="border-left: 1px solid;">ID</th>
            <th style="border-left: 1px solid;">Category Name</th>
            <th style="border-left: 1px solid;">Action</th>
        </tr>
        <!-- Show data with php and html -->
        <?php if (count($categories) > 0) : ?>
        
            <?php $counter = 1 ?>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td style="border-left: 1px solid;"><?php echo $category["id"] ?></td>
                    <td style="border-left: 1px solid;"><?php echo $category["category_name"] ?></td>
                    <td style="border-left: 1px solid;">
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